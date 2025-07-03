<?php 


include "authguard.php";
include "../shared/connection.php";
include "menu.html";

print_r(mysqli_query($conn,"select * from order_table join cart on order_table.userid=cart.userid"));
$sql_result=mysqli_query($conn,"select * from order_table");

while($dbrow=mysqli_fetch_assoc($sql_result)){
      print_r($dbrow);
      echo "<br>";
}
?>