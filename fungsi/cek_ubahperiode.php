<?php
	session_start();
	if (!isset($_SESSION['username'])){
		header("location: login.php");
	}
	require('koneksi.php');
	$periode=$_GET['periode'];
	$sql="select * from t_periode where periode='".$periode."'";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_object($result);
?>