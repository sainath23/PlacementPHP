<?php
	session_start();
	$IsValid = $_SESSION['IsValid'];
	
	if(!$IsValid)
	{
		header("Location: login.php?msg=6");
	}
?>