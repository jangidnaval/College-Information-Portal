<?php
	session_start();
	//print_r($_REQUEST);
	//print_r($_SESSION);
	
	$cor=$_SESSION['course'];
	;
	require 'require/validate.php';
	
	$con=connect();
	
	foreach ($_REQUEST as $key=>$value) {
		
		
		$res=$con->query("insert into attendance (sid,attendance,cid) values ('$key','$value','$cor')"   );
	}
	
	echo "<script>  alert('Attendance Submitted');window.location='facultyhome.php';</script>";
	
	
?>



