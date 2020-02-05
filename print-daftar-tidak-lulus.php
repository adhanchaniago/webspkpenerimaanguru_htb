<?php include "fungsi/cek_periode.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include "fungsi/run_title.php" ?>
<?php include "fungsi/run_css.php" ?>
</head>
<body>
<div class="page-container">
<?php
	$sql_cari_summary="select * from t_data_kelulusan where periode=".$periode2." and tahun=".$tahun2;
	$rslt=mysqli_query($conn,$sql_cari_summary);
	if(mysqli_num_rows($rslt)<1){
		echo "Data Tidak Ditemukan!";
	}else{		
		//tampilkan peserta tidak lulus dengan urutan dari nilai tertinggi
?>
		<div class='panel panel-danger'>
		<div class='panel-heading'>
		<center><img src="images/logo.png" width="200px"></center>
		<h3><center>SPK | PENERIMAAN GURU DENGAN METODE SAW</center>
		<hr>
		<center>DAFTAR PESERTA TIDAK LULUS PENERIMAAN GURU</center></h3>
		</div>
		</div>
<?php
		echo "<div class='panel panel-danger'>";
		echo "<div class='panel-heading'><strong><center>Daftar Peserta Tidak Lulus: </strong>Dari Nilai Terendah</center></div>";
		echo "<table class='table table-striped table-bordered'><thead>
		<th style='text-align:center'>No. Calon Guru</th>
		<th style='text-align:center'>Nama Lengkap</th>
        <th style='text-align:center'>No. Telepon</th>
		<th style='text-align:center'>Total Nilai</th></thead>";
		$sqlTampilKelulusan="select tdl.no_calonguru,tp.nama_lengkap,tp.no_telp,tdl.nilai from t_data_kelulusan tdl inner join t_calonguru tp on tp.no_calonguru=tdl.no_calonguru where tdl.periode=".$periode2." and tdl.tahun=".$tahun2." and status='tidak' order by tdl.nilai desc";
		$sqlTampilKelulusan_Result=mysqli_query($conn,$sqlTampilKelulusan);
		while($row=mysqli_fetch_object($sqlTampilKelulusan_Result)){
			echo "<tr>
			<td style='text-align:center'>".$row->no_calonguru."</td>
			<td style='text-align:center'>".$row->nama_lengkap."</td>
			<td style='text-align:center'>".$row->no_telp."</td>
			<td style='text-align:center'>".$row->nilai."</td></tr>";
		}
		echo "</table></div>";
	}
	?>
</div><!--/.page-container-->
<?php include "fungsi/run_print.php" ?>
<?php include "fungsi/run_js.php" ?>
<?php include "fungsi/run_js_prosessaw.php" ?>
</body>
</html>