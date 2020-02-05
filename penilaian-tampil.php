<?php
	require('koneksi.php');
	$sql="SELECT * from t_nilai_calonguru";
  	$result = mysqli_query($conn,$sql);
  	while($row = mysqli_fetch_object($result))
  	{
	 	echo "<tr>
			<td>".$row->id."</td>
			<td>".$row->periode."</td>
			<td>".$row->tahun."</td>
			<td>".$row->no_calonguru."</td>
            <td>".$row->id_aspek."</td>
			<td>".$row->keterangannilai."</td>
			<td>".$row->nilai."</td>
			<td><a href='penilaian-edit.php?id=".$row->id."'>Edit</a>
&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
			<a href='penilaian-delete.php?id=".$row->id."'>Delete</a>
			</td>
			</tr>";
  	}
?>
<?php ?>