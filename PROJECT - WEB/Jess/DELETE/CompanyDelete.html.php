<!-- 
This is the Company delete screen for selecting a company displaying some of their info
such as money owed by them and if they are blacklisted or not as these values must be 0 
to be able to delete them


This is for deleting details HTML, Javascript side
Jessica Power
C00312811
march - 2026
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
        action="CompanyDelete.php"
        onsubmit="return confirmDelete()"
        method="post"
    >
    <!-- Page heading -->
    <h2>Delete Company Records</h2>

    <!-- Instructional text for the user -->
    <h4>Please select a Company you wish to delete</h4>

          <!-- Include the PHP file that outputs the <select> list (listbox) of companys -->
        <?php include 'CompanyListDel.php'; ?>
    <!-- onsubmit calls confirmDelete() to confirm before saving -->
    
    <div class="form-group">
        <!-- Company ID field  -->
        <label for="delid">Company Id</label>
        <input
            type="text"
            name="delid"
            id="delid"
            disabled
        >
    </div>

    <div class="form-group">
        <!-- Name field -->
        <label for="delName">Company Name</label>
        <input
            type="text"
            name="delName"
            id="delName"
            placeholder="Company name"
            disabled
        >
    </div>

    <div class="form-group">
        <!-- Address field -->
        <label for="delAddress">Company Address</label>
        <input
            type="text"
            name="delAddress"
            id="delAddress"
            placeholder="Address"
            disabled
        >
    </div>

    <div class="form-group">
        <!-- Phone number field -->
        <label for="delPhone">Contact Phone No.</label>
        <input
            type="text"
            name="delPhone"
            id="delPhone"
            placeholder="Phone Number"
            disabled
        >
    </div>

    <div class="form-group">
        <!-- Email field -->
        <label for="delEmail">Contact Email</label>
        <input
            type="text"
            name="delEmail"
            id="delEmail"
            placeholder="employee@example.ie"
            disabled
        >
    </div>

    <div class="form-group">
        <!-- amount owed field -->
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
        <!-- blacklisted field -->
        <label for="blacklisted"> Blacklisted </label>
        <input  
            type="text" 
            name="blacklisted" 
            id="blacklisted" 
            placeholder="blacklisted"
            disabled
            >
    </div>

    <div class="form-group">
        <!-- Times blacklisted field -->
        <label for="tBlacklisted"> Times Blacklisted </label>
        <input  
            type="text" 
            name="tBlacklisted" 
            id="tBlacklisted" 
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
            value="Delete"
            class = "return">
    </div>
    </form>
    <script src="../Company.js"></script>
</div>
</body>
</html>
