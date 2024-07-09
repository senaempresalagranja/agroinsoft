 <!DOCTYPE html>
<html>
<?php 
include '../../login/inicio_sesion.php';

 ?>

<head>
	<title>Mantenimiento Ejecutado</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<!-- fondo y distribucion -->
	<link rel="stylesheet" href="../../login/demo.css">
	<link rel="stylesheet" type="text/css" href="../estilos/estilos.css">
	<link rel="stylesheet" type="text/css" href="../estilos/sweetalert.css">
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
      <a href="#" class="bt-menu"><span class="icon-list2"></span>AGROINSOFT <h3>Registrar Mantenimiento Ejecutado</h3></a>
    </div>
 
    <nav>
      <ul>
        <li id="logo"><img src="../../img/isologo.png" class="isologo"></img><a href="#" >AGROINSOFT</a>

		   <div class="itms-menu">

                       <h2>Registrar Mantenimiento Ejecutado</h2>
                 	 </div>
        </li>
	<?php 
			include('../includes/menu.php');

		 ?>

		
                    
				  
</div>

</header>



	<section class="contenido">

	<!-- <button type="button" class="button btn-ayuda" data-type="zoomin" value="ayuda"   type="button"><img class="icon-ayuda"  src="../iconos/ayuda.svg" alt="x" /></button>  -->
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
     </br>
        <input type="button" value="" style="opacity:0" id="diferencia_fecha">
         </div>
                <div id="contenedor">
  
     			 </div>
    	</div>


</div>
<hr><br>
<label for="" align="center">Seccion disponible para consultar y seleccionar el mantenimiento programado que fue ejecutado</label>
<br>

<div class="input_conteiner">

	<div class="input_item">
	<label for="">Selecciona Fecha 1</label><input type="date" name="" id="fecha_1">
	</div>

	<div class="input_item">
	<label for="">Selecciona Fecha 2</label><input  type="date" name="" id="fecha_2">
	</div>

	<div class="input_item">
	<label for="">&nbsp</label><input type="button" value="Consultar" onclick="consultar_mantenimiento()" >
	</div>

</div>

<br>
<select style="margin-bottom: 30px;" name='' id='id_mantenimiento_programado' onclick="validar_mantenimiento()">
<option value='Selecciona'>Selecciona</option>
<?php 
$connection=mysqli_connect("localhost","root","","bdagroinsoft");
$query="SELECT manprogramado.id, maqyequipo.nomElemento, inicio_normal FROM `manprogramado` INNER JOIN maqyequipo ON manprogramado.idMaqEquipo=maqyequipo.idMaqEquipo ";

$resource=mysqli_query($connection,$query);
$numero=mysqli_num_rows($resource);
	while ($fila=mysqli_fetch_row($resource)) {
	
echo "<option value='$fila[0]'>$fila[1]--$fila[2]</option>";
	} ?>
</select>

<hr> <br>
<label for="" align="center">Continuacion Formulario de Registro del Mantenimiento Ejecutado</label>
<hr> <br>


<div class="input_conteiner">

	<div class="input_item">
	<label > Nombre Maquinaria seleccionada: </label>   
		
	<input type="text" disabled="" name="nombre_maquina" id="nombre_maquina">
	</div>



	<div class="input_item">
	 <label >Tipo Mantenimiento: </label>   
		<select   name="idTipMantenimiento" id="idTipMantenimiento"  onclick="validar_tipo_mantenimiento()"> 
		<option value="Selecciona">Selecciona</option>
		 <?php

     		$servidor = "localhost"; 
		$usuario = "root"; 
		$contraseña = ""; 
		$BD = "bdagroinsoft"; 
		$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD);
		$insertar="SELECT  idTipMantenimiento, CONCAT( nomTipMantenimiento) AS idTipMantenimientonomMantenimiento FROM tipmantenimiento ";
			$resource=mysqli_query($conexion, $insertar);

                        while($lista=mysqli_fetch_row($resource)){
                        			echo "<option value='".$lista[0]."' class='form-control'>".$lista[1]. "</option>";
                        };
 
	  				  ?> 
     
    
		</select>  	
	</div>

	<div class="input_item">
	
		<label>Proveedor: </label>	 
		<select   name="idProveedor" id="idProveedor" onclick="validar_proveedor()">
		<option value="Selecciona">Selecciona</option>
		 <?php

     		$servidor = "localhost"; 
		$usuario = "root"; 
		$contraseña = ""; 
		$BD = "bdagroinsoft"; 
		$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD);
		$insertar="SELECT  idProveedor, CONCAT(nomProveedor) AS idProveedornomProveedor FROM proveedor ";
			$resource=mysqli_query($conexion, $insertar);

                        while($lista=mysqli_fetch_row($resource)){
                        			echo "<option value='".$lista[0]."' class='form-control'>".$lista[1]. "</option>";
                        };
 
	  				  ?> 
     
    
		</select> 
			
	</div>
	<div class="input_item">

		<label>Fecha Ejecucion:</label>
	 	<input type="date" name="fecEjecutado" id="fecEjecutado" onclick="validar_fecha()">

	</div>

</div>	

<div class="input_conteiner">

	<div class="input_item">

		<label>Procedimiento:</label>
	 	<textarea name="procedimiento" id="procedimiento"></textarea>

	</div>

	<div class="input_item">

		<label>Recomendaciones: </label>
	 	<textarea name="recomendaciones" id="recomendaciones"></textarea>

	</div>

</div>	
<div class="input_conteiner">

	
	<div class="input_item">

		 <label>Garantia:</label>
	 <input type="text" name="garantia" id="garantia">

	</div>

	<div class="input_item">

		<label>Quien Realizo Mantenimiento:</label>
	 	 <input type="text" name="nomPerMantenimiento" id="nomPerMantenimiento">

	</div>

	<div class="input_item">

		 <label>Identificación:</label>
	 <input type="number" name="cedPerMantenimiento" id="cedPerMantenimiento">

	</div>

</div>
	
<div class="conteiner_botones">

		
    	<button class="btn btn-3" type="button" value="Registrar" onclick="enviar()"><img  class="icon" src="../iconos/guardar.svg" alt="x" /></button> 
  
    	<button  class="btn btn-3" type="reset"><img class="icon" src="../iconos/agregar.svg" alt="x" /></button> 
  	
    	<button  class="btn btn-3" type="button" ><img onclick="actualizar_datos()" class="icon" src="../iconos/Actualizar.svg" alt="x" /></button> 

    	<button  type="button"  class="btn btn-3" value="Exportar"><img onclick="exportarpdf()" class="icon" src="../iconos/exppdf.svg" alt="x" /></button> 
 
    	<button class="btn btn-3"  type="button"><img class="icon" onclick="exportarexcel()" src="../iconos/expexcel.svg" alt="x" /></button> 
  
		
		<button class="boton-item  button" type="button" onclick="popup_consulta()" data-type="zoomin"><img class="icon"  src="../iconos/consultar.svg" alt="x" /></button>
    	
  
		<button class="btn btn-3" type="button"><img class="icon" onclick="eliminar_datos()" src="../iconos/eliminar.svg" alt="x" /></button> 
  		
 		<button type="button" class="button btn-ayuda" onclick="popup_ayuda()" data-type="zoomin" value="ayuda"   type="button"><img class="icon-ayuda"  src="../iconos/ayuda.svg" alt="x" /></button> 



</div> 		<input type="button" onclick="popup_ayuda()" class="button" data-type="zoomin" value="Ayuda" >

<div id="contenedo">  

</div>

<div id="contenedor1">  

</div>

	</form>
	

	
		</div>
		</div>
<!-- 			<div class="overlay-container" >

		<div class="window-container zoomin">
	
<label for="">Selecciona Fecha 1</label>
	    <input type="date" name="" id="fecha_3">

	    <label for="">Selecciona Fecha 2</label>
	    <input type="date" name="" id="fecha_4">


<input type="button" value="Consultar"onclick="consultar_mantenimiento_ejecutado()" >

<select name='' id='id_mantenimiento_ejecutado'  >
<option value='Selecciona'>Selecciona</option>
</select>

<input type="button" value="consultar" class="close" onclick="consultar()">
<input class="txt close" type="button"  align="center"   name="" value="cerrar">

</div>
</div> -->
<div class="overlay-container" style="opacity: 1">

		<div class="window-container zoomin">

<div id="contenedor_ayuda">
	

	<select name="" id="id_consulta" class="ayuda" onclick="consultar_ayuda()">
						<option value="Selecciona">Selecciona</option>
						 <?php

   		$servidor = "localhost"; 
		$usuario = "root"; 
		$contraseña = ""; 
		$BD = "bdagroinsoft"; 
		$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD);
		$insertar="SELECT * FROM `ayuda` WHERE id_formulario=4 order by ayuda.terAyuda";
						$resource=mysqli_query($conexion, $insertar);

                        while($lista=mysqli_fetch_row($resource)){
                        			echo "<option value='".$lista[0]."' class='form-control'>".$lista[2]. "</option>";
                        };
 
	  				  ?> 
					</select>	

					<input type="button" value="" id="conAyuda">		
			<input class="close" type="button"  align="center"   name="" value="cerrar">	

</div>




<div id="contenedor_buscar">

<label align="center"> FORMULARIO CONSULTA  </label>

		<br><br><br>
<button disabled="true" class="boton-item-top" type="button"><label> Selecciona Fecha 1   </label></button>
	    <input type="date" name="" id="fecha_3">

<br><br><br>
<button disabled="true" class="boton-item-top" type="button"><label> Selecciona Fecha 2   </label></button>
	    <input type="date" name="" id="fecha_4">

<br><br><br>

<input type="button" value="Consultar"onclick="consultar_mantenimiento_ejecutado()" >

<select name='' id='id_mantenimiento_ejecutado'  >
<option value='Selecciona'>Selecciona</option>
</select>
<br><br><br>
<input type="button" value="Mostrar" class="close" onclick="consultar()">
<br><br><br>
			<input class="close" type="button"  align="center"   name="" value="cerrar">
</div>			
	
		


		</div>
		</div>


	</section>

<script>
function consultar() {
	
	var id_mantenimiento_ejecutado=document.getElementById('id_mantenimiento_ejecutado').value;

	$("#contenedor").load("consultar_todo.php",{id_mantenimiento_ejecutado:id_mantenimiento_ejecutado})
}
function consultar_ayuda() {


  var id_consulta=document.getElementById('id_consulta').value;

$("#contenedor").load("consultar1.php",{id_consulta:id_consulta})
}

	function popup_ayuda() {
			var contenedor_ayuda=document.getElementById('contenedor_ayuda').style.display="block";
	var contenedor_buscar=document.getElementById('contenedor_buscar').style.display="none";
	}
	$(document).ready(inicio);

function inicio() {


 $("#nombre_maquinaria").keyup(consulta_automatica);
  $("#fecEjecutado").keyup(validar_fecha);


$("#procedimiento").keyup(validar_procedimiento);
$("#recomendaciones").keyup(validar_recomendaciones);
$("#garantia").keyup(validar_garantia);
$("#nomPerMantenimiento").keyup(validar_nomPerMantenimiento);
$("#cedPerMantenimiento").keyup(validar_cedPerMantenimiento);
var nombre_maquinaria=document.getElementById('nombre_maquinaria').focus();



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
        document.formulario.action="exportaciones/pdf_todo_ejecutado.php";
        document.formulario.submit();
		alert('Esta exportando todos los registros a PDF');

      } else {    

		document.formulario.action="exportaciones/pdf_uno_ejecutado.php";
        document.formulario.submit();
		alert('Esta exportando Formulario Actual a PDF');

        } });


}


function exportarexcel() {


swal({   title: "Opciones de Exportación", closeOnConfirm: false,  text: "Opciones de Exportación",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Exportar Todos",   cancelButtonText: "Exportar uno",   closeOnConfirm: true,   closeOnCancel: true }, 

	function(isConfirm){   

	if (isConfirm) { 

        document.formulario.action="exportaciones/excel_todo_ejecutado.php";
        document.formulario.submit();
        alert('Exportando todos los Registros')

      } else {    

		document.formulario.action="exportaciones/excel_uno_ejecutado.php";
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


function popup_consulta() {
	var contenedor_ayuda=document.getElementById('contenedor_ayuda').style.display="none";
	var contenedor_buscar=document.getElementById('contenedor_buscar').style.display="block";
}

function enviar() {
	validar_fecha();

if (validar_consulta_automatica()==true && validar_mantenimiento()==true && validar_tipo_mantenimiento()==true && validar_proveedor()==true  && validar_procedimiento()==true && validar_recomendaciones()==true && validar_garantia()==true && validar_nomPerMantenimiento()==true && validar_cedPerMantenimiento()==true) {

var idTipMantenimiento=document.getElementById('idTipMantenimiento').value;
var id_mantenimiento_programado=document.getElementById('id_mantenimiento_programado').value;
var idProveedor=document.getElementById('idProveedor').value;
var fecEjecutado=document.getElementById('fecEjecutado').value;
var procedimiento=document.getElementById('procedimiento').value;
var recomendaciones=document.getElementById('recomendaciones').value;
var garantia=document.getElementById('garantia').value;
var nomPerMantenimiento=document.getElementById('nomPerMantenimiento').value;
var cedPerMantenimiento=document.getElementById('cedPerMantenimiento').value;

$("#contenedor").load("enviar_datos.php",{id_mantenimiento_programado:id_mantenimiento_programado, idTipMantenimiento:idTipMantenimiento, idProveedor:idProveedor,fecEjecutado:fecEjecutado,  procedimiento:procedimiento,  recomendaciones:recomendaciones,  garantia:garantia, nomPerMantenimiento:nomPerMantenimiento,  cedPerMantenimiento:cedPerMantenimiento });

}else{

	alert("ATENCION: Campos Incorrectos, por favor revisar nuevamente")
}




}







function consultar_datos() {
	

var id_mantenimiento_ejecutado=document.getElementById('id_mantenimiento_ejecutado').value;


$("#contenedor").load("consultar_datos.php",{id_mantenimiento_ejecutado:id_mantenimiento_ejecutado});



}







function actualizar_datos() {
	
var id_mantenimiento_programado=document.getElementById('id_mantenimiento_programado').value;
var idTipMantenimiento=document.getElementById('idTipMantenimiento').value;
var id_mantenimiento_ejecutado=document.getElementById("id_mantenimiento_ejecutado").value
var idProveedor=document.getElementById('idProveedor').value;
var fecEjecutado=document.getElementById('fecEjecutado').value;
var procedimiento=document.getElementById('procedimiento').value;
var recomendaciones=document.getElementById('recomendaciones').value;
var garantia=document.getElementById('garantia').value;
var nomPerMantenimiento=document.getElementById('nomPerMantenimiento').value;
var cedPerMantenimiento=document.getElementById('cedPerMantenimiento').value;

$("#contenedor").load("actualizar_datos.php",{id_mantenimiento_programado:id_mantenimiento_programado,id_mantenimiento_ejecutado:id_mantenimiento_ejecutado, idTipMantenimiento:idTipMantenimiento, idProveedor:idProveedor,fecEjecutado:fecEjecutado,  procedimiento:procedimiento,  recomendaciones:recomendaciones,  garantia:garantia, nomPerMantenimiento:nomPerMantenimiento,  cedPerMantenimiento:cedPerMantenimiento });


}



function eliminar_datos() {

var formulario=document.getElementById('formulario').action="eliminar_datos.php";
$("#formulario").submit();
alert('REGISTRO ELIMINADO');



}

function consultar_mantenimiento() {
 var fecha_1=document.getElementById('fecha_1').value;
 var fecha_2=document.getElementById('fecha_2').value;

 		var fecha_1 = new Date(fecha_1);
			var dd = fecha_1.getDate()+1;
			var mm = fecha_1.getMonth()+2; //fecha_1 es 0!
			var yyyy = fecha_1.getFullYear();

			if(dd<10) {
	    		dd='0'+dd
		} 

		if(mm<10) {
	    	mm='0'+mm
	} 

	fecha_1 = dd+'/'+mm+'/'+yyyy;

	 		var fecha_2 = new Date(fecha_2);
			var dd = fecha_2.getDate()+1;
			var mm = fecha_2.getMonth()+2; //fecha_2 es 0!
			var yyyy = fecha_2.getFullYear();

			if(dd<10) {
	    		dd='0'+dd
		} 

		if(mm<10) {
	    	mm='0'+mm
	} 

	fecha_2 =dd+'/'+mm+'/'+yyyy;

 $("#id_mantenimiento_programado").load("contenedor_mantenimiento.php",{id:id,fecha_1:fecha_1,fecha_2:fecha_2})
}

function consultar_mantenimiento_ejecutado() {
 var fecha_3=document.getElementById('fecha_3').value;
 var fecha_4=document.getElementById('fecha_4').value;

 		var fecha_3 = new Date(fecha_3);
			var dd = fecha_3.getDate()+1;
			var mm = fecha_3.getMonth()+1; //fecha_3 es 0!
			var yyyy = fecha_3.getFullYear();

			if(dd<10) {
	    		dd='0'+dd
		} 

		if(mm<10) {
	    	mm='0'+mm
	} 

	fecha_3 = yyyy+'/'+mm+'/'+dd;

	 		var fecha_4 = new Date(fecha_4);
			var dd = fecha_4.getDate()+1;
			var mm = fecha_4.getMonth()+1; //fecha_4 es 0!
			var yyyy = fecha_4.getFullYear();

			if(dd<10) {
	    		dd='0'+dd
		} 

		if(mm<10) {
	    	mm='0'+mm
	} 

	fecha_4 =yyyy+'/'+mm+'/'+dd;


 $("#id_mantenimiento_ejecutado").load("contenedor_mantenimiento_ejecutado.php",{id:id,fecha_3:fecha_3,fecha_4:fecha_4});

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


function validar_mantenimiento() {
	
		var id_mantenimiento_programado=document.getElementById("id_mantenimiento_programado").value;

	if (id_mantenimiento_programado=="Selecciona" || id_mantenimiento_programado=="No hay Mantenimientos") {


		var id_mantenimiento_programado=document.getElementById('id_mantenimiento_programado').style.border="2px solid red";
			return false;
	}else{


		var id_mantenimiento_programado=document.getElementById('id_mantenimiento_programado').style.border="2px solid green";
			return true;
	}

}


function validar_tipo_mantenimiento() {
	var idTipMantenimiento=document.getElementById("idTipMantenimiento").value;

	if (idTipMantenimiento=="Selecciona") {


		var idTipMantenimiento=document.getElementById('idTipMantenimiento').style.border="2px solid red";
			return false;
	}else{


		var idTipMantenimiento=document.getElementById('idTipMantenimiento').style.border="2px solid green";
			return true;
	}

	
}

function validar_proveedor() {
	
		var idProveedor=document.getElementById("idProveedor").value;

	if (idProveedor=="Selecciona") {


		var idProveedor=document.getElementById('idProveedor').style.border="2px solid red";
			return false;
	}else{


		var idProveedor=document.getElementById('idProveedor').style.border="2px solid green";
			return true;
	}

}

function validar_fecha() {
	
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

var fecEjecutado=document.getElementById('fecEjecutado').value;

$("#contenedo").load("validar_fecha.php",{hoy:hoy,fecEjecutado:fecEjecutado} )



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



function validar_recomendaciones() {


			var recomendaciones=document.getElementById('recomendaciones').value;
			if(recomendaciones==null  || recomendaciones.length==0 || /[¿!"#$%&/=?¡'{}_+´´*']/.test(recomendaciones)){
	var recomendaciones=document.getElementById('recomendaciones').style.border="2px solid red"
				return false;

			}else if (recomendaciones.length>50) {
var recomendaciones=document.getElementById('recomendaciones').style.border="2px solid red"
				return false;

			} else{
var recomendaciones=document.getElementById('recomendaciones').style.border="2px solid green"

			return true;
			}


}

function validar_garantia() {



			var garantia=document.getElementById('garantia').value;
			if(garantia==null  || garantia.length==0 || /[¿!"#$%&/=?¡'{}_+´´*']/.test(garantia)){
	var garantia=document.getElementById('garantia').style.border="2px solid red"
				return false;

			}else if (garantia.length>50) {
var garantia=document.getElementById('garantia').style.border="2px solid red"
				return false;

			} else{
var garantia=document.getElementById('garantia').style.border="2px solid green"

			return true;
			}


}

function validar_nomPerMantenimiento() {



			var nomPerMantenimiento=document.getElementById('nomPerMantenimiento').value;
					nomPerMantenimiento=nomPerMantenimiento.toLowerCase();
			if(nomPerMantenimiento==null  || nomPerMantenimiento.length==0 || /[\\^"'<>;ç`,-_ª%&¿¨Ç¡º#~¬€$.*+?=!:|\\/()\[\]{}]/.test(nomPerMantenimiento)){
	var nomPerMantenimiento=document.getElementById('nomPerMantenimiento').style.border="2px solid red"
				return false;

			}else if (isNaN(nomPerMantenimiento)==false) {
var nomPerMantenimiento=document.getElementById('nomPerMantenimiento').style.border="2px solid red"
				return false;

			}else if (nomPerMantenimiento.length>50) {
var nomPerMantenimiento=document.getElementById('nomPerMantenimiento').style.border="2px solid red"
				return false;

			}else{
var nomPerMantenimiento=document.getElementById('nomPerMantenimiento').style.border="2px solid green"

			return true;
			}


}


function validar_cedPerMantenimiento() {

			var cedPerMantenimiento=parseFloat(document.getElementById('cedPerMantenimiento').value);


			if(cedPerMantenimiento==null  || cedPerMantenimiento.length==0 || /^\s+$/.test(cedPerMantenimiento) || cedPerMantenimiento<0){


var cedPerMantenimiento=document.getElementById('cedPerMantenimiento').style.border="2px solid red"
				return false;

			}
			else if (isNaN(cedPerMantenimiento)) {
var cedPerMantenimiento=document.getElementById('cedPerMantenimiento').style.border="2px solid red"
				return false;

			}else {

		var cedPerMantenimiento=document.getElementById('cedPerMantenimiento').style.border="2px solid green"
				return true;
			}

}
</script>

</body>
	<script>!window.jQuery && document.write(unescape('%3Cscript src="../../login/jquery-1.7.1.min.js"%3E%3C/script%3E'))</script>
<script type="text/javascript" src="../../login/demo.js"></script>
</html>