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
$query="SELECT * FROM `cuentadante` WHERE numDocumento=$numDocumento";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);


if ($fila==true) {
	echo "<script>

alert('Cuentadante identificado con $numDocumento ya existe')
	</script>";
}else{

$insert="INSERT INTO cuentadante ( tipDocumento, numDocumento, nomCuentadante, apeCuentadante, fecNacimiento, idCargo, telCuentadante, emaCuentadante, dirCuentadante ) VALUES ( '$tipDocumento', '$numDocumento', '$nomCuentadante', '$apeCuentadante', '$fecNacimiento', '$idCargo', '$telCuentadante', '$emaCuentadante', '$dirCuentadante'   )";
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