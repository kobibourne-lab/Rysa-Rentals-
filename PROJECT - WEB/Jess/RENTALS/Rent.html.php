<!--
    Screen - rental screen
    This screen is a form to input data on a new company that is to be added to
    the database, table Company
    Jessica Power
    C00312811
    coding started - Mar 2026
-->

<?php
// Include database connection settings and open a mysqli connection in $con
include "../../GroupWork/db.inc.php";
session_start();
$_SESSION['company']=$_POST['comID'];

    $sql = "SELECT 
                Car.carID, Car.carReg, CarType.Manufacturer,
                CarType.Model, CarType.Version, Car.bodyStyle, Car.noOfDoors 
                FROM 
                    Car 
                INNER JOIN CarType
                    ON Car.CarType=CarType.CarTypeID
                WHERE 
                    Car.DeletedFlag = 0 AND Car.currentStatus = 'Available' ";

// Run the query and handle any errors
if (!$result = mysqli_query($con, $sql)) {
    die('Error in querying the database: ' . mysqli_error($con));
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Rental</title>

  <!-- Link to external CSS file -->
  <link rel="stylesheet" type="text/css" href="../../GroupWork/global.css">

	

</head>

    <body>

    <?php include('../../GroupWork/header.php') ?>

    <div class="main">
        <div class="nav">
		<?php include('../../GroupWork/nav.php') ?>
        </div>

        <form action = "rentConfirm.php" method = "post" name = "rental" onsubmit="return confirmCheck() && carsend()">
                <h2>Available Cars</h2>


<?php

    echo "<table>
            <tr><th>ID </th><th>Car Reg</th><th>Make</th><th>Model</th><th>Trim</th><th>Body Style</th><th>No. Doors</th></tr>";


      // Loop through each row returned from the query
    while ($row = mysqli_fetch_array($result)) {

    //Display data of availible cars from the database
        echo
               "<td>". $row['carID']." </td>
                <td>".$row['carReg']."</td>
                <td>".$row['Manufacturer']."</td>
                <td>".$row['Model']."</td>
                <td>".$row['Version']."</td>
                <td>". $row['bodyStyle']."</td>
                <td>". $row['noOfDoors']."</td>
                
                </tr>";
}

    echo "</table>";

mysqli_close($con);
?>
			<br><br><br>
<div class="form-group">
        <!-- Selection -->
        <label for="rental">Select A Car </label><br>
        <input
            type="text"
            name="selected"
            id="selected"
            placeholder="Selected ID"
			   required
            disabled
        >
        
    </div>
			<?php include 'CarSel.php'; ?>
			<div class="form-group">
        <!-- Submit button to save changes -->
        <input
            type="submit"
            value="Continue"
            class = "return"
			   >
               
    </div>
			</form>
      <script src="../Company.js"></script>
</div>
    </body>
</html>