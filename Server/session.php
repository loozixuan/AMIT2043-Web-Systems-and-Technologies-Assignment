<?php
   require('mysqli_connect.php'); // Connect to the db.
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($dbc,"select name from admin where name = '{$user_check}' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['name'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:serverLogin.php");
      die();
   }
?>