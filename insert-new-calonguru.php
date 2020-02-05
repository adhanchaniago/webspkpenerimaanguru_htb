<?php
//Fetching Values from URL
	require('koneksi.php');
		$no_calonguru=$_POST['no_calonguru'];
		$nama_lengkap=$_POST['nama_lengkap'];
		$alamat=$_POST['alamat'];
		$no_telp=$_POST['no_telp'];
		$jenkel=$_POST['jenkel'];
		$masa_kerja_tahun=$_POST['masa_kerja_tahun'];
		$masa_kerja_bulan=$_POST['masa_kerja_bulan'];		
	$sql_insert="insert into t_calonguru (no_calonguru,nama_lengkap,alamat,no_telp,jenkel,masa_kerja_tahun,masa_kerja_bulan) values ('";
	$sql_insert=$sql_insert.
				$no_calonguru."','".$nama_lengkap."','".$alamat."','".$no_telp."','".$jenkel."',".$masa_kerja_tahun.",".$masa_kerja_bulan.")";
	$rslt=mysqli_query($conn,$sql_insert);
	if($rslt){
		echo "Data Calon Guru Berhasil Diinput";
	}else{
		echo mysqli_error($conn);
	}
?>