
<!-- 
Student Name : Ryan Mulcahy
Student Id Number: C00315272
Date : Mar- 2026
Purpose : Delete Car
 -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Car Management(Delete)</title>
    <!-- Link to external CSS file -->
    <link rel="stylesheet" type="text/css" href="../../GroupWork/global.css">
    <link rel="stylesheet" type="text/css" href="../../GroupWork/nav.css">
</head>

<body>

<?php include('../../GroupWork/header.php') ?>

    <div class="main">
        <div class="nav">
		<?php include('../../GroupWork/nav.php') ?>
        </div>

<form id="deleteForm" name="deleteForm" action="deleteCar.php" method="post">

<h2>Delete Car</h2>
<p class="help-text">Please select a Car and click <b>Delete</b> if you wish to delete the car from our database.</p>

    <!-- car Listbox called from carListbox -->
       <div class="form-group">
        <label for="carlistBox" id="carlistBox">Select Car</label>
        <?php include 'deleteListBox.php'; ?>
      </div>
    
  <div class="button-group">

    <input type="submit" value="Delete Car" class="primary">
  </div>
            <div class="form-group">
  
        <label for="deleteCarID"></label>
        <input
            type="hidden"
            name="deleteCarID"
            id="deleteCarID"
            value="<?php echo $carID; ?>"
        >
            </div>
            <div class="form-group">
                <label for="deleteCarReg">Car Registration</label>
                <input
                    type="text"
                    name="deleteCarReg"
                    id="deleteCarReg"
                    placeholder="10KK9040"
                    readonly
                />
            </div>

            <div class="form-group">
                <label for="listbox">Car Type</label>
                <select name="deleteCarType" id="deleteCarType" required disabled title="Please select a Car Type from the dropdown">
                <?php include '../Add/listbox.php'; ?>
                </select>
                </div> 

            <div class="form-group">
                <label for="deleteColour">Colour</label>
                <select name="deleteColour" id="deleteColour" required disabled>
                    <option value=""></option>
                    <option value="Red">Red</option>
                    <option value="Black">Black</option>
                    <option value="Silver">Silver</option>
                    <option value="White">White</option>
                    <option value="Green">Green</option>
                    <option value="Blue">Blue</option>
                </select>
                
            </div>

            <div class="form-group">
                <label for="deleteChassisNumber">Chassis Number</label>
                <input
                    type="text"
                    id="deleteChassisNumber"
                    name="deleteChassisNumber"
                    placeholder="A9F3K7M2Q8ZL4X6P1"
                    pattern="^[0-9A-Z]{17}$"
                    minlength="17"
                    maxlength="17"
                    oninput="this.value = this.value.toUpperCase()"
                    readonly
                />
            </div>

            <div class="form-group">
                <label for="deleteBodyStyle">Body Style</label>
                <select name="deleteBodyStyle" id="deleteBodyStyle" required disabled>
                    <option value=""></option>
                    <option value="Hatchback">Hatchback</option>
                    <option value="Saloon">Saloon</option>
                    <option value="Suv">SUV</option>
                    <option value="Coupe">Coupe</option>
                </select>
            </div>

            <div class="form-group">
                <label for="deleteNumOfDoors">Number of Doors</label>
                <select name="deleteNumOfDoors" id="deleteNumOfDoors" required disabled>
                    <option value=""></option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>


            <div class="form-group">
                <label for="deletePurchasePrice">Purchase Price</label>
                <input
                    type="text"
                    name="deletePurchasePrice"
                    id="deletePurchasePrice"
                    placeholder="30000"
                    pattern="^[0-9]{5}$"
                    minlength="5"
                    maxlength="5"
                    required
                    readonly
                />
            </div>

            <div class="form-group">
                <label for="deleteDateAdded">Date Added</label>
                <input
                    type="date"
                    name="deleteDateAdded"
                    id="deleteDateAdded"
                    required
                    readonly
                />
            </div>

            <div class="form-group">
                <label for="currentStatus">Car Status</label>
                <input
                    type="text"
                    name="currentStatus"
                    id="currentStatus"
                    value="<?php echo $currentStatus; ?>"
                    readonly
                />
            </div>

            
            <div ></div>

        </form>
<script src="deleteCar.js"></script>
</body>
</html>
