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
$query="SELECT * FROM `proveedor` WHERE `nitProveedor`=$nitProveedor";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);
if ($fila==true) {
	echo "<script>

alert('el proveedor identificado con  el NIT:$nitProveedor ya existe')
	</script>";
}else{

$insert="INSERT INTO proveedor ( nomProveedor, nitProveedor, telProveedor, dirProveedor, emaProveedor, sitWebProveedor ) VALUES ( '$nomProveedor', '$nitProveedor', '$telProveedor', '$dirProveedor', '$emaProveedor', '$sitWebProveedor'  )";
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