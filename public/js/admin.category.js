const baseUrl = $("#baseUrl").val();

$(document).ready(function () {
    loadgrid();
});

function loadgrid() {
    $("#grid").DataTable({
        ajax:{
            url: baseUrl + '/api/service/category',
            type : 'get',
            dataSrc: 'data'
        },
        columns:[
            { data : "id" },
            { data : null },
            { data : "name", className: "nowrap" },
            { data : "title", className: "nowrap" },
            { data : "slug"},
            { data : null },
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
                    return `
                        <div class="actionwrap">
                            <button type="button" class="btn btn-primary"
                                onclick="ShowModalEdit(this)">Edit</button>
                            <button type="button" class="btn btn-danger"
                                onclick="ShowModalDelete(this)">Delete</button>
                        </div>
                    `;
                }
            },
            { 
                targets: 5,
                orderable: true,
                searchable: true,
                className: "nowrap",
                render: function ( data, type, row, meta ) {
                    // console.log('data : ',data);
                    // row.products_count = row.products.length;
                    // console.log('row : ',row);
                    return data.products.length;
                }
            }
        ]
    });
}

function ShowModalAdd() {
    $("#modal-tambah-data").modal("show");
}

function SubmitConfirmation(msg){
    Swal.fire({
        title: `Anda Yakin ?`,
        text: msg,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya!'
      }).then((result) => {
        return result.value;
    })
}

$(".btn-submit").click(function(){
    var modal = $(this).parents('.modal');
    var form = $(this).parents('form');
    var urlAction = $(form).attr('action');
    var methodAction = $(form).attr('method');
    var msg = $(this).attr('alert-msg');
    Swal.fire({
        title: `Anda Yakin ?`,
        text: msg,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya!'
      }).then((result) => {
        if(result.value){
            let table = $("#grid").DataTable();
            let data = $(form).serializeArray();
            var formData = _.object(_.pluck(data, 'name'), _.pluck(data, 'value'));
            // console.log("data : ", formData);
            $.ajax({
                url: urlAction,
                data: formData,
                dataType: 'json',
                type: methodAction,
                success: function (response) {
                    // console.log(response);
                    Swal.fire(
                        'Warning!',
                        response.message,
                        'warning'
                    );
                    $(modal).modal("hide");
                    // location.reload(true);
                    table.ajax.reload();
                },
                error: function (err) {
                    console.log(err);
                    // alert(err.responseJSON['message']==null?'Error':err.responseJSON['message']);
                    Swal.fire(
                        'Error!',
                        err.responseJSON['message'],
                        'error'
                    );
                    $(modal).modal("hide");
                }
            })
        }
    })
})


function ShowModalEdit(e) {
    // SetDatePicker();
    let table = $("#grid").DataTable();
    var dataRow = table.row( $(e).parents('tr') ).data();
    let id = dataRow.id;
    // console.log(data);
    // console.log("id : ",id);
    $.ajax({
        url: baseUrl + `/api/service/category/${id}`,
        dataType: 'json',
        type: 'get',
        success: function (response) {
            // console.log(id,response);
                let data = response.data;
                Object.getOwnPropertyNames(data).forEach(element => {
                    let selectorEl = `#modal-edit-data [name=${element}]`;
                    $(selectorEl).val(data[element])
                    // console.log(selectorEl, element, " value : ", data[element]);
                });
            
            
            $("#modal-edit-data [name=id]").val(id);
            $("#modal-edit-data").modal("show");
        },
        error: function (err) {
            console.log(err);
        }
    })
}

function ShowModalDelete(e) {
    let table = $("#grid").DataTable();
    var dataRow = table.row( $(e).parents('tr') ).data();
    let id = dataRow.id;
    Swal.fire({
        title: `Anda Yakin ?`,
        text: "Data Mungkin Tidak Bisa Dikembalikan Lagi!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya!'
      }).then((result) => {
        if (result.value) {
            $.ajax({
                url: baseUrl + `/api/service/category/${id}`,
                dataType: 'json',
                type: 'delete',
                success: function (response) {
                    Swal.fire(
                        'Deleted!',
                        'Data sudah dihapus',
                        'success'
                      )
                    console.log(response);
                    table.ajax.reload();
                },
                error: function (err) {
                    Swal.fire(
                        'Error!',
                        err.responseJSON['message'],
                        'error'
                    );
                    console.log(err);
                    table.ajax.reload();
                }
            })
        }
      })
}

