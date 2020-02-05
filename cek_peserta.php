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
		<li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Kembali ke Login</a></li>     
	</ul>
</div>
<!-- main area -->
<div class="col-xs-12 col-sm-9">
	<h3>DATA HASIL SELEKSI CALON GURU:</h3>
<form action="cek_peserta.php" method="get">
 <label>Cari di sini:</label>
 <input type="text" name="cari">&nbsp;&nbsp;
 <input type="submit" class="btn btn-primary btn-sm" value="Cari">
</form>
<br>
<?php 
if(isset($_GET['cari'])){
 $cari = $_GET['cari'];
 echo "<b>Hasil Pencarian: ".$cari."</b>";
}
?>
<br>
<br>
<div class="panel panel-default">
<div class="table-responsive">
	<table class="table table-bordered table-striped">
	<thead>
    <th>Id</th>
    <th>Periode</th>
    <th>Tahun</th>
    <th>No. Calon Guru</th>
    <th>Nilai</th>
    <th>Status</th>
    </thead>
<?php require('tampil-data-peserta.php');?>
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
</body>
</html>