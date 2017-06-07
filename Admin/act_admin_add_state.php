<?php
	session_start();
    $con = mysqli_connect("localhost", "root", "", "placement") 
    or die("Failed to connect MySQL: " . mysqli_error()); // Connecting to MySQL Database
	
	// Variable Declaration
	$StateName = mysqli_real_escape_string($con, $_POST["txtStateName"]);
	$Description = mysqli_real_escape_string($con, $_POST["txtDescription"]);
	$CountryName = mysqli_real_escape_string($con, $_POST["selectCountryName"]);

	$sql = "SELECT CountryId FROM tbl_country_master WHERE CountryName='$CountryName'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($result);
	if ($row) {
		$CountryId = $row['CountryId'];
	}

	$sql = "INSERT INTO tbl_state_master(StateName, Description, CountryId)
        SELECT '$StateName', '$Description', CountryId
        FROM tbl_country_master WHERE CountryName='$CountryName'";
		
	if(!mysqli_query($con, $sql))
    {
        die('Error: ' . mysqli_error($con));
    }
    else
    {
        header("Location: frmAddState.php?msg=1");
    }

    mysqli_close($con);
?>