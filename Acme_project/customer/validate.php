<?php
    session_start();

    $check=$_GET['otp'];

    $otp=$_SESSION['OTP'];

    $customerid=$_SESSION['user'];
    
    echo $check." ".$otp;

    if($check==$otp){

        echo " <scrip>alert('login success');</script>";

        echo "<script>window.location.href='order.php?user=$customerid'</script>";
      
    }
    else{

        echo " <script>alert('invalid otp');</script>";
        echo "<script>window.location.href='otp.php'</script>";
    
    }

 ?>

 