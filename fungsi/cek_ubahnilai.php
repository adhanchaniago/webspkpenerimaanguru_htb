<?php
	session_start();
	if (!isset($_SESSION['username'])){
		header("Location: login.php");
	}
	require('koneksi.php');
	$nilai=$_GET['nilai'];
	$sql="select * from t_nilai_minimum_kelulusan where nilai='" .$nilai."'";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_object($result);
?>