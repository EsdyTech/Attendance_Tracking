<?php 
// error_reporting(0);
include '../../Includes/dbcon.php';
session_start();

    if(isset($_POST['submit'])){

        $coopId =  $_SESSION['coopId'];
        $adminId =  $_SESSION['userId'];

        $memberId = $_POST['memberId'];
        $contLevelId = $_POST['contLevelId'];

        $dateCreated =  date("Y-m-d");

        $query = "SELECT * FROM membercontributionlevel WHERE coopId = '$coopId' and memberId = '$memberId' and contLevelId = '$contLevelId'";
        $rs = $conn->query($query);
        $num = $rs->num_rows;
        
        if($num > 0)
        {
            echo "<script type = \"text/javascript\">
            window.location = (\"../addMemberToContLevel.php?status=exists\")
            </script>";
        }
        else
        {
                $qry = "INSERT INTO membercontributionlevel (coopId,memberId,contLevelId,adminId,isApproved,isVerified,dateCreated) 
                                    VALUES ('$coopId','$memberId','$contLevelId','$adminId','0','0','$dateCreated')";
                $res = $conn->query($qry);

                if($res === TRUE)
                {
                    echo "<script type = \"text/javascript\">
                    window.location = (\"../addMemberToContLevel.php?status=success\")
                    </script>";
                }
                else
                {
                    echo "<script type = \"text/javascript\">
                    window.location = (\"../addMemberToContLevel.php?status=fail\")
                    </script>";
                }
        } // end of else statement
        
    } //end of if for submit button



        ?>



