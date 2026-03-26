<!-- 
Student Name : Ryan Mulcahy
Student Id Number: C00315272
Date : FEB - 2026
Purpose : Amend View Screen
 -->

<meta charset="UTF-8">
  <title>Car Management(Amend/View)</title>
    <!-- Link to external CSS file -->
<link rel="stylesheet" type="text/css" href="../../GroupWork/global.css">

	<?php include('../../GroupWork/header.php') ?>
    
    <div class="main">
        <div class="nav">
		<?php include('../../GroupWork/nav.php') ?>
        </div>
        <!-- Form to redirect and display our Amend/View Info -->
<form name="amendForm" action="carAmendView.html.php" method="post">

<?php
include '../../GroupWork/db.inc.php'; // Connect to database

date_default_timezone_set('UTC');



// Updated SQL where we are updating our car DB with the amended details sent over via the form
$sql = "UPDATE Car  
        SET 
        carType = '$_POST[amendCarType]',
        colour = '$_POST[AmendColour]',
        chassisNumber = '$_POST[amendChassisNumber]',
        bodyStyle = '$_POST[amendBodyStyle]',
        noOfDoors = '$_POST[amendNoOfDoors]',
        purchasePrice = '$_POST[amendPurchasePrice]',
        dateAddedToFleet = '$_POST[amendDateAddedtoFleet]'
        WHERE
        carID = '$_POST[carAmendId]' ";

// Error Handling
if (!mysqli_query($con, $sql))
{
    echo "Error " . mysqli_error($con);
}
else
{
    if (mysqli_affected_rows($con) != 0)
    {
        echo "The follwing car record has been amended<br>";
        // Post info out of the Car DB which we updated 
        echo
		 "Car Reg: " . $_POST['carReg'] . "<br>"
        . "Car Type: " . $_POST['amendCarType'] . "<br>"
        . "Colour: " . $_POST['AmendColour'] . "<br>"
        . "Chassis Number: " . $_POST['amendChassisNumber'] . "<br>"
        . "Body Style: " . $_POST['amendBodyStyle'] . "<br>"
        . "No. of Doors: " . $_POST['amendNoOfDoors'] . "<br>"
        . "Purchase Price: " . $_POST['amendPurchasePrice'] . "<br>"
        . "Date Added To Fleet: " . $_POST['amendDateAddedtoFleet'] . "<br>"
        . "has been updated.";
    }
    else
    {
        echo "No records were changed";
    }
}

// Close the database connection
mysqli_close($con);

?>


    <div class="form-group">
    <input type = "submit" class="return" value = "Return to Amend screen"
    onclick="window.location.href='carAmendView.html.php'">
</div>
</form>

