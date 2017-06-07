<?php
    $con = mysqli_connect("localhost", "root", "", "placement") 
    or die("Failed to connect MySQL: " . mysqli_error()); // Connecting to MySQL Database

    // Variable Declaration
    $FunctionalArea = mysqli_real_escape_string($con, $_POST["txtFunctionalArea"]);
    $Description = mysqli_real_escape_string($con, $_POST["txtDescription"]);

    // Insert Query
    $sql = "INSERT INTO tbl_functional_area(FunctionalArea, Description)
     VALUES ('$FunctionalArea', '$Description')";

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