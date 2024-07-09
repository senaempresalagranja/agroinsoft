<?php 


$id=$_POST["id"];
$fecha_solicitud_1=$_POST["fecha_solicitud_1"];
$fecha_solicitud_2=$_POST["fecha_solicitud_2"];
		echo "<select  id='id_novedad' name='id_novedad' onclick='mostrar_especificacion()'>

		<option value='Selecciona'>assa</option>
		";

    		 		$servidor = "localhost"; 
				$usuario = "root"; 
				$contraseña = ""; 
				$BD = "bdagroinsoft"; 
				$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD);
				$insertar="SELECT `idNovedad`, maqyequipo.nomElemento, `tipNovedad`, `fecNovedad`, `perNovedad`, `cedPerNovedad`, `espNovedad`, `prioridad` FROM `novedades` INNER JOIN maqyequipo ON novedades.idMaqEquipo=maqyequipo.idMaqEquipo WHERE maqyequipo.idMaqEquipo='$id' and fecNovedad BETWEEN '$fecha_solicitud_1' AND '$fecha_solicitud_2' ";
					$resource=mysqli_query($conexion, $insertar);

   		                     while($lista=mysqli_fetch_row($resource)){
                        			echo "<option value='".$lista[0]."' class='form-control'>$lista[1]-$lista[2] </option>";
   		                     };

 ?>