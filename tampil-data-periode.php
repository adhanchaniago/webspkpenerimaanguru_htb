<?php
	require('koneksi.php');
	$sql="select * from t_periode";
  	$result = mysqli_query($conn, $sql);
  	while($row = mysqli_fetch_object($result))
  	{
	 	echo "<tr>
			<td>".$row->id."</td>
            <td>".$row->periode."</td>
            <td>".$row->tahun."</td>
            <td>".$row->status."</td>
			<td>
			<a href='ubah-periode.php?periode=".$row->periode."'>Edit</a>
			</td>
			</tr>";
  	}
?>