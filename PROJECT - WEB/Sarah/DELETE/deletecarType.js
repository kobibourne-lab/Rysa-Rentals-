<!-- Name: Sarah Crotty -->
<!-- Student Number: C00309469 -->
<!-- Purpose: delete car type screen javascript -->
<!--Project: Car rental -->

// populate() - fires when user clicks the listbox
// splits the comma-separated option value and fills the display fields
function populate()
{
    let sel = document.getElementById("listbox");
    let result = sel.options[sel.selectedIndex].value;

    if (result === "") return; // nothing selected yet

    let details = result.split(',');

    // fill the visible disabled fields so user can see the details
    document.getElementById("delID").value           = details[0];
    document.getElementById("delManufacturer").value = details[1];
    document.getElementById("delModel").value        = details[2];
    document.getElementById("delVersion").value      = details[3];
    document.getElementById("delEngine").value       = details[4];
    document.getElementById("delFuel").value         = details[5];
    document.getElementById("delCategory").value     = details[6];
}

// confirmCheck() - runs on form submit
// checks something is selected, asks for confirmation, then enables fields for POST
function confirmCheck()
{
    let sel = document.getElementById("listbox");

    // make sure user has actually selected something
  /*  if (sel.value === "")
    {
        alert("Please select a car type to delete.");
        return false;
    }
*/
    // ask user to confirm before deleting
    if (!confirm("Are you sure you want to delete this car type?"))
    {
        return false;
    }

    // enable all fields so they are included in the POST (disabled fields don't submit)
    document.getElementById("delID").disabled           = false;
    document.getElementById("delManufacturer").disabled = false;
    document.getElementById("delModel").disabled        = false;
    document.getElementById("delVersion").disabled      = false;
    document.getElementById("delEngine").disabled       = false;
    document.getElementById("delFuel").disabled         = false;
    document.getElementById("delCategory").disabled     = false;

    return true;
}
