<?php 

$nomProveedor=$_POST["nomProveedor"];


$servidor = "localhost"; 
$usuario = "root"; 
$contraseña = ""; 
$BD = "bdagroinsoft"; 


		$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD) or die ("problemas con la conexion");
		$sql="SELECT * FROM proveedor WHERE nomProveedor='$nomProveedor' ";
		$cs=mysqli_query($conexion, $sql);
		$resource=mysqli_fetch_row($cs);


	echo "<script>


var nomProveedor=document.getElementById('nomProveedor').value='$resource[1]';
var nitProveedor=document.getElementById('nitProveedor').value='$resource[2]';
var telProveedor=document.getElementById('telProveedor').value='$resource[3]';
var dirProveedor=document.getElementById('dirProveedor').value='$resource[4]';
var emaProveedor=document.getElementById('emaProveedor').value='$resource[5]';
var sitWebProveedor=document.getElementById('sitWebProveedor').value='$resource[6]';




	</script>";

 ?> 