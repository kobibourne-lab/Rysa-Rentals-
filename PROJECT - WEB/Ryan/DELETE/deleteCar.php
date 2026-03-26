<!-- 
Student Name : Ryan Mulcahy
Student Id Number: C00315272
Date : Mar - 2026
Purpose : Delete Screen
 -->

<meta charset="UTF-8">
<title>Car Management(Delete)</title>
  <!-- Link to external CSS file -->
<link rel="stylesheet" type="text/css" href="../../GroupWork/global.css">

	<?php include('../../GroupWork/header.php') ?>
    
    <div class="main">
        <div class="nav">
		<?php include('../../GroupWork/nav.php') ?>
        </div>
        <!-- Form to redirect and display our delete -->
<form name="deleteForm" action="deleteCar.html.php" method="post">

<?php
include '../../GroupWork/db.inc.php'; // Connect to database

date_default_timezone_set('UTC');



// SQL below is setting a soft delete where it updates the flag from False to True
$sql = "UPDATE Car  
        SET 
        DeletedFlag = True 
        WHERE
        carID = '$_POST[deleteCarID]' ";

// Error Handling
if (!mysqli_query($con, $sql))
{
    echo "Error " . mysqli_error($con);
}
else
{
    if (mysqli_affected_rows($con) != 0)
    {
        echo " The Following car: <br><br>";
        // Printing Info out of the car that was Deleted from our Database.
        echo 
            "Car Reg: " . $_POST['deleteCarReg'] . "<br>"
        . "Car Type: " . $_POST['deleteCarType'] . "<br>"
        . "Colour: " . $_POST['deleteColour'] . "<br>"
        . "Chassis Number: " . $_POST['deleteChassisNumber'] . "<br>"
        . "Body Style: " . $_POST['deleteBodyStyle'] . "<br>"
        . "No. of Doors: " . $_POST['deleteNumOfDoors'] . "<br>"
        . "Purchase Price: " . $_POST['deletePurchasePrice'] . "<br>"
        . "Date Added To Fleet: " . $_POST['deleteDateAdded'] . "<br><br>"
        . "has been Deleted from our Database.<br><br>";
    }
    else
    {
        echo "No records were Deleted";
    }
}

// Close the database connection
mysqli_close($con);

?>

    <div class="form-group">
    <input type = "submit" class="return" value = "Return to Delete screen"
    onclick="window.location.href='deleteCar.html.php'">
</div>
</form>

