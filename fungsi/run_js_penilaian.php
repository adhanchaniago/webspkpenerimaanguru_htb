<script language="javascript">
$(document).ready(function(){
$("#btnSave").click(function(){
var periode=$("#periode").val();
var tahun=$("#tahun").val();
var no_calonguru=$("#no_calonguru").val();
var id_aspek=$("#id_aspek").val();
var keterangannilai=$("#keterangannilai").val();
var nilai=$("#nilai").val();
// Returns successful data submission message when the entered information is stored in database.
var dataString =

'&periode1='+periode+
'&tahun1='+tahun+
'&no_calonguru1='+no_calonguru+
'&id_aspek1='+id_aspek+
'&keterangannilai1='+keterangannilai+
'&nilai1='+nilai;
if(!$.isNumeric(nilai)){
alert("Nilai harus bernilai angka!");
}else{
// AJAX Code To Submit Form.
$.ajax({
type: "POST",
url: "insert-penilaian.php",
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