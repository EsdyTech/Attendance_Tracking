<?php 
// error_reporting(0);
include '../../Includes/dbcon.php';
session_start();

    if(isset($_POST['submit'])){

        $coopId =  $_SESSION['coopId'];
        $adminId =  $_SESSION['userId'];

        $name = $_POST['name'];
        $code = $_POST['code'];
        $description = $_POST['description'];
        $assetCatId = $_POST['assetCatId'];
        $depRate = $_POST['depRate'];
        $depYears = $_POST['depYears'];
        $depType = $_POST['depType'];
        $subUnits = $_POST['subUnits'];
        $purchaseType = $_POST['purchaseType'];


        $dateCreated =  date("Y-m-d");

        $query = "SELECT * FROM assets WHERE coopId = '$coopId' and assetName = '$name' and code = '$code'"; 
        $rs = $conn->query($query);
        $num = $rs->num_rows;
        
        if($num > 0)
        {
            echo "<script type = \"text/javascript\">
            window.location = (\"../createAssets.php?status=exists\")
            </script>";
        }
        else
        {
                $qry = "INSERT INTO assets (coopId,adminId,assetCatId,assetName,code,description,depRate,depYears,depType,subUnits,remSubUnits,purchaseType,isApproved,isVerified,dateCreated) 
                                    VALUES ('$coopId','$adminId','$assetCatId','$name','$code','$description','$depRate','$depYears','$depType','$subUnits','$subUnits','$purchaseType','0','0','$dateCreated')";
                $res = $conn->query($qry);

                if($res === TRUE)
                {
                    echo "<script type = \"text/javascript\">
                    window.location = (\"../createAssets.php?status=success\")
                    </script>";
                }
                else
                {
                    echo "<script type = \"text/javascript\">
                    window.location = (\"../createAssets.php?status=fail\")
                    </script>";
                }
        } // end of else statement
        
    } //end of if for submit button



        ?>



