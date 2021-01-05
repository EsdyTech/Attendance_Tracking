
<?php
if(isset($_GET['qs'])){

      $qs = $_GET['qs'];

    if($qs == 1){

        echo "
        <label class='form-control-label'>Select From Existing Company<span class='text-danger ml-2'>*</span></label>
        <select class='form-control mb-3' onchange='displayForms(this.value)' name='isExisting'>
        <option>--Select--</option>
        <option value='1'>Yes</option>
        <option value='2'>No</option>
        </select>";

    }

    if($qs == 3){

        echo "
        <label class='form-control-label'>Select From Existing Company<span class='text-danger ml-2'>*</span></label>
        <select class='form-control mb-3' onchange='displayForms(this.value)' name='isExisting'>
        <option>--Select--</option>
        <option value='1'>Yes</option>
        <option value='2'>No</option>
        </select>";

    }
}
           
?>



