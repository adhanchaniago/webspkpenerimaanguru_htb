<?php
//Fetching Values from URL
	require('koneksi.php');
$aspek_penilaian=$_POST['aspek_penilaian1'];
    $kode=$_POST['kode1'];
	$deskripsi=$_POST['deskripsi1'];
	$bobot=$_POST['bobot1'];			
	$sql_insert="insert into t_komponen_penilaian (aspek_penilaian,kode,deskripsi,bobot) values ('".$aspek_penilaian."','".$kode."','".$deskripsi."','".$bobot."')";
	$rslt=mysqli_query($conn,$sql_insert);
	if($rslt){
		echo "Data Aspek Berhasil Diinput!";
	}else{
		echo "Data Aspek Gagal Diinput!";
	}
?>
	