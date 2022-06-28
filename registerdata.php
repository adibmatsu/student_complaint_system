<?php
    require_once "inc/conn.php";
    $name = $_POST["name"];
    $email = $_POST["emailAddress"];
    $phonenum = $_POST["phoneNumber"];
    $stuff = $_POST["studentStaff"];
    $idNumber = $_POST["idNumber"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    if($confirmPassword != $password){
        echo '<script>alert("Password Not Same")</script>';
        header("refresh:0;url=register.php?error=true");
    }

    $sql="select * from credentials WHERE email='$email'";  
    
    $run=mysqli_query($conn,$sql);  

    if(mysqli_num_rows($run)) 
    {
        echo "<script type=\"text/javascript\">alert('Account already exist')</script>";
        header('refresh:0;register.php');
        die();
    }

    $registersql = "SELECT `AUTO_INCREMENT`FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '$database' AND TABLE_NAME = 'credentials'";
    $registeruser = mysqli_query($conn, $registersql);
    if (!$registeruser) {
        echo mysqli_error($conn);
        die();
    } 
    $credid= mysqli_fetch_array($registeruser);

    $registersql = "INSERT INTO credentials (email, password, usertype) VALUES ('$email', '$password', $stuff)";
    $registeruser = mysqli_query($conn, $registersql);
    if (!$registeruser) {
        echo mysqli_error($conn);
        die();
  }

    if ($stuff==0){
        //student
        $userssql = "INSERT INTO users (user_name, telno, studno, cred_id) VALUES ('$name', $phonenum, $idNumber, ".$credid[0].")";
        $succesuser = mysqli_query($conn, $userssql);
        if (!$succesuser) {
            echo mysqli_error($conn);
            die();
        }
    }
    else if ($stuff==1){
        //staff
        $userssql = "INSERT INTO users (user_name, telno, staffno, cred_id) VALUES ('$name', $phonenum, $idNumber, ".$credid[0].")";
        $succesuser = mysqli_query($conn, $userssql);
        if (!$succesuser) {
            echo mysqli_error($conn);
            die();
        }

    }
    header('refresh:0;login.php');
?>