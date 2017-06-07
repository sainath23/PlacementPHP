<?php
    $con = mysqli_connect("localhost", "root", "", "placement") 
    or die("Failed to connect MySQL: " . mysqli_error()); // Connecting to MySQL Database

    // Variable Declaration
    $JobType = mysqli_real_escape_string($con, $_POST["txtJobType"]);
    $Description = mysqli_real_escape_string($con, $_POST["txtDescription"]);

    // Insert Query
    $sql = "INSERT INTO tbl_jobtype_master(JobType, Description)
     VALUES ('$JobType', '$Description')";

    if(!mysqli_query($con, $sql))
    {
        die('Error: ' . mysqli_error($con));
    }
    else
    {
        header("Location: frmAddFunctionalArea.php?msg=1");
    }

    mysqli_close($con);
?>