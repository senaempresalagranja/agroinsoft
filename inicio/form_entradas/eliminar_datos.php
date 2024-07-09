<?php

$id_maquina=$_POST["id_maquina"];
$fecEntrada=$_POST["fecEntrada"];
$estMaqEntrada=$_POST["estMaqEntrada"];
$idUbicacion=$_POST["idUbicacion"];
$procedimiento=$_POST["procedimiento"];
$nomPer=$_POST["nomPer"];
$cedPer=$_POST["cedPer"];


$servidor = "localhost"; //el nombre del servidor que utilizaremos en este caso utilizamos localhost
$usuario = "root"; // ususario que acabamos de crear en la base de datos
$contraseña = ""; //La contraseña del usuario que estamos utilizando
$BD = "bdagroinsoft"; //El nombre de la base de datos.


$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD) or die ("problemas con la conexion");

$insert="DELETE FROM `entradas` WHERE idMaqEquipo='$id_maquina' AND fecEntrada='$fecEntrada' ";
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
  header("Location:entrada.php");
}

?>