<!-- Name: Sarah Crotty -->
<!-- Student Number: C00309469 -->
<!-- Purpose: delete car type screen form html -->
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
    <form method="POST" action="deletecarType.php" onsubmit="return confirmCheck();">
        <h2>Delete A Car Type</h2>

        <div class="form-group">
            <label for="listbox">Select Car Type:</label>
            <select id="listbox" name="listbox" onclick="populate()" required>
                <option value="">-- Select a Car Type --</option>
                <?php
                    include '../../GroupWork/db.inc.php';

                    // only show car types not already flagged for deletion
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
                        // store all details comma-separated in value so populate() can fill the fields
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

        <!-- visible disabled fields - populate() fills these when user picks from listbox -->
        <div class="form-group">
            <label for="delID">Car Type ID:</label>
            <input type="text" id="delID" name="delID" disabled/>
        </div>
        <div class="form-group">
            <label for="delManufacturer">Manufacturer:</label>
            <input type="text" id="delManufacturer" name="delManufacturer" disabled/>
        </div>
        <div class="form-group">
            <label for="delModel">Model:</label>
            <input type="text" id="delModel" name="delModel" disabled/>
        </div>
        <div class="form-group">
            <label for="delVersion">Version:</label>
            <input type="text" id="delVersion" name="delVersion" disabled/>
        </div>
        <div class="form-group">
            <label for="delEngine">Engine Size:</label>
            <input type="text" id="delEngine" name="delEngine" disabled/>
        </div>
        <div class="form-group">
            <label for="delFuel">Fuel Type:</label>
            <input type="text" id="delFuel" name="delFuel" disabled/>
        </div>
        <div class="form-group">
            <label for="delCategory">Rental Category:</label>
            <input type="text" id="delCategory" name="delCategory" disabled/>
        </div>

        <!-- BUTTONS -->
        <div class="button-group">
            <button type="submit">Delete</button>
            <button type="reset">Clear</button>
        </div>
    </form>

    <script src="deletecarType.js"></script> <!--linking external javascript file-->
</div>
</body>
</HTML>
