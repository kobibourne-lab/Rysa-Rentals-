<!--
    Screen - Add new company php side
    This screen is to input data on a new company to
    the database, table Company with mysql insert
    Jessica Power
    C00312811
    coding started - Feb 2026
-->
    <?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Company Management</title>

  <!-- Link to external CSS file -->
  <link rel="stylesheet" href="../../GroupWork/global.css">
</head>
	<body>
		
		 <?php include('../../GroupWork/header.php') ?>

    <div class="main">
        <div class="nav">
		<?php include('../../GroupWork/nav.php') ?>
        </div>
<?php

include '../../GroupWork/db.inc.php'; // Connect to database
date_default_timezone_set("UTC"); // Ensure consistent timezone


// Display submitted details for confirmation
echo     "<form class='php-form'>Company details being submitted : <br>" . "<br>" . 
        "Company Name is : " . htmlspecialchars($_POST['name']) . "<br>" . 
        "<form class='php-form'>Address is : " . htmlspecialchars($_POST['address']) . "<br>" . 
         "Phone Number is : " . htmlspecialchars($_POST['phoneNo']) . "<br>" . 
         "Company Website is : " . htmlspecialchars($_POST['web']) . "<br>" . 
         "Email is : " . htmlspecialchars($_POST['email']) . "<br>" . 
         "Credit Limit set is : " . htmlspecialchars($_POST['credit']) . "<br>" ;

// Insert the new company record into the database
$sql = "Insert into Company (Name, Address, PhoneNo, WebAddress, Email, CreditLimit)
VALUES ('$_POST[name]','$_POST[address]','$_POST[phoneNo]'
,'$_POST[web]','$_POST[email]','$_POST[credit]')";

// Run the query and stop if there is an error
if (!mysqli_query($con, $sql)) {
    die ("An Error in the SQL Query: " . mysqli_error($con));
}

// Confirm successful insert
echo "<br>A record has been added for " . htmlspecialchars($_POST['name']) . " "  .
 "." . "<br>" . "<br>";

    

 // Close database connection
mysqli_close($con);
?>
<div class="form-group">
<input type="button" class="return" value="Return to insert page" 
onclick="window.location.href='CompanyAdd.html.php'">
		<input type="button" class="return" value="Continue to Rentals" 
onclick="window.location.href='../RentalScreen/RentalSelCompany.html.php'">
		</div>
		</div>
</body>
</html>