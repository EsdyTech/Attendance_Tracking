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
    function displayDropdown(str) {
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
        xmlhttp.open("GET","ajaxCall2.php?q="+str,true);
        xmlhttp.send();
    }
}

function displayForms(str) {
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
        xmlhttp.open("GET","ajaxCall.php?qq="+str,true);
        xmlhttp.send();
    }
}

    function displayExistingDropdown(str) {
    if (str == "") {
        document.getElementById("txtHinttt").innerHTML = "";
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
                document.getElementById("txtHinttt").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajaxCall3.php?qs="+str,true);
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
                    <h1 class="h4 text-gray-900 mb-4">Setup Cooperative Account</h1>
                  </div>
                  <form method="post" action="scripts/saveOrganization.php">
                    <div class="form-group row mb-3">
                        <div class="col-xl-6 mb-3">
                            <label class="form-control-label">FirstName<span class="text-danger ml-2">*</span></label>
                      <input type="text" class="form-control" name="firstName" id="exampleInputFirstName" placeholder="First Name">
                        </div>
                        <div class="col-xl-6">
                            <label class="form-control-label">LastName<span class="text-danger ml-2">*</span></label>
                      <input type="textarea" class="form-control"  name="lastName" id="exampleInputFirstName" placeholder="Last Name">
                        </div>
                    </div>
                     <div class="form-group row mb-3">
                        <div class="col-xl-6 mb-3">
                            <label class="form-control-label">Email Address<span class="text-danger ml-2">*</span></label>
                      <input type="text" class="form-control"  name="email" id="exampleInputFirstName" placeholder="Email Address">
                        </div>
                        <div class="col-xl-6">
                            <label class="form-control-label">Phone Number<span class="text-danger ml-2">*</span></label>
                      <input type="textarea" class="form-control"  name="phoneNo" id="exampleInputFirstName" placeholder="Phone Number">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-xl-6 mb-3">
                            <label class="form-control-label">Password<span class="text-danger ml-2">*</span></label>
                      <input type="password" class="form-control"  name="password" id="exampleInputFirstName" placeholder="Password">
                        </div>
                        <div class="col-xl-6">
                            <label class="form-control-label">Confirm Password<span class="text-danger ml-2">*</span></label>
                      <input type="password" class="form-control"  name="conPassword" id="exampleInputFirstName" placeholder="Confirm Password">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-xl-6 mb-3">
                            <label class="form-control-label">Cooperative Name<span class="text-danger ml-2">*</span></label>
                      <input type="text" class="form-control"  name="coopName" id="exampleInputFirstName" placeholder="Name">
                        </div>
                        <div class="col-xl-6">
                            <label class="form-control-label">Cooperative Code<span class="text-danger ml-2">*</span></label>
                      <input type="textarea" class="form-control" name="coopCode"  id="exampleInputFirstName" placeholder="Code">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-xl-6 mb-3">
                            <label class="form-control-label">State<span class="text-danger ml-2">*</span></label>
                      <input type="text" class="form-control" name="state"  id="exampleInputFirstName" placeholder="State">
                        </div>
                        <div class="col-xl-6">
                        <label class="form-control-label">LGA<span class="text-danger ml-2">*</span></label>
                      <input type="text" class="form-control" name="lga" id="exampleInputFirstName" placeholder="LGA">                          
                        </div>
                    </div>

                     <div class="form-group row mb-3">
                        <div class="col-xl-6 mb-3">
                            <label class="form-control-label">Address<span class="text-danger ml-2">*</span></label>
                      <input type="text" class="form-control" name="address"  id="exampleInputFirstName" placeholder="Address">
                        </div>
                        <div class="col-xl-6">
                          <label class="form-control-label">Linked to Company?<span class="text-danger ml-2">*</span></label>
                            <select class="form-control mb-3" onchange="displayDropdown(this.value)" name="isLinked">
                             <option>--Select--</option>
                            <option value="1">Yes</option>
                            <option value="2">No</option>
                        </select>                    
                        </div>
                        </div>

                         <div class="form-group row mb-3">
                        <div class="col-xl-6">

                          <?php
                            echo"<div id='txtHint'></div>";
                            ?>
                        </div>
                        
                        <div class='col-xl-6 mb-3'>
                         <?php
                            echo"<div id='txtHinttt'></div>";
                            ?>
                        </div>
                        </div> 
                        

                            <?php
                            echo"<div id='txtHintt'></div>";
                            ?>
                        <div class="form-group row mb-3">
                            <?php
                            echo"<div id='txtHint'></div>";
                            ?>
                        </div>
                    <div class="form-group">
                      <input type="submit" name="submit" value="Register" class="btn btn-primary btn-block">
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
                    <a class="font-weight-bold small" href="index.php">Already have an account? Sign in here!</a>
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