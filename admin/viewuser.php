<?php
    session_start();
    include("../inc/conn.php");
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    </head>
    <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <?php include "../inc/header.php" ?>
        <h1 class="py-3">User List!</h1>
        <div class = "px-5">
            <button type="button" class="btn btn-primary" onclick="location.href='/student_complaint_system/admin/index.php'">Back</button>
            <div class="container px-5 my-5">
            <table class="table">
            <thead>
                <tr>
                <th scope="col">No.</th>
                <th scope="col">Email</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">ID Number</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                //untuk view user dalam database
                //mysqli_num_rows($run)

                    $viewuser ="SELECT cr.email, u.user_name, u.telno, u.studno, u.staffno FROM users AS u JOIN credentials AS cr ON cr.cred_id = u.cred_id";
                    $run=mysqli_query($conn,$viewuser);
                    if(!is_bool($run)){
                        $viewuser = mysqli_fetch_all($run);
                        if (sizeof($viewuser)>0){
                            for($i=0; $i<sizeof($viewuser);$i++ ){
                                echo "<tr>";
                                $viewnum=$i+1;
                                echo "<th scope=\"row\">".$viewnum."</th>";
                                foreach($viewuser[$i] as $catview){
                                    if ($catview != null){       
                                        echo "<td>$catview</td>";
                                    }

                                }
                                echo "</tr>";
                            }
                        } else {
                            //run bila ada erro
                            echo "<tr>";
                            echo "<td style = \"text-align: center;\" colspan = \"5\">Doesn't Have Complaint Yet!</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr>";
                        echo "<td style = \"text-align: center;\" colspan = \"5\">Error Occured</td>";
                        echo "</tr>";
                    }
                
                ?>
            </tbody>
            </table>
        </div>
    </body>
</html>