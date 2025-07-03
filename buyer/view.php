<html>
    <head>
        <style>
            .pdt-card{
                width:250px;
                height: fit-content;
                display: inline-block;
                margin:10px;
                vertical-align: 10px;
                background-color: lightcoral;
                padding: 10px;
            }

            .pdt-img{
                width: 100%;
                height: 70%;

            }

            .name{
                font-size: 24px;
                font-weight: bold;
            }

            .price{
                font-size: 25px;
                color: darkolivegreen;

            }

            .price::after{
                content: " Rs";
                font-size: 14px;
            }
        </style>
    </head>
</html>


<?php

include "authguard.php";
include "menu.html";

include "../shared/connection.php";

$sql_result=mysqli_query($conn,"select *from cart join product on product.pid=cart.pid where userid=$_SESSION[userid]");


$total=0;
while($dbrow=mysqli_fetch_assoc($sql_result)){
    //  print_r($dbrow);
    //  echo "<br>";
    $total+=$dbrow['price'];

    echo "<div class='pdt-card'>
           <div class= 'name'>$dbrow[name]</div>
           <div class='price'>$dbrow[price]</div>
           <img class='pdt-img' src='$dbrow[Impath]'>
           <div class='detail'>$dbrow[detail]</div>
           <div class='text-center'>
                <a href='deletecart.php?cartid=$dbrow[cartid]'>
                <button class='btn btn-danger'>Remove from Cart</button>
                </a>
                </div>
           </div>";
}

echo "
    <div>
        <div class='display-2'>
            Place Order : $total
        </div>
        <a href='order.php'>
        <button class='btn btn-success'>Buy</button>
        </a>
    </div>";
?>