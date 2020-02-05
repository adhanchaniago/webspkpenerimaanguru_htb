$(document).ready(function(){
	$("#btnProcess").click(function(){
		var periode=$("#periode").val();
		var tahun=$("#tahun").val();
		$("#loading").text("Mohon tunggu sedang memproses data...");
	// Returns successful data submission message when the entered information is stored in database.
		var dataString = 'periode1='+ periode + '&tahun1='+ tahun;
			// AJAX Code To Submit Form.
			$.ajax({
				type: "POST",
				url: "proses-saw.php",
				data: dataString,
				cache: false,
				success: function(result){
					//alert(result);
					$("#lokasi_tampil").html(result);
					$("#loading").fadeOut();
				}
			});
	});
});