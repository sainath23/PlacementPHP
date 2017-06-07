<?php
	session_start();
    $con = mysqli_connect("localhost", "root", "", "placement") 
    or die("Failed to connect MySQL: " . mysqli_error()); // Connecting to MySQL Database
	
	// Variable Declaration
	$CityName = mysqli_real_escape_string($con, $_POST["txtCityName"]);
	$Description = mysqli_real_escape_string($con, $_POST["txtDescription"]);
	$StateName = mysqli_real_escape_string($con, $_POST["selectState"]);

	$sql = "SELECT StateId FROM tbl_state_master WHERE SateName='$StateName'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($result);
	if ($row) {
		$StateId = $row['StateId'];
	}

	$sql = "INSERT INTO tbl_city_master(CityName, Description, StateId)
        SELECT '$StateName', '$Description', StateId
        FROM tbl_state_master WHERE StateName='$StateName'";
		
	if(!mysqli_query($con, $sql))
    {
        die('Error: ' . mysqli_error($con));
    }
    else
    {
        header("Location: frmAddCity.php?msg=1");
    }

    mysqli_close($con);
?>