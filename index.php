<!--TODO-Panos: connect all the back-end files-->
<?php
/*
 * BE CAREFUL , SESSION CODE MUST GO BEFORE ALL HTML TAGS
 *
*/
error_reporting(0);

@include("includes/connect.php");
session_start();
@include ("includes/login.php");
@include ("includes/register.php");
//@include ("includes/session.php");
//@include ("includes/logout.php");

/*2018

  if(isset($_SESSION['login_user'])){
      header("location: addevent.php");
  }
*/
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <title>Event Booking HomePage</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span><span class="icon-bar"></span> 
				</button>
				<a class="navbar-brand" href="index.php"><img src="img/logo.jpg"></a>
			</div>
			<div class="collapse navbar-collapse" id="#myNavbar">
			<ul class="nav navbar-nav navbar-right">
				<li ><a href="#">Events List</a></li>
				<li ><a href="#">Book Event</a></li>
				<li ><a href="#">Contact</a></li>

<!--TODO-Panos : Added li for login -->
                <li>
                    <div class="dropdown" >
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <!--TODO Panos: CHECK FOR SESSION NAME EXISTANCE-->
                            <?php if(isset($_SESSION['login_user'])) echo '<p>'.$_SESSION['login_user'].'</p>'; else echo '<i class="fa fa-user"></i>'?>

                        </button>
                        <div class="dropdown-menu  dropdown-menu-right" style="padding:20px;">
                            <form class="px-4 py-3">
                                <div class="form-group">
                                    <label for="userEmail">Email address</label>
                                    <input type="email" name="email" id="userEmail" placeholder="email@example.com">
                                </div>
                                <div class="form-group">
                                    <label for="userPassword">Password</label>
                                    <input type="password" name="pass" id="userPassword" placeholder="Password">
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn-primary btn btn-sm">Sign in</button>
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-secondary btn-sm">Sign up</button>
                                    </div>
                                </div>


                            </form>

                            <div class="dropdown-divider" style="margin:25px;"></div>
<!--
Show this if user is logged in -->
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn-danger btn btn-sm">Logout</button>
                                </div>
                            </div>


                        </div>

                    </div>

                </li>


            </ul>



		</div>
	</nav>
	
	<div id="myCarousel" class="carousel slide" data-ride="carousel"> 
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1" ></li>
			<li data-target="#myCarousel" data-slide-to="2" ></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="item active">
			<img src="img/mountains.png">
			<div class="carousel-caption">
				<h1>Event</h1>
				<br>
				<button type="button" class="btn bt-default">Get ticket</button>
			</div>
		</div> <!-- End Active -->
		<div class="item">
			<img src="img/snow.png">
		</div>
		<div class="item">
			<img src="img/red.png">
		</div>
		</div>
		<!-- Start Slider Controls -->
		<a class="left carousel-control" href="#myCarousel" role=button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role=button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
		</a>
	</div><!-- End Slider -->

<!--TODO Panos: div to show informative message & more below this by Panos -->
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-primary"><?php $message ?></h3>
        </div>
    </div>

    <div class="modal fade" id="logInModal" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">MODAL FORM FOR SIGN UP</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <form id="loginForm" action="index.php" method="post">
                                <div class="row">
                                    <div class="col-md-10">
                                        <label>Email</label>
                                        <input type="mail" name="email" id="userEmail" placeholder="email@example.com">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10">
                                        <label>Password</label>
                                        <input type="password" name="pass" id="userPassword" placeholder="Password">
                                    </div>

                                </div>
                                <a href="#" class="col-md-offset-2" onClick="">No account?</a>

                                <input type="submit" class="btn btn-primary" name="login" value="Log In">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </form>
                        </div>

                    </div>


                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>



</body>
</html>