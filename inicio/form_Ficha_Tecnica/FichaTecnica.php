<!DOCTYPE html>
<html>
 <head>
	<title>Ficha Tecnica</title>
	<?php 
include '../../login/inicio_sesion.php';

 ?>

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
			<script src="../../login/demo.js"></script>

	<!--MENU -->	

	<script src="../js/query.js"></script>
	 
	
	<script src="../js/sweetalert-dev.js"></script>
	<script src="../js/sweetalertmin.js"></script> 
	
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
      <a href="#" class="bt-menu"><span class="icon-list2"></span>AGROINSOFT <h3>Registrar Ficha Tecnica</h3></a>
    </div>
 
    <nav>
      <ul>
        <li id="logo"><img src="../../img/isologo.png" class="isologo"></img><a href="#" >AGROINSOFT</a>

		   <div class="itms-menu">

                       <h2>Registrar Ficha Tecnica</h2>
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
	

<div id="buscador " >

<div id="item_buscardor">
<div id="btns-busc">
<button disabled="true" class="boton-item-top" type="button"><label>Buscar Maquinaria</label></button>

    <input type="text" autocomplete="off" class="busqueda form-control" name="nombre_cultivo"  style="text-transform: uppercase;"  id="nombre_maquinaria">
    </div>
                <div id="contenedor">
  
     			 </div>
    	</div>

    
</div>

<div class="input_conteiner">
	<div class="input_item">
	<label >  Nombre Maquinaria seleccionada: </label>   
		
	<input type="text" disabled="" name="nombre_maquina" id="nombre_maquina">
	</div>

	<div class="input_item"></div>
	<div class="input_item"></div>

</div>

<br/>
<div class="input_conteiner">

	<div class="input_item">

		<label>Funciones y Usos:</label>
	 	<textarea name="funUsos" id="funUsos"></textarea>

	</div>

	
</div>	<br/>


<div class="input_conteiner">

	<div class="input_item">

		<label>Descripción Física:</label>
	 	<textarea name="desFisica" id="desFisica"></textarea>

	</div>

</div><br/>


<div class="input_conteiner">

	<div class="input_item">

		<label>Especificaciones Tecnicas:</label>
	 	<textarea name="espTecnica" id="espTecnica"></textarea>

	</div>

</div><br/>
	

<div class="input_conteiner">

	<div class="input_item">

		<label>Condiciones de Seguridad en el Uso:</label>
	 	<textarea name="conSeguridad" id="conSeguridad"></textarea>

	</div>

	
</div>	<br/>


<div class="input_conteiner">

	<div class="input_item">

		<label>Alistamiento:</label>
	 	<textarea name="alistamiento" id="alistamiento"></textarea>

	</div>

</div><br/>

<div class="input_conteiner">

	<div class="input_item">

		<label>Verificación Y/O Calibración (Incluye Frecuencia):</label>
	 	<textarea name="verCalibracion" id="verCalibracion"></textarea>

	</div>

</div><br/>


<div class="input_conteiner">

	<div class="input_item">

		<label>Instrucciones de Uso:</label>
	 	<textarea name="instrucciones" id="instrucciones"></textarea>

	</div>

	
</div>	<br/>


<div class="input_conteiner">

	<div class="input_item">

		<label>Condiciones del Equipo despues del Uso:</label>
	 	<textarea name="condiciones" id="condiciones"></textarea>

	</div>

</div><br/>

<div class="input_conteiner">

	<div class="input_item">

		<label>Mantenimiento (Actividades Según Su Frecuencia): </label>
	 	<textarea name="mantenimiento" id="mantenimiento"></textarea>

	</div>

</div><br/>


<div class="input_conteiner">

	<div class="input_item">

		<label>Limpieza y Desinfeccion:</label>
	 	<textarea name="limDesinfeccion" id="limDesinfeccion"></textarea>

	</div>
	
</div>	<br/>


<div class="input_conteiner">

	<div class="input_item">

		<label>Control Especial Durante el Manejo:</label>
	 	<textarea name="conManejo" id="conManejo"></textarea>

	</div>


</div><br/>


<div class="conteiner_botones">

		
    	<button onclick="enviar()" class="btn btn-3 " type="button" value="Registrar" ><img  class="icon" src="../iconos/guardar.svg" alt="x" /></button> 
  
    	<button  class="btn btn-3" type="reset"><img class="icon" src="../iconos/agregar.svg" alt="x" /></button> 

    	<button  onclick="actualizar_datos()" class="btn btn-3 " type="button" ><img class="icon" src="../iconos/Actualizar.svg" alt="x" /></button> 

    	<button onclick="exportarpdf()"  type="button"  class="btn btn-3 " value="Exportar"><img class="icon" src="../iconos/exppdf.svg" alt="x" /></button> 
  
    	<button onclick="exportarexcel()" class="btn btn-3 "  type="button"><img class="icon"  src="../iconos/expexcel.svg" alt="x" /></button> 
  
		<button onclick="consultar_datos()" class="btn btn-3 " type="button"><img class="icon"  src="../iconos/consultar.svg" alt="x" /></button>

		<button onclick="eliminar_datos()" class="btn btn-3 " type="button"><img class="icon"  src="../iconos/eliminar.svg" alt="x" /></button> 
		
		<button type="button" class="button btn-ayuda" data-type="zoomin" value="ayuda"   type="button"><img class="icon-ayuda"  src="../iconos/ayuda.svg" alt="x" /></button> 
</div>


<div id="contenedo">  

</div>

<div id="contenedor1">  

</div>

	</form>
	


	</section>

   </div>
</div>
	<div class="overlay-container" >

		<div class="window-container zoomin">
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
		$insertar="SELECT * FROM `ayuda` WHERE id_formulario=2 order by ayuda.terAyuda";
						$resource=mysqli_query($conexion, $insertar);

                        while($lista=mysqli_fetch_row($resource)){
                        			echo "<option value='".$lista[0]."' class='form-control'>".$lista[2]. "</option>";
                        };
 
	  				  ?> 
					</select>	

					<textarea name="" disabled=""  type="button" value="" id="conAyuda">
						
					</textarea>		
			<input class="bnt-poad close" type="button"  align="center"   name="" value="cerrar">	
		
		</div>

		</div>
		</div>

</body>


<script>

function consultar_ayuda() {


  var id_consulta=document.getElementById('id_consulta').value;

$("#contenedor").load("consultar1.php",{id_consulta:id_consulta})
}

	
	$(document).ready(inicio);

function inicio() {


	var conManejo=document.getElementById('conManejo').value;


$("#nombre_maquinaria").keyup(consulta_automatica);
$("#nombre_maquinaria").keyup(validar_consulta_automatica);
$("#funUsos").keyup(validar_funUsos);
$("#desFisica").keyup(validar_desFisica);
$("#espTecnica").keyup(validar_espTecnica);
$("#conSeguridad").keyup(validar_conSeguridad);
$("#alistamiento").keyup(validar_alistamiento);
$("#verCalibracion").keyup(validar_verCalibracion);
$("#instrucciones").keyup(validar_instrucciones);
$("#condiciones").keyup(validar_condiciones);
$("#mantenimiento").keyup(validar_mantenimiento);
$("#limDesinfeccion").keyup(validar_limDesinfeccion);
$("#conManejo").keyup(validar_conManejo);



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
        document.formulario.action="exportaciones/pdf_todo_ficha.php";
        document.formulario.submit();
		alert('Esta exportando todos los registros a PDF');

      } else {    

		document.formulario.action="exportaciones/pdf_uno_ficha.php";
        document.formulario.submit();
		alert('Esta exportando Formulario Actual a PDF');

        } });


}


function exportarexcel() {


swal({   title: "Opciones de Exportación", closeOnConfirm: false,  text: "Opciones de Exportación",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Exportar Todos",   cancelButtonText: "Exportar uno",   closeOnConfirm: true,   closeOnCancel: true }, 

	function(isConfirm){   

	if (isConfirm) { 

        document.formulario.action="exportaciones/excel_todo_ficha.php";
        document.formulario.submit();
        alert('Exportando todos los Registros')

      } else {    

		document.formulario.action="exportaciones/excel_uno_ficha.php";
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
	
	$(document).ready(inicio)


function enviar() {

if (validar_consulta_automatica()==true  && validar_funUsos()==true && validar_desFisica()==true && validar_espTecnica()==true && validar_conSeguridad()==true && validar_alistamiento()==true && validar_verCalibracion()==true && validar_instrucciones()==true && validar_condiciones()==true && validar_mantenimiento()==true && validar_limDesinfeccion()==true && validar_conManejo()==true) {



	var funUsos=document.getElementById('funUsos').value;
	var desFisica=document.getElementById('desFisica').value;
	var espTecnica=document.getElementById('espTecnica').value;
	var conSeguridad=document.getElementById('conSeguridad').value;
	var alistamiento=document.getElementById('alistamiento').value;
	var verCalibracion=document.getElementById('verCalibracion').value;
	var instrucciones=document.getElementById('instrucciones').value;
	var condiciones=document.getElementById('condiciones').value;
	var mantenimiento=document.getElementById('mantenimiento').value;
	var limDesinfeccion=document.getElementById('limDesinfeccion').value;
	var conManejo=document.getElementById('conManejo').value;

$("#contenedor").load("enviar_datos.php",{id:id, funUsos:funUsos, desFisica:desFisica, espTecnica:espTecnica, conSeguridad:conSeguridad,  alistamiento:alistamiento,  verCalibracion:verCalibracion, instrucciones:instrucciones, condiciones:condiciones, mantenimiento:mantenimiento, limDesinfeccion:limDesinfeccion, conManejo:conManejo });


}else{

alert("algunos campos estan vacios o incorrectos ")

	}

}





function consultar_datos() {
	


$("#contenedor").load("consultar_datos.php",{id:id});

return true;

}







function actualizar_datos() {
	

var funUsos=document.getElementById('funUsos').value;
var desFisica=document.getElementById('desFisica').value;
var espTecnica=document.getElementById('espTecnica').value;
var conSeguridad=document.getElementById('conSeguridad').value;
var alistamiento=document.getElementById('alistamiento').value;
var verCalibracion=document.getElementById('verCalibracion').value;
var instrucciones=document.getElementById('instrucciones').value;
var condiciones=document.getElementById('condiciones').value;
var mantenimiento=document.getElementById('mantenimiento').value;
var limDesinfeccion=document.getElementById('limDesinfeccion').value;
var conManejo=document.getElementById('conManejo').value;


$("#contenedor").load("actualizar_datos.php",{id:id, funUsos:funUsos, desFisica:desFisica, espTecnica:espTecnica, conSeguridad:conSeguridad,  alistamiento:alistamiento,  verCalibracion:verCalibracion, instrucciones:instrucciones, condiciones:condiciones, mantenimiento:mantenimiento, limDesinfeccion:limDesinfeccion, conManejo:conManejo });


}


function eliminar_datos() {

var formulario=document.getElementById('formulario').action="eliminar_datos.php";
$("#formulario").submit();
alert('REGISTRO ELIMINADO');



}



// -----------------------VALIDACIONES-----------------------------------------------------------------------


function validar_consulta_automatica() {
		var nombre_maquinaria=document.getElementById('nombre_maquinaria').value;
			if(nombre_maquinaria==null  || nombre_maquinaria.length==0 || /[¿!"#$%&=?¡'{}_+´´*;:.,']/.test(nombre_maquinaria)){
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

function validar_funUsos() {
	
		var funUsos=document.getElementById('funUsos').value;
			if(funUsos==null  || funUsos.length==0 || /[¿!"#$&=?¡'{}_+´´*']/.test(funUsos)){
	var funUsos=document.getElementById('funUsos').style.border="2px solid red"
				return false;

			}else if (funUsos.length>6000) {
var funUsos=document.getElementById('funUsos').style.border="2px solid red"
				return false;

			} else{
var funUsos=document.getElementById('funUsos').style.border="2px solid green"

			return true;
			}
}

function validar_desFisica() {
	
		var desFisica=document.getElementById('desFisica').value;
			if(desFisica==null  || desFisica.length==0 || /[¿!"#$&=?¡'{}_+´´*']/.test(desFisica)){
	var desFisica=document.getElementById('desFisica').style.border="2px solid red"
				return false;

			}else if (desFisica.length>6000) {
var desFisica=document.getElementById('desFisica').style.border="2px solid red"
				return false;

			} else{
var desFisica=document.getElementById('desFisica').style.border="2px solid green"

			return true;
			}
}



function validar_espTecnica() {
	
		var espTecnica=document.getElementById('espTecnica').value;
			if(espTecnica==null  || espTecnica.length==0 || /[¿!"#$&=?¡'{}_+´´*']/.test(espTecnica)){
	var espTecnica=document.getElementById('espTecnica').style.border="2px solid red"
				return false;

			}else if (espTecnica.length>6000) {
var espTecnica=document.getElementById('espTecnica').style.border="2px solid red"
				return false;

			} else{
var espTecnica=document.getElementById('espTecnica').style.border="2px solid green"

			return true;
			}
}






function validar_conSeguridad() {
	
		var conSeguridad=document.getElementById('conSeguridad').value;
			if(conSeguridad==null  || conSeguridad.length==0 || /[¿!"#$&=?¡'{}_+´´*']/.test(conSeguridad)){
	var conSeguridad=document.getElementById('conSeguridad').style.border="2px solid red"
				return false;

			}else if (conSeguridad.length>6000) {
var conSeguridad=document.getElementById('conSeguridad').style.border="2px solid red"
				return false;

			} else{
var conSeguridad=document.getElementById('conSeguridad').style.border="2px solid green"

			return true;
			}
}






function validar_alistamiento() {
	
		var alistamiento=document.getElementById('alistamiento').value;
			if(alistamiento==null  || alistamiento.length==0 || /[¿!"#$&=?¡'{}_+´´*']/.test(alistamiento)){
	var alistamiento=document.getElementById('alistamiento').style.border="2px solid red"
				return false;

			}else if (alistamiento.length>6000) {
var alistamiento=document.getElementById('alistamiento').style.border="2px solid red"
				return false;

			} else{
var alistamiento=document.getElementById('alistamiento').style.border="2px solid green"

			return true;
			}
}








function validar_verCalibracion() {
	
		var verCalibracion=document.getElementById('verCalibracion').value;
			if(verCalibracion==null  || verCalibracion.length==0 || /[¿!"#$&=?¡'{}_+´´*']/.test(verCalibracion)){
	var verCalibracion=document.getElementById('verCalibracion').style.border="2px solid red"
				return false;

			}else if (verCalibracion.length>6000) {
var verCalibracion=document.getElementById('verCalibracion').style.border="2px solid red"
				return false;

			} else{
var verCalibracion=document.getElementById('verCalibracion').style.border="2px solid green"

			return true;
			}
}




function validar_instrucciones() {
	
		var instrucciones=document.getElementById('instrucciones').value;
			if(instrucciones==null  || instrucciones.length==0 || /[¿!"#$&=?¡'{}_+´´*']/.test(instrucciones)){
	var instrucciones=document.getElementById('instrucciones').style.border="2px solid red"
				return false;

			}else if (instrucciones.length>6000) {
var instrucciones=document.getElementById('instrucciones').style.border="2px solid red"
				return false;

			} else{
var instrucciones=document.getElementById('instrucciones').style.border="2px solid green"

			return true;
			}
}

function validar_condiciones() {
	
		var condiciones=document.getElementById('condiciones').value;
			if(condiciones==null  || condiciones.length==0 || /[¿!"#$&=?¡'{}_+´´*']/.test(condiciones)){
	var condiciones=document.getElementById('condiciones').style.border="2px solid red"
				return false;

			}else if (condiciones.length>3000) {
var condiciones=document.getElementById('condiciones').style.border="2px solid red"
				return false;

			} else{
var condiciones=document.getElementById('condiciones').style.border="2px solid green"

			return true;
			}
}



function validar_mantenimiento() {
	
		var mantenimiento=document.getElementById('mantenimiento').value;
			if(mantenimiento==null  || mantenimiento.length==0 || /[¿!"#$&=?¡'{}_+´´*']/.test(mantenimiento)){
	var mantenimiento=document.getElementById('mantenimiento').style.border="2px solid red"
				return false;

			}else if (mantenimiento.length>1000) {
var mantenimiento=document.getElementById('mantenimiento').style.border="2px solid red"
				return false;

			} else{
var mantenimiento=document.getElementById('mantenimiento').style.border="2px solid green"

			return true;
			}
}





function validar_limDesinfeccion() {
	
		var limDesinfeccion=document.getElementById('limDesinfeccion').value;
			if(limDesinfeccion==null  || limDesinfeccion.length==0 || /[¿!"#$&=?¡'{}_+´´*']/.test(limDesinfeccion)){
	var limDesinfeccion=document.getElementById('limDesinfeccion').style.border="2px solid red"
				return false;

			}else if (limDesinfeccion.length>6000) {
var limDesinfeccion=document.getElementById('limDesinfeccion').style.border="2px solid red"
				return false;

			} else{
var limDesinfeccion=document.getElementById('limDesinfeccion').style.border="2px solid green"

			return true;
			}
}


function validar_conManejo() {
	
		var conManejo=document.getElementById('conManejo').value;
			if(conManejo==null  || conManejo.length==0 || /[¿!"#$&=?¡'{}_+´´*']/.test(conManejo)){
	var conManejo=document.getElementById('conManejo').style.border="2px solid red"
				return false;

			}else if (conManejo.length>6000) {
var conManejo=document.getElementById('conManejo').style.border="2px solid red"
				return false;

			} else{
var conManejo=document.getElementById('conManejo').style.border="2px solid green"

			return true;
			}
}


</script>


</html>
