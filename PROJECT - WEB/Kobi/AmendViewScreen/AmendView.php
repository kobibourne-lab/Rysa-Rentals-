<!--
Student name: Kobi Bourne 
Student Number: C00249676
Date: 12/02/2026
Task:php for Amend/View Screen  
-->

<!DOCTYPE html> <!--tells browser its a html doctype -->
<html>  <!--start of html -->
  <head> <!--start of head -->	
 <link rel="stylesheet" type="text/css" href="../../GroupWork/global.css"> <!--link to css-->
 <title>Rental Management</title> <!--text that shows in tab  -->
</head> <!--end of head -->
	
<body> <!--start of body -->
	<!--links header and nav files -->
	<?php include('../../GroupWork/header.php') ?>
    
    <div class="main"> <!--main container -->
        <div class="nav">
		<?php include('../../GroupWork/nav.php') ?>
        </div>

<!-- form to submit amended vals -->
<form class="php-form" action = "AmendView.html.php" method ="post"> 
	
<?php
include '../../GroupWork/db.inc.php'; //con class

date_default_timezone_set('UTC'); //set timezone

// SQL query to update rentalCat details
$sql = "UPDATE RentalCat SET StndDayCost = '$_POST[amendStndDayCost]',
       FiveDayDiscount = '$_POST[amendFiveDayDiscount]',
       TenDayDiscount = '$_POST[amendTenDayDiscount]' WHERE RentalCategory = '$_POST[amendRentalID]' ";

// Run the SQL query
if(! mysqli_query($con, $sql))
    {
        echo "Error ".mysqli_error($con);//if fail print 
    }
else
    {
        if(mysqli_affected_rows($con) !=0) //check if updated 
            {
                // print
			     
                echo mysqli_affected_rows($con)." record(s) updated <br><br>";
                echo "Rental Category ". $_POST['amendRentalID'].", " ." has been updated";
				 
            }
        else
            {
                echo "No records were changed";//print if no changes 
            }

    }
mysqli_close($con);//close con 
?>

<!-- Button to return to previous page -->
<br><br>
<button class="amendbutton" type = "submit" >Return to Previous Screen</button> 
</form>

