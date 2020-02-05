<?php
//Fetching Values from URL
	require('koneksi.php');
		$no_calonguru=$_POST['no_calonguru'];
		$nama_lengkap=$_POST['nama_lengkap'];
		$alamat=$_POST['alamat'];
		$jenkel=$_POST['jenkel'];
		$no_telp=$_POST['no_telp'];
		$masa_kerja_tahun=$_POST['masa_kerja_tahun'];
		$masa_kerja_bulan=$_POST['masa_kerja_bulan'];
	$sql_update="update t_calonguru set nama_lengkap='".$nama_lengkap."',alamat='".$alamat."',no_telp='".$no_telp."',jenkel='".$jenkel."',masa_kerja_tahun='".$masa_kerja_tahun."',masa_kerja_bulan='".$masa_kerja_bulan."' where no_calonguru='".$no_calonguru."'";
	$rslt=mysqli_query($conn,$sql_update);
	if($rslt){
		echo "Data Calon Guru Berhasil Diperbaharui";
	}else{
		echo mysqli_error($conn); 
	}
?>
	 