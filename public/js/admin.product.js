const baseUrl = $("#baseUrl").val();

$(document).ready(function () {
    loadgrid();
    
    ShowCategoryDDL();
});

$("input.file-product").on('change', function(){
    // alert('changed');
    // debugger;
    var imgPreview = $(this).siblings('img');
    
    $(imgPreview).attr("src",URL.createObjectURL($(this)[0].files[0]));
    $(imgPreview).css({'width' : '210px' , 'height' : '285px'});
    // $(this).siblings('.file-path').val(URL.createObjectURL($(this)[0].files[0]));
})

function loadgrid() {
    $("#grid").DataTable({
        ajax:{
            url: baseUrl + '/api/service/product',
            type : 'get',
            dataSrc: 'data'
        },
        columns:[
            { data : "id" },
            { data : null },
            { data : "name", className: "nowrap" },
            { data : "price", className: "nowrap" },
            { data : "category.name"},
            { data : "path_image"},
            { data : "stock"},
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
                targets: 7,
                orderable: true,
                searchable: true,
                className: "nowrap",
                render: function ( data, type, row, meta ) {
                    // console.log('data : ',data);
                    // row.products_count = row.products.length;
                    // console.log('row : ',row);
                    return data.transactions.length;
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

$('form').submit(function(e){
    e.preventDefault();
    // debugger;
    var modal = $(this).parents('.modal');
    var urlAction = $(this).attr('action');
    var methodAction = $(this).attr('method');
    var data = $(this).serializeArray();
    var formData = new FormData(this);
    // for ( var key in data ) {
    //     formData.append(key, data[key]);
    // }
    // formData.append('file', $(this).find('input[type=file]')[0].files[0], $(this).find('input[type=file]')[0].files[0].name);
    Swal.fire({
        title: `Anda Yakin ?`,
        text: 'Untuk menyimpan data ini?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya!'
    }).then((result) => {
        if(result.value){
            // debugger;
            let table = $("#grid").DataTable();
            $.ajax({
                url: urlAction,
                data: formData,
                dataType : 'json',
                type: methodAction,
                processData: false,
                contentType: false,
                enctype: 'multipart/form-data',
                success: function (response) {
                    // console.log(response);
                    Swal.fire(
                        'Warning!',
                        response.message,
                        'warning'
                    );
                    $(modal).modal("hide");
                    table.ajax.reload();
                },
                error: function (err) {
                    console.log(err);
                    $(modal).modal("hide");
                    table.ajax.reload();
                    Swal.fire(
                        'Error!',
                        err.responseJSON['message'],
                        'error'
                    );
                    
                }
            })
        }
    })
})

// $(".btn-submit").click(function(){
//     var modal = $(this).parents('.modal');
//     var form = $(this).parents('form');
//     var urlAction = $(form).attr('action');
//     var methodAction = $(form).attr('method');
//     var msg = $(this).attr('alert-msg');
//     Swal.fire({
//         title: `Anda Yakin ?`,
//         text: msg,
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Ya!'
//       }).then((result) => {
//         if(result.value){
//             debugger;
//             let table = $("#grid").DataTable();
//             var formData = new FormData($(form));
//             // console.log("data : ", formData);
//             $.ajax({
//                 url: urlAction,
//                 data: formData,
//                 dataType: 'json',
//                 type: methodAction,
//                 success: function (response) {
//                     // console.log(response);
//                     Swal.fire(
//                         'Warning!',
//                         response.message,
//                         'warning'
//                     );
//                     $(modal).modal("hide");
//                     // location.reload(true);
//                     table.ajax.reload();
//                 },
//                 error: function (err) {
//                     console.log(err);
//                     // alert(err.responseJSON['message']==null?'Error':err.responseJSON['message']);
//                     Swal.fire(
//                         'Error!',
//                         err.responseJSON['message'],
//                         'error'
//                     );
//                     $(modal).modal("hide");
//                 }
//             })
//         }
//     })
// })


function ShowModalEdit(e) {
    // SetDatePicker();
    let table = $("#grid").DataTable();
    var dataRow = table.row( $(e).parents('tr') ).data();
    let id = dataRow.id;
    // console.log(data);
    // console.log("id : ",id);
    $.ajax({
        url: baseUrl + `/api/service/product/${id}`,
        dataType: 'json',
        type: 'get',
        success: function (response) {
            // console.log(id,response);
                let data = response.data;
                Object.getOwnPropertyNames(data).forEach(element => {
                    // debugger;
                    let selectorEl = `#modal-edit-data [name=${element}]`;
                    if(!($(selectorEl).hasClass('file-path'))){
                        $(selectorEl).val(data[element]);
                    }
                    else{
                        $('#modal-edit-data img').attr("src",baseUrl + '/' + data[element]);
                        $('#modal-edit-data img').css({'width' : '210px' , 'height' : '285px'});
                    }
                    if($(selectorEl).hasClass('seelct2ddl')){
                        $(selectorEl).val(data[element]).trigger('change');
                    }
                    //.trigger('change');
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
                url: baseUrl + `/api/service/product/${id}`,
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

function ShowCategoryDDL(){
    $.ajax({
        url: baseUrl + `/api/service/ddl/category`,
        dataType: 'json',
        type: 'get',
        success: function (response) {
            let data = response.data;
            for (let i = 0; i < data.length; i++) {
                const item = data[i];
                let raw = `<option value="${item.id}">${item.name}</option>`
                $("#modal-tambah-data .seelct2ddl").append(raw);
                $("#modal-edit-data .seelct2ddl").append(raw);
            }
            $(".seelct2ddl").select2({
                theme: 'bootstrap4'
            });
        },
        error: function (err) {
            console.log(err);
        }
    })
}