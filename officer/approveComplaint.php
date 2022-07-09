<?php
    session_start();
    require_once "../inc/conn.php";

    $officerId = $_SESSION["officerid"];
    $status = $_GET["status"];
    $compId = $_GET["comp_id"];

    //update complaint table
    //sql untuk update complaint
    $sql = "UPDATE complaints SET comp_status = $status, officer_id = $officerId WHERE comp_id = $compId";
    $run=mysqli_query($conn,$sql);
    if(!$run){
        echo mysqli_error($conn);
        die();
    }
    header('refresh:0;viewcomplaint.php');
?>