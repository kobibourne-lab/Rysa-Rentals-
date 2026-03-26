<?php
/* Name: Sarah Crotty */
/* ID: C00309469 */
/* Purpose: php file for amend/view car type screen - runs UPDATE query */
/* Project: Car Rental */
?>
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

<?php
include '../../GroupWork/db.inc.php';

// variables from POST - CarTypeID tells the WHERE clause which record to update
$amendID           = mysqli_real_escape_string($con, $_POST["amendID"]);
$amendManufacturer = mysqli_real_escape_string($con, $_POST["amendManufacturer"]);
$amendModel        = mysqli_real_escape_string($con, $_POST["amendModel"]);
$amendVersion      = mysqli_real_escape_string($con, $_POST["amendVersion"]);
$amendEngine       = mysqli_real_escape_string($con, $_POST["amendEngine"]);
$amendFuel         = mysqli_real_escape_string($con, $_POST["amendFuel"]);
$amendCategory     = mysqli_real_escape_string($con, $_POST["amendCategory"]);

// check for a duplicate - same details already exist on an active (not deleted) record
// exclude the current record itself using CarTypeID != '$amendID'
$dupCheck = "SELECT * FROM CarType
             WHERE Manufacturer = '$amendManufacturer'
             AND Model          = '$amendModel'
             AND Version        = '$amendVersion'
             AND EngineSize     = '$amendEngine'
             AND FuelType       = '$amendFuel'
             AND DeletedFlag    = 'N'
             AND CarTypeID     != '$amendID'";

$dupResult = mysqli_query($con, $dupCheck);

if (!$dupResult)
{
    die("Duplicate check failed: " . mysqli_error($con));
}

if (mysqli_num_rows($dupResult) > 0)
{
    // a matching active record already exists - refuse the update
    echo "<form class='php-form'><h3>Error: A car type with these details already exists and has not been deleted.</h3><br>" .
    "Manufacturer is : " . $amendManufacturer . "<br>" .
    "Model is : "        . $amendModel        . "<br>" .
    "Version is : "      . $amendVersion      . "<br>" .
    "Engine Size is : "  . $amendEngine       . "<br>" .
    "Fuel Type is : "    . $amendFuel         . "<br>" .
    "<br><div class='button-group'><a href='amendcarType.html.php' class='return'>Return to Amend/View Page</a></div>" .
    "</form>";
    mysqli_close($con);
    exit();
}

// no duplicate found - safe to run the UPDATE
// CarTypeID is never changed, only used in WHERE
$sql = "UPDATE CarType SET
        Manufacturer   = '$amendManufacturer',
        Model          = '$amendModel',
        Version        = '$amendVersion',
        EngineSize     = '$amendEngine',
        FuelType       = '$amendFuel',
        RentalCategory = '$amendCategory'
        WHERE CarTypeID = '$amendID'";

if (!mysqli_query($con, $sql))
{
    die("The update has failed: " . mysqli_error($con));
}

// check rows were actually affected
if (mysqli_affected_rows($con) != 0)
{
    // success output
    echo "<form class='php-form'><h3>Car type updated successfully:</h3><br>" .
    "Car Type ID : "     . $amendID           . "<br>" .
    "Manufacturer is : " . $amendManufacturer . "<br>" .
    "Model is : "        . $amendModel        . "<br>" .
    "Version is : "      . $amendVersion      . "<br>" .
    "Engine Size is : "  . $amendEngine       . "<br>" .
    "Fuel Type is : "    . $amendFuel         . "<br>" .
    "Category is : "     . $amendCategory     . "<br>" .
    "<br><div class='button-group'><a href='amendcarType.html.php' class='return'>Return to Amend/View Page</a></div>" .
    "</form>";
}
else
{
    // no changes were made (user saved without editing anything)
    echo "<form class='php-form'><h3>No changes were made.</h3><br>" .
    "Car Type ID : " . $amendID . "<br>" .
    "<br><div class='button-group'><a href='amendcarType.html.php' class='return'>Return to Amend/View Page</a></div>" .
    "</form>";
}

// close database connection
mysqli_close($con);
?>

</div>
</body>
</HTML>
