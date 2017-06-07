<?php
    session_start();
	$con = mysqli_connect("localhost", "root", "", "placement") 
    or die("Failed to connect MySQL: " . mysqli_error()); // Connecting to MySQL Database

    // Variable Declaration
    $fname = mysqli_real_escape_string($con, $_POST["fname"]);
    $lname = mysqli_real_escape_string($con, $_POST["lname"]);
    $dob = mysqli_real_escape_string($con, $_POST["dob"]);
    $address = mysqli_real_escape_string($con, $_POST["address"]);
    $city = mysqli_real_escape_string($con, $_POST["city"]);
    $state = mysqli_real_escape_string($con, $_POST["state"]);
	$pincode = mysqli_real_escape_string($con, $_POST["pincode"]);
	$emailid = mysqli_real_escape_string($con, $_POST["emailid"]);
	$phone = mysqli_real_escape_string($con, $_POST["phone"]);
	$JobSeekerID = mysqli_real_escape_string($con, $_POST["fid"]);


    $sql = "UPDATE tbljobseekercontactdetails SET FirstName='$fname', LastName='$lname', DOB='$dob', Address='$address', City='$city', State='$state', PinCode='$pincode', EmailID='$emailid', Phone1='$phone' WHERE FirstName='$fname'";
	$result = mysqli_query($con, $sql);
	
	if($result)
	{
		header("Location: frmStudentUpdateProfile.php?msg=1");
	}
	else
	{
		die('Error: ' . mysqli_error($con));
	}

    mysqli_close($con);
?>