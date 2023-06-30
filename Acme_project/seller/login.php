<?php
 session_start();

 $_SESSION['login_status']=false;

 $user=$_GET['user'];
 $pass=$_GET['pass'];

 $hash=md5($pass);

 $conn=new mysqli("localhost","root","","acme23");

 $cursor=mysqli_query($conn,"select * from seller where username='$user' and password='$hash';");

 $check=mysqli_num_rows($cursor);

   if(($check==0)){

    echo "Invalid Credential";

   }
   else{

      $fetch=mysqli_fetch_assoc($cursor);

      $_SESSION['login_status']=true;
      $_SESSION['userid']=$fetch['sellerid'];
      $_SESSION['username']=$fetch['username'];

      echo "login success";

      header("location:product/menu.html");
   }
?>