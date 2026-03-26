<!--
Student name: Kobi Bourne 
Student Number: C00249676
Date: 12/02/2026
Task:Rental Category Delete Screen  
-->
<!DOCTYPE html> <!--tells browser its a html doctype -->
<?php session_start(); //start session 
?>


<html> <!--start of html -->
<head> <!--start of head -->
    <title>Rental Managment </title> <!--what is in tab -->
    <link rel="stylesheet" href="../../GroupWork/global.css"> <!--link to css file-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--makes page responsive -->

</head> <!--end of head -->
<body> <!--start of body -->
	 <!--links header and nav  and con files -->
    <?php include '../../GroupWork/db.inc.php'; ?> <!--check this file pos-->
	<?php include('../../GroupWork/header.php') ?>
    
    <div class="main">
        <div class="nav">
		<?php include('../../GroupWork/nav.php') ?>
        </div>

    <script>
        function populate() //function to fill table 
        {
            var sel = document.getElementById("listbox"); //get listbox 
            var result;  // var to save result
            result = sel.options[sel.selectedIndex].value;  // get value of selected option
            var rentalDetails = result.split(','); // split string into array
           //document.getElementById("display").innerHTML = "The details of the selected person are: " + result
            document.getElementById("deleteRentalCategory").value = rentalDetails[0];
            document.getElementById("deleteStndDayCost").value = rentalDetails[1];
            document.getElementById("deleteFiveDayDiscount").value = rentalDetails[2];
            document.getElementById("deleteTenDayDiscount").value = rentalDetails[3];
        }

        function confirmCheck() //function to confirm delete  
		{
            var response; // var to save response
            response = confirm('Are you sure you want to delete this rental cat?');
            if (response) //if clicked ok , send to php 
            {
				// enable fields so php can read vals
                document.getElementById("deleteRentalCategory").disabled = false;
                document.getElementById("deleteStndDayCost").disabled = false;
                document.getElementById("deleteFiveDayDiscount").disabled = false;
                document.getElementById("deleteTenDayDiscount").disabled = false;
                return true; //allow submission 
            } 
            else //if cancel 
            {
                populate(); // reset fields to current selection
                return false; // stop form submission
            }
        }
    </script>

    <!--<p id="display"></p>-->
	<!-- Form to delete rental category -->
    <form name="deleteForm" action="delete.php" onsubmit="return confirmCheck()" method="post">
		
	<div class="form"> <!--class for form -->
		
    <h2>Delete a Rental Cat</h2> <!--headings-->
		
    <h3>Please select a Rental Cat and click the delete button</h3>
		<br>

    <div class="form-group">
	<label for="listbox">Select Rental Cat</label>	
    <?php include 'listbox.php'; ?> <!--link listbox-->
</div>
       
		 <!-- Input fields for details -->
		<div class="form-group">
            <label for="deleteRentalCategory">Rental Category </label>
            <input type = "text" name = "deleteRentalCategory" id = "deleteRentalCategory" disabled>
        </div>   
		
        <div class="form-group">
            <label for="deleteStndDayCost">Standard Day Rate </label>
            <input type = "text" name = "deleteStndDayCost" id = "deleteStndDayCost" disabled >
        </div>
		
        <div class="form-group">
            <label for="deleteFiveDayDiscount">Five Day Discount</label>
            <input type="text" name = "deleteFiveDayDiscount" id = "deleteFiveDayDiscount" disabled>
        </div>
		
        <div class="form-group">   
            <label for="deleteTenDayDiscount">Ten Day Discount</label>
            <input type = "text" name = "deleteTenDayDiscount" id = "deleteTenDayDiscount" disabled>
        </div>
		
        <div class="button-group">    <!--delete button-->
            <button type = "submit" class="deletebutton">Delete the record</button>
			</div>
		<br>
	</div>
    

    <?php
    if (ISSET($_SESSION["RentalCategory"])) //if deleted , print  
	{
        echo "<h3> Record deleted for ". $_SESSION["RentalCategory"] . "</h3>" ;
    }
    session_destroy(); //delete session data 
    ?>
</form> <!--end form-->
</div> <!--end main-->
</body> <!--end body-->
</html> <!--end html-->