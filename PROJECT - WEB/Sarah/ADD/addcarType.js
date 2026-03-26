<!-- Name: Sarah Crotty -->
<!-- Student Number: C00309469 -->
<!-- Purpose: add car type screen javascript -->
<!--Project: Car rental -->
// function for validating the form //
function validateForm()
    {
        //variables//
        let manufacturer = document.getElementById("manufacturer").value;
        let model = document.getElementById("model").value;
        let version = document.getElementById("version").value;
        let engine = document.getElementById("engine").value;
        let fuel = document.getElementById("fuel").value;
        let category = document.getElementById("category").value;
        let engineNum = parseFloat(engine);

    
        // making sure all fields arent empty //
        if (manufacturer === "" || model === "" || version === "" || engine === "" || fuel === "" || category === "")
                {
                    alert("All fields must be filled.")
                    return false;
                }
        // making sure the engine size is valid //
        if (isNaN(engineNum) || engineNum < 0)
                {
                    alert("Engine size must be a valid number.")
                    return false;
                }
        //rule for engine size for the electric cars//
        if (fuel === "electric" && engineNum !== 0)
                {
                    alert("Electic cars can only have an engine size of 0.")
                    return false;
                }
        //rule for non electric cars, they must be greater than 0//
        if (fuel !== "electric" && engineNum <= 0)
                {
                    alert("Engine size must be greater than 0.")
                    return false;
                }
        //confirm before insert//
        if (!confirm("Please confirm that the details supplied are correct"))
{
    return false;
}
            {
                return true;
            }
    }