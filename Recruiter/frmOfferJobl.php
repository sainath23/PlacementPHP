<?php
    session_start();
	$con = mysqli_connect("localhost", "root", "", "placement") 
    or die("Failed to connect MySQL: " . mysqli_error()); // Connecting to MySQL Database

    // Variable Declaration
	$JobSeekerID = $_GET['ID'];
	$username = $_SESSION['username'];
	
	$query = mysqli_query($con, "SELECT * FROM tbl_jobseekerresponsetorecruiter WHERE JobSeekerID='$JobSeekerID'");
    $row = mysqli_fetch_assoc($query);
	$JobID = $row['JobID'];
	$JobSeekerName = $row['RecruiterName'];
	
    $sql = "INSERT INTO tbl_recruiterresponsetojobseeker(JobSeekerName, RecruiterName, JobID, DateOfResponse) VALUES('$JobSeekerID', '$JobSeekerName', '$JobID', curdate())";
	$result = mysqli_query($con, $sql);
	
	if($result)
	{
		header("Location: frmJobSeekerResponseToRecruiter.php?msg=1");
	}
	else
	{
		die('Error: ' . mysqli_error($con));
	}

    mysqli_close($con);
?>