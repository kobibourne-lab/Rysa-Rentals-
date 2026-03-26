<!--
Student name: Kobi Bourne 
Student Number: C00249676
Date: 12/02/2026
Task:Rental Category Amend/View Screen  
-->
<!DOCTYPE html> <!--tells browser its a html doctype -->
<html> <!--start of html -->
<head> <!--start of head -->
    <title>Rental Managment </title> <!--what is in tab -->
    <link rel="stylesheet" href="../../GroupWork/global.css"> <!--link to css file-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--makes page responsive -->

</head> <!--end of head -->
<body> <!--start of body -->
	 <!--links header and nav files -->
	 <?php include('../../GroupWork/header.php') ?>
    
    <div class="main"> <!--main container for page content -->
        <div class="nav"> <!--div for nav styling-->
		<?php include('../../GroupWork/nav.php') ?>
        </div>
	
	<!-- Form to submit amended details -->
	<!-- form sends data AmendView.php, uses post -->
    <form name="myForm" action="AmendView.php" onsubmit="return ValidateForm() && confirmCheck()" method="post">
	<!--validateForm() checks inputs and confrimcheck() asks for confirm click before submitting -->
		
	<div class = "form" >
<!--headings-->	
    <h2> Amend/View a Rental Category </h2>
    <h3> Please select a Rental Category and click the amend button if you wish to update </h3>
	<br>

     <!--inclde listbox-->  
	<div class = "form-group"> 
	<label for="listbox">Select Rental Cat</label>
	<?php include 'listbox.php'; ?>
	</div>

	
	<div class ="button-group"> <!-- Button to toggle amend/view mode and submit button -->
	<button class="amendbutton" type = "button" id = "amendViewbutton" onclick = "toggleLock()"> Amend/View</button>
    <button type = "submit" value = "Save Changes" >Save Changes</button>
	</div>	
	<br>
		
    <!-- rental fields -->
	<div class="form-group">	
    <label for="amendRentalID"> Rental Cat ID  </label>
    <input type = "text" name = "amendRentalID" id = "amendRentalID" disabled>
	</div>
		
	<div class="form-group">
    <label for="amendStndDayCost">Standard Day Rate</label>
    <input type = "number" name = "amendStndDayCost" id = "amendStndDayCost"  title="Enter an integar between 1 - 1000" min="1" max="1000" required disabled>
	</div>
		
	<div class="form-group">	
    <label for="amendFiveDayDiscount"> Five Day Discout </label>
    <input type = "number" name = "amendFiveDayDiscount" id = "amendFiveDayDiscount" title = "this need to be between 0 and 50" min="0" max="50" required disabled>
	<!--sets type to number, inputbox for FiveDayDiscount, min =0 , max =50 , has to be filled, disabled --> 
	</div>
		
	<div class="form-group">	
    <label for="amendTenDayDiscount">Ten Day Discout </label>
    <input type = "number" name = "amendTenDayDiscount" id = "amendTenDayDiscount" title="Enter an integar between 0 - 70"
		 min="0" max="70" required disabled>
	<!--sets type to number, inputbox for TenDayDiscount, min =0 , max =70 , has to be filled, disabled -->  
	</div>
		
	</div>
	</form> <!-- end of form  -->
	<script src="Amend.js"></script> <!--link to js file-->
</div>				
</body> <!-- end of body  -->
</html> <!-- end of html -->

