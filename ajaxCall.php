
<?php
include 'Includes/dbcon.php';

  if(isset($_GET['qq'])){

    $qq = $_GET['qq'];

    if($qq == 2){ //if select from existing company is NO

        echo "
            <div class='text-center'>
            <h1 class='h4 text-gray-900 mb-4'>Enter Company Details</h1>
            </div>
            <div class='form-group row mb-3'>
            <div class='col-xl-6 mb-3'>
                <label class='form-control-label'>Name<span class='text-danger ml-2'>*</span></label>
            <input type='text' class='form-control' name='compName' id='exampleInputFirstName' placeholder='Name'>
            </div>
            <div class='col-xl-6'>
                <label class='form-control-label'>Code<span class='text-danger ml-2'>*</span></label>
            <input type='textarea' class='form-control' name='compCode' id='exampleInputFirstName' placeholder='Code'>
            </div>
            </div>
            <div class='form-group row mb-3'>
                <div class='col-xl-6 mb-3'>
                    <label class='form-control-label'>Email Address<span class='text-danger ml-2'>*</span></label>
                <input type='text' class='form-control' name='compEmail' id='exampleInputFirstName' placeholder='Email Address'>
                </div>
                <div class='col-xl-6'>
                    <label class='form-control-label'>Telephone<span class='text-danger ml-2'>*</span></label>
                <input type='textarea' class='form-control' name='compPhone' id='exampleInputFirstName' placeholder='Telephone'>
                </div>
            </div>
            <div class='form-group row mb-3'>
                <div class='col-xl-6 mb-3'>
                    <label class='form-control-label'>Address<span class='text-danger ml-2'>*</span></label>
                <input type='text' class='form-control' name='compAddress' id='exampleInputFirstName' placeholder='Enter Address'>
                </div>
                <div class='col-xl-6'>
                    <label class='form-control-label'>State<span class='text-danger ml-2'>*</span></label>
                <input type='textarea' class='form-control' name='compState' id='exampleInputFirstName' placeholder='State'>
                </div>
            </div>
            <div class='form-group row mb-3'>
                <div class='col-xl-6 mb-3'>
                    <label class='form-control-label'>LGA<span class='text-danger ml-2'>*</span></label>
                <input type='text' class='form-control' name='compLga'id='exampleInputFirstName' placeholder='LGA'>
                </div>
                <div class='col-xl-6'>
                    <label class='form-control-label'>Type/Sector<span class='text-danger ml-2'>*</span></label>
                    <select class='form-control mb-3' name='compSector'>
                        <option>--Select--</option>
                    <option value='1'>IT</option>
                    <option value='2'>Business</option>
                    <option value='3'>Education</option>
                </select>                       
                    </div>
                </div>
            <div class='form-group row mb-3'>
                <div class='col-xl-6 mb-3'>
                    <label class='form-control-label'>No of Employees<span class='text-danger ml-2'>*</span></label>
                <input type='text' class='form-control' name='compNoEmployee' id='exampleInputFirstName' placeholder='No of employees'>
                </div>
            
            </div>";
    }

    if($qq == 1){ //Yes

 
        $query = "SELECT * FROM company ORDER BY name ASC";
        $rs = $conn->query($query);
        $num = $rs->num_rows;
        if($num > 0)
        { 
            echo "
            <label class='form-control-label'>Select Company<span class='text-danger ml-2'>*</span></label>
            <select class='form-control mb-3' name='companyId'>
            <option>--Select--</option>";
            while ($rows = $rs->fetch_assoc())
            {
            echo "<option value='".$rows['Id']."' >".$rows['name']."</option>";
            }
            echo "</select>";
        }
    }
}
           
?>



