<?php 


$local="localhost";
$usuario="root";
$contra="";
$base="bdagroinsoft";
$nombre_maquina=$_POST["nombre_maquina"];
$codigo_interno=$_POST["codigo_interno"];
$Ubicacion=$_POST["Ubicacion"];
$Clasificacion=$_POST["Clasificacion"];



$conexion=mysqli_connect($local,$usuario,$contra,$base);
$query="SELECT maqyequipo.idMaqEquipo, `nomElemento`, `codInventario`, `codInterno`, `marElemento`, `seriale`, `modelo`, `capacidad`, `fecAdquisicion`,  `estElemento`, `numFicTecnica`, clasificacion.nomClasificacion, ubicacion.nomUbicacion FROM `maqyequipo` INNER JOIN clasificacion ON maqyequipo.idClasificacion=clasificacion.idClasificacion INNER JOIN ubicacion ON maqyequipo.idUbicacion=ubicacion.idUbicacion where  codInterno LIKE '%$codigo_interno%' AND nomElemento like '%$nombre_maquina%' AND clasificacion.nomClasificacion like '%$Clasificacion%' AND ubicacion.nomUbicacion like '%$Ubicacion%'";
$resource=mysqli_query($conexion,$query);
echo "<form action=' method='post'>";
echo "<table>";
while($fila=mysqli_fetch_row($resource)){
echo "

<div class='tbl-consulta'>
			<div class='fila'>
				<div class='celda'>

				<div class='nom-celda'>Nombre Maquinaria:</div> 
				<div class='conte-celda nom-maquina'>$fila[1]</div>

				</div>

				<div class='celda'>

				<div class='nom-celda'>Codigo Interno:</div> 
				<div class='conte-celda'>$fila[2]</div>
				
				</div>

				<div class='celda'>

				<div class='nom-celda'>Codigo Inventario:</div> 
				<div class='conte-celda'>$fila[3]</div>
				
				</div>

				<div class='celda novisivle'>

				<div class='nom-celda'>Marca:</div> 
				<div class='conte-celda'>$fila[4]</div>
				
				</div>

				<div class='celda novisivle'>

				<div class='nom-celda'>Serial:</div> 
				<div class='conte-celda'>$fila[5]</div>
				
				</div>

			</div>
			<div class='fila'>

				<div class='celda novisivle'>
					<div class='fle-celda'>
						<div class='nom-celda'>modelo:</div> 
						<div class='conte-celda'>$fila[6]</div>
					</div>
					<div class='fle-celda'>
						<div class='nom-celda'>Capacidad:</div> 
						<div class='conte-celda'>$fila[7]</div>
					</div>
				
				</div>

				<div class='celda '>
					<div class='fle-celda'>
						<div class='nom-celda'>Estado:</div> 
						<div class='conte-celda'>$fila[9]</div>
					</div>
					<div class='fle-celda'>
						<div class='nom-celda'>clasificacion:</div> 
						<div class='conte-celda'>$fila[11]</div>
					</div>
				
				</div>

				<div class='celda novisivle'>
					<div class='fle-celda'>
						<div class='nom-celda'>Fecha Adaquisicion:</div> 
						<div class='conte-celda'>$fila[8]</div>
					</div>
					<div class='fle-celda'>
						<div class='nom-celda'>Numero Ficha:</div> 
						<div class='conte-celda'>$fila[10]</div>
					</div>
				
				</div>

				<div class='celda'>
					<div class='fle-celda'>
						<div class='nom-celda'>Ubicacion:</div> 
						<div class='conte-celda'>$fila[12]</div>
					</div>
					<div>
						<div class='nom-celda'></div> 
						<input class='btn-ver' type='hidden' name='id' value='$fila[0]'>
<input  class='btn-ver' type='submit'  value='Ver Mas'>
					</div>
				
				</div>
			</div>


		</div>";


}
 echo "</form>";


 ?>