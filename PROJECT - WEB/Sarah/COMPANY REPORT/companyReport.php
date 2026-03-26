<!-- Name: Sarah Crotty -->
<!-- Student Number: C00309469 -->
<!-- Purpose: Company report - sortable by name, best customers, amount owed -->
<!-- Project: Car Rental -->
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="companyReport.css"> <!-- report specific css -->
</head>
<body>

<?php include('../../GroupWork/header.php'); ?> <!-- includes global.css + header bar -->

<div class="main">

    <div class="nav">
        <?php include('../../GroupWork/nav.php'); ?> <!-- includes nav.css + sidebar -->
    </div>

    <div class="report-container">

        <h2 class="report-title">Company Report</h2> <!-- page heading -->

        <?php
        include '../../GroupWork/db.inc.php'; // include database connection
        date_default_timezone_set('UTC'); // sets timezone
        ?>

        <!-- hidden form used by javascript to store and submit the selected sort choice -->
        <form action="companyReport.php" method="post" name="reportForm" class="report-form">
            <input type="hidden" name="choice"> <!-- hidden field stores which report button was chosen -->
        </form>

        <!-- report sort buttons -->
        <!-- clicking a button calls javascript which puts a value into hidden field and submits form -->
        <div class="report-buttons">
            <input type="button" id="companyButton"  value="Company Name"  onclick="companyOrder()"
                   title="Alphabetical order of company name">
            <input type="button" id="customerButton" value="Best Customers" onclick="customerOrder()"
                   title="Descending order of total rentals">
            <input type="button" id="owedButton"     value="Amount Owed"   onclick="owedOrder()"
                   title="Descending order of amount owed">
        </div>

        <script>
            // sets hidden choice to Company and submits form
            function companyOrder()  { document.reportForm.choice.value = "Company";  document.reportForm.submit(); }

            // sets hidden choice to Customer and submits form
            function customerOrder() { document.reportForm.choice.value = "Customer"; document.reportForm.submit(); }

            // sets hidden choice to Owed and submits form
            function owedOrder()     { document.reportForm.choice.value = "Owed";     document.reportForm.submit(); }
        </script>

        <?php
            // default sort choice on first load before any button is pressed
            $choice = "Company";

            // if form has been submitted and choice is not empty, use the posted value
            if (ISSET($_POST['choice']) && $_POST['choice'] != "") { $choice = $_POST['choice']; }

            // if Company button chosen, disable Company button and sort report alphabetically by company name
            if ($choice == "Company")
            {
                ?>
                <script>
                    document.getElementById("companyButton").disabled  = true;
                    document.getElementById("customerButton").disabled = false;
                    document.getElementById("owedButton").disabled     = false;
                </script>
                <?php
                $sql = "SELECT Name, Address, TotalRentals, isBlacklisted, CreditLimit, AmountOwed
                        FROM Company
                        WHERE deleteFlag = 0
                        ORDER BY Name";
                produceReport($con, $sql); // send query to function that builds and displays report table
            }

            // if Customer button chosen, disable Best Customers button and sort by TotalRentals descending
            if ($choice == "Customer")
            {
                ?>
                <script>
                    document.getElementById("companyButton").disabled  = false;
                    document.getElementById("customerButton").disabled = true;
                    document.getElementById("owedButton").disabled     = false;
                </script>
                <?php
                $sql = "SELECT Name, Address, TotalRentals, isBlacklisted, CreditLimit, AmountOwed
                        FROM Company
                        WHERE deleteFlag = 0
                        ORDER BY TotalRentals DESC";
                produceReport($con, $sql); // send query to function that builds and displays report table
            }

            // if Amount Owed button chosen, disable Amount Owed button and sort by AmountOwed descending
            if ($choice == "Owed")
            {
                ?>
                <script>
                    document.getElementById("companyButton").disabled  = false;
                    document.getElementById("customerButton").disabled = false;
                    document.getElementById("owedButton").disabled     = true;
                </script>
                <?php
                $sql = "SELECT Name, Address, TotalRentals, isBlacklisted, CreditLimit, AmountOwed
                        FROM Company
                        WHERE deleteFlag = 0
                        ORDER BY AmountOwed DESC";
                produceReport($con, $sql); // send query to function that builds and displays report table
            }

            // function to run query and display the report in table format
            function produceReport($con, $sql)
            {
                $result = mysqli_query($con, $sql); // runs SQL query

                // if query fails, stop page and show mysql error
                if (!$result)
                {
                    die("Query failed: " . mysqli_error($con));
                }

                // starts report table and prints headings
                echo "<table class='report-table'>
                        <thead>
                            <tr>
                                <th>Company Name</th>
                                <th>Address</th>
                                <th>Total Rentals</th>
                                <th>Blacklisted</th>
                                <th>Credit Limit</th>
                                <th>Amount Owed</th>
                            </tr>
                        </thead>
                        <tbody>";

                // loops through each company record returned by query
                while ($row = mysqli_fetch_array($result))
                {
                    // if company is blacklisted display Y in red, otherwise display N
                    if ($row['isBlacklisted'] == 1)
                    {
                        $blacklisted = "<span class='blacklisted-y'>Y</span>";
                    }
                    else
                    {
                        $blacklisted = "N";
                    }

                    // prints one table row for each company
                    echo "<tr>
                            <td>" . $row['Name']                                        . "</td>
                            <td>" . $row['Address']                                     . "</td>
                            <td>" . $row['TotalRentals']                                . "</td>
                            <td>" . $blacklisted                                        . "</td>
                            <td class='amount'>€" . number_format($row['CreditLimit'], 2) . "</td>
                            <td class='amount'>€" . number_format($row['AmountOwed'],  2) . "</td>
                          </tr>";
                }

                // closes table body and table
                echo "  </tbody>
                      </table>";
            }

            mysqli_close($con); // close database connection
        ?>

    </div><!-- end report-container -->
</div><!-- end main -->

</body>
</html>