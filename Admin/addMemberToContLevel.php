
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
  <link href="img/logo/logo.png" rel="icon">
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
            <h1 class="h3 mb-0 text-gray-800">Add Member to Contribution Level</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Add Member to Contribution Level</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Add Member to Contribution Level</h6>
                    <?php echo $statusMsg; ?>
                </div>
                <div class="card-body">
                  <form method="post" action="scripts/saveMemberContLevel.php">
                    
                    <div class="form-group row mb-3">
                        <div class="col-xl-6">
                            <label class="form-control-label">Select Member<span class="text-danger ml-2">*</span></label>
                            <?php
                        $memberRoleId = 2; //member RoleId is 2
                        $qry= "SELECT * FROM users where coopId = ".$_SESSION['coopId']." and roleId = ".$memberRoleId." ORDER BY firstName ASC";
                        $result = $conn->query($qry);
                        $num = $result->num_rows;		
                        if ($num > 0){
                          echo ' <select required name="memberId" class="form-control mb-3">';
                          echo'<option value="">--Select--</option>';
                          while ($rows = $result->fetch_assoc()){
                          echo'<option value="'.$rows['Id'].'" >'.$rows['firstName'].' '.$rows['lastName'].'</option>';
                              }
                                  echo '</select>';
                              }
                            ?> 
                      </div>
                        <div class="col-xl-6">
                            <label class="form-control-label">Select Contribution Level/Band:<span class="text-danger ml-2">*</span></label>
                          <?php
                        $qry= "SELECT * FROM contributionlevel where coopId = ".$_SESSION['coopId']." ORDER BY levelName ASC";
                        $result = $conn->query($qry);
                        $num = $result->num_rows;		
                        if ($num > 0){
                          echo ' <select required name="contLevelId" class="form-control mb-3">';
                          echo'<option value="">--Select--</option>';
                          while ($rows = $result->fetch_assoc()){
                          echo'<option value="'.$rows['Id'].'" >'.$rows['levelName'].'</option>';
                              }
                                  echo '</select>';
                              }
                            ?>                       
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
                  <h6 class="m-0 font-weight-bold text-primary">All Members Contribution Level</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>Full Name</th>
                        <th>Level</th>
                        <th>Code</th>
                        <th>Amount</th>
                        <th>Description</th>
                        <th>Approval Status</th>
                        <th>Verified</th>
                        <th>Date Created</th>
                        <th>Delete</th>
                        <th>Edit</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Full Name</th>
                        <th>Level</th>
                        <th>Code</th>
                        <th>Amount</th>
                        <th>Description</th>
                        <th>Approved</th>
                        <th>Verified</th>
                        <th>Date Created</th>
                        <th>Delete</th>
                        <th>Edit</th>
                      </tr>
                    </tfoot>
                    <tbody>

                  <?php
                      $query = "SELECT  users.firstName, users.lastName, contributionlevel.levelName, contributionlevel.code,contributionlevel.amount,
                      contributionlevel.description,contributionlevel.dateCreated
                      FROM membercontributionlevel 
                      INNER JOIN users ON users.Id = membercontributionlevel.memberId
                      INNER JOIN contributionlevel ON contributionlevel.Id = membercontributionlevel.contLevelId
                      WHERE membercontributionlevel.coopId = ".$_SESSION['coopId']."";

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
                                <td>".$rows['firstName']." ".$rows['lastName']."</td>
                                <td>".$rows['levelName']."</td>
                                <td>".$rows['code']."</td>
                                <td>".$rows['amount']."</td>
                                <td>".$rows['description']."</td>
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