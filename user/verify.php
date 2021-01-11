<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (isset($_GET['vkey'])) {
	$vkey = $_GET['vkey'];
	
	# code...
	$querySelect= mysqli_query($con,"select Verified,vkey from tbluser where Verified = 0 and vkey='$vkey' LIMIT 1");
     $ret=mysqli_fetch_array($querySelect);
     if ($ret == 1) {
     	# code...
     	 $query=mysqli_query($con, "update tbluser set Verified = 1 where vkey = '$vkey' LIMIT 1");
     	 if ($query) {
     	 	# code...
     	 	echo "Your account has been Verified. you may now Login";
     	 }else{
     	 	echo "error"
     	 }
     }else{
     	echo "this account invalid or already Verified";
     }
}else{
	die(" something went wrong!")
}



?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>