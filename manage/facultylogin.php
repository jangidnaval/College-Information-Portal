<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
		
		
		<?php
			
			require ("require/validate.php");
			session_set_cookie_params(0);
			session_start();
			$username=$password="";
			
			$username=test($_REQUEST['fid']);
			$password=(test($_REQUEST['password']));
			$type="faculty";
			
			$_SESSION['fid']=$username;
			$_SESSION['type']=$type;
			
			
			$con=connect();
			
			$query="SELECT * FROM user U where U.id='$username' AND U.type='$type' "  ;
			
			$result=$con->query($query) ;
			
			$arr=$result->fetch_array();
			
			if($arr['password']==$password)
			{ 
				echo "<script> alert('Successfull Login')</script>";
				
				header('location:facultyhome.php');
			}
			//else
			//echo "<script>  alert('Please enter a valid password or username');window.location='facultylogin.html';</script>";
			
		?>
		
		
	</body>
</html>
