<?php

$id_maquina=$_POST["id_maquina"];
$tipNovedad=$_POST["tipNovedad"];
$fecNovedad=$_POST["fecNovedad"];
$perNovedad=$_POST["perNovedad"];
$cedPerNovedad=$_POST["cedPerNovedad"];
$espNovedad=$_POST["espNovedad"];
$prioridad=$_POST["prioridad"];


$servidor = "localhost"; //el nombre del servidor que utilizaremos en este caso utilizamos localhost
$usuario = "root"; // ususario que acabamos de crear en la base de datos
$contraseña = ""; //La contraseña del usuario que estamos utilizando
$BD = "bdagroinsoft"; //El nombre de la base de datos.


$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD) or die ("problemas con la conexion");

$insert="DELETE FROM `novedades` WHERE idMaqEquipo='$id_maquina' AND fecNovedad='$fecNovedad'";
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
  header("Location:novedad.php");
}

?>