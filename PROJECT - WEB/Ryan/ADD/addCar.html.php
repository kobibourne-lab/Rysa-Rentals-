<!-- 
Student Name : Ryan Mulcahy
Student Id Number: C00315272
Date : FEB - 2026
Purpose : ADD SCREEN
 -->
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Car Add Screen</title>
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
		
        
        <form id="addCar" action="addCar.php" method="post">
            <h2>ADD CAR</h2>
            <div class="form-group">
                <label for="carReg">Car Registration</label>
                <input
                    type="text"
                    name="carReg"
                    id="carReg"
                    placeholder="10KK9040"
                    pattern="^[0-9]{2,3}[A-Z]{2}[0-9]{4}$"
                    minlength="8"
                    maxlength="9"
					oninput="this.value = this.value.toUpperCase()"   
                    title="We only accept Irish Reg for example 202KK1930"
                    required
                />
            </div>

            <div class="form-group">
                <label for="listbox">Car Type</label>
                <select name="carType" id="carType" required title="Please select a Car Type from the dropdown">
				<option value="" selected disabled> Select Car Type </option>	
                <?php include 'listbox.php'; ?>
                </select>
                </div> 

            <div class="form-group">
                <label for="colour">Colour</label>
                <select name="colour" id="colour" required title="Please select colour from drop down">
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
                <label for="chassisNumber">Chassis Number</label>
                <input
                    type="text"
                    id="chassisNumber"
                    name="chassisNumber"
                    placeholder="A9F3K7M2Q8ZL4X6P1"
                    pattern="^[0-9A-Z]{17}$"
                    minlength="17"
                    maxlength="17"
                    oninput="this.value = this.value.toUpperCase()"
                    title="Chassis Number must be exactly 17 characters long with a similar sequence to the placeholder"
                    required
                />
            </div>

            <div class="form-group">
                <label for="bodyStyle">Body Style</label>
                <select name="bodyStyle" id="bodyStyle" required title="Please select body style from drop down">
                    <option value="" selected disabled>Select Body Style</option>
                    <option value="Hatchback">Hatchback</option>
                    <option value="Saloon">Saloon</option>
                    <option value="Suv">SUV</option>
                    <option value="Coupe">Coupe</option>
                </select>
            </div>

            <div class="form-group">
                <label for="noOfDoors">Number of Doors</label>
                <select name="noOfDoors" id="noOfDoors" required title="Please indicate if your car is 4 or 5 door">
                    <option value=""selected disabled>Number of doors</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>


            <div class="form-group">
                <label for="purchasePrice">Purchase Price</label>
                <input
                    type="text"
                    name="purchasePrice"
                    id="purchasePrice"
                    placeholder="30000"
                    pattern="^[0-9]{5}$"
                    minlength="5"
                    maxlength="5"
                    required
                    title="How much did the vehicle cost ? ie. 30000 or  50000"
                />
            </div>

            <div class="form-group">
                <label for="dateAddedToFleet">Date Added</label>
                <input
                    type="date"
                    name="dateAddedToFleet"
                    id="dateAddedToFleet"
                    required
                    title="Please add date of car when it was added to fleet"
                />
            </div>

            
            <div ></div>

            <div class="button-group">
                <button type="submit">Submit</button>
                <button type="reset">Clear</button>
            </div>
        </form>
        <script src="addCar.js"></script>
    </body>
</html>
