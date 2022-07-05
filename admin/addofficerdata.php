<?php
    require_once "../inc/conn.php";
    $name = $_POST["name"];
    $email = $_POST["emailAddress"];
    $idNumber = $_POST["idNumber"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    if($confirmPassword != $password){
        echo '<script>alert("Password Not Same")</script>';
        header("refresh:0;url=addofficer.php?error=true");
    }

    $sql="select * from credentials WHERE email='$email'";  
    
    $run=mysqli_query($conn,$sql);  

    if(mysqli_num_rows($run)) 
    {
        echo "<script type=\"text/javascript\">alert('Account already exist')</script>";
        header('refresh:0;addofficer.php');
        die();
    }

    $registersql = "SELECT `AUTO_INCREMENT`FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '$database' AND TABLE_NAME = 'credentials'";
    $registerofficer = mysqli_query($conn, $registersql);
    if (!$registerofficer) {
        echo mysqli_error($conn);
        die();
    } 
    $credid= mysqli_fetch_array($registerofficer);

    $registersql = "INSERT INTO credentials (email, password, usertype) VALUES ('$email', '$password', '2')";
    $registerofficer = mysqli_query($conn, $registersql);
    if (!$registerofficer) {
        echo mysqli_error($conn);
        die();
  }

    $officersql = "INSERT INTO officers (off_name, offno, cred_id) VALUES ('$name', $idNumber, ".$credid[0].")";
    $succesofficer = mysqli_query($conn, $officersql);
    if (!$succesofficer) {
        echo mysqli_error($conn);
        die();
    }

    header('refresh:0;index.php');
?>