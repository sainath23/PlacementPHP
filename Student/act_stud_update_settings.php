<?php
    session_start();
	$con = mysqli_connect("localhost", "root", "", "placement") 
    or die("Failed to connect MySQL: " . mysqli_error()); // Connecting to MySQL Database

    // Variable Declaration
    $password = mysqli_real_escape_string($con, $_POST["newpass1"]);
    $hintquestion = mysqli_real_escape_string($con, $_POST["hintquestion"]);
    $answer = mysqli_real_escape_string($con, $_POST["answer"]);
	$JobSeekerID = mysqli_real_escape_string($con, $_SESSION["username"]);

    $sql = "UPDATE tbl_jobseekerregistration SET password='$password', HintQuestion='$hintquestion', Answer='$answer' WHERE JobSeekerID='$JobSeekerID'";
	$result = mysqli_query($con, $sql);
	
	if($result)
	{
		header("Location: frmStudentProfileSettings.php?msg=1");
	}
	else
	{
		die('Error: ' . mysqli_error($con));
	}

    mysqli_close($con);
?>