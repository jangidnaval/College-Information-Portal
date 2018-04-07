<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
		
		<?php 
			
			require_once ("require/validate.php");
			
			
			$first_name=test($_REQUEST['first_name']);
			$last_name=test($_REQUEST['last_name']);
			$email=test($_REQUEST['email']);
			$DOB=test($_REQUEST['dob']);
			$branch=branch(test($_REQUEST['branch']));
			$password=(test($_REQUEST['password']));
			$id=test($_REQUEST['id']);
			
			
			
			$con=connect();  			//connect with database
			
			$query="SELECT * FROM student U where U.sid='$id' ";
			
			$result=$con->query($query);
			$foundRows=$result->num_rows;
			
			if($foundRows){
				
				echo "<script> alert('UerName already exist');</script>";
				die();
			}
			else
			{
				
				$res=$con->query("INSERT INTO user (id,password,type) VALUES ('$id','$password','student' )");	
				$res1=$con->query("INSERT INTO student (sid,first_name,last_name,email,did,dob) VALUES ('$id','$first_name','$last_name','$email','$branch','$DOB')" );
				
				if($res1&&$res){
					echo "<script> alert('Successfully registered ');</script>";
					header('Location:studentlogin.html');
				}
			}
		?>
		
		
	</body>
</html>			