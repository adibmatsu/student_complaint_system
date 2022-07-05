<?php
    require_once "../inc/conn.php";
    $name = $_POST["name"];
    $email = $_POST["emailAddress"];
    $idNumber = $_POST["idNumber"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    if($confirmPassword != $password){
        echo '<script>alert("Password Not Same")</script>';
        header("refresh:0;url=addadmin.php?error=true");
    }

    $sql="select * from credentials WHERE email='$email'";  
    
    $run=mysqli_query($conn,$sql);  

    if(mysqli_num_rows($run)) 
    {
        echo "<script type=\"text/javascript\">alert('Account already exist')</script>";
        header('refresh:0;addadmin.php');
        die();
    }

    $registersql = "SELECT `AUTO_INCREMENT`FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '$database' AND TABLE_NAME = 'credentials'";
    $registeradmin = mysqli_query($conn, $registersql);
    if (!$registeradmin) {
        echo mysqli_error($conn);
        die();
    } 
    $credid= mysqli_fetch_array($registeradmin);

    $registersql = "INSERT INTO credentials (email, password, usertype) VALUES ('$email', '$password', '3')";
    $registeradmin = mysqli_query($conn, $registersql);
    if (!$registeradmin) {
        echo mysqli_error($conn);
        die();
  }

    $adminsql = "INSERT INTO admins (ad_name, adminno, cred_id) VALUES ('$name', $idNumber, ".$credid[0].")";
    $succesadmin = mysqli_query($conn, $adminsql);
    if (!$succesadmin) {
        echo mysqli_error($conn);
        die();
    }

    header('refresh:0;index.php');
?>