<?php
    $con = mysqli_connect("localhost", "root", "", "placement") 
    or die("Failed to connect MySQL: " . mysqli_error()); // Connecting to MySQL Database

    // Variable Declaration
    $CountryName = mysqli_real_escape_string($con, $_POST["txtCountryName"]);
    $Description = mysqli_real_escape_string($con, $_POST["txtDescription"]);

    // Insert Query
    $sql = "INSERT INTO tbl_country_master(CountryName, Description)
     VALUES ('$CountryName', '$Description')";

    if(!mysqli_query($con, $sql))
    {
        die('Error: ' . mysqli_error($con));
    }
    else
    {
        header("Location: frmAddCountry.php?msg=1");
    }

    mysqli_close($con);
?>