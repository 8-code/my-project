<?php

$username=$_POST['user'];

$password=$_POST['pass'];

include_once "../../Shared/connection.php";

$fetch=mysqli_query($conn,"SELECT password FROM seller WHERE username='$username'");

if(!mysqli_num_rows($fetch)){
    
    echo "<script>alert('no user name found');</script>";
    echo "<script>window.location.href='forgot.html'</script>";
}

$hash=md5($password);

$check=mysqli_query($conn,"UPDATE seller SET password='$hash' WHERE username='$username'");

echo "<script>alert('your passord is reset');</script>";

echo "<script>window.location.href='../login.html'</script>";

?>