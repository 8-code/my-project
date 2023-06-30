<?php
include_once "../../Shared/connection.php";

$destination="../../Shared/images/".$_FILES['imfile']['name'];

move_uploaded_file($_FILES['imfile']['tmp_name'],$destination);

session_start();
$sellerid=$_SESSION['userid'];

if(isset($_SESSION['delete'])){

    $pid=$_SESSION['delete'];

    if($pid){

        mysqli_query($conn,"delete from product where pid=$pid;");
        $_SESSION['delete']=false;
        
    }

}


$impath="Shared/images/".$_FILES['imfile']['name'];

$name=$_POST['name'];
$detail=$_POST['detail'];
$price=$_POST['price'];

mysqli_query($conn,"INSERT INTO product (name,detail,price,impath,sellerid) VALUES ('$name','$detail',$price,'$impath',$sellerid);");

echo "uploaded succesful";

header("location:view.php");

?>