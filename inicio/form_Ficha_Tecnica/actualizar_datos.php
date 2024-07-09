<?php


$id=$_POST["id"];
$funUsos=$_POST["funUsos"];
$desFisica=$_POST["desFisica"];
$espTecnica=$_POST["espTecnica"];
$conSeguridad=$_POST["conSeguridad"];
$alistamiento=$_POST["alistamiento"];
$verCalibracion=$_POST["verCalibracion"];
$instrucciones=$_POST["instrucciones"];
$condiciones=$_POST["condiciones"];
$mantenimiento=$_POST["mantenimiento"];
$limDesinfeccion=$_POST["limDesinfeccion"];
$conManejo=$_POST["conManejo"];


$servidor = "localhost"; //el nombre del servidor que utilizaremos en este caso utilizamos localhost
$usuario = "root"; // ususario que acabamos de crear en la base de datos
$contraseña = ""; //La contraseña del usuario que estamos utilizando
$BD = "bdagroinsoft"; //El nombre de la base de datos.


$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD) or die ("problemas con la conexion");

$sql="UPDATE fictecnica SET  idMaqEquipo='$id', funUsos='$funUsos', desFisica='$desFisica', espTecnica='$espTecnica', conSeguridad='$conSeguridad', alistamiento='$alistamiento', verCalibracion='$verCalibracion', instrucciones='$instrucciones', condiciones='$condiciones', mantenimiento='$mantenimiento', limDesinfeccion='$limDesinfeccion', conManejo='$conManejo'  where idMaqEquipo='$id'";
		
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