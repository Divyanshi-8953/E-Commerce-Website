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