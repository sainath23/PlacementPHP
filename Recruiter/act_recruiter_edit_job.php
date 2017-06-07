<?php
    $con = mysqli_connect("localhost", "root", "", "placement") 
    or die("Failed to connect MySQL: " . mysqli_error()); // Connecting to MySQL Database

    // Variable Declaration
    $jcat = mysqli_real_escape_string($con, $_POST["jcat"]);
	$skills = mysqli_real_escape_string($con, $_POST["skills"]);
	$role = mysqli_real_escape_string($con, $_POST["role"]);
	$qualification = mysqli_real_escape_string($con, $_POST["qualification"]);
	$age = mysqli_real_escape_string($con, $_POST["age"]);
	$salary = mysqli_real_escape_string($con, $_POST["salary"]);
	$location = mysqli_real_escape_string($con, $_POST["location"]);
	$opdate = mysqli_real_escape_string($con, $_POST["opdate"]);
	$cldate = mysqli_real_escape_string($con, $_POST["cldate"]);
	$description = mysqli_real_escape_string($con, $_POST["description"]);
	$username = mysqli_real_escape_string($con, $_POST["fid"]);

    // Insert Query
    $sql = "UPDATE tbl_jobopeningdetail SET JobCategory='$jcat', SkillsRequired='$skills', Role='$role', MinimumQualification='$qualification', MaximumAge='$age', ExpectedSalary='$salary', JobLocation='$location', JobOpeningDate='$opdate', JobClosingDate='$cldate', JobDescription='$description' WHERE username='$username'";

    if(!mysqli_query($con, $sql))
    {
        die('Error: ' . mysqli_error($con));
    }
    else
    {
        header("Location: frmViewJobs.php?msg=1");
    }

    mysqli_close($con);
?>