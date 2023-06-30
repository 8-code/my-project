<?php

$user=$_POST['user'];
$pass=$_POST['pass'];

$hash=md5($pass);

$con=new mysqli("localhost","root","","acme23");

$cursor=mysqli_query($con,"INSERT INTO seller (username,password) VALUES ('$user','$hash')");

session_start();

if($cursor){

   echo " Register Successfull";

   $_SESSION['login_status']=true;

   header("location:product/upload.php");
}

else echo "Syntax Error";
 

?>