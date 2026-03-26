<!-- 
•	Using a list box show the names of all the companys on the table. 
•	Allow the user to select a company then display all of the details in labelled text boxes for viewing only (disabled).
•	When the user clicks a button to amend the details, enable the text boxes (except the primary key field), and allow the user to change the details.
•	Include some validation before the details can be saved.
•	When the user clicks “Save”, present him/her with the option to confirm or cancel the changes.
•	If the changes are confirmed, update the database, otherwise, no changes should be made.


This is for selecting a comapany from the db table
Jessica Power
C00312811
Feb - 2026
-->

<?php
// Include database connection settings and open a mysqli connection in $con
include "../../GroupWork/db.inc.php";

// Set default timezone so date/time functions behave consistently
date_default_timezone_set('UTC');

// Build SQL query to get active companys
$sql = "SELECT CompanyID, Name, Address, PhoneNo, WebAddress, Email, CreditLimit, isBlacklisted, AmountOwed ,timesBlacklisted
        FROM Company 
        WHERE deleteFlag = 0
         ";

// Run the query and handle any errors
if (!$result = mysqli_query($con, $sql)) {
    die('Error in querying the database: ' . mysqli_error($con));
}

// Start the HTML select list; when an option is clicked, call JavaScript function populate()
echo "<div class='listboxJ'><br><select name='listbox' id='listbox' onclick='populate()'><option >Select Company</option>";


// Loop through each row returned from the query
while ($row = mysqli_fetch_array($result)) {

    // Extract fields from the current database row
    $id             = $row['CompanyID'];
    $name           = $row['Name'];
    $address        = $row['Address'];
    $phoneNo        = $row['PhoneNo'];
    $web            = $row['WebAddress'];
    $email          = $row['Email'];
    $credit         = $row['CreditLimit'];
    $owed           = $row['AmountOwed'];
    $blacklist      = $row['isBlacklisted'];
    $times          = $row['timesBlacklisted'];

    // Build a combined string to store as the option value
    // (id, company name, address, contact number, email, etc)
    $allText = "$id,$name,$address,$phoneNo,$web,$email,$credit,$owed,$blacklist,$times";

    // Output an option element showing company name to the user
    echo "<option value='$allText'>$name</option>";
}

// Close the select tag
echo "</select></div>";

// Close the database connection
mysqli_close($con);
?>
