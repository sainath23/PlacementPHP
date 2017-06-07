<?php
    $con = mysqli_connect("localhost", "root", "", "placement") 
    or die("Failed to connect MySQL: " . mysqli_error()); // Connecting to MySQL Database

    // Variable Declaration
    $Qualification = mysqli_real_escape_string($con, $_POST["txtQualification"]);
    $Description = mysqli_real_escape_string($con, $_POST["txtDescription"]);
	$QualificationLevel = mysqli_real_escape_string($con, $_POST["textQulificationLevel"]);

    // Insert Query
    $sql = "INSERT INTO tbl_qualification(Qualification, Description, QualificationLevel)
     VALUES ('$Qualification', '$Description', '$QualificationLevel')";

    if(!mysqli_query($con, $sql))
    {
        die('Error: ' . mysqli_error($con));
    }
    else
    {
        header("Location: frmAddQualification.php?msg=1");
    }

    mysqli_close($con);
?>