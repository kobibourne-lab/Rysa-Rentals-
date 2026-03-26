<!--
Student name: Kobi Bourne 
Student Number: C00249676
Date: 12/02/2026
Task:Rental Category Add Screen  
-->
<!DOCTYPE html> <!--tells browser its a html doctype -->
<html>  <!--start -->
<head>  <!--start of head -->
    <title>Rental Managment </title> <!--what is in tab -->
    <link rel="stylesheet" href="../../GroupWork/global.css"> <!--link to css file in GroupWork folder-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"><!--makes webpage adapt to device width -->
    
</head> <!--end of head -->
<body>  <!--start of body -->
<!--links header and nav files -->
<div class="main"> <!--main container for page content -->
<?php include('../../GroupWork/header.php') ?>
	
<div class="nav"> <!--div for nav styling-->
<?php include('../../GroupWork/nav.php')?> <!--link to nav -->
</div>
	
    <form action="Rentals.php" method="POST" onsubmit="return ValidateForm() && ConfirmForm();">
	<!-- form sends data Rentals.php, uses post -->
    <!-- when submit clicked, validateForm() checks inputs and confrimform() asks for confirm click before submitting -->
    <h2> Add Rental Category </h2> <!-- heading -->

	   <!--inputs all in divs , inside form -->
        <div class="form-group">
        <label for="RentalCategory">Rental Category</label><br>                     
        <input type="text" name="RentalCategory" id="RentalCategory" placeholder="A" autocomplete="off" pattern="[A-Z]" 
		title="Enter a single captial letter" required/>
		<!--sets input to text, pattern letters, inputbox for RentalCategory, only one capital letter allowed, has to be filled -->  
        </div>
		
        
        <div class="form-group">  <!-- div using class form-group -->
		<!-- input data for db -->
        <label for="StndDayCost">Standard Cost per Day</label><br>                   
        <input type="number" name="StndDayCost" id="StndDayCost" placeholder="30" autocomplete="off"
	     title="Enter an integar between 1 - 1000" min="1" max="1000" required/>  
		<!--sets type of input to text, inputbox for StndDayCost, more than one less than 1001 , has to be filled -->  
        </div>
		
        <div class="form-group">
        <label for="FiveDayDiscount"> Five-Day Discount %</label><br>               
        <input type="number" name="FiveDayDiscount" id="FiveDayDiscount" placeholder="5"  
	    title="Enter an integar between 0 - 50" min="0" max="50" required/>    
		<!--sets type of input to number, inputbox for FiveDayDiscount, min =0 , max =50 , has to be filled -->  
  
        </div> 
        <div class="form-group">
        <label for="TenDayDiscount"> Ten-Day Discount %</label><br>                 
        <input type="number" name="TenDayDiscount" id="TenDayDiscount" placeholder="10"  
		title="Enter an integar between 0 - 70" min="0" max="70" required/>    
		<!--sets type of input to number, inputbox for TenDayDiscount, min =0 , max =70 , has to be filled -->  
        </div> 
        <br>
       
		<!--submit and clear buttons-->
         <div class="button-group">
                <button type="submit">Submit</button>
                <button type="reset">Clear</button>
            </div>
		
    
</form> <!-- end of form  -->
	<script src="Valid.js"></script> <!--link to js file-->
</div>  <!-- end -->
 


</body> <!-- end of body  -->
</html> <!-- end of html -->