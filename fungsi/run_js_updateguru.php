<script language="javascript">
$(document).ready(function(){
	$("#btnSave").click(function(){
		var no_calonguru=$("#no_calonguru").val();
		var nama_lengkap=$("#nama_lengkap").val();
		var alamat=$("#alamat").val();
		var no_telp=$("#no_telp").val();
		var jenkel=$("#jenkel").val();
		var masa_kerja_tahun=$("#masa_kerja_tahun").val();
		var masa_kerja_bulan=$("#masa_kerja_bulan").val();
		
		var dataString= '&no_calonguru='+no_calonguru + '&nama_lengkap='+nama_lengkap + '&alamat='+alamat +
						'&no_telp='+no_telp + '&jenkel='+jenkel + '&masa_kerja_tahun='+masa_kerja_tahun +
						'&masa_kerja_bulan='+masa_kerja_bulan;
		
		if(no_calonguru==''){
			alert("No. Calon Guru harus diisi!");
		}else if(nama_lengkap==''){
			alert("Nama Lengkap Guru harus diisi!");
		}else if(alamat==''){
			alert("Alamat Lengkap Guru harus diisi!");
		}else if(no_telp==''){
			alert("Nomor Telepon Guru harus diisi!");
		}else if(jenkel==''){
			alert("Jenis Kelamin Guru harus diisi!");
		}else if(!$.isNumeric(no_telp)){
			alert("Nomor Telepon harus angka!");
		}else if(!$.isNumeric(masa_kerja_tahun)){
			alert("Masa Kerja tahun harus angka!");
		}else if(!$.isNumeric(masa_kerja_bulan)){
			alert("Masa kerja bulan harus angka!");
		}else{
				$.ajax({
				type: "POST",
				url: "update-calonguru.php",
				data: dataString,
				cache: false,
				success: function(result){
					alert(result);
				}
			});
		}
	});
});
</script>