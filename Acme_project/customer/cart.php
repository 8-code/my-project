<?php

session_start();

$pid=$_GET['pid'];

echo "item added<br>";

$localcart=[];

if(isset($_SESSION['cart']))
{  

    $localcart=$_SESSION['cart'];
     
    $ind=index($pid,$localcart);

    if(isset($ind))
    {
        $localcart[$ind][1]=$localcart[$ind][1]+1;
    }

    else
    {
        array_push($localcart,[$pid,1]);
    }
}

else
{
    array_push($localcart,[$pid,1]);
}

function index($pid,$localcart)
{

    for($i=0;$i<count($localcart);$i++)
    {

        if($localcart[$i][0]==$pid)
        {
            return $i;
        }

    }

    return null;

}

$_SESSION['cart']=$localcart;

print_r($localcart);

header("location:menu.php");

?>