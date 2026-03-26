<!-- 
Write the code, html, CSS, Javascript and php to do the following:
•	Using a list box show the names of all the students on the table. 
•	Allow the user to select a student then display all of the student details in labelled text boxes for viewing only (disabled).
•	When the user clicks a button to amend the details, enable the text boxes (except the primary key field), and allow the user to change the details.
•	Include some validation before the details can be saved.
•	When the user clicks “Save”, present him/her with the option to confirm or cancel the changes.
•	If the changes are confirmed, update the database, otherwise, no changes should be made.


This is for viewing and amending details HTML, Javascript side
Jessica Power
C00312811
Feb - 2026
-->
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
  <title>Company Management</title>
    <!-- Link to external CSS file for page layout and styling -->
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
        action="CompanyAmend.php"
        onsubmit="return confirmCheck2()"
        method="post"
    >
    <!-- Page heading -->
    <h2>Amend/View Company Records</h2>

    <!-- Instructional text for the user -->
    <h4>Please select a Company and then click the amend button if you wish to update</h4>

          <!-- Include the PHP file that outputs the <select> list (listbox) of companys -->
        <?php include 'CompanyList.php'; ?>

    <!-- Button to unlock the form fields for editing -->
    <div class="form-group">
    <input
        type="button"
        value="Amend Details"
        id="amendViewbutton"
        onclick="toggleLock()"
    >
    </div>
    <!-- Form that submits amended details -->
    <!-- onsubmit calls confirmCheck2() to confirm before saving -->
    
    <div class="form-group">
        <!-- Student ID field (read-only until unlocked) -->
        <label for="amendid">Company Id</label>
        <input
            type="text"
            name="amendid"
            id="amendid"
            disabled
            value="amend"
        >
    </div>

    <div class="form-group">
        <!-- Name field -->
        <label for="amendName">Company Name</label>
        <input
            type="text"
            name="amendName"
            id="amendName"
            placeholder="Company name"
            autocomplete="off"
            pattern="[A-Za-z .]+"
            title="Letters, spaces and dots only"
            disabled
        >
    </div>

    <div class="form-group">
        <!-- Address field -->
        <label for="amendAddress">Company Address</label>
        <input
            type="text"
            name="amendAddress"
            id="amendAddress"
            placeholder="Address"
            pattern="[a-zA-Z0-9 ]+"
            title="No commas"
            autocomplete="off"
            disabled
        >
    </div>

    <div class="form-group">
        <!-- Phone number field -->
        <label for="amendPhone">Contact Phone No.</label>
        <input
            type="text"
            name="amendPhone"
            id="amendPhone"
            placeholder="Phone Number"
            title="Digits only"
            pattern="[0-9 ]+"
            autocomplete="off"
            disabled
        >
    </div>

    <div class="form-group">
        <!-- Web Address -->
        <label for="amendWeb">Company's URL</label>
        <input
            type="text"
            name="amendWeb"
            id="amendWeb"
            placeholder="www.example.ie"
            pattern="(w{3}\.)?[\w\d]*\.([a-zA-Z]*\.)?([a-zA-Z]*)?$"
            title="Please enter a valid URL"
            autocomplete="off"
            disabled
        >
    </div>

    <div class="form-group">
        <!-- Email field -->
        <label for="amendEmail">Contact Email</label>
        <input
            type="text"
            name="amendEmail"
            id="amendEmail"
            placeholder="employee@example.ie"
            title="Enter a valid email address"
            autocomplete="off"
            pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$"
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
            title="Authorized credit limit (MAX €9999)"
            maxlength="4"
            pattern="[0-9]+"
            autocomplete="off"
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

    <div class="form-group">
            <!-- credit limit field -->
            <label for="blacklist"> Blacklist </label>
            <input  
                type="text" 
                name="blacklist" 
                id="blacklist" 
                placeholder="Blacklist"
                disabled
                >
    </div>

    <div class="form-group">
            <!-- credit limit field -->
            <label for="tBlacklist"> Times Blacklisted </label>
            <input  
                type="text" 
                name="tBlacklist" 
                id="tBlacklist" 
                placeholder="Times Blacklisted"
                disabled
                >
    </div>

    <div id="text" class="notSubmitted" ></div>

        <br><br>
    <div class="form-group">
        <!-- Submit button to save changes -->
        <input
            type="submit"
            value="Save Changes"
            class = "return">
    </div>
    </form>
    <script src="../Company.js"></script>
</div>
</body>
</html>
