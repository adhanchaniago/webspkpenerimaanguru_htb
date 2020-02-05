<script type="text/javascript" language="javascript">
$(document).ready(function(){
$("#btnLogin").click(function(){
var username=$("#login-username").val();
var password=$("#login-password").val();
// Returns successful data submission message when the entered information is stored in database.
var dataString = 'username1='+ username + '&password1='+ password;
if(username==''||password==''){
alert("Ups, Cek lagi Username atau Password Anda!");
}
else{
// AJAX Code To Submit Form.
$.ajax({
type: "POST",
url: "proses-login.php",
data: dataString,
cache: false,
success: function(result){
//alert(result);
if (result=='berhasil'){
window.location='index.php';
}else{
alert(result);
}
//window.location='halaman-utama.php';
//$("#pesan").text(result);
}
});
}
return false;
});
});
</script>