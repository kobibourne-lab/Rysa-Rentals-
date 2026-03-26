<!-- 
•	Using a list box show the names of all the company on the table. 
•	Allow the user to select a company then display all of the details in labelled text boxes for viewing only (disabled).
•	When the user clicks a button to amend the details, enable the text boxes (except the primary key field), and allow the user to change the details.
•	Include some validation before the details can be saved.
•	When the user clicks “Save”, present him/her with the option to confirm or cancel the changes.
•	If the changes are confirmed, update the database, otherwise, no changes should be made.


This is for viewing and amending details php for updating the table with amended details
Jessica Power
C00312811
Feb - 2026
-->

<meta charset="UTF-8">
  <title>Company Management</title>
<link rel="stylesheet" type="text/css" href="../../GroupWork/global.css">
<?php include('../../GroupWork/header.php') ?>
    
    <div class="main">
        <div class="nav">
		<?php include('../../GroupWork/nav.php') ?>
        </div>
<form action="CompanyAmend.html.php" method="post">
<?php

// Include database connection file
include '../../GroupWork/db.inc.php';

// Set the default timezone to UTC
date_default_timezone_set('UTC');
	
	 $date = date("Y-m-d H:i:s");

// Build the SQL UPDATE query to amend company details
$sql = "
    UPDATE Company
    SET 
        Name                = '{$_POST['amendName']}',
        Address             = '{$_POST['amendAddress']}',
        PhoneNo             = '{$_POST['amendPhone']}',
        WebAddress          = '{$_POST['amendWeb']}',
        Email               = '{$_POST['amendEmail']}',
        CreditLimit         = '{$_POST['credit']}',
		DateAmended         = '{$date}'

    WHERE 
        CompanyID              = '{$_POST['amendid']}'";

// Execute the query and check for errors
if (!mysqli_query($con, $sql)) {

    // Output MySQL error if query fails
    echo "Error: " . mysqli_error($con);

} else {

    // Check if any rows were actually updated
    if (mysqli_affected_rows($con) != 0) {

        // Display success message with record count
        echo mysqli_affected_rows($con) . " record updated <br><br>";

        // Display confirmation of updated company details
        echo "Company Id " . $_POST['amendid'] . ", <br>" .
             $_POST['amendName'] . " " . "<br>".
             $_POST['amendEmail'] ." " . "<br>" .
			$_POST['amendPhone'] .
             "<br><br><br> has been updated<br><br><br>";

    } else {

        // No rows changed (e.g. same data submitted)
        echo "No records were changed<br><br><br>";
    }
}

// Close the database connection
mysqli_close($con);

?>

    <div class="form-group">
    <input type = "submit" class="return" value = "Return to insert screen"
    onclick="window.location.href='CompanyAmend.html.php'">
	</div>

</form>