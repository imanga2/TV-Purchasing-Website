<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php process order</title>
</head>
<body>
<?php require_once ("settings.php");
   session_start();

   $conn = @mysqli_connect($host,
   $user,
   $pwd,
   $sql_db);

  function sanitise_input($data){
   $data = trim($data);				//remove spaces
   $data = stripslashes($data);		//remove backslashes in front of quotes
   $data = htmlspecialchars($data);	//convert HTML special characters to HTML code
   return $data;
} 
$errMsg = "";		//Error message
 
if (!isset($_POST["firstName"]) && !isset($_SESSION["firstName"])){
    header("location:enquire.php");
	    exit();
   };

$firstName = sanitise_input($_POST["firstName"]);		//sanitise input
if (!preg_match("/^[a-zA-Z]{1,25}+$/", $firstName)) {
     $errMsg .= "<p class='align-center'>First name must contains only alphabetical characters and in between 1-25 characters length.</p>\n";
 }

 //Last name validation
 $lastName = sanitise_input($_POST["lastName"]);		//sanitise input
if (!preg_match("/^[a-zA-Z]{1,25}+$/", $lastName)) {
     $errMsg .= "<p class='align-center'>Last name must contains only alphabetical characters and in between 1-25 characters length.</p>\n";
 }
 
 $street = sanitise_input($_POST["street"]);		//sanitise input
 if (!preg_match("/^[a-zA-Z0-9 ,.'-]{1,40}$/", $street)) {
      $errMsg .= "<p class='align-center'>Your street must contains only alphanumeric values, commas, dots and hyphens.</p>\n";
  }

  //Town validation
  $town = sanitise_input($_POST["town"]);			//sanitise input
 if (!preg_match("/^[a-zA-Z]{1,20}+$/", $town)) {
      $errMsg .= "<p class='align-center'>Your town must contains only alphabetical characters.</p>\n";
  }

  //State validation
  $state = sanitise_input($_POST["state"]);			//sanitise input
 if ($state == "none"){								//if state has not been selected
    $errMsg .= "<p class='align-center'>You must select your state.</p>\n";
 }
 
 $postcode = sanitise_input($_POST["postcode"]);		//sanitise input
		if (!preg_match("/[0-9]{4,4}/", $postcode)) {
	        $errMsg .= "<p class='align-center'>Your post code must be a 4-digit number.</p>\n";
	    }
	    else{
	    	switch ($state){
			case "VIC":
				if ($postcode[0] != "3" && $postcode[0] != "8"){					//VIC post code must start with 3 or 8
					$errMsg .= "<p class='align-center'>VIC post code must start with 3 or 8.</p>\n";
				}
				break;
			
			case "QLD":
				if ($postcode[0] != "4" && $postcode[0] != "9"){					//QLD post code must start with 4 or 9
					$errMsg .= "<p class='align-center'>QLD post code must start with 4 or 9.</p>\n";
				}
				break;
			
			case "SA":
				if ($postcode[0] != "5"){										//SA post code must start with 5
					$errMsg .= "<p class='align-center'>SA post code must start with 5.</p>\n";
				}
				break;
			case "TAS":
				if ($postcode[0] != "7"){										//TAS post code must start with 7
					$errMsg .= "<p class='align-center'>TAS post code must start with 7.</p>\n";
				}
				break;
         case "WA":
            if ($postcode[0] != "6"){										//NA post code must start with 6
                  $errMsg .= "<p class='align-center'>WA post code must start with 6.</p>\n";
               }
            break;
			case "NT":
            if ($postcode[0] != "0"){										//NT and ACT post code must start with 0
					$errMsg .= "<p class='align-center'>NT post code must start with 0.</p>\n";
				}
				break;
			case "ACT":
				if ($postcode[0] != "0"){										//NT and ACT post code must start with 0
					$errMsg .= "<p class='align-center'>ACT post code must start with 0.</p>\n";
				}
				break;
         case "NSW":
             if ($postcode[0] != "1" && $postcode[0] != "2"){					//NSW post code must start with 1 or 2
                  $errMsg .= "<p class='align-center'>NSW post code must start with 1 or 2.</p>\n";
               }
            break;
			}
	    }

  $phoneNo = sanitise_input($_POST["phoneNo"]);			//sanitise input
      if (!preg_match("/[0-9]{10}/", $phoneNo)) {
            $errMsg .= "<p class='align-center'>Your phoneNo number must be of 10 digits and not alphabetical value.</p>\n";
        }

   $email = sanitise_input($_POST["email"]);			//sanitise input
   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errMsg = "<p class='align-center'>Invalid email format .</p>\n";
    }
 
   $qty = sanitise_input($_POST["qty"]);
       if ($qty <= 0 || $qty >= 15){
         $errMsg .= "<p class='align-center'>Quantity should be a positive value and less than 15.</p>\n";
       }
      
    $model = sanitise_input($_POST["model"]);
    if ( $model == "" ){
      $errMsg .= "<p class='align-center'>Please select a model.</p>\n";
    }

    $cost = sanitise_input($_POST["cost"]);
     
    $totalPrice = (int)$cost * (int)$qty;
 // $totalPrice = sanitise_input($_POST["totalPrice"]);

 $Preferred = sanitise_input($_POST["Preferred"]);			//sanitise input
       if ($Preferred == "none"){								//if state has not been selected
          $errMsg .= "<p class='align-center'>You must select your card type.</p>\n";
       }
 
 $cardName = sanitise_input($_POST["cardName"]);			//sanitise input
       if ($cardName == ""){
          $errMsg .= "<p class='align-center'>You must enter your name on card.</p>\n";
       }
       else if (!preg_match("/^[a-zA-Z ]{1,40}$/", $cardName)) {
            $errMsg .= "<p class='align-center'>Card name must contains only alphabetical characters and cannot exceed 40 characters.</p>\n";
        }
 
 $cardNumber = sanitise_input($_POST["cardNumber"]);		//sanitise input
        if ($cardNumber == ""){								//if state has not been selected
           $errMsg .= "<p class='align-center'>You must enter your card number.</p>\n";
        }
        else{
           switch ($Preferred){
           case "Visa": 																							//post code check for visa type
              if ($cardNumber[0] != "4"){																			//check if first number is 4
                 $errMsg .= "<p class='align-center'>Visa card number must start with 4.</p>\n";
              }
              else if (!preg_match("/^\d{16}$/", $cardNumber)){													//check if length is 16 and only contains numbers
                 $errMsg .= "<p class='align-center'>Visa card number must be 16 digits and contains numbers only.</p>\n";
              }
              break;
           case "Mastercard": 																							//post code check for mastercard type
              if (!($cardNumber[0] == "5" && ($cardNumber[1] >= 1 && $cardNumber[1] <= 5))){						//check if first 2 numbers are 51->55
                 $errMsg .= "<p class='align-center'>MasterCard must start with digits \"51\" through to \"55\".</p>\n";
              }
              else if (!preg_match("/^\d{16}$/", $cardNumber)){													//check if length is 16 and only contains numbers
                 $errMsg .= "<p class='align-center'>MasterCard number must be 16 digits and contains numbers only.</p>\n";
              }
              break;
           case "American Express": 																							//post code check for amex type
              if (!($cardNumber[0] == "3" && ($cardNumber[1] == "4" || $cardNumber[1] == "7"))){					//check if first 2 numbers are 34 or 37
                 $errMsg .= "<p class='align-center'>American Express must start with \"34\" or \"37\".</p>\n";
              }
              else if (!preg_match("/^\d{15}$/", $cardNumber)){															//check if length is 15 and only contains numbers
                 $errMsg .= "<p class='align-center'>MasterCard number must be 15 digits and contains numbers only.</p>\n";
              }
              break;
           }
        }
   $cvv = sanitise_input($_POST["cvv"]);					//sanitise input
        if ($cvv == ""){
           $errMsg .= "<p class='align-center'>Card CVV cannot be left blank.</p>\n";		//Check if CVV is left empty
        }
        else if (!preg_match("/^\d{3}$/", $cvv)){
           $errMsg .= "<p class='align-center'>CVV must be a 3-digit number.</p>\n";		//check if CVV is a 3-digit number
        }

   $expyear = sanitise_input($_POST["expyear"]);					//sanitise input
   if (!preg_match("/^\d{2}\/\d{2}$/" , $expyear)){
      $errMsg .= "<p class='align-center'>Card Exp Month-Year format is incorrect.</p>\n";		//Check if CVV is left empty
   }

 
 $_SESSION["firstName"] = $firstName;
 $_SESSION["lastName"] = $lastName;
 $_SESSION["street"] = $street;
 $_SESSION["town"] = $town;
 $_SESSION["state"] = $state;
 $_SESSION["postcode"] = $postcode;
 $_SESSION["email"] = $email;
 $_SESSION["phoneNo"] = $phoneNo;
 $_SESSION["qty"] = $qty;
 $_SESSION["model"] = $model;
 $_SESSION["totalPrice"] = $totalPrice;
 $_SESSION["Preferred"] = $Preferred;
 $_SESSION["cardName"] = $cardName;
 $_SESSION["cardNumber"] = $cardNumber;
 $_SESSION["expyear"] = $expyear;
 $_SESSION["cvv"] = $cvv;
 
 if ($errMsg != "") { 
  
   
  $_SESSION["errMsg"] = $errMsg;
 
 
  header("location:fix_order.php");
		    exit();
        }
 
  if (!$conn) {
      die("Database connection failure");
    } 
    $orders = "orders";
   if ($result = mysqli_query( $conn , "SHOW TABLES LIKE '".$orders."'")) {
     
      if($result->num_rows == 1) {
         // echo "Table exists";
        
      } else {
                          // CREATING TABLE 
         $queryCreate = "CREATE TABLE `orders` (
            `order_id` int(11) AUTO_INCREMENT PRIMARY KEY,
            `first_name` text NOT NULL,
            `last_name` text NOT NULL,
            `street` varchar(40) NOT NULL,
            `town` varchar(20) NOT NULL,
            `state` text NOT NULL,
            `postcode` int(4) NOT NULL,
            `phone` int(10) NOT NULL,
            `email` varchar(40) NOT NULL,
            `model` int(4) NOT NULL,
            `quantity` int(2) NOT NULL,
            `order_cost` int(8) NOT NULL,
            `card_type` varchar(15) NOT NULL,
            `card_name` text NOT NULL,
            `card_number` int(16) NOT NULL,
            `expyear` varchar(5) NOT NULL,
            `cvv` int(3) NOT NULL,
            `order_status` enum('Pending','Fulfilled','Paid','Archived') NOT NULL DEFAULT 'Pending',
            `order_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
          ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

        $result = mysqli_query($conn, $queryCreate);
      }   
  } 

  $query = "INSERT INTO $orders (`first_name`, `last_name`, `street`, `town`, `state`, `postcode`, `phone`, `email`,
    `model`, `quantity`, `order_cost`, card_type, card_name, card_number, expyear, cvv)
     VALUES ('$firstName', '$lastName', '$street', '$town', '$state', '$postcode', '$phoneNo', 
     '$email', '$model', '$qty', '$totalPrice', '$Preferred', '$cardName', '$cardNumber', '$expyear', '$cvv' );";  
 


   
  $result = mysqli_query($conn, $query);
  if (!$result) {
      echo "<p class=\"wrong\">Something is wrong with ", $query, "</p>";
  } else {
      echo "<p class=\"ok\">Successfully added new order record</p>";
      $last_id = $conn->insert_id;
      $_SESSION["order_id"] = $last_id;
    
      $query2 = "SELECT * FROM $orders WHERE order_id = $last_id";
      $result2 = mysqli_query($conn, $query2);
      $row = mysqli_fetch_array($result2, MYSQLI_ASSOC);
      $_SESSION["order_time"] = $row["order_time"];

  }
   
  mysqli_close($conn);
  
  header("location:receipt.php");
  exit();


?>
</body>
</html>