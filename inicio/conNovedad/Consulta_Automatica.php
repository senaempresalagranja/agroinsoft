<?php 

$local="localhost";
$usuario="root";
$contra="";
$base="bdagroinsoft";
$nombre_maquina=$_POST["nombre_maquina"];
$codigo_interno=$_POST["codigo_interno"];
$fecha1=$_POST["fecha1"];
$fecha2=$_POST["fecha2"];

echo "$fecha1";
$conexion=mysqli_connect($local,$usuario,$contra,$base);
$query="SELECT `idNovedad`, maqyequipo.nomElemento, `tipNovedad`, `fecNovedad`, `perNovedad`, `cedPerNovedad`, `espNovedad`, `prioridad` FROM `novedades` INNER JOIN maqyequipo ON novedades.idMaqEquipo=maqyequipo.idMaqEquipo WHERE maqyequipo.codInterno like '%$codigo_interno%' OR maqyequipo.nomElemento like '%$nombre_maquina%' OR novedades.fecNovedad BETWEEN '$fecha1' AND '$fecha2'";
$resource=mysqli_query($conexion,$query);
$filas=mysqli_num_rows($resource);
if ($filas>0) {
	while($fila=mysqli_fetch_row($resource)){
echo "
<div class='tbl-consulta'>
			<div class='fila'>
				<div class='celda'>

				<div class='nom-celda'>Nombre Maquinaria:</div> 
				<div class='conte-celda nom-maquina'>$fila[1]</div>

				</div>

				<div class='celda'>

				<div class='nom-celda'>Tipo Novedad:</div> 
				<div class='conte-celda'>$fila[2]</div>
				
				</div>

				<div class='celda'>

				<div class='nom-celda'>Fecha:</div> 
				<div class='conte-celda'>$fila[3]</div>
				
				</div>

			</div>
			<div class='fila'>

				<div class='celda'>
					<div class='fle-celda'>
						<div class='nom-celda'>Responsable:</div> 
						<div class='conte-celda'>$fila[4]</div>
					</div>
					<div class='fle-celda'>
						<div class='nom-celda'>Cedula:</div> 
						<div class='conte-celda'>$fila[5]</div>
					</div>
				
				</div>
				

				<div class='celda'>
					<div class='fle-celda fle-nove'>
						<div class='nom-celda'>Especificacion:</div> 
						<div class='conte-celda'>$fila[6]</div>
					</div>
					<div class='fle-celda fle-nove'>
						<div class='nom-celda'>Prioridad:</div> 
						<div class='conte-celda'>$fila[7]</div>
					</div>
				
				</div>

				
				
			</div>


		</div>
";

}


}else{


	echo "no hay novedades";
}
echo "</table>";
 ?>