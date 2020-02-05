<?php
	session_start();
	if (!isset($_SESSION['username'])){
		header("Location: login.php");
	}
	require('koneksi.php');
	$no_calonguru=$_GET['no_calonguru'];
	$sql="select * from t_calonguru where no_calonguru='" .$no_calonguru."'";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_object($result);
?>