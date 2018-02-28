<!--TODO-Panos: connect all the back-end files-->
<?php
/*
 * BE CAREFUL , SESSION CODE MUST GO BEFORE ALL HTML TAGS
 *
*/
error_reporting(0);
@include("includes/connect.php");
@include ("includes/login.php");
session_start();

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
    <?php if(isset($_SESSION['message_user_login'])){ ?><div class="alert alert-success" role="alert"> <?php echo $_SESSION['message_user_login']; ?> </div><?php } ?>

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
                <li><!--TODO Panos: CHECK FOR SESSION NAME EXISTANCE-->
                    <?php if(isset($_SESSION['login_html'])) echo $_SESSION['login_html']; else echo $login_html;?>
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





</body>
</html>