 <!--
    Screen - Rental
    This screen is to select the company looking to rent a vehicle, select availible vehicles, calculate the cost based on
    the return date and discounts that vehicle has applied and book out said vehicle
    Jessica Power
    C00312811
    coding started - Mar 2026
-->
 <?php session_start(); 
    //session varaibles from selected company to selected car
    $_SESSION['RAC']=$_POST['selected'];

    $selRAC = $_SESSION['RAC'];
    $selCID = $_SESSION['company'];
;?>
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

        <form 
                action = "confirm.php" 
                method = "post" 
                name = "final" 
                onsubmit="return submitCheck()">
                <h2>Current Details</h2>


 
 <?php 
// Include database connection settings and open a mysqli connection in $con
include "../../GroupWork/db.inc.php";


 $comSQL= "SELECT 
                 Name, CreditLimit, AmountOwed
                FROM 
                    Company 
                WHERE 
                    CompanyID = '$selCID'";

 $carSQL= "SELECT 
                 Car.carReg, CarType.Manufacturer, CarType.Model, Car.carType, Car.bodyStyle, 
                 Car.noOfDoors
                FROM 
                    Car 
                INNER JOIN CarType
                    ON Car.CarType=CarType.CarTypeID
                WHERE 
                    carID = '$selRAC' ";
		 
 

    // Run the query and handle any errors
    if (!$result = mysqli_query($con, $comSQL)) {
        die('Error in querying the database: ' . mysqli_error($con));
    }

        // Loop through each row returned from the query
    while ($row = mysqli_fetch_array($result)) {
		
					// Display submitted details for confirmation
			echo     "Company Details <br>" . "<br>" . 
					"Company Name is : " . $row['Name'] . "<br>" . 
					 "Credit Limit is : $" . $row['CreditLimit'] . "<br>" . 
					 "Amount Owed : $" . $row['AmountOwed'] . "<br>"  ;

                $credit = $row['CreditLimit'];
                $owed = $row['AmountOwed'];
    }

    echo "<br>";

     // Run the query and handle any errors
    if (!$resultcar = mysqli_query($con, $carSQL)) {
        die('Error in querying the database: ' . mysqli_error($con));
    }

        // Loop through each row returned from the query
    while ($row = mysqli_fetch_array($resultcar)) {
		
				// Display submitted details for confirmation
			echo     "Car Details <br>" . "<br>" . 
					"Registeration : " . $row['carReg'] . "<br>" . 
					 "Manufacturer : " . $row['Manufacturer'] . "<br>" . 
					 "Model : " . $row['Model'] . "<br>" .
					"Body Style : " . $row['bodyStyle'] . "<br>" .
					"Number of Doors : " . $row['noOfDoors'] . "<br><br>";

                $carType = $row['carType'];
    }

     $catSQL = "SELECT
 				  RentalCategory
                  FROM 
				  	  CarType
                  WHERE 
				  	  CarTypeID = '$carType'";

		 
	 // Run the query and handle any errors
	if (!$resultcat = mysqli_query($con, $catSQL)) {
        die('Error in querying the database: ' . mysqli_error($con));
    }

    
		// Loop through each row returned from the query 
	while ($row = mysqli_fetch_array($resultcat)) {
        $rentalCat = $row['RentalCategory'];

    }
		 
    $costSQL = "SELECT 
 				  StndDayCost, FiveDayDiscount, TenDayDiscount
                  FROM 
				      RentalCat
                  WHERE 
				      RentalCategory = '$rentalCat'";

	 // Run the query and handle any errors
	if (!$resultcost = mysqli_query($con, $costSQL)) {
        die('Error in querying the database: ' . mysqli_error($con));
    }

		// Loop through each row returned from the query
	while ($row = mysqli_fetch_array($resultcost)) {
        $StndDayCost = $row['StndDayCost'];
        $FiveDayDiscount = $row['FiveDayDiscount'];
        $TenDayDiscount = $row['TenDayDiscount'];

		// Display submitted details for confirmation
			echo     "Cost Break Down <br>" . "<br>" . 
					"Standard Day Rate : " . "$" . $StndDayCost . "<br>" . 
					"5 Day Discount : " . $FiveDayDiscount . "%" . "<br>" . 
					"10 Day Discount : " . $TenDayDiscount ."%" . "<br>"
					 ;

    }

// Close the database connection
mysqli_close($con);
?>

<br><br>
    <div class="form-group">

        <label id="rentday" for="rentcost"></label>
        <input 
            type="text" 
            name="rentcost"   
            id="rentcost" 
            value="Cost"
            disabled>    
    </div>

	<div class="form-group">
        <label for="returnDate">Return Date</label>
        <input 
            type="date" 
            name="returnDate"   
            id="returnDate" 
            onchange="costCAL()"
            required>
	</div>
		
	<div class="form-group">
        <input
            type="submit"
            id="next"
            value="Continue"
            class = "return"
            disabled>
    </div>
</form>
    <script>
            //Var for cost calculations
                var credit = "<?php echo"$credit"?>";
                var owed = "<?php echo"$owed"?>";

                var standard = "<?php echo"$StndDayCost"?>";
                var five = "<?php echo"$FiveDayDiscount"?>";
                var ten = "<?php echo"$TenDayDiscount"?>";

                var allowed = credit-owed;
                var proceed = document.getElementById('rentday');

            function costCAL(){ //function that takes return date gets total days renting to the calculate the cost with applied 
				//discounts based on the rental category of selected vihicle

                var returnDate = document.getElementById('returnDate').value;
                var rtnBACK = new Date(returnDate);
                var today = new Date();
                var millisecondsDiff = rtnBACK.getTime() - today.getTime()//converts both dates to millisecond values
                var daysDiff = Math.round(
                                millisecondsDiff / (24 * 60 * 60 * 1000)+1) //the plus one is to offset hours differences

                if(daysDiff<1){
                    proceed.textContent = "Must be future date  "; //cannot select previous date must be renting in future
                } 
                else{
                    proceed.textContent = daysDiff + "  Days for rental";

                    if(allowed>0){
                        var stdcost=daysDiff*standard;

                        if(daysDiff<5){
                            if(allowed<stdcost){
                                document.getElementById('rentcost').value="Over Credit Limit"; //if cost to rent exceeds availible credit
																					//they cannot proceed
                            }else{
                                document.getElementById('rentcost').value=stdcost;
                                document.getElementById('next').disabled=false; //enables continue button
                            }
                        }
                        if(daysDiff>=5 && daysDiff<10){
                            var fivecost=stdcost-(stdcost*(five/100)); //if return date exceeds 5 days discount is calculated
                            if(allowed<fivecost){
                                document.getElementById('rentcost').value="Over Credit Limit";
                            }else{
                                document.getElementById('rentcost').value=fivecost;
                                document.getElementById('next').disabled=false;
                            }
                        }
                        if(daysDiff>=10){
                            var tencost=stdcost-(stdcost*(ten/100)); //if return date exceeds 10 days discount is calculated
                            if(allowed<tencost){
                                document.getElementById('rentcost').value="Over Credit Limit";
                            }else{
                                document.getElementById('rentcost').value=tencost;
                                document.getElementById('next').disabled=false;
                            }
                        }
                    }
                    else{
                        document.getElementById('rentcost').value="No Credit"; //if amount owed equall credit limit 
                    }
                    
                }      
            }

            function submitCheck(){
                // Variable to store the user's response from the confirm dialog
                var response;

                // Show confirmation dialog asking the user to save changes
                response = confirm('Are you sure you want to proceed?');

                // If the user clicks "OK"
                if (response) {

                    // Allow the action to proceed
                    document.getElementById("rentcost").disabled = false;
                    return true;
                }
                else {

                    // Prevent the action 
                    return false;
                }
            }
        
    </script>
      <script src="../Company.js"></script>
</div>
    </body>
</html>