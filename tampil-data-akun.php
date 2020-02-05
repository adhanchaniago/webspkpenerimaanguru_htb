<?php
	require('koneksi.php');
	$sql="select * from t_admin";
  	$result = mysqli_query($conn, $sql);
  	while($row = mysqli_fetch_object($result))
  	{
	 	echo "<tr>
			<td>".$row->id."</td>
			<td>".$row->userid."</td>
			<td>".$row->password."</td>
			<td>
			<a href='ubah-akun.php?userid=".$row->userid."'>Edit</a>
			</td>
			</tr>";
  	}
?>