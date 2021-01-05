<?php 
// error_reporting(0);
include '../../Includes/dbcon.php';
session_start();

    if(isset($_POST['submit'])){

        $coopId =  $_SESSION['coopId'];
        $adminId =  $_SESSION['userId'];

        $name = $_POST['name'];
        $code = $_POST['code'];
        $amount = $_POST['amount'];
        $description = $_POST['description'];
        $isDividend = $_POST['isDividend'];
       
        $dateCreated =  date("Y-m-d");

        $query = "SELECT * FROM contributionlevel WHERE levelName = '$name' and code = '$code'";
        $rs = $conn->query($query);
        $num = $rs->num_rows;
        
        if($num > 0)
        {
            echo "<script type = \"text/javascript\">
            window.location = (\"../ContributionLevel.php?status=exists\")
            </script>";
        }
        else
        {
                $qry = "INSERT INTO contributionlevel (coopId,adminId,levelName,code,amount,description,isDividend,isApproved,isVerified,dateCreated) 
                                    VALUES ('$coopId','$adminId','$name','$code','$amount','$description','$isDividend','0','0','$dateCreated')";
                $res = $conn->query($qry);

                if($res === TRUE)
                {
                    echo "<script type = \"text/javascript\">
                    window.location = (\"../ContributionLevel.php?status=success\")
                    </script>";
                }
                else
                {
                    echo "<script type = \"text/javascript\">
                    window.location = (\"../ContributionLevel.php?status=fail\")
                    </script>";
                }
        } // end of else statement
        
    } //end of if for submit button



        ?>



