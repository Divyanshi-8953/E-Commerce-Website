<!-- Inter Php -->

<?php 

$hostname="localhost";
$username="root";
$password="";
$dbname="sql_dbs";
$port=3306;

//Php is running inside Apache Server.
// A way to connect php server to a sql database-->
//Open MySQL from xampp &get the user details and enter them in php serevr as shown above
//Mysqli is a class, we make an object of this class and enter the user details to the object class.
//Run on browser as localhost to establish a successful connection.

$conn= new mysqli($hostname,$username,$password,$dbname,$port);

// print_r($conn);


mysqli_query($conn, "insert into student(name,age,gender,total) values('Radha',22,'F',21.0)");

//mysqli_query($conn,"delete from student where name='Ram'");

$sql_result=mysqli_query($conn,"select * from student");
print_r($sql_result);

// $dbrow=mysqli_fetch_assoc($sql_result);
// print_r($dbrow);

while ($dbrow=mysqli_fetch_assoc($sql_result)){
    echo "<br>";
    print_r($dbrow);
}

// echo "<br><br> Connection Success";

?>


<?php
   session_start();
   if(!isset($_SESSION['login_status'])){
        echo "You skipped the login..";
        echo "<br><a href='../shared/login.html'>Login Here</a>";
        die;
   }

   if ($_SESSION['login_status']==false){
        echo "Unauthorized Attempt";
        echo "<br><a href='../shared/login.html'>Login Here</a>";
        die;
   }

   echo "<div style='display:flex; justify-content:space-around'>
          <div style='background-color: cyan'>$_SESSION[usertype]</div>
          <div>$_SESSION[username]</div>
          </div>";


   //Identify the security Loophole.
?>

<?php
   session_start();
   if(!isset($_SESSION['login_status'])){
        echo "You skipped the login..";
        echo "<br><a href='../shared/login.html'>Login Here</a>";
        die;
   }

   if ($_SESSION['login_status']==false){
        echo "Unauthorized Attempt";
        echo "<br><a href='../shared/login.html'>Login Here</a>";
        die;
   }

   echo "<div style='display:flex; justify-content:space-around'>
          <div style='background-color: cyan'>$_SESSION[usertype]</div>
          <div>$_SESSION[username]</div>
          </div>";


   //Identify the security Loophole.
?>

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

<!-- Home From Buyer -->

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

<!-- Home from Seller -->

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


<!-- Upload from Seller -->

<?php

session_start();

print_r($_POST);

echo "<br>";

print_r($_FILES);

// echo "<br>".$_FILES['pdtimg']['name'];

$source=$_FILES['pdtimg']['tmp_name'];
// $target=$_FILES['pdtimg']['name'];

// Since the correct db or the correct folder name is not given the server will transfer the file to the current location.

$target="../shared/images/".$_FILES['pdtimg']['name'];

move_uploaded_file($source,$target);

$conn= new mysqli("localhost","root","","sql_dbs",3306);


// TASK - Add logged in user id for the owner field
// $ownerid= mysqli_query($conn,"select userid FROM user WHERE username='$_POST[username]' and password='$_POST[password]'");
// The error in this line is that the form action action is only connected to login.php so this $conn cannot access the user table from database.

$sql_status=mysqli_query($conn,"insert into product(name,price,detail,Impath,ownerID) values('$_POST[name]',$_POST[price],'$_POST[detail]','$target',$_SESSION[userid])");

if($sql_status){
    echo "Product Uploaded Successfully";
}
else{
    echo "Error in SQL".mysqli_error($conn);
}
?>

<!-- View from Seller -->

<?php

include "authguard.php";
include "../shared/connection.php";
include "menu.html";

$sql_result=mysqli_query($conn,"select * from product where ownerID=$_SESSION[userid]");

while($dbrow=mysqli_fetch_assoc($sql_result)){
    //  print_r($dbrow);
    //  echo "<br>";

    echo "<div class='pdt-card'>
           <div class= 'name'>$dbrow[name]</div>
           <div class='price'>$dbrow[price]</div>
           <img class='pdt-img' src='$dbrow[Impath]'>
           <div class='detail'>$dbrow[detail]</div>
           </div>";
}
?>


<!-- Login Page Backnd -->

<?php 

session_start();

$_SESSION['login_status']=False;

include "connection.php";

$query="select * from user where username='$_POST[username]' and password='$_POST[password]'";
//echo $query;

// By using SQL query, we can extract the data and check if any row is present using the same id and password.
$sql_result=mysqli_query($conn,$query);
//echo "<br>";
//print_r($sql_result);

if($sql_result->num_rows>0){
    echo "Login Success";

    $_SESSION['login_status']=True;

    $dbrow=mysqli_fetch_assoc($sql_result);
    print_r($dbrow);


    $_SESSION['userid']=$dbrow['userid'];
    $_SESSION['usertype']=$dbrow['usertype'];
    $_SESSION['username']=$dbrow['username'];
    

    //REDIRECTION TO ANOTHER PAGE->
    if($dbrow["usertype"]=="Seller"){
        header("location:../seller/home.php");
    }
    else if($dbrow["usertype"]=="Buyer"){
        header("location:../buyer/home.php");
    }
}

else{
    echo "<h2>Invalid Credentials</h2>";
}

//The only issue with this login and create account system is that an account with multiple passwords can be made.
?>