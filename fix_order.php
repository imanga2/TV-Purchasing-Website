<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
     <meta name="description" content="Online TV Shoppping"/>
     <meta name="keywords" content="TV purchase"/>
     <meta name="author" content="Ishaan"/>

     <link rel="stylesheet" href="css/style.css"> 
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" integrity="sha512-PgQMlq+nqFLV4ylk1gwUOgm6CtIIXkKwaIHp/PAIWHzig/lKZSEGKEysh0TCVbHJXCLN7WetD8TFecIky75ZfQ==" crossorigin="anonymous" />
   <script src="scripts/payment.js" async></script>

    <title>Fix Order PHP</title>
</head>
<body>
<?php include('./includes/header.inc') ;
    session_start();
  print_r($_SESSION["errMsg"]);
 
  if (!isset($_POST["firstName"]) && !isset($_SESSION["firstName"])){
 
  header("location:enquire.php");
   exit();
};
?>
                     <!--CREATING FORM FOR USERS TO FILL CORRECT DETAILS AGAIN -->

  <form id="enquiryForm" method="POST" action="process_order.php" novalidate="novalidate">
  
  
  <h2> Fill the incorrect fields again.</h2>
 <fieldset class="name"> 
  <legend><i class="fa fa-user"></i> PERSONAL DETAILS</legend>
 
             <p class="name"><label class="name" for="firstName"> Given Name<strong class="star">*</strong></label>
         <input type="text" id="firstName" name="firstName" value="<?php echo $_SESSION["firstName"] ?>" pattern="^[A-Za-z]+$" maxlength="25" placeholder="Enter Your First Name"></p>
        

 
   <p class="name"><label class="name" for="lastName"> Family Name<strong class="star">*</strong></label>
      <input type="text" id="lastName" name="lastName" value="<?php echo $_SESSION["lastName"] ?>" pattern="^[A-Za-z]+$" maxlength="25" placeholder="Enter Your Surname"></p>
   
  </fieldset> 
  <fieldset class="address">
  <legend><i class="fa fa-institution"></i>  ADDRESS</legend>
  <p class="address"><label class="address" for="street">Street Address<strong class="star">*</strong></label>
    <input type="text" name="street" maxlength="40" value="<?php echo $_SESSION["street"] ?>"  id="street" placeholder="Enter your steet"/></p>
  
   
     <p class="address"><label class="address" for="town">Suburb/Town<strong class="star">*</strong></label>
        <input type="text" maxlength="20" name="town" value="<?php echo $_SESSION["town"] ?>" id="town" placeholder="Enter Your Town"/></p>
    

    <p class="address"><label class="address" for="state">State<strong class="star">*</strong></label>
      <select name="state" id="state">
       <option value="plsSelect">Please Select</option>
     <option value="VIC" <?php echo ($_SESSION["state"] == "VIC") ? "selected" : "" ?>>VIC</option>
     <option value="NSW" <?php echo ($_SESSION["state"] == "NSW") ? "selected" : "" ?>>NSW</option>
     <option value="QLD" <?php echo ($_SESSION["state"] == "QLD") ? "selected" : "" ?>>QLD</option>
     <option value="NT" <?php echo ($_SESSION["state"] == "NT") ? "selected" : "" ?>>NT</option>
     <option value="WA" <?php echo ($_SESSION["state"] == "WA") ? "selected" : "" ?>>WA</option>
     <option value="SA" <?php echo ($_SESSION["state"] == "SA") ? "selected" : "" ?>>SA</option>
     <option value="TAS" <?php echo ($_SESSION["state"] == "TAS") ? "selected" : "" ?>>TAS</option>
     <option value="ACT" <?php echo ($_SESSION["state"] == "ACT") ? "selected" : "" ?>>ACT</option>
  </select>
  <p class="address"><Label class="address">Post Code<strong class="star">*</strong></Label>
  <input type="text" id="postcode" name="postcode" value="<?php echo $_SESSION["postcode"] ?>" pattern="[0-9]{4,4}" placeholder="####" maxlength="4"/></p>
 
  
     </fieldset>   
  <fieldset class="contact">
  <legend><i class="fa fa-address-card-o"></i> CONTACT DETAILS</legend>
  <p class="contact"><label class="contact" for="phoneNo">Phone No.<strong class="star">*</strong></label>
     <input type="tel" name="phoneNo" placeholder="##########" value="<?php echo $_SESSION["phoneNo"] ?>" pattern="[0-9]{10}" id="phoneNo" maxlength="10"/></p>
  
  <p class="contact"><label class="contact" for="email"> Email ID<strong class="star">*</strong></label>
       <input type="email" name="email" value="<?php echo $_SESSION["email"] ?>" placeholder="name@domain.com" id="email"/></p>
  

                                             <!--PRODUCT DETAILS-->
  </p>
   </fieldset>		  
  <fieldset class="product">
  <legend>Product Detail</legend>
  <section id="cardeffect">
 <div class="enqcard">
  <div class="enqbox">
    <img src="images/tv7.jpg" alt="TV Model 2021"><h2>Model 2021<br><br>Price:<em> $1800</em></h2><h3>32 inch<br>LED<br>Black<br>Select Item <input type="radio" id="model1" value="2021" <?php echo ($_SESSION["model"] == "2021") ? "checked='checked'": "" ?> class="enqradio" name="model" required="required"></h3>
  
   <span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
  </div>
  <div class="enqbox">
    <img src="images/tv4.jpg" alt="TV Model 2020"><h2>Model 2020<br><br>Price:<em> $1600</em></h2><h3>32 inch<br>LED<br>Black<br>Select Item <input type="radio" id="model2" value="2020" <?php echo ($_SESSION["model"] == "2020") ? "checked='checked'": "" ?> class="enqradio" name="model"></h3>
  <span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
  </div>
  <div class="enqbox">
    <img src="images/tv3.jpg" alt="TV Model 2019"><h2>Model 2019<br><br>Price:<em> $1400</em></h2><h3>28 inch<br>LCD<br>Dark Grey<br>Select Item <input type="radio" id="model3" value="2019" <?php echo ($_SESSION["model"] == "2019") ? "checked='checked'": "" ?> class="enqradio" name="model"></h3>
  <span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
  </div>
  <div class="enqbox">
    <img src="images/tvpurchase.jpg" alt="TV Model 2018"><h2>Model 2018<br><br>Price:<em> $1200</em></h2><h3>26 inch<br>LCD<br>Grey<br>Select Item <input type="radio" id="model4" value="2018" <?php echo ($_SESSION["model"] == "2018") ? "checked='checked'": "" ?> class="enqradio" name="model"></h3>
  <span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
  </div>
</div></section>
  
  <label for="qty">Quantity<strong class="star">*</strong> :</label>
  <input type="number" name="qty" value="<?php echo $_SESSION["qty"] ?>" id="qty"/> 
  <label class="hidden1" for="totalPrice">Total Price</label>
  <input type="text" class="stordet" name="totalPrice" id="totalPrice" readonly><br>
  <input type="hidden" class="stordet" name="cost" id="cost" readonly>
 </fieldset><br>
<hr><br>

<div class="creditrow">
                                        <!--CARD DETAILS-->
          <div class="col-50">
            <h3>Payment</h3>
            <label class="paylabel">Accepted Cards</label>
            <div class="icon-container">
			<input type="radio" required="required" class="acceptedcards1" id="accptcard1" name="Preferred" value="Visa"/>
              <i class="fa fa-cc-visa" style="color:navy;"></i>			
			  <label class="acceptedcards" for="accptcard1">Visa</label>
	       
             <input type="radio" required="required" class="acceptedcards1" id="accptcard2" name="Preferred" value="American Express"/>
			 <i class="fa fa-cc-amex" style="color:blue;"></i>
			  <label class="acceptedcards" for="accptcard2">American Express</label>
	       
              <input type="radio" required="required" class="acceptedcards1" id="accptcard3" name="Preferred" value="Mastercard"/>
			  <i class="fa fa-cc-mastercard" style="color:red;"></i>
			  <label class="acceptedcards" for="accptcard3">Mastercard</label>
	      
              
	       
            </div>        
     		
            <label class="paylabel" for="cardName">Name on Card</label>
            <input class="payinput" type="text" id="cardName" name="cardName" pattern="^[a-zA-Z ]+$" maxlength="40" required="required" placeholder="Name on Card, Only Alphabets and space allowed (Max 40 characters)"/>
			<div id="cardName-error" class="error"></div>
            <label class="paylabel" for="cardNumber">Credit card number</label>
            <input class="payinput" type="text" id="cardNumber" name="cardNumber" maxlength="16" pattern=".{15,16}" placeholder="####-####-####-####"/>
            <div id="cardNumber-error" class="error"></div>

            <div class="creditrow">
              <div class="col-50">
                <label class="paylabel" for="expyear">Exp Year</label>
                <input class="payinput" type="text" name="expyear" placeholder="MM / YY" pattern="^(0[1-9]|1[0-2])/([0-9]{2})$" required="required" maxlength="5" id="expyear" />
               <div id="expyear-error" class="error"></div>
      
	        <div class="col-50">
                <label class="paylabel" for="cvv">CVV</label>
                <input class="payinput" type="text" id="cvv" pattern="^[0-9]{3,4}$" maxlength="3" name="cvv" required="required" placeholder="***"/>
                 <div id="cvv-error" class="error"></div>
              </div>
             </div>
             
            </div>
          </div>

        </div>
        </fieldset>
      
		<input type="submit" value="Continue to checkout" class="paybtn"/>
		  <input type="reset" id="cancel" class="cancelbtn" value="Cancel Order"/>
     
</form>

<?php include('./includes/footer.inc') ?>
 
</body>
</html>