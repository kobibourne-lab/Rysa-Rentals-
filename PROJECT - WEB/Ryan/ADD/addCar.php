<!-- 
Student Name : Ryan Mulcahy
Student Id Number: C00315272
Date : FEB - 2026
Purpose : ADD SCREEN
 -->

<meta charset="UTF-8">
  <title>Car Management</title>
<link rel="stylesheet" type="text/css" href="../../GroupWork/global.css">

	<?php include('../../GroupWork/header.php') ?>
    
    <div class="main">
        <div class="nav">
		<?php include('../../GroupWork/nav.php') ?>
        </div>
<form name="amendForm" action="addCar.html.php" method="post">

<?php
//  Include is import and we are importing the code from the php file DB.inc.php
include '../../GroupWork/db.inc.php'; // Connect to database
// Set Time to UTC Standard
date_default_timezone_set("UTC");


echo "<form>Car details being submitted : <br><br>" .
     "Car Reg is : " . htmlspecialchars($_POST['carReg']) . "<br>" .
     "Colour is : " . htmlspecialchars($_POST['colour']) . "<br>" .
     "Chassis Number is : " . htmlspecialchars($_POST['chassisNumber']) . "<br>" .
     "Body Style is : " . htmlspecialchars($_POST['bodyStyle']) . "<br>" .
     "No Of Doors is : " . htmlspecialchars($_POST['noOfDoors']) . "<br>" .
     "Purchase Price is : " . htmlspecialchars($_POST['purchasePrice']) . "<br>" .
     "Date Added To Fleet is : " . htmlspecialchars($_POST['dateAddedToFleet']) . "<br>";

// SQL Code stored in sql where we are inserting values into car DB
$sql = "Insert into Car (carReg,carType,colour,chassisNumber,bodyStyle,noOfDoors,purchasePrice,dateAddedToFleet) VALUES ('$_POST[carReg]','$_POST[carType]','$_POST[colour]','$_POST[chassisNumber]','$_POST[bodyStyle]','$_POST[noOfDoors]','$_POST[purchasePrice]','$_POST[dateAddedToFleet]')";

// Checks if connection is right and we are able to connect to our DB otherwise error msg is pushed 
if (!mysqli_query($con,$sql)) 
{
    die("An Error in the SQL Query:" . mysqli_errno($con));
}
// No errors prompted this messaged gets printed and  connection is closed 
echo "<br>Car Registration " . $_POST['carReg'] ." has been added to our database.". "<br><br>";

mysqli_close($con);

 ?>
<!-- Return to insert Page -->
  <!-- Link to external CSS file -->

<input class="return" value="Return to previous page" 
onclick="window.location.href='addCar.html.php'">
</body>
</html>