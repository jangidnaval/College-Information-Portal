




<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		
		
		
		<?php
			session_start();
			
			if(isset($_SESSION['sid']) )
			$id=$_SESSION['sid'];
			else
			$id='Guest';
			
		?>
		
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
			
			<a class="navbar-brand" href="#">Hello <?=$id?></a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav ">
			<li class="active"><a href="javascript:history.go(-1)">Back <span class="sr-only">(current)</span></a></li>
			
			
			
			
			<li><a href="downloads.php">Downloads</a></li>
			
			
			</ul>
			
			
			<ul class="nav navbar-nav navbar-right">
			<li><a href="logout.php">Logout</a></li>
			
			</ul>
			</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
			</nav>
			
			
			
			
			
			<div class="container">
			<h2>Forms</h2>
			<div class="well well-sm""><a href="./data/civil.pdf">UG Registration</a></div>
			<div class="well well-sm""><a href="./data/civil.pdf">PG Registration</a></div>
			<div class="well well-sm""><a href="./data/civil.pdf">Ph.D. Registration</a></div>
			<div class="well well-sm""><a href="./data/civil.pdf">Day Scholors</a></div>
			<div class="well well-sm""><a href="./data/civil.pdf">Hostel</a></div>
			
			<h2>Affidavits and Undertaking</h2>
			<div class="well well-sm""><a href="./data/civil.pdf">Affidavit by student</a></div>
			<div class="well well-sm""><a href="./data/civil.pdf">Affidavit by parent</a></div>
			
			
			<h2>Academic Calender</h2>
			<div class="well well-sm""><a href="./data/civil.pdf">Academic Calender 2017-2018</a></div>
			
			<h2>Rules and Regulations</h2>
			<div class="well well-sm""><a href="./data/civil.pdf">UGC regulations about Ragging</a></div>
			<div class="well well-sm""><a href="./data/civil.pdf">Use of Motor Vehicales</a></div>
			
			
			
			<h2>Curriculam</h2>
			<h4>First year</h4>
			<div class="well well-sm""><a href="./data/1st_yr_curriculum.pdf">First Year Curriculam </a></div>
			<h4>Branch:</h4>
			<div class="well well-sm"><a href="./data/biotech.pdf">Biotech</a></div>
			<div class="well well-sm""><a href="./data/civil.pdf">Civil</a></div>
			
			</div>
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			</body>
			</html>			