<script language="javascript">
$(document).ready(function(){
	$("#btnShow").click(function(){
		var periode=$("#periode").val();
		var tahun=$("#tahun").val();
	// Returns successful data submission message when the entered information is stored in database.
		var dataString = 'periode1='+ periode + '&tahun1='+ tahun;
			// AJAX Code To Submit Form.
			$.ajax({
				type: "POST",
				url: "show-summary.php",
				data: dataString,
				cache: false,
				success: function(result){
					if(result=='not found'){
						alert("Summary Data Kelulusan periode "+ periode + ", tahun "+ tahun + " tidak ditemukan\n Silahkan Klik Process.");
					}else{
						$("#lokasi_tampil").html(result);
					}
					//$("#pesan").text(result);
				}
			});
	});
});
</script>
<script src="proses-saw.js"></script>