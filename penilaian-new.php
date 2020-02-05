<?php include "fungsi/cek_login.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include "fungsi/run_title.php" ?>
<?php include "fungsi/run_css.php" ?>
</head>
<body>
<div class="page-container"> 
<!-- top navbar -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation" style="background-color:#3867d6">
<div class="container">
<div class="navbar-header">
	<a class="navbar-brand" href="#" style="color:#FFFFFF">SPK | PENERIMAAN GURU DENGAN METODE SAW (<i>Simple Additive Weighting</i>).</a>
</div>
</div>
</div>
<div class="container">
<div class="row row-offcanvas row-offcanvas-left"  style="background-color:#ecf0f1"> 
<!-- sidebar -->
<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
	<ul class="nav">
		<li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
		<li><a href="data-calonguru.php"><span class="glyphicon glyphicon-user"></span> Calon Guru</a></li>
		<li><a href="aspek-penilaian.php"><span class="glyphicon glyphicon-triangle-right"></span> Kriteria</a></li>
		<li><a href="subkriteria-aspek.php"><span class="glyphicon glyphicon-menu-right"></span> Sub Kriteria</a></li>
		<li><a href="#"><span class="glyphicon glyphicon-pencil"></span> Proses Penilaian</a></li>   
		<li><a href="proses-penentuan.php"><span class="glyphicon glyphicon-sort"></span> Proses Perangkingan</a></li>
		<li><a href="nilailulus.php"><span class="glyphicon glyphicon-ok"></span> Pengaturan Nilai Lulus</a></li>
        <li><a href="periode.php"><span class="glyphicon glyphicon-time"></span> Pengaturan Periode Seleksi</a></li>
		<li><a href="akun.php"><span class="glyphicon glyphicon-user"></span> Pengaturan Akun</a></li>
		<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>       
	</ul>
</div>
<!-- main area -->
<div class="col-xs-12 col-sm-9">
	<h3>TAMBAH PENILAIAN CALON GURU</h3>
<div class="panel panel-default">
<div class="panel-heading">Note: INPUT NILAI HARUS 5 KALI (SESUAI DENGAN SEMUA ASPEK) !!!</div>
<div class="table-responsive">
	<table class="table table-striped">
		<tr><td>Periode</td><td>
		<select id="periode" rows="3" class="form-control" disabled=disabled onchange="tampilkan()">
  		<?php
		$kon = mysqli_connect("localhost",'root',"","spkpenerimaanguru_db");
		if (!$kon){
      			die("Koneksi database gagal:".mysqli_connect_error());}
			$sql="select * from t_periode";
			$hasil=mysqli_query($kon,$sql);
			$no=0;
		while ($data = mysqli_fetch_array($hasil)) {
			$no++;
		?>
			<option value="<?php echo $data['periode'];?>">
			<?php echo $data['periode'];?></option>
		<?php } ?>
		</select>
		</td></tr>
        <tr><td>Tahun Periode</td><td>
		<select id="tahun" rows="3" class="form-control" disabled=disabled onchange="tampilkan()">
  		<?php
		$kon = mysqli_connect("localhost",'root',"","spkpenerimaanguru_db");
		if (!$kon){
      			die("Koneksi database gagal:".mysqli_connect_error());}
			$sql="select * from t_periode";
			$hasil=mysqli_query($kon,$sql);
			$no=0;
		while ($data = mysqli_fetch_array($hasil)) {
			$no++;
		?>
			<option value="<?php echo $data['tahun'];?>">
			<?php echo $data['tahun'];?></option>
		<?php } ?>
		</select>
		</td></tr>
        <tr><td>Pilih Calon Guru</td><td>
		<select id="no_calonguru" rows="3" class="form-control" onchange="tampilkan()">
  		<?php
		$kon = mysqli_connect("localhost",'root',"","spkpenerimaanguru_db");
		if (!$kon){
      			die("Koneksi database gagal:".mysqli_connect_error());}
			$sql="select * from t_calonguru";
			$hasil=mysqli_query($kon,$sql);
			$no=0;
		while ($data = mysqli_fetch_array($hasil)) {
			$no++;
		?>
			<option value="<?php echo $data['no_calonguru'];?>">
			<?php echo $data['no_calonguru'];?></option>
		<?php } ?>
		</select>
		</td></tr>
        <tr><td>Pilih Id Kriteria</td><td>
		<select id="id_aspek" rows="3" class="form-control" onchange="tampilkan()">
  		<?php
		$kon = mysqli_connect("localhost",'root',"","spkpenerimaanguru_db");
		if (!$kon){
      			die("Koneksi database gagal:".mysqli_connect_error());}
			$sql="select * from t_komponen_penilaian ";
			$hasil=mysqli_query($kon,$sql);
			$no=0;
		while ($data = mysqli_fetch_array($hasil)) {
			$no++;
		?>
			<option value="<?php echo $data['id'];?>">
			<?php echo $data['aspek_penilaian'];?></option>
		<?php } ?>
		</select>
		</td></tr>
        <tr><td>Pilih Keterangan Nilai</td><td>
		<select id="keterangannilai" rows="3" class="form-control" onchange="tampilkan()">
  		<?php
		$kon = mysqli_connect("localhost",'root',"","spkpenerimaanguru_db");
		if (!$kon){
      			die("Koneksi database gagal:".mysqli_connect_error());}
			$sql="select * from t_subkriteria";
			$hasil=mysqli_query($kon,$sql);
			$no=0;
		while ($data = mysqli_fetch_array($hasil)) {
			$no++;
		?>
			<option value="<?php echo $data['nilai'];?>">
			<?php echo $data['nilai'];?></option>
		<?php } ?>
		</select>
		</td></tr>
        <tr><td>Pilih Nilai</td><td>
		<select id="nilai" rows="3" class="form-control" onchange="tampilkan()">
  		<?php
		$kon = mysqli_connect("localhost",'root',"","spkpenerimaanguru_db");
		if (!$kon){
      			die("Koneksi database gagal:".mysqli_connect_error());}
			$sql="select * from t_subkriteria";
			$hasil=mysqli_query($kon,$sql);
			$no=0;
		while ($data = mysqli_fetch_array($hasil)) {
			$no++;
		?>
			<option value="<?php echo $data['bobot'];?>">
			<?php echo $data['bobot'];?></option>
		<?php } ?>
		</select>
		</td></tr>
		<tr><td></td><td><input type="button" size="3" id="btnSave" value="Simpan" class="btn btn-primary btn-sm"></td></tr>
</table>
</div>
</div>
</div><!-- /.col-xs-12 main -->
</div><!--/.row-->
</div><!--/.container-->
<div class="navbar navbar-default navbar-fixed-bottom" role="navigation" style="background-color:#3867d6">
<a class="navbar-brand" style="color:#FFFFFF"><?php include "fungsi/run_footer.php" ?></a>
</div>
</div>
<?php include "fungsi/run_js.php" ?>
<?php include "fungsi/run_js_penilaian.php" ?>
</body>
</html>