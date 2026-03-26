<!-- 
•	Using a list box show the names of all the companys on the table. 
•	Allow the user to select a company then display all of the details in labelled text boxes for viewing only (disabled).
•	Include some validation before the details can be saved.
•	When the user clicks “Delete”, present him/her with the option to confirm or cancel the changes.
•	If the changes are confirmed, update the database, otherwise, no changes should be made.


This is for selecting a comaony from the db table
Jessica Power
C00312811
MARCH - 2026
-->

<?php
session_start();
// Include database connection settings and open a mysqli connection in $con
include "../../GroupWork/db.inc.php";

// Set default timezone so date/time functions behave consistently
date_default_timezone_set('UTC');

// Build SQL query to get active companys
$sql = "SELECT Name, Address, CreditLimit, AmountOwed, CompanyID
        FROM Company 
        WHERE deleteFlag = 0 AND isBlacklisted = 0
         ";

// Run the query and handle any errors
if (!$result = mysqli_query($con, $sql)) {
    die('Error in querying the database: ' . mysqli_error($con));
}

// Start the HTML select list, when an option is clicked, call JavaScript function popDelete()
echo "<div class='listboxJ'><br><select name='listbox' id='listbox' onclick='popSel()' required><option >Select Company</option>";


// Loop through each row returned from the query
while ($row = mysqli_fetch_array($result)) {

    // Extract fields from the current database row
    $name           = $row['Name'];
	$address        = $row['Address'];
	$credit         = $row['CreditLimit'];
	$owed           = $row['AmountOwed'];
    $id             =$row['CompanyID'];   
    $allText = "$name,$address,$credit,$owed,$id";

    $_SESSION['company']=$row['CompanyID'];
    
	
    // Output an option element showing name to the user
    echo "<option value='$allText'>$name</option>";
}

// Close the select tag
echo "</select></div>";

// Close the database connection
mysqli_close($con);
?>