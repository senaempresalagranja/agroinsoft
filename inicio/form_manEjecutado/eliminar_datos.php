<?php

$id_maquina=$_POST["id_maquina"];
$idTipMantenimiento=$_POST["idTipMantenimiento"];
$idProveedor=$_POST["idProveedor"];
$fecEjecutado=$_POST["fecEjecutado"];
$procedimiento=$_POST["procedimiento"];
$recomendaciones=$_POST["recomendaciones"];
$garantia=$_POST["garantia"];
$nomPerMantenimiento=$_POST["nomPerMantenimiento"];
$cedPerMantenimiento=$_POST["cedPerMantenimiento"];


$servidor = "localhost"; //el nombre del servidor que utilizaremos en este caso utilizamos localhost
$usuario = "root"; // ususario que acabamos de crear en la base de datos
$contraseña = ""; //La contraseña del usuario que estamos utilizando
$BD = "bdagroinsoft"; //El nombre de la base de datos.


$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD) or die ("problemas con la conexion");

$insert="DELETE FROM `manejecutado` WHERE idMaqEquipo='$id_maquina' AND fecEjecutado='$fecEjecutado'";
$respuesta=mysqli_query($conexion,  $insert)  or die ("problemas al insertar");




if ($respuesta==true) {
	echo "<script>

alert('REGISTRO ELIMINADO');


	</script>";
}else{

	echo "<script>

alert('REGISTRO NO ELIMINADO');


	</script>";
}

if($respuesta==true){
  header("Location:manEjecutado.php");
}

?>