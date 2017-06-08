<?php
	$con = mysqli_connect("localhost", "root", "", "photos")
				or die("Failed to connect MySQL: ".mysqli_error());
	
	$imgid = $_GET['ID'];
	$file = mysqli_query($con, "SELECT * FROM images WHERE img_id='$imgid'");
	
	$row = mysqli_fetch_array($file);
	unlink("images/".$row['img_name']);
	$sql = mysqli_query($con, "DELETE FROM images WHERE img_id='$imgid'");
	
	if($sql) {
		header("Location: index.php?msg=3");
	}
	else {
		header("Location: index.php?msg=4");
	}
	mysqli_close($con);
?>