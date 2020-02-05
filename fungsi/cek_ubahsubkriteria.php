<?php
	session_start();
	if (!isset($_SESSION['username'])){
		header("Location: login.php");
	}
	require('koneksi.php');
	$id=$_GET['id'];
	$sql="select * from t_subkriteria where id=".$id;
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_object($result);
?>