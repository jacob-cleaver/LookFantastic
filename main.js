$(function() {
    $("[name=checkout]").click(function() {
        $('.hideCheckout').hide();
        $("#checkout-" + $(this).val()).show();
    });
});

function activeCreditDebit() {
    document.getElementById("credit-debit").style.background = "#5bcfc3";
    document.getElementById("paypal").style.background = "#66e6d9";
    document.getElementById("alipay").style.background = "#66e6d9";
}

function activePayPal() {
    document.getElementById("credit-debit").style.background = "#66e6d9";
    document.getElementById("paypal").style.background = "#5bcfc3";
    document.getElementById("alipay").style.background = "#66e6d9";
}

function activeAliPay() {
    document.getElementById("credit-debit").style.background = "#66e6d9";
    document.getElementById("paypal").style.background = "#66e6d9";
    document.getElementById("alipay").style.background = "#5bcfc3";
}
