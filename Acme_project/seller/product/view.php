<html>
    <head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <style>
            .cart{
                width:fit-content;
                height:fit-content;
                display:inline-block;
                background-color:green;
                padding:10px;
                margin:10px;
                /* margin-top:40px; */
            }
            img{
                width:90px;
                height:90px;
            }
            .price{
                color:red;
            }
            .name{
                font-size:20px;
                font-weight:bold;
            }
            .detail{
                width:200px;
            }
        </style>
    </head>
    <body>
        <script>

            function confirmdelete(pid){

                ans=confirm("are you sure you want to delete product id "+pid);

                if(ans){

                    alert("deleted successful");
                    window.location.assign("delete.php?pid="+pid);

                }
            }
            function confirmedit(pid){

                window.location.assign("edit.php?pid="+pid);

            }
        </script>
    </body>
</html>



<?php

include_once "../../Shared/connection.php";

include "menu.html";

session_start();

$sellerid=$_SESSION['userid'];

$fetch=mysqli_query($conn,"select * from product where sellerid=$sellerid");

if(mysqli_num_rows($fetch)==0){
        
    echo "<script>alert('no product is uploaded');</script>";

    echo "<script>window.location.href='menu.html';</script>";
}

while($row=mysqli_fetch_assoc($fetch)){

    $name=$row['name'];
    $detail=$row['detail'];
    $price=$row['price'];
    $impath=$row['impath'];
    $pid=$row['pid'];

    echo "
        <div class='cart'>
            <div class='name'>$name</div>
            <div class='price'>$price RS</div>
            <div class='impath'>
                <img src='../../$impath'>
            </div>
            <div class='detail'>$detail</div>
            <div class='d-flex justify-content-between'>
                <div>
                    <button onclick='confirmedit($pid)' class='btn bg-danger'><i class='bi bi-tools'></i></button>
                </div>
                <div>
                    <button  onclick='confirmdelete($pid)' class='btn bg-danger'><i class='fa fa-trash'></i></button>
                </div>
            </div>
        </div>
    ";
}

?>