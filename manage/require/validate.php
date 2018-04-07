<?php
function test($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function branch($data){

  if($data=="cse")
    return 4;
  if($data=="mech")
    return 3;
  if($data=="civil")
      return 1;
  if($data=="ee")
      return 2;
  if($data=="it")
      return 8;
  if($data=="ece")
    return 5;
  if($data=="pie")
    return 6;
  if($data=="chem")
    return 9;
}

function b_name($data){

  if($data==4)
    return "cse";
  if($data==3)
    return "mech";
  if($data==1)
      return "civil";
  if($data==2)
      return "ee";
  if($data==8)
      return "it" ;
  if($data==5)
    return "ece" ;
  if($data==6)
    return "pie";
  if($data==9)
    return "chem";

}

function connect()
{
    $dbhost= "localhost";
    $dbuname = "root";
    $dbpassword = "";
    $dbname= "manage";
    $con = new MySQLi($dbhost,$dbuname,$dbpassword,$dbname);
    if($con->connect_errno)
        die("Not able to connect ot database..".$con->connect_error);
    else
        {//echo "<script>alert ('Connected to Database')  </script>";
          return $con;
}
}
?>