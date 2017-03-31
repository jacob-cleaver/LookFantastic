<!DOCTYPE html>
<html lang="en">

<head>
    <title>LookFabulous</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="stylesheets/style.css">
    <script type="text/javascript" src="javascript/main.js"></script>

    <!-- GeoPlugin for auto selecting countries, converting currencies and changing content based on the IP address -->
    <?php $geo = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='. $_SERVER["REMOTE_ADDR"]));
          $country = $geo['geoplugin_countryName'];
          $price = 7.30; //In $Dollars
          $delivery = 4.86; //In $Dollars
          $totalPrice = 12.16; //In $Dollars
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
    <div class="container"><!--Beginning of container -->

        <header><!-- Beginning of header -->
            <a href="#"><img class="col-md-4 logo" src="public/images/LookFabulous.png" alt="Lookfabulous.com" width="260px"></a>
            <img class="digicert" src="public/images/digicert.png" alt="Digitcert" width="100px">

            <div class="col-xs-12 logo-mobile">
                <a href="#"><img src="public/images/lf-logo.png" alt="Lookfabulous.com" width="60px"></a>
            </div>

            <div class="required"><!-- Required info -->
                <hr>
                Please provide your billing and delivery information below.<span style="float:right">* Indicates required field</span>
                <hr>
            </div><!-- End of required info -->
        </header><!-- End of header -->

        <section id="progress"><!-- Beginning of progress bar -->
            <ul class="col-xs-8 col-xs-offset-2"><!-- Progress bar for a min-width of 992px -->
                <li><a href="#details">1. Details</a></li>
                <li><a href="#delivery">2. Delivery</a></li>
                <li><a style="color: #28bdb3; border-bottom:2px solid #28bdb3" href="#payment">3. Payment</a></li>
                <li><a href="#confirm">4. Confirm</a></li>
            </ul>

            <div class="progress"><!-- Progress bar for mobile and tablet with a max-width of 991px -->
                <p class="progress-1">1</p>
                <p class="progress-2">2</p>
                <p class="progress-3">3</p>
                <p class="progress-4">4</p>
            </div>
        </section><!-- End of progress bar -->

        <section id="cart"><!-- Beginning of shopping cart/order summary -->
            <div class="cart col-xs-12">
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
                    <!-- PHP for the GeoPlugin to convert prices depending on the country -->
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

                    elseif ($country == "Russia") {
                    echo '&#8381;'.$converted_price_formatted;
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

                    elseif ($country == "Russia") {
                    echo '&#8381;'.$converted_price_formatted;
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

                    elseif ($country == "Russia") {
                    echo '&#8381;'.$converted_price_formatted;
                    }

                    else {
                    echo '&euro;'.$converted_totalPrice_formatted;
                    }?>
                </div>
            </div>
        </section><!-- End of shopping cart/order summary -->

        <section id="payment-method-buttons"><!-- Beginning payment method buttons -->
            <h2>Please choose a payment method</h2>
            <button id="creditDebitCardsBtn" onclick="creditDebitCards()" type="button" href="#checkout-cards" class="btn btn-checkout col-xs-12 col-sm-8 col-sm-offset-2 col-md-4">
                Credit/Debit Card
            </button>

            <button id="paypalBtn" onclick="payPal()" type="button" href="#checkout-paypal" class="btn btn-checkout col-xs-12 col-sm-8 col-sm-offset-2 col-sm-offset-2 col-md-4">
                PayPal
            </button>

            <button id="alipayBtn" onclick="aliPay()" type="button" href="#checkout-alipay" class="btn btn-checkout col-xs-12 col-sm-8 col-sm-offset-2 col-md-4">
                AliPay
            </button>
        </section><!-- End of payment method buttons -->

        <section id="cardsForm" style="display:none"><!-- Beginning of card payment method hidden form  -->
            <div class="required-mobile">
              * Indicates required field
            </div>
            <form>
                <img class="credit-debit" src="public/images/Credit-Debit-Cards.png" alt="Accepted Credit and Debit Cards" title="Accepted Credit and Debit Cards">
                <label class="col-md-2 col-md-offset-3">Card Number*</label>
                <input class="form-control col-md-3 col-sm-8 col-sm-offset-2 col-xs-12" type="text" placeholder="Card Number*">
                <br>

                <label class="col-md-2 col-md-offset-3">Name on Card*</label>
                <input class="form-control col-md-3 col-sm-8 col-sm-offset-2 col-xs-12" type="text" placeholder="Name on Card*">
                <br>

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
                </select>
                <br>

                <label class="col-md-2 col-md-offset-3">CVV*</label>
                <input class="form-control col-md-3 col-sm-8 col-sm-offset-2 col-xs-12" type="text" placeholder="CVV* - 3 digits on the back of your card">

                <label class="help-tip"><!-- Beginning of CVV hover help-tip -->
                    <p>
                        <img src="public/images/cvv.png" alt="CVV" title="CVV" width="100px" style="padding-bottom:10px">
                        <br> The last three digits printed on the signature strip on the back of your card.
                    </p>
                </label><!-- End of help-tip -->
            </form> <!-- End of card payment form (if using same as billing address) -->

            <div id="radio-buttons" class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-offset-3" style="margin-top:35px; margin-bottom:35px;"><!-- Beginnign of radio buttons -->
                <input id="newAddressBtn" name="address" type="radio" href="#newAddressForm" onclick="newAddressHide()" required checked>Use my delivery address as my cardholder address
                <br>
                <input id="newAddressBtn" name="address" type="radio" href="#newAddressForm" onclick="newAddress()" required>Use a different address
            </div><!-- End of radio buttons -->

            <div id="newAddressForm" style="display:none"><!-- Beginning of new address -->
                <form><!-- Beginning of new address form (if the shipping address is different to the billing address) -->
                    <label class="col-md-3 col-md-offset-2">House Name/Number*</label>
                    <input class="form-control col-md-3 col-sm-8 col-sm-offset-2 col-xs-12" type="text" placeholder="House Name or Number*">
                    <br>

                    <label class="col-md-2 col-md-offset-3">Address Line 1*</label>
                    <input class="form-control col-md-3 col-sm-8 col-sm-offset-2 col-xs-12" type="text" placeholder="Address Line 1*">
                    <br>

                    <label class="col-md-2 col-md-offset-3">Address Line 2</label>
                    <input class="form-control col-md-3 col-sm-8 col-sm-offset-2 col-xs-12" type="text" placeholder="Address Line 2 - optional">
                    <br>

                    <label class="col-md-2 col-md-offset-3">City*</label>
                    <input class="form-control col-md-3 col-sm-8 col-sm-offset-2 col-xs-12" type="text" placeholder="City*">
                    <br>
                    <!-- PHP to change the lables of the form based on the country
                         Changes from Post Code when the IP address is in the UK to Zip Code everywhere else -->
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
                      <!-- PHP to auto select the country based on the IP address from GeoPlugin -->
                      <label class="col-md-2 col-md-offset-3">Country*</label>
                      <select class="form-control col-md-3 col-sm-8 col-sm-offset-2 col-xs-12 country">
                          <option value disabled>--- Select Country ---</option>
                          <?php
                          if ($country == "Austrailia"){
                            echo '<option selected>Austrailia</option>';
                          }
                          elseif ($country == "France"){
                            echo '<option selected>France</option>';
                          }
                          elseif ($country == "Germany"){
                            echo '<option selected>Germany</option>';
                          }
                          elseif ($country == "Spain"){
                            echo '<option selected>Spain</option>';
                          }
                          elseif ($country == "Russia"){
                            echo '<option selected>United States</option>';
                          }
                          elseif ($country == "United Kingdom"){
                            echo '<option selected>United Kingdom</option>';
                          }
                          elseif ($country == "United States"){
                            echo '<option selected>United States</option>';
                          }
                        ?>
                        <option disabled>-----------------------------------</option>
                        <option value="AF">Afghanistan</option>
                        <option value="AL">Albania</option>
                        <option value="DZ">Algeria</option>
                        <option value="AS">American Samoa</option>
                        <option value="AD">Andorra</option>
                        <option value="AG">Angola</option>
                        <option value="AI">Anguilla</option>
                        <option value="AG">Antigua &amp; Barbuda</option>
                        <option value="AR">Argentina</option>
                        <option value="AA">Armenia</option>
                        <option value="AW">Aruba</option>
                        <option value="AU">Australia</option>
                        <option value="AT">Austria</option>
                        <option value="AZ">Azerbaijan</option>
                        <option value="BS">Bahamas</option>
                        <option value="BH">Bahrain</option>
                        <option value="BD">Bangladesh</option>
                        <option value="BB">Barbados</option>
                        <option value="BY">Belarus</option>
                        <option value="BE">Belgium</option>
                        <option value="BZ">Belize</option>
                        <option value="BJ">Benin</option>
                        <option value="BM">Bermuda</option>
                        <option value="BT">Bhutan</option>
                        <option value="BO">Bolivia</option>
                        <option value="BL">Bonaire</option>
                        <option value="BA">Bosnia &amp; Herzegovina</option>
                        <option value="BW">Botswana</option>
                        <option value="BR">Brazil</option>
                        <option value="BC">British Indian Ocean Ter</option>
                        <option value="BN">Brunei</option>
                        <option value="BG">Bulgaria</option>
                        <option value="BF">Burkina Faso</option>
                        <option value="BI">Burundi</option>
                        <option value="KH">Cambodia</option>
                        <option value="CM">Cameroon</option>
                        <option value="CA">Canada</option>
                        <option value="IC">Canary Islands</option>
                        <option value="CV">Cape Verde</option>
                        <option value="KY">Cayman Islands</option>
                        <option value="CF">Central African Republic</option>
                        <option value="TD">Chad</option>
                        <option value="CD">Channel Islands</option>
                        <option value="CL">Chile</option>
                        <option value="CN">China</option>
                        <option value="CI">Christmas Island</option>
                        <option value="CS">Cocos Island</option>
                        <option value="CO">Colombia</option>
                        <option value="CC">Comoros</option>
                        <option value="CG">Congo</option>
                        <option value="CK">Cook Islands</option>
                        <option value="CR">Costa Rica</option>
                        <option value="CT">Cote D'Ivoire</option>
                        <option value="HR">Croatia</option>
                        <option value="CU">Cuba</option>
                        <option value="CB">Curacao</option>
                        <option value="CY">Cyprus</option>
                        <option value="CZ">Czech Republic</option>
                        <option value="DK">Denmark</option>
                        <option value="DJ">Djibouti</option>
                        <option value="DM">Dominica</option>
                        <option value="DO">Dominican Republic</option>
                        <option value="TM">East Timor</option>
                        <option value="EC">Ecuador</option>
                        <option value="EG">Egypt</option>
                        <option value="SV">El Salvador</option>
                        <option value="GQ">Equatorial Guinea</option>
                        <option value="ER">Eritrea</option>
                        <option value="EE">Estonia</option>
                        <option value="ET">Ethiopia</option>
                        <option value="FA">Falkland Islands</option>
                        <option value="FO">Faroe Islands</option>
                        <option value="FJ">Fiji</option>
                        <option value="FI">Finland</option>
                        <option value="FR">France</option>
                        <option value="GF">French Guiana</option>
                        <option value="PF">French Polynesia</option>
                        <option value="FS">French Southern Ter</option>
                        <option value="GA">Gabon</option>
                        <option value="GM">Gambia</option>
                        <option value="GE">Georgia</option>
                        <option value="DE">Germany</option>
                        <option value="GH">Ghana</option>
                        <option value="GI">Gibraltar</option>
                        <option value="GR">Greece</option>
                        <option value="GL">Greenland</option>
                        <option value="GD">Grenada</option>
                        <option value="GP">Guadeloupe</option>
                        <option value="GU">Guam</option>
                        <option value="GT">Guatemala</option>
                        <option value="GN">Guinea</option>
                        <option value="GY">Guyana</option>
                        <option value="HT">Haiti</option>
                        <option value="HW">Hawaii</option>
                        <option value="HN">Honduras</option>
                        <option value="HK">Hong Kong</option>
                        <option value="HU">Hungary</option>
                        <option value="IS">Iceland</option>
                        <option value="IN">India</option>
                        <option value="ID">Indonesia</option>
                        <option value="IA">Iran</option>
                        <option value="IQ">Iraq</option>
                        <option value="IR">Ireland</option>
                        <option value="IM">Isle of Man</option>
                        <option value="IL">Israel</option>
                        <option value="IT">Italy</option>
                        <option value="JM">Jamaica</option>
                        <option value="JP">Japan</option>
                        <option value="JO">Jordan</option>
                        <option value="KZ">Kazakhstan</option>
                        <option value="KE">Kenya</option>
                        <option value="KI">Kiribati</option>
                        <option value="NK">Korea North</option>
                        <option value="KS">Korea South</option>
                        <option value="KW">Kuwait</option>
                        <option value="KG">Kyrgyzstan</option>
                        <option value="LA">Laos</option>
                        <option value="LV">Latvia</option>
                        <option value="LB">Lebanon</option>
                        <option value="LS">Lesotho</option>
                        <option value="LR">Liberia</option>
                        <option value="LY">Libya</option>
                        <option value="LI">Liechtenstein</option>
                        <option value="LT">Lithuania</option>
                        <option value="LU">Luxembourg</option>
                        <option value="MO">Macau</option>
                        <option value="MK">Macedonia</option>
                        <option value="MG">Madagascar</option>
                        <option value="MY">Malaysia</option>
                        <option value="MW">Malawi</option>
                        <option value="MV">Maldives</option>
                        <option value="ML">Mali</option>
                        <option value="MT">Malta</option>
                        <option value="MH">Marshall Islands</option>
                        <option value="MQ">Martinique</option>
                        <option value="MR">Mauritania</option>
                        <option value="MU">Mauritius</option>
                        <option value="ME">Mayotte</option>
                        <option value="MX">Mexico</option>
                        <option value="MI">Midway Islands</option>
                        <option value="MD">Moldova</option>
                        <option value="MC">Monaco</option>
                        <option value="MN">Mongolia</option>
                        <option value="MS">Montserrat</option>
                        <option value="MA">Morocco</option>
                        <option value="MZ">Mozambique</option>
                        <option value="MM">Myanmar</option>
                        <option value="NA">Nambia</option>
                        <option value="NU">Nauru</option>
                        <option value="NP">Nepal</option>
                        <option value="AN">Netherland Antilles</option>
                        <option value="NL">Netherlands (Holland, Europe)</option>
                        <option value="NV">Nevis</option>
                        <option value="NC">New Caledonia</option>
                        <option value="NZ">New Zealand</option>
                        <option value="NI">Nicaragua</option>
                        <option value="NE">Niger</option>
                        <option value="NG">Nigeria</option>
                        <option value="NW">Niue</option>
                        <option value="NF">Norfolk Island</option>
                        <option value="NO">Norway</option>
                        <option value="OM">Oman</option>
                        <option value="PK">Pakistan</option>
                        <option value="PW">Palau Island</option>
                        <option value="PS">Palestine</option>
                        <option value="PA">Panama</option>
                        <option value="PG">Papua New Guinea</option>
                        <option value="PY">Paraguay</option>
                        <option value="PE">Peru</option>
                        <option value="PH">Philippines</option>
                        <option value="PO">Pitcairn Island</option>
                        <option value="PL">Poland</option>
                        <option value="PT">Portugal</option>
                        <option value="PR">Puerto Rico</option>
                        <option value="QA">Qatar</option>
                        <option value="ME">Republic of Montenegro</option>
                        <option value="RS">Republic of Serbia</option>
                        <option value="RE">Reunion</option>
                        <option value="RO">Romania</option>
                        <option value="RU">Russia</option>
                        <option value="RW">Rwanda</option>
                        <option value="NT">St Barthelemy</option>
                        <option value="EU">St Eustatius</option>
                        <option value="HE">St Helena</option>
                        <option value="KN">St Kitts-Nevis</option>
                        <option value="LC">St Lucia</option>
                        <option value="MB">St Maarten</option>
                        <option value="PM">St Pierre &amp; Miquelon</option>
                        <option value="VC">St Vincent &amp; Grenadines</option>
                        <option value="SP">Saipan</option>
                        <option value="SO">Samoa</option>
                        <option value="AS">Samoa American</option>
                        <option value="SM">San Marino</option>
                        <option value="ST">Sao Tome &amp; Principe</option>
                        <option value="SA">Saudi Arabia</option>
                        <option value="SN">Senegal</option>
                        <option value="RS">Serbia</option>
                        <option value="SC">Seychelles</option>
                        <option value="SL">Sierra Leone</option>
                        <option value="SG">Singapore</option>
                        <option value="SK">Slovakia</option>
                        <option value="SI">Slovenia</option>
                        <option value="SB">Solomon Islands</option>
                        <option value="OI">Somalia</option>
                        <option value="ZA">South Africa</option>
                        <option value="ES">Spain</option>
                        <option value="LK">Sri Lanka</option>
                        <option value="SD">Sudan</option>
                        <option value="SR">Suriname</option>
                        <option value="SZ">Swaziland</option>
                        <option value="SE">Sweden</option>
                        <option value="CH">Switzerland</option>
                        <option value="SY">Syria</option>
                        <option value="TA">Tahiti</option>
                        <option value="TW">Taiwan</option>
                        <option value="TJ">Tajikistan</option>
                        <option value="TZ">Tanzania</option>
                        <option value="TH">Thailand</option>
                        <option value="TG">Togo</option>
                        <option value="TK">Tokelau</option>
                        <option value="TO">Tonga</option>
                        <option value="TT">Trinidad &amp; Tobago</option>
                        <option value="TN">Tunisia</option>
                        <option value="TR">Turkey</option>
                        <option value="TU">Turkmenistan</option>
                        <option value="TC">Turks &amp; Caicos Is</option>
                        <option value="TV">Tuvalu</option>
                        <option value="UG">Uganda</option>
                        <option value="UA">Ukraine</option>
                        <option value="AE">United Arab Emirates</option>
                        <option value="GB">United Kingdom</option>
                        <option value="US">United States of America</option>
                        <option value="UY">Uruguay</option>
                        <option value="UZ">Uzbekistan</option>
                        <option value="VU">Vanuatu</option>
                        <option value="VS">Vatican City State</option>
                        <option value="VE">Venezuela</option>
                        <option value="VN">Vietnam</option>
                        <option value="VB">Virgin Islands (Brit)</option>
                        <option value="VA">Virgin Islands (USA)</option>
                        <option value="WK">Wake Island</option>
                        <option value="WF">Wallis &amp; Futana Is</option>
                        <option value="YE">Yemen</option>
                        <option value="ZR">Zaire</option>
                        <option value="ZM">Zambia</option>
                        <option value="ZW">Zimbabwe</option>
                    </select><!-- End of country selector/dropdown -->
                </form><!-- End of different shipping address form -->
            </div><!-- End of New address -->
        </section><!-- End of card payment method forms -->

        <section id="payPal" style="display:none"><!-- Beginning of PayPal hidden content -->
            <img class="paypal" src="public/images/PayPal.png" alt="PayPay" title="Pay by PayPal">
            <p style="color: #ababab">Please note that using the PayPal checkout will attract a 1% surcharge to the cost of your order.</p>
            <p>You will be re-directed to PayPal.</p>
        </section><!-- End of PayPal -->

        <section id="aliPay" style="display:none"><!-- Beginning of AliPay hidden content -->
            <img class="alipay" src="public/images/AliPay.png" alt="AliPay" title="Pay by AliPay">
            <p>You will be re-directed to AliPay.</p>
        </section><!-- End of AliPay -->

        <hr>
        <section id="confirm-order"><!-- Beginning of confirm order button -->
            <button type="button" href="#" class="btn btn-submit col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 col-xs-12">Submit My Order</button>

            <button type="button" href="#" class="btn btn-back col-sm-8 col-sm-offset-2 col-xs-12">Back</button><!-- Mobile back button -->

            <p style="margin: 40px">By placing this order, your are confirming that you agree to our <u class="tandc-pp">Terms and Conditions</u> and <u class="tandc-pp">Privacy Policy</u></p>
        </section><!-- End of confirm order -->
    </div><!-- End of container -->

    <footer><!-- Beginning of footer -->
        &copy; Jacob Cleaver 2017 - LookFabulous Checkout Form
    </footer><!-- End of footer -->

</body>

</html>
