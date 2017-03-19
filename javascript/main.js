function creditDebitCards() {
  document.getElementById('creditDebitCardsBtn').style.background = "#28bdb3";
  document.getElementById('paypalBtn').style.background = "#ababab";
  document.getElementById('alipayBtn').style.background = "#ababab";

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
  document.getElementById('creditDebitCardsBtn').style.background = "#ababab";
  document.getElementById('paypalBtn').style.background = "#28bdb3";
  document.getElementById('alipayBtn').style.background = "#ababab";

  document.getElementById('cardsForm').style.display = "none";
  document.getElementById('payPal').style.display = "block";
  document.getElementById('aliPay').style.display = "none";
}

function aliPay() {
  document.getElementById('creditDebitCardsBtn').style.background = "#ababab";
  document.getElementById('paypalBtn').style.background = "#ababab";
  document.getElementById('alipayBtn').style.background = "#28bdb3";

  document.getElementById('cardsForm').style.display = "none";
  document.getElementById('payPal').style.display = "none";
  document.getElementById('aliPay').style.display = "block";
}
