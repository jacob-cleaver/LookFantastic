$(function() {
    $("[name=checkout]").click(function() {
        $('.hideCheckout').hide();
        $("#checkout-" + $(this).val()).show();
    });
});
