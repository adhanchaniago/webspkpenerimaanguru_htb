<?php
$servername="localhost";
$username="root";
$password="";
$dbname="spkpenerimaanguru_db";
//create connection
$conn = mysqli_connect($servername, $username, $password, $dbname); // Establishing Connection with Server..
//check connection
if (!$conn) {
	?> <script>alert("gagal")</script>
	<?php
	die("Connection failed: " . mysqli_connect_error());
}
?>