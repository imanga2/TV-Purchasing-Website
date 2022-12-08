<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Online TV Shoppping"/>
     <meta name="keywords" content="TV purchase"/>
     <meta name="author" content="Ishaan"/>

     <link rel="stylesheet" href="css/style.css"> 
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Receipt PHP</title>
</head>
 
<?php include('./includes/header.inc') ?>
<body>
    

<?php
 session_start(); 


 ?>
  <h2 class="align-center">Order Receipt</h2>
 <table id="receipt">
 <tbody>
 <tr>                                       <!-- RECEIPT ORDER TABLE --> 
     <td class="receipt"><strong>Order ID</strong></td>
        <td class="receipt"><?php echo $_SESSION["order_id"]; ?></td>

 </tr>
 <tr>
      <td class="receipt"><strong>First Name</strong></td>
       <td class="receipt"><?php echo $_SESSION["firstName"]. " " .$_SESSION["lastName"] ;?></td>
      
 </tr>
 
<tr> 
        <td class="receipt"><strong>Address</strong></td>
        <td class="receipt"><?php echo $_SESSION["street"]. " " .$_SESSION["town"]. " " .$_SESSION["state"]  ?></td>
         			
 </tr>
 

 <tr> 
      <td class="receipt"><strong>Post Code</strong></td>
       <td class="receipt"><?php echo $_SESSION["postcode"] ; ?></td>
        
  </tr>

 <tr> 
      <td class="receipt"><strong>Phone No.</strong></td>
       <td class="receipt"><?php echo $_SESSION["phoneNo"] ; ?></td>
        
  </tr>

  <tr> 
      <td class="receipt"><strong>Email</strong></td>
       <td class="receipt"><?php echo $_SESSION["email"] ; ?></td>
        
  </tr>

  <tr> 
      <td class="receipt"><strong>Model</strong></td>
       <td class="receipt"><?php echo $_SESSION["model"] ; ?></td>
        
  </tr>

  <tr> 
      <td class="receipt"><strong>Quantity</strong></td>
       <td class="receipt"><?php echo $_SESSION["qty"] ; ?></td>
        
  </tr>

  <tr> 
      <td class="receipt"><strong>Total Price</strong></td>
       <td class="receipt"><?php echo "$" . $_SESSION["totalPrice"] ; ?></td>
        
  </tr>

  <tr> 
      <td class="receipt"><strong>Card Type</strong></td>
       <td class="receipt"><?php echo $_SESSION["Preferred"] ; ?></td>
        
  </tr>

  <tr> 
      <td class="receipt"><strong>Card Holder Name</strong></td>
       <td class="receipt"><?php echo $_SESSION["cardName"] ; ?></td>
        
  </tr>

  <tr> 
      <td class="receipt"><strong>Card Number</strong></td>
       <td class="receipt"><?php echo $_SESSION["cardNumber"] ; ?></td>
        
  </tr>

  <tr> 
      <td class="receipt"><strong>Card Expiry</strong></td>
       <td class="receipt"><?php echo $_SESSION["expyear"] ; ?></td>
        
  </tr>

  <tr> 
      <td class="receipt"><strong>Card CVV</strong></td>
       <td class="receipt"><?php echo $_SESSION["cvv"] ; ?></td>
        
  </tr>

  <tr> 
      <td class="receipt"><strong>Order Time</strong></td>
       <td class="receipt"><?php echo $_SESSION["order_time"] ; ?></td>
        
  </tr>
 </tbody>
</table>	 
 
  <br>

<?php include('./includes/footer.inc') ?>

</body>
</html>