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