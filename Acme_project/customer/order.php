<?php

session_start();
session_destroy();

if(!isset($_GET['user'])){

    echo "<script>alert('user not found')</script>";
    echo "<script>window.location.href='menu.php'</script>";
}

include_once "../Shared/connection.php";

$customerid=$_GET['user'];

$fetch=mysqli_query($conn,"SELECT * FROM orders where customerid='$customerid'");

if(mysqli_num_rows($fetch)==0 || mysqli_num_rows($fetch)==null){
    echo "<script>alert('no order is placed')</script>";
    echo "<script>window.location.href='menu.php'</script>";
}


?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <style>

            body{
                background-color:black;
            }
            h4{
                color:white;
                text-align:center;
            }
            .box{
                 display:flex;
                 flex-wrap:wrap;
            }
            .cart{
                border-radius:10%;
                border:2px solid black;
                width:fit-content;
                height:fit-content;
                display:flex;
                background-color:#9e7942;
                padding:10px;
                margin:10px;
                flex-direction:column;
                flex-wrap: wrap;
            }
            img{
                width:90px;
                height:90px;
            }
            .price{
                color:red;
            }
            .name,.sellerid{
                font-size:18px;
                font-weight:bold;
            }
            .detail{
                width:200px;
            }
            .action{
                align-self:center;
            }
        </style>
    </head>
    <body>
     <div id="box" class="d-flex justify-content-between  p-2">

            <a  href="menu.php">
                <button class="btn btn-success">
                    view product
                </button>
            </a>
     </div>
     <h4>ORDER LIST</h4>
     <div class="box">
        <?php
            

            $fetch=mysqli_query($conn,"SELECT * FROM `orders` where customerid='$customerid'");

            while($row=mysqli_fetch_assoc($fetch)){

                $pid=$row['pid'];

                $qnt=$row['qnt'];
                
                $sellerid=$row['sellerid'];

                $data=mysqli_query($conn,"select * from product where pid=$pid");

                $row=mysqli_fetch_assoc($data);

                $name=$row['name'];
                $detail=$row['detail'];
                $price=$row['price'];
                $impath=$row['impath'];

                echo "
                    <div class='cart'>

                        <div class='sellerid'>$sellerid.</div>
                        <div class='name'>$name</div>
                        <div class='price'>$price RS</div>
                        <div class='impath'>
                            <img src='../$impath'>
                        </div>
                        <div class='detail'>$detail</div>
                        <div class='action'>
                            <button class=' bg bg-danger'>
                                <i class='bi bi-basket'>=$qnt</i>
                            </button>
                        </div>

                    </div>
                ";

            }

        ?>

     </div>
    </body>
    </html> 