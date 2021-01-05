<?php 
error_reporting(0);
include '../Includes/dbcon.php';


    if(isset($_POST['submit'])){

        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $phoneNo = $_POST['phoneNo'];
        $password = $_POST['password'];
        $conPassword = $_POST['conPassword'];

        $coopName = $_POST['coopName'];
        $coopCode = $_POST['coopCode'];
        $state = $_POST['state'];
        $lga = $_POST['lga'];
        $address = $_POST['address'];
        $userType = $_POST['userType'];
        $isLinked = $_POST['isLinked'];
    
        $dateCreated =  date("Y-m-d");

        $query = "SELECT * FROM users WHERE emailAddress = '$email'";
        $rs = $conn->query($query);
        $num = $rs->num_rows;
        
        $querys = "SELECT * FROM cooperatives WHERE name = '$coopName'";
        $rss = $conn->query($querys);
        $nums = $rss->num_rows;


        if($password != $conPassword)
        {
            echo "<script type = \"text/javascript\">
            alert(\"Password Mismatch!\");
            window.location = (\"../organizationSetup.php\")
            </script>";
        }
        
        else if($num > 0)
        {
            echo "<script type = \"text/javascript\">
            alert(\"Email Address has already been used!\");
            window.location = (\"../organizationSetup.php\")
            </script>";

        }
        else if($nums > 0)
        {
            echo "<script type = \"text/javascript\">
            alert(\"Cooperative name has already been used!\");
            window.location = (\"../organizationSetup.php\")
            </script>";
        }
        
        else
        {
            
            if($_POST['isLinked'] == 1 && $_POST['isExisting'] == 2) // if the cooperative is linked to a company and a new company is to be created
            {
                $compName = $_POST['compName'];
                $compCode = $_POST['compCode'];
                $compEmail = $_POST['compEmail'];
                $compPhone = $_POST['compPhone'];
                $compAddress = $_POST['compAddress'];
                $compState = $_POST['compState'];
                $compLga = $_POST['compLga'];
                $compSector = $_POST['compSector'];
                $compNoEmployee = $_POST['compNoEmployee'];

                $coopqry = "INSERT INTO cooperatives (name,state,lga,code,typeOfUsers,isLinkedToCompany,dateCreated) 
                                VALUES ('$coopName','$state','$lga','$coopCode','$userType','$isLinked','$dateCreated')";
                $coopress = $conn->query($coopqry);

                $comqr = "INSERT INTO company (name,emailAddress,phoneNo,state,lga,code,noOfemployees,type,dateCreated) 
                            VALUES ('$compName','$compEmail','$compPhone','$compState','$compLga','$compCode','$compNoEmployee','$compSector','$dateCreated')";
                $comres = $conn->query($comqr);

                if($coopress === TRUE && $comres == TRUE)
                {
                    $querys = "SELECT * FROM cooperatives WHERE name = '$coopName'";
                    $rslt = $conn->query($querys);
                    // $num = $rslt->num_rows;
                    $rrw = $rslt->fetch_assoc();
                    $coopId = $rrw['Id'];

                    $qs = "SELECT * FROM company WHERE name = '$compName'";
                    $rsltt = $conn->query($qs);
                    // $num = $rslt->num_rows;
                    $rrww = $rsltt->fetch_assoc();
                    $compId = $rrww['Id'];
                    
                    $userqr = "INSERT INTO users (roleId,coopId,firstName,lastName,emailAddress,address,phoneNo,password,dateCreated) 
                            VALUES ('1','$coopId','$firstName','$lastName','$email','$address','$phoneNo','$password','$dateCreated')";
                    $useres = $conn->query($userqr);

                    $mapqr = "INSERT INTO cooperativescompanymap (cooperativeId,companyId,dateCreated) 
                                VALUES ('$coopId','$compId','$dateCreated')";
                    $mapres = $conn->query($mapqr);
                        if($mapres === TRUE && $useres == TRUE )
                        {
                             
                        }
                        else
                        {
                            echo "<script type = \"text/javascript\">
                            alert(\"An Error Occurred!\");
                            </script>";
                        }

                    echo "<script type = \"text/javascript\">
                    alert(\"Created Successfully!\");
                    window.location = (\"../index.php\")
                    </script>";
                }
                else
                {
                    echo "<script type = \"text/javascript\">
                    alert(\"An Error Occurred!\");
                    </script>";
                }

            }


            else if($_POST['isLinked'] == 1 && $_POST['isExisting'] == 1) // if the cooperative is linked to a company and a comapany is to be selected from the existing companies
            {
                    $coopqry = "INSERT INTO cooperatives (name,state,lga,code,typeOfUsers,isLinkedToCompany,dateCreated) 
                                    VALUES ('$coopName','$state','$lga','$coopCode','$userType','$isLinked','$dateCreated')";
                    $coopress = $conn->query($coopqry);

                if($coopress === TRUE)
                {
                    $compId = $_POST['companyId'];

                    $querys = "SELECT * FROM cooperatives WHERE name = '$coopName'";
                    $rslt = $conn->query($querys);
                    // $num = $rslt->num_rows;
                    $rrw = $rslt->fetch_assoc();
                    $coopId = $rrw['Id'];
                    
                    $userqr = "INSERT INTO users (roleId,coopId,firstName,lastName,emailAddress,address,phoneNo,password,dateCreated) 
                            VALUES ('1','$coopId','$firstName','$lastName','$email','$address','$phoneNo','$password','$dateCreated')";
                    $useres = $conn->query($userqr);
                    
                    $mapqr = "INSERT INTO cooperativescompanymap (cooperativeId,companyId,dateCreated) 
                                VALUES ('$coopId','$compId','$dateCreated')";
                    $mapres = $conn->query($mapqr);
                        if($mapres === TRUE && $useres == TRUE)
                        {
                            
                        }
                        else
                        {
                            echo "<script type = \"text/javascript\">
                            alert(\"An Error Occurred!\");
                            </script>";
                        }
                }
                else
                {
                    echo "<script type = \"text/javascript\">
                    alert(\"An Error Occurred!\");
                    </script>";
                }

                echo "<script type = \"text/javascript\">
                alert(\"Created Successfully!\");
                window.location = (\"../index.php\")
                </script>";
            }

            else if($_POST['isLinked'] == 2) // if a cooperative is not linked to a company
            {
                    $coopqry = "INSERT INTO cooperatives (name,state,lga,code,typeOfUsers,isLinkedToCompany,dateCreated) 
                                    VALUES ('$coopName','$state','$lga','$coopCode','$userType','$isLinked','$dateCreated')";
                    $coopress = $conn->query($coopqry);

                if($coopress === TRUE)
                {
                    $querys = "SELECT * FROM cooperatives WHERE name = '$coopName'";
                    $rslt = $conn->query($querys);
                    // $num = $rslt->num_rows;
                    $rrw = $rslt->fetch_assoc();
                    $coopId = $rrw['Id'];

                    $userqr = "INSERT INTO users (roleId,coopId,firstName,lastName,emailAddress,address,phoneNo,password,dateCreated) 
                            VALUES ('1','$coopId','$firstName','$lastName','$email','$address','$phoneNo','$password','$dateCreated')";
                    $useres = $conn->query($userqr);

                    if($useres == TRUE)
                    {
                            
                    }
                    else
                    {
                        echo "<script type = \"text/javascript\">
                        alert(\"An Error Occurred!\");
                        </script>";
                    }
                }
                else
                {
                    echo "<script type = \"text/javascript\">
                    alert(\"An Error Occurred!\");
                    </script>";
                }

                echo "<script type = \"text/javascript\">
                alert(\"Created Successfully!\");
                window.location = (\"../index.php\")
                </script>";
            }


        } // end of else statement
        
    } //end of if for submit button



        ?>



