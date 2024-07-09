
<?php 
     		$servidor = "localhost"; 
		$usuario = "root"; 
		$contraseña = ""; 
		$BD = "bdagroinsoft"; 

		$hoy=$_POST["hoy"];
		$fecEjecutado=$_POST["fecEjecutado"];

		$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD);
		$query="SELECT  DATEDIFF('$fecEjecutado','$hoy') as fechas FROM `manejecutado`";
		$resource=mysqli_query($conexion,$query);
		$fila=mysqli_fetch_row($resource);

		echo "<script>

var diferencia_fecha='$fila[0]';

var diferencia_fecha=document.getElementById('diferencia_fecha').value=diferencia_fecha;

validar_fecha2();
		</script>";


 ?>

