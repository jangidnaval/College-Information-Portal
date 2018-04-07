<?php
	
	require 'require/validate.php';
	session_start();
	$con=connect();
	
	$uname=$_SESSION["sid"];
	
    $result = $con->query("SELECT image FROM student s WHERE s.sid = '$uname' " );
	
    if($result->num_rows > 0){
        $imgData = $result->fetch_assoc();
		//           echo 'image is here';
        //Render image
        header('Content-Type: image/jpg'); 
		ob_clean();
        echo $imgData['image']; 
		}else{
        echo 'Image not found...';
	}
    
?>