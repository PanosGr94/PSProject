<?php

@include_once ("connect.php");

session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
$ses_sql=mysqli_query($dbc,"select name from user where name='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['name'];
if(!isset($login_session)){
    mysqli_close($dbc); // Closing Connection
    header('Location: index.php'); // Redirecting To Home Page
}
?>