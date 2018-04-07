

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="script.js" type="text/javascript"></script>
		
		<script >
			function fun($data)
			{
				
				
				
				
			}
			
			
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
				
				<a class="navbar-brand" href="#">Hello <?=$userName?></a>
			</div>
			
			
			<ul class="nav navbar-nav navbar-right">
				<li><a href="logout.php">Logout</a></li>
				
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>

<div class="container-fluid">
	<div class="dropdown">
		<h2>Choose Group</h2>
		<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">group
		<span class="caret"></span></button>
		<ul class="dropdown-menu">
			
			<?php
				
				$con=connect();
				
				$res=$con->query("select grp from (SELECT s.sid,e.cid,grp FROM student as s INNER JOIN enrollment as e ON s.sid=e.sid ) as q1 INNER JOIN (SELECT c.cid,fid FROM course as c INNER JOIN enrollment as e1 ON c.cid=e1.cid GROUP BY cid) as q2 ON q1.cid=q2.cid GROUP BY grp  ") or  die($conn->error);
				
				
				
				$arr=array();
				
				while($var=$res->fetch_assoc())
				{
					$arr[]=$var['grp'];
				}
				
				//print_r($arr);
			?>
			
			
			<?php
				foreach( $arr as $id=>$name) 
				echo "<li> 
				<form   action=\"attendanceform.php\" mathod=\"post\">
				<button type=\"submit\"  name=\"group_name\" value=\"$name\">$name</button>
				
				</li>";
			?>
			
		</ul>
	</div>
</div>





</body>
</html>