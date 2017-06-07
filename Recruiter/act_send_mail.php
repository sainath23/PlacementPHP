<?php 
	$name = "Sainath";
	$from = "placementcell";
	$to = "sai.parkar@yahoo.com";
	$subject = "Mail from ".$name;
	$message = "This is a test";
	$header = "From: ".$name." <".$from.">\r\n";
	
	if(mail($to, $subject, $message, $header))
		echo "Your message has been sent.";
	else
		echo "ERROR";
?>