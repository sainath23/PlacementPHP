<?php
    $con = mysqli_connect("localhost", "root", "", "placement") 
    or die("Failed to connect MySQL: " . mysqli_error()); // Connecting to MySQL Database

    // Variable Declaration
    $SkillType = mysqli_real_escape_string($con, $_POST["txtSkillType"]);
    $Description = mysqli_real_escape_string($con, $_POST["txtDescription"]);

    // Insert Query
    $sql = "INSERT INTO tbl_skill_master(SkillType, Description)
     VALUES ('$SkillType', '$Description')";

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