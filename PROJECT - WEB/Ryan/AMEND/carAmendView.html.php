
<!-- 
Student Name : Ryan Mulcahy
Student Id Number: C00315272
Date : FEB- 2026
Purpose : Amend/View Car
 -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Car Management(Amend/View)</title>
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

<form id="amendForm" name="amendForm" action="carAmendView.php" method="post">

<h2>Amend/View Car Details</h2>
<p class="help-text">Please select a Car and click <b>Amend Details</b> if you wish to update.</p>

    <!-- car Listbox called from carListbox -->
       <div class="form-group">
        <label for="listbox">Select Car</label>
        <?php include 'carListBox.php'; ?>
      </div>
    
  <div class="button-group">
    <input
      type="button"
      value="Amend Details"
      id="amendViewbutton"
      class="secondary"
      onclick="toggleLock()"
    >
    <input type="submit" value="Save Changes" class="primary">
  </div>
            <div class="form-group">
  
        <label for="carAmendId"></label>
        <input
            type="hidden"
            name="carAmendId"
            id="carAmendId"
            value="<?php echo $carID; ?>"
        >
            </div>
            <div class="form-group">
                <label for="carReg">Car Registration</label>
                <input
                    type="text"
                    name="carReg"
                    id="carReg"
                    placeholder="10KK9040"
                    disabled
                />
            </div>

            <div class="form-group">
                <label for="listbox">Car Type</label>
                <select name="amendCarType" id="amendCarType" required disabled title="Please select a Car Type from the dropdown">
				<option value="" selected disabled>Select Car Type </option>
                <?php include '../Add/listbox.php'; ?>
                </select>
                </div> 

            <div class="form-group">
                <label for="AmendColour">Colour</label>
                <select name="AmendColour" id="AmendColour" required disabled title="Please select AmendColour from drop down">
                    <option value="" selected disabled>Select Colour </option>
                    <option value="Red">Red</option>
                    <option value="Black">Black</option>
                    <option value="Silver">Silver</option>
                    <option value="White">White</option>
                    <option value="Green">Green</option>
                    <option value="Blue">Blue</option>
                </select>
                
            </div>

            <div class="form-group">
                <label for="amendChassisNumber">Chassis Number</label>
                <input
                    type="text"
                    id="amendChassisNumber"
                    name="amendChassisNumber"
                    placeholder="A9F3K7M2Q8ZL4X6P1"
                    pattern="^[0-9A-Z]{17}$"
                    minlength="17"
                    maxlength="17"
                    oninput="this.value = this.value.toUpperCase()"
                    title="Chassis Number must be exactly 17 characters long with a similar sequence to the placeholder"
                    required
                    disabled
                />
            </div>

            <div class="form-group">
                <label for="amendBodyStyle">Body Style</label>
                <select name="amendBodyStyle" id="amendBodyStyle" required disabled title="Please select body style from drop down">
                    <option value=""selected disabled>Choose Body Style</option>
                    <option value="Hatchback">Hatchback</option>
                    <option value="Saloon">Saloon</option>
                    <option value="Suv">SUV</option>
                    <option value="Coupe">Coupe</option>
                </select>
            </div>

            <div class="form-group">
                <label for="amendNoOfDoors">Number of Doors</label>
                <select name="amendNoOfDoors" id="amendNoOfDoors" required disabled title="Please indicate if your car is 4 or 5 door">
                    <option value=""selected disabled> Doors </option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>


            <div class="form-group">
                <label for="amendPurchasePrice">Purchase Price</label>
                <input
                    type="text"
                    name="amendPurchasePrice"
                    id="amendPurchasePrice"
                    placeholder="30000"
                    pattern="^[0-9]{5}$"
                    minlength="5"
                    maxlength="5"
                    required
                    disabled
                    title="How much did the vehicle cost ? ie. 30000 or  50000"
                />
            </div>

            <div class="form-group">
                <label for="amendDateAddedtoFleet">Date Added</label>
                <input
                    type="date"
                    name="amendDateAddedtoFleet"
                    id="amendDateAddedtoFleet"
                    required
                    disabled
                    title="Please add date of car when it was added to fleet"
                />
            </div>

            <div class="form-group">
                <label for="currentStatus">Car Status</label>
                <input
                    type="text"
                    name="currentStatus"
                    id="currentStatus"
                    value="<?php echo $currentStatus; ?>"
                    disabled
                />
            </div>

            
            <div ></div>

        </form>
<script src="amendCar.js"></script>
</body>
</html>
