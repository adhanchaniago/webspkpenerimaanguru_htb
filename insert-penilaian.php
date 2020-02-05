<?php
//Fetching Values from URL
require('koneksi.php');
$periode=$_POST['periode1'];
$tahun=$_POST['tahun1'];
$no_calonguru=$_POST['no_calonguru1'];
$id_aspek=$_POST['id_aspek1'];
$keterangannilai=$_POST['keterangannilai1'];
$nilai=$_POST['nilai1'];
	$sql_insert="insert into t_nilai_calonguru (periode,tahun,no_calonguru,id_aspek,keterangannilai,nilai) values (
'".$periode."',
'".$tahun."',
'".$no_calonguru."',
'".$id_aspek."',
'".$keterangannilai."',
'".$nilai."'
)";
	$rslt=mysqli_query($conn,$sql_insert);
	if($rslt){
		echo "Data Penilaian Berhasil Diinput!";
	}else{
		echo "Data Penilaian Gagal Diinput!";
	}
?>