<?php
$pid=$_GET['pid'];

include_once "../../Shared/connection.php";

mysqli_query($conn,"delete from product where pid='$pid';");

header("location:view.php");

?>