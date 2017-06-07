<?php
    $con = mysqli_connect("localhost", "root", "", "placement") 
    or die("Failed to connect MySQL: " . mysqli_error()); // Connecting to MySQL Database

    // Variable Declaration
    $jname = mysqli_real_escape_string($con, $_POST["jname"]);
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
    $sql = "INSERT INTO tbl_jobopeningdetail(username, JobID, JobCategory, SkillsRequired, Role, MinimumQualification, MaximumAge, ExpectedSalary, JobLocation, JobOpeningDate, JobClosingDate, JobDescription)
     VALUES ('$username', '$jname', '$jcat', '$skills', '$role', '$qualification', '$age', '$salary', '$location', '$opdate', '$cldate', '$description')";

    if(!mysqli_query($con, $sql))
    {
        die('Error: ' . mysqli_error($con));
    }
    else
    {
        header("Location: frmAddJobs.php?msg=1");
    }

    mysqli_close($con);
?>