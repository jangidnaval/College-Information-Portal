

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
				
				
				if(!isset($_SESSION['fid']) )
				header('Location:facultylogin.html' );
				
			?>
			
			<?php
				$userName=$_SESSION['fid']; 
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
	
	<a class="navbar-brand" href="#">Hello <?=$userName?></a>
    </div>
	
	
	
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	<ul class="nav navbar-nav">
	<li class="active"><a href="facultyprofile.php">My Profile <span class="sr-only">(current)</span></a></li>
	<li class="active"><a href="timetable.pdf">Time Table <span class="sr-only">(current)</span></a></li>
	
	
	<li><a href="downloads.php">Downloads</a></li>
	
	<li><a href="assignment.php">Assignments</a></li> 
    <li><a href="markattendance.php">Mark Attendance</a></li>
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
	
	
	
	
	
	
	</body>
	</html>
	
	
	
	
		