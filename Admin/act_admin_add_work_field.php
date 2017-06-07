<?php
	session_start();
    $con = mysqli_connect("localhost", "root", "", "placement") 
    or die("Failed to connect MySQL: " . mysqli_error()); // Connecting to MySQL Database
	
	// Variable Declaration
	$work = mysqli_real_escape_string($con, $_POST["work"]);

	$sql = "INSERT INTO tbl_workfield(WorkField) VALUES('$work')";
		
	if(!mysqli_query($con, $sql))
    {
        die('Error: ' . mysqli_error($con));
    }
    else
    {
        header("Location: frmAddWorkFields.php?msg=1");
    }

    mysqli_close($con);
?>