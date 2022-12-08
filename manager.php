<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Online TV Shoppping"/>
     <meta name="keywords" content="TV purchase"/>
     <meta name="author" content="Ishaan"/>

     <link rel="stylesheet" href="css/style.css"> 
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Manager PHP</title>
</head>
<?php include('./includes/header.inc') ?>
<body>

<?php 
date_default_timezone_set('Asia/Calcutta'); 
 
//Calculate 60 days in the future
//seconds * minutes * hours * days + current time
 
$inTwoMonths = 60 * 60 * 24 * 60 + time();
setcookie('lastVisit', date("G:i - d/m/y"), $inTwoMonths);
if(isset($_COOKIE['lastVisit']))
 
{
$visit = $_COOKIE['lastVisit'];
echo "<p class='align-center'>Your last visit was - $visit </p>";
}
else
echo "You've got some stale cookies!"; 
?> 
                                   <!-- ORDER SEARCH FORM --> 
   <h2 class="align-center">Order Search</h2>
<form method="POST" action="manager.php">
    <legend class="manager">Search for orders</legend>
    <p>
			<label for="firstName">Customer's first name:</label>
			<input type="text" name="firstName" id="firstName">
			</p>
			<p>
			<label for="lastName">Customer's last name:</label>
			<input type="text" name="lastName" id="lastName">
			</p>
        <br>
            <label class="manager">Search through particular model:</label>
			</p>
			<p>
            	<input type="radio" id="model1" name="model" value="2021">               
                <label for="product1">Model 2021</label>
            </p>
            <p>
            	<input type="radio" id="model2" name="model" value="2020">               
                <label for="product2">Model 2020</label>
            </p>
			<p>
            	<input type="radio" id="model3" name="model" value="2019">               
                <label for="product3">Model 2019</label>
            </p>
            <p>
            	<input type="radio" id="model4" name="model" value="2018">               
                <label for="product4">Model 2018</label>

            </p>
        <br>
           <p>
				<label class="manager">Search for ONLY pending orders:</label>
				<span>
                	<input type="radio" id="pending" name="pending" value="yes">               
                    <label for="pending">Yes</label>
                </span>
                <span>
                	<input type="radio" id="nopending" name="pending" value="no" checked>               
                    <label for="nopending">No</label>
                </span>
			</p> 
        <br>
            <p>
				<label class="manager">Sort orders by Total cost:</label>
				<span>
                	<input type="radio" id="orderSorted" name="orderSort" value="yes">               
                    <label for="orderSorted">Yes</label>
                </span>
                <span>
                	<input type="radio" id="orderUnsorted" name="orderSort" value="no" checked>               
                    <label for="orderUnsorted">No</label>
                </span>
			</p><br>
            <input class="button" type="submit" value="Search" name="Search">
</form>
<?php
	session_start();
     require_once ("settings.php");
   $conn = @mysqli_connect($host,
   $user,
   $pwd,
   $sql_db);

   if (!$conn) {
    die("Database connection failure");
  } 
                             //  DELETING AN ORDER BY MANAGER 
$orders = "orders"; 
 if (isset($_GET["task"]) && $_GET['task'] == 'delete' && isset($_GET['order_id'])){
    $queryDelete = "DELETE FROM $orders WHERE order_id = $_GET[order_id]";
    $result = mysqli_query($conn, $queryDelete);
    if ($result){
        echo "<p class='align-center'>Order Id Deleted, $_GET[order_id]</p>"; 
    }
 }                     // UPDATING AN ORDER 
                  
 if (isset($_POST['order_status']) && isset($_POST['order_id'])){
    $queryUpdate = "UPDATE $orders SET order_status = '$_POST[order_status]' WHERE order_id = $_POST[order_id]";
    $result = mysqli_query($conn, $queryUpdate);
    if ($result){
        echo "<p class='align-center'>Order Status Updated, $_POST[order_status]</p>"; 
    }
 }  
$sortColumn = "";
$defaultSortOrder = "asc";             //  ORDER BY ASCENDING DESCENDING

if(isset($_GET['orderby']) && isset($_GET['order'])){
    
    $sortColumn = 'order by ' . $_GET['orderby'] . " " . $_GET['order'];
    if ($_GET['order'] == 'asc') {
        $defaultSortOrder = 'desc';
    } else {
        $defaultSortOrder = 'asc';
    } 
}
 
$query = "SELECT * FROM $orders " . $sortColumn;

$result = mysqli_query($conn, $query);


if (isset($_POST['firstName']) && isset($_POST['lastName'])){
    $model = "";
    $pending = "";
    $sort = "";
   
    if(isset($_POST['pending'])) {
        if ($_POST['pending'] == 'yes'){
            $pending = 'Pending';
        }}
    
        if(isset($_POST['orderSort'])) {
            if ($_POST['orderSort'] == 'yes'){
                $sort = 'order by order_cost ASC';
    } }

    if(isset($_POST['model'])) {
        $model = $_POST['model']; 
    
    } 
   


    $querySearch = "SELECT * FROM $orders WHERE first_name like '%$_POST[firstName]%' and last_name like '%$_POST[lastName]%' and model like '%$model%' and order_status like '%$pending%' $sort";
    $result = mysqli_query($conn, $querySearch);

   } 
                  
if (!$result) {
    echo "<p class=\"wrong\">Something is wrong with ", $query, "</p>";
} else { 
    echo "<table border='1'>                   
  <tr>
  <th><a href=manager.php?orderby=order_id&order=$defaultSortOrder>Order ID</a></th>
  <th><a href=manager.php?orderby=order_time&order=$defaultSortOrder>Order Date</a></th>
  <th><a href=manager.php?orderby=first_name&order=$defaultSortOrder>Customer Name</a></th>
  <th><a href=manager.php?orderby=model&order=$defaultSortOrder>Model Number</a></th>
  <th><a href=manager.php?orderby=quantity&order=$defaultSortOrder>Quantity</a></th>
  <th><a href=manager.php?orderby=order_cost&order=$defaultSortOrder>Total Price</a></th>
  <th><a href=manager.php?orderby=order_status&order=$defaultSortOrder>Order Status</a></th>
  <th>Action</th>
  <th>Update Status</th>
  

</tr>";         //  echoing table data 

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['order_id'] . "</td>";
echo "<td>" . $row['order_time'] . "</td>";
echo "<td>" . $row['first_name'] ." ". $row['last_name']; "</td>";
echo "<td>" . $row['model'] . "</td>";
echo "<td>" . $row['quantity'] . "</td>";
echo "<td>" . "$" . $row['order_cost'] . "</td>";
echo "<td>" . $row['order_status'] . "</td>";
echo $row['order_status'] === 'Pending'?"<td><a href=manager.php?task=delete&order_id=$row[order_id]>Cancel</a></td>":"<td></td>";
echo '<td>' . '<form class="orderz" method="POST"><input type="hidden" name="order_id" value="'.$row['order_id'].'"> 
<select name="order_status" id="orderStatus" required>
<option value="">Select Status</option>
<option value="Pending">PENDING</option>
<option value="Fulfilled">FULFILLED</option>
<option value="Paid">PAID</option>
<option value="Archived">ARCHIVED</option>
</select><input class="button" type="submit" value="Update" name="Update"></form>' . "</td>";
echo "</tr>";
}
echo "</table>";

}
 
mysqli_close($conn);
	?>


		
<?php include('./includes/footer.inc') ?>
</body>
</html>