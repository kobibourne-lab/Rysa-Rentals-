/*
Student Name : Ryan Mulcahy
Student Id Number: C00315272
Date : Mar - 2026
Purpose : Delete Screen - JS
*/

// Populate function - pulls the info from DB and populates it into our Form
function populate() {
    var sel = document.getElementById("deleteListBox");
    var result = sel.options[sel.selectedIndex].value;
    var carAmendDetails = result.split(",");

    document.getElementById("deleteCarID").value = carAmendDetails[0] || " ";
    document.getElementById("deleteCarReg").value = carAmendDetails[1] || " ";
    document.getElementById("deleteCarType").value = carAmendDetails[2] || " ";
    document.getElementById("deleteColour").value = carAmendDetails[3] || " ";
    document.getElementById("deleteChassisNumber").value =
        carAmendDetails[4] || " ";
    document.getElementById("deleteBodyStyle").value =
        carAmendDetails[5] || " ";
    document.getElementById("deleteNumOfDoors").value =
        carAmendDetails[6] || " ";
    document.getElementById("deletePurchasePrice").value =
        carAmendDetails[7] || " ";
    document.getElementById("deleteDateAdded").value =
        carAmendDetails[8] || " ";
    document.getElementById("currentStatus").value = carAmendDetails[9] || " ";
}

//
document.addEventListener("DOMContentLoaded", function () {
    populate();
    const form = document.querySelector("#deleteForm"); // <-- # for id
    const carStatus = document.querySelector("#currentStatus");

    // DeleteCheck Function checks to see the value of car status and if it's not available then we cant delete the car from our DB
    function deleteCheck(params) {
        if (carStatus.value.trim() !== "Available") {
            alert(
                "Can't delete a vehicle from our database that's not available for rental!!",
            );
            return false;
        }
        return true;
    }

    // validate on submit + confirm insert
    form.addEventListener("submit", function (event) {
        const carStatusOk = deleteCheck();

        if (!carStatusOk) {
            event.preventDefault();
            return;
        }

        // Window Pop up to confirm if we would like to add this record to our DB
        const ok = window.confirm(
            "Please confirm that you want to delete the car from the database?",
        );
        if (!ok) {
            event.preventDefault();
        } else {
            // Changes the following items to false so we can send the info to our database
            document.getElementById("deleteCarType").disabled = false;
            document.getElementById("deleteColour").disabled = false;
            document.getElementById("deleteBodyStyle").disabled = false;
            document.getElementById("deleteNumOfDoors").disabled = false;
        }
    });
});
