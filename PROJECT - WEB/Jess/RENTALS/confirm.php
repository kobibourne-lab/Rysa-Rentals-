<!-- 
	This screen simply displays all information from the process of renting a car to a company as well as 
	notifying that the records have been updated with displayed information

Jessica Power
C00312811
Feb - 2026
-->
 <?php session_start(); 
    //session varaibles from selected company to selected car
    $_SESSION['cost']=$_POST['rentcost'];
    $_SESSION['rtn']=$_POST['returnDate'];

    $RAC = $_SESSION['RAC'];
    $CID = $_SESSION['company'];
    $MONEY = $_SESSION['cost'];
    $return = $_SESSION['rtn'];
;?>

<meta charset="UTF-8">
  <title>Rental</title>
<link rel="stylesheet" type="text/css" href="../../GroupWork/global.css">
<?php include('../../GroupWork/header.php') ?>
    
    <div class="main">
        <div class="nav">
		<?php include('../../GroupWork/nav.php') ?>
        </div>
<form action="rentConfirm.php" method="post">
<?php

// Include database connection file
include '../../GroupWork/db.inc.php';

// Set the default timezone to UTC
date_default_timezone_set('UTC');
	
	 $date = date("Y-m-d H:i:s");

// Build the SQL UPDATE query to for company table and car table
$updatesql = "

        UPDATE Company, Car
        SET Company.AmountOwed = Company.AmountOwed + '$MONEY',
            Company.TotalRentals = Company.TotalRentals + 1,
            Company.DateAmended = '{$date}',
            Car.currentStatus = 'Rented',
            Car.CumulativeRentals = Car.CumulativeRentals + 1
        WHERE
            Company.CompanyID = '$CID'
            AND Car.CarID = '$RAC' ";
//SQL query gathered for display info from car, company and cartype tables
 $carSQL= "SELECT 
                 Car.carReg, Car.carType, Car.bodyStyle,
                 CarType.Manufacturer, CarType.Model,
                 Company.Name, Company.CreditLimit
                FROM 
                    Car, Company, CarType
                WHERE 
                    Car.carID = '$RAC'
                    and Company.CompanyID='$CID'
                    AND  CarType.CarTypeID=Car.carType";

// Execute the query and check for errors
if (!mysqli_query($con, $updatesql)) {

    // Output MySQL error if query fails
    echo "Error: " . mysqli_error($con);

} else {

    // Check if any rows were actually updated
    if (mysqli_affected_rows($con) != 0) {

         // Run the query and handle any errors
    if (!$result = mysqli_query($con, $carSQL)) {
        die('Error in querying the database: ' . mysqli_error($con));
    }

        // Loop through each row returned from the query
    while ($row = mysqli_fetch_array($result)) {
         // Display success message with record count
        echo mysqli_affected_rows($con) . " record updated <br><br>";

        // Display confirmation of updated details
        echo "Company Name " . "<br><br>" . 
                $row['Name'] . " <br>" .
                $row['CreditLimit'] . " " . "<br><br>". 
                "Car Details " . "<br><br>" . 
                $row['carReg'] . " <br>" .
                $row['Manufacturer'] . " " . "<br>" . 
                $row['Model'] . " " . "<br><br>" .
                "Cost $" . $MONEY . " to be returned by " . $return . "<br><br>"
             ;
    }

       

    } else {

        // No rows changed (e.g. same data submitted)
        echo "No records were changed<br><br><br>";
    }
}

// Close the database connection
mysqli_close($con);

?>

    <div class="form-group">
    <input type = "button" class="return" value = "Return to Rental screen"
    onclick="window.location.href='RentalSelCompany.html.php'">
	</div>

</form>