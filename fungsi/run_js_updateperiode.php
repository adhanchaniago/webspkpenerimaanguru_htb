<script language="javascript">
$(document).ready(function(){
	$("#btnSave").click(function(){
        var id=$("#id").val();
		var periode=$("#periode").val();
        var tahun=$("#tahun").val();
		var dataString= 'id='+id+'&periode='+periode+'&tahun='+tahun;
		if(periode==''){
			alert("Periode seleksi harus diisi!");
		}else if(tahun==''){
			alert("Tahun seleksi harus diisi!");
		}else if(!$.isNumeric(periode)){
			alert("Periode harus angka!");
		}else if(!$.isNumeric(tahun)){
			alert("Tahun harus angka!");
		}else{
				$.ajax({
				type: "POST",
				url: "update-periode.php",
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