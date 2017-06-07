<?php
    $con = mysqli_connect("localhost", "root", "", "placement") 
    or die("Failed to connect MySQL: " . mysqli_error()); // Connecting to MySQL Database

    // Variable Declaration
	$username = mysqli_real_escape_string($con, $_POST["txtuname"]);
	$password = mysqli_real_escape_string($con, $_POST["password1"]);
	$question = mysqli_real_escape_string($con, $_POST["selquest"]);
	$answer = mysqli_real_escape_string($con, $_POST["txtans"]);
	$firstname = mysqli_real_escape_string($con, $_POST["txtfname"]);
	$lastname = mysqli_real_escape_string($con, $_POST["txtlname"]);
	$dob = mysqli_real_escape_string($con, $_POST["txtdob"]);
	$address = mysqli_real_escape_string($con, $_POST["txtaddr"]);
	$statename = mysqli_real_escape_string($con, $_POST["txtstate"]);
	$cityname = mysqli_real_escape_string($con, $_POST["txtcity"]);
	$postalcode = mysqli_real_escape_string($con, $_POST["txtpost"]);
    $emailid = mysqli_real_escape_string($con, $_POST["txtemail"]);
    $phone = mysqli_real_escape_string($con, $_POST["txtphone"]);
	$degree = mysqli_real_escape_string($con, $_POST["degree"]);
    $branch = mysqli_real_escape_string($con, $_POST["branch"]);
    $passingyear = mysqli_real_escape_string($con, $_POST["year"]);
    $percentage1 = mysqli_real_escape_string($con, $_POST["percentage1"]);
    $cgpa = mysqli_real_escape_string($con, $_POST["cgpa"]);
    $percentage2 = mysqli_real_escape_string($con, $_POST["percentage2"]);
	$percentage3 = mysqli_real_escape_string($con, $_POST["percentage3"]);
	$specialization = mysqli_real_escape_string($con, $_POST["specialization"]);
	$experience = mysqli_real_escape_string($con, $_POST["experience"]);
	$workfield = mysqli_real_escape_string($con, $_POST["workfield"]);
	$enroll = mysqli_real_escape_string($con, $_POST['enroll']);
	

    // Insert Query
    $sql = "INSERT INTO tbl_jobseekerregistration(JobSeekerID, password, HintQuestion, Answer) VALUES ('$username', '$password', '$question', '$answer')";
	
	if(!mysqli_query($con, $sql))
    {
        die('Error: ' . mysqli_error($con));
    }
	
	$sql1 = "INSERT INTO tbljobseekercontactdetails(JobSeekerID, FirstName, LastName, DOB, Address, City, State, PinCode, EmailID, Phone1)
     VALUES ('$username', '$firstname', '$lastname', '$dob', '$address', '$cityname', '$statename', '$postalcode', '$emailid', '$phone')";

    if(!mysqli_query($con, $sql1))
    {
        die('Error: ' . mysqli_error($con));
    }
	
	$sql2 = "INSERT INTO tbl_jobseekeracademicdetails(JobSeekerID, EnrollmentNo, HighestDegree, Branch, PassingYear, Percentage, CGPA, DiplomaHSCPercentage, SSCPercentage, AreaOfSpecialization, TechnicalExperience, WorkField)
    VALUES ('$username', '$enroll', '$degree', '$branch', '$passingyear', '$percentage1', '$cgpa', '$percentage2', '$percentage3', '$specialization', '$experience', '$workfield')";
	if(!mysqli_query($con, $sql2))
    {
        die('Error: ' . mysqli_error($con));
    }
    else
    {
        header("Location: ../student_login.php?msg=1");
    }
    mysqli_close($con);
?>