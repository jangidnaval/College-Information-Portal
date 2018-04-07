<?php
	
	
	
	session_start();
	require 'require/validate.php';
	$uname=$_SESSION["sid"];
	
	$con=connect();
	
	
	if(isset($_POST["submit"]))     {
		
		$check = getimagesize($_FILES["image"]["tmp_name"]);
		
		if($check !== false){
			$image = $_FILES['image']['tmp_name'];
			$imgContent = addslashes(file_get_contents($image));
			
			//print_r($_SESSION);
			
			
			
			
			
			$insert=$con->query("UPDATE  student  SET image='$imgContent' where sid='$uname' ");
			
			if($insert)
            echo "Photo uploaded successfully.";
			else
            echo "Photo upload failed, please try again."; 
		}
		
		else
        echo "Please select an image file to upload.";
		
	}
	header('Location: '.$_SERVER['HTTP_REFERER']);
	
?>


