<?php 
// error_reporting(0);
include '../../Includes/dbcon.php';
session_start();

    if(isset($_POST['submit'])){

        $coopId =  $_SESSION['coopId'];
        $adminId =  $_SESSION['userId'];

        $catName = $_POST['catName'];
        $code = $_POST['code'];
        $description = $_POST['description'];

        $dateCreated =  date("Y-m-d");

        $query = "SELECT * FROM assetcategory WHERE coopId = '$coopId' and catName = '$catName'"; //Add Code to check if code exits
        $rs = $conn->query($query);
        $num = $rs->num_rows;
        
        if($num > 0)
        {
            echo "<script type = \"text/javascript\">
            window.location = (\"../assetsCategory.php?status=exists\")
            </script>";
        }
        else
        {
                $qry = "INSERT INTO assetcategory (coopId,adminId,catName,code,description,document,isApproved,isVerified,dateCreated) 
                                    VALUES ('$coopId','$adminId','$catName','$code','$description','','0','0','$dateCreated')";
                $res = $conn->query($qry);

                if($res === TRUE)
                {
                    echo "<script type = \"text/javascript\">
                    window.location = (\"../assetsCategory.php?status=success\")
                    </script>";
                }
                else
                {
                    echo "<script type = \"text/javascript\">
                    window.location = (\"../assetsCategory.php?status=fail\")
                    </script>";
                }
        } // end of else statement
        
    } //end of if for submit button



        ?>



