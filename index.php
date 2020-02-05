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
<div class="row row-offcanvas row-offcanvas-left" style="background-color:#ecf0f1"> 
<!-- sidebar -->
<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
	<ul class="nav">
		<li class="active"><a href="#"><span class="glyphicon glyphicon-home"></span> Home</a></li>
		<li><a href="data-calonguru.php"><span class="glyphicon glyphicon-user"></span> Calon Guru</a></li>
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
	<h1>SELEKSI PENERIMAAN GURU DENGAN METODE SAW (<i>Simple Additive Weighting</i>).</a></h1>
	<hr>
	<p>Kegiatan dalam menerima calon guru merupakan kegiatan yang sering dilaksanakan oleh setiap sekolah.
	Tujuan penelitian ini adalah Merancang suatu perangkat lunak yang dapat membantu pihak sekolah dalam 
	menentukan calon guru yang dapat diterima atau tidak dengan sistem yang terkomputerisasi sehingga proses 
	pengambilan keputusan ini dapat lebih efisien. Membuat "Sistem Pendukung Keputusan" seleksi guru baru dengan 
	data yang terstukturisasi, dapat diakses secara cepat, langsung, dan akurat.</p> 
	<p>Memperbaiki sistem akademik dalam seleksi guru. Metode yang digunakan dalam perancangan sistem ini adalah 
	SAW (<i>Simple Additive Weighting</i>). Hasil dari perancangan program aplikasi ini dibuat untuk menanggulangi kendala 
	kesalahan yang kadang terjadi dan tanpa disadari telah sedikit menghambat dalam sistem penerimaan guru.
	Sehingga diharapkan dengan adanya sistem ini diharapkan dapat membantu dalam mengambil keputusan.</p>        
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