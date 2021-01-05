<?php 
include 'Includes/dbcon.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>RuangAdmin - Register</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">

  <script>
    function displayUserTypes(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajaxforUserTypes.php?q="+str,true);
        xmlhttp.send();
    }
}

function displayCompany(str) {
    if (str == "") {
        document.getElementById("txtHintt").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHintt").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajaxforCompany.php?qc="+str,true);
        xmlhttp.send();
    }
}
</script>	
</head>

<body class="bg-gradient-login">
  <!-- Register Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                       <img src="img/logo/logo2.png" style="width:100px;height:100px">
                    <br><br>
                    <h1 class="h4 text-gray-900 mb-4">Member Registration</h1>
                  </div>
                  <form method="Post" action="scripts/saveMember.php">
                     <div class="form-group row mb-3">
                        <div class="col-xl-6">
                            <label class="form-control-label">FirstName<span class="text-danger ml-2">*</span></label>
                      <input type="text" class="form-control" name="firstName" id="exampleInputFirstName" placeholder="First Name">
                        </div>
                        <div class="col-xl-6">
                            <label class="form-control-label">LastName<span class="text-danger ml-2">*</span></label>
                      <input type="textarea" class="form-control" name="lastName" id="exampleInputFirstName" placeholder="Last Name">
                        </div>
                    </div>
                     <div class="form-group row mb-3">
                        <div class="col-xl-6">
                            <label class="form-control-label">Gender<span class="text-danger ml-2">*</span></label>
                        <select class="form-control mb-3" name="gender">
                             <option>--Select--</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>   
                     </select>                                                       
                     </div>
                        <div class="col-xl-6">
                            <label class="form-control-label">Date of Birth<span class="text-danger ml-2">*</span></label>
                      <input type="date" class="form-control" name="dob" id="exampleInputFirstName" placeholder="Dob">
                        </div>
                    </div>
                     <div class="form-group row mb-3">
                        <div class="col-xl-6">
                            <label class="form-control-label">Email Address<span class="text-danger ml-2">*</span></label>
                      <input type="text" class="form-control" name="email" id="exampleInputFirstName" placeholder="Email Address">
                        </div>
                        <div class="col-xl-6">
                            <label class="form-control-label">Phone Number<span class="text-danger ml-2">*</span></label>
                      <input type="text" class="form-control" name="phoneNo" id="exampleInputFirstName" placeholder="Phone Number">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-xl-6">
                            <label class="form-control-label">Password<span class="text-danger ml-2">*</span></label>
                      <input type="password" class="form-control"  name="password" id="exampleInputFirstName" placeholder="Password">
                        </div>
                        <div class="col-xl-6">
                            <label class="form-control-label">Confirm Password<span class="text-danger ml-2">*</span></label>
                      <input type="password" class="form-control"  name="conPassword" id="exampleInputFirstName" placeholder="Confirm Password">
                        </div>
                    </div>
                     <div class="form-group row mb-3">
                        <div class="col-xl-6">
                            <label class="form-control-label">City<span class="text-danger ml-2">*</span></label>
                      <input type="text" class="form-control" name="city" id="exampleInputFirstName" placeholder="City">
                        </div>
                        <div class="col-xl-6">
                            <label class="form-control-label">State<span class="text-danger ml-2">*</span></label>
                      <input type="textarea" class="form-control" name="state" id="exampleInputFirstName" placeholder="State">
                        </div>
                    </div>
                   
                   <div class="form-group row mb-3">
                        <div class="col-xl-6">
                            <label class="form-control-label">Address<span class="text-danger ml-2">*</span></label>
                      <input type="text" class="form-control" name="address" id="exampleInputFirstName" placeholder="Address">
                        </div>
                        <div class="col-xl-6">
                            <label class="form-control-label">LGA<span class="text-danger ml-2">*</span></label>
                            <input type="text" class="form-control" name="lga" id="exampleInputFirstName" placeholder="LGA">
                    </div>
                    </div>
                     <div class="form-group row ">
                        <div class="col-xl-12">
                            <label class="form-control-label">Select Cooperative<span class="text-danger ml-2">*</span></label>
                             <select class="form-control mb-3" onchange="displayUserTypes(this.value)" name="coopAccountId">
                             <option>--Select--</option>
                             <?php 
                          $query = "SELECT * FROM cooperatives ORDER BY name ASC";
                          $rs = $conn->query($query);
                          $num = $rs->num_rows;
                          if($num > 0){
                         
                          while ($rows = $rs->fetch_assoc()){
                          echo'<option value="'.$rows['Id'].'" >'.$rows['name'].'</option>';
                              }
                              }
                                ?>    
                     </select>                              
                        </div>
                    </div>
                     <div class="form-group row">
                        <div class="col-xl-12 ">
                             <?php
                            echo"<div id='txtHint'></div>";
                            ?>                        
                            </div>
                            </div>
                            <?php
                            echo"<div id='txtHintt'></div>";
                            ?>  

                    <div class="form-group">
                      <input type="submit" name="submit" Value="Register" class="btn btn-primary btn-block">
                    </div>
                    <!-- <hr>
                    <a href="index.html" class="btn btn-google btn-block">
                      <i class="fab fa-google fa-fw"></i> Register with Google
                    </a>
                    <a href="index.html" class="btn btn-facebook btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                    </a> -->
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="font-weight-bold small" href="index.php">Already have an account?</a>
                  </div>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Register Content -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
</body>

</html>