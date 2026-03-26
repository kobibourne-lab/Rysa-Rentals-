/*
Student Name : Ryan Mulcahy
Student Id Number: C00315272
Date : FEB- 2026
Purpose : Amend/View Car
*/

// Populate function - pulls the info from DB and populates it into our Form
function populate() {
    var sel = document.getElementById("listbox");
    var result = sel.options[sel.selectedIndex].value;
    var carAmendDetails = result.split(",");

    document.getElementById("carAmendId").value = carAmendDetails[0] || " ";
    document.getElementById("carReg").value = carAmendDetails[1] || " ";
    document.getElementById("amendCarType").value = carAmendDetails[2] || " ";
    document.getElementById("AmendColour").value = carAmendDetails[3] || " ";
    document.getElementById("amendChassisNumber").value =
        carAmendDetails[4] || " ";
    document.getElementById("amendBodyStyle").value = carAmendDetails[5] || " ";
    document.getElementById("amendNoOfDoors").value = carAmendDetails[6] || " ";
    document.getElementById("amendPurchasePrice").value =
        carAmendDetails[7] || " ";
    document.getElementById("amendDateAddedtoFleet").value =
        carAmendDetails[8] || " ";
    document.getElementById("currentStatus").value = carAmendDetails[9] || " ";
}

// ToggleLock Function - Lock and unlocks the form fields once amend details has been hit
function toggleLock() {
    var btn = document.getElementById("amendViewbutton");
    var editing = btn.value === "Amend Details";

    document.getElementById("amendCarType").disabled = editing ? false : true;
    document.getElementById("AmendColour").disabled = editing ? false : true;
    document.getElementById("amendChassisNumber").disabled = editing
        ? false
        : true;
    document.getElementById("amendBodyStyle").disabled = editing ? false : true;
    document.getElementById("amendNoOfDoors").disabled = editing ? false : true;
    document.getElementById("amendPurchasePrice").disabled = editing
        ? false
        : true;
    document.getElementById("amendDateAddedtoFleet").disabled = editing
        ? false
        : true;

    btn.value = editing ? "View Details" : "Amend Details";
}

document.addEventListener("DOMContentLoaded", function () {
    populate();
    const form = document.querySelector("#amendForm"); // <-- # for id
    const dateInput = document.getElementById("amendDateAddedtoFleet");

    // --- Date Validation for when we can add a vehicle into our DB
    function dateValidate() {
        dateInput.setCustomValidity("");

        if (!dateInput.value) return true;

        // Checking user date inputted via the form
        const inputDate = new Date(dateInput.value);

        // Today establish today date and then we use this to establish our new variable in the past and future.
        // Initialise a new date object in today
        const today = new Date();
        // Set time to 0
        today.setHours(0, 0, 0, 0);
        // we are copying from our today object
        const pastThreeMonths = new Date(today);
        // now we can setMonth function and use get date and subtract 3 months from it.
        pastThreeMonths.setMonth(today.getMonth() - 3);
        // we are copying from our today object
        const futureTwoMonths = new Date(today);
        // now we can setMonth function and use get date and add two months.
        futureTwoMonths.setMonth(today.getMonth() + 2);

        // Logic and error prompts
        if (inputDate > futureTwoMonths) {
            dateInput.setCustomValidity(
                "Can't future date a vehicle no further than two months in advance ",
            );
            return false;
        }

        if (inputDate < pastThreeMonths) {
            dateInput.setCustomValidity(
                "Can't backdate a vehicle into our database no further than three months in the past",
            );
            return false;
        }
        return true;
    }

    // validate as they type/change
    dateInput.addEventListener("input", dateValidate);

    // validate on submit + confirm insert
    form.addEventListener("submit", function (event) {
        const dateOk = dateValidate();
        const htmlOk = form.checkValidity(); // required/pattern checks

        if (!dateOk || !htmlOk) {
            event.preventDefault();
            form.reportValidity();
            return;
        }

        // Window Pop up to confirm if we would like to add this record to our DB
        const ok = window.confirm(
            "Please confirm that the details are correct",
        );
        if (!ok) {
            event.preventDefault();
        } else {
			document.getElementById("carReg").disabled = false;
		}
    });
});
