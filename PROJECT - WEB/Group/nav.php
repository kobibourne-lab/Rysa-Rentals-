<link rel="stylesheet" href="../../Group/nav.css">

<?php
echo "

        <ul>
            <button class='links'>
                <a href='/Group/home.html.php'>HOME</a>
            </button>

            <button class='links'>
                 <a href='/Jess/RentalScreen/RentalSelCompany.html.php'>Rentals</a>
            </button>

            <button class='dropdown'>
                Rental Category<i></i>
            </button>
                    <div class='dropdown-content'>
                        <a href='/Kobi/AddScreen/AddRentalCat1.html.php'>Add a New Rental Category</a>
                        <a href='/Kobi/DeleteScreen/delete.html.php'>Delete a Rental Category</a>
                        <a href='/Kobi/AmendViewScreen/AmendView.html.php'>Rental Category View/Amend </a>
                    </div>
            
            
            <button class='dropdown'>
                Accept Payments<i></i>
            </button>
                    <div class='dropdown-content'>
                        <a href='/Group/underConstruction.html.php'>Payments</a>
                    </div>
            
            
            <button class='dropdown'>
                BlackList Menu<i></i>
            </button>
                    <div class='dropdown-content'>
                        <a href='/Group/underConstruction.html.php'>Add a New Blacklist Record</a>
                        <a href='/Group/underConstruction.html.php'>Delete a Blacklist Record</a>
                        <a href='/Group/underConstruction.html.php'>Blacklist View/Amend Records</a>
                    </div>
            
            <button class='dropdown'>
                File Maintenance<i></i>
            </button>
                    <div class='dropdown-content'>
                        <a href='/Jess/AddCompany/CompanyAdd.html.php'>Add a New Company</a>
                        <a href='/Jess/DeleteCompany/CompanyDelete.html.php'>Delete a Company</a>
                        <a href='/Jess/AmendCompany/CompanyAmend.html.php'>Company View/Amend Records</a>
                        <a href='/Ryan/Add/addCar.html.php'>Add a New Car</a>
                        <a href='/Ryan/Delete/deleteCar.html.php'>Delete a Car</a>
                        <a href='/Ryan/Amend/carAmendView.html.php'>Car View/Amend Records</a>
                    </div>
					
			<button class='dropdown'>
                Set-Up<i></i>
            </button>
                    <div class='dropdown-content'>
                        <a href='/Sarah/AddCarType/addcarType.html.php'>Add a New Car Type</a>
                        <a href='/Sarah/DeleteCarType/deletecarType.html.php'>Delete a Car Type</a>
                        <a href='/Sarah/AmmendCarType/amendcarType.html.php'>Car Type View/Amend Records</a>
                       
                    </div>
            
            <button class='dropdown'>
                Reports<i></i>
            </button>
                    <div class='dropdown-content'>
                        <a href='/Sarah/CompanyReport/companyReport.php'>Company Reports</a>
                        <a href='/Kobi/CarReport/CarReport.html.php'>Car Reports</a>
                        <a href='/Group/underConstruction.html.php'>Rental Reports</a>
                        <a href='/Ryan/BlacklistReport/blacklistReport.php'>Blacklist Reports</a>
                    </div>

            <button class='links'>
                <a href='/Group/underConstruction.html.php'>Login</a>
            </button>
            
        </ul>
    <script>
// close all dropdowns when user clicks outside the nav
document.addEventListener('click', function(event) {
    var isInsideNav = event.target.closest('ul');
    if (!isInsideNav) {
        for (var j = 0; j < dropdown.length; j++) {
            dropdown[j].classList.remove('active');
            dropdown[j].nextElementSibling.style.display = 'none';
        }
    }
});
        /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
        var dropdown = document.getElementsByClassName('dropdown');
        var i;

for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener('click', function() {

        // close all other open dropdowns first
        for (var j = 0; j < dropdown.length; j++) {
            if (dropdown[j] !== this) {
                dropdown[j].classList.remove('active');
                dropdown[j].nextElementSibling.style.display = 'none';
            }
        }

        // toggle the clicked one
        this.classList.toggle('active');
        var dropdownContent = this.nextElementSibling; /*Gets the dropdown menu for that heading*/
        if (dropdownContent.style.display === 'block') {
            dropdownContent.style.display = 'none';
        } else {
            dropdownContent.style.display = 'block';
        }
    });
}
    </script>";
?>