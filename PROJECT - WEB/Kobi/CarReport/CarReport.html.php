
<!--
Student name: Kobi Bourne 
Student Number: C00249676
Date: 12/02/2026
Task:Rental Category Amend/View Screen  
-->
<!DOCTYPE html> <!--tells browser its a html doctype -->
<html> <!--start of html -->
<head> <!--start of head -->
  <title>Car Reports</title>  <!--what appears in tab -->
  <?php include '../../GroupWork/db.inc.php';?> <!--con class link -->
  
  <link rel="stylesheet" type="text/css" href="../../GroupWork/global.css"> <!-- Link to CSS  -->
</head> <!--end of head -->
<body> <!--start of body -->
	 <!--links header and nav files -->
    <?php include('../../GroupWork/header.php') ?>
    <div class="main"> <!--main container for page content -->
        <div class="nav"> <!--div for nav styling-->
		<?php include('../../GroupWork/nav.php') ?>
        </div>
		
		<!-- Form to show amended details -->
        <form action = "CarReport.html.php" method = "post" name = "CarReport">
            <input type = "hidden" name = "choice">
			<!--form submits to same page to refresh report -->
                <h2>Car Report</h2> <!--heading-->
            
			<div class="form-group"> <!--buttons to change order of report -->
            <input type = 'button' id = "modelButton" value = 'model Style'
            onclick = 'modelOrder()' title = 'Car Reports ordered by model' disabled>
            <input type = 'button' id = "popButton" value = 'Popular Order'
            onclick = 'popOrder()' title = 'Car Reports ordered by popularity'>
            <input type = 'button' id = "oldButton" value = 'Oldest Order'
            onclick = 'oldOrder()' title = 'Car Reports ordered from oldest'>
			</div>
            <br>
            <br>
<script>
//order by model
function modelOrder()
{
    document.CarReport.choice.value = "model";
    document.CarReport.submit();
}
//order by times rented 	
function popOrder()
{
    document.CarReport.choice.value = "pop"; //set hidden value
    document.CarReport.submit(); //submit form
}
//order by order date
function oldOrder()
{
    document.CarReport.choice.value = "old";
    document.CarReport.submit();
}
</script>

<?php

$choice = "model";  // default model
if (ISSET($_POST['choice']))
{
$choice = $_POST['choice'];
}
if ($choice == "model") //if model selected
{
    ?>
    <script>
	//disable selected button, enable others
    document.getElementById("modelButton").disabled = true; 
    document.getElementById("popButton").disabled = false;
    document.getElementById("oldButton").disabled = false;
	
    </script>

    <?php
    //model sql query, joins tables and order is Ascending 
    $sql = "SELECT 
            Car.carReg, 
            CarType.Model, 
            CarType.Manufacturer, 
            Car.currentStatus, 
            Car.dateAddedToFleet, 
            Car.cumulativeRentals
        FROM Car
        JOIN CarType ON Car.carType = CarType.CarTypeID
        WHERE Car.DeletedFlag = 0
        ORDER BY CarType.Model ASC";

    Report($con,$sql); //call report function
}
if ($choice == "pop") //if popularity selected
{  
    ?>
<script>
    document.getElementById("modelButton").disabled = false;
    document.getElementById("popButton").disabled = true;
    document.getElementById("oldButton").disabled = false;
    </script>
<?php
    $sql = "SELECT 
            Car.carReg, 
            CarType.Model, 
            CarType.Manufacturer, 
            Car.currentStatus, 
            Car.dateAddedToFleet, 
            Car.cumulativeRentals
        FROM Car
        JOIN CarType ON Car.carType = CarType.CarTypeID
        WHERE Car.DeletedFlag = 0
        ORDER BY Car.cumulativeRentals DESC";
                    
    Report($con,$sql);
    
}
if($choice == "old")  //if oldest order selected
{
    ?>
    <script>
    document.getElementById("modelButton").disabled = false;
    document.getElementById("popButton").disabled = false;
    document.getElementById("oldButton").disabled = true;
    </script>
<!---->			
<?php
    $sql = "SELECT  
            Car.carReg, 
            CarType.Model, 
            CarType.Manufacturer, 
            Car.currentStatus, 
            Car.dateAddedToFleet, 
            Car.cumulativeRentals
        FROM Car
        JOIN CarType ON Car.carType = CarType.CarTypeID
        WHERE Car.DeletedFlag = 0
        ORDER BY Car.dateAddedToFleet ASC";

    Report($con,$sql);
};

function Report($con,$sql)  //display table
{
    $result = mysqli_query($con,$sql); //run query, result = query
	
	 //start table
    echo "<div style='text-align:center;'><table>
            <tr><th>CarReg</th><th>Model</th><th>Brand</th><th>Status</th><th>DateAdded</th><th>TimesRented</th></tr>";

    while ($row=mysqli_fetch_array($result)) //loop through results

    {  
		//print rows
        echo    "<tr>
				<td>". $row['carReg']." </td>
                <td>".$row['Model']."</td>
                <td>".$row['Manufacturer']."</td>
                <td>".$row['currentStatus']."</td>
                <td>". $row['dateAddedToFleet']."</td>
                <td>". $row['cumulativeRentals']."</td>
                
                </tr>";
    }
    echo "</table></div>"; //end of table
}

mysqli_close($con); //con close 
?>

      <script src="amend.js"></script> <!--link to js file-->				
</form> <!-- end of form  -->
</div> <!--end main -->
</body> <!-- end of body  -->
</html> <!-- end of html -->