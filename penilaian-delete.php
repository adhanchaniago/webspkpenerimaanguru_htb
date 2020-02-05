<?php
//Fetching Values from URL
	require('koneksi.php');
	$id=$_GET['id'];			
	$sql_delete="delete from t_nilai_calonguru where id=".$id;
	$rslt=mysqli_query($conn,$sql_delete);
	if($rslt){
		echo "Data Kriteria Berhasil Dihapus!";?><script>history.go(-1)</script><?php
	}else{
		echo "Data Kriteria Gagal Dihapus!";
	}
?>