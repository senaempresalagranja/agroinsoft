<!DOCTYPE html>
<?php 
include '../../login/inicio_sesion.php';

 ?>

<html lang="es">
<head>
	<title>Solicitud Mantenimiento</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<!-- fondo y distribucion -->

	<link rel="stylesheet" type="text/css" href="../estilos/estilos.css">
	<link rel="stylesheet" type="text/css" href="../estilos/sweetalert.css">
	<link rel="stylesheet" type="text/css" href="../../login/demo.css">
	<!-- fondo y distribucion -->

	<!--  estilos formularios  -->

	<link rel="stylesheet" type="text/css" href="../estilos/estilosBotones.css">
	<link rel="stylesheet" type="text/css" href="../estilos/buscador.css">

	<!--  estilos formularios  -->

	<!--MENU -->

	<link rel="stylesheet" href="../estilos/estilosCabecera.css">
	<script src="../../jquery-latest.js"></script>
	<script src="../../main.js"></script>

	<!--MENU -->	

	<script src="../js/query.js"></script>
	 
	
	<script src="../js/sweetalert-dev.js"></script>
	<script src="../js/sweetalertmin.js"></script> 
		<script src="../../login/demo.js"></script>
<style type="text/css">
	#id_maquina{
	
		opacity:  0;
	}
</style>



</head>  
<body>

<div id="heade">
<header>
    <div class="menu_bar">
      <a href="#" class="bt-menu"><span class="icon-list2"></span>AGROINSOFT <h3>Solicitud de Mantenimiento</h3></a>
    </div>
 
    <nav>
      <ul>
        <li id="logo"><img src="../../img/isologo.png" class="isologo"></img><a href="#" >AGROINSOFT</a>

		   <div class="itms-menu">

                       <h2>Solicitud de Mantenimiento </h2>
                 	 </div>
        </li>
	<?php 
			include('../includes/menu.php');

		 ?>                 
				  
</div>

</header>

	<section class="contenido">

	<button type="button" class="button btn-ayuda" data-type="zoomin" value="ayuda"   type="button"><img class="icon-ayuda"  src="../iconos/ayuda.svg" alt="x" /></button> 
	<!--==================================
	=            formulario             =
	===================================-->
	<form  class="form" action="" id="formulario"  name="formulario" method="POST" >

			<input type="text" name="id_maquina" id="id_maquina">
		
<hr>
<label align="center"><br> Seccion para Consultar y Seleccionar la Novedad </label>
<br>

<div id="buscador " > 

	<div id="item_buscardor">
	<!-- <div id="btns-busc">
		<button disabled="true" class="boton-item-top" type="button"><label>Buscar Maquinaria</label></button>
       
        <input type="text" autocomplete="off" class="busqueda" name="nombre_cultivo"  style="text-transform: uppercase;"  id="nombre_maquinaria" class="form-control">
		</div> -->
		<div id="btns-busc">
			<button disabled="true" class="boton-item-top" type="button"><label> Selecciona Fecha 1   </label></button>
			<input type="date" name="fecha_solicitud_1" id="fecha_solicitud_1" placeholder="Fecha Busqueda" step="1" min="2001-01-01" max="9999-12-31" required="" > 
		
   			<button disabled="true" class="boton-item-top" type="button"><label> Selecciona Fecha 2   </label></button>
			<input type="date" name="fecha_solicitud_2" id="fecha_solicitud_2" placeholder="Fecha Busqueda" step="1" min="2001-01-01" max="9999-12-31" required="" > 

			<input type="button" value="consultar" onclick="consultar_novedad()">
		</div>

		<div class="input_item">
        	
		</div>
                <div id="contenedor">
  
     			 </div>
    </div>

	    

</div>
<div class="input_conteiner">	

	<div class="input_item" id="contenedor_novedad">
	<select name='id_novedad'  id='id_novedad'  style='opacity:1' onclick='mostrar_especificacion()'>

		<option value='Selecciona'>Selecciona</option>
			<?php 

    		 		$servidor = "localhost"; 
				$usuario = "root"; 
				$contraseña = ""; 
				$BD = "bdagroinsoft"; 
				$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD);
				$insertar="SELECT `idNovedad`, maqyequipo.nomElemento, `tipNovedad`, `fecNovedad`, `perNovedad`, `cedPerNovedad`, `espNovedad`, `prioridad` FROM `novedades` INNER JOIN maqyequipo ON novedades.idMaqEquipo=maqyequipo.idMaqEquipo";
					$resource=mysqli_query($conexion, $insertar);

   		                     while($lista=mysqli_fetch_row($resource)){
                        			echo "<option value='".$lista[0]."' class='form-control'>$lista[1]-$lista[2] </option>";
   		                     };

 			?>
	</div>
</div>

	<br><br>
<br>
<div class="input_conteiner">

	<div class="input_item">
	<label >  Especificacion Novedad seleccionada: </label>   
		
	<input type="text" disabled="" name="nombre_maquina" id="nombre_maquina">
	</div>
</div>
<br>

<hr><br>
<br>
<br>

<label align="center"><br> Continuacion Formulario de Registro Solicitud </label>
<hr>
<br>

		<div class="input_conteiner">

		

			<div class="input_item">
		 	<label>No. Orden.<input type="number" name="numeroOrden" id="numeroOrden"></label>  
		 	</div>
			
			

			<div class="input_item">
			<label>Fecha de Solicitud</label> <input type="date" id="txtfecha" name="txtfecha" class="form-control"  required/> 
		 	</div>


		</div>

		<div class="input_conteiner">

			<div class="input_item">
		 	
			

	

		 	</div>
			

		</div>



		<div class="input_conteiner">

		 	<div class="input_item">
		 	<label>Trabajo a Realizar</label> 
		 	<textarea name="traRealizar" id="traRealizar"></textarea>
		 	</div>

		</div>

		 	<div class="input_conteiner">

		 	<div class="input_item">
		 	<label>Nombre Solicitante:</label>
		 	<input type="text" name="solicitante" id="solicitante">
		 	</div>			


		 	<div class="input_item">
				<label> Tipo Mantenimiento:</label>
	 	
				<select   name="idTipMantenimiento" id="idTipMantenimiento" required=""  onclick="validar_mantenimiento()">
				<option value="Seleccionar">Selecciona</option>
				 <?php
		
    		 		$servidor = "localhost"; 
				$usuario = "root"; 
				$contraseña = ""; 
				$BD = "bdagroinsoft"; 
				$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD);
				$insertar="SELECT  idTipMantenimiento, CONCAT(nomTipMantenimiento) AS idynomMantenimiento FROM tipmantenimiento ";
					$resource=mysqli_query($conexion, $insertar);

   		                     while($lista=mysqli_fetch_row($resource)){
                        			echo "<option value='".$lista[0]."' class='form-control'>".$lista[1]. "</option>";
   		                     };
 		
			  				  ?> 
     
    
				</select>

			</div>

		 	<div class="input_item">
				<label>criticidad</label>
	 	
				<select   name="criticidad" id="criticidad" required=""  onclick="validar_criticidad()">
				<option value="Seleccionar">Selecciona</option>
				 <?php
		
    		 		$servidor = "localhost"; 
				$usuario = "root"; 
				$contraseña = ""; 
				$BD = "bdagroinsoft"; 
				$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD);
				$insertar="SELECT * FROM `criticidad`";
					$resource=mysqli_query($conexion, $insertar);

   		                     while($lista=mysqli_fetch_row($resource)){
                        			echo "<option value='".$lista[0]."' class='form-control'>".$lista[1]. "</option>";
   		                     };
 		
			  				  ?> 
     
    
				</select>

			</div>

				 	<div class="input_item">
				<label>criticidad</label>
	 	
		<input type="button" value="" id="descripcion_criticidad">

			</div>

				<div class="input_item">

					 <label >Tipo de Servicio</label>   
							<select name="tipServicio" id="tipServicio" onclick="validar_servicio()">
							<option value="Seleccionar">Selecionar</option>
							<option value="Electrico">Electrico</option>
							<option value="Mecanico">Mecanico</option>
							<option value="Locativo">Locativo</option>
							<option value="Redes">Redes</option>
						</select>

				</div>

  		</div>
						<h2>Orden de Atencion</h2>

		<div class="input_conteiner">

				<div class="input_item">

					 <label >Prioridad</label>   
							<select name="prioridad" id="prioridad" onclick="validar_prioridad()">
							<option value="Seleccionar">Seleccionar</option>
							<option value="Baja">Baja</option>
							<option value="Media">Media</option>
							<option value="Alta">Alta</option>
						</select>

				</div>

  			<div class="input_item">

					 <label >Lugar del Procedimiento</label>   
							<select name="lugar" id="lugar" onclick="validar_lugar()">
							<option value="Seleccionar">Seleccionar</option>
							<option value="Planta">Planta</option>
							<option value="Externo">Externo</option>
						</select>

			</div>


  		</div>


<div class="conteiner_botones">
	
		
    	<!-- <button type="button" class="btn btn-3" onclick="()" value="Registrar"><img   class="icon" src="../iconos/guardar.svg" alt="x" /></button>  -->

    	<button  class="btn btn-3" type="button" ><img onclick="enviar()" class="icon" src="../iconos/guardar.svg" alt="x" /></button> 
     	
    	<button  class="btn btn-3" type="reset"><img class="icon" src="../iconos/agregar.svg" alt="x" /></button> 

    	<button  class="btn btn-3" type="button" ><img onclick="actualizar()" class="icon" src="../iconos/Actualizar.svg" alt="x" /></button> 

    	<button  type="button"  class="btn btn-3" value="Exportar"><img onclick="exportarpdf()" class="icon" src="../iconos/exppdf.svg" alt="x" /></button> 

    	<button class="btn btn-3"  type="button"><img class="icon" onclick="exportarexcel()" src="../iconos/expexcel.svg" alt="x" /></button> 
  

		<button class="button" data-type="zoomin" onclick="consulta()" type="button"><img class="icon" src="../iconos/consultar.svg" alt="x" /></button>


		<button class="btn btn-3" type="button"><img class="icon" onclick="eliminar_datos()" src="../iconos/eliminar.svg" alt="x" /></button> 




</div> 
 		<button type="button" class="button btn-ayuda" data-type="zoomin" onclick="ayuda()" value="ayuda"   type="button"><img class="icon-ayuda"  src="../iconos/ayuda.svg" alt="x" /></button> 

 		<!-- <input type="button" onclick="popup_ayuda()" class="button" data-type="zoomin" value="Ayuda" > -->

 		<script type="text/javascript">
 			function ayuda() {
 				var consulta=document.getElementById('consulta').style.display="none";
 				var ayuda=document.getElementById('ayuda').style.display="block"
 				
 			}


		function consulta() {
 				var ayuda=document.getElementById('ayuda').style.display="none";
 				var consulta=document.getElementById('consulta').style.display="block";
 			}
 		</script>
</div>

<div id="contenedo">  

</div>

<div id="contenedor1">  

</div>
		</form>
	</section>

   </div>
</div>

</body>


	<div class="overlay-container">

		<div class="window-container zoomin">
		<div id="consulta"> <br>
		<label align="center"> FORMULARIO CONSULTA  </label>

		<br><br><br>
<button disabled="true" class="boton-item-top" type="button"><label> Selecciona Fecha 1   </label></button>
<input type="date" name="" id="fecha1">
<br><br><br>

<button disabled="true" class="boton-item-top" type="button"><label> Selecciona Fecha 2   </label></button>
<input type="date" name="" id="fecha2">	
<br><br><br>

<input type="button" value="consultar" onclick="consultar_solicitud()">
<script>
	function consultar_solicitud() {
	 var fecha1=document.getElementById('fecha1').value;
	 var fecha2=document.getElementById('fecha2').value;	
	 $("#contenedor_consulta").load("consultar_solicitud.php",{fecha1:fecha1,fecha2:fecha2})
	}
</script>
<div id="contenedor_consulta"></div>
<br><br><br>
			<input class="close" type="button"  align="center"   name="" value="cerrar">	
		

</div>


<div id="ayuda">

		<div class="title-poad">Ayuda</div>
		<div class="body-poad">

		<select name="" id="id_consulta" class="ayuda" onclick="consultar_ayuda()">
						<option value="Selecciona">Selecciona</option>
						 <?php

   		$servidor = "localhost"; 
		$usuario = "root"; 
		$contraseña = ""; 
		$BD = "bdagroinsoft"; 
		$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD);
		$insertar="SELECT * FROM `ayuda` WHERE id_formulario=18 order by ayuda.terAyuda";
						$resource=mysqli_query($conexion, $insertar);

                        while($lista=mysqli_fetch_row($resource)){
                        			echo "<option value='".$lista[0]."' class='form-control'>".$lista[2]. "</option>";
                        };
 
	  				  ?> 
					</select>	

					<textarea name="" disabled="" type="button" value="" id="conAyuda">
						
					</textarea>		
			<input class="bnt-poad close" type="button"  align="center"   name="" value="cerrar">	
			</div>
			</div>

			</div>		
</div>

		</div>

<script>



	
	$(document).ready(inicio);

function inicio() {


 $("#nombre_maquinaria").keyup(consulta_automatica);



}

function consulta_automatica() {
	if (validar_consulta_automatica()==true) {
var boton=document.getElementById('contenedor').style.display='block';
var nombre_maquinaria=document.getElementById('nombre_maquinaria').value;
nombre_maquinaria= nombre_maquinaria.toUpperCase();

$("#contenedor").load("consulta_automatica_maquinaria.php", {nombre_maquinaria:nombre_maquinaria});

	}



}



function exportarpdf() {


swal({   title: "Opciones de Exportación",   text: "Opciones de Exportación",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Exportar Todos",   cancelButtonText: "Exportar uno",   closeOnConfirm: true,   closeOnCancel: true }, 

	function(isConfirm){   

	if (isConfirm) { 
        document.formulario.action="exportaciones/exportar_todas_solicitud.php";
        document.formulario.submit();
		alert('Esta exportando todos los registros a PDF');

      } else {    

		document.formulario.action="exportaciones/exporta_solicitud.php";
        document.formulario.submit();
		alert('Esta exportando Formulario Actual a PDF');

        } });


}


function exportarexcel() {


swal({   title: "Opciones de Exportación", closeOnConfirm: false,  text: "Opciones de Exportación",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Exportar Todos",   cancelButtonText: "Exportar uno",   closeOnConfirm: true,   closeOnCancel: true }, 

	function(isConfirm){   

	if (isConfirm) { 

        document.formulario.action="exportaciones/excel_todo_solicitud.php";
        document.formulario.submit();
        alert('Exportando todos los Registros')

      } else {    

		document.formulario.action="exportaciones/excel_uno_solicitud.php";
        document.formulario.submit();
        alert('Exportando Formulario Actual');

        } });



}



</script>


<script type="text/javascript">
	
	function prueba(){
      //un confirm
      alertify.confirm("<p>Aquí confirmamos algo.<br><br><b>ENTER</b> y <b>ESC</b> corresponden a <b>Aceptar</b> o <b>Cancelar</b></p>", function (e) {
            if (e) {
                  alertify.success("Has pulsado '" + alertify.labels.ok + "'");
            } else { 
                        alertify.error("Has pulsado '" + alertify.labels.cancel + "'");
            }
      }); 
      return false
}
</script>

	                         




<script>

function enviar() {



	if ( mostrar_especificacion()==true && validar_numeroOrden()==true && validar_traRealizar()==true && validar_solicitante()==true && validar_mantenimiento()==true && validar_servicio()==true && validar_prioridad()==true && validar_lugar()==true && validar_criticidad()==true) {

var prioridad=document.getElementById('prioridad').value;
var numeroOrden=document.getElementById('numeroOrden').value;
var traRealizar=document.getElementById('traRealizar').value;
var id_novedad=document.getElementById('id_novedad').value;
var traRealizar=document.getElementById('traRealizar').value;
var solicitante=document.getElementById('solicitante').value;
var idTipMantenimiento=document.getElementById('idTipMantenimiento').value;
var tipServicio=document.getElementById('tipServicio').value;
var lugar=document.getElementById('lugar').value;
var txtfecha=document.getElementById('txtfecha').value;
var criticidad=document.getElementById("criticidad").value;

$("#contenedor1").load("registrar_solcitud.php",{numeroOrden:numeroOrden,traRealizar:traRealizar,id_novedad:id_novedad,traRealizar:traRealizar,solicitante:solicitante,idTipMantenimiento:idTipMantenimiento,tipServicio:tipServicio,lugar:lugar,txtfecha:txtfecha,prioridad:prioridad,criticidad:criticidad})

	}else{

alert("algunos campos estan mal")
	}
}


function actualizar() {
	

	if ( mostrar_especificacion()==true && validar_numeroOrden()==true && validar_traRealizar()==true && validar_solicitante()==true && validar_mantenimiento()==true && validar_servicio()==true && validar_prioridad()==true && validar_lugar()==true) {

var prioridad=document.getElementById('prioridad').value;
var numeroOrden=document.getElementById('numeroOrden').value;
var traRealizar=document.getElementById('traRealizar').value;
var id_novedad=document.getElementById('id_novedad').value;
var traRealizar=document.getElementById('traRealizar').value;
var solicitante=document.getElementById('solicitante').value;
var idTipMantenimiento=document.getElementById('idTipMantenimiento').value;
var tipServicio=document.getElementById('tipServicio').value;
var lugar=document.getElementById('lugar').value;
var txtfecha=document.getElementById('txtfecha').value;
	var id_solicitud=document.getElementById('id_solicitud').value;

	var criticidad=document.getElementById("criticidad").value;
$("#contenedor1").load("actualizar_solicitud.php",{numeroOrden:numeroOrden,traRealizar:traRealizar,id_novedad:id_novedad,traRealizar:traRealizar,solicitante:solicitante,idTipMantenimiento:idTipMantenimiento,tipServicio:tipServicio,lugar:lugar,txtfecha:txtfecha,prioridad:prioridad,id_solicitud:id_solicitud,criticidad:criticidad})

	}else{

alert("algunos campos estan mal")
	}
}


function consultar_solicitud1() {
	var id_solicitud=document.getElementById('id_solicitud').value;
	$("#contenedor1").load("consultar_solicitud1.php",{id_solicitud:id_solicitud})

}
	$(document).ready(inicio);
	function inicio() {


$("#numeroOrden").keyup(validar_numeroOrden);
$("#traRealizar").keyup(validar_traRealizar);
$("#solicitante").keyup(validar_solicitante);	

	}

function consultar_novedad() {

var fecha_solicitud_1=document.getElementById('fecha_solicitud_1').value;
var fecha_solicitud_2=document.getElementById('fecha_solicitud_2').value;

$("#contenedor_novedad").load("consultar_novedad.php",{id:id,fecha_solicitud_1:fecha_solicitud_1,fecha_solicitud_2:fecha_solicitud_2})

}


function mostrar_especificacion() {

var id_novedad=document.getElementById('id_novedad').value;

$("#contenedor1").load("mostrar_especificacion.php",{id_novedad:id_novedad});

	if (id_novedad=="Selecciona") {


		var id_novedad=document.getElementById('id_novedad').style.border="2px solid red";
		return false;
	}else{


		var id_novedad=document.getElementById('id_novedad').style.border="2px solid green";
		return true;
	}

}

function validar_numeroOrden() {

			var numeroOrden=parseFloat(document.getElementById('numeroOrden').value);


			if(numeroOrden==null  || numeroOrden.length==0 || /^\s+$/.test(numeroOrden) || numeroOrden<0){


var numeroOrden=document.getElementById('numeroOrden').style.border="2px solid red"
				return false;

			}
			else if (isNaN(numeroOrden)) {
var numeroOrden=document.getElementById('numeroOrden').style.border="2px solid red"
				return false;

			}else {

		var numeroOrden=document.getElementById('numeroOrden').style.border="2px solid green"
				return true;
			}

}

function validar_traRealizar() {

			var traRealizar=document.getElementById('traRealizar').value;
			if(traRealizar==null  || traRealizar.length==0 || /[¿!"#$%&/=?¡'{}_+´´*']/.test(traRealizar)){
	var traRealizar=document.getElementById('traRealizar').style.border="2px solid red"
				return false;

			}else if (traRealizar.length<7) {
var traRealizar=document.getElementById('traRealizar').style.border="2px solid red"
				return false;

			} else{
var traRealizar=document.getElementById('traRealizar').style.border="2px solid green"

			return true;
			}


}



function validar_solicitante() {
		var solicitante=document.getElementById('solicitante').value;
			solicitante=solicitante.toLowerCase();
			if(solicitante==null  || solicitante.length==0 || /[\\^"'<>;ç`,-_ª%&¿¨Ç¡º#~¬€$.*+?=!:|\\/()\[\]{}]/.test(solicitante)){
	var solicitante=document.getElementById('solicitante').style.border="2px solid red"
				return false;

			}else if (isNaN(solicitante)==false) {
var solicitante=document.getElementById('solicitante').style.border="2px solid red"
				return false;

			}else if (solicitante.length>50) {
var solicitante=document.getElementById('solicitante').style.border="2px solid red"
				return false;

			}else{
var solicitante=document.getElementById('solicitante').style.border="2px solid green"

			return true;
			}
}


function validar_mantenimiento() {
		var idTipMantenimiento=document.getElementById("idTipMantenimiento").value;

	if (idTipMantenimiento=="Seleccionar") {


		var idTipMantenimiento=document.getElementById('idTipMantenimiento').style.border="2px solid red";
		return false;
	}else{


		var idTipMantenimiento=document.getElementById('idTipMantenimiento').style.border="2px solid green";
		return true;
	}
}

function validar_servicio() {
	
			var tipServicio=document.getElementById("tipServicio").value;

	if (tipServicio=="Seleccionar") {


		var tipServicio=document.getElementById('tipServicio').style.border="2px solid red";
		return false;
	}else{


		var tipServicio=document.getElementById('tipServicio').style.border="2px solid green";
		return true;
	}
}

function validar_prioridad() {
	

				var prioridad=document.getElementById("prioridad").value;

	if (prioridad=="Seleccionar") {


		var prioridad=document.getElementById('prioridad').style.border="2px solid red";
		return false;
	}else{


		var prioridad=document.getElementById('prioridad').style.border="2px solid green";
		return true;
	}
}

function validar_lugar() {
	

				var lugar=document.getElementById("lugar").value;

	if (lugar=="Seleccionar") {


		var lugar=document.getElementById('lugar').style.border="2px solid red";
		return false;
	}else{


		var lugar=document.getElementById('lugar').style.border="2px solid green";
		return true;
	}

}

function validar_criticidad() {
					var criticidad=document.getElementById("criticidad").value;

	if (criticidad=="Seleccionar") {


		var criticidad=document.getElementById('criticidad').style.border="2px solid red";
		return false;
	}else{


		var criticidad=document.getElementById('criticidad').style.border="2px solid green";
	var criticidad=document.getElementById('criticidad').value;
$("#contenedor1").load("descripcion_criticidad.php",{criticidad:criticidad} );
		return true;
	}
}
function validar_consulta_automatica() {
		var nombre_maquinaria=document.getElementById('nombre_maquinaria').value;
			if(nombre_maquinaria==null  || nombre_maquinaria.length==0 || /[¿!"#$%&/()=?¡'{}_+´´*;:.,']/.test(nombre_maquinaria)){
	var nombre_maquinaria=document.getElementById('nombre_maquinaria').style.border="2px solid red"
				return false;

			}else if (nombre_maquinaria.length>50) {
var nombre_maquinaria=document.getElementById('nombre_maquinaria').style.border="2px solid red"
				return false;

			} else{
var nombre_maquinaria=document.getElementById('nombre_maquinaria').style.border="2px solid green"

			return true;
			}
}
</script>
</html>