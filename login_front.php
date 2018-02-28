
<?php
@include("includes/connect.php");
session_start();
@include ("includes/login.php");
@require ("includes/register.php");
//@include ("includes/session.php");

?>


<html>
<head>
    <title> Login Page </title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>

</head>


<body>

<div class="container" style="margin-top: 200px;">
    <div class="row align-items-center">
        <div class="col-md-6">
            <form id="register" action="login_front.php" method="post">
                <label>Name</label>
                <input type="text" name="name" id="reg_name" maxlength="40" required><br><br>
                <label>Email</label>
                <input type="email" name="email" id="reg_email" maxlength="40" required><br><br>
                <label>Password</label>
                <input type="password" name="pass" id="reg_pass" maxlength="40" required><br><br>
                <input type="submit" name="register" value="Register">
            </form>
        </div>
        <div class="col-md-6">
            <form id="loginForm" action="login_front.php" method="post">
                    <label>Email</label>
                    <input type="email" name="email" id="userEmail"><br>
                    <label>Password</label>
                    <input type="password" name="pass" id="userPassword"><br><br>
                    <input type="submit" name="login" value="Log In">
            </form>
        </div>
    </div>


</div>


</body>

</html>