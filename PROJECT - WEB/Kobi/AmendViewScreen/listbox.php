<!--
Student name: Kobi Bourne 
Student Number: C00249676
Date: 12/02/2026
Task: listbox php
-->
<?php
include '../../GroupWork/db.inc.php'; //include con class 
date_default_timezone_set('UTC');//set timezone

$sql = "SELECT RentalCategory, StndDayCost, FiveDayDiscount, TenDayDiscount FROM RentalCat WHERE DeleteFlag = 0"; //select fields that are not "deleted"

if (!$result = mysqli_query($con, $sql)) //if query fails 
    {
        die('Error in querying the database' . mysqli_error($con)); // print error
    }

echo "<br><select name = 'listbox' id = 'listbox' onclick = 'populate()'>"; //make lsitbox , call populate when clicked  

while ($row = mysqli_fetch_array($result)) //loop through rows 
    {
        $RentalCategory = $row['RentalCategory']; //store vals from db 
        $StndDayCost = $row['StndDayCost'];
        $FiveDayDiscount = $row['FiveDayDiscount'];
        $TenDayDiscount = $row['TenDayDiscount']; 
        $allText = "$RentalCategory,$StndDayCost,$FiveDayDiscount,$TenDayDiscount"; //combine into one string  
        echo "<option value = '$allText'>$RentalCategory</option>"; // create option in the listbox
    }

echo "</select>"; //close list
mysqli_close($con); //close con

?>