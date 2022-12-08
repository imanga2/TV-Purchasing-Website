<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="utf-8"/>
     <meta name="payment" content="Product payment page"/>
     <meta name="keywords" content="TV Payment"/>
     <meta name="author" content="Ishaan"/>
	 
	 <title>TV Payment Procedure</title>
	 <link rel="stylesheet" href="css/style.css"> 
	 <script src="scripts/payment.js" async></script>
	<script src="scripts/enhancements2.js" async></script>
	
	  
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" integrity="sha512-PgQMlq+nqFLV4ylk1gwUOgm6CtIIXkKwaIHp/PAIWHzig/lKZSEGKEysh0TCVbHJXCLN7WetD8TFecIky75ZfQ==" crossorigin="anonymous" />
	 
	
</head>
<body>


<?php include('./includes/header.inc') ?>
  
	   <!-- sticky icon Bar -->
	 
	 
	 <div class="icon-bar">
  <a href="#" class="facebook"><i class="fa fa-facebook"></i></a> 
  <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>  
  <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
  <a href="#" class="youtube"><i class="fa fa-youtube"></i></a> 
  </div>
	 
	 
 
	  
	               <!-- CREDIT CARD -->
	
	
   <div class="creditrow">
  <div class="col-75">
   
  <div class="creditcontainer">
	  <h1 class="congo">CONGRATULATIONS !! You are just one step away from Buying ishTV Television</h1> 
      <form method="post" id="paymentDetails" action="process_order.php" novalidate>

      <input type="hidden" class="stordet" name="cost" id="cost" readonly>
	  
       <fieldset> 
	  <legend><i class="fa fa-user"></i> PERSONAL DETAILS</legend>
	
		<p class="hidden1"><label for="firstName"> Given Name</label>
	    <input type="text" class="stordet" id="firstName" name="firstName" value="<?php echo $_POST["firstName"]; ?>" readonly> 
		<!--<p class="hidden1">Given Name : <span id="firstName" class="stordet"></span></p>	-->



		 <p class="hidden1"><label for="lastName"> Family Name</label>
            <input type="text" class="stordet" id="lastName" name="lastName" value="<?php echo $_POST["lastName"]; ?>" readonly>
		<!--<p class="hidden1">Family Name : <span id="lastName" class="stordet"></span></p> -->
			
		</fieldset> 
		<fieldset>
		<legend><i class="fa fa-institution"></i>  ADDRESS</legend>
		<p class="hidden1"><label for="street">Street Address</label>
		  <input type="text" class="stordet" name="street" value="<?php echo $_POST["street"]; ?>" id="street" readonly>
		 </p> 
		<!-- <p class="hidden1">Street Address : <span id="street" class="stordet"></span></p> -->
		 
       <p class="hidden1"><label for="town">Suburb/Town</label>
          <input type="text" class="stordet" value="<?php echo $_POST["town"]; ?>" name="town" id="town" readonly>
		<!--  <p class="hidden1">Suburb/Town : <span id="town" class="stordet"></span></p>-->
		  
		 <p class="hidden1"><label for="state">State</label>
          <input type="text" class="stordet"name="state" value="<?php echo $_POST["state"]; ?>" id="state" readonly> 
		  <!--  <p class="hidden1">State : <span id="state" class="stordet"></span></p>-->
		  
		<p class="hidden1"><Label>Post Code</Label>
		<input type="text" class="stordet" id="postcode" name="postcode" value="<?php echo $_POST["postcode"]; ?>" readonly>
		</p>
		<!-- <p class="hidden1">Postcode : <span id="postcode" class="stordet"></span></p>-->
		
       </fieldset>   
	  <fieldset>
	  <legend><i class="fa fa-address-card-o"></i> CONTACT DETAILS</legend>
	  <p class="hidden1"><label for="phoneNo">Phone No.</label>
	     <input type="tel" class="stordet" name="phoneNo" value="<?php echo $_POST["phoneNo"]; ?>" id="phoneNo"readonly>
		<!-- <p class="hidden1">Phone No. : <span id="phoneNo" class="stordet"></span></p>-->
		 
	   <p class="hidden1"><label for="email"> Email ID</label>
         <input type="email" class="stordet" name="email" value="<?php echo $_POST["email"]; ?>" id="email" readonly>
		 </p>
		<!--  <p class="hidden1">Email : <span id="email" class="stordet"></span></p>

     <input type="hidden" id="hid1" name="firstName"/>
	  <input type="hidden" id="hid2" name="lastName"/>
	  <input type="hidden" id="hid3" name="street"/>
	  <input type="hidden" id="hid4" name="town"/>
	  <input type="hidden" id="hid5" name="state"/>
	  <input type="hidden" id="hid6" name="postcode"/>
	  <input type="hidden" id="hid7" name="phoneNo"/>
	  <input type="hidden" id="hid8" name="email"/> -->
	  
		 </fieldset>		  
		<fieldset>
		<legend><i class="fa fa-shopping-cart"></i> PRODUCT DETAILS</legend>
        
		     <label class="hidden1" for="modelDetails">Model Year</label>
			 <input type="text" class="stordet" name="model" value="<?php echo isset($_POST["model"]) ? $_POST["model"] : ""; ?>" id="modelDetails" readonly>
			 
			 <label class="hidden1" for="qty">Quantity</label>
			 <input type="text" class="stordet" value="<?php echo $_POST["qty"]; ?>" name="qty" id="qty" readonly>
			 
			 <label class="hidden1" for="totalPrice">Total Price</label>
			 <input type="text" class="stordet" name="totalPrice" id="totalPrice" readonly>
		
          <br><br>

        <div class="creditrow">

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
      
		<input type="submit" name="sbmt" value="Continue to checkout" class="paybtn"/>
		  <input type="reset" id="cancel" class="cancelbtn" value="Cancel Order"/>
      </form>
	  
    </div>
  </div>
</div>
        
	  	<!-- footer -->
	
 <?php include('./includes/footer.inc') ?>


</body>

</html>	  