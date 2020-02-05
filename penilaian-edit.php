<?php include "fungsi/cek_ubahpenilaian.php" ?>
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
	<h3>UBAH PENILAIAN CALON GURU</h3>
<div class="panel panel-default">
<div class="table-responsive">
	<table class="table table-striped">
		<tr><td>ID</td><td><input type="text" id="id" value="<?php echo $id?>" disabled="disabled" class="form-control"></td></tr>
        <Tr><td>Periode</td><td><input type="text" id="periode" class="form-control" value="<?php echo $row->periode?>" disabled="disabled"></td></Tr>
        <Tr><td>Tahun Periode</td><td><input type="text" id="tahun" class="form-control" value="<?php echo $row->tahun?>" disabled="disabled"></td></Tr>
        <Tr><td>Calon Guru</td><td><input type="text" id="no_calonguru" class="form-control" value="<?php echo $row->no_calonguru?>" disabled="disabled"></td></Tr>
        <Tr><td>Id Kriteria</td><td><input type="text" id="id_aspek" class="form-control" value="<?php echo $row->id_aspek?>" disabled="disabled"></td></Tr>
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
<?php include "fungsi/run_js_updatepenilaian.php" ?>
</body>
</html>