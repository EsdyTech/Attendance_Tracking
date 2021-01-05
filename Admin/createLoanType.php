
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
            <h1 class="h3 mb-0 text-gray-800">Create Loan Type</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Create Loan Type</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Create Loan Type</h6>
                    <?php echo $statusMsg; ?>
                </div>
                <div class="card-body">
                  <form method="post" action="scripts/saveLoanType.php">
                    <div class="form-group row mb-3">
                        <div class="col-xl-6  mb-3">
                            <label class="form-control-label">Name<span class="text-danger ml-2">*</span></label>
                      <input type="text" class="form-control" name="name" id="exampleInputFirstName" placeholder="Name">
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label class="form-control-label">Code<span class="text-danger ml-2">*</span></label>
                      <input type="textarea" class="form-control"  name="code" id="exampleInputFirstName" placeholder="Code">
                        </div>
                    </div>
                   
                    <div class="form-group row mb-3">
                        <div class="col-xl-6 mb-3">
                            <label class="form-control-label">Description<span class="text-danger ml-2">*</span></label>
                          <input type="text" class="form-control"  name="description" id="exampleInputFirstName" placeholder="Description">                                 
                      </div>
                        <div class="col-xl-6 mb-3">
                            <label class="form-control-label">Rate(%)<span class="text-danger ml-2">*</span></label>
                          <input type="text" class="form-control"  name="rate" id="exampleInputFirstName" placeholder="Rate">                                 
                        </div>
                    </div>
                     <div class="form-group row mb-3">
                        <div class="col-xl-6  mb-3">
                            <label class="form-control-label">Interest Rate(%)<span class="text-danger ml-2">*</span></label>
                          <input type="text" class="form-control"  name="interestRate" id="exampleInputFirstName" placeholder="Interest Rate">                                                                     
                      </div>
                        <div class="col-xl-6 mb-3">
                            <label class="form-control-label">Penalty on loan Payment<span class="text-danger ml-2">*</span></label>
                      <input type="text" class="form-control"  name="penalty" id="exampleInputFirstName" placeholder="Penalty">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                    <div class="col-xl-6 mb-3">
                            <label class="form-control-label">Penalty Rate(%)<span class="text-danger ml-2">*</span></label>
                      <input type="text" class="form-control"  name="penaltyRate" id="exampleInputFirstName" placeholder="Penalty Rate">
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label class="form-control-label">Is Penalty Changeable?<span class="text-danger ml-2">*</span></label>
                          <select class="form-control" name="penaltyChangeable">
                             <option>--Select--</option>
                            <option value="1">Yes</option>
                            <option value="2">No</option>
                        </select>                                    
                        </div>
                    </div>
                     <div class="form-group row mb-3">
                    <div class="col-xl-6  mb-3">
                            <label class="form-control-label">Penalty Charge<span class="text-danger ml-2">*</span></label>
                      <input type="text" class="form-control"  name="penaltyCharge" id="exampleInputFirstName" placeholder="Penalty Charge">
                        </div>
                        <div class="col-xl-6">
                            <label class="form-control-label">Down Payment<span class="text-danger ml-2">*</span></label>
                          <input type="text" class="form-control"  name="downPayment" id="exampleInputFirstName" placeholder="Down Payment">                                                                     
                      </div>
                    </div>
                    <div class="form-group row mb-3">
                    <div class="col-xl-6  mb-3">
                            <label class="form-control-label">Minimum Amount<span class="text-danger ml-2">*</span></label>
                      <input type="text" class="form-control"  name="minAmount" id="exampleInputFirstName" placeholder="Minimum Amount">
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label class="form-control-label">Maximum Amount<span class="text-danger ml-2">*</span></label>
                          <input type="text" class="form-control"  name="maxAmount" id="exampleInputFirstName" placeholder="Maximum Amount">                                                                     
                      </div>
                        
                    </div>
                    <div class="form-group row mb-3">
                    <div class="col-xl-6  mb-3">
                            <label class="form-control-label">Maximum Tenure<span class="text-danger ml-2">*</span></label>
                        <?php
                          echo ' <select required name="maxTenure" class="form-control">';
                          echo'<option value="">--Select--</option>';
                         for($i =1; $i <=12; $i++){
                          echo'<option value="'.$i.'" >'.$i.'</option>';
                              }
                          echo '</select>';
                            ?>                          
                            </div>
                        <div class="col-xl-6 mb-3">
                            <label class="form-control-label">Maximum Duration<span class="text-danger ml-2">*</span></label>
                          <?php
                          echo ' <select required name="maxDuration" class="form-control">';
                          echo'<option value="">--Select--</option>';
                         for($i =1; $i <=12; $i++){
                          echo'<option value="'.$i.'" >'.$i.'</option>';
                              }
                          echo '</select>';
                            ?>                          
                            </div>
                         </div>
                     <div class="form-group row mb-3">
                        <div class="col-xl-6 mb-3">
                            <label class="form-control-label">Moraltorium(Months)<span class="text-danger ml-2">*</span></label>
                             <?php
                          echo ' <select required name="moraltorium" class="form-control">';
                          echo'<option value="">--Select--</option>';
                         for($i =1; $i <=12; $i++){
                          echo'<option value="'.$i.'" >'.$i.'</option>';
                              }
                          echo '</select>';
                            ?>  
                             
                        </div>
                        <div class="col-xl-6">
                            <label class="form-control-label">Is Moraltorium Changeable?<span class="text-danger ml-2">*</span></label>
                            <select class="form-control mb-3" name="moraltoriumChangeable">
                             <option>--Select--</option>
                            <option value="1">Yes</option>
                            <option value="2">No</option>
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
                  <h6 class="m-0 font-weight-bold text-primary">All Schemes</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Description</th>
                        <th>Rate</th>
                        <th>Interest Rate</th>
                        <th>Penalty</th>
                        <th>Penalty Rate</th>
                        <th>Penalty Changeable</th>
                        <th>Penalty Charge</th>
                        <th>Down Payment</th>
                        <th>Min Amount</th>
                        <th>Max Amount</th>
                        <th>Max Tenure</th>
                        <th>Max Duration</th>
                        <th>Moraltorium</th>
                        <th>Moraltorium Changeable</th>
                        <th>Approved</th>
                        <th>Verified</th>
                        <th>Date Created</th>
                        <th>Delete</th>
                        <th>Edit</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Description</th>
                        <th>Rate</th>
                        <th>Interest Rate</th>
                        <th>Penalty</th>
                        <th>Penalty Rate</th>
                        <th>Penalty Changeable</th>
                        <th>Penalty Charge</th>
                        <th>Down Payment</th>
                        <th>Min Amount</th>
                        <th>Max Amount</th>
                        <th>Max Tenure</th>
                        <th>Max Duration</th>
                        <th>Moraltorium</th>
                        <th>Moraltorium Changeable</th>
                        <th>Approved</th>
                        <th>Verified</th>
                        <th>Date Created</th>
                        <th>Delete</th> 
                        <th>Edit</th>
                      </tr>
                    </tfoot>
                    <tbody>

                  <?php
                      $query = "SELECT * FROM loantypes WHERE coopId = ".$_SESSION['coopId']."";
                      $rs = $conn->query($query);
                      $num = $rs->num_rows;
                      if($num > 0)
                      { 
                        while ($rows = $rs->fetch_assoc())
                          {
                            $isPenaltyChangeable = "No";
                            $isMoraltoriumChangeable = "No";
                            $isApproved = "<span class='badge badge-danger'>Pending</span>";
                            $isVerified = "<span class='badge badge-danger'>Pending</span>";
                            if($rows['isApproved'] == "1"){$isApproved = "<span class='badge badge-success'>Approved</span>";}
                            if($rows['isVerified'] == "1"){$isVerified = "<span class='badge badge-success'>Verified</span>";}
                            if($rows['isPenaltyChangeable'] == "1"){$isPenaltyChangeable = "Yes";}
                            if($rows['isMoraltoriumChangeable'] == "1"){$isMoraltoriumChangeable = "Yes";}

                            echo"
                              <tr>
                                <td>".$rows['loanName']."</td>
                                <td>".$rows['code']."</td>
                                <td>".$rows['description']."</td>
                                <td>".$rows['rate']."</td>
                                <td>".$rows['interestRate']."</td>
                                <td>".$rows['penalty']."</td>
                                <td>".$rows['penaltyRate']."</td>
                                <td>".$isPenaltyChangeable."</td>
                                <td>".$rows['penaltyCharge']."</td>
                                <td>".$rows['downPayment']."</td>
                                <td>".$rows['minAmount']."</td>
                                <td>".$rows['maxAmount']."</td>
                                <td>".$rows['maxTenure']."</td>
                                <td>".$rows['maxDuration']."</td>
                                <td>".$rows['moraltorium']."</td>
                                <td>".$isMoraltoriumChangeable."</td>
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
                  </table>
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