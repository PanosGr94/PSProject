<?php
//@include_once ("connect.php");

session_start(); // Starting Session
$message=''; // Variable To Store Error Message
if (isset($_POST['login'])) {
    if (empty($_POST['email']) || empty($_POST['pass'])) {
        $message = "Email or Password is invalid";
    }
    else
    {
        $email = mysqli_real_escape_string($dbc, ($_POST['email']));
        $pass = mysqli_real_escape_string($dbc, ($_POST['pass']));

        $query = "SELECT name FROM user WHERE email = '$email' AND password = '$pass';";
        $results = mysqli_query($dbc, $query);
        $rows = mysqli_fetch_array($results);

        if(mysqli_num_rows($results)==1){
            $_SESSION['login_user']=$rows['name']; // Initializing Session
            header("location: main.php"); // Redirecting To Other Page
            $message = "User ".$_SESSION['login_user']." has been logged in!";
        } else {
            $message = "Username or Password is invalid in login.php , ".$rows[0]." , ".$email." , ".$pass;
        }
    }
}

?>
