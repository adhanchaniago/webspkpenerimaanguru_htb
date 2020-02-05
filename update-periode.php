<?php
//Fetching Values from URL
	require('koneksi.php');
		$periode=$_POST['periode'];
        $tahun=$_POST['tahun'];
	$sql_update="update t_periode set
periode='".$periode."',
tahun='".$tahun."'";
	$rslt=mysqli_query($conn,$sql_update);
	if($rslt){
		echo "Data Periode Berhasil Diperbaharui";
	}else{
		echo mysqli_error($conn); 
	}
?>