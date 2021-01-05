<?php 
error_reporting(0);
include '../../Includes/dbcon.php';
session_start();


    if(isset($_POST['submit'])){

        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $phoneNo = $_POST['phoneNo'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $state = $_POST['state'];
        $city = $_POST['city'];
        $address = $_POST['address'];
        $lga = $_POST['lga'];

        $nFirstName = $_POST['nFirstName'];
        $nLastName = $_POST['nLastName'];
        $nEmail = $_POST['nEmail'];
        $nPhoneNo = $_POST['nPhoneNo'];
        $nGender = $_POST['nGender'];
        $nDob = $_POST['nDob'];
        $nState = $_POST['nState'];
        $nAddress = $_POST['nAddress'];
        $nRelationship = $_POST['nRelationship'];

        $bankName = $_POST['bankName'];
        $acctName = $_POST['acctName'];
        $acctNo = $_POST['acctNo'];
        $paymentType = $_POST['paymentType'];


        $coopAccountId = $_SESSION['coopId'];
        $userType = $_POST['userType'];
        $dateCreated =  date("Y-m-d");


        $query = "SELECT * FROM users WHERE emailAddress = '$email'";
        $rs = $conn->query($query);
        $num = $rs->num_rows;

        if($num > 0)
        {
            echo "<script type = \"text/javascript\">
            alert(\"Email Address has already been used!\");
            window.location = (\"../createMember.php\")
            </script>";

        }
        else
        {
            
            if($_POST['userType'] == 1) // if the userType is staff, save staff info,member info and user info
            {
                $companyId = $_POST['companyId'];
                $staffCode = $_POST['staffCode'];
                $position = $_POST['position'];
                $level = $_POST['level'];
                $department = $_POST['department'];
                $description = $_POST['description'];

                $userqr = "INSERT INTO users (roleId,coopId,firstName,lastName,gender,dob,city,state,lga,emailAddress,address,phoneNo,password,dateCreated) 
                        VALUES ('2','$coopAccountId','$firstName','$lastName','$gender','$dob','$city','$state','$lga','$email','$address','$phoneNo','12345','$dateCreated')";
                $useres = $conn->query($userqr);

                if($useres === TRUE)
                {
                    $qryss = "SELECT * FROM companystaff WHERE compId = '$companyId' AND staffCode = '$staffCode'";
                    $rst = $conn->query($qryss);
                    $num = $rst->num_rows;

                    if($num == 0)
                    {
                        $querys = "SELECT * FROM users WHERE emailAddress = '$email'";
                        $rslt = $conn->query($querys);
                        // $num = $rslt->num_rows;
                        $rrw = $rslt->fetch_assoc();
                        $memberId = $rrw['Id'];

                        $compqr = "INSERT INTO companystaff (staffCode,memberId,compId,coopId,position,level,department,jobDescription,dateCreated) 
                            VALUES ('$staffCode','$memberId','$companyId','$coopAccountId','$position','$level','$department','$description','$dateCreated')";
                        $compres = $conn->query($compqr);

                         $memqry = "INSERT INTO membersinfo (coopId,memberId,nFirstName,nLastName,nGender,nDob,nEmailAddress,nPhoneNo,nRelationship,bankName,accountName,accountNo,paymentType,dateCreated) 
                                           VALUES ('$coopAccountId','$memberId','$nFirstName','$nLastName','$nGender','$nDob','$nEmail','$nPhoneNo','$nRelationship','$bankName','$acctName','$acctNo','$paymentType','$dateCreated')";
                         $memres = $conn->query($memqry);

                            if($compres == TRUE && $memres == TRUE)
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
                        window.location = (\"../createMember.php\")
                        </script>";
                    }
                    else
                    {

                        echo "<script type = \"text/javascript\">
                        alert(\"Staff with staff code already exist!\");
                        window.location = (\"../createMember.php\")
                        </script>";
                    }
                }
                else
                {
                    echo "<script type = \"text/javascript\">
                    alert(\"An Error Occurred!\");
                    </script>";
                }

            }


            else if($_POST['userType'] == 2) // if the userType is ExternalMmber, save the member info to the user table only
            {
                $userqr = "INSERT INTO users (roleId,coopId,firstName,lastName,gender,dob,city,state,lga,emailAddress,address,phoneNo,password,dateCreated) 
                        VALUES ('2','$coopAccountId','$firstName','$lastName','$gender','$dob','$city','$state','$lga','$email','$address','$phoneNo','12345','$dateCreated')";
                $useres = $conn->query($userqr);

                    $querys = "SELECT * FROM users WHERE emailAddress = '$email'";
                    $rslt = $conn->query($querys);
                    // $num = $rslt->num_rows;
                    $rrw = $rslt->fetch_assoc();
                    $memberId = $rrw['Id'];

                 $memqry = "INSERT INTO membersinfo (coopId,memberId,nFirstName,nLastName,nGender,nDob,nEmailAddress,nPhoneNo,nRelationship,bankName,accountName,accountNo,paymentType,dateCreated) 
                            VALUES ('$coopAccountId','$memberId','$nFirstName','$nLastName','$nGender','$nDob','$nEmail','$nPhoneNo','$nRelationship','$bankName','$acctName','$acctNo','$paymentType','$dateCreated')";
                 $memres = $conn->query($memqry);

                if($useres == TRUE && $memres == TRUE)
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
                window.location = (\"../createMember.php\")
                </script>";
            }

        } // end of else statement
        
    } //end of if for submit button



        ?>



