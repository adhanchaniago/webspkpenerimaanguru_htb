<?php
	require('koneksi.php');
	$sql="select * from t_nilai_minimum_kelulusan";
  	$result = mysqli_query($conn, $sql);
  	while($row = mysqli_fetch_object($result))
  	{
	 	echo "<tr>
			<td>".$row->nilai."</td>
			<td>
			<a href='ubah-lulus.php?nilai=".$row->nilai."'>Edit</a>
			</td>
			</tr>";
  	}
?>