<?php
include 'connect.php';
session_start();

if(isset($_POST['login'])){
$user = strip_tags(mysqli_real_escape_string($con, $_POST['username']));
$pass = strip_tags(mysqli_real_escape_string($con, $_POST['pass']));

// echo $user . " " . $pass;
// exit();

//$query  = "select * from user where username = '$user' and password = md5('$pass')";
$query  = "select users.*, employee_type.*, employee_department.*
           from users 
           left join employee_type
           on (users.u_employee_type = employee_type.emp_id)
           left join employee_department
           on (users.u_department = employee_department.dept_id)
           where u_username = '$user' and u_password = md5('$pass')";
           
$result = mysqli_query($con, $query);
$row    = mysqli_fetch_assoc($result);

    if($row['emp_type'] == 'ADMIN'){
       $_SESSION['user'] = $user;
       $_SESSION['id']   = $row['u_id'];
	   $_SESSION['type'] = 'Admin';
       header("location: ../admin/index.php");
    } else if ($row['emp_type'] == 'CASHIER'){
       if($row['u_acct_status'] == 'Inactive'){
    	   $_SESSION['user'] = $user;
    	   $_SESSION['id']   = $row['u_id'];
    	   $_SESSION['type'] = 'Cashier';
           header("location: ../cashier/firstTime.php");
       } else{
    	   $_SESSION['user'] = $user;
    	   $_SESSION['id']   = $row['u_id'];
    	   $_SESSION['type'] = 'Cashier';
           header("location: ../cashier/index.php");
       }
	} else if ($row['emp_type'] == 'DOCTOR'){
       if($row['u_acct_status'] == 'Inactive'){
    	   $_SESSION['user'] = $user;
    	   $_SESSION['id']   = $row['u_id'];
    	   $_SESSION['type'] = 'Doctor';
           header("location: ../medstaff/firstTime.php");
       } else{
    	   $_SESSION['user'] = $user;
    	   $_SESSION['id']   = $row['u_id'];
    	   $_SESSION['type'] = 'Doctor';
           header("location: ../medstaff/index.php");
       }
	} else if ($row['emp_type'] == 'PHARMACIST'){
       if($row['u_acct_status'] == 'Inactive'){
    	   $_SESSION['user'] = $user;
    	   $_SESSION['id']   = $row['u_id'];
    	   $_SESSION['type'] = 'Pharmacist';
           header("location: ../pharmacy/firstTime.php");
       } else{
    	   $_SESSION['user'] = $user;
    	   $_SESSION['id']   = $row['u_id'];
    	   $_SESSION['type'] = 'Pharmacist';
           header("location: ../pharmacy/index.php");
       }
	} else if ($row['emp_type'] == 'INVENTMGR'){
       if($row['u_acct_status'] == 'Inactive'){
    	   $_SESSION['user'] = $user;
    	   $_SESSION['id']   = $row['u_id'];
    	   $_SESSION['type'] = 'Inventory Manager';
           header("location: ../inventory/firstTime.php");
       } else{
    	   $_SESSION['user'] = $user;
    	   $_SESSION['id']   = $row['u_id'];
    	   $_SESSION['type'] = 'Inventory Manager';
           header("location: ../inventory/index.php");
       }
	} else if ($row['emp_type'] == 'LABMGR'){
       if($row['u_acct_status'] == 'Inactive'){
    	   $_SESSION['user'] = $user;
    	   $_SESSION['id']   = $row['u_id'];
    	   $_SESSION['type'] = 'Laboratory Manager';
           header("location: ../laboratory/firstTime.php");
       } else{
    	   $_SESSION['user'] = $user;
    	   $_SESSION['id']   = $row['u_id'];
    	   $_SESSION['type'] = 'Laboratory Manager';
           header("location: ../laboratory/index.php");
       }
	} else if ($row['emp_type'] == 'ADMCLRK'){
       if($row['u_acct_status'] == 'Inactive'){
    	   $_SESSION['user'] = $user;
    	   $_SESSION['id']   = $row['u_id'];
    	   $_SESSION['type'] = 'Admission Clerk';
           header("location: ../admission/firstTime.php");
       } else{
    	   $_SESSION['user'] = $user;
    	   $_SESSION['id']   = $row['u_id'];
    	   $_SESSION['type'] = 'Admission Clerk';
           header("location: ../admission/index.php");
       }
	} else if(empty($user)){
       header("location: ../index.php?empty=true");
    } else {
	   header ("location:../index.php?invalid=true");
	}
}

?>
