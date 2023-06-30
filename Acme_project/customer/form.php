<?php

session_start();

if(!isset($_SESSION['cart']) || is_null($_SESSION['cart'])){
    
    echo "<script>alert('Cart is empty')</script>";

    echo "<script>window.location.href='menu.php'</script>";
}

include_once "../Shared/connection.php";

$customerid=$_POST['user'];

echo $customerid;

$local=$_SESSION['cart'];

for($i=0;$i<count($local);$i++){

    $pid=$local[$i][0];
    $qnt=$local[$i][1];

    $fetch=mysqli_query($conn,"select * from product where pid=$pid");

    $row=mysqli_fetch_assoc($fetch);

    $sellerid=$row['sellerid'];

    $check=mysqli_query($conn,"INSERT INTO `orders` (sellerid,customerid,pid,qnt) VALUES ($sellerid,'$customerid',$pid,$qnt);");

}
session_destroy();

header("location:order.php?user=$customerid");

?>