<?php


$nomProveedor=$_POST['nomProveedor'];
$nitProveedor=$_POST['nitProveedor'];
$telProveedor=$_POST['telProveedor'];
$dirProveedor=$_POST['dirProveedor'];
$emaProveedor=$_POST['emaProveedor'];
$sitWebProveedor=$_POST['sitWebProveedor'];

$servidor = "localhost"; //el nombre del servidor que utilizaremos en este caso utilizamos localhost
$usuario = "root"; // ususario que acabamos de crear en la base de datos
$contraseña = ""; //La contraseña del usuario que estamos utilizando
$BD = "bdagroinsoft"; //El nombre de la base de datos.


$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD) or die ("problemas con la conexion");

$sql="UPDATE proveedor SET  nomProveedor='$nomProveedor', nitProveedor='$nitProveedor', telProveedor='$telProveedor', dirProveedor='$dirProveedor', emaProveedor='$emaProveedor', sitWebProveedor='$sitWebProveedor'  WHERE nomProveedor='$nomProveedor'";
		
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