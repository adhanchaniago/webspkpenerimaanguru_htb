<?php
//Fetching Values from URL
	require('koneksi.php');
$id=$_POST['id1'];
$keterangannilai=$_POST['keterangannilai1'];
$nilai=$_POST['nilai1'];
	$sql_update="update t_nilai_calonguru set 
keterangannilai='".$keterangannilai."',
nilai=".$nilai." 
where id=".$id;
	$rslt=mysqli_query($conn,$sql_update);
	if($rslt){
		echo "Data Berhasil Diperbaharui!";
	}else{
		echo "Data Gagal Diperbaharui!";
	}
?>