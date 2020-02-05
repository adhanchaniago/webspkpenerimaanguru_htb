<?php
//Fetching Values from URL
	require('koneksi.php');
$aspek_penilaian=$_POST['aspek_penilaian1'];
$kode=$_POST['kode1'];
$nilai=$_POST['nilai1'];
$keterangannilai=$_POST['keterangannilai1'];
	$bobot=$_POST['bobot1'];			
	$sql_insert="insert into t_subkriteria (aspek_penilaian,kode,nilai,keterangannilai,bobot) values (
'".$aspek_penilaian."',
'".$kode."',
'".$nilai."',
'".$keterangannilai."',
'".$bobot."'
)";
	$rslt=mysqli_query($conn,$sql_insert);
	if($rslt){
		echo "Data Aspek Berhasil Diinput!";
	}else{
		echo "Data Aspek Gagal Diinput!";
	}
?>