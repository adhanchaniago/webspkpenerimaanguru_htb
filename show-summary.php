<?php
//Fetching Values from URL
	require('koneksi.php');
	$periode2=$_POST['periode1'];
	$tahun2=$_POST['tahun1'];
	
	$sql_cari_summary="select * from t_data_kelulusan where periode=".$periode2." and tahun=".$tahun2;
	$rslt=mysqli_query($conn,$sql_cari_summary);
	if(mysqli_num_rows($rslt)<1){
		echo "Tidak Ditemukan";
	}else{		
		//tampilkan peserta lulus dengan urutan dari nilai tertinggi
		echo "<div class='panel panel-info'>";
		echo "<div class='panel-heading'>
		<strong>Daftar Peserta Lulus: </strong>Dari Nilai tertinggi
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a class='btn btn-success' id='btnPrintLulus' href='print-daftar-lulus.php?periode=".$periode2."&tahun=".$tahun2."'
		target='_blank'>Print</a>
		</div>";
		echo "<table class='table table-striped table-bordered'><thead>
		<th style='text-align:center'>Id Pendaftar</th>
		<th style='text-align:center'>Nama Lengkap</th>
		<th style='text-align:center'>No. Telepon</th>
		<th style='text-align:center'>Total Nilai</th></thead>";
		$sqlTampilKelulusan="select tdl.no_calonguru,tp.nama_lengkap,tp.no_telp,tdl.nilai from t_data_kelulusan tdl inner join t_calonguru tp on tp.no_calonguru=tdl.no_calonguru where tdl.periode=".$periode2." and tdl.tahun=".$tahun2." and status='lulus' order by tdl.nilai desc";
		$sqlTampilKelulusan_Result=mysqli_query($conn,$sqlTampilKelulusan);
		while($row=mysqli_fetch_object($sqlTampilKelulusan_Result)){
			echo "<tr>
			<td style='text-align:center'>".$row->no_calonguru."</td>
			<td style='text-align:center'>".$row->nama_lengkap."</td>
			<td style='text-align:center'>".$row->no_telp."</td>
			<td style='text-align:center'>".$row->nilai."</td></tr>";
		}
		echo "</table></div>";
		
		//tampilkan peserta tidak lulus dengan urutan dari nilai tertinggi
		echo "<div class='panel panel-danger'>";
		echo "<div class='panel-heading'>
		<strong>Daftar Peserta Tidak Lulus: </strong>Dari Nilai tertinggi
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a class='btn btn-success' id='btnPrintTidakLulus' href='print-daftar-tidak-lulus.php?periode=".$periode2."&tahun=".$tahun2."'
		target='_blank'>Print</a>
		</div>";
		echo "<table class='table table-striped table-bordered'><thead>
		<th style='text-align:center'>Id Pendaftar</th>
		<th style='text-align:center'>Nama Lengkap</th>
		<th style='text-align:center'>No. Telepon</th>
		<th style='text-align:center'>Total Nilai</th></thead>";
		$sqlTampilKelulusan="select tdl.no_calonguru,tp.nama_lengkap,tp.no_telp,tdl.nilai from t_data_kelulusan tdl inner join t_calonguru tp on tp.no_calonguru=tdl.no_calonguru where tdl.periode=".$periode2." and tdl.tahun=".$tahun2." and status='tidak' order by tdl.nilai desc";
		$sqlTampilKelulusan_Result=mysqli_query($conn,$sqlTampilKelulusan);
		while($row=mysqli_fetch_object($sqlTampilKelulusan_Result)){
			echo "<tr><td style='text-align:center'>".$row->no_calonguru."</td>
			<td style='text-align:center'>".$row->nama_lengkap."</td>
			<td style='text-align:center'>".$row->no_telp."</td>
			<td style='text-align:center'>".$row->nilai."</td></tr>";
		}
		echo "</table></div><br><br>";
	}
		 // Connection Closed
		 mysqli_close($conn);
?>	