<!--
    Screen - Add new company
    This screen is a form to input data on a new company that is to be added to
    the database, table Company
    Jessica Power
    C00312811
    coding started - Feb 2026
-->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Company Management</title>

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
            id="newCompany" 
            action="CompanyAdd.php" 
            onsubmit="return confirmCheck()"
            method="POST">

            <h2>Add a new Company to record</h2>

            <div class="form-group">
                <label for="name"> Company Name </label>
                <input  type="text" 
                        name="name" 
                        id="name" 
                        placeholder="Company name"
                        autocomplete="off"
                        pattern="[A-Za-z .]+"
						title="Letters, spaces and dots only"
                        required>
            </div>

            <div class="form-group">
                <label for="address"> Company Address </label>
                <input  type="text" 
                        name="address" 
                        id="address" 
                        placeholder="Address"
                        pattern="[a-zA-Z0-9 ]+"
						title="No commas"
                        autocomplete="off"
                        required>
            </div>
                
            <div class="form-group">
                <label for="phoneNo"> Phone Number </label>
                <input  type="text" 
                        name="phoneNo" 
                        id="phoneNo" 
                        placeholder="Phone Number"
                        title="Digits only"
                        pattern="[0-9 ]+"
					    autocomplete="off"
                        required>
            </div>

            <div class="form-group">
                <label for="web"> Company website </label>
                <input  type="text" 
                        name="web" 
                        id="web" 
                        placeholder="www.example.ie"
                        pattern="(w{3}\.)?[\w\d]*\.([a-zA-Z]*\.)?([a-zA-Z]*)?$"
						title="Please enter a valid URL"
					    autocomplete="off"
                        required>
            </div>

            <div class="form-group">
                <label for="email" > Email </label>
                <input  type="text" 
                        name="email" 
                        id="email" 
                        placeholder="employee@example.ie"
                        title="Enter a valid email address"
					    autocomplete="off"
                        pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$"
                        required>
           </div>

            <div class="form-group">
                <label for="credit"> Credit Limit </label>
                <input  type="text" 
                        name="credit" 
                        id="credit" 
                        placeholder="Credit Limit"
                        title="Authorized credit limit (MAX €9999)"
                        maxlength="4"
                        pattern="[0-9]+"
					    autocomplete="off"
                        value="1000"
                        required>
            </div>
            
            <div ></div>

             <!-- Submit & Clear buttons -->
            <div class="button-group">
                <button type="submit">Submit</button>
                <button type="reset">Clear</button>
            </div>
        </form>

      <script src="../Company.js"></script>
</div>
    </body>
</html>