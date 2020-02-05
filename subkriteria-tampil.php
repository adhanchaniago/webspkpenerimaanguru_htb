<?php
	require('koneksi.php');
	$sql="SELECT * from t_subkriteria";
  	$result = mysqli_query($conn,$sql);
	$jumlah_bobot=0;
  	while($row = mysqli_fetch_object($result))
  	{
		$jumlah_bobot+=$row->bobot;
	 	echo "<tr>
			<td>".$row->id."</td>
			<td>".$row->aspek_penilaian."</td>
			<td>".$row->kode."</td>
			<td>".$row->nilai."</td>
			<td>".$row->keterangannilai."</td>
			<td>".$row->bobot."</td>
			<td><a href='subkriteria-edit.php?id=".$row->id."'>Edit</a>
&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
			<a href='subkriteria-delete.php?id=".$row->id."'>Delete</a>
			</td>
			</tr>";
  	}
	?>
			<tr>
			<td colspan="1"></td>
			<td>JUMLAH BOBOT</td>
			<td></td>
			<td></td>
			<td><?php echo $jumlah_bobot?></td>
			<td></td>
			</tr>
<?php ?>