const baseUrl = $("#baseUrl").val();

$(".add-item-prd").click(function(){
    // alert($(this).text())
    // debugger;
    let productParents = $(this).parents(".product-grid");
    let productId = $(productParents).attr('product-id');
    let imgPath = $(productParents).find(".productImg").attr("src");
    let productPrice = $(productParents).find(".productPrice").text();
    let productName = $(productParents).find(".productName").text();

    $("#product_id").val(productId);
    $("#product-price").text(productPrice);
    $("#product-image").attr("src", imgPath);
    $("#product-name").text(productName);
    $("#modal-tambah-data").modal("show");
})

function SubmitDataInsert() {
    let data = $("#form-tambah-data").serializeArray();
    var formData = _.object(_.pluck(data, 'name'), _.pluck(data, 'value'));
    console.log("data : ", formData);
    $.ajax({
        url: baseUrl + '/api/service/transaction',
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
            // table.ajax.reload();
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