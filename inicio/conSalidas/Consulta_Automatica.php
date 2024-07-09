<?php 

$local="localhost";
$usuario="root";
$contra="";
$base="bdagroinsoft";
$nombre_maquina=$_POST["nombre_maquina"];
$codigo_interno=$_POST["codigo_interno"];
$fecha1=$_POST["fecha1"];
$fecha2=$_POST["fecha2"];



$conexion=mysqli_connect($local,$usuario,$contra,$base);
$query="SELECT `idSalidas`,maqyequipo.nomElemento, `fecSalida`, `fecLimRegreso`, proveedor.nomProveedor, ubicacion.nomUbicacion, cuentadante.nomCuentadante, cuentadante.apeCuentadante, `destino` FROM `salidas`INNER JOIN maqyequipo ON salidas.idMaqEquipo=maqyequipo.idMaqEquipo INNER JOIN ubicacion ON salidas.idUbicacion=ubicacion.idUbicacion INNER JOIN proveedor ON salidas.idProveedor=proveedor.idProveedor INNER JOIN cuentadante ON salidas.idCuentadante=cuentadante.idCuentadante WHERE maqyequipo.nomElemento LIKE '%$nombre_maquina%' AND maqyequipo.codInterno LIKE '%$codigo_interno%' AND salidas.fecSalida BETWEEN '$fecha1' AND '$fecha2'";
$resource=mysqli_query($conexion,$query);
$filas=mysqli_num_rows($resource);
if ($filas>0) {
	while($fila=mysqli_fetch_row($resource)){

echo "<div class='tbl-consulta'>
			<div class='fila'>
				<div class='celda'>

				<div class='nom-celda'>Nombre Maquinaria:</div> 
				<div class='conte-celda nom-maquina'>$fila[1]</div>
					
				</div>

				<div class='celda'>

				<div class='nom-celda'>Fecha Salida:</div> 
				<div class='conte-celda'>$fila[2]</div>
				
				</div>

				<div class='celda'>

				<div class='nom-celda'>Fecha Limite Regreso:</div> 
				<div class='conte-celda'>$fila[3]</div>
				
				</div>

			</div>
			<div class='fila'>

				<div class='celda'>
					<div class='fle-celda'>
						<div class='nom-celda'>Ubicacion:</div> 
						<div class='conte-celda'>$fila[4]</div>
					</div>
					<div class='fle-celda'>
						<div class='nom-celda'>Ubicacion:</div> 
						<div class='conte-celda'>$fila[5]</div>
					</div>
				
				</div>
				

				<div class='celda'>
					<div class='fle-celda fle-nove'>
						<div class='nom-celda'>Cuentadante:</div> 
						<div class='conte-celda'>$fila[6] $fila[7]</div>
					</div>
					<div class='fle-celda fle-nove'>
						<div class='nom-celda'>Destino:</div> 
						<div class='conte-celda'>$fila[8]</div>
					</div>
				
				</div>

				
				
			</div>


		</div>

";

}


}else{


	echo "No hay Entradas";
}
echo "</table>";

 ?>

