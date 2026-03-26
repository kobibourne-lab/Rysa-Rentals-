<!-- Name: Sarah Crotty -->
<!-- Student Number: C00309469 -->
<!-- Purpose: add car type screen form html -->
<!--Project: Car rental -->
<HTML>
<head>
<link rel="stylesheet" type="text/css" href="../../GroupWork/global.css"> <!-- link css -->
</head>
<body>

<?php include('../../GroupWork/header.php') ?> <!-- include header -->

<div class="main">
<div class="nav"> <!-- nav bar link -->
<?php include('../../GroupWork/nav.php') ?> <!-- include navbar php -->
</div>

<!-- FORM -->
    <form method="POST" action="addcarType.php" onsubmit="return validateForm();">
		<h2> Add A New Car Type </h2>
    <div class="form-group">
        <label for="manufacturer"> Manufacturer:</label>
        <input type=text id="manufacturer" name="manufacturer" required pattern="[A-Za-z\s]+" title="Letters only" maxlength="30">
    </div>
    <div class="form-group">
        <label for="model"> Model:</label>
        <input type=text id="model" name="model" required pattern="[A-Za-z0-9\s\-]+" title="Letters, numbers, spaces and hyphens only" >
	</div>
    <div class="form-group">
        <label for="version"> Version:</label>
        <input type=text id="version" name="version" required pattern="[A-Za-z\s]+" title="Letters only" maxlength="20">
	</div>
    <div class="form-group">
        <label for="engine"> Engine Size:</label>
        <input type=number id="engine" name="engine" min="0" max="3.0" step="0.1" required>
	</div>
    <div class="form-group">
        <label for="fuel"> Fuel Type:</label>
        <select name="fuel" id="fuel" required>
            <option value="">Select Fuel Type</option>
            <option value="hybrid">Hybrid</option>
            <option value="electric">Electric</option>
            <option value="petrol">Petrol</option>
            <option value="diesel">Diesel</option>
        </select>
	</div>
    <div class="form-group">
        <label for="category">Rental Category:</label>
        <select name="category" id="category" required>
            <option value="">Select Rental Category</option>
            <?php
                include '../../GroupWork/db.inc.php';

                $sql = "SELECT RentalCategory FROM RentalCat ORDER BY RentalCategory";
                $result = mysqli_query($con, $sql);

                if (!$result) 
                    {
                        die("Query failed: " . mysqli_error($con));
                    }

                while ($row = mysqli_fetch_array($result)) 
                    {
                        echo "<option value='" . $row['RentalCategory'] . "'>" . $row['RentalCategory'] . "</option>";
                    }
            ?>
        </select>
	</div>
        
    <!-- BUTTONS -->
		<div> </div>
    <div class="button-group">
        <button type="submit">Submit</button>
        <button type="reset">Clear</button>
	</div>
</form>
        <script src="addcarType.js"></script>		<!--linking external javascript file-->
	</div>
</body>
</HTML>