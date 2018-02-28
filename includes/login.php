<?php
//@include_once ("connect.php");

session_start(); // Starting Session
$message=''; // Variable To Store Error Message

$login_html ='<button class="btn btn-secondary" type="button" 
                                onclick="location.href=\'login_front.php\';">'
    .'Login'.'</button>';

if (isset($_POST['login'])) {
    unset($_SESSION['login_html']);
    if (empty($_POST['email']) || empty($_POST['pass'])) {
        $message = "Email or Password is invalid";
    } else {
        $email = mysqli_real_escape_string($dbc, ($_POST['email']));
        $pass = mysqli_real_escape_string($dbc, ($_POST['pass']));

        $query = "SELECT name FROM user WHERE email = '$email' AND password = '$pass';";
        $results = mysqli_query($dbc, $query);
        $rows = mysqli_fetch_array($results);

        if (mysqli_num_rows($results) == 1) {
            $_SESSION['login_user'] = $rows['name']; // Initializing Session
            header("location: index.php"); // Redirecting To Other Page

            $_SESSION['login_html'] = '<div class="dropdown">
                          <button class="btn btn-secondary dropdown-toggle" type="button" 
                          id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          ' . '<p>' . $_SESSION['login_user'] . '</p>' .
                '</button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <button class="btn btn-danger dropdown-item" onclick="location.href=\'includes/logout.php\';">Logout</button>
                          </div>
                        </div>';
            $_SESSION['message_user_login'] = "User " . $_SESSION['login_user'] . " has been logged in!";
        } else {
            $message = "Username or Password is invalid in login.php , " . $rows[0] . " , " . $email . " , " . $pass;
        }
    }
}

?>
