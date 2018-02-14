<?php

DEFINE(DB_HOST,'localhost');
DEFINE(DB_USER,'root');
DEFINE(DB_PASS,'');
DEFINE(DB_NAME,'pliroforiaka_system');
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME)
OR die('There has been an error with the connection'.mysqli_connect_error());

$message = "The connection has been established."
?>
