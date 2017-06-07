<?php
    $con = mysqli_connect("localhost", "root", "", "placement") 
    or die("Failed to connect MySQL: " . mysqli_error()); // Connecting to MySQL Database

    // Variable Declaration
    $Experience = mysqli_real_escape_string($con, $_POST["txtExperience"]);
	$Duration = mysqli_real_escape_string($con, $_POST["selectDuration"]);

    // Insert Query
    $sql = "INSERT INTO tbl_experience(ExpType, Duration)
     VALUES ('$Experience', '$Duration')";

    if(!mysqli_query($con, $sql))
    {
        die('Error: ' . mysqli_error($con));
    }
    else
    {
        header("Location: frmAddExperience.php?msg=1");
    }

    mysqli_close($con);
?>