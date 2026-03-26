/*
Student Name : Ryan Mulcahy
Student Id Number: C00315272
Date : FEB - 2026
Purpose : ADD SCREEN
*/

"use strict";

// Make sure the DOM is ready before we try to access the form/inputs
document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("#addCar"); // <-- # for id
    const dateInput = document.getElementById("dateAddedToFleet");

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
            "We are adding a new vehicle into our database.\n\nTo continue with this addition please select ok to add",
        );
        if (!ok) {
            event.preventDefault();
        }
    });
});
