<!DOCTYPE html>
<head>
	<title>Upload Image</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<div id="content">
    	<div>
        	<h1>Upload Image</h1>
        </div>
        <?php
			$con = mysqli_connect("localhost", "root", "", "photos")
				or die("Failed to connect MySQL: ".mysqli_error());
				
			$sql = mysqli_query($con, "SELECT * FROM images");
			
			while($row = mysqli_fetch_array($sql)) {
				echo "<div id='img_div'>";
					echo "<img src='images/".$row['img_name']."'>";
					echo "<p>".$row['img_info']."</p>";
					echo "<a href='delete_image.php?ID=".$row['img_id']."'>Delete</a>";
				echo "</div>";
			}
			mysqli_close($con);
			echo "<div>";
				if(isset($_GET['msg'])) {
					$msg = $_GET['msg'];
					if($msg == 1)
						echo "<h2>Image has been uploaded successfully!</h2>";
					if($msg == 2)
						echo "<h2>There is something wrong while uploading image!</h2>";
					if($msg == 3)
						echo "<h2>Image has been deleted successfully!</h2>";
					if($msg == 4)
						echo "<h2>There is something wrong while deleting image!</h2>";
				}
			echo "</div>"
		?>
        <form action="upload_images.php" method="post" enctype="multipart/form-data">
        	<input type="hidden" name="size" value="1000000" />
            <div>
            	<input type="file" name="image" />
            </div>
            <div>
            	<textarea name="info" cols="40" rows="6" placeholder="Enter image information..."></textarea>
            </div>
            <div>
            	<input type="submit" name="upload" value="UPLOAD" />
            </div>
        </form>
    </div>
</body>
</html>