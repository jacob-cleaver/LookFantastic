<!DOCTYPE html>
<html lang="en">
<head>
    <title>LookFabulous</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="Stylesheets/style.css">
    <script type="text/javascript" src="javascript/main.js"></script>
    <?php $geo = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=193.62.7.226'));
          $country = $geo['geoplugin_countryName'];
          $price = 5.99; //In $Dollars
          $convertion = $geo['geoplugin_currencyConverter'];
          $converted_price = $price * $convertion;
          $converted_price_formatted = number_format($converted_price, 2, '.', '');
    ?>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="public/images/lf-logo.png">
</head>

<body>
    <div class="container">
        <header>
            <a href="#"><img class="col-xs-6 col-xs-offset-3 col-md-4 logo" src="public/images/LookFabulous.png" alt="Lookfabulous.com" width="260px"></a>
        </header>
        <hr> Please provide your billing and delivery information below.<span style="float:right">* Indicates required field</span>
        <hr>

        <div class="row">
            <section>
                <ul>
                    <li class="col-xs-3 col-md-2 col-md-offset-2"><a href="#details">1. Details</a></li>
                    <li class="col-xs-3 col-md-2"><a href="#delivery">2. Delivery</a></li>
                    <li class="col-xs-3 col-md-2"><a style="color:#28bdb3; border-bottom:2px solid #28bdb3" href="#payment">3. Payment</a></li>
                    <li class="col-xs-3 col-md-2"><a href="#confirm">4. Confirm</a></li>
                </ul>
            </section>

            <section id="basket">
              <div id="prices">
                <?php
                if ($country == "United Kingdom") {
                  echo '<p>&pound'.$converted_price_formatted.'</p>';
                }
                elseif ($country == "Austrailia" or $country == "United States") {
                  echo '<p>$'.$price.'</p>';
                }

                elseif ($country == "Turkey") {
                  echo '<p>&#8356;'.$converted_price_formatted.'</p>';
                }

                else {
                  echo '<p>&euro;'.$converted_price_formatted.'</p>';
                }?>
              </div>
            </section>

            <div>
                <h2>Please choose a payment method</h2>
                <button id="creditDebitCardsBtn" onclick="creditDebitCards()" type="button" href="#checkout-cards" class="btn btn-checkout col-xs-12 col-md-4">
                  Credit/Debit Card
                  <!-- <img class="credit-debit" src="public/images/Credit-Debit-Cards.png" alt="Credit/Debit Cards" title="Accepted Credit/Debit Cards"> -->
                </button>

                <button id="paypalBtn" onclick="payPal()" type="button" href="#checkout-paypal" class="btn btn-checkout col-xs-12 col-md-4">
                  PayPal
                  <!-- <img class="paypal" src="public/images/PayPal.png" alt="PayPay" title="Pay by PayPal" width="90px" height="25px"> -->
                </button>

                <button id="alipayBtn" onclick="aliPay()" type="button" href="#checkout-alipay" class="btn btn-checkout col-xs-12 col-md-4">
                  AliPay
                  <!-- <img class="alipay" src="public/images/AliPay.png" alt="AliPay" title="Pay by AliPay" width="75px" height="25px"> -->
                </button>

                <div id="cardsForm" style="display:none">
                    <form>
                        <label class="col-md-2 col-md-offset-3">Card Number*</label>
                        <input class="form-control col-md-3 col-xs-12" type="text" placeholder="Card Number*"><br>

                        <label class="col-md-2 col-md-offset-3">Name on Card*</label>
                        <input class="form-control col-md-3 col-xs-12" type="text" placeholder="Name on Card*"><br>

                        <label class="col-md-2 col-md-offset-3">Expiry Date*</label>
                        <select class="form-control col-md-1 col-xs-6">
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

                        <select class="form-control col-md-1 col-xs-6">
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
                        <input class="form-control col-md-3 col-xs-12" type="text" placeholder="CVV* - 3 digits on the back of your card">
                        <label class="help-tip">
                          <p>
                            <img src="public/images/cvv.png" alt="CVV" title="CVV" width="100px" style="padding-bottom:10px"><br>
                            The last three digits printed on the signature strip on the back of your card.
                          </p>
                        </label>
                    </form>

                    <div class="col-xs-12 col-md-offset-3" style="margin-top:35px; margin-bottom:35px;">
                        <input id="newAddressBtn" name="address" type="radio" href="#newAddressForm" onclick="newAddressHide()" required checked>Use my delivery address as my cardholder address<br>
                        <input id="newAddressBtn" name="address" type="radio" href="#newAddressForm" onclick="newAddress()" required>Use a different address
                    </div>

                    <div id="newAddressForm" style="display:none">
                        <form>
                            <label class="col-md-3 col-md-offset-2">House Name/Number*</label>
                            <input class="form-control col-md-3 col-xs-12" type="text" placeholder="House Name or Number*"><br>

                            <label class="col-md-2 col-md-offset-3">Address Line 1*</label>
                            <input class="form-control col-md-3 col-xs-12" type="text" placeholder="Address Line 1*"><br>

                            <label class="col-md-2 col-md-offset-3">Address Line 2</label>
                            <input class="form-control col-md-3 col-xs-12" type="text" placeholder="Address Line 2 - optional"><br>

                            <label class="col-md-2 col-md-offset-3">City/Town*</label>
                            <input class="form-control col-md-3 col-xs-12" type="text" placeholder="City*"><br>

                            <?php
                              if ($country == "United Kingdom") {
                                echo '<label class="col-md-2 col-md-offset-3">County*</label>';
                                echo '<input class="form-control col-md-3 col-xs-12" type="text" placeholder="County*"><br>';
                              }

                              else {
                                echo '<label class="col-md-2 col-md-offset-3">State*</label>';
                                echo '<input class="form-control col-md-3 col-xs-12" type="text" placeholder="State*"><br>';
                              }
                            ?>

                            <?php
                              if ($country == "United Kingdom") {
                                echo '<label class="col-md-2 col-md-offset-3">Post Code*</label>';
                                echo '<input class="form-control col-md-3 col-xs-12" type="text" placeholder="Post Code*"><br>';
                              }

                              else {
                                echo '<label class="col-md-2 col-md-offset-3">Zip Code*</label>';
                                echo '<input class="form-control col-md-3 col-xs-12" type="text" placeholder="Zip Code*"><br>';
                              }
                            ?>

                            <label class="col-md-2 col-md-offset-3">Country*</label>
                            <select class="form-control col-md-3 col-xs-12">
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

                <button type="button" href="#" class="btn btn-submit col-md-4 col-md-offset-4 col-xs-12">Submit My Order</button>
                <button type="button" href="#" class="btn btn-back col-md-4 col-md-offset-4 col-xs-12">Back</button>
                <p>By placing this order, your are confirming that you agree to our <u class="tandc-pp">Terms and Conditions</u> and <u class="tandc-pp">Privacy Policy</u></p>
            </div>
        </div>
    </div>
    </div>

    <footer>
        &copy; Jacob Cleaver 2017 - LookFabulous Checkout Form
    </footer>
</body>

</html>
