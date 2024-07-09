<?php


$id=$_POST["id"];
$fecSalida=$_POST["fecSalida"];
$fecLimRegreso=$_POST["fecLimRegreso"];
$idProveedor=$_POST["idProveedor"];
$idUbicacion=$_POST["idUbicacion"];
$idCuentadante=$_POST["idCuentadante"];
$destino=$_POST["destino"];

$servidor = "localhost"; //el nombre del servidor que utilizaremos en este caso utilizamos localhost
$usuario = "root"; // ususario que acabamos de crear en la base de datos
$contraseña = ""; //La contraseña del usuario que estamos utilizando
$BD = "bdagroinsoft"; //El nombre de la base de datos.


$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD) or die ("problemas con la conexion");

$sql="UPDATE salidas SET  idMaqEquipo='$id', fecSalida='$fecSalida', fecLimRegreso='$fecLimRegreso', idProveedor='$idProveedor', idUbicacion='$idUbicacion', idCuentadante='$idCuentadante', destino='$destino'  where idMaqEquipo='$id'";
		
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