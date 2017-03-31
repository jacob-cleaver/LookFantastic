/* Javscript getting elements via IDs to show/hide and set acitve states of buttons
   using the 'style' attribute
*/

// Credit card button and form
function creditDebitCards() {
  document.getElementById('creditDebitCardsBtn').style.background = "$turquoise";
  document.getElementById('paypalBtn').style.background = "$grey";
  document.getElementById('alipayBtn').style.background = "$grey";

  document.getElementById('cardsForm').style.display = "block";
  document.getElementById('payPal').style.display = "none";
  document.getElementById('aliPay').style.display = "none";
}

// Hidden address forms from within the hidden credit card form and ensures the form is hidden if the "use same address" radio button is selected
function newAddressHide() {
  document.getElementById('newAddressForm').style.display = "none";
}

function newAddress() {
  document.getElementById('newAddressForm').style.display = "block";
}

// Paypal button and form
function payPal() {
  document.getElementById('creditDebitCardsBtn').style.background = "$grey";
  document.getElementById('paypalBtn').style.background = "$turquoise";
  document.getElementById('alipayBtn').style.background = "$grey";

  document.getElementById('cardsForm').style.display = "none";
  document.getElementById('payPal').style.display = "block";
  document.getElementById('aliPay').style.display = "none";
}

// Alipal button and form
function aliPay() {
  document.getElementById('creditDebitCardsBtn').style.background = "$grey";
  document.getElementById('paypalBtn').style.background = "$grey";
  document.getElementById('alipayBtn').style.background = "$turquoise";

  document.getElementById('cardsForm').style.display = "none";
  document.getElementById('payPal').style.display = "none";
  document.getElementById('aliPay').style.display = "block";
}
