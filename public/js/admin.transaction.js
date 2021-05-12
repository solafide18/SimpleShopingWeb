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
                    console.log(data);
                    if(data.status == null || data.status==""){
                        return `
                            <div class="actionwrap">
                                <button type="button" class="btn btn-primary"
                                    onclick="ShowModalEdit(this)">Approve</button>
                                <button type="button" class="btn btn-danger"
                                    onclick="ShowModalDelete(this)">Cancel</button>
                            </div>
                        `;
                    }
                    else{
                        return '';
                    }
                }
            }
        ]
    });
}