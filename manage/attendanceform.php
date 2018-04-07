

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="script.js" type="text/javascript"></script>
		
		
		
		
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



<?php


$data=$_REQUEST['group_name'];

$con=connect();

$res=$con->query("select sid,first_name,last_name,q1.	cid from (SELECT s.sid,e.cid,grp,first_name,last_name FROM student as s INNER JOIN enrollment as e ON s.sid=e.sid ) as q1 INNER JOIN (SELECT c.cid,fid FROM course as c INNER JOIN enrollment as e1 ON c.cid=e1.cid GROUP BY cid) as q2 ON q1.cid=q2.cid where grp='$data'  ") or  die($conn->error);

$arr1=array();

while($var=$res->fetch_assoc())
{
$arr1[]=array('sid' =>$var['sid'] , 'cid' =>$var['cid'] , 'first_name'=>$var['first_name'],'last_name'=>$var['last_name']  ) ;    
}


?>

<div class="container">
<table class="table table-striped">
<tbody>

<form method="post" action="submitattendance.php" role="form">
<?php  

foreach ($arr1 as $row){
$id=$row['sid'];
$_SESSION['course']=$row['cid'];
echo'<tr>'; 
echo'<td>'. $row['sid']."</td>";
echo'<td>'. $row['cid']."</td>";
echo'<td>'. $row['first_name'].'</td>';
echo'<td>'. $row['last_name'].'</td>'; ?>
<td><input type="radio" name="<?php echo $id  ?>" value="P" />Present </td>
<td><input type="radio" name="<?php echo  $id  ?>" value="A" />Absent </td>
<?php
echo'<tr>';
}

?>

<tr>
<td><button type="submit" >Submit</button>  </td>
</tr>

</form>
</tbody>
</table>
</div>


</body>
</html>