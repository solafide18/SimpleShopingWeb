const baseUrl = $("#baseUrl").val();

$(document).ready(function () {
    loadgrid();
});

function loadgrid() {
    $("#grid").DataTable({
        ajax:{
            url: baseUrl + '/api/master/restoran',
            type : 'get',
            dataSrc: 'data'
        },
        columns:[
            { data : "id" },
            { data : null },
            { data : "nama", className: "nowrap" },
            { data : "alamat", className: "nowrap" },
            { data : "penghasilan_perbulan"},
            { data : "dasar_pengenaan_pajak" },
            { data : "masa_pajak" },
            { data : "tarif_pajak" }
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
            }
        ]
    });
}

function ShowModalEdit(e) {
    // SetDatePicker();
    let table = $("#grid").DataTable();
    var dataRow = table.row( $(e).parents('tr') ).data();
    let id = dataRow.id;
    // console.log(data);
    // console.log("id : ",id);
    $.ajax({
        url: baseUrl + `/api/master/restoran/${id}/details`,
        dataType: 'json',
        type: 'get',
        success: function (response) {
            // console.log(id,response);

            if (response.data.length > 0) {
                let data = response.data[0];
                Object.getOwnPropertyNames(data).forEach(element => {
                    let selectorEl = `#modal-edit-data [name=${element}]`;
                    $(selectorEl).val(data[element])
                    // console.log(selectorEl, element, " value : ", data[element]);
                });
            }
            
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
                url: baseUrl + `/api/service/restoran/${id}`,
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
                    console.log(err);
                }
            })
        }
      })
}

function SubmitDataEdit() {
    let table = $("#grid").DataTable();
    let data = $("#form-edit-data").serializeArray();
    var formData = _.object(_.pluck(data, 'name'), _.pluck(data, 'value'));
    // console.log("data : ", formData);
    $.ajax({
        url: baseUrl + `/api/service/restoran/${formData.id}/update`,
        data: formData,
        dataType: 'json',
        type: 'post',
        success: function (response) {
            console.log(response);
            Swal.fire(
                'Warning!',
                response.message,
                'warning'
            );
            $("#modal-edit-data").modal("hide");
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
            $("#modal-tambah-data").modal("hide");
        }
    })
}

function ShowModalAdd() {
    $("#modal-tambah-data").modal("show");
}

function SubmitDataInsert() {
    let table = $("#grid").DataTable();
    let data = $("#form-tambah-data").serializeArray();
    var formData = _.object(_.pluck(data, 'name'), _.pluck(data, 'value'));
    // console.log("data : ", formData);
    $.ajax({
        url: baseUrl + '/api/service/restoran',
        data: formData,
        dataType: 'json',
        type: 'post',
        success: function (response) {
            // console.log(response);
            Swal.fire(
                'Warning!',
                response.message,
                'warning'
            );
            $("#modal-tambah-data").modal("hide");
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
            $("#modal-tambah-data").modal("hide");
        }
    })
}