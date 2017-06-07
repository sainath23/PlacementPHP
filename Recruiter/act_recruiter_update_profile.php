<?php
    session_start();
	$con = mysqli_connect("localhost", "root", "", "placement") 
    or die("Failed to connect MySQL: " . mysqli_error()); // Connecting to MySQL Database

    // Variable Declaration
    $orgname = mysqli_real_escape_string($con, $_POST["orgname"]);
    $sector = mysqli_real_escape_string($con, $_POST["sector"]);
    $cert1 = mysqli_real_escape_string($con, $_POST["cert1"]);
    $cert2 = mysqli_real_escape_string($con, $_POST["cert2"]);
    $cert3 = mysqli_real_escape_string($con, $_POST["cert3"]);
    $website = mysqli_real_escape_string($con, $_POST["website"]);
	$email1 = mysqli_real_escape_string($con, $_POST["email1"]);
	$email2 = mysqli_real_escape_string($con, $_POST["email2"]);
	$address = mysqli_real_escape_string($con, $_POST["address"]);
	$environment = mysqli_real_escape_string($con, $_POST['environment']);
	$terms = mysqli_real_escape_string($con, $_POST['terms']);
	$others = mysqli_real_escape_string($con, $_POST['others']);
	$size = mysqli_real_escape_string($con, $_POST['size']);
	$username = mysqli_real_escape_string($con, $_POST["fid"]);


    $sql = "UPDATE tbl_recruiterorganisationdetails SET OrganizationName='$orgname', BusinessSector='$sector', Certificate1='$cert1', Certificate2='$cert2', Certificate3='$cert3', Website='$website', EmailID1='$email1', EmailID2='$email2', Address='$address', OrganizationEnvironment='$environment', TermsAndCondition='$terms', Other='$others', SizeOfOrganization='$size' WHERE username='$username'";
	$result = mysqli_query($con, $sql);
	
	if($result)
	{
		header("Location: frmRecruiterUpdateProfile.php?msg=1");
	}
	else
	{
		die('Error: ' . mysqli_error($con));
	}

    mysqli_close($con);
?>