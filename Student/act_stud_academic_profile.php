<?php
    session_start();
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

    $sql = "UPDATE tbl_jobseekeracademicdetails SET HighestDegree='$degree', Branch='$branch', PassingYear='$passingyear', Percentage='$percentage1', CGPA='$cgpa', DiplomaHSCPercentage='$percentage2', SSCPercentage='$percentage3', AreaOfSpecialization='$specialization', TechnicalExperience='$experience', WorkField='$workfield' WHERE JobSeekerId='$JobSeekerID'";
	$result = mysqli_query($con, $sql);
	
	if($result)
	{
		header("Location: frmStudentAcademicProfile.php?msg=1");
	}
	else
	{
		die('Error: ' . mysqli_error($con));
	}

    mysqli_close($con);
?>