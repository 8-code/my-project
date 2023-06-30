<?php

session_start();

if(!isset($_SESSION['login_status'])){

    echo "unauthorised excess";
    die;

}

if(!$_SESSION['login_status']){

    echo "invalid credential";
    die;

}
include "menu.html";

echo "upload is here..";

?>

<html lang="en">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="d-flex justify-content-center align-items-center vh-100 bg-dark p-3">
    
            <form enctype="multipart/form-data" action="upload_db.php" class="bg-primary p-3" method="POST" >
                <div class="text-center">
                    <h4>UPLOAD PRODUCT</h4>
                </div>
                <input required class="form-control mt-2" type="text" placeholder="Product Name" name="name">
    
                <input required class="form-control  mt-2" min="1" type="number" name="price" placeholder="Product Price">
    
                <textarea class="form-control mt-2" name="detail" id="" cols="30" rows="10"></textarea>
    
                <input required class="form-control mt-2" type="file" name="imfile">
    
                <div class="text-center mt-3">
    
                    <button name='submit'>submit</button>
    
                </div>
    
            </form>
    
        </div>
        <script>
          
             
        </script>
    </body>
</html>