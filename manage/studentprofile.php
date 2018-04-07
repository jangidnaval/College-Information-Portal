


<?php
session_start();

require 'require/validate.php';

$con=connect();

if(!isset($_SESSION['sid']) )
     header('Location:studentlogin.html' );


$sid=test($_SESSION['sid']);

$res=$con->query("SELECT * FROM student s where s.sid=$sid " );   


$arr = $res->fetch_assoc() ;

//print_r ($row);




    $first_name =$arr["first_name"];
    $last_name = $arr['last_name'];
    $email=$arr['email'];
    $mobile=$arr['mobile'];
    $branch=b_name($arr['did']);
    $father_name=$arr['father_name'];
    $gender=$arr['gender'];
    $dob=$arr['dob'];
   	$nationality=$arr['nationality'];
   	$religion=$arr['religion'];
    $address=$arr['address'];
    $caste=$arr['caste'];
   





?>




<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

  <script>

              $(function() {
    $('#profile-image1').on('click', function() {
        $('#profile-image-upload').click();
        
    });
});       
       </script> 

<style type="text/css">
	
textarea:focus, input:focus{
    outline: none;
}

</style>



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
  <div class="panel-heading">  <h4 >User Profile</h4></div>
   <div class="panel-body">
       
    <div class="box box-info">
        
            <div class="box-body">
                     <div class="col-sm-2">
                     
                     <div  align="center"> <img src="getimage.php?userName=<?=$sid?> " alt="No image" id="profile-image1" class="img-circle img-responsive"> 
                
                      <form action="imageupload.php" method="post"  enctype="multipart/form-data" >
                         <div align="center">
                         <input type="file" name="image" class="hidden" id="profile-image-upload" >
                         <input  type="submit"  name="submit" value="submit" id="submit-form" >
                          </div>
                      </form>
                      </div>

            </div>
            <div class="col-sm-6">
            <h4>Welcome <?= $sid ?> </h4>
                  
            </div>

          </div>

        </div>
    </div>   
<br>
           
  <table class="table table-striped">
    <form name="form1" action="studentprofile.php" method="post">
     <tbody>
      <tr>
        <td>First Name</td>
        <td><?= $first_name ?></td>
        <td> <input type="checkbox"  ></td>
      </tr>

      <tr>
        <td>Last Name</td>
        <td><?= $last_name ?></td>
        <td> <input type="checkbox"  ></td> 
      </tr>

      <tr>
        <td>Date Of Birth</td>
        <td><?= $dob ?></td> 
        <td> <input type="checkbox"  ></td>
      </tr>

      <tr>
        <td>Father's Name</td>
          <td><input type="text" name="father_name" value="<?php echo $father_name; ?> "  style="border:none;"  disabled="disabled"> </td>
     		<td> <input type="checkbox" onClick="form1.father_name.disabled =!this.checked;" ></td>
      </tr> 

      <tr>
        <td>Branch</td>
         <td><input type="text" name="branch" value="<?php echo $branch; ?> "  style="border:none;"   disabled="disabled"> </td>
         <td> <input type="checkbox"  ></td>
      </tr>

      <tr>
        <td>Email</td>

        <td><input type="text" name="email" value="<?php echo $email; ?> "  style="border:none;"  disabled="disabled"> </td>
       
         <td> <input type="checkbox" onClick="form1.email.disabled =!this.checked;"></td>
      </tr>

      <tr>
        <td>Mobile</td>
          <td><input type="text" name="mobile" value="<?php echo $mobile; ?> "  style="border:none;"  disabled="disabled"> </td>
        <td> <input type="checkbox" onClick="form1.mobile.disabled =!this.checked;"></td>
      </tr>

      <tr>
        <td>Sex</td>
          <td><input type="text" name="gender" value="<?php echo $gender; ?> "  style="border:none;"   disabled="disabled"> </td>
         <td> <input type="checkbox" onClick="form1.gender.disabled =!this.checked;"</td>
      </tr>

      <tr>
        <td>Address</td>
          <td><input type="text" name="address" value="<?php echo $address; ?>"  style="border:none;" disabled="disabled"> </td>
         <td> <input type="checkbox" onClick="form1.address.disabled =!this.checked;"></td>
      </tr>

      <tr>
        <td>Nationality</td>
         <td><input type="text" name="nationality" value="<?php echo $nationality; ?> "  style="border:none;"  disabled="disabled"> </td>
         <td> <input type="checkbox" onClick="form1.nationality.disabled =!this.checked;"></td>
      </tr>

      <tr>
        <td>Religion</td>
         <td><input type="text" name="religion" value="<?php echo $religion; ?> "  style="border:none;"  disabled="disabled"> </td>
        <td> <input type="checkbox" onClick="form1.religion.disabled =!this.checked;"></td>
      </tr>

      <tr>
        <td>Caste</td>
          <td><input type="text" name="caste" value="<?php echo $caste; ?> " style="border:none;"  disabled="disabled"> </td>
         <td> <input type="checkbox" onClick="form1.caste.disabled =!this.checked;"></td>
      </tr>

      <tr>
      	<td></td>
      <td>	</td>
      	<td>	<button type="submit" name="submit" class="btn btn-sm btn-primary">Update </button> </td>
      
      </tr>
    </tbody>
 </form>
  </table>
</div>


</div>
</div>

<?php

if(isset($_POST['submit']))
{

foreach ($_POST as $key => $value) {
	
	if($key!='submit')
	{
$value=test($value);
	$res=$con->query("UPDATE student SET $key='$value' WHERE sid='$sid' ");
?>
<script type="text/javascript">window.alert('Successfully Updated'); window.location.href='studentprofile.php';</script>

<?php
	}

}


}


?>


</body>
</html>