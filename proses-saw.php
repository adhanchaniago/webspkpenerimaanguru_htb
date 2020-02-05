<?php
//Fetching Values from URL
	require('koneksi.php');
	$periode2=$_POST['periode1'];
	$tahun2=$_POST['tahun1'];
	$idAspek=array();
	$nama=array();
	$no_calonguru=array();
	$maxPerAspek=array();
	$minPerAspek=array();

	//cari_nilai_minimum kelulusan
	$sql_lulus="select nilai from t_nilai_minimum_kelulusan";
	$sql_lulus_result=mysqli_query($conn,$sql_lulus);
	$row=mysqli_fetch_object($sql_lulus_result);
	$NilaiMinimumKelulusan=$row->nilai;
	
	//cari daftar kriteria, simpan di array
	$sql_kriteria="select distinct(id_aspek) as id_aspek from t_nilai_calonguru where periode=".$periode2." and tahun=".$tahun2;
	$sql_kriteria_result=mysqli_query($conn,$sql_kriteria);
	echo "<div class='panel panel-primary'>";
	echo "<div class='panel-heading'><strong>Langkah 1: </strong>Jika BENEFIT ambil dari Nilai Tertinggi, Jika COST ambil dari Nilai Terendah:</div>";
	echo "<table class='table table-striped table-bordered table-rounded'><thead><th style='text-align:center'>ID KRITERIA</th>";
    $i=0;
	while ($row=mysqli_fetch_object($sql_kriteria_result)){
        $i+=1;
		$idAspek[$i]=$row->id_aspek;
		echo "<th style='text-align:center'>".$idAspek[$i]."</th>";
	}
	echo "</thead><tr><td style='text-align:center'>Nilai Tertinggi</td>";
	//cari nilai maximum per kriteria dari seluruh peserta dalam 1 periode, simpan di array
	
	for($j=1;$j<=$i;$j++){
		$sql_max="select max(nilai) as nilai_max from t_nilai_calonguru where id_aspek=".$idAspek[$j]." and periode=".$periode2." and tahun=".$tahun2;
		$sql_max_result=mysqli_query($conn,$sql_max);
		$row=mysqli_fetch_object($sql_max_result);
		$maxPerAspek[$j]=$row->nilai_max;
		echo "<td style='text-align:center'>".$maxPerAspek[$j]."</td>";
	}
	echo "</thead><tr><td style='text-align:center'>Nilai Terendah</td>";
    //cari nilai maximum per kriteria dari seluruh peserta dalam 1 periode, simpan di array
	
    for($j=1;$j<=$i;$j++){
		$sql_min="select min(nilai) as nilai_min from t_nilai_calonguru where id_aspek=".$idAspek[$j]." and periode=".$periode2." and tahun=".$tahun2;
		$sql_min_result=mysqli_query($conn,$sql_min);
		$row=mysqli_fetch_object($sql_min_result);
		$minPerAspek[$j]=$row->nilai_min;
		echo "<td style='text-align:center'>".$minPerAspek[$j]."</td>";
	}
	echo "</tr></table></div><br>";
	
	//cari no_calonguru dan nama ditabel nilai berdasarkan periode dan tahun
	$sql_cari_no_calonguru="select distinct(tnp.no_calonguru) as no_calonguru,tp.nama_lengkap from t_nilai_calonguru tnp inner join t_calonguru tp on tp.no_calonguru=tnp.no_calonguru where periode=".$periode2." and tahun=".$tahun2;
	$sql_cari_no_calonguru_result=mysqli_query($conn,$sql_cari_no_calonguru);
	$k=0;
	while ($row=mysqli_fetch_object($sql_cari_no_calonguru_result)){
		$k+=1;
		$no_calonguru[$k]=$row->no_calonguru;
		$nama[$k]=$row->nama_lengkap;
	}	
	
	//normalisasi tabel, membagi nilai atribut/aspek per peserta dengan nilai maximum per atribut
	
	//$nilai_peserta_per_aspek=array(array());
	echo "<div class='panel panel-primary'>";
	echo "<div class='panel-heading'><Strong>Langkah 2: </strong>Data Nilai Awal Pendaftar (Dari Proses Penilaian):</div>";
	echo "<table class='table table-striped table-bordered table-rounded'>
	<tr>
	<td style='text-align:center' rowspan='2'>ID PENDAFTAR</td>
	<td style='text-align:center' rowspan='2'>NAMA PESERTA</td>
	<td style='text-align:center' colspan='$i'>KRITERIA</td>
	</tr><tr>";
	for($x=1;$x<=$i;$x++){
		echo "<td style='text-align:center'>".$idAspek[$x]."</td>";
	}
	echo "</tr>";
	
	for ($m=1;$m<=$k;$m++){
		//perulangan setiap peserta $k=jumlah peserta
		echo "<tr><td style='text-align:center'>".$no_calonguru[$m]."</td>
		<td style='text-align:center'>".$nama[$m]."</td>";
    for($n=1;$n<=$i;$n++){
			//perulangan setiap aspek peserta ke-$m, sebanyak jumlah aspek($i)
			$sql_cari_keterangannilai="select keterangannilai from t_nilai_calonguru where no_calonguru='".$no_calonguru[$m]."' and id_aspek=".$idAspek[$n]." and periode=".$periode2." and tahun=".$tahun2; 
    $sql_cari_keterangannilai_result=mysqli_query($conn,$sql_cari_keterangannilai);
			$row=mysqli_fetch_object($sql_cari_keterangannilai_result);
			$keterangannilai_peserta_per_aspek[$n][$m]=$row->keterangannilai;
			echo "<td style='text-align:center'>".$keterangannilai_peserta_per_aspek[$n][$m]."</td>";
		}
		echo "</tr>";	
	}
	echo "</table></div>";
	
    //konversi
	echo "<div class='panel panel-primary'>";
	echo "<div class='panel-heading'><strong>Langkah 3: </strong>Konversi Nilai Awal ke Dalam Nilai Kecocokan:</div>";
	echo "<table class='table table-striped table-bordered table-rounded'>
	<tr>
	<td style='text-align:center' rowspan='2'>ID PENDAFTAR</td>
	<td style='text-align:center' rowspan='2'>NAMA PESERTA</td>
	<td style='text-align:center' colspan='$i'>KRITERIA</td>
	</tr><tr>";
	for($x=1;$x<=$i;$x++){
		echo "<td style='text-align:center'>".$idAspek[$x]."</td>";
	}
	echo "</tr>";
	
	for ($m=1;$m<=$k;$m++){
		//perulangan setiap peserta $k=jumlah peserta
		echo "<tr><td style='text-align:center'>".$no_calonguru[$m]."</td>
		<td style='text-align:center'>".$nama[$m]."</td>";
		for($n=1;$n<=$i;$n++){
			//perulangan setiap aspek peserta ke-$m, sebanyak jumlah aspek($i)
			$sql_cari_nilai="select nilai from t_nilai_calonguru where no_calonguru='".$no_calonguru[$m]."' and id_aspek=".$idAspek[$n]." and periode=".$periode2." and tahun=".$tahun2; 
			$sql_cari_nilai_result=mysqli_query($conn,$sql_cari_nilai);
			$row=mysqli_fetch_object($sql_cari_nilai_result);
			$nilai_peserta_per_aspek[$n][$m]=$row->nilai;
			echo "<td style='text-align:center'>".$nilai_peserta_per_aspek[$n][$m]."</td>";
		}
		echo "</tr>";	
	}
	echo "</table></div>";

	//normalisasi tabel, nilai setiap aspek per peserta di bagi dengan nilai tertinggi per aspek
	echo "<div class='panel panel-primary'>";
	echo "<div class='panel-heading'><strong>Langkah 4:</strong> Normalisasi:</div>";
	echo "<div class='table-responsive'>";
	echo "<table class='table table-striped table-bordered'>
	<tr><td style='text-align:center' rowspan='2'>ID PENDAFTAR</td>
	<td style='text-align:center' rowspan='2'>NAMA PESERTA</td>
	<td style='text-align:center' colspan='$i'>KRITERIA</td></tr>";
	echo "<tr>";
	for($x=1;$x<=$i;$x++){
		echo "<td style='text-align:center'>".$idAspek[$x]."</td>";
	}
	echo "</tr>";
		for ($z=1;$z<=$k;$z++){
	
		//perulangan setiap peserta $k=jumlah peserta
			echo "<tr><td style='text-align:center'>".$no_calonguru[$z]."</td>
			<td style='text-align:center'>".$nama[$z]."</td>";
			for($y=1;$y<=$i;$y++){
				//perulangan setiap aspek peserta ke-$m, sebanyak jumlah aspek($i)
				$nilai_normalisasi[$y][$z]=$nilai_peserta_per_aspek[$y][$z] / $maxPerAspek[$y];
			$nilai_normalisasi[$y][$z]=round($nilai_normalisasi[$y][$z],2);	
				echo "<td style='text-align:center'>".$nilai_normalisasi[$y][$z]."</td>";
			}
			echo "</tr>";	
	}
	echo "</table></div></div>";
	
	//tampilkan persentase bobot masing-masing kriteria
	$sql_bobot="select distinct(tnp.id_aspek) as id_aspek,bobot from t_nilai_calonguru tnp inner join t_komponen_penilaian tkp on tkp.id=tnp.id_aspek where periode=".$periode2." and tahun=".$tahun2;
	$sql_bobot_result=mysqli_query($conn,$sql_bobot);
	
	echo "<div class='panel panel-primary'>";
	echo "<div class='panel-heading'><strong>Langkah 5: </strong>Data Nilai Bobot per-Kriteria:</div>";
	echo "<table class='table table-striped table-bordered'><thead><th style='text-align:center'>ID KRITERIA</th>";
	for ($b=1;$b<=$i;$b++){
		echo "<th style='text-align:center'>".$idAspek[$b]."</td>";
	}
	echo "</thead><tr><td style='text-align:center'>Bobot</td>";
	$a=0;
	while ($row=mysqli_fetch_object($sql_bobot_result)){
		$a+=1;
		$bobotPerAspek[$a]=$row->bobot;
		$bobotPerAspek[$a]=round($bobotPerAspek[$a],2);
		echo "<td  style='text-align:center'>".$bobotPerAspek[$a]."</td>";
	}
	echo "</tr></table></div>";
	
		//normalisasi tabel, nilai setiap aspek per peserta di bagi dengan nilai tertinggi per aspek
	echo "<div class='panel panel-primary'>";
	echo "<div class='panel-heading'><strong>Langkah 6: </strong>Perangkingan:</div>";
	echo "<div class='table-responsive'>";
	echo "<table class='table table-striped table-bordered'><tr>
	<td style='text-align:center' rowspan='2'>ID PENDAFTAR</td>
	<td style='text-align:center' rowspan='2'>NAMA PESERTA</td>
	<td style='text-align:center' colspan='$i'>KRITERIA</td>
	<td rowspan='2'>TOTAL:</td><tr>";
	for($x=1;$x<=$i;$x++){
		echo "<td style='text-align:center'>".$idAspek[$x]."</td>";
	}
	echo "</tr>";
	
		//hapus data di tabel kelulusan periode aktif
		$sqlHapus=mysqli_query($conn,"delete from t_data_kelulusan where periode=".$periode2." and tahun=".$tahun2);
		for ($y=1;$y<=$k;$y++){
		//perulangan setiap peserta $k=jumlah peserta
		$total[$y]=0;
			echo "<tr style='text-align:center'><td style='text-align:center'>".$no_calonguru[$y]."</td>
			<td style='text-align:center'>".$nama[$y]."</td>";
			for($z=1;$z<=$i;$z++){
				//perulangan setiap aspek peserta ke-$m, sebanyak jumlah aspek($i)
				$nilai_normalisasi[$z][$y]=$nilai_peserta_per_aspek[$z][$y] / $maxPerAspek[$z];
				$nilai_normalisasi[$z][$y]=round($nilai_normalisasi[$z][$y],2);	
				echo "<td style='text-align:center'>(".$nilai_normalisasi[$z][$y].")(".$bobotPerAspek[$z].")</td>";
				$total[$y]=$total[$y] + ($nilai_normalisasi[$z][$y] * $bobotPerAspek[$z]);
			}
			if($total[$y]<$NilaiMinimumKelulusan){
				$bg=" bgcolor='#EEE0000' style='color:#EEEEEE'";
				$status="tidak";
			}else{
				$bg="";
				$status="lulus";
			}
			echo "<td".$bg." style='text-align:center'>".round($total[$y],3)."</td></tr>";
			//simpan ke tabel data kelulusan
			$sqlSimpan="insert into t_data_kelulusan(periode,tahun,no_calonguru,nilai,status) values (".
						$periode2.",".$tahun2.",'".$no_calonguru[$y]."',".$total[$y].",'".$status."')";
			mysqli_query($conn,$sqlSimpan);
	}
	echo "<tr><td colspan='".($z+2)."'align=right>Nilai Miminum Kelulusan = ".$NilaiMinimumKelulusan.", Warna Merah = Tidak Lulus</td></tr></table></div>";
	echo "</table></div><hr></div>";
	
	//tampilkan peserta lulus dengan urutan dari nilai tertinggi
	echo "<div class='panel panel-info'>";
	echo "<div class='panel-heading'><strong>Daftar Peserta Lulus: </strong>Dari Nilai tertinggi</div>";
	echo "<table class='table table-striped table-bordered'><thead>
	<th style='text-align:center'>Id Pendaftar</th>
	<th style='text-align:center'>Nama Lengkap</th>
	<th style='text-align:center'>No Telepon</th>
	<th style='text-align:center'>Total Nilai</th></thead>";
	$sqlTampilKelulusan="select tdl.no_calonguru,tp.nama_lengkap,tp.no_telp,tdl.nilai from t_data_kelulusan tdl inner join t_calonguru tp on tp.no_calonguru=tdl.no_calonguru where tdl.periode=".$periode2." and tdl.tahun=".$tahun2." and status='lulus' order by tdl.nilai desc";
	$sqlTampilKelulusan_Result=mysqli_query($conn,$sqlTampilKelulusan);
	while($row=mysqli_fetch_object($sqlTampilKelulusan_Result)){
		echo "<tr><td style='text-align:center'>".$row->no_calonguru."</td>
		<td style='text-align:center'>".$row->nama_lengkap."</td>
		<td style='text-align:center'>".$row->no_telp."</td>
		<td style='text-align:center'>".$row->nilai."</td></tr>";
	}
	echo "</table></div><hr></div>";
	
	//tampilkan peserta tidak lulus dengan urutan dari nilai tertinggi
	echo "<div class='panel panel-danger'>";
	echo "<div class='panel-heading'><strong>Daftar Peserta Tidak Lulus: </strong>Dari Nilai tertinggi</div>";
	echo "<table class='table table-striped table-bordered'><thead>
	<th style='text-align:center'>Id Pendaftar</th>
	<th style='text-align:center'>Nama Lengkap</th>
	<th style='text-align:center'>No Telepon</th>
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
	 // Connection Closed
	 mysqli_close($conn);
?>	