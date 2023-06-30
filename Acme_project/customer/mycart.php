
<!DOCTYPE html>
    <html lang="en">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <style>
            body{
    
                background-image:url('https://c4.wallpaperflare.com/wallpaper/414/974/369/background-tree-board-texture-wallpaper-preview.jpg');
                background-repeat:repeat;
                background-size:cover;
             }
            .box{
                /* background-color:black;
                 */
                 display:flex;
                 flex-wrap:wrap;
            }
            .cart{
                background-color:(255,255,255);
                backdrop-filter:blur(7px);
                border:1px solid black;
                /* border:none; */
                border-radius:10%;
                width:fit-content;
                height:fit-content;
                display:flex;
                padding:10px;
                margin:10px;
                flex-direction:column;
            }
            /* .cart{
                backdrop-filter:blur(7px);
                width:fit-content;
                height:fit-content;
                display:flex;
                background-color:green;
                padding:10px;
                margin:10px;
                flex-direction:column;
                flex-wrap: wrap;
            } */
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
            .action{
                align-self:center;
            }
        </style>
    </head>
    <body>
        <div class="d-flex justify-content-between bg-warning p-2">

            <div class="d-flex gap-3">

                <a  href="menu.php">
                    <button class="btn btn-success">
                        view order
                    </button>
                </a>

                <a href="delete.php">
                    <button class="btn btn-success">
                        Clear session
                    </button>
                </a>
            
                <a href="order.html">
                    <button class="btn btn-success">
                        order list
                    </button>
                </a>
            
            </div>
            <div>
                <a href="form.html">
                    <button class="btn btn-success">
                        Place Order
                    </button>
                </a>
            </div>
        </div>
        
    </body>
    </html>

<?php


session_start();

if(!isset($_SESSION['cart']) || !$_SESSION['cart']){
    
    echo "<script>
        alert('no cart is present');
        window.location.href='menu.php';
        </script>";
}
    
include "../Shared/connection.php";

$localcart=$_SESSION['cart'];

for($i=0;$i<count($localcart);$i++){

    $pid=$localcart[$i][0];
    $qnt=$localcart[$i][1];

    $fetch=mysqli_query($conn,"select * from product where pid=$pid");

    $row=mysqli_fetch_assoc($fetch);

    $name=$row['name'];
    $detail=$row['detail'];
    $price=$row['price'];
    $impath=$row['impath'];

    echo "
        <div class='cart'>

            <div class='name'>$name</div>
            <div class='price'>$price RS</div>
            <div class='impath'>
                <img src='../$impath'>
            </div>
            <div class='detail'>$detail</div>
            <div class='action'>
                <button onclick='confirmedit($pid)' class='btn bg-danger'><i class='bi bi-basket'>=$qnt</i></button>
            </div>

        </div>
    ";

}

echo "
        <script>
            function confirmedit(pid){

                window.location.href='cart.php?pid=$pid';
            }
        </script>
    "
?>