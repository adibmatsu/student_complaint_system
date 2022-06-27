<?php  
session_start();
include("inc/conn.php");  
  
if(isset($_POST['submit']))  
{  
    $email=$_POST['email'];  
    $password=$_POST['password'];  
  
    $sql="select * from credentials WHERE email='$email' AND password='$password'";  
  
    $run=mysqli_query($conn,$sql);  
  
    if(mysqli_num_rows($run))  
    {  
        echo "<script>window.open('mainpageadmin.php','_self')</script>";  
  
        $_SESSION['email']=$email;
  
    }  
    else  
    {  
      echo "<script>alert('Email or password is incorrect!')</script>";  
    }  
}
header('refresh:0;user/index.php')  
?>  