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