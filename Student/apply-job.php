<?php 
    session_start();
	$con = mysqli_connect("localhost", "root", "", "placement") 
    or die("Failed to connect MySQL: " . mysqli_error()); // Connecting to MySQL Database
    // Variable Declaration
    $JobSeekerID = mysqli_real_escape_string($con, $_SESSION["username"]);
	$JobID = mysqli_real_escape_string($con, $_POST["jname"]);
	$uname = mysqli_real_escape_string($con, $_POST["uname"]);
	//echo $uname;
	$RecruiterName = mysqli_query($con, "SELECT * FROM tbl_recruiterorganisationdetails WHERE username='$uname'");
    $row = mysqli_fetch_assoc($RecruiterName);
	$orgname = $row['OrganizationName'];
	
	$sql = "INSERT INTO tbl_jobseekerresponsetorecruiter(JobSeekerID, RecruiterName, JobID, DateOfResponse)
        VALUES ('$JobSeekerID', '$orgname', '$JobID', CURDATE())";
	
	$result = mysqli_query($con, $sql);
	
	if($result)
	{
		header("Location: frmStudentSearchJob.php?msg=1");
	}
	else
	{
		die('Error: ' . mysqli_error($con));
	}
    mysqli_close($con);
?>