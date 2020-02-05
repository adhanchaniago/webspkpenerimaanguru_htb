<?php
	require('koneksi.php');
	$sql="select * from t_calonguru order by id asc";
  	$result = mysqli_query($conn, $sql);
  	while($row = mysqli_fetch_object($result))
  	{
	 	echo "<tr>
			<td>".$row->id."</td>
			<td>".$row->no_calonguru."</td>
			<td>".$row->nama_lengkap."</td>
			<td>".$row->alamat."</td>
			<td>".$row->no_telp."</td>
			<td>".$row->jenkel."</td>
			<td>".$row->masa_kerja_tahun."</td>
			<td>".$row->masa_kerja_bulan."</td>
			<td>
			<a href='ubah-calonguru.php?no_calonguru=".$row->no_calonguru."'>Edit</a>
			&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
			<a href='delete-calonguru.php?no_calonguru=".$row->no_calonguru."'>Delete</a>
			</td>
			</tr>";
  	}
?>