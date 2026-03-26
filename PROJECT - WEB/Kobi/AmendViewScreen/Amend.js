/*
Student name: Kobi Bourne 
Student Number: C00249676
Date: 12/02/2026
Task: JS for amend screen
*/
    function populate() /*function to populate listbox*/
        {
             var sel = document.getElementById("listbox"); /*  Get the listbox element */
            var result; //var to store result
            result = sel.options[sel.selectedIndex].value; // get value of selected option
            var rentalDetails = result.split(','); /* Split the selected value into an array */
            document.getElementById("amendRentalID").value = rentalDetails[0];
            document.getElementById("amendStndDayCost").value = rentalDetails[1]; /* get elements by id and get from index pos in array */
            document.getElementById("amendFiveDayDiscount").value = rentalDetails[2];
            document.getElementById("amendTenDayDiscount").value = rentalDetails[3];
        }
    function toggleLock() /* function for locking/unlocking amend */
        {
            /* if amend details option is selected */
            if(document.getElementById("amendViewbutton").value == "Amend Details")
                {
                    document.getElementById("amendStndDayCost").disabled = false; //diasbled = false , we can amend
                    document.getElementById("amendFiveDayDiscount").disabled = false;
                    document.getElementById("amendTenDayDiscount").disabled = false;
                    document.getElementById("amendViewbutton").value = "View Details"; //changing button text
                }
            else
                {
                    document.getElementById("amendStndDayCost").disabled = true;
                    document.getElementById("amendFiveDayDiscount").disabled = true;  //diasbled = true , we can't amend
                    document.getElementById("amendTenDayDiscount").disabled = true;
                    document.getElementById("amendViewbutton").value = "Amend Details"; //changing button text back 
                }
        }

	function ValidateForm()
		{
			//function vars , value from inputs 
			let StndDayCost = document.getElementById("amendStndDayCost");
			let FiveDayDiscount = document.getElementById("amendFiveDayDiscount");
			let TenDayDiscount = document.getElementById("amendTenDayDiscount");

			// StndDayCost must be positive num 
			if (StndDayCost.value <= 0 || StndDayCost.value > 1000) 
				{
					alert("Standard Cost per Day must be a number greater than 0 and less than 1001."); //alert box, prints string 
					StndDayCost.focus(); //puts cursor here 
					return false;  //stop submission 
					
				}

			// FiveDayDiscount between 0-50%
			if (FiveDayDiscount.value < 0 || FiveDayDiscount.value > 50) 
				{
					alert("Five-Day Discount must be between 0 and 50.");
					FiveDayDiscount.focus();
					return false;
				}

			//if TenDayDiscount is greater then 0 or less then 70 
			if (TenDayDiscount.value < 0 || TenDayDiscount.value > 70) 
				{
					alert("Ten-Day Discount must be between 0 and 70.");
					TenDayDiscount.focus();
					return false;
				}

			//If all checks pass, allow submission 
			return true;
		}

 
    function confirmCheck() // function to confirm entered details
        {
            var response;
            response = confirm('Are you sure you want to save these changes?'); // text that pops up on submit

            if(response)
                {
                    document.getElementById("amendRentalID").disabled = false;
                    document.getElementById("amendStndDayCost").disabled = false; //enables fields 
                    document.getElementById("amendFiveDayDiscount").disabled = false;
                    document.getElementById("amendTenDayDiscount").disabled = false;
                }
            else
                {
                    //if cancel, reset vals and lock 
                    populate(); //reset vals
                    toggleLock(); //lock fields 
                    return false;  // stop submission
                }
        }
    