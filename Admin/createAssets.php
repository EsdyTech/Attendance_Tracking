
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
            <h1 class="h3 mb-0 text-gray-800">Create Assets</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Create Assets</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Create Assets</h6>
                    <?php echo $statusMsg; ?>
                </div>
                <div class="card-body">
                  <form method="post" action="scripts/saveAssets.php">
                    <div class="form-group row mb-3">
                        <div class="col-xl-6">
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
                            <label class="form-control-label">Select Asset Category<span class="text-danger ml-2">*</span></label>

                         <?php
                        $qry= "SELECT * FROM assetcategory where coopId = ".$_SESSION['coopId']." ORDER BY catName ASC";
                        $result = $conn->query($qry);
                        $num = $result->num_rows;		
                        if ($num > 0){
                          echo ' <select required name="assetCatId" class="form-control mb-3">';
                          echo'<option value="">--Select--</option>';
                          while ($rows = $result->fetch_assoc()){
                          echo'<option value="'.$rows['Id'].'" >'.$rows['catName'].'</option>';
                              }
                                  echo '</select>';
                              }
                            ?>  

                        </div>
                        <div class="col-xl-6">
                            <label class="form-control-label">Description<span class="text-danger ml-2">*</span></label>
                      <input type="text" class="form-control"  name="description" id="exampleInputFirstName" placeholder="Description">
                        </div>
                      </div>
                    <div class="form-group row mb-3">
                        <div class="col-xl-6 mb-3">
                            <label class="form-control-label">Depreciation Rate(%)<span class="text-danger ml-2">*</span></label>
                          <input type="text" class="form-control"  name="depRate" id="exampleInputFirstName" placeholder="Depreciation Rate">                                 
                      </div>
                        <div class="col-xl-6 mb-3">
                            <label class="form-control-label">Years of Depreciation<span class="text-danger ml-2">*</span></label>
                          <input type="text" class="form-control"  name="depYear" id="exampleInputFirstName" placeholder="Years of Depreciation">                                 
                        </div>
                    </div>
                     <div class="form-group row mb-3">
                        <div class="col-xl-6">
                            <label class="form-control-label">Type of Depreciation<span class="text-danger ml-2">*</span></label>
                          <input type="text" class="form-control"  name="depType" id="exampleInputFirstName" placeholder="Type of Depreciation">                                                                     
                      </div>
                        <div class="col-xl-6 mb-3">
                            <label class="form-control-label">Maximum Units of Subscription<span class="text-danger ml-2">*</span></label>
                      <input type="textarea" class="form-control"  name="subUnits" id="exampleInputFirstName" placeholder="Units of Subscription">
                        </div>
                    </div>
                     <div class="form-group row mb-3">
                        <div class="col-xl-6 mb-3">
                            <label class="form-control-label">Purchase Type<span class="text-danger ml-2">*</span></label>
                      <select class="form-control mb-3"  name="purchaseType">
                             <option>--Select--</option>
                            <option value="1">Pre-Purchase</option>
                            <option value="2">Post-Purchase</option>
                        </select>                                     
                      </div>
                        <!-- <div class="col-xl-6">
                            <label class="form-control-label">LastName<span class="text-danger ml-2">*</span></label>
                      <input type="textarea" class="form-control"  name="lastName" id="exampleInputFirstName" placeholder="Last Name">
                        </div> -->
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
                  <h6 class="m-0 font-weight-bold text-primary">All Assets</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>Asset Category</th>
                        <th>Asset Name</th>
                        <th>Code</th>
                        <th>Description</th>
                        <th>Depreciation Rate</th>
                        <th>Depreciation Type</th>
                        <th>Years of Depreciation</th>
                        <th>Subscription Unit</th>
                        <th>Remaining Subscription Unit</th>
                        <th>Purchase Type</th>
                        <th>Approved</th>
                        <th>Verified</th>
                        <th>Date Created</th>
                        <th>Delete</th>
                        <th>Edit</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Asset Category</th>
                        <th>Asset Name</th>
                        <th>Code</th>
                        <th>Description</th>
                        <th>Depreciation Rate</th>
                        <th>Depreciation Type</th>
                        <th>Years of Depreciation</th>
                        <th>Subscription Unit</th>
                        <th>Remaining Subscription Unit</th>
                        <th>Purchase Type</th>
                        <th>Approved</th>
                        <th>Verified</th>
                        <th>Date Created</th>
                        <th>Delete</th>
                        <th>Edit</th>
                      </tr>
                    </tfoot>
                    <tbody>

                  <?php
                      $query = "SELECT assetcategory.catName,assets.assetName,assets.code,assets.description,assets.depRate,
                      assets.depYears,assets.depType,assets.subUnits,assets.remSubUnits,assets.purchaseType,assets.isApproved,assets.isVerified,assets.dateCreated
                      FROM assets 
                      INNER JOIN assetcategory ON assetcategory.Id = assets.assetCatId
                      WHERE assets.coopId = ".$_SESSION['coopId']."";
                      $rs = $conn->query($query);
                      $num = $rs->num_rows;
                      if($num > 0)
                      { 
                        while ($rows = $rs->fetch_assoc())
                          {
                            $purchaseType ="";
                            $isApproved = "<span class='badge badge-danger'>Pending</span>";
                            $isVerified = "<span class='badge badge-danger'>Pending</span>";
                            if($rows['isApproved'] == "1"){$isApproved = "<span class='badge badge-success'>Approved</span>";}
                            if($rows['isVerified'] == "1"){$isVerified = "<span class='badge badge-success'>Verified</span>";}
                            if($rows['purchaseType'] == "1"){$purchaseType = "Pre-Purchase";}else{$purchaseType = "Post-Purchase";}
                            echo"
                              <tr>
                                <td>".$rows['catName']."</td>
                                <td>".$rows['assetName']."</td>
                                <td>".$rows['code']."</td>
                                <td>".$rows['description']."</td>
                                <td>".$rows['depRate']."</td>
                                <td>".$rows['depType']."</td>
                                <td>".$rows['depYears']."</td>
                                <td>".$rows['subUnits']."</td>
                                <td>".$rows['remSubUnits']."</td>
                                <td>".$purchaseType."</td>
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