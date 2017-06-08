<?php
	//If user clicks on submit button
	if(isset($_POST['upload'])){
		//Path to store images
		$targetDir = "images/".basename($_FILES['image']['name']);
		
		//Setting up database connection
		$con = mysqli_connect("localhost", "root", "", "photos")
				or die("Failed to connect MySQL: ".mysqli_error());
		
		$imgName = $_FILES['image']['name'];
		$imgInfo = $_POST['info'];
		
		$sql = mysqli_query($con, "INSERT INTO images(img_name, img_info) VALUES('$imgName', '$imgInfo')");
		
		if(move_uploaded_file($_FILES['image']['tmp_name'], $targetDir)) {
			header("Location: index.php?msg=1");
		}
		else {
			header("Location: index.php?msg=2");
		}
		mysqli_close($con);
	}
?>