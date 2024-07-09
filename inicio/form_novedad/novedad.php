 
<!DOCTYPE html>
<html>
<head>
<?php 
include '../../login/inicio_sesion.php';

 ?>

	<title>Novedad</title>
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
      <a href="#" class="bt-menu"><span class="icon-list2"></span>AGROINSOFT <h3>Registrar Novedad</h3></a>
    </div>
 
    <nav>
      <ul>
        <li id="logo"><img src="../../img/isologo.png" class="isologo"></img><a href="#" >AGROINSOFT</a>

		   <div class="itms-menu">

                       <h2>Registrar Novedad</h2>
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
       
        <input type="text" autocomplete="off" class="busqueda" name="nombre_cultivo"  style="text-transform: uppercase;"  id="nombre_maquinaria" class="form-control">
        <input type="date" name="fecNovedad" id="fecNovedad1" placeholder="Fecha Busqueda" step="1" min="2001-01-01" max="9999-12-31" required="" > 	
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

	<div class="input_item">
	 <label >Tipo Novedad Mantenimiento: </label>   
		<select name="tipNovedad" id="tipNovedad" onclick="validar_tipo_novedad()">
		<option value="Selecciona">Selecciona</option>
			
			<option value="NO ENCIENDE">NO ENCIENDE</option>
			<option value="DAÑO">DAÑO</option>
			<option value="MAL FUNCIONAMIENTO">MAL FUNCIONAMIENTO</option>
		</select>	
	</div>



	<div class="input_item">
	
		<label>Fecha de Novedad: </label>	 
		<input type="button" name="fecNovedad" id="fecNovedad" step="1" min="2001-01-01" max="9999-12-31" required="" > 
			
	</div>
	<div class="input_item">

		 <label >Prioridad</label>   
				<select name="prioridad" id="prioridad" onclick="validar_prioridad()">
				<option value="Selecciona">Selecciona</option>
				<option value="BAJA">BAJA</option>
				<option value="MEDIA">MEDIA</option>
				<option value="ALTA">ALTA</option>
			</select>

	</div>


</div>	
<div class="input_conteiner">


	

	<div class="input_item">

		<label>Quien Reporta:</label>
	 	<input type="text" name="perNovedad" id="perNovedad"  maxlength="100" required=""> 

	</div>

	<div class="input_item">

		 <label>Número Identificación</label>
	 <input type="number" name="cedPerNovedad" id="cedPerNovedad"  maxlength="100" required=""> 

	</div>

</div>
<div class="input_conteiner">

	<div class="input_item input-gran">

		<label>Especificación Novedad:</label>
	 	<textarea name="espNovedad" id="espNovedad" cols="30" rows="10"></textarea>

	</div>

</div>	

	
<div class="conteiner_botones">
		
    	<button class="btn btn-3" onclick="enviar()" type="button" value="Registrar" ><img  class="icon" src="../iconos/guardar.svg" alt="x" /></button> 
   
    	<button  class="btn btn-3" type="reset"><img class="icon" src="../iconos/agregar.svg" alt="x" /></button> 
    	
    	<button  class="btn btn-3" type="button" onclick="actualizar_datos()" ><img  class="icon" src="../iconos/Actualizar.svg" alt="x" /></button> 

    	<button  type="button" onclick="exportarpdf()"  class="btn btn-3" value="Exportar"><img  class="icon" src="../iconos/exppdf.svg" alt="x" /></button> 
  
    	<button class="btn btn-3"  onclick="exportarexcel()"  type="button"><img class="icon" src="../iconos/expexcel.svg" alt="x" /></button> 

		<button class="btn btn-3" type="button" onclick="consultar_datos()"><img class="icon"  src="../iconos/consultar.svg" alt="x" /></button> 
    	
		<button class="btn btn-3" onclick="eliminar_datos()" type="button"><img class="icon"  src="../iconos/eliminar.svg" alt="x" /></button> 
    	
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

	<div class="overlay-container">

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
		$insertar="SELECT * FROM `ayuda` WHERE id_formulario=3 order by ayuda.terAyuda";
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
</body>


<script>


function consultar_ayuda() {


  var id_consulta=document.getElementById('id_consulta').value;

$("#contenedor").load("consultar1.php",{id_consulta:id_consulta})
}
	
	$(document).ready(inicio);

function inicio() {


 $("#nombre_maquinaria").keyup(consulta_automatica);
		var hoy = new Date();
			var dd = hoy.getDate();
			var mm = hoy.getMonth()+1; //hoy es 0!
			var yyyy = hoy.getFullYear();

			if(dd<10) {
	    		dd='0'+dd
		} 

		if(mm<10) {
	    	mm='0'+mm
	} 

	hoy = yyyy+'/'+mm+'/'+dd;
	var fecNovedad=document.getElementById('fecNovedad').value=hoy;




$("#perNovedad").keyup(validar_perNovedad);
$("#cedPerNovedad").keyup(validar_cedPerNovedad);
$("#espNovedad").keyup(validar_espNovedad);


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
        document.formulario.action="exportaciones/pdf_todo_novedad.php";
        document.formulario.submit();
		alert('Esta exportando todos los registros a PDF');

      } else {    

		document.formulario.action="exportaciones/pdf_uno_novedad.php";
        document.formulario.submit();
		alert('Esta exportando Formulario Actual a PDF');

        } });


}


function exportarexcel() {


swal({   title: "Opciones de Exportación", closeOnConfirm: false,  text: "Opciones de Exportación",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Exportar Todos",   cancelButtonText: "Exportar uno",   closeOnConfirm: true,   closeOnCancel: true }, 

	function(isConfirm){   

	if (isConfirm) { 

        document.formulario.action="exportaciones/excel_todo_novedad.php";
        document.formulario.submit();
        alert('Exportando todos los Registros')

      } else {    

		document.formulario.action="exportaciones/excel_uno_novedad.php";
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

if ( validar_consulta_automatica()==true && validar_tipo_novedad()==true &&  validar_prioridad()==true && validar_perNovedad()==true && validar_cedPerNovedad()==true && validar_espNovedad()==true ) {
var tipNovedad=document.getElementById('tipNovedad').value;
var fecNovedad=document.getElementById('fecNovedad').value;
var perNovedad=document.getElementById('perNovedad').value;
var cedPerNovedad=document.getElementById('cedPerNovedad').value;
var espNovedad=document.getElementById('espNovedad').value;
var prioridad=document.getElementById('prioridad').value;


$("#contenedo").load("enviar_datos.php",{id:id, tipNovedad:tipNovedad, fecNovedad:fecNovedad, perNovedad:perNovedad, cedPerNovedad:cedPerNovedad,  espNovedad:espNovedad,  prioridad:prioridad });


}else{


	alert("algunos campos no estan validados")
}


}




function consultar_datos() {
	
var fecNovedad=document.getElementById('fecNovedad1').value;

$("#contenedor").load("consultar_datos.php",{id:id,fecNovedad:fecNovedad});




}




function actualizar_datos() {


var tipNovedad=document.getElementById('tipNovedad').value;
var fecNovedad=document.getElementById('fecNovedad').value;
var perNovedad=document.getElementById('perNovedad').value;
var cedPerNovedad=document.getElementById('cedPerNovedad').value;
var espNovedad=document.getElementById('espNovedad').value;
var prioridad=document.getElementById('prioridad').value;


$("#contenedor").load("actualizar_datos.php",{id:id, tipNovedad:tipNovedad, fecNovedad:fecNovedad, perNovedad:perNovedad, cedPerNovedad:cedPerNovedad,  espNovedad:espNovedad,  prioridad:prioridad });


}



function eliminar_datos() {

var formulario=document.getElementById('formulario').action="eliminar_datos.php";
$("#formulario").submit();
alert('REGISTRO ELIMINADO');


}

// -----------------------VALIDACIONES-----------------------------------------------------------------------


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

function validar_tipo_novedad() {
	var tipNovedad=document.getElementById("tipNovedad").value;

	if (tipNovedad=="Selecciona") {


		var tipNovedad=document.getElementById('tipNovedad').style.border="2px solid red";
			return false;
	}else{


		var tipNovedad=document.getElementById('tipNovedad').style.border="2px solid green";
			return true;
	}

	
}



function validar_prioridad() {
	var prioridad=document.getElementById("prioridad").value;

	if (prioridad=="Selecciona") {


		var prioridad=document.getElementById('prioridad').style.border="2px solid red";
		return false;
	}else{


		var prioridad=document.getElementById('prioridad').style.border="2px solid green";
		return true;
	}

	
}




function validar_perNovedad() {
		var perNovedad=document.getElementById('perNovedad').value;
			perNovedad=perNovedad.toLowerCase();
			if(perNovedad==null  || perNovedad.length==0 || /[\\^"'<>;ç`,-_ª%&¿¨Ç¡º#~¬€$.*+?=!:|\\/()\[\]{}]/.test(perNovedad)){
	var perNovedad=document.getElementById('perNovedad').style.border="2px solid red"
				return false;

			}else if (isNaN(perNovedad)==false) {
var perNovedad=document.getElementById('perNovedad').style.border="2px solid red"
				return false;

			}else if (perNovedad.length>50) {
var perNovedad=document.getElementById('perNovedad').style.border="2px solid red"
				return false;

			}else{
var perNovedad=document.getElementById('perNovedad').style.border="2px solid green"

			return true;
			}
}



function validar_cedPerNovedad() {

			var cedPerNovedad=parseFloat(document.getElementById('cedPerNovedad').value);


			if(cedPerNovedad==null  || cedPerNovedad.length==0 || /^\s+$/.test(cedPerNovedad) || cedPerNovedad<0){


var cedPerNovedad=document.getElementById('cedPerNovedad').style.border="2px solid red"
				return false;

			}
			else if (isNaN(cedPerNovedad)) {
var cedPerNovedad=document.getElementById('cedPerNovedad').style.border="2px solid red"
				return false;

			}else {

		var cedPerNovedad=document.getElementById('cedPerNovedad').style.border="2px solid green"
				return true;
			}

}

function validar_espNovedad() {

			var espNovedad=document.getElementById('espNovedad').value;
			if(espNovedad==null  || espNovedad.length==0 || /[¿!"#$%&/=?¡'{}_+´´*']/.test(espNovedad)){
	var espNovedad=document.getElementById('espNovedad').style.border="2px solid red"
				return false;

			}else{
var espNovedad=document.getElementById('espNovedad').style.border="2px solid green"

			return true;
			}


}



</script>
</html>
