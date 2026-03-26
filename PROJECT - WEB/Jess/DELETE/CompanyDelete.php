<!-- 
This is the php side of the delete screen setting the deleteFlag to 1/true and updating the 
amended date stamp


Jessica Power
C00312811
March - 26
-->

<meta charset="UTF-8">
  <title>Company Management</title>
<link rel="stylesheet" type="text/css" href="../../GroupWork/global.css">

	<?php include('../../GroupWork/header.php') ?>
    
    <div class="main">
        <div class="nav">
		<?php include('../../GroupWork/nav.php') ?>
        </div>
<form name="myForm" action="CompanyDelete.html.php" method="post">
	

<?php
// Include database connection file (should create $con connection variable)
include '../../GroupWork/db.inc.php';

// Set the default timezone to UTC
date_default_timezone_set('UTC');
	
	 $date = date("Y-m-d H:i:s");

// SQL query to "soft delete" a record by setting deletedflag = true
// It uses the CompanyID sent via POST (from form)
$sql = "UPDATE Company 
        SET
            deleteFlag = true,
            DateAmended = '{$date}'

        WHERE 
                CompanyID = '{$_POST['delid']}' 
            AND isBlacklisted = '0' 
            AND AmountOwed = '0'";

// Execute the SQL query
if (!$result = mysqli_query($con, $sql)) 
{
    // If query fails, display the error message
    echo "Error " . mysqli_error($con);
}


 
// Check if any rows were actually updated
    if (mysqli_affected_rows($con) != 0 ) {

        // Display success message with record count
        echo mysqli_affected_rows($con) . " record deleted <br><br><br>";

        // Display confirmation of updated company details
        echo "Company Id : " . $_POST['delid'] . " <br><br>" .
             "Company Name : " .$_POST['delName'] . " " . "<br>".
             "Email : " .$_POST['delEmail'] ." " . "<br>" .
			 "Contact No. : " .$_POST['delPhone'] . " " . "<br><br>" .

             "<br><br><br> Has been deleted<br><br><br>";

    } else{
        // Display confirmation of updated company details
        echo "Company Id : " . $_POST['delid'] . " <br><br>" .
             "Company Name : " .$_POST['delName'] . " " . "<br>".
             "Email : " .$_POST['delEmail'] ." " . "<br>" .
             "Contact No. : " .$_POST['delPhone'] . " " . "<br><br>" .
             "Amount Owed : " .$_POST['owed'] ." " . "<br>" .
             "BlackListed : " .$_POST['blacklisted'] ." " . "<br>" .
			
             "<br><br><br> Has not been deleted<br><br><br>";
    }

// Close the database connection
mysqli_close($con);
?>

    <div class="form-group">
    <input type = "submit" class="return" value = "Return to insert screen"
    onclick="window.location.href='CompanyDelete.html.php'">
</div>
</form>