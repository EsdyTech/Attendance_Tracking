<?php 
// error_reporting(0);
session_start();
include '../../Includes/dbcon.php';


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
        $roleId = $_POST['roleId'];
        $lga = $_POST['lga'];
        $coopAccountId = $_SESSION['coopId'];
        $dateCreated =  date("Y-m-d");

        $query = "SELECT * FROM users WHERE emailAddress = '$email'";
        $rs = $conn->query($query);
        $num = $rs->num_rows;

        if($num > 0)
        {
            echo "<script type = \"text/javascript\">
            alert(\"Email Address has already been used!\");
            window.location = (\"../createUsers.php\")
            </script>";

        }
        else
        {
           
            $userqr = "INSERT INTO users (roleId,coopId,firstName,lastName,gender,dob,city,state,lga,emailAddress,address,phoneNo,password,dateCreated) 
                    VALUES ('$roleId','$coopAccountId','$firstName','$lastName','$gender','$dob','$city','$state','$lga','$email','$address','$phoneNo','12345','$dateCreated')";
            $useres = $conn->query($userqr);

            if($useres === TRUE)
            {
                echo "<script type = \"text/javascript\">
                alert(\"Created Successfully!\");
                window.location = (\"../createUsers.php\")
                </script>";
            }
            else
            {

                echo "<script type = \"text/javascript\">
                alert(\"Staff with staff code already exist!\");
                window.location = (\"../createUsers.php\")
                </script>";
            }

        } // end of else statement
        
    } //end of if for submit button



        ?>



