<!-- Name: Sarah Crotty -->
<!-- ID: C00309469 -->
<!-- Purpose: php file for add screen with connection and insert commands -->
<!-- Project: Car Rental -->
<HTML>
<head>
<link rel="stylesheet" type="text/css" href="../../GroupWork/global.css">
</head>
<body>

<?php include('../../GroupWork/header.php') ?>

<div class="main">
<div class="nav">
<?php include('../../GroupWork/nav.php') ?>
</div>

<?php
include '../../GroupWork/db.inc.php';

$manufacturer = mysqli_real_escape_string($con, $_POST["manufacturer"]);
$model        = mysqli_real_escape_string($con, $_POST["model"]);
$version      = mysqli_real_escape_string($con, $_POST["version"]);
$engine       = mysqli_real_escape_string($con, $_POST["engine"]);
$fuel         = mysqli_real_escape_string($con, $_POST["fuel"]);
$category     = mysqli_real_escape_string($con, $_POST["category"]);

// check for duplicate before inserting
$query = "SELECT * FROM CarType 
          WHERE Manufacturer = '$manufacturer' 
          AND Model = '$model' 
          AND Version = '$version' 
          AND EngineSize = '$engine' 
          AND FuelType = '$fuel' 
          AND DeletedFlag = 'N'";

$result = mysqli_query($con, $query);

if (!$result) 
{
    die("ERROR: " . mysqli_error($con));
}

// inserting if not duplicate
if (mysqli_num_rows($result) == 0)
{
    $insert = "INSERT INTO CarType 
               (Manufacturer, Model, Version, EngineSize, FuelType, RentalCategory) 
               VALUES 
               ('$manufacturer','$model','$version','$engine','$fuel','$category')";

    if (!mysqli_query($con, $insert))
    {
        die("The insert has failed: " . mysqli_error($con));
    }

    $newID = mysqli_insert_id($con);

    echo "<form class='php-form'><h3>Car type details being submitted : </h3><br>" .
    "Auto Generated ID : " . $newID . "<br>" .
    "Manufacturer is : " . $manufacturer . "<br>" .
    "Model is : " . $model . "<br>" .
    "Version is : " . $version . "<br>" .
    "EngineSize is : " . $engine . "<br>" .
    "FuelType is : " . $fuel . "<br>" .
    "Category is : " . $category . "<br>" .
    "<br><div class='button-group'><a href='addcarType.html.php' class='return'>Return to Add Page</a></div>" .
    "</form>";
}
else
{
    echo "<form class='php-form'><h3>Error: This car type already exists so has not been submitted : </h3><br>" .
    "Manufacturer is : " . $manufacturer . "<br>" .
    "Model is : " . $model . "<br>" .
    "Version is : " . $version . "<br>" .
    "EngineSize is : " . $engine . "<br>" .
    "FuelType is : " . $fuel . "<br>" .
    "Category is : " . $category . "<br>" .
    "<br><div class='button-group'><a href='addcarType.html.php' class='return'>Return to Add Page</a></div>" .
    "</form>";
}

mysqli_close($con);
?>

</div>
</body>
</HTML>