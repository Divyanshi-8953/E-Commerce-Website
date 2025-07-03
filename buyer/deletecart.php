<?php

include "authguard.php";

include "../shared/connection.php";

$cartid=$_GET['cartid'];

mysqli_query($conn,"delete from cart where cartid=$cartid");

header("location:view.php");
?>