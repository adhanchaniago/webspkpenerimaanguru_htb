<?php
	session_start();
	if (!isset($_SESSION['username'])){
		header("Location: login.php");
	}
	require('koneksi.php');
	$userid=$_GET['userid'];
	$sql="select * from t_admin where userid='" .$userid."'";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_object($result);
?>