<?php
    require_once "inc/conn.php";
    $cat = $_POST["category"];
    $loct = $_POST["location"];
    $desc = $_POST["description"];
    $date = $_POST["date"];

    $complaintsql = "INSERT INTO complaints (comp_cat, comp_loct, comp_desc, comp_date) VALUES ($cat, '$loct', '$desc', $date)";
    $complaintmade = mysqli_query($conn, $complaintsql);
    if (!$complaintmade) {
        echo mysqli_error($conn);
        die();
    }

    

    header('refresh:0;login.php');
?>