

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="script.js" type="text/javascript"></script>
		
		<script >
			
			
			
		</script>
		
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
				
				<a class="navbar-brand" href="facultyhome.php">Hello <?=$userName?></a>
			</div>
			
			
			
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active"><a href="facultyprofile.php">My Profile <span class="sr-only">(current)</span></a></li>
					<li class="active"><a href="javascript:history.go(-1)">Back <span class="sr-only">(current)</span></a></li>
					
					<li><a href="givenassignment.php">Given Assignments</a></li> 
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
	
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading"><strong>Upload Files</strong></div>
			<div class="panel-body">
				
				<!-- Standar Form -->
				<h4>Select pdf file and Due date  </h4>
				<form action="assignment.php" method="post" enctype="multipart/form-data" >
					<div class="form-inline">
						<div class="form-group">
							<label>File Name</label>
							<input type="text" name="file_name" placeholder="Assignment Name">
						</div>
						
						<div class="form-group">
							<label>Course Code</label>
							<input type="text" name="cid" placeholder="Course Code">
							
						</div>
						
						<div class="form-group">     
							
							<input type="file" name="file" >
						</div>
						
						<div>
							<label>Due Date</label>
							<input type="date" name="duedate" >
						</div>
						
						<div>
							<label>Marks</label>
							<input type="text" name="mark" >
						</div>
					</div>
					<div>
						<button type="submit" name="submit" class="btn btn-sm btn-primary" >Upload file</button>
					</div>
				</form>
				
			</div>
		</div>
	</div> <!-- /container -->
	
	
	<?php
		if(isset($_POST['submit'])){
			
			$con=connect();
			
			$cid=$_REQUEST['cid'];
			$fid=$_SESSION['fid'];
			$name= $_REQUEST['file_name'];
			$mark=$_REQUEST['mark'];
			
			$tmp_name= $_FILES['file']['tmp_name'];
			
			
			$duedate=$_REQUEST['duedate'];
			
			$fileextension= '.pdf';
			
			
			if (isset($name)) {
				
				$path= 'uploads/files/';
				
				if (move_uploaded_file($tmp_name, $path.$name.$fileextension)) {
					$con->query("INSERT INTO assignment (cid,fid,name,duedate,marks) VALUES ('$cid','$fid','$name','$duedate',$mark) ");
					
					echo 'Uploaded!';
					
				}
			}
			
			
			
			
		}
		
		
		
	?>
	
	
	
	
</body>
</html>




