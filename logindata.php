<?php  
  session_start();
  include("inc/conn.php");  
    
  if($_SERVER["REQUEST_METHOD"] == "POST")  
  {  
      $email=$_POST['emailAddress'];  
      $password=$_POST['password'];  
    
      $sql="select * from credentials WHERE email='$email' AND password='$password'";  
    
      $run=mysqli_query($conn,$sql);  
    
      if(mysqli_num_rows($run)) 
      {
          $_SESSION['email']=$email;
          $resUser = mysqli_fetch_all($run);
          $resUser = $resUser[0];
          $credId = $resUser[0];
          $resUser = $resUser[3];
          $_SESSION['credid']=$credId;
          print_r($resUser);

          if(is_numeric($resUser)){
            if($resUser == 0 || $resUser == 1){
              //student or staff
              $sql="select * from users WHERE cred_id='$credId'";
              $run=mysqli_query($conn,$sql);
              $result = mysqli_fetch_all($run);
              $result = $result[0];
              $userId = $result[0];
              $_SESSION['userid']=$userId;

              header('refresh:0;user/index.php');
            } 
            else if ($resUser == 2){
              //officer
              $sql="select * from officers WHERE cred_id='$credId'";
              $run=mysqli_query($conn,$sql);
              $result = mysqli_fetch_all($run);
              $result = $result[0];
              $officerId = $result[0];
              $_SESSION['officerid']=$officerId;

              header('refresh:0;officer/index.php');
            } 
            else if ($resUser == 3){
              //admin
              $sql="select * from admins WHERE cred_id='$credId'";
              $run=mysqli_query($conn,$sql);
              $result = mysqli_fetch_all($run);
              $result = $result[0];
              $adminId = $result[0];
              $_SESSION['adminid']=$adminId;
           
              header('refresh:0;admin/index.php');
            } 
            else {
              echo "<script type=\"text/javascript\">alert('Invalid userType! userType must be 0 to 3')</script>";
              header('refresh:0;login.php');
              die();
            }
          } else {
            echo "<script type=\"text/javascript\">alert('userType is not numeric!')</script>";
            header('refresh:5;login.php');
            die();
          }
      }
      else  
      {  
        echo "<script type=\"text/javascript\">alert('Email or password is incorrect!')</script>";
        header('refresh:0;login.php');
        die();
      }  
  }
?>  