<?php 
$id_consulta=$_POST["id_consulta"];




$connection=mysqli_connect("localhost","root","","bdagroinsoft");
$query="SELECT * FROM ayuda WHERE idAyuda=$id_consulta";
$resource=mysqli_query($connection,$query);
$fila2=mysqli_fetch_row($resource);


if ($fila2==true) {

echo "<script>

var conAyuda=document.getElementById('conAyuda').value='$fila2[3]';


</script>";

}else{



}



?>

