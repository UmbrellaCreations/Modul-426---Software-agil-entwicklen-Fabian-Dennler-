<?php
$a = session_id();
if(empty($a)) session_start();

   include('../inc/connect.php');
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($link,"select username from login where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }
?>