<?php
    session_start();
    session_destroy();
    header("refresh:0;url=/student_complaint_system/index.php");
?>