<?php 



$id=$_POST["id"];
$local="localhost";
$usuario="root";
$contra="";
$base="bdagroinsoft";

$conexion=mysqli_connect($local,$usuario,$contra,$base);
$query="SELECT maqyequipo.idMaqEquipo, `nomElemento`, `codInventario`, `codInterno`, `marElemento`, `seriale`, `modelo`, `capacidad`, `fecAdquisicion`,  `estElemento`,imagen, `numFicTecnica`, clasificacion.nomClasificacion, ubicacion.nomUbicacion FROM `maqyequipo` INNER JOIN clasificacion ON maqyequipo.idClasificacion=clasificacion.idClasificacion INNER JOIN ubicacion ON maqyequipo.idUbicacion=ubicacion.idUbicacion WHERE maqyequipo.idMaqEquipo=$id order by nomElemento";
$resource=mysqli_query($conexion,$query);

$fila=mysqli_fetch_row($resource);


 ?>

<form action="" method="post" id="formulario">
<input type="text" name="id_maquinaria" style="opacity: 0" value="<?php echo $id ?>" id="">
</form>
<div id="det-titulo"><?php echo $fila[1] ?></div>
<section id="con_principal">

<div class="det-item">
	
	<div id="imagen-maquina"><img  src="../form_maquina/imagenes/<?php echo $fila[10] ?>" alt=""></div>
	
</div>
<div class="det-item setion ">

	<div class="item-dets"> 
	<div>codigo inventario:</div> 
	<article>
		<?php echo $fila[2]  ?>
	</article>
	</div>

	<div class="item-dets">
	<div>codigo interno:</div>
	<article>
		<?php echo $fila[3] ?>
	</article>
	</div>

	<div class="item-dets">
	<div>serial: </div> 
	<article>
		<?php echo $fila[5] ?></div>
	</article>
	
	<div class="item-dets">
	<div>capacidad:</div>
	<article>
		<?php echo $fila[7] ?>
	</article>
	</div>

	<div class="item-dets">
	<div>fecha adquisicion:</div>
	<article>
		<?php echo $fila[8] ?>
	</article>
	</div>

	<div class="item-dets">
	<div>Clasificacion:</div>
	<article>
		<?php echo $fila[12] ?>
	</article> 
	</div>

	<div class="item-dets">
	<div>ubicacion:</div>
	<article>
		<?php echo $fila[3] ?>
	</article>
	 </div>

	<div class="item-dets">
	<div>estado: </div>
	<article>
	 	<?php echo $fila[9] ?>
	 </article>
	 </div>
	 <div class="botones">

	<button class=" cam-button" onclick="exportar_pdf()"  type="button"  class="btn btn-3 " value="Exportar"><img class="icon" src="../iconos/exppdf.svg" alt="x" /></button> 
	
	<button class="cam-button" onclick="exportar_excel()" class="btn btn-3 "  type="button"><img class="icon"  src="../iconos/expexcel.svg" alt="x" /></button>

	</div>  

</div>
</section>

	
</div>



<section  id="btns-contenedor">
<!-- 	<input  class="btns-dests" type="button" value="ficha tecnica" onclick="cargar_fichatecnica()">
<input  class="btns-dests" type="button" value="Novedades" onclick="cargar_novedades()" >
<input  class="btns-dests" type="button" value="man programados" onclick="cargar_manprogramado()">
<input  class="btns-dests" type="button" value="man ejecutados" onclick="cargar_manejecutado()"> -->
</section>


<div id="contenedor_novedades" style="display: none">

	<?php 

$query="SELECT * FROM `novedades`  WHERE idMaqEquipo=$id";
$resource=mysqli_query($conexion,$query);
$filas=mysqli_num_rows($resource);
if ($filas>0) {
	$numeros=1;
	while($fila=mysqli_fetch_row($resource)){





	echo "<div class='tbl-consulta'>
			<div class='fila'>
				

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

	echo "<tr>
		<td colspan='3'>No hay novedades</td>
	
	</tr>";	
}


	 ?>
	 </table>

</div>
<div id="contenedor_ficha" >
<?php 
$query="SELECT `funUsos`, `desFisica`, `espTecnica`, `conSeguridad`, `alistamiento`, `verCalibracion`, `instrucciones`, `condiciones`, `mantenimiento`, `limDesinfeccion`, `conManejo` FROM `fictecnica` WHERE idMaqEquipo=$id";
$resource=mysqli_query($conexion,$query);
$filas=mysqli_fetch_row($resource);
 ?>

<div class="det-item-ficha  ">

	<div class="item-dets-ficha"> 
	<div>Funciones y usos:</div> 
	<textarea style="width:1000px; font-weight: bold;">
		<?php echo $filas[0]  ?>
	</textarea>
	</div>

	<div class="item-dets-ficha">
	<div>Descripcion fisica:</div>
	<textarea style="width:1000px; font-weight: bold;">
		<?php echo $filas[1]  ?>
	</textarea>
	</div>

	<div class="item-dets-ficha">
	<div>especificaciones tecnicas: </div> 
	<textarea style="width:1000px; font-weight: bold;">
		<?php echo $filas[2]  ?>
	</textarea>
	</div>

	<div class="item-dets-ficha">
	<div>condiciones de seguridad:</div>
	<textarea style="width:1000px; font-weight: bold;">
		<?php echo $filas[3]  ?>
	</textarea>
	</div>

	<div class="item-dets-ficha">
	<div>alistamiento:</div>
	<textarea style="width:1000px; font-weight: bold;">
		<?php echo $filas[4]  ?>
	</textarea>
	</div>

	<div class="item-dets-ficha">
	<div>verificacion o calibracion:</div>
	<textarea style="width:1000px; font-weight: bold;">
		<?php echo $filas[5]  ?>
	</textarea> 
	</div>

	<div class="item-dets-ficha">
	<div>instrucciones de uso:</div>
	<textarea style="width:1000px; font-weight: bold;">
		<?php echo $filas[6]  ?>
	</textarea>
	 </div>

	<div class="item-dets-ficha">
	<div> condiciones del equipo: </div>
	<textarea style="width:1000px; font-weight: bold;">
		<?php echo $filas[7]  ?>
	</textarea>
	 </div>

	<div class="item-dets-ficha">
	<div> mantenimiento: </div>
	<textarea style="width:1000px;font-weight: bold;">
		<?php echo $filas[8]  ?>
	</textarea>
	 </div>

	 <div class="item-dets-ficha">
	<div> limpieza : </div>
	<textarea style="width:1000px; font-weight: bold;">
		<?php echo $filas[9]  ?>
	</textarea>
	 </div> 


 </div> 


</div>
<div id="contenedor_manejecutado" style="display: none" >


	
<?php 
$query="SELECT `idManEjecutado`, manejecutado.id, tipmantenimiento.nomTipMantenimiento, proveedor.nomProveedor, `fecEjecutado`, `procedimiento`, `recomendaciones`, `garantia`, `nomPerMantenimiento`, `cedPerMantenimiento` FROM `manejecutado` INNER JOIN manprogramado ON manejecutado.id=manprogramado.id INNER JOIN tipmantenimiento ON manejecutado.idTipMantenimiento=tipmantenimiento.idTipMantenimiento INNER JOIN proveedor ON manejecutado.idProveedor=proveedor.idProveedor WHERE manprogramado.idMaqEquipo=$id";
  $numeros=1;
$resource=mysqli_query($conexion,$query);
$filas=mysqli_num_rows($resource);
if ($filas>0) {
	while($fila=mysqli_fetch_row($resource)){



	echo "<div class='tbl-consulta'>
			<div class='fila'>
			
				<div class='celda'>

				<div class='nom-celda'>Tipo Mantenimiento:</div> 
				<div class='conte-celda'>$fila[2]</div>
				
				</div>
				
				<div class='celda'>

				<div class='nom-celda'>PROVEEDOR:</div> 
				<div class='conte-celda nom-maquina'>$fila[3]</div>
					
				</div>

				<div class='celda'>

				<div class='nom-celda'>Fecha:</div> 
				<div class='conte-celda'>$fila[4]</div>
				
				</div>

			</div>
			<div class='fila'>

				<div class='celda'>
					<div class='fle-celda'>
						<div class='nom-celda'>Responsable:</div> 
						<div class='conte-celda'>$fila[8] c.c $fila[9]</div>
					</div>
					<div class='fle-celda'>
						<div class='nom-celda'>garantia:</div> 
						<div class='conte-celda'>$fila[7]</div>
					</div>
				
				</div>
				

				<div class='celda'>
					<div class='fle-celda fle-nove'>
						<div class='nom-celda'>Procedimiento:</div> 
						<div class='conte-celda'>$fila[5]</div>
					</div>
					<div class='fle-celda fle-nove'>
						<div class='nom-celda'>recomendaciones:</div> 
						<div class='conte-celda'>$fila[6]</div>
					</div>
				
				</div>

				
				
			</div>


		</div>";

}

}else{

	echo "<tr>
		<td colspan='3'>No hay mantenimientos Ejecutados</td>
	
	</tr>";	
	echo"</table>";
}
 ?>


</div>


<div id="contenedor_manprogramado" style="display: none">
	
<?php 
$query="SELECT `id`, `idMaqEquipo`, `title`, `body`, `url`, `class`, `start`, `end`, `inicio_normal`, `final_normal` FROM `manprogramado` where idMaqEquipo=$id";
$resource=mysqli_query($conexion,$query);
$filas=mysqli_num_rows($resource);
if ($filas>0) {
	while($fila=mysqli_fetch_row($resource)){



	echo "
<div class='tbl-consulta'>
	<div class='fila'>
		<div class='celda'>

		<div class='nom-celda'>Titulo Matenimiento:</div> 
		<div class='conte-celda nom-maquina'>$fila[2]</div>
					
		</div>

		<div class='celda'>

		<div class='nom-celda'>Cuerpo Matenimiento:</div> 
		<div class='conte-celda'>$fila[3]</div>
				
		</div>

		<div class='celda'>

		<div class='nom-celda'>Fecha Inicio:</div> 
		<div class='conte-celda'>$fila[8]</div>
				
		</div>
		<div class='celda'>

		<div class='nom-celda'>Fecha Final:</div> 
		<div class='conte-celda'>$fila[9]</div>
				
		</div>

		</div>
			

		</div>";
}
}else{

	echo "<tr>
		<td colspan='3'>No hay mantenimientos Programados</td>
	
	</tr>";	
}
 ?>


</div>