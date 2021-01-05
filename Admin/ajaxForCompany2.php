
<?php
include '../Includes/dbcon.php';
session_start();

  if(isset($_GET['qc']))
  {

    if($_GET['qc'] == 1)
    {
        $coopId =  $_SESSION['coopId'];

        $query = "SELECT * FROM cooperativescompanymap WHERE cooperativeId = '$coopId'";
        $rs = $conn->query($query);
        $num = $rs->num_rows;
        if($num > 0)
        { 
            echo "
            <h6 class='m-0 font-weight-bold text-primary'>STAFF DETAILS</h6>
            <br>
            <div class='form-group row mb-3'>
            <div class='col-xl-6 '>
            <label class='form-control-label'>Select Company<span class='text-danger ml-2'>*</span></label>
            <select class='form-control mb-3' name='companyId'>
            <option>--Select--</option>";
            while ($rows = $rs->fetch_assoc())
            {
                $companyId = $rows['companyId'];
                $qry = "SELECT * FROM company WHERE Id = '$companyId'";
                $rss = $conn->query($qry);
               $rw = $rss->fetch_assoc();
            echo "<option value='".$rw['Id']."' >".$rw['name']."</option>";
            }
            echo "</select>
                  </div>";

            echo" 
                <div class='col-xl-6'>
                    <label class='form-control-label'>Staff ID/Code<span class='text-danger ml-2'>*</span></label>
                <input type='textarea' class='form-control' name='staffCode' id='exampleInputFirstName' placeholder='Staff Code'>
                </div>
            </div>  
             <div class='form-group row'>
            <div class='col-xl-6'>
                <label class='form-control-label'>Position<span class='text-danger ml-2'>*</span></label>
            <input type='text' class='form-control' name='position' id='exampleInputFirstName' placeholder='Position'>
            </div>
            <div class='col-xl-6'>
                <label class='form-control-label'>Level<span class='text-danger ml-2'>*</span></label>
            <input type='textarea' class='form-control' name='level' id='exampleInputFirstName' placeholder='Level'>
            </div>
            </div>
              <div class='form-group row'>
            <div class='col-xl-6'>
                <label class='form-control-label'>Department<span class='text-danger ml-2'>*</span></label>
            <input type='text' class='form-control' name='department' id='exampleInputFirstName' placeholder='Department'>
            </div>
            <div class='col-xl-6'>
                <label class='form-control-label'>Job Description<span class='text-danger ml-2'>*</span></label>
            <input type='textarea' class='form-control' name='description' id='exampleInputFirstName' placeholder='Job Description'>
            </div>
            </div>";
        }
      }
    } 
?>



