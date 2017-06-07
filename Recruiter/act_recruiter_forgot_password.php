<?php
    session_start();
	$con = mysqli_connect("localhost", "root", "", "placement") 
    or die("Failed to connect MySQL: " . mysqli_error()); // Connecting to MySQL Database

    // Variable Declaration
    $username = mysqli_real_escape_string($con, $_POST['username']);
	$question = mysqli_real_escape_string($con, $_POST['question']);
	$answer = mysqli_real_escape_string($con, $_POST['answer']);


    $sql = mysqli_query($con, "SELECT * FROM tbl_recruiteraccountdetails  WHERE username='$username' AND Answer='$answer' AND HintQuestion='$question'");
	$row = mysqli_fetch_assoc($sql);
	$password = $row['password'];

	if(isset($password))
	{
		echo "<h2>Your password is: ".$password.". You will be redirected in 5 seconds</h2>";
		header( "refresh:5;url=../recruiter_login.php" );
	}
	else
	{
		header("Location: frmRecruiterForgotPassword.php?msg=2");
	}

    mysqli_close($con);
?>