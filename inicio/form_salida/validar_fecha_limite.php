<?php 

$fecLimRegreso=$_POST["fecLimRegreso"];
$fecSalida=$_POST["fecSalida"];

     		$servidor = "localhost"; 
		$usuario = "root"; 
		$contraseña = ""; 
		$BD = "bdagroinsoft"; 
		$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD);
		$query="SELECT  DATEDIFF('$fecLimRegreso','$fecSalida') as fechas FROM `salidas`";

$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);

		

		echo "<script>

var numero_dias=document.getElementById('numero_dias').value='$fila[0]';

		</script>";

 ?>