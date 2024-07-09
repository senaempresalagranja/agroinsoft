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

$sql="UPDATE entradas SET  idMaqEquipo='$id', fecEntrada='$fecEntrada', estMaqEntrada='$estMaqEntrada', idUbicacion='$idUbicacion', procedimiento='$procedimiento', nomPer='$nomPer', cedPer='$cedPer'  where idMaqEquipo='$id'";
		
$cs=mysqli_query($conexion, $sql);

if ($cs==true) {
	echo "<script>

alert('REGISTRO ACTUALIZADO');


	</script>";
}else{

	echo "<script>

alert('REGISTRO NO ACTUALIZADO');


	</script>";
}









?>