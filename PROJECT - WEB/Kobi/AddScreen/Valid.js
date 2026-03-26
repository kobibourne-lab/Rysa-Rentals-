/*
Student name: Kobi Bourne 
Student Number: C00249676
Date: 12/02/2026
Task: JS for add screen
*/
function ConfirmForm ()
{
  //confirm box before form submits
  confirms = confirm("Confirm record insertion?"); // print, confirm record made 
    if(confirms === false) //if cancel clicked 
    {
        return false; //dont submit form
    }

    return true; //submits form 
}

function ValidateForm()
{
	//function vars , value from inputs 
    let RentalCategory = document.getElementById("RentalCategory");
    let StndDayCost = document.getElementById("StndDayCost");
    let FiveDayDiscount = document.getElementById("FiveDayDiscount");
    let TenDayDiscount = document.getElementById("TenDayDiscount");

    //pattern check for RentalCategory
    if (!RentalCategory.value.match(/^[A-Z]$/)) //single uppercase letter 
		{
			alert("Rental Category must be a single uppercase letter (A-Z)."); //alert box, prints string 
			RentalCategory.focus(); //puts cursor here 
			return false;  //stop submission 
		}

    // StndDayCost must be positive num 
    if (StndDayCost.value <= 0 || StndDayCost.value > 1000) 
		{
			alert("Standard Cost per Day must be a number greater than 0 and less than 1001.");
			StndDayCost.focus(); //puts cursor here 
			return false;
		}

    // FiveDayDiscount between 0-50
    if (FiveDayDiscount.value < 0 || FiveDayDiscount.value > 50) 
		{
			alert("Five-Day Discount must be between 0 and 50.");
			FiveDayDiscount.focus(); //puts cursor here 
			return false;
		}

    //if TenDayDiscount is greater then 0 or less then 70 
    if (TenDayDiscount.value < 0 || TenDayDiscount.value > 70) 
		{
			alert("Ten-Day Discount must be between 0 and 70.");
			TenDayDiscount.focus(); //puts cursor here 
			return false;
		}

    //If all checks pass, return true to submit form
    return true;
}
