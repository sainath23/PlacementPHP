<?php
    $con = mysqli_connect("localhost", "root", "", "placement") 
    or die("Failed to connect MySQL: " . mysqli_error()); // Connecting to MySQL Database

    // Variable Declaration
	$username = mysqli_real_escape_string($con, $_POST["txtuname"]);
	$password = mysqli_real_escape_string($con, $_POST["password1"]);
	$question = mysqli_real_escape_string($con, $_POST["selquest"]);
	$answer = mysqli_real_escape_string($con, $_POST["txtans"]);
	
	$orgname = mysqli_real_escape_string($con, $_POST["orgname"]);
	$sector = mysqli_real_escape_string($con, $_POST["sector"]);
	$cert1 = mysqli_real_escape_string($con, $_POST["cert1"]);
	$cert2 = mysqli_real_escape_string($con, $_POST["cert2"]);
	$cert3 = mysqli_real_escape_string($con, $_POST["cert3"]);
	$website = mysqli_real_escape_string($con, $_POST["website"]);
	$email1 = mysqli_real_escape_string($con, $_POST["email1"]);
    $email2 = mysqli_real_escape_string($con, $_POST["email2"]);
    $address = mysqli_real_escape_string($con, $_POST["address"]);
	$environment = mysqli_real_escape_string($con, $_POST["environment"]);
    $terms = mysqli_real_escape_string($con, $_POST["terms"]);
    $other = mysqli_real_escape_string($con, $_POST["other"]);
    $size = mysqli_real_escape_string($con, $_POST["size"]);
	
    // Insert Query
    $sql = "INSERT INTO tbl_recruiteraccountdetails(username, password, HintQuestion, Answer) VALUES ('$username', '$password', '$question', '$answer')";
	
	if(!mysqli_query($con, $sql))
    {
        die('Error: ' . mysqli_error($con));
    }
	
	$sql1 = "INSERT INTO tbl_recruiterorganisationdetails(username, OrganizationName, BusinessSector, Certificate1, Certificate2, Certificate3, Website, EmailID1, EmailID2, Address, OrganizationEnvironment, TermsAndCondition, Other, SizeOfOrganization)
     VALUES ('$username', '$orgname', '$sector', '$cert1', '$cert2', '$cert3', '$website', '$email1', '$email2', '$address', '$environment', '$terms', '$other', '$size')";

    if(!mysqli_query($con, $sql1))
    {
        die('Error: ' . mysqli_error($con));
    }
    else
    {
        header("Location: ../recruiter_login.php?msg=1");
    }
    mysqli_close($con);
?>