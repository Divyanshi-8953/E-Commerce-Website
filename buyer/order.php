<?php 

include "authguard.php";
include "../shared/connection.php";
include "menu.html";


mysqli_query($conn,"insert into order_table(userid) values ($_SESSION[userid])");
mysqli_query($conn,"select * from order_table join cart on order_table.userid=cart.userid");


echo "<div>
        <h2>Your Order has been Placed!</h2>
        </div>
        ";

?>