<?php
	require('koneksi.php');
	$periode2=$_GET['periode'];
	$tahun2=$_GET['tahun'];
	if($periode2==1){
		$per="Januari - Juni ".$tahun2;
	}else{
		$per="Juli - Desember ".$tahun2;
	}
?>