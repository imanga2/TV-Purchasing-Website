<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="utf-8"/>
     <meta name="description" content="enquiry page"/>
     <meta name="keywords" content="questions and querry"/>
     <meta name="author" content="Ishaan"/>
	
	 <title>TV Purchase Enquiry</title>
	 <link rel="stylesheet" href="css/style.css"> 
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="scripts/enquiry.js"></script>
	
  
</head>
<body>


<?php include('./includes/header.inc') ?>
   
    <!-- sticky icon bar -->
	
    <div class="icon-bar">
  <a href="#" class="facebook"><i class="fa fa-facebook"></i></a> 
  <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>  
  <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
  <a href="#" class="youtube"><i class="fa fa-youtube"></i></a> 
</div>
  
	  
	   <!-- enquiry -->
	   
	   
	  <h1 class="head"> Enquiry </h1>
	  <form id="enquiryForm" method="post" action="payment.php" novalidate="novalidate">
  
	  <img src="images/enquiry.png" id="enquiry" alt="enquiry form pic" height="250"/>
	  
	  
	  <h2> Fill the details below to proceed for Payment Options.</h2>
	 <fieldset class="name"> 
	  <legend><i class="fa fa-user"></i> PERSONAL DETAILS</legend>
	 
		           <p class="name"><label class="name" for="firstName"> Given Name<strong class="star">*</strong></label>
				   <input type="text" id="firstName" name="firstName" pattern="^[A-Za-z]+$" maxlength="25" placeholder="Enter Your First Name"></p>
			<div id="firstName-error" class="error"></div>


	 
		 <p class="name"><label class="name" for="lastName"> Family Name<strong class="star">*</strong></label>
            <input type="text" id="lastName" name="lastName" pattern="^[A-Za-z]+$" maxlength="25" placeholder="Enter Your Surname"></p>
			<div id="lastName-error" class="error"></div>
		</fieldset> 
		<fieldset class="address">
		<legend><i class="fa fa-institution"></i>  ADDRESS</legend>
		<p class="address"><label class="address" for="street">Street Address<strong class="star">*</strong></label>
		  <input type="text" name="street" maxlength="40" id="street" placeholder="Enter your steet"/></p>
		  <div id="street-error" class="error"></div>
		 
       <p class="address"><label class="address" for="town">Suburb/Town<strong class="star">*</strong></label>
          <input type="text" maxlength="20" name="town" id="town" placeholder="Enter Your Town"/></p>
		  <div id="town-error" class="error"></div>
		  <p class="address"><label class="address" for="state">State<strong class="star">*</strong></label>
        <select name="state" id="state">
		     <option value="plsSelect">Please Select</option>
			 <option value="VIC">VIC</option>
			 <option value="NSW">NSW</option>
			 <option value="QLD">QLD</option>
			 <option value="NT">NT</option>
			 <option value="WA">WA</option>
			 <option value="SA">SA</option>
			 <option value="TAS">TAS</option>
			 <option value="ACT">ACT</option>
		</select>
		<p class="address"><Label class="address">Post Code<strong class="star">*</strong></Label>
		<input type="text" id="postcode" name="postcode" pattern="[0-9]{4,4}" placeholder="####" maxlength="4"/></p>
		<div id="postcode-error" class="error"></div>
		
       </fieldset>   
	  <fieldset class="contact">
	  <legend><i class="fa fa-address-card-o"></i> CONTACT DETAILS</legend>
	  <p class="contact"><label class="contact" for="phoneNo">Phone No.<strong class="star">*</strong></label>
	     <input type="tel" name="phoneNo" placeholder="##########" pattern="[0-9]{10}" id="phoneNo" maxlength="10"/></p>
		 <div id="phoneNo-error" class="error"></div>
	  <p class="contact"><label class="contact" for="email"> Email ID<strong class="star">*</strong></label>
         <input type="email" name="email" placeholder="name@domain.com" id="email"/></p>
		 <div id="email-error" class="error"></div>
		
	 <p class="contact"><label class="contact">Preferred Contact:</label></p>
	 <p class="contact"><input type="radio" id="phone" class="prefcont" name="Preferred" value="Phone"/>
	 <label class="contact" for="phone">PhoneNo</label>
	 
	 <input type="radio" id="email-contact" class="prefcont" name="Preferred" value="Email"/>
	 <label class="contact" for="email">Email</label>
	  
	 <input type="radio" id="post" class="prefcont" name="Preferred" value="Post"/>
	 <label class="contact" for="post">Post</label>
	  
	  </p>
		 </fieldset>		  
		<fieldset class="product">
		<legend>Product Detail</legend>
		<section id="cardeffect">
   <div class="enqcard">
		<div class="enqbox">
			<img src="images/tv7.jpg" alt="TV Model 2021"><h2>Model 2021<br><br>Price:<em> $1800</em></h2><h3>32 inch<br>LED<br>Black<br>Select Item <input type="radio" id="model1" value="2021" class="enqradio" name="model" required="required"></h3>
		
		 <span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
		</div>
		<div class="enqbox">
			<img src="images/tv4.jpg" alt="TV Model 2020"><h2>Model 2020<br><br>Price:<em> $1600</em></h2><h3>32 inch<br>LED<br>Black<br>Select Item <input type="radio" id="model2" value="2020" class="enqradio" name="model"></h3>
		<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
		</div>
		<div class="enqbox">
			<img src="images/tv3.jpg" alt="TV Model 2019"><h2>Model 2019<br><br>Price:<em> $1400</em></h2><h3>28 inch<br>LCD<br>Dark Grey<br>Select Item <input type="radio" id="model3" value="2019" class="enqradio" name="model"></h3>
		<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
		</div>
		<div class="enqbox">
			<img src="images/tvpurchase.jpg" alt="TV Model 2018"><h2>Model 2018<br><br>Price:<em> $1200</em></h2><h3>26 inch<br>LCD<br>Grey<br>Select Item <input type="radio" id="model4" value="2018" class="enqradio" name="model"></h3>
		<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
		</div>
	</div></section>
		
		<label for="qty">Quantity<strong class="star">*</strong> :</label>
		<input type="number" name="qty" id="qty"/> <div id="qty-error" class="error"></div>
		<p class="product">Feedback and Comments:</p>
	 <textarea id="comments" name="Description" placeholder="Enquire Here" rows="10" cols="60"></textarea>
	 </fieldset>
       
	<input type="reset" class="submit" value="RESET"/>
    <input type="submit" class="submit" value="PAY NOW"/>
	
	<hr>
</form>

<?php include('./includes/footer.inc') ?>
   
</body>
</html>