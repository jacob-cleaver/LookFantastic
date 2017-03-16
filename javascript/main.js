function activeCreditDebit() {
    document.getElementById('creditDebitCards').style.background = "#5bcfc3";
    document.getElementById('payPal').style.background = "#66e6d9";
    document.getElementById('aliPay').style.background = "#66e6d9";
};

function activePayPal() {
    document.getElementById('creditDebitCards').style.background = "#66e6d9";
    document.getElementById('payPal').style.background = "#5bcfc3";
    document.getElementById('aliPay').style.background = "#66e6d9";
};

function activeAliPay() {
    document.getElementById('creditDebitCards').style.background = "#66e6d9";
    document.getElementById('payPal').style.background = "#66e6d9";
    document.getElementById('aliPay').style.background = "#5bcfc3";
};

function creditDebitCards() {
  document.getElementById('creditDebitCardsBtn').style.background = "#5bcfc3";
  document.getElementById('paypalBtn').style.background = "#66e6d9";
  document.getElementById('alipayBtn').style.background = "#66e6d9";
  document.getElementById('cardsForm').style.display = "block";
  document.getElementById('payPal').style.display = "none";
  document.getElementById('aliPay').style.display = "none";
}

function newAddressHide() {
  document.getElementById('newAddressForm').style.display = "none";
}

function newAddress() {
  document.getElementById('newAddressForm').style.display = "block";
}

function payPal() {
  document.getElementById('creditDebitCardsBtn').style.background = "#66e6d9";
  document.getElementById('paypalBtn').style.background = "#5bcfc3";
  document.getElementById('alipayBtn').style.background = "#66e6d9";
  document.getElementById('cardsForm').style.display = "none";
  document.getElementById('payPal').style.display = "block";
  document.getElementById('aliPay').style.display = "none";
}

function aliPay() {
  document.getElementById('creditDebitCardsBtn').style.background = "#66e6d9";
  document.getElementById('paypalBtn').style.background = "#66e6d9";
  document.getElementById('alipayBtn').style.background = "#5bcfc3";
  document.getElementById('cardsForm').style.display = "none";
  document.getElementById('payPal').style.display = "none";
  document.getElementById('aliPay').style.display = "block";
}
