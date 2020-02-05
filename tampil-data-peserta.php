<?php 
include "koneksi.php";
 if(isset($_GET['cari'])){
  $cari = $_GET['cari'];
  $data = mysqli_query($conn,"select * from t_data_kelulusan where no_calonguru like '%".$cari."%'");    
 }else{
  $data = mysqli_query($conn,"select * from t_data_kelulusan");  
 }
 $no = 1;
 while($d = mysqli_fetch_array($data)){
 ?>
 <tr>
  <td><?php echo $d['id']; ?></td>
  <td><?php echo $d['periode']; ?></td>
  <td><?php echo $d['tahun']; ?></td>
  <td><?php echo $d['no_calonguru']; ?></td>
  <td><?php echo $d['nilai']; ?></td>
  <td><?php echo $d['status']; ?></td>
 </tr>
<?php } ?>