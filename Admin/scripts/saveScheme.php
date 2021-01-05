<?php 
// error_reporting(0);
include '../../Includes/dbcon.php';
session_start();

    if(isset($_POST['submit'])){

        $coopId =  $_SESSION['coopId'];
        $adminId =  $_SESSION['userId'];

        $name = $_POST['name'];
        $code = $_POST['code'];
        $assetId = $_POST['assetId'];
        $contLevelId = $_POST['contLevelId'];
        $description = $_POST['description'];
        $noOfUnits = $_POST['noOfUnits'];
        $unitDescription = $_POST['unitDescription'];
        $amountPerUnits = $_POST['amountPerUnits'];
        $downPayment = $_POST['downPayment'];
        $recurrentPayment = $_POST['recurrentPayment'];
        $tenure = $_POST['tenure'];
        $charges = $_POST['charges'];
        $moralTorium = $_POST['moralTorium'];
        $closureDate = $_POST['closureDate'];

        $dateCreated =  date("Y-m-d");

        $query = "SELECT * FROM schemes WHERE coopId = '$coopId' and schemeName = '$name' and code = '$code' and assetId = '$assetId' and contLevelId = '$contLevelId'"; 
        $rs = $conn->query($query);
        $num = $rs->num_rows;

        $queryy = "SELECT * FROM assets WHERE coopId = '$coopId' and Id = '$assetId'"; 
        $rss = $conn->query($queryy);
        $nums = $rss->num_rows;
        $rows = $rss->fetch_assoc();
        $remSubUnits = $rows['remSubUnits'];
        
        
        if($num > 0)
        {
            echo "<script type = \"text/javascript\">
            window.location = (\"../createSchemes.php?status=exists\")
            </script>";
        }

        else if($remSubUnits == 0)
        {
            echo "<script type = \"text/javascript\">
            alert(\"No more subscription units for the selected asset!\");
            window.location = (\"../createSchemes.php?status=exists\")
            </script>";
        }
        else if($noOfUnits > $remSubUnits)
        {
            echo "<script type = \"text/javascript\">
            alert(\"No of Scheme units cannot exceed the asset subscription units!\");
            window.location = (\"../createSchemes.php?status=exists\")
            </script>";
        }
        else
        {
                $qry = "INSERT INTO schemes (coopId,adminId,assetId,contLevelId,schemeName,code,description,noOfUnits,unitDescription,amountPerUnits,downPayment,recurrentPayment,tenure,charges,moralTorium,closureDate,isApproved,isVerified,dateCreated) 
                                    VALUES ('$coopId','$adminId','$assetId','$contLevelId','$name','$code','$description','$noOfUnits','$unitDescription','$amountPerUnits','$downPayment','$recurrentPayment','$tenure','$charges','$moralTorium','$closureDate','0','0','$dateCreated')";
                $res = $conn->query($qry);

                if($res === TRUE)
                {
                     $newRemSubUnits = $remSubUnits - $noOfUnits;
                     $sql = "UPDATE assets SET remSubUnits = '$newRemSubUnits' WHERE Id ='$assetId'";
                     $ress = $conn->query($sql);
                
                        if($ress === TRUE)
                        {
                            echo "<script type = \"text/javascript\">
                            window.location = (\"../createSchemes.php?status=success\")
                            </script>";
                        }
                        else
                        {
                            echo "<script type = \"text/javascript\">
                            window.location = (\"../createSchemes.php?status=fail\")
                            </script>";
                        }
                }
                else
                {
                    echo "<script type = \"text/javascript\">
                    window.location = (\"../createSchemes.php?status=fail\")
                    </script>";
                }
        } // end of else statement
        
    } //end of if for submit button



        ?>



