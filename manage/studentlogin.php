<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
		
		
		<?php
			
			require ("require/validate.php");
			session_set_cookie_params(0);
			session_start();
			$id=$password="";
			
			$id=test($_REQUEST['sid']);
			$password=(test($_REQUEST['password']));
			$type="student";
			
			$_SESSION['sid']=$id;
			$_SESSION['type']=$type;
			
			
			$con=connect();
			
			$query="SELECT * FROM user U where U.id='$id' AND U.type='$type' ";
			
			$result=$con->query($query) or die("Last error: {$con->error}\n");
			
			
			
			$arr=$result->fetch_array();
			
			
			
			
			if($arr['password']==$password)
			{ 
				//		echo "<script> alert('Successfull Login')</script>";
			
			header('location:studenthome.php');
			}
			else
			//echo "<script>  alert('Please enter a valid password or username') </script>";
			echo "<script>  alert('Please enter a valid password or username') ; window.location='studentlogin.html'</script>";
			
			?>
			
			
			</body>
			</html>
						