<?php
    require_once "inc/conn.php";
    $name = $_POST["name"];
    $email = $_POST["emailAddress"];
    $phonenum = $_POST["phoneNumber"];
    $stuff = $_POST["studentStaff"];
    $idNumber = $_POST["idNumber"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    header('refresh:0;login.php');
?>