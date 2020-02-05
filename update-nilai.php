<?php
//Fetching Values from URL
	require('koneksi.php');
		$nilai=$_POST['nilai'];
	$sql_update="update t_nilai_minimum_kelulusan set "."nilai='".$nilai."'";
	$rslt=mysqli_query($conn,$sql_update);
	if($rslt){
		echo "Data Nilai Berhasil Diperbaharui";
	}else{
		echo mysqli_error($conn); 
	}
?>