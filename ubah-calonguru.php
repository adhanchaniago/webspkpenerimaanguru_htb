<?php include "fungsi/cek_ubahguru.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include "fungsi/run_title.php" ?>
<?php include "fungsi/run_css.php" ?>
</head><body>
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
<div class="row row-offcanvas row-offcanvas-left"style="background-color:#ecf0f1"> 
<!-- sidebar -->
<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
	<ul class="nav">
		<li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
		<li><a href="#"><span class="glyphicon glyphicon-user"></span> Calon Guru</a></li>
		<li><a href="aspek-penilaian.php"><span class="glyphicon glyphicon-triangle-right"></span> Kriteria</a></li>
		<li><a href="subkriteria-aspek.php"><span class="glyphicon glyphicon-menu-right"></span> Sub Kriteria</a></li>
		<li><a href="proses-penilaian.php"><span class="glyphicon glyphicon-pencil"></span> Proses Penilaian</a></li>
		<li><a href="proses-penentuan.php"><span class="glyphicon glyphicon-sort"></span> Proses Perangkingan</a></li>
		<li><a href="nilailulus.php"><span class="glyphicon glyphicon-ok"></span> Pengaturan Nilai Lulus</a></li>
        <li><a href="periode.php"><span class="glyphicon glyphicon-time"></span> Pengaturan Periode Seleksi</a></li>
		<li><a href="akun.php"><span class="glyphicon glyphicon-user"></span> Pengaturan Akun</a></li>
		<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>       
	</ul>
</div> 
<!-- main area -->
<div class="col-xs-12 col-sm-9">
	<h3>UBAH DATA CALON GURU</h3>
<div class="panel panel-default">
<div class="table-responsive">
	<table class="table table-bordered table-striped">
		<input type="hidden" id="no_calonguru_lama" value="<?php echo $row->no_calonguru?>">
			<Tr><td>Id Pendaftar</td><td><input type="text" id="no_calonguru" class="form-control" maxlength="16" value="<?php echo $row->no_calonguru?>" disabled="disabled"></td></Tr>
			<Tr><td>Nama Lengkap</td><td><input type="text" id="nama_lengkap" class="form-control" value="<?php echo $row->nama_lengkap?>"></td></Tr>
			<Tr><td>Alamat</td><td><input type="text" id="alamat" class="form-control" value="<?php echo $row->alamat?>"></td></Tr>
			<Tr><td>No. Telepon</td><td><input type="text" id="no_telp" class="form-control" value="<?php echo $row->no_telp?>"></td></Tr>
			<Tr><td>Jenis Kelamin</td><td><input type="text" id="jenkel" class="form-control" maxlength="16" value="<?php echo $row->jenkel?>" disabled="disabled"></td></Tr>
			<Tr><td>Masa Kerja (Tahun)</td><td><input type="text" id="masa_kerja_tahun" class="form-control" value="<?php echo $row->masa_kerja_tahun?>"></td></Tr>	
			<Tr><td>Masa Kerja (Bulan)</td><td><input type="text" id="masa_kerja_bulan" class="form-control" value="<?php echo $row->masa_kerja_bulan?>"></td></Tr>	
			<Tr><td></td><td><input type="button" id="btnSave" class="btn btn-primary btn-sm" value="Simpan"></td></Tr>
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
<?php include "fungsi/run_js_updateguru.php" ?>
</body>
</html>