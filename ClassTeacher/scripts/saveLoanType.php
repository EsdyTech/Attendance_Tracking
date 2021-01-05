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
        $rate = $_POST['rate'];
        $interestRate = $_POST['interestRate'];
        $penalty = $_POST['penalty'];
        $penaltyRate = $_POST['penaltyRate'];
        $penaltyChangeable = $_POST['penaltyChangeable'];
        $penaltyCharge = $_POST['penaltyCharge'];
        $downPayment = $_POST['downPayment'];
        $minAmount = $_POST['minAmount'];
        $maxAmount = $_POST['maxAmount'];
        $maxTenure = $_POST['maxTenure'];
        $maxDuration = $_POST['maxDuration'];
        $moraltorium = $_POST['moraltorium'];
        $moraltoriumChangeable = $_POST['moraltoriumChangeable'];

        $dateCreated =  date("Y-m-d");

        $query = "SELECT * FROM loantypes WHERE coopId = '$coopId' and loanName = '$name' and code = '$code'"; 
        $rs = $conn->query($query);
        $num = $rs->num_rows;

        if($num > 0)
        {
            echo "<script type = \"text/javascript\">
            window.location = (\"../createLoanType.php?status=exists\")
            </script>";
        }

        else
        {
                $qry = "INSERT INTO loantypes (coopId,adminId,loanName,code,description,rate,interestRate,penalty,penaltyRate,penaltyChangeable,penaltyCharge,downPayment,minAmount,maxAmount,maxTenure,maxDuration,moraltorium,moraltoriumChangeable,isApproved,isVerified,dateCreated) 
                                    VALUES ('$coopId','$adminId','$name','$code','$description','$rate','$interestRate','$penalty','$penaltyRate','$penaltyChangeable','$penaltyCharge','$downPayment','$minAmount','$maxAmount','$maxTenure','$maxDuration','$moraltorium','$moraltoriumChangeable','0','0','$dateCreated')";
                $res = $conn->query($qry);

                if($res === TRUE)
                {
                    echo "<script type = \"text/javascript\">
                    window.location = (\"../createLoanType.php?status=success\")
                    </script>";
                }
                else
                {
                    echo "<script type = \"text/javascript\">
                    window.location = (\"../createLoanType.php?status=fail\")
                    </script>";
                }
        } // end of else statement
        
    } //end of if for submit button



        ?>



