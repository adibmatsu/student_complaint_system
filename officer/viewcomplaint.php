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
        <h1 class="py-3">User Complaint Status!</h1>
        <div class = "px-5">
            <button type="button" class="btn btn-primary" onclick="location.href='/student_complaint_system/officer/index.php'">Back</button>
            <div class="container px-5 my-5">
            <table class="table">
            <thead>
                <tr>
                <th scope="col">No.</th>
                <th scope="col">Email</th>
                <th scope="col">Category</th>
                <th scope="col">Location</th>
                <th scope="col">Description</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
                <th scope="col">Approve/Deny</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                //untuk view dalam database
                //mysqli_num_rows($run)

                    //tulis code sql untuk query
                    $viewsql ="SELECT c.comp_id, cr.email, c.comp_cat, c.comp_loct, c.comp_desc, c.comp_date, c.comp_status FROM complaints AS c JOIN users AS u ON c.user_id = u.user_id JOIN credentials as cr ON u.cred_id = cr.cred_id";
                    //run sql
                    $run=mysqli_query($conn,$viewsql);
                    //kalau $run bukan true/false  
                    if(!is_bool($run)){
                        //dapatkan semua row dalam table database
                        //compuser ni semua row
                        $compuser = mysqli_fetch_all($run);
                        //kira size $compuser, kalau <= 0 maksudnya result 0
                        if (sizeof($compuser)>0){
                            //bila $i=0 selagi $i kurang daripada saiz $compuser ulang excute
                            //bila akhir execution +1 pada $i
                            for($rowno=0; $rowno<sizeof($compuser);$rowno++ ){
                                //memulakan row ini
                                echo "<tr>";
                                //$compnum sbg row number
                                $compnum=$rowno+1;
                                //keluarkan column no row
                                echo "<th scope=\"row\">".$compnum."</th>";
                                //untuk setiap column dalam row ini set kan dalam $catcomp
                                //[]untuk select
                                //foreach
                                $comp_id = $compuser[$rowno][0];
                                foreach($compuser[$rowno] as $colnum => $catcomp){
                                    if($colnum == 0) {
                                        //delete first column
                                    } else if ($colnum == 6 /*sizeof($compuser[$rowno])*/){
                                        if ($catcomp == null){
                                            $statusStr= "Not approved/rejected";
                                            echo "<td>$statusStr</td>";
                                            echo "<td><button type=\"button\" class=\"btn btn-success\" onclick=\"location.href='/student_complaint_system/officer/approvecomplaint.php?status=0&comp_id=".$comp_id."'\">Approve Complaint</button><br><button type=\"button\" class=\"btn btn-danger\" onclick=\"location.href='/student_complaint_system/officer/approvecomplaint.php?status=1&comp_id=".$comp_id."'\">Reject Complaint</button></td>";
                                        } else if($catcomp == 0){
                                            $statusStr = "Approved";
                                            echo "<td>$statusStr</td>";
                                            echo "<td>$statusStr</td>";
                                        } else if($catcomp == 1){
                                            $statusStr = "Rejected";
                                            echo "<td>$statusStr</td>";
                                            echo "<td>$statusStr</td>";
                                        }
                                        
                                    } else {
                                        echo "<td>$catcomp</td>";

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