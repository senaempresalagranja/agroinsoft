<?php 
$id=$_POST["id"];

$connection=mysqli_connect("localhost","root","","bdagroinsoft");
$query="SELECT idMaqEquipo, nomElemento, codInterno FROM maqyequipo WHERE idMaqEquipo='$id'";
$resource=mysqli_query($connection,$query);
$fila2=mysqli_fetch_row($resource);

echo "<script>


var nombre_maquina=document.getElementById('nombre_maquina').value='$fila2[2]  $fila2[1]';
var id=$fila2[0];
var boton=document.getElementById('contenedor').style.display='none';


</script>";


?>