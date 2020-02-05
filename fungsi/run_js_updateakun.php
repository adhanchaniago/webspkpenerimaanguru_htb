<script language="javascript">
$(document).ready(function(){
	$("#btnSave").click(function(){
		var userid=$("#userid").val();
		var password=$("#password").val();
		
		var dataString= 'userid='+userid + '&password='+password;
		
		if(password==''){
			alert("Password harus diisi!");
		}else{
				$.ajax({
				type: "POST",
				url: "update-akun.php",
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