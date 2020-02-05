<script language="javascript">
$(document).ready(function(){
	$("#btnSave").click(function(){
		var id=$("#id").val();
		var aspek_penilaian=$("#aspek_penilaian").val();
        var kode=$("#kode").val();
		var nilai=$("#nilai").val();
		var keterangannilai=$("#keterangannilai").val();
		var bobot=$("#bobot").val();;
	// Returns successful data submission message when the entered information is stored in database.
		var dataString = 
'id1='+id+
'&aspek_penilaian1='+aspek_penilaian+
'&kode1='+kode+
'&nilai1='+nilai+
'&keterangannilai1='+keterangannilai+
'&bobot1='+bobot;			
		if(!$.isNumeric(bobot)){
			alert("Bobot harus bernilai angka!");
		}else{			
		// AJAX Code To Submit Form.
			$.ajax({
				type: "POST",
				url: "update-subkriteria.php",
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