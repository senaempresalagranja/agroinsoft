 <!DOCTYPE html>
<html>
<?php 
include '../../login/inicio_sesion.php';

 ?>

<head>
	<title>Entradas</title>
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
      <a href="#" class="bt-menu"><span class="icon-list2"></span>AGROINSOFT <h3>Registrar Entrada</h3></a>
    </div>
 
    <nav>
      <ul>
        <li id="logo"><img src="../../img/isologo.png" class="isologo"></img><a href="#" >AGROINSOFT</a>

		   <div class="itms-menu">

                       <h2>Registrar Entrada</h2>
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
		
<div id="buscador">

	<div id="item_buscardor">
	<div id="btns-busc">
	<button disabled="true" class="boton-item-top" type="button"><label>Buscar Maquinaria</label></button>
	
   <input type="text" autocomplete="off" class="busqueda" name="nombre_cultivo"  style="text-transform: uppercase;"  id="nombre_maquinaria" class="form-control">
   <input type="date" name="" id="fecha_consulta">
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
	 <label >Fecha: </label>   
		<input type="date" name="fecEntrada" id="fecEntrada">
	</div>

	<div class="input_item">
	
		<label>Estado: </label>	 
		<select name="estMaqEntrada" id="estMaqEntrada" onclick="validar_estado()">
		<option value="Selecciona">Selecciona</option>
			<option value="BUENO">BUENO</option>
			<option value="MALO">MALO</option>
		</select>
			
	</div>
	<div class="input_item">

		<label>Ubicacion:</label>
	 	<select   name="idUbicacion" id="idUbicacion" required="" onclick="validar_ubicacion()">
	 	<option value="Selecciona">Selecciona</option>
		 <?php

     		$servidor = "localhost"; 
		$usuario = "root"; 
		$contraseña = ""; 
		$BD = "bdagroinsoft"; 
		$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD);
		$insertar="SELECT  idUbicacion, CONCAT( idUbicacion, '-',  nomUbicacion) AS idUnidadnomunidad FROM ubicacion ";
			$resource=mysqli_query($conexion, $insertar);

                        while($lista=mysqli_fetch_row($resource)){
                        			echo "<option value='".$lista[0]."' class='form-control'>".$lista[1]. "</option>";
                        };
 
	  				  ?> 
     
    
		</select>  

	</div>

</div>	

<div class="input_conteiner">

	<div class="input_item">

		<label>Procedimiento:</label>
	 	<textarea name="procedimiento" id="procedimiento"></textarea>

	</div>

	
</div>	

<div class="input_conteiner">

	<div class="input_item">

		<label>Nombre:</label>
	 	 <input type="text" name="nomPer" id="nomPer">

	</div>

	<div class="input_item">

		 <label>Cedula:</label>
	 <input type="text" name="cedPer" id="cedPer">

	</div>

</div>
	
<div class="conteiner_botones">

		
    	<button class="btn btn-3" type="button" value="Registrar" onclick="enviar()"><img  class="icon" src="../iconos/guardar.svg" alt="x" /></button> 

	  	<button  class="btn btn-3" type="reset"><img class="icon" src="../iconos/agregar.svg" alt="x" /></button> 
    	
    	<button  class="btn btn-3" type="button" ><img onclick="actualizar_datos()" class="icon" src="../iconos/Actualizar.svg" alt="x" /></button> 

    	<button  type="button"  class="btn btn-3" value="Exportar"><img onclick="exportarpdf()" class="icon" src="../iconos/exppdf.svg" alt="x" /></button> 
  
    	<button class="btn btn-3"  type="button"><img class="icon" onclick="exportarexcel()" src="../iconos/expexcel.svg" alt="x" /></button> 

		<button class="btn btn-3" type="button"><img class="icon" onclick="consultar_datos()" src="../iconos/consultar.svg" alt="x" /></button>
    	
		<button class="btn btn-3" type="button"><img class="icon" onclick="eliminar_datos()" src="../iconos/eliminar.svg" alt="x" /></button> 

  <button type="button" class="button btn-ayuda" data-type="zoomin" value="ayuda"   type="button"><img class="icon-ayuda"  src="../iconos/ayuda.svg" alt="x" /></button> 
 	
</div>

<div id="contenedo">  

</div>

<div id="contenedor1">  

</div>

	</form>
	


	</section>
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
		$insertar="SELECT * FROM `ayuda` WHERE id_formulario=5 order by ayuda.terAyuda";
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

	hoy = yyyy+'-'+mm+'-'+dd;
var fecEntrada=document.getElementById('fecEntrada').type='button';
var fecEntrada=document.getElementById('fecEntrada').value=hoy;

 $("#procedimiento").keyup(validar_procedimiento);
  $("#nomPer").keyup(validar_nomPer);
   $("#cedPer").keyup(validar_cedPer);




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
        document.formulario.action="exportaciones/pdf_todo_entrada.php";
        document.formulario.submit();
		alert('Esta exportando todos los registros a PDF');

      } else {    
var fecEntrada=document.getElementById('fecEntrada').type='text';
		document.formulario.action="exportaciones/pdf_uno_entrada.php";
        document.formulario.submit();
		alert('Esta exportando Formulario Actual a PDF');
var fecEntrada=document.getElementById('fecEntrada').type='button';
        } });


}


function exportarexcel() {


swal({   title: "Opciones de Exportación", closeOnConfirm: false,  text: "Opciones de Exportación",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Exportar Todos",   cancelButtonText: "Exportar uno",   closeOnConfirm: true,   closeOnCancel: true }, 

	function(isConfirm){   

	if (isConfirm) { 

        document.formulario.action="exportaciones/excel_todo_entrada.php";
        document.formulario.submit();
        alert('Exportando todos los Registros')

      } else {    
var fecEntrada=document.getElementById('fecEntrada').type='text';
		document.formulario.action="exportaciones/excel_uno_entrada.php";
        document.formulario.submit();
        alert('Exportando Formulario Actual');
var fecEntrada=document.getElementById('fecEntrada').type='button';
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
	
if (validar_consulta_automatica()==true && validar_estado()==true && validar_ubicacion()==true && validar_procedimiento()==true && validar_nomPer()==true && validar_cedPer()==true) {
var fecEntrada=document.getElementById('fecEntrada').value;
var estMaqEntrada=document.getElementById('estMaqEntrada').value;
var idUbicacion=document.getElementById('idUbicacion').value;
var procedimiento=document.getElementById('procedimiento').value;
var nomPer=document.getElementById('nomPer').value;
var cedPer=document.getElementById('cedPer').value;


$("#contenedor").load("enviar_datos.php",{id:id, fecEntrada:fecEntrada, estMaqEntrada:estMaqEntrada, idUbicacion:idUbicacion, procedimiento:procedimiento,  nomPer:nomPer,  cedPer:cedPer });


}else{


	alert("Algunos campos estan vacios o incorrectos")
}




}







function consultar_datos() {
	

var fecha_consulta=document.getElementById('fecha_consulta').value;


$("#contenedor").load("consultar_datos.php",{id:id, fecha_consulta:fecha_consulta});



}







function actualizar_datos() {
	

var fecEntrada=document.getElementById('fecEntrada').value;
var estMaqEntrada=document.getElementById('estMaqEntrada').value;
var idUbicacion=document.getElementById('idUbicacion').value;
var procedimiento=document.getElementById('procedimiento').value;
var nomPer=document.getElementById('nomPer').value;
var cedPer=document.getElementById('cedPer').value;


$("#contenedor").load("actualizar_datos.php",{id:id, fecEntrada:fecEntrada, estMaqEntrada:estMaqEntrada, idUbicacion:idUbicacion, procedimiento:procedimiento,  nomPer:nomPer,  cedPer:cedPer  });


}



function eliminar_datos() {

var formulario=document.getElementById('formulario').action="eliminar_datos.php";
$("#formulario").submit();
alert('REGISTRO ELIMINADO');



// -----------------------VALIDACIONES-----------------------------------------------------------------------




}




function validar_consulta_automatica() {
		var nombre_maquinaria=document.getElementById('nombre_maquinaria').value;
			if(nombre_maquinaria==null  || nombre_maquinaria.length==0 || /[¿!"#$%&/()=?¡'{}_+´´\|@*;:.,']/.test(nombre_maquinaria)){
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

function validar_estado() {
	var estMaqEntrada=document.getElementById('estMaqEntrada').value;
	if (estMaqEntrada=="Selecciona") {
var estMaqEntrada=document.getElementById('estMaqEntrada').style.border="2px solid red"
				return false;


	}else{

		var estMaqEntrada=document.getElementById('estMaqEntrada').style.border="2px solid green"
				return true;

	}
}

function validar_ubicacion() {
	var idUbicacion=document.getElementById('idUbicacion').value;
	if (idUbicacion=="Selecciona") {
var idUbicacion=document.getElementById('idUbicacion').style.border="2px solid red"
				return false;


	}else{

		var idUbicacion=document.getElementById('idUbicacion').style.border="2px solid green"
				return true;

	}
}

function validar_procedimiento() {
	
		var procedimiento=document.getElementById('procedimiento').value;
			if(procedimiento==null  || procedimiento.length==0 || /[¿!"#$%&/=?¡'{}_+´´*']/.test(procedimiento)){
	var procedimiento=document.getElementById('procedimiento').style.border="2px solid red"
				return false;

			}else if (procedimiento.length>50) {
var procedimiento=document.getElementById('procedimiento').style.border="2px solid red"
				return false;

			} else{
var procedimiento=document.getElementById('procedimiento').style.border="2px solid green"

			return true;
			}
}


		function validar_nomPer() {
			var nomPer=document.getElementById('nomPer').value; nomPer=nomPer.toLowerCase();
			if(nomPer==null  || nomPer.length==0 || /[\\^"'<>;ç`,-_ª%&¿¨Ç¡º#~¬€$.*+?=!:|\\/()\[\]{}]/.test(nomPer)){
var nomPer=document.getElementById('nomPer').style.border="2px solid red"			
				return false;

			}else if (isNaN(nomPer)==false) {
var nomPer=document.getElementById('nomPer').style.border="2px solid red"
				return false;

			}else if (nomPer.length>50) {
var nomPer=document.getElementById('nomPer').style.border="2px solid red"
				return false;

			}else{

var nomPer=document.getElementById('nomPer').style.border="2px solid green"
				return true;
			}


		}

		function validar_cedPer () {
			var cedPer=document.getElementById('cedPer').type="number";
			var cedPer=parseFloat(document.getElementById('cedPer').value);

			if(cedPer==null  || cedPer.length==0 || /^\s+$/.test(cedPer) || cedPer<0){
 cedPer=document.getElementById('cedPer').style.border='2px solid red'
				return false;

			}
			else if (isNaN(cedPer)) {
			 cedPer=document.getElementById('cedPer').style.border='2px solid red'
				return false;

			}else {

			
 cedPer=document.getElementById('cedPer').style.border='2px solid green'
				return true;
			}

		}

</script>
</body>

</html>
