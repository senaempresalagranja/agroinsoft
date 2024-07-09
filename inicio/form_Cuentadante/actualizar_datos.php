<?php


$tipDocumento=$_POST['tipDocumento'];
$numDocumento=$_POST['numDocumento'];
$nomCuentadante=$_POST['nomCuentadante'];
$apeCuentadante=$_POST['apeCuentadante'];
$fecNacimiento=$_POST['fecNacimiento'];
$idCargo=$_POST['idCargo'];
$telCuentadante=$_POST['telCuentadante'];
$emaCuentadante=$_POST['emaCuentadante'];
$dirCuentadante=$_POST['dirCuentadante'];

$servidor = "localhost"; //el nombre del servidor que utilizaremos en este caso utilizamos localhost
$usuario = "root"; // ususario que acabamos de crear en la base de datos
$contraseña = ""; //La contraseña del usuario que estamos utilizando
$BD = "bdagroinsoft"; //El nombre de la base de datos.


$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD) or die ("problemas con la conexion");

$sql="UPDATE cuentadante SET  tipDocumento='$tipDocumento', numDocumento='$numDocumento', nomCuentadante='$nomCuentadante', apeCuentadante='$apeCuentadante', fecNacimiento='$fecNacimiento', idCargo='$idCargo', telCuentadante='$telCuentadante', emaCuentadante='$emaCuentadante', dirCuentadante='$dirCuentadante'  where numDocumento='$numDocumento'";
		
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