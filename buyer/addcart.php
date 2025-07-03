<?php

include "authguard.php";

$pid=$_GET['pid'];

include "../shared/connection.php";

mysqli_query($conn,"insert into cart(userid,pid) values($_SESSION[userid],$pid)");

header("location:home.php");
?>