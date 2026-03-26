<!-- Name: Sarah Crotty -->
<!-- Student Number: C00309469 -->
<!-- Purpose: amend/view car type screen javascript -->
<!--Project: Car rental -->

// populate() - fires when user clicks the listbox
// splits the comma-separated option value and fills all the form fields
function populate()
{
    let sel = document.getElementById("listbox");
    let result = sel.options[sel.selectedIndex].value;

    if (result === "") return; // nothing selected yet

    let details = result.split(',');

    // fill all fields with selected car type details
    document.getElementById("amendID").value           = details[0];
    document.getElementById("amendManufacturer").value = details[1];
    document.getElementById("amendModel").value        = details[2];
    document.getElementById("amendVersion").value      = details[3];
    document.getElementById("amendEngine").value       = details[4];

    // fuel type dropdown - loop options to find and select the match
    let fuelSel = document.getElementById("amendFuel");
    for (let i = 0; i < fuelSel.options.length; i++)
    {
        if (fuelSel.options[i].value === details[5])
        {
            fuelSel.selectedIndex = i;
            break;
        }
    }

    // rental category dropdown - same approach
    let catSel = document.getElementById("amendCategory");
    for (let i = 0; i < catSel.options.length; i++)
    {
        if (catSel.options[i].value === details[6])
        {
            catSel.selectedIndex = i;
            break;
        }
    }

    // reset to view mode (locked) whenever a new selection is made
    lockFields();
    document.getElementById("amendBtn").textContent = "Amend Details";
}

// lockFields() - disables all editable fields (view mode)
// Car Type ID stays disabled always - never editable per spec
function lockFields()
{
    document.getElementById("amendManufacturer").disabled = true;
    document.getElementById("amendModel").disabled        = true;
    document.getElementById("amendVersion").disabled      = true;
    document.getElementById("amendEngine").disabled       = true;
    document.getElementById("amendFuel").disabled         = true;
    document.getElementById("amendCategory").disabled     = true;
}

// toggleLock() - called by Amend Details button
// switches between view mode (locked) and amend mode (unlocked)
function toggleLock()
{
    let btn = document.getElementById("amendBtn");

    if (btn.textContent === "Amend Details")
    {
        // switch to amend mode - enable editable fields
        document.getElementById("amendManufacturer").disabled = false;
        document.getElementById("amendModel").disabled        = false;
        document.getElementById("amendVersion").disabled      = false;
        document.getElementById("amendEngine").disabled       = false;
        document.getElementById("amendFuel").disabled         = false;
        document.getElementById("amendCategory").disabled     = false;
        btn.textContent = "View Details";
    }
    else
    {
        // switch back to view mode
        lockFields();
        btn.textContent = "Amend Details";
    }
}

// confirmCheck() - runs on form submit
// validates engine/fuel rules, asks for confirmation, then enables all fields for POST
function confirmCheck()
{
    // make sure a car type has been selected
    if (document.getElementById("amendID").value === "")
    {
        alert("Please select a car type first.");
        return false;
    }

    // engine/fuel validation - same rules as add screen
    let engineNum = parseFloat(document.getElementById("amendEngine").value);
    let fuel      = document.getElementById("amendFuel").value;

    // electric cars must have engine size of 0
    if (fuel === "electric" && engineNum !== 0)
    {
        alert("Electric cars can only have an engine size of 0.");
        return false;
    }

    // non-electric cars must have engine size greater than 0
    if (fuel !== "electric" && engineNum <= 0)
    {
        alert("Engine size must be greater than 0.");
        return false;
    }

    // ask user to confirm the changes
    if (!confirm("Please confirm that the details supplied are correct."))
    {
        return false;
    }

    // enable ALL fields so they are included in POST (disabled fields don't submit)
    // Car Type ID must be enabled too so PHP knows which record to UPDATE
    document.getElementById("amendID").disabled           = false;
    document.getElementById("amendManufacturer").disabled = false;
    document.getElementById("amendModel").disabled        = false;
    document.getElementById("amendVersion").disabled      = false;
    document.getElementById("amendEngine").disabled       = false;
    document.getElementById("amendFuel").disabled         = false;
    document.getElementById("amendCategory").disabled     = false;

    return true;
}

// resetForm() - clears all fields back to empty when Clear is clicked
function resetForm()
{
    document.getElementById("amendID").value              = "";
    document.getElementById("amendManufacturer").value    = "";
    document.getElementById("amendModel").value           = "";
    document.getElementById("amendVersion").value         = "";
    document.getElementById("amendEngine").value          = "";
    document.getElementById("amendFuel").selectedIndex    = 0;
    document.getElementById("amendCategory").selectedIndex = 0;
    document.getElementById("listbox").selectedIndex      = 0;
    lockFields();
    document.getElementById("amendBtn").textContent = "Amend Details";
}
