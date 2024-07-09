<?php


$id=$_POST["id"];
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
$query="SELECT * FROM entradas WHERE idMaqEquipo=$id  AND fecEntrada='$fecEntrada'";

$resource=mysqli_query($conexion, $query);
$filas=mysqli_num_rows($resource);
if ($filas>0) {
	echo "<script>

alert('esta maquina ya entro en el dia de hoy');

	</script>";
}else{

$insert="INSERT INTO entradas ( idMaqEquipo, fecEntrada, estMaqEntrada, idUbicacion, procedimiento, nomPer, cedPer ) VALUES ( '$id', '$fecEntrada', '$estMaqEntrada', '$idUbicacion', '$procedimiento', '$nomPer', '$cedPer'   )";
$respuesta=mysqli_query($conexion,  $insert)  or die ("problemas al insertar");



if ($respuesta==true) {
	echo "<script>

alert('REGISTRO INSERTADO');


	</script>";
}else{

	echo "<script>

alert('REGISTRO NO INSERTADO');


	</script>";
}



}













?>