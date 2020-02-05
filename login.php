<!DOCTYPE html>
<html lang="en">
<head>
<?php include "fungsi/run_title.php" ?>
<?php include "fungsi/run_js.php" ?>
<?php include "fungsi/login.php" ?>
<link href="css/login.css" rel='stylesheet' type='text/css'/>
<!--[if lt IE 9]>
<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>
<body>
	<div class="main">
	<div class="login-form">
	<div class="head">
		<img src="images/user.png" alt=""/>
	</div>
		<h1>Silakan Masuk!</h1>
	<form>
		<input type="text" name="user" id="login-username" placeholder="Masukkan Username Anda!"><br><br>
		<input type="password" name="pass" id="login-password" placeholder="Masukkan Password Anda!"><br><br>
		<input type="submit" name="login" id="btnLogin" value="Klik di sini untuk Masuk">
	</form>
    <form action="cek_peserta.php">
        <input type="submit" value="Klik di sini untuk Cek Hasil Peserta">
    </form>
	</div>
	</div>
</body>
</html>