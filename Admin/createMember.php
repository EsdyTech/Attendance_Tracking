
<?php 
error_reporting(0);
include '../Includes/dbcon.php';
include '../Includes/session.php';

  if (isset($_GET['status'])){
    $status = $_GET['status'];
    $statusMsg = "";
    if($status == "success"){
          $statusMsg = "<div class='alert alert-success'  style='margin-right:700px;'>Created Successfully!</div>";
    }
    if($status == "fail"){
          $statusMsg = "<div class='alert alert-danger'  style='margin-right:700px;'>An Error Occurred!</div>";
    }
    if($status == "exists"){
          $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>Already Exists!</div>";
    }

    }
                            
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="../img/logo/logo.png" rel="icon">
  <title>COBIS - Dashboard</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">


<script>

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
        xmlhttp.open("GET","ajaxforCompany2.php?qc="+str,true);
        xmlhttp.send();
    }
}
</script>	


</head>
 
<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
      <?php include "Includes/sidebar.php";?>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
       <?php include "Includes/topbar.php";?>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Member</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Add Member</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">BASIC DETAILS</h6>
                    <?php echo $statusMsg; ?>
                </div>
                <div class="card-body">
                  <form method="post" action="scripts/saveMember2.php">
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
                            <input type="textarea" class="form-control" name="lga" id="exampleInputFirstName" placeholder="State">                    
                    </div>
                    </div>  
                     <div class="form-group row mb-3">
                        <div class="col-xl-6">
                        <?php

                          $querys = "SELECT * FROM cooperatives WHERE Id = ".$_SESSION["coopId"]."";
                          $rslt = $conn->query($querys);
                          $num = $rslt->num_rows;
                          $rrw = $rslt->fetch_assoc();
                          $userTypes = $rrw['typeOfUsers'];
                      echo "
                    <label class='form-control-label'>Select User Type<span class='text-danger ml-2'>*</span></label>
                    <select class='form-control mb-3' onchange='displayCompany(this.value)' name='userType'>
                    <option>--Select--</option>";

                    if($userTypes == 3) //if cooperative UserType is staff and External Members
                    { 
                      echo "
                      <option value='1'>Staff</option>
                      <option value='2'>External Member</option>";
                    }
                    else if($userTypes == 2) //if cooperative UserType is External Members
                    { 
                      echo "
                      <option value='2'>External Member</option>";
                    }
                    else if($userTypes == 1) //if cooperative UserType is staff
                    { 
                      echo "
                      <option value='1'>Staff</option>";
                    }
                    echo"</select>";
                          ?>
                        </div>


                    </div>    
                   <?php
                    echo"<div id='txtHintt'></div>";
                    ?>  

                  <h6 class="m-0 font-weight-bold text-primary">NEXT OF KIN DETAILS</h6>
                  <br>
                   <div class="form-group row mb-3">
                        <div class="col-xl-6">
                            <label class="form-control-label">FirstName<span class="text-danger ml-2">*</span></label>
                      <input type="text" class="form-control" name="nFirstName" id="exampleInputFirstName" placeholder="First Name">
                        </div>
                        <div class="col-xl-6">
                            <label class="form-control-label">LastName<span class="text-danger ml-2">*</span></label>
                      <input type="textarea" class="form-control" name="nLastName" id="exampleInputFirstName" placeholder="Last Name">
                        </div>
                    </div>
                     <div class="form-group row mb-3">
                        <div class="col-xl-6">
                            <label class="form-control-label">Gender<span class="text-danger ml-2">*</span></label>
                        <select class="form-control mb-3" name="nGender">
                             <option>--Select--</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>   
                     </select>                                                       
                     </div>
                        <div class="col-xl-6">
                            <label class="form-control-label">Date of Birth<span class="text-danger ml-2">*</span></label>
                      <input type="date" class="form-control" name="nDob" id="exampleInputFirstName" placeholder="Dob">
                        </div>
                    </div>
                     <div class="form-group row mb-3">
                        <div class="col-xl-6">
                            <label class="form-control-label">Email Address<span class="text-danger ml-2">*</span></label>
                      <input type="text" class="form-control" name="nEmail" id="exampleInputFirstName" placeholder="Email Address">
                        </div>
                        <div class="col-xl-6">
                            <label class="form-control-label">Phone Number<span class="text-danger ml-2">*</span></label>
                      <input type="text" class="form-control" name="nPhoneNo" id="exampleInputFirstName" placeholder="Phone Number">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-xl-6">
                            <label class="form-control-label">State<span class="text-danger ml-2">*</span></label>
                      <input type="text" class="form-control" name="nState" id="exampleInputFirstName" placeholder="State">
                        </div>
                        <div class="col-xl-6">
                          <label class="form-control-label">Relationship<span class="text-danger ml-2">*</span></label>
                          <input type="text" class="form-control" name="nRelationship" id="exampleInputFirstName" placeholder="Relationship">
                        </div>
                    </div>
                     <div class="form-group row mb-3">
                        <div class="col-xl-6">
                            <label class="form-control-label">Address<span class="text-danger ml-2">*</span></label>
                      <input type="text" class="form-control" name="nAddress" id="exampleInputFirstName" placeholder="Address">
                     </div>
                        <div class="col-xl-6">
                            
                        </div> 
                        </div>   
                   
                    <h6 class="m-0 font-weight-bold text-primary">FINANCIAL DETAILS</h6>
                    <br>
                   <div class="form-group row mb-3">
                        <div class="col-xl-6">
                            <label class="form-control-label">Bank Name<span class="text-danger ml-2">*</span></label>
                      <input type="text" class="form-control" name="bankName" id="exampleInputFirstName" placeholder="Bank Name">
                        </div>
                        <div class="col-xl-6">
                            <label class="form-control-label">Account Name<span class="text-danger ml-2">*</span></label>
                      <input type="textarea" class="form-control" name="acctName" id="exampleInputFirstName" placeholder="Account Name">
                        </div>
                    </div>
                     <div class="form-group row mb-3">
                        <div class="col-xl-6">
                                <label class="form-control-label">Account Number<span class="text-danger ml-2">*</span></label>
                      <input type="text" class="form-control" name="acctNo" id="exampleInputFirstName" placeholder="Account Number">                                             
                     </div>
                        <div class="col-xl-6">
                          <label class="form-control-label">Payment Type<span class="text-danger ml-2">*</span></label>
                        <select class="form-control mb-3" name="paymentType">
                             <option>--Select--</option>
                            <option value="1">Cash</option>
                            <option value="2">Card</option>  
                            <option value="3">Transfer</option> 
                     </select>    
                            
                        </div> 
                        </div>                   

                    <button type="submit" name="submit" class="btn btn-primary">Save</button>
                  </form>
                </div>
              </div>

              <!-- Input Group -->
                 <div class="row">
              <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">All Members</h6>
                </div>
                <div class="table-responsive p-3">
                  <!-- <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>Asset</th>
                        <th>Contribution Band</th>
                        <th>Scheme</th>
                        <th>Code</th>
                        <th>Description</th>
                        <th>No of Units</th>
                        <th>Units Description</th>
                        <th>Amount Per Units</th>
                        <th>Down Payment</th>
                        <th>Recuurent Payment</th>
                        <th>Tenure</th>
                        <th>Charges</th>
                        <th>Moraltorium</th>
                        <th>Closure Date</th>
                        <th>Approved</th>
                        <th>Verified</th>
                        <th>Date Created</th>
                        <th>Delete</th>
                        <th>Edit</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Asset</th>
                        <th>Contribution Band</th>
                        <th>Scheme</th>
                        <th>Code</th>
                        <th>Description</th>
                        <th>No of Units</th>
                        <th>Units Description</th>
                        <th>Amount Per Units</th>
                        <th>Down Payment</th>
                        <th>Recuurent Payment</th>
                        <th>Tenure</th>
                        <th>Charges</th>
                        <th>Moraltorium</th>
                        <th>Closure Date</th>
                        <th>Approved</th>
                        <th>Verified</th>
                        <th>Date Created</th>
                        <th>Delete</th>
                        <th>Edit</th>
                      </tr>
                    </tfoot>
                    <tbody>

                  <?php
                      $query = "SELECT assets.assetNames,contributionlevel.levelName,schemes.schemeName,schemes.code,schemes.description,schemes.noOfUnits,schemes.unitDescription,schemes.amountPerUnits,schemes.downPayment,
                      schemes.recurrentPayment,schemes.tenure,schemes.charges,schemes.moralTorium,schemes.closureDate,schemes.isApproved,schemes.isVerified,schemes.dateCreated
                      FROM schemes
                      INNER JOIN assets ON assets.Id = schemes.assetId
                      INNER JOIN contributionlevel ON contributionlevel.Id = schemes.contLevelId
                      WHERE schemes.coopId = ".$_SESSION['coopId']."";

                      $rs = $conn->query($query);
                      $num = $rs->num_rows;
                      if($num > 0)
                      { 
                        while ($rows = $rs->fetch_assoc())
                          {
                            $isApproved = "<span class='badge badge-danger'>Pending</span>";
                            $isVerified = "<span class='badge badge-danger'>Pending</span>";
                            if($rows['isApproved'] == "1"){$isApproved = "<span class='badge badge-success'>Approved</span>";}
                            if($rows['isVerified'] == "1"){$isVerified = "<span class='badge badge-success'>Verified</span>";}
                            echo"
                              <tr>
                                <td>".$rows['assetName']."</td>
                                <td>".$rows['levelName']."</td>
                                <td>".$rows['schemeName']."</td>
                                <td>".$rows['code']."</td>
                                <td>".$rows['description    ']."</td>
                                <td>".$rows['noOfUnits']."</td>
                                <td>".$rows['unitsDescription']."</td>
                                <td>".$rows['amountPerUnits']."</td>
                                <td>".$rows['downPayment']."</td>
                                <td>".$rows['recurrentPayment']."</td>
                                <td>".$rows['tenure']."</td>
                                <td>".$rows['charges']."</td>
                                <td>".$rows['moralTorium']."</td>
                                <td>".$rows['closureDate']."</td>
                                <td>".$isApproved."</td>
                                <td>".$isVerified."</td>
                                <td>".$rows['dateCreated']."</td>
                                <td><a href=''><i class='fas fa-fw fa-trash'></i></a></td>
                                <td><a href=''><i class='fas fa-fw fa-edit'></i></a></td>
                              </tr>";
                          }
                      }
                      else
                      {
                           echo   
                           "<div class='alert alert-danger' role='alert'>
                            No Record Found!
                            </div>";
                      }
                      
                      ?>
                    </tbody>
                  </table> -->
                </div>
              </div>
            </div>
            </div>
          </div>
          <!--Row-->

          <!-- Documentation Link -->
          <!-- <div class="row">
            <div class="col-lg-12 text-center">
              <p>For more documentations you can visit<a href="https://getbootstrap.com/docs/4.3/components/forms/"
                  target="_blank">
                  bootstrap forms documentations.</a> and <a
                  href="https://getbootstrap.com/docs/4.3/components/input-group/" target="_blank">bootstrap input
                  groups documentations</a></p>
            </div>
          </div> -->

        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
       <?php include "Includes/footer.php";?>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
   <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
</body>

</html>