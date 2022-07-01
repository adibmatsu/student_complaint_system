<?php
    session_start();
    require_once("../inc/conn.php");

    $cat = $_POST["category"];
    $loct = $_POST["location"];
    $desc = $_POST["description"];
    $date = $_POST["date"];

    $userid = $_SESSION ['userid'];

    echo $cat; 
    echo $loct; 
    echo $desc; 
    echo $date;

    $complaintsql = "INSERT INTO complaints (comp_cat, comp_loct, comp_desc, comp_date, user_id) VALUES ('$cat', '$loct', '$desc', '$date', '$userid')";
    $complaintmade = mysqli_query($conn, $complaintsql);
    if (!$complaintmade) {
        echo mysqli_error($conn);
        die();
    }

    header('refresh:0;view.php');
?>