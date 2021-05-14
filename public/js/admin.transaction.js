const baseUrl = $("#baseUrl").val();

$(document).ready(function () {
    loadgrid();
});

function loadgrid() {
    $("#grid").DataTable({
        ajax:{
            url: baseUrl + '/api/service/transaction',
            type : 'get',
            dataSrc: 'data'
        },
        columns:[
            { data : "id" },
            { data : null },
            { data : "full_name" },
            { data : "no_telpon" },
            { data : "email"},
            { data : "alamat"},
            { data : "product.name" },
            { data : "product.price" },
            { data : "user_id" },
            { data : "status" }
        ],
        columnDefs : [
            { 
                targets: 0,
                orderable: false,
                searchable: false,
                visible: false
            },
            { 
                targets: 1,
                orderable: false,
                searchable: false,
                className: "nowrap",
                render: function ( data, type, row, meta ) {
                    // debugger;
                    // console.log(data);
                    if(0 < row.status && row.status < 10){
                        return `
                            <div class="actionwrap">
                                <button type="button" class="btn btn-primary" title="Kirim Request ini"
                                    onclick="ShowModalApproval(this)">Approve</button>
                                <button type="button" class="btn btn-danger" title="Tolak Request ini"
                                    onclick="ShowModalReject(this)">Reject</button>
                            </div>
                        `;
                    }
                    else{
                        return '';
                    }
                }
            },
            { 
                targets: 9,
                orderable: true,
                searchable: true,
                className: "nowrap",
                render: function ( data, type, row, meta ) {
                    // debugger;
                    console.log(row);
                    if(row.status == 10){
                        return `
                            <span class="badge badge-success">Success</span>
                        `;
                    }
                    if(row.status == 0){
                        return `
                            <span class="badge badge-danger">Canceled</span>
                        `;
                    }
                    if(row.status == 1){
                        return `
                            <span class="badge badge-warning">Pending</span>
                        `;
                    }
                    else{
                        return `
                            <span class="badge badge-info">on Progress</span>
                        `;
                    }
                }
            }
        ]
    });
}

function ShowModalApproval(e) {
    let table = $("#grid").DataTable();
    var dataRow = table.row( $(e).parents('tr') ).data();
    Swal.fire({
        title: `Approve`,
        text: "Anda Yakin Transaksi an. '" + dataRow.full_name + "' akan diApprove?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya!'
      }).then((result) => {
        if(result.value){
            dataRow.status = 10;
            SendApprovalStatus(dataRow);
        }
    })
}

function ShowModalReject(e) {
    let table = $("#grid").DataTable();
    var dataRow = table.row( $(e).parents('tr') ).data();
    Swal.fire({
        title: `Reject`,
        text: "Anda Yakin Transaksi an. '" + dataRow.full_name + "' akan diReject?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya!'
      }).then((result) => {
        if(result.value){
            dataRow.status = 0;
            SendApprovalStatus(dataRow);
        }
    })
}

function SendApprovalStatus(data){
    $.ajax({
        url: baseUrl + '/api/service/approve',
        data: data,
        dataType: 'json',
        type: 'post',
        success: function (response) {
            Swal.fire(
                'Warning!',
                response.message,
                'warning'
            );
            let table = $("#grid").DataTable();
            table.ajax.reload();
        },
        error: function (err) {
            console.log(err);
            Swal.fire(
                'Error!',
                err.responseJSON['message'],
                'error'
            );
            let table = $("#grid").DataTable();
            table.ajax.reload();
        },
        finally:function(){
            
        }
    })
}