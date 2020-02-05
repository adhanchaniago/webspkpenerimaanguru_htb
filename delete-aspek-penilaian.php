<?php
//Fetching Values from URL
	require('koneksi.php');
	$id=$_GET['id'];			
	$sql_delete="delete from t_komponen_penilaian where id=".$id;
	$rslt=mysqli_query($conn,$sql_delete);
	if($rslt){
		echo "Data Aspek Berhasil Dihapus!";?><script>history.go(-1)</script><?php
	}else{
		echo "Data Aspek Gagal Dihapus!";
	}
?>