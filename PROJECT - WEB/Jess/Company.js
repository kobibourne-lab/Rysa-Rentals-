  // Function to check users response
    function confirmCheck() {

        // Variable to store the user's response from the confirm dialog
        var response;

        // Show confirmation dialog asking the user to save changes
        response = confirm('Are you sure you want to make these changes?');

        // If the user clicks "OK"
        if (response) {

            // Allow the action (e.g., form submission) to proceed
            return true;
        }
        else {

            // Prevent the action (e.g., form submission)
            return false;
        }
    }

      // Function to check users response
    function confirmDelete() {

        // Variable to store the user's response from the confirm dialog
        var response;

        // Show confirmation dialog asking the user to save changes
        response = confirm('Are you sure you want to delte this record?');

        // If the user clicks "OK"
        if (response) {

            // Allow the action (e.g., form submission) to proceed
            // Enable the form fields so their values can be submitted
            document.getElementById("delid").disabled = false;
            document.getElementById("delName").disabled = false;
            document.getElementById("delEmail").disabled = false;
            document.getElementById("delPhone").disabled = false;
            document.getElementById("owed").disabled = false;
            document.getElementById("blacklisted").disabled = false;
            
            return true;
        }
        else {

            // Prevent the action (e.g., form submission)
            popDelete();
            return false;
        }
    }

     // Function to check users response
    function confirmSel() {

        // Variable to store the user's response from the confirm dialog
        var response;

        // Show confirmation dialog asking the user to save changes
        response = confirm('Are you sure you want continue with this company?');

        // If the user clicks "OK"
        if (response) {
            
            document.getElementById("comID").disabled = false;
            return true;
        }
        else {

            // Prevent the action (e.g., form submission)
            popSel();
            return false;
        }
    }


    // JavaScript function called when an item in the listbox is clicked
    function populate()
    {

        // Get a reference to the select element
        var sel = document.getElementById("listbox");
       


        // Variable to hold the selected option's value (a comma-separated string)
        var result;

        // Get the value of the currently selected option
        result = sel.options[sel.selectedIndex].value;

        // Split the value string into an array: [id, name, address, phone , etc]
        var companyDetails = result.split(',');

        // Fill hidden or visible form fields with each part of the array
        document.getElementById("amendid").value         = companyDetails[0]; // Company ID
        document.getElementById("amendName").value  = companyDetails[1]; // Company Name
        document.getElementById("amendAddress").value   = companyDetails[2]; // Company Address     
        document.getElementById("amendPhone").value   = companyDetails[3]; // Company Phone No.
        document.getElementById("amendWeb").value   = companyDetails[4]; // Company Web address
        document.getElementById("amendEmail").value        = companyDetails[5]; // Company Email
        document.getElementById("credit").value      = companyDetails[6]; // Company credit limit
        document.getElementById("blacklist").value      = companyDetails[7]; // Company blacklist
        document.getElementById("owed").value      = companyDetails[8]; // Company amount owed
        document.getElementById("tBlacklist").value      = companyDetails[9]; // Company blacklist count
    
    }

    // JavaScript function called when an item in the listbox is clicked
    function popDelete()
    {
        
        // Get a reference to the select element
        var sel = document.getElementById("listbox");
        // Variable to hold the selected option's value (a comma-separated string)
        var result;

        // Get the value of the currently selected option
        result = sel.options[sel.selectedIndex].value;

        // Split the value string into an array: [id, name, address, phone , etc]
        var companyDetails = result.split(',');

        // Fill hidden or visible form fields with each part of the array
        document.getElementById("delid").value         = companyDetails[0]; // Company ID
        document.getElementById("delName").value  = companyDetails[1]; // Company Name
        document.getElementById("delAddress").value   = companyDetails[2]; // Company Address     
        document.getElementById("delPhone").value   = companyDetails[3]; // Company Phone No.
        document.getElementById("delEmail").value        = companyDetails[4]; // Company Email
        document.getElementById("blacklisted").value      = companyDetails[5]; // Company blacklist
        document.getElementById("owed").value      = companyDetails[6]; // Company amount owed
        document.getElementById("tBlacklisted").value      = companyDetails[7]; // Company blacklist count
    }

    function carpop()
    {
        
        // Get a reference to the select element
        var sel = document.getElementById('listbox');
        // Variable to hold the selected option's value (a comma-separated string)
        var result;

        // Get the value of the currently selected option
        result = sel.options[sel.selectedIndex].value;

        // Split the value string into an array: [id,]
        var carDetails = result.split(',');

        // Fill hidden or visible form fields with each part of the array
    
        document.getElementById('selected').value  = carDetails[0]; // car id 
    }

    function carsend()
    {
        document.getElementById("selected").disabled = false;
		var car = document.getElementById('listbox');
				//This if checks that the value is not null
                if(car.selectedIndex == 0 ) { 
                    alert('select a Car!');
                    return false;
                }
    }

    // JavaScript function called when an item in the listbox is clicked
    function popSel()
    {
        
        // Get a reference to the select element
        var sel = document.getElementById("listbox");
        // Variable to hold the selected option's value (a comma-separated string)
        var result;

        // Get the value of the currently selected option
        result = sel.options[sel.selectedIndex].value;

        // Split the value string into an array: [id, name, address, phone , etc]
        var companyDetails = result.split(',');

        // Fill hidden or visible form fields with each part of the array
    
        document.getElementById("comName").value  = companyDetails[0]; // Company Name
        document.getElementById("comAddress").value   = companyDetails[1]; // Company Address  
        document.getElementById("credit").value      = companyDetails[2]; // Company credit limit   
        document.getElementById("owed").value      = companyDetails[3]; // Company amount owed
        
        document.getElementById("comID").value = companyDetails[4];
        
    }
   
    // Function to lock/unlock the amend fields and toggle button text
    function toggleLock() 
    {
        // If the button currently says "Amend Details", unlock fields for editing
        if (document.getElementById("amendViewbutton").value == "Amend Details")
        {
            // Enable first name, last name and DOB input fields
            document.getElementById("amendName").disabled = false;
            document.getElementById("amendAddress").disabled  = false;
            document.getElementById("amendPhone").disabled       = false;
            document.getElementById("amendWeb").disabled     = false;
            document.getElementById("amendEmail").disabled       = false;
            document.getElementById("credit").disabled     = false; 

            // Change button text so user can switch back to view-only mode
            document.getElementById("amendViewbutton").value   = "View Details";
        }
        // Otherwise, lock fields again and set button text back
        else
        {
            // Disable name, address and phone input fields (view-only)
            document.getElementById("amendName").disabled = true;
            document.getElementById("amendAddress").disabled  = true;
            document.getElementById("amendPhone").disabled     = true;
            document.getElementById("amendWeb").disabled       = true;
            document.getElementById("amendEmail").disabled       = true;
            document.getElementById("credit").disabled     = true; 

            // Change button text so user can enable editing again
            document.getElementById("amendViewbutton").value   = "Amend Details";
        }
    }

    // Function to check users response
    function confirmCheck2() {

        // Variable to store the user's response from the confirm dialog
        var response;

        // Show confirmation dialog asking the user to save changes
        response = confirm('Are you sure you want to save these changes?');

        // If the user clicks "OK"
        if (response) {

            // Enable the input fields so they can be submitted/saved
            document.getElementById("amendid").disabled          = false;
            document.getElementById("amendName").disabled   = false;
            document.getElementById("amendAddress").disabled    = false;
            document.getElementById("amendPhone").disabled    = false;
            document.getElementById("amendWeb").disabled       = false;
            document.getElementById("amendEmail").disabled         = false;
            document.getElementById("credit").disabled        = false; 

            // Allow the action (e.g., form submission) to proceed
            return true;
        }
        else {
            // If the user clicks "Cancel"

            // Restore original values
            populate();

            // Re-lock the fields
            toggleLock();

            // Prevent the action (e.g., form submission)
            return false;
        }
    }
