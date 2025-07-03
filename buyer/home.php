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
include "../shared/connection.php";
include "menu.html";

$sql_result=mysqli_query($conn,"select * from product");

while($dbrow=mysqli_fetch_assoc($sql_result)){
    //  print_r($dbrow);
    //  echo "<br>";

    echo "<div class='pdt-card'>
           <div class= 'name'>$dbrow[name]</div>
           <div class='price'>$dbrow[price]</div>
           <img class='pdt-img' src='$dbrow[Impath]'>
           <div class='detail'>$dbrow[detail]</div>
           <div class='text-center'>
                <a href='addcart.php?pid=$dbrow[pid]'>
                <button class='btn btn-primary'>Add to Cart</button>
                </a>
                </div>
           </div>";
}
?>