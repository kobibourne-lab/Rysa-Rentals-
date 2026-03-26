<!--
    This is just a php file for connecting the database to reduce 
    repetition in screens 
    coding started - Feb 2026
-->

<?php
    $hostname="localhost"; //Where database is located
    $username="rentacar_db"; //Username for database
    $password="L1mit3dmile;"; //Databeses password

    $dbname="continental"; //The name of the database

    //Connecting to the database passing the above details for connection
    $con = mysqli_connect($hostname,$username,$password, $dbname);

    if(!$con)
        {
            die("Failed to connect to MySQL: " . mysqli_connect_error());
        }
?>