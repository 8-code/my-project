<?php
 
 $pid=$_GET['pid'];

 include_once "../../Shared/connection.php";
 include_once "upload.php";

 $query=mysqli_query($conn,"select * from product where pid=$pid;");
 
 $data=mysqli_fetch_assoc($query);
 
 $name=$data['name'];
 $detail=$data['detail'];
 $price=$data['price']; 
 $impath=$data['impath']; 
 echo $impath;
 
session_start();
$_SESSION['delete']=$pid;

 echo "<script>
    x=document.getElementsByName('name');
    x[0].value='$name';
    y=document.getElementsByName('detail');
    y[0].value='$detail';
    z=document.getElementsByName('price');
    z[0].value='$price';
    a=document.getElementsByName('submit');
    a[0].innerHTML='update';
    </script>";
    
?>


