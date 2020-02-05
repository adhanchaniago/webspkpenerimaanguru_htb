<?php
//Fetching Values from URL
	require('koneksi.php');
		$id=$_POST['id'];
		$no_calonguru=$_GET ['no_calonguru'];
		$nama_lengkap=$_POST['nama_lengkap'];
		$alamat=$_POST['alamat'];
		$no_telp=$_POST['no_telp'];
		$jenkel=$_POST['jenkel'];
		$masa_kerja_tahun=$_POST['masa_kerja_tahun'];
		$masa_kerja_bulan=$_POST['masa_kerja_bulan'];		
	
	$sql_delete="delete from t_calonguru ".
		" where no_calonguru='" . $no_calonguru. "'";
	$rslt=mysqli_query($conn,$sql_delete);
	if($rslt){
		echo "Data Calon Guru Berhasil Dihapus";?>
		<script>history.go(-1)</script>
<?php
	}else{
		echo mysqli_error($conn); 
	}
?>