

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="script.js" type="text/javascript"></script>
		
		<script >
			
			
			<?php
				session_start();
				require 'require/validate.php';
				
				
				if(!isset($_SESSION['sid']) )
				header('Location:studentlogin.html' );
				
				
				$id=$_SESSION['sid']; 
				
				
				
				
				
				
				
			?>
			
		</script>
	</head>
	<body>
		
		<div class="jumbotron">
			<div class="container text-center">
			<h1>Welcome to MNNIT Information Portal</h1>      
			</div>
			</div>
			
			<nav class="navbar navbar-default">
			<div class="container-fluid">
			<div class="navbar-header">
			
			<a class="navbar-brand" href="studenthome.php">Hello <?=$id?></a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
			<li class="active"><a href="studentprofile.php">My Profile <span class="sr-only">(current)</span></a></li>
			
			
			
			
			<li><a href="downloads.php">Downloads</a></li>
			<li><a href="enrollment.php">Enroll</a></li> 
			<li><a href="assignment.php">Assignments</a></li>
			<li><a href="viewattendance.php">ViewAttendance</a></li> 
			
			</ul>
			
			<form class="navbar-form navbar-left">
			<div class="form-group">
			<input type="text" class="form-control" placeholder="Search">
			</div>
			<button type="submit" class="btn btn-default">Submit</button>
			</form>
			<ul class="nav navbar-nav navbar-right">
			<li><a href="logout.php">Logout</a></li>
			
			</ul>
			</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
			</nav>
			
			
			
			
			<?php
			
			$con=connect();
			
			$res=$con->query("select cid,attendance, count(attendance) as present  ,(count(attendance)* 100/ (select count(attendance) from attendance where sid=$id and cid=(select cid from enrollment where sid=$id group by cid ))           ) as percentage from attendance where sid=$id and cid=(select cid from enrollment where sid=$id group by cid )
			and attendance='P' ");
			
			//$arr=$res->fetch_assoc();
			
			//print_r($arr);
			
			?>
			
			
			
			
			
			<div class="container">
			<h2>Semester Attendance Report</h2>
			
			<table class="table">
			<thead>
			<tr>
			<th>Subject Name</th>
			<th>Your Attendance</th>
			<th>Total</th>
			<th>Percentage</th>
			</tr>
			</thead>
			
			<tbody>
			
			<?php
			while($arr=$res->fetch_assoc())
			{
			$var=$arr['cid'];
			$res1=$con->query("SELECT name from course where cid=$var ") ;
			$arr1=$res1->fetch_assoc();
			echo"<tr>";
			echo '<td>'. $arr1['name'] . '</td>';
			echo '<td>'. $arr['present'] . '</td>';
			echo '<td>'. $arr['present']*100/$arr['percentage'] . '</td>';
			echo '<td>'. $arr['percentage'] . '</td>';
			echo"</tr>"; 
			}
			?>
			</tbody>
			</table>
			</div>
			
			
			
			
			</body>
			</html>
			
						