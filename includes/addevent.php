<!--    
        From: phpUnipi , Date: 21-Nov-17 , Time: 3:53 PM 
        This scenario 
-->

<?php


$query = "SELECT MAX(event_id) AS count FROM event";
$results = mysqli_query($dbc, $query);
$rows = mysqli_fetch_assoc($results);
$message = 'addevent is connected!';
if (isset($_POST['addevent'])) {
    $test_date = $_POST['event_date'];
    $date = DateTime::createFromFormat('d/m/Y', $test_date);
    $date_errors = DateTime::getLastErrors();
    if ($date_errors['warning_count'] + $date_errors['error_count'] == 0) {
        $message = "Date is invalid";
        if (empty($_POST['event_title'])) {
            $message = "Title is invalid";
        }
    } else {
        $message = "ready to read values";
        echo $message;
        $title = mysqli_real_escape_string($dbc, trim($_POST['event_title']));
        $short = mysqli_real_escape_string($dbc, trim($_POST['short_description']));
        $full = mysqli_real_escape_string($dbc, trim($_POST['full_description']));
        $date = mysqli_real_escape_string($dbc, trim($_POST['event_date']));
        $time = mysqli_real_escape_string($dbc, trim($_POST['event_time']));
        $price = mysqli_real_escape_string($dbc, trim($_POST['event_ticket']));
        $seats = mysqli_real_escape_string($dbc, trim($_POST['event_seats']));
        $event_id = $rows['count'] + 1;
//        $event_id = 1;
        $viewable = "True";

        $insert_query = "INSERT INTO event VALUES('$event_id','$title','$viewable','$full','$short','$date','$time','$price','$seats')";
        $results = mysqli_query($dbc, $insert_query);
        $rows = mysqli_fetch_array($results);

        if (mysqli_affected_rows($dbc) == 1) {
            $_POST = array(); //Clear out the $_Post table
            header("location: main.php"); // Redirecting To Other Page
            $message = "Event has been added";
        } else {
            $message = "There was some mistake adding the event";
        }

        echo $message;
    }
}


?>
