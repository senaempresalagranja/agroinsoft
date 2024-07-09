<?php 


$id_novedad=$_POST["id_novedad"];

    		 		$servidor = "localhost"; 
				$usuario = "root"; 
				$contraseña = ""; 
				$BD = "bdagroinsoft"; 
				$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD);
				$insertar="SELECT * FROM `novedades` WHERE idNovedad=$id_novedad";
				$resource=mysqli_query($conexion, $insertar);
				$fila=mysqli_fetch_row($resource);

				echo "<script>

var nombre_maquina=document.getElementById('nombre_maquina').value='$fila[6]';

				</script>";

 ?>