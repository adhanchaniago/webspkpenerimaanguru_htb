<?php
//Fetching Values from URL
	require('koneksi.php');
		$userid=$_POST['userid'];
		$password=$_POST['password'];
	$sql_update="update t_admin set "."password='".$password."'"."where userid='".$userid."'";
	$rslt=mysqli_query($conn,$sql_update);
	if($rslt){
		echo "Data Admin Berhasil Diperbaharui";
	}else{
		echo mysqli_error($conn); 
	}
?>