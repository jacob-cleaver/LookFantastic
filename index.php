<!DOCTYPE html>
<html lang="en">
<head>
    <title>LookFabulous</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="stylesheets/style.css">
    <script type="text/javascript" src="javascript/main.js"></script>
    <?php $geo = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='. $_SERVER["REMOTE_ADDR"]));
          $country = $geo['geoplugin_countryName'];
          $price = 7.2993964113; //In $Dollars
          $delivery = 4.862202284; //In $Dollars
          $totalPrice = 12.1615986953; //In $Dollars
          $convertion = $geo['geoplugin_currencyConverter'];
          $converted_price = $price * $convertion;
          $converted_delivery = $delivery * $convertion;
          $converted_totalPrice = $totalPrice * $convertion;
          $converted_price_formatted = number_format($converted_price, 2, '.', '');
          $converted_delivery_formatted = number_format($converted_delivery, 2, '.', '');
          $converted_totalPrice_formatted = number_format($converted_totalPrice, 2, '.', '');
    ?>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="public/images/lf-logo.png">
</head>

<body>
    <div class="container">
        <header>
            <a href="#"><img class="col-md-4 logo" src="public/images/LookFabulous.png" alt="Lookfabulous.com" width="260px"></a>
            <div class="col-xs-12 logo-mobile">
              <a href="#"><img src="public/images/lf-logo.png" alt="Lookfabulous.com" width="60px"></a>
            </div>
        </header>
        <div class="required">
        <hr> Please provide your billing and delivery information below.<span style="float:right">* Indicates required field</span><hr>
      </div>

            <section>
                <ul class="col-xs-8 col-xs-offset-2">
                    <li><a href="#details">1. Details</a></li>
                    <li><a href="#delivery">2. Delivery</a></li>
                    <li><a style="color:#28bdb3; border-bottom:2px solid #28bdb3" href="#payment">3. Payment</a></li>
                    <li><a href="#confirm">4. Confirm</a></li>
                </ul>

                <div class="progress">
                  <p class="progress-1">1</p>
                  <p class="progress-2">2</p>
                  <p class="progress-3">3</p>
                  <p class="progress-4">4</p>
                </div>
            </section>

            <section id="cart">
              <div class="cart col-xs-10 col-xs-offset-1">
                <div class="cart-header col-xs-12">
                  Your Order Summary
                </div>
                <div class="col-sm-2 col-md-2">
                <img src="public/images/bulldog-moisturiser.png" alt="Bulldog Original Moisturiser" width="100px">
              </div>
              <div class="col-xs-6 cart-info">
                <p>1 x Bulldog Original Moisturiser (100ml) - Men's Skin Care Product</p>
              </div>
                  <div class="col-xs-11 col-sm-3 col-sm-offset-8 cart-price">
                  Price:
                    <?php
                    if ($country == "United Kingdom") {
                      echo '&pound'.$converted_price_formatted;
                    }
                    elseif ($country == "Austrailia" or $country == "United States") {
                      echo '$'.$price;
                    }

                    elseif ($country == "Turkey") {
                      echo '&#8356;'.$converted_price_formatted;
                    }

                    else {
                      echo '&euro;'.$converted_price_formatted;
                    }?>
                  </div>
                  <div class="col-xs-11 col-sm-3 col-sm-offset-8 cart-delivery">
                    Delivery:
                    <?php
                    if ($country == "United Kingdom") {
                      echo '&pound'.$converted_delivery_formatted;
                    }
                    elseif ($country == "Austrailia" or $country == "United States") {
                      echo '$'.$delivery;
                    }

                    elseif ($country == "Turkey") {
                      echo '&#8356;'.$converted_delivery_formatted;
                    }

                    else {
                      echo '&euro;'.$converted_delivery_formatted;
                    }?>
                  </div>
                  <div class="col-xs-11 col-sm-9 col-sm-offset-2 col-md-9 col-md-offset-2 cart-total-price">
                    Total Price:
                    <?php
                    if ($country == "United Kingdom") {
                      echo '&pound'.$converted_totalPrice_formatted;
                    }
                    elseif ($country == "Austrailia" or $country == "United States") {
                      echo '$'.$totalPrice;
                    }

                    elseif ($country == "Turkey") {
                      echo '&#8356;'.$converted_totalPrice_formatted;
                    }

                    else {
                      echo '&euro;'.$converted_totalPrice_formatted;
                    }?>
                  </div>
                </div>
            </section>

            <div>
                <h2>Please choose a payment method</h2>
                <button id="creditDebitCardsBtn" onclick="creditDebitCards()" type="button" href="#checkout-cards" class="btn btn-checkout col-xs-12 col-sm-8 col-sm-offset-2 col-md-4">
                  Credit/Debit Card
                </button>

                <button id="paypalBtn" onclick="payPal()" type="button" href="#checkout-paypal" class="btn btn-checkout col-xs-12 col-sm-8 col-sm-offset-2 col-sm-offset-2 col-md-4">
                  PayPal
                  <!-- <img class="paypal" src="public/images/PayPal.png" alt="PayPay" title="Pay by PayPal" width="90px" height="25px"> -->
                </button>

                <button id="alipayBtn" onclick="aliPay()" type="button" href="#checkout-alipay" class="btn btn-checkout col-xs-12 col-sm-8 col-sm-offset-2 col-md-4">
                  AliPay
                  <!-- <img class="alipay" src="public/images/AliPay.png" alt="AliPay" title="Pay by AliPay" width="75px" height="25px"> -->
                </button>

                <div id="cardsForm" style="display:none">
                    <form>
                        <label class="col-md-2 col-md-offset-3">Card Number*</label>
                        <input class="form-control col-md-3 col-sm-8 col-sm-offset-2 col-xs-12" type="text" placeholder="Card Number*"><br>

                        <label class="col-md-2 col-md-offset-3">Name on Card*</label>
                        <input class="form-control col-md-3 col-sm-8 col-sm-offset-2 col-xs-12" type="text" placeholder="Name on Card*"><br>

                        <label class="col-md-2 col-md-offset-3">Expiry Date*</label>
                        <select class="form-control col-md-1 col-sm-4 col-sm-offset-2 col-xs-6 expiry-date">
                          <option value selected disabled="">Month</option>
                          <option>01</option>
                          <option>02</option>
                          <option>03</option>
                          <option>04</option>
                          <option>05</option>
                          <option>06</option>
                          <option>07</option>
                          <option>08</option>
                          <option>09</option>
                          <option>10</option>
                          <option>11</option>
                          <option>12</option>
                        </select>

                        <select class="form-control col-md-1 col-sm-4 col-xs-6 expiry-date">
                          <option value selected disabled>Year</option>
                          <option>17</option>
                          <option>18</option>
                          <option>19</option>
                          <option>20</option>
                          <option>21</option>
                          <option>22</option>
                          <option>23</option>
                          <option>24</option>
                        </select><br>

                        <label class="col-md-2 col-md-offset-3">CVV*</label>
                        <input class="form-control col-md-3 col-sm-8 col-sm-offset-2 col-xs-12" type="text" placeholder="CVV* - 3 digits on the back of your card">
                        <label class="help-tip">
                          <p>
                            <img src="public/images/cvv.png" alt="CVV" title="CVV" width="100px" style="padding-bottom:10px"><br>
                            The last three digits printed on the signature strip on the back of your card.
                          </p>
                        </label>
                    </form>

                    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-offset-3" style="margin-top:35px; margin-bottom:35px;">
                        <input id="newAddressBtn" name="address" type="radio" href="#newAddressForm" onclick="newAddressHide()" required checked>Use my delivery address as my cardholder address<br>
                        <input id="newAddressBtn" name="address" type="radio" href="#newAddressForm" onclick="newAddress()" required>Use a different address
                    </div>

                    <div id="newAddressForm" style="display:none">
                        <form>
                            <label class="col-md-3 col-md-offset-2">House Name/Number*</label>
                            <input class="form-control col-md-3 col-sm-8 col-sm-offset-2 col-xs-12" type="text" placeholder="House Name or Number*"><br>

                            <label class="col-md-2 col-md-offset-3">Address Line 1*</label>
                            <input class="form-control col-md-3 col-sm-8 col-sm-offset-2 col-xs-12" type="text" placeholder="Address Line 1*"><br>

                            <label class="col-md-2 col-md-offset-3">Address Line 2</label>
                            <input class="form-control col-md-3 col-sm-8 col-sm-offset-2 col-xs-12" type="text" placeholder="Address Line 2 - optional"><br>

                            <label class="col-md-2 col-md-offset-3">City*</label>
                            <input class="form-control col-md-3 col-sm-8 col-sm-offset-2 col-xs-12" type="text" placeholder="City*"><br>

                            <?php
                              if ($country == "United Kingdom") {
                                echo '<label class="col-md-2 col-md-offset-3">County*</label>';
                                echo '<input class="form-control col-md-3 col-sm-8 col-sm-offset-2 col-xs-12" type="text" placeholder="County*"><br>';
                              }

                              else {
                                echo '<label class="col-md-2 col-md-offset-3">State*</label>';
                                echo '<input class="form-control col-md-3 col-sm-8 col-sm-offset-2 col-xs-12" type="text" placeholder="State*"><br>';
                              }
                            ?>

                            <?php
                              if ($country == "United Kingdom") {
                                echo '<label class="col-md-2 col-md-offset-3">Post Code*</label>';
                                echo '<input class="form-control col-md-3 col-sm-8 col-sm-offset-2 col-xs-12" type="text" placeholder="Post Code*"><br>';
                              }

                              else {
                                echo '<label class="col-md-2 col-md-offset-3">Zip Code*</label>';
                                echo '<input class="form-control col-md-3 col-sm-8 col-sm-offset-2 col-xs-12" type="text" placeholder="Zip Code*"><br>';
                              }
                            ?>

                            <label class="col-md-2 col-md-offset-3">Country*</label>
                            <select class="form-control col-md-3 col-sm-8 col-sm-offset-2 col-xs-12">
                                <option value disabled>Please choose a country</option>
                                <?php
                                  if ($country == "United Kingdom"){
                                  echo '<option class="selected" selected>United Kingdom</option>';
                                }
                                  elseif ($country == "United States"){
                                  echo '<option selected>United States</option><hr>';}
                                ?>
                                <option>United States</option>
                                <option>United Kingdom</option>
                            </select>
                        </form>
                    </div>
                </div>

                <div id="payPal" style="display:none">
                    <p style="color:#ddd">Please note that using the PayPal checkout will attract a 1% surcharge to the cost of your order.</p>
                    <p>You will be re-directed to PayPal.</p>
                </div>

                <div id="aliPay" style="display:none">
                    <p>You will be re-directed to AliPay.</p>
                </div>

                <hr>

                <button type="button" href="#" class="btn btn-submit col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 col-xs-12">Submit My Order</button>
                <button type="button" href="#" class="btn btn-back col-sm-8 col-sm-offset-2 col-xs-12">Back</button>
                <p style="margin: 40px">By placing this order, your are confirming that you agree to our <u class="tandc-pp">Terms and Conditions</u> and <u class="tandc-pp">Privacy Policy</u></p>
            </div>
        </div>
    </div>
    </div>

    <footer>
        &copy; Jacob Cleaver 2017 - LookFabulous Checkout Form
    </footer>
</body>

</html>
