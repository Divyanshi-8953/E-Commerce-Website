<?php

include "authguard.php";
include "menu.html";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
    </head>
    <body>
       
    <div class="d-flex justify-content-center align-items-center vh-100">
        <form action="upload.php" method="post" class="w-50 bg-info p-3" enctype="multipart/form-data">
            <h3 class="text-center text-white">Upload Products Here..</h3>
            <input class="form-control mt-3" type="text" placeholder="Product Name" name="name">
            <input class="form-control mt-3" type="number" placeholder="Product Price" name="price">
            <textarea class="form-control mt-2" name="detail" placeholder="Product Description" cols="20" rows="4"></textarea>

            <input class="form-control mt-2" type="file" name="pdtimg" accept=".jpg, .png ">
            
            <div class="mt-3 text-center">
                <button class="btn btn-danger">Upload</button>
            </div>
        </form>

    </div>
    </body>
</html>