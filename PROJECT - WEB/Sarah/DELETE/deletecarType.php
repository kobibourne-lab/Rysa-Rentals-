<?php
/* Name: Sarah Crotty */
/* ID: C00309469 */
/* Purpose: php file for delete screen - sets DeletedFlag to 'Y' (soft delete) */
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

// variables from hidden POST fields
$delID           = mysqli_real_escape_string($con, $_POST["delID"]);
$delManufacturer = mysqli_real_escape_string($con, $_POST["delManufacturer"]);
$delModel        = mysqli_real_escape_string($con, $_POST["delModel"]);
$delVersion      = mysqli_real_escape_string($con, $_POST["delVersion"]);
$delEngine       = mysqli_real_escape_string($con, $_POST["delEngine"]);
$delFuel         = mysqli_real_escape_string($con, $_POST["delFuel"]);
$delCategory     = mysqli_real_escape_string($con, $_POST["delCategory"]);

// check if any non-deleted cars of this type still exist in the fleet
$check = "SELECT * FROM Car WHERE carType = '$delID' AND DeletedFlag = 'N'";
$checkResult = mysqli_query($con, $check);

if (!$checkResult)
{
    die("Check query failed: " . mysqli_error($con));
}

if (mysqli_num_rows($checkResult) > 0)
{
    // cars still exist for this type - refuse the delete
    echo "<form class='php-form'><h3>Error: Cannot delete this car type — there are still cars of this type in the fleet.</h3><br>" .
    "Car Type ID : " . $delID . "<br>" .
    "Manufacturer is : " . $delManufacturer . "<br>" .
    "Model is : " . $delModel . "<br>" .
    "Version is : " . $delVersion . "<br>" .
    "<br><div class='button-group'><a href='deletecarType.html.php' class='return'>Return to Delete Page</a></div>" .
    "</form>";
}
else
{
    // no cars of this type exist - safe to soft delete
    $sql = "UPDATE CarType SET DeletedFlag = 'Y' WHERE CarTypeID = '$delID'";

    if (!mysqli_query($con, $sql))
    {
        die("The delete has failed: " . mysqli_error($con));
    }

    // check something was actually updated
    if (mysqli_affected_rows($con) != 0)
    {
        // success output
        echo "<form class='php-form'><h3>Car type flagged for deletion successfully:</h3><br>" .
        "Car Type ID : " . $delID . "<br>" .
        "Manufacturer is : " . $delManufacturer . "<br>" .
        "Model is : " . $delModel . "<br>" .
        "Version is : " . $delVersion . "<br>" .
        "Engine Size is : " . $delEngine . "<br>" .
        "Fuel Type is : " . $delFuel . "<br>" .
        "Category is : " . $delCategory . "<br>" .
        "<br><div class='button-group'><a href='deletecarType.html.php' class='return'>Return to Delete Page</a></div>" .
        "</form>";
    }
    else
    {
        // nothing changed
        echo "<form class='php-form'><h3>Error: No record was updated. Please try again.</h3><br>" .
        "Car Type ID : " . $delID . "<br>" .
        "<br><div class='button-group'><a href='deletecarType.html.php' class='return'>Return to Delete Page</a></div>" .
        "</form>";
    }
}

// closing database connection
mysqli_close($con);
?>

</div>
</body>
</HTML>
