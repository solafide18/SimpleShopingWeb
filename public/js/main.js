$(".add-item-prd").click(function(){
    // alert($(this).text())
    let productId = $(this).attr('product-id');
    $("#modal-tambah-data").modal("show");
})