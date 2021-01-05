
<?php
if(isset($_GET['q'])){

      $q = $_GET['q'];

    if($q == 1){

        echo "
        <label class='form-control-label'>Type of Users<span class='text-danger ml-2'>*</span></label>
        <select class='form-control mb-3' onchange='displayExistingDropdown(this.value)' name='userType'>
        <option>--Select--</option>
        <option value='1'>Staff</option>
        <option value='3'>Staff/External Members</option>
        </select>";
    }

    if($q == 2){

        echo "
        <label class='form-control-label'>Type of Users<span class='text-danger ml-2'>*</span></label>
        <select class='form-control mb-3' onchange='displayExistingDropdown(this.value)' name='userType'>
        <option>--Select--</option>
        <option value='2'>External Members</option>
        </select>";

    }
}
        



?>



<!-- echo "
        <div class='col-xl-6 mb-3'>
        <label class='form-control-label'>Select From Existing Company<span class='text-danger ml-2'>*</span></label>
        <select class='form-control mb-3' onchange='displayForms(this.value)' name='isExisting'>
        <option>--Select--</option>
        <option value='1'>Yes</option>
        <option value='2'>No</option>
        </select>
        </div>
        </div>"; -->