<!--    
        From: Coding , Date: 30-Aug-17 , Time: 8:03 PM 
        This scenario 
-->
<?php
@include_once("connect.php");

$query = "SELECT MAX(user_id) AS count FROM user";
$results = mysqli_query($dbc, $query);
$rows = mysqli_fetch_assoc($results);
$message_register = '';

if(isset($_POST['register'])){
    if(empty($_POST['name'])||empty($_POST['pass'])||empty($_POST['email'])){
        $message_register = 'Please fill in the required fields';
    }else{
        $username = mysqli_real_escape_string($dbc, trim($_POST['name']));
        $password = mysqli_real_escape_string($dbc, trim($_POST['pass']));
        $email = mysqli_real_escape_string($dbc, trim($_POST['email']));
        $user_id = $rows['count'] + 1;

        $insert_query = "INSERT INTO user(user_id, name, email, password) VALUES ('$user_id','$username','$email', '$password')";

        $result2 = mysqli_query($dbc,$insert_query);

        if(mysqli_affected_rows($dbc)==1){
            $_POST = array(); //Clear out the $_Post table
            header("location:index.php");
            $_SESSION['login_user']=$username; // Initializing Session
            $_SESSION['message_user_login']="You have been registered successfully"; // Initializing Session
        }else{
            $message_register = "User could not be added. Please try again later";
        }
    }
}

?>