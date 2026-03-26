<!-- Name: Sarah Crotty -->
<!-- Student Number: C00309469 -->
<!-- Purpose: amend/view car type screen form html -->
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
<form method="POST" action="amendcarType.php" onsubmit="return confirmCheck();" name="amendForm">
    <h2>Amend / View a Car Type</h2>

    <!-- LISTBOX -->
    <div class="form-group">
        <label for="listbox">Select Car Type:</label>
        <select id="listbox" name="listbox" onclick="populate()">
            <option value="" selected disabled>-- Select a Car Type --</option>
            <?php
                include '../../GroupWork/db.inc.php';

                // only show car types not flagged for deletion
                $sql = "SELECT CarTypeID, Manufacturer, Model, Version, EngineSize, FuelType, RentalCategory
                        FROM CarType
                        WHERE DeletedFlag = 'N'
                        ORDER BY Manufacturer, Model";

                $result = mysqli_query($con, $sql);

                if (!$result)
                {
                    die("Query failed: " . mysqli_error($con));
                }

                while ($row = mysqli_fetch_array($result))
                {
                    // comma-separated value so populate() can split and fill the fields
                    $allText = $row['CarTypeID'] . "," . $row['Manufacturer'] . "," . $row['Model'] . "," .
                               $row['Version'] . "," . $row['EngineSize'] . "," . $row['FuelType'] . "," .
                               $row['RentalCategory'];

                    echo "<option value='" . $allText . "'>" .
                         $row['Manufacturer'] . " " . $row['Model'] . " " . $row['Version'] .
                         "</option>";
                }

                mysqli_close($con);
            ?>
        </select>
    </div>

    <!-- car type is disabled so cant be edited-->
    <div class="form-group">
        <label for="amendID">Car Type ID:</label>
        <input type="text" id="amendID" name="amendID" disabled/>
    </div>

    <div class="form-group">
        <label for="amendManufacturer">Manufacturer:</label>
        <input type="text" id="amendManufacturer" name="amendManufacturer" pattern="[A-Za-z\s]+" title="Letters only" maxlength="30" disabled/>
    </div>

    <div class="form-group">
        <label for="amendModel">Model:</label>
        <input type="text" id="amendModel" name="amendModel" pattern="[A-Za-z0-9\s\-]+" title="Letters, numbers, spaces and hyphens only" disabled/>
    </div>

    <div class="form-group">
        <label for="amendVersion">Version:</label>
        <input type="text" id="amendVersion" name="amendVersion" pattern="[A-Za-z\s]+" title="Letters only" maxlength="20" disabled/>
    </div>

    <div class="form-group">
        <label for="amendEngine">Engine Size:</label>
        <input type="number" id="amendEngine" name="amendEngine" min="0" max="3.0" step="0.1" disabled/>
    </div>

    <div class="form-group">
        <label for="amendFuel">Fuel Type:</label>
        <select id="amendFuel" name="amendFuel" disabled>
            <option value="">Select Fuel Type</option>
            <option value="hybrid">Hybrid</option>
            <option value="electric">Electric</option>
            <option value="petrol">Petrol</option>
            <option value="diesel">Diesel</option>
        </select>
    </div>

    <div class="form-group">
        <label for="amendCategory">Rental Category:</label>
        <select id="amendCategory" name="amendCategory" disabled>
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

                mysqli_close($con);
            ?>
        </select>
    </div>

    <!-- BUTTONS -->
    <div class="button-group">
        <button type="button" class="amendbutton" id="amendBtn" onclick="toggleLock()">Amend Details</button>
        <button type="submit">Save Changes</button>
        <button type="reset" onclick="resetForm()">Clear</button>
    </div>

</form>

<script src="amendcarType.js"></script> <!--linking external javascript file-->
</div>
</body>
</HTML>
