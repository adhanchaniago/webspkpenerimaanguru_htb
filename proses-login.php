<?php
	session_start();
	$username2=$_POST['username1'];
	$password2=$_POST['password1'];
	require('koneksi.php');
	$sql="SELECT * from t_admin where userid='" . $username2 . "' AND password='" . $password2 . "' AND status='admin'";
	$result=mysqli_query($conn,$sql);
	if ($row=mysqli_fetch_object($result)){
			$_SESSION['username']=$row->userid;
			$_SESSION['status']=$row->status;
			echo "berhasil";
	}else{
		echo "username dan password tidak sah" . " " . $username2;
	}
?>