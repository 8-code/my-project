<?php

$conn=new mysqli("localhost","root","","acme23");

if($conn->connect_error){
     echo "error in syntax";
     die;
}
?>