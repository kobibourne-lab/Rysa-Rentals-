<!-- 
Student Name : Ryan Mulcahy
Student Id Number: C00315272
Date : Mar- 2026
Purpose : Blacklist Report
 -->

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blacklist Report</title>

    <?php 
    // Include database connection file
    include '../../GroupWork/db.inc.php'; 
    ?>

    <!-- Link to shared/global CSS used across the system -->
    <link rel="stylesheet" type="text/css" href="../../GroupWork/global.css">

    <!-- Link to page-specific styling -->
    <link rel="stylesheet" type="text/css" href="blacklistReport.css">
</head>

<body>

<?php 
// Include header (likely contains logo, title, etc.)
include('../../GroupWork/header.php'); 
?>

<div class="main">

    <div class="nav">
        <?php 
        // Include navigation menu
        include('../../GroupWork/nav.php'); 
        ?>
    </div>

    <div class="blacklist-report-page">

        <!-- 
        Form used to send sorting choice to the server.
        Uses POST method so the page can reload with new sorting.
        -->
        <form action="blacklistReport.php" method="post" name="reportForm" class="sort-form">
            <!-- Hidden input to store which sort option user selects -->
            <input type="hidden" name="choice">
        </form>
 
        <!-- Page heading -->
        <div class="report-header-box">
            <h1 class="report-title">Blacklist Report</h1>
        </div>

        <!-- Subtitle (currently unused but available for dynamic text if needed) -->
        <h3 class="report-subtitle"></h3>

        <!-- Buttons to control sorting -->
        <div class="report-buttons">

            <!-- Sort by Date (default, initially disabled) -->
            <input type="button" id="dateButton" value="Date"
            onclick="dateOrder()" 
            title="Click here to see blacklist in date order" disabled>

            <!-- Sort by Company Name -->
            <input type="button" id="companyButton" value="Company"
            onclick="companyOrder()" 
            title="Click here to see blacklist in alphabetical order">

            <!-- Sort by Amount Owed -->
            <input type="button" id="amountOwedButton" value="Amount Owed"
            onclick="amountOwedOrder()" 
            title="Click here to see blacklist in decreasing order">
        </div>

        <script>
        // When Date button is clicked
        function dateOrder()
        {
            // Set hidden form value
            document.reportForm.choice.value = "dateBlacklisted";
            // Submit form to reload page with new sorting
            document.reportForm.submit();
        }

        // When Company button is clicked
        function companyOrder()
        {
            document.reportForm.choice.value = "Name";
            document.reportForm.submit();
        }

        // When Amount Owed button is clicked
        function amountOwedOrder()
        {
            document.reportForm.choice.value = "AmountOwed";
            document.reportForm.submit();
        }
        </script>

        <?php

        // Default sorting choice (when page first loads)
        $choice = "dateBlacklisted";

        // If user submitted a sorting choice, override default
        if (isset($_POST['choice'])) {
            $choice = $_POST['choice'];
        }

       
        // SORT BY DATE (Default)
       
        if ($choice == "dateBlacklisted") {

            // Enable/disable buttons visually
            echo "
            <script>
                document.getElementById('dateButton').disabled = true;
                document.getElementById('companyButton').disabled = false;
                document.getElementById('amountOwedButton').disabled = false;
            </script>";

            // SQL query sorted by most recent blacklist date
            $sql = "SELECT 
                        b.dateBlacklisted,
                        c.Name,
                        b.AmountOwed AS AmountOwedAtBlacklistDate,
                        c.AmountOwed AS AmountOwedAtPresent,
                        c.timesBlacklisted
                    FROM Blacklist b
                    INNER JOIN Company c
                        ON b.CompanyID = c.CompanyID
                    WHERE c.deleteFlag = 0
                    ORDER BY b.dateBlacklisted DESC";
        }

        
        // SORT BY AMOUNT OWED
       
        elseif ($choice == "AmountOwed") {

            echo "
            <script>
                document.getElementById('dateButton').disabled = false;
                document.getElementById('companyButton').disabled = false;
                document.getElementById('amountOwedButton').disabled = true;
            </script>";

            // SQL query sorted by highest current amount owed
            $sql = "SELECT 
                        b.dateBlacklisted,
                        c.Name,
                        b.AmountOwed AS AmountOwedAtBlacklistDate,
                        c.AmountOwed AS AmountOwedAtPresent,
                        c.timesBlacklisted
                    FROM Blacklist b
                    INNER JOIN Company c
                        ON b.CompanyID = c.CompanyID
                    WHERE c.deleteFlag = 0
                    ORDER BY c.AmountOwed DESC";
        }

       
        // SORT BY COMPANY NAME
       
        else {

            echo "
            <script>
                document.getElementById('dateButton').disabled = false;
                document.getElementById('companyButton').disabled = true;
                document.getElementById('amountOwedButton').disabled = false;
            </script>";

            // SQL query sorted alphabetically by company name
            $sql = "SELECT 
                        b.dateBlacklisted,
                        c.Name,
                        b.AmountOwed AS AmountOwedAtBlacklistDate,
                        c.AmountOwed AS AmountOwedAtPresent,
                        c.timesBlacklisted
                    FROM Blacklist b
                    INNER JOIN Company c
                        ON b.CompanyID = c.CompanyID
                    WHERE c.deleteFlag = 0
                    ORDER BY c.Name ASC";
        }

        // Call function to generate and display report table
        produceReport($con, $sql);

        function produceReport($con, $sql)
        {
            // Execute query
            $result = mysqli_query($con, $sql);

            // If query fails, stop execution and show error
            if (!$result) {
                die("Query failed: " . mysqli_error($con));
            }

            // Start HTML table
            echo "<table>
                    <tr>
                        <th>Date Blacklisted</th>
                        <th>Company Name</th>
                        <th>Amount Owed at Blacklist Date</th>
                        <th>Amount Owed at Present</th>
                        <th>Number of Previous Blacklistings</th>
                    </tr>";

            // Loop through each row returned from database
            while ($row = mysqli_fetch_assoc($result)) {

                // Convert date into readable format (DD/MM/YYYY)
                $date = date_create($row['dateBlacklisted']);
                $formattedDate = $date ? date_format($date, 'd/m/Y') : $row['dateBlacklisted'];

                // Output table row
                echo "<tr>
                        <td>{$formattedDate}</td>
                        <td>{$row['Name']}</td>
                        <td>{$row['AmountOwedAtBlacklistDate']}</td>
                        <td>{$row['AmountOwedAtPresent']}</td>
                        <td>{$row['timesBlacklisted']}</td>
                      </tr>";
            }

            // Close table
            echo "</table>";
        }

        // Close database connection
        mysqli_close($con);
        ?>

    </div>
</div>

</body>
</html>