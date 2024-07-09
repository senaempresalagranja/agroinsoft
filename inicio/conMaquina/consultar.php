<?php 
$id=$_POST["id"];

$connection=mysqli_connect("localhost","root","","bdagroinsoft");
$query="SELECT idMaqEquipo, nomElemento, codInterno FROM maqyequipo WHERE idMaqEquipo='$id'";
$resource=mysqli_query($connection,$query);
$fila2=mysqli_fetch_row($resource);

echo "<script>



var id=$fila2[0];
var boton=document.getElementById('contenedor').style.display='none';

</script>";


?>