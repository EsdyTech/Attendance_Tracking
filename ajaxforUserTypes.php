
<?php
error_reporting(0);
include 'Includes/dbcon.php';
session_start();
  if(isset($_GET['q']))
  {
    $_SESSION['coopId'] = $_GET['q'];

    $querys = "SELECT * FROM cooperatives WHERE Id = ".$_SESSION["coopId"]."";
    $rslt = $conn->query($querys);
    $num = $rslt->num_rows;
    $rrw = $rslt->fetch_assoc();
      $userTypes = $rrw['typeOfUsers'];
    // }
    
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
}
           
?>



