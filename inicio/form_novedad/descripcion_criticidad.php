<?php 
$tipo_criticidad=$_POST["tipo_criticidad"];

     		$servidor = "localhost"; 
		$usuario = "root"; 
		$contraseña = ""; 
		$BD = "bdagroinsoft"; 
		$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD);
		$insertar="SELECT * FROM `criticidad` WHERE idCriticidad=$tipo_criticidad";
		$resource=mysqli_query($conexion, $insertar);

              $lista=mysqli_fetch_row($resource);

              echo "<script>

var descripcion_criticidad=document.getElementById('descripcion_criticidad').value='$lista[2]';

              </script>";

 ?>