<script language="javascript">
$(document).ready(function(){
	$("#btnSave").click(function(){
		var nilai=$("#nilai").val();
		var dataString= 'nilai='+nilai;
		if(nilai==''){
			alert("Nilai minimum kelulusan harus diisi!");
		}else{
				$.ajax({
				type: "POST",
				url: "update-nilai.php",
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