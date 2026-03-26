<!-- 
Student Name : Ryan Mulcahy
Student Id Number: C00315272
Date : FEB - 2026
Purpose : ADD SCREEN
 -->

<?php
include '../../GroupWork/db.inc.php'; // Connect to database
date_default_timezone_set('UTC');

// Pulling cartype info from sarah Table
$sql = "SELECT CarTypeID, Manufacturer, Model, Version, EngineSize, FuelType FROM CarType";

// Error Handling
if (!$result = mysqli_query($con, $sql))
{
    die('Error in querying the database' . mysqli_error($con));
}

// Echo out all car type details in a select option with a blank selection as a start.
while ($row = mysqli_fetch_array($result))
{
    $id = $row['CarTypeID'];
    $fmake = $row['Manufacturer'];
    $fmodel = $row['Model'];
    $fversion =$row['Version'];
    $engineSize = $row['EngineSize'];
    $fuelType = $row['FuelType'];
	
     echo "<option value='$id'>
        $fmake $fmodel $fversion $engineSize $fuelType
      </option>";
}
// close the connection
mysqli_close($con);
?>
