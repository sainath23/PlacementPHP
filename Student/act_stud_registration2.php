<?php
    $con = mysqli_connect("localhost", "root", "", "placement") 
    or die("Failed to connect MySQL: " . mysqli_error()); // Connecting to MySQL Database

    // Variable Declaration
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
	$JobSeekerID = mysqli_real_escape_string($con, $_SESSION["username"]);
	 
	 $sql = "INSERT INTO tbl_jobseekeracademicdetails(JobSeekerID, HighestDegree, Branch, PassingYear, Percentage, CGPA, DiplomaHSCPercentage, SSCPercentage, AreaOfSpecialization, TechnicalExperience, WorkField)
     VALUES ('$username', '$degree', '$lastname', '$dob', '$address', '$cityname', '$statename', '$postalcode', '$emailid', '$phone')";

    if(!mysqli_query($con, $sql))
    {
        die('Error: ' . mysqli_error($con));
    }
    else
    {
        header("Location: ../student_login.php?msg=1");
    }

    mysqli_close($con);
?>