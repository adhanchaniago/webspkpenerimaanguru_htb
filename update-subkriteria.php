<?php
//Fetching Values from URL
	require('koneksi.php');
	$id=$_POST['id1'];
$aspek_penilaian=$_POST['aspek_penilaian1'];
$kode=$_POST['kode1'];
$nilai=$_POST['nilai1'];
$keterangannilai=$_POST['keterangannilai1'];
$bobot=$_POST['bobot1'];
	$sql_update="update t_subkriteria set 
aspek_penilaian='".$aspek_penilaian."',
kode='".$kode."',
nilai='".$nilai."',
keterangannilai='".$keterangannilai."',
bobot=".$bobot." 
where id=".$id;
	$rslt=mysqli_query($conn,$sql_update);
	if($rslt){
		echo "Data Berhasil Diperbaharui!";
	}else{
		echo "Data Gagal Diperbaharui!";
	}
?>