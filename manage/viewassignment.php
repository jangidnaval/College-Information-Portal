

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
			
			$con=connect();
			
			if(!isset($_SESSION['sid']) )
			header('Location:studentlogin.html' );
			
			
			$sid=test($_SESSION['sid'])
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
				
				<a class="navbar-brand" href="studenthome.php">Hello <?=$sid?></a>
			</div>
			
			
			
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
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
		$sid=$_SESSION['sid'];
		$res=$con->query("select name,duedate,marks,ass.cid FROM assignment as ass where ass.cid=(select cid from enrollment where sid=$sid) order by duedate");
		
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

						echo '<td>';
						echo "<a href='$files_show.$ext'>$files_field</a>";
						echo '</td>';

						echo '<td>'. $arr['duedate'] . '</td>';
						echo '<td>'. $arr['marks'] . '</td>';
						echo '<td>'. $arr1['name'] . '</td>';
						
						echo"</tr>"; 
						
						echo "<tr>";
?>
<td>
						<form action="viewassignment.php" method="post" enctype="multipart/form-data" >
					<div class="form-inline">
						
						<input type="text" name="cid" value="<?php $var?>" hidden>

						<div class="form-group">     
							<input type="file" name="file" >
						</div>
					<span>
						<button type="submit" name="submit" class="btn btn-sm btn-primary" >Upload file</button>
						(upload zip file only)
					</span>
				</div>
				</form>
			</td>

<?php
					echo "</tr>"; 
					}
				?>
			</tbody>
		</table>
	</div>


<?php
		if(isset($_POST['submit'])){
			





			$con=connect();
			
			$cid=$_REQUEST['cid'];
			$sid=$_SESSION['sid'];
			$name=$sid.$files_field;
			
			$tmp_name= $_FILES['file']['tmp_name'];
			
			

			//echo $tmp_name;
			
			$fileextension= '.zip';
			

			if (isset($name)) {
				
				$path= 'uploads/sol/$';

				//echo "$path";
				
				if (move_uploaded_file($tmp_name,$path.$name.$fileextension)) {
					$con->query("INSERT INTO sol_assignment (cid,sid,name) VALUES ('$cid','$sid','$name') ");

					header("Location:viewassignment.php");
					
				}
			}
			else
				echo "Error in upload";
			
			
			
		}
		
		
		
	?>


	
</body>
</html>