<?php
	require('koneksi.php');
	$sql="SELECT * from t_komponen_penilaian";
  	$result = mysqli_query($conn,$sql);
	$jumlah_bobot=0;
  	while($row = mysqli_fetch_object($result))
  	{
		$jumlah_bobot+=$row->bobot;
	 	echo "<tr>
			<td>
			<input type='hidden' id='id' value='".$row->id."'>".$row->id."</td>
            <td>".$row->kode."</td>
			<td>".$row->aspek_penilaian."</td>
            <td>".$row->deskripsi."</td>
			<td>".$row->bobot."</td>
			<td><a href='edit-aspek-penilaian.php?id=".$row->id."'>Edit</a>
			&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
			<a href='delete-aspek-penilaian.php?id=".$row->id."'>Delete</a>
			</td>
			</tr>";
  	}
	?><tr><td colspan="1"></td><td>JUMLAH BOBOT</td><td></td><td></td><td><?php echo $jumlah_bobot?></td><td></td></tr><?php
?>