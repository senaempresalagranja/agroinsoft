<?php


$id=$_POST["id"];
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

$sql="UPDATE novedades SET  idMaqEquipo='$id', tipNovedad='$tipNovedad',fecNovedad='$fecNovedad', perNovedad='$perNovedad', cedPerNovedad='$cedPerNovedad', espNovedad='$espNovedad', prioridad='$prioridad'  WHERE idMaqEquipo='$id' AND fecNovedad='$fecNovedad' ";
		
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