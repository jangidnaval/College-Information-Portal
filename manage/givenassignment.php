

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
		$fid=$_SESSION['fid'];
		$res=$con->query("select name,duedate,marks,cid FROM assignment where fid=$fid order by duedate");
		
		//$arr=$res->fetch_assoc();
		//print_r($arr);
	?>
	
	
	
	
	
	<div class="container">
		<h2>Given Assignments</h2>
		
		<table class="table">
			<thead>
				<tr>
					<th> Name</th>
					<th>duedate</th>
				<th>marks</th>
				<th>Subject Name</th>
				<th> View</th>
				</tr>
				</thead>
				
				<tbody>
				
				<?php
				while($arr=$res->fetch_assoc())
				{
				
				$files_field= $arr['name'];
				$files_show= "Uploads/files/$files_field";
				
				
				$var=$arr['cid'];
				$ext='pdf';
				$res1=$con->query("SELECT name from course where cid=$var ") ;
				$arr1=$res1->fetch_assoc();
				echo"<tr>";
				echo '<td>'.$arr['name'] . '</td>';
				echo '<td>'. $arr['duedate'] . '</td>';
				echo '<td>'. $arr['marks'] . '</td>';
				echo '<td>'. $arr1['name'] . '</td>';
				echo '<td>';
				echo "<a href='$files_show.$ext'>$files_field</a>";
				echo '<td>';
				echo"</tr>"; 
				}
				?>
				</tbody>
				</table>
				</div>
				

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