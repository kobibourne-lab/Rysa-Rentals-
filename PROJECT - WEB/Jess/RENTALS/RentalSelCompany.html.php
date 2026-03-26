<!--
    Screen - Add new company
    This screen is a form to input data on a new company that is to be added to
    the database, table Company
    Jessica Power
    C00312811
    coding started - Feb 2026
-->
<?php session_start();  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Rentals</title>

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
            name="myForm"
            action="Rent.html.php"
            onsubmit="return confirmSel() && validateSel('listbox');"
            method="post">

            <h2>Rentals</h2>

                <h4 style="text-align:center;">Select the company looking to rent a vehicle</h4>
			
			<div class="form-group">

             <!-- Include the PHP file that outputs the <select> list (listbox) of companys -->
			
						<?php include 'CompanySel.php';  ?> 
				<input type="button" class="return" value="Add a Company" 
                    onclick="window.location.href='../AddCompany/CompanyAdd.html.php'">
			</div>


            <div class="form-group">
        <!-- Name field -->
        <label for="comID">Company ID</label>
        <input
            type="text"
            name="comID"
            id="comID"
            placeholder="Company ID"
			   value=""
			   required
            disabled
        >
    </div>

            <div class="form-group">
        <!-- Name field -->
        <label for="comName">Company Name</label>
        <input
            type="text"
            name="comName"
            id="comName"
            placeholder="Company name"
			   required
            disabled
        >
    </div>

    <div class="form-group">
        <!-- Address field -->
        <label for="comAddress">Company Address</label>
        <input
            type="text"
            name="comAddress"
            id="comAddress"
            placeholder="Address"
            disabled
        >
    </div>

    <div class="form-group">
        <!-- credit limit field -->
        <label for="credit"> Credit Limit </label>
        <input  
            type="text" 
            name="credit" 
            id="credit" 
            placeholder="Credit Limit"
            disabled
            >
    </div>

    <div class="form-group">
        <!-- credit limit field -->
        <label for="owed"> Amount Owed </label>
        <input  
            type="text" 
            name="owed" 
            id="owed" 
            placeholder="Amount Owed"
            disabled
            >
    </div>

    <br><br>
    <div class="form-group">
        <!-- Submit button to save changes -->
        <input
            type="submit"
            value="Continue"
            class = "return">
    </div>
</form>

<script type="text/javascript">// this function validates that a company has been selected from the drop down before proceeding
            function validateSel() {
                var com = document.getElementById('listbox');
                if(com.selectedIndex == 0 || com.options[com.selectedIndex].value == -1) {
                    alert('select a Company from option!');
                    return false;
                }
                return true;
            }
        </script>
      <script src="../Company.js"></script>
</div>
    </body>
</html>
