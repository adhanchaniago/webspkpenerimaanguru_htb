<?php
	session_start();
	if (!isset($_SESSION['username'])){
		header("Location: login.php");
	}
	require('koneksi.php');
	$sql="select * from t_periode where status='active'";
	$rslt=mysqli_query($conn,$sql);
	$row=mysqli_fetch_object($rslt);
	if($row->periode==1){
		$per="Januari - Juni ".$row->tahun;
	}else{
		$per="Juli - Desember ".$row->tahun;
	}
?>