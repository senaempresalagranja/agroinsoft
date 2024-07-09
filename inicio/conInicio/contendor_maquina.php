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
	
<!-- 	<button class="cam-button" onclick="exportar_excel()" class="btn btn-3 "  type="button"><img class="icon"  src="../iconos/expexcel.svg" alt="x" /></button> -->

	</div>  

</div>
</section>

	
</div>



<section  id="btns-contenedor">
	<!-- <input  class="btns-dests" type="button" value="ficha tecnica" onclick="cargar_fichatecnica()"> -->
<!-- <input  class="btns-dests" type="button" value="Novedades" onclick="cargar_novedades()" >
<input  class="btns-dests" type="button" value="man programados" onclick="cargar_manprogramado()">
<input  class="btns-dests" type="button" value="man ejecutados" onclick="cargar_manejecutado()"> -->
</section>



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