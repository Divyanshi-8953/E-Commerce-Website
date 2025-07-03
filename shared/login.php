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