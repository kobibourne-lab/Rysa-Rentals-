<!--
Student name: Kobi Bourne 
Student Number: C00249676
Date: 12/02/2026
Task: PHP for add screen
-->
<!DOCTYPE html> <!--tells browser its a html doctype -->
<html> <!--start of html -->
  <head> <!--start of head -->
  <meta charset="UTF-8">
  <title>Rental Management</title>

  <!-- Link to CSS file -->
  <link rel="stylesheet" href="../../GroupWork/global.css">
  </head> <!--end of head -->
  <body> <!--start of body-->
	<!--links header and nav files -->
	<?php include('../../GroupWork/header.php') ?>
    <div class="main"> <!--main container -->
        <div class="nav">
		<?php include('../../GroupWork/nav.php') ?>
        </div>
	
	<form class="php-form"> <!-- form start, php-form for layout-->
<?php

include '../../GroupWork/db.inc.php'; /*link to db con class in Group folder*/

$con = mysqli_connect($hostname, $username, $password, $dbname); /*connect to database*/

if (!$con) /*if connection failed*/
{
    die("Failed to connect to MySQL: " . mysqli_connect_error()); /*print error*/
}

/*print details submitted*/
echo '<form class="php-form">';
echo "The details sent down are: <br><br>"; 
echo "Rental Category is :" . $_POST['RentalCategory'] . "<br>";
echo "Standard Cost per Day is :" . $_POST['StndDayCost'] . "<br>";
echo "Five Day Discount is :" . $_POST['FiveDayDiscount'] . "<br>";
echo "Ten Day Discount is :" . $_POST['TenDayDiscount'] . "<br>";
/*insert new rentalCat into DB*/
$sql = "Insert into RentalCat (RentalCategory, StndDayCost, FiveDayDiscount, TenDayDiscount)
VALUES ('$_POST[RentalCategory]','$_POST[StndDayCost]','$_POST[FiveDayDiscount]','$_POST[TenDayDiscount]')";

if (!mysqli_query($con,$sql)) /*if error with query*/
    {
        die ("An Error in the SQL Query: " . mysqli_error($con) ); /*print error*/
    }
/*if works print*/
echo "<br>A record has been added for " . $_POST['RentalCategory'] . "." . "<br>";
mysqli_close($con); /*close con*/
?>


<!-- return button -->
<div class="button-group">
<input type="button" class="return" value="Return to insert page" 
onclick="window.location.href='AddRentalCat1.html.php'"> <!--redirect back to AddRental1.html.php -->
</div> 
		
</form> <!--end of form -->
</div> <!--end of main -->
</body> <!--end of body -->
</html> <!--end of html -->

