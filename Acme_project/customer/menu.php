

<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <style>
             body{
                background-color:grey;
                background-image:url('https://c4.wallpaperflare.com/wallpaper/414/974/369/background-tree-board-texture-wallpaper-preview.jpg');
                background-size:cover;
             }
            .box{
                display:flex;
                flex-wrap: wrap;
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
            img{
                width: 90px;
                height:90px;
            }
            .price{
                color:red;
            }
            .name{
                color:black;
                font-size:20px;
                font-weight:bold;
            }
            .detail{
                color:black;
                width:200px;
            }
            .action{
                align-self:center;
            }
        </style>
    </head>
    <body>
        <?php
            include "menu.html";
        ?>
        
        <div class="box">
            <?php
            include_once "../Shared/connection.php";

            $fetch=mysqli_query($conn,"select * from product");

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
                            <img src='../$impath'>
                        </div>
                        <div class='detail'>$detail</div>
                        <div class='action'>
                            <button onclick='confirmedit($pid)' class='btn bg-danger'><i class='bi bi-basket'></i></button>
                        </div>
                    </div>
                ";
            }

        ?>
    </div>
        <script>

            function confirmedit(pid){

                window.location.assign("cart.php?pid="+pid);

            }
        </script>
    </body>
</html>



