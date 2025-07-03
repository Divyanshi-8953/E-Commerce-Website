<?php

print_r($_POST);

include "connection.php";

mysqli_query($conn,"insert into user(username,password,usertype) values ('$_POST[username]','$_POST[password]','$_POST[usertype]')");

header("Location:login.html");
?>