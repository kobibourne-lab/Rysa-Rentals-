<!-- 
Student Name : Ryan Mulcahy
Student Id Number: C00315272
Date : FEB - 2026
Purpose : Amend View Screen
 -->

<?php
include '../../GroupWork/db.inc.php'; // Connect to database
date_default_timezone_set('UTC');
// SQL Code being used to pull from our Car DB,
$sql = "SELECT carID, carReg, carType, colour, chassisNumber ,bodyStyle, noOfDoors ,purchasePrice, dateAddedToFleet, currentStatus FROM Car WHERE DeletedFlag = 0";

//Error Handling
if (!$result = mysqli_query($con, $sql))
{
    die('Error in querying the database' . mysqli_error($con));
}

echo "<option value='CarTypeID'></option>";
echo "<select name='listbox' id='listbox' onclick='populate()'>";
while ($row = mysqli_fetch_array($result))
{
    $id = $row['carID'];
    $reg = $row['carReg'];
    $carType = $row['carType'];
    $colour = $row['colour'];
    $chassisNumber = $row['chassisNumber'];
    $bodyStyle = $row['bodyStyle'];
    $noOfDoors = $row['noOfDoors'];
    $purchasePrice = $row['purchasePrice'];
    $dateAdded = date_create($row['dateAddedToFleet']);
    $dateAdded = date_format($dateAdded, "Y-m-d");
    $currentStatus = $row['currentStatus'];
     // Storing all results into one variable and using that to display
    $allText = "$id,$reg,$carType,$colour,$chassisNumber,$bodyStyle,$noOfDoors,$purchasePrice,$dateAdded,$currentStatus";
    echo "<option value='$allText'>$reg</option>";
}

echo "</select>";
mysqli_close($con);
?>
