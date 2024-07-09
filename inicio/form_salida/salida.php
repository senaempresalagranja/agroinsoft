 <!DOCTYPE html>
 <?php 
include '../../login/inicio_sesion.php';

 ?>

<html>
<head>
	<title>Salidas</title>
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

	form{
		margin-top: -30px;
	}
	#id_maquina{
	
		opacity:  0;
	}
</style>

<body>
<div id="heade">
<header>
    <div class="menu_bar">
      <a href="#" class="bt-menu"><span class="icon-list2"></span>AGROINSOFT <h3>Registrar Salidas</h3></a>
    </div>
 
    <nav>
      <ul>
        <li id="logo"><img src="../../img/isologo.png" class="isologo"></img><a href="#" >AGROINSOFT</a>

		   <div class="itms-menu">

                       <h2>Registrar Salidas</h2>
                 	 </div>
        </li>
	<?php 
			include('../includes/menu.php');

		 ?>             
				  
</div>

<input type="button" value="" id="numero_dias">

<input type="text" name="id_maquina" id="id_maquina">
</header>



	<section class="contenido">

	<button type="button" class="button btn-ayuda" data-type="zoomin" value="ayuda"   type="button"><img class="icon-ayuda"  src="../iconos/ayuda.svg" alt="x" /></button> 
	<!--==================================
	=            formulario             =
	===================================-->

	<form  class="form" action="" id="formulario"  name="formulario" method="POST" >	

			
		
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
	 <label >Fecha Salida:</label>   
		<input type="date" name="fecSalida" id="fecSalida">
	</div>

	<div class="input_item">
	
		<label>Fecha Limite Regreso: </label>	 
		
		<input type="date" name="fecLimRegreso" id="fecLimRegreso">
			
	</div>
	

</div>	

<div class="input_conteiner">

	<div class="input_item">

		<label>Ubicacion:</label>
	 	<select   name="idUbicacion" id="idUbicacion" required="" onclick="valdiar_ubicacion()">
	 	<option value="Selecciona">Selecciona</option>
		 <?php

     		$servidor = "localhost"; 
		$usuario = "root"; 
		$contraseña = ""; 
		$BD = "bdagroinsoft"; 
		$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD);
		$insertar="SELECT  idUbicacion, CONCAT( nomUbicacion) AS idUnidadnomunidad FROM ubicacion ";
			$resource=mysqli_query($conexion, $insertar);

                        while($lista=mysqli_fetch_row($resource)){
                        			echo "<option value='".$lista[0]."' class='form-control'>".$lista[1]. "</option>";
                        };
 
	  				  ?> 
     
    
		</select>  

	</div>

	<div class="input_item">

		<label>Cuentadante:</label>
	 	<select   name="idCuentadante" id="idCuentadante" required="" onclick="validar_cuentadante()">
	 	<option value="Selecciona">Selecciona</option>
		 <?php

     		$servidor = "localhost"; 
		$usuario = "root"; 
		$contraseña = ""; 
		$BD = "bdagroinsoft"; 
		$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD);
		$insertar="SELECT  idCuentadante, CONCAT(   nomCuentadante, '-', apeCuentadante) AS resultado FROM cuentadante ";
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

		<label> Proveedor:</label>
	 	
		<select   name="idProveedor" id="idProveedor" required="" onclick="validar_proveedor()">
		<option value="Selecciona">Selecciona</option>
		 <?php

     		$servidor = "localhost"; 
		$usuario = "root"; 
		$contraseña = ""; 
		$BD = "bdagroinsoft"; 
		$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD);
		$insertar="SELECT  idProveedor, CONCAT(  nomProveedor) AS idProveedornomProveedor FROM proveedor ";
			$resource=mysqli_query($conexion, $insertar);

                        while($lista=mysqli_fetch_row($resource)){
                        			echo "<option value='".$lista[0]."' class='form-control'>".$lista[1]. "</option>";
                        };
 
	  				  ?> 
     
    
		</select>

	</div>

	<div class="input_item">

		<label>Destino:</label>
	   	<input type="text" name="destino" id="destino">

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
		$insertar="SELECT * FROM `ayuda` WHERE id_formulario=6 order by ayuda.terAyuda";
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
        document.formulario.action="exportaciones/pdf_todo_salida.php";
        document.formulario.submit();
		alert('Esta exportando todos los registros a PDF');

      } else {    
var fecSalida=document.getElementById('fecSalida').type='text';
		document.formulario.action="exportaciones/pdf_uno_salida.php";
        document.formulario.submit();
		alert('Esta exportando Formulario Actual a PDF');
var fecSalida=document.getElementById('fecSalida').type='button';
        } });


}


function exportarexcel() {


swal({   title: "Opciones de Exportación", closeOnConfirm: false,  text: "Opciones de Exportación",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Exportar Todos",   cancelButtonText: "Exportar uno",   closeOnConfirm: true,   closeOnCancel: true }, 

	function(isConfirm){   

	if (isConfirm) { 

        document.formulario.action="exportaciones/excel_todo_salida.php";
        document.formulario.submit();
        alert('Exportando todos los Registros')

      } else {    
var fecSalida=document.getElementById('fecSalida').type='text';
		document.formulario.action="exportaciones/excel_uno_salida.php";
        document.formulario.submit();
        alert('Exportando Formulario Actual');
var fecSalida=document.getElementById('fecSalida').type='button';
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

$(document).ready(inicio);

function inicio() {
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
var fecSalida=document.getElementById('fecSalida').type='button';
var fecSalida=document.getElementById('fecSalida').value=hoy;

$("#destino").keyup(validar_destino)

}
	



function enviar() {
	
if (valdiar_ubicacion()==true &&  validar_cuentadante()==true && validar_proveedor()==true && validar_destino()==true){






var fecSalida=document.getElementById('fecSalida').value;
var fecLimRegreso=document.getElementById('fecLimRegreso').value;

var idProveedor=document.getElementById('idProveedor').value;
var idUbicacion=document.getElementById('idUbicacion').value;
var idCuentadante=document.getElementById('idCuentadante').value;
var destino=document.getElementById('destino').value;


$("#contenedor").load("enviar_datos.php",{id:id, fecSalida:fecSalida, fecLimRegreso:fecLimRegreso, idProveedor:idProveedor, idUbicacion:idUbicacion,  idCuentadante:idCuentadante,  destino:destino });

}else{

	alert("Algunos campos estan incorrectos o vacios")
}



}




function consultar_datos() {
	

var fecha_consulta=document.getElementById('fecha_consulta').value;


$("#contenedor").load("consultar_datos.php",{id:id, fecha_consulta:fecha_consulta});

}







function actualizar_datos() {

var fecSalida=document.getElementById('fecSalida').value;
var fecLimRegreso=document.getElementById('fecLimRegreso').value;
var idProveedor=document.getElementById('idProveedor').value;
var idUbicacion=document.getElementById('idUbicacion').value;
var idCuentadante=document.getElementById('idCuentadante').value;
var destino=document.getElementById('destino').value;

$("#contenedor").load("actualizar_datos.php",{id:id, fecSalida:fecSalida, fecLimRegreso:fecLimRegreso, idProveedor:idProveedor, idUbicacion:idUbicacion,  idCuentadante:idCuentadante,  destino:destino  });

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


function validar_fecha_limite() {
var fecLimRegreso=document.getElementById('fecLimRegreso').value;
var fecSalida=document.getElementById('fecSalida').value;

// $("#contenedor").load("validar_fecha_limite.php",{fecLimRegreso:fecLimRegreso,fecSalida:fecSalida});

var fecLimRegreso=new Date(fecLimRegreso);
var fecSalida=new Date(fecSalida);

var numero_dias=fecLimRegreso.diff(fecSalida, 'days')
alert(num)
// var numero_dias=document.getElementById('numero_dias').value;
if (fecSalida>fecLimRegreso) {

return true

}else{

	return false;
}
	
}

function valdiar_ubicacion() {
	var idUbicacion=document.getElementById('idUbicacion').value;

	if (idUbicacion=="Selecciona") {
var idUbicacion=document.getElementById('idUbicacion').style.border='2px solid red';
return false

	}else{

var idUbicacion=document.getElementById('idUbicacion').style.border='2px solid green';
return true	
	}
}

function validar_cuentadante() {
	var idCuentadante=document.getElementById('idCuentadante').value;

	if (idCuentadante=="Selecciona") {

var idCuentadante=document.getElementById('idCuentadante').style.border='2px solid red';
return false;
	}else{

var idCuentadante=document.getElementById('idCuentadante').style.border='2px solid green';		
return true;
	}
}


function validar_proveedor() {
	var idProveedor=document.getElementById('idProveedor').value;

	if (idProveedor=="Selecciona") {

var idProveedor=document.getElementById('idProveedor').style.border='2px solid red';
return false;
	}else{

var idProveedor=document.getElementById('idProveedor').style.border='2px solid green';		
return true;
	}
}


	function validar_destino() {
			var destino=document.getElementById('destino').value;
			destino=destino.toUpperCase();
			if(destino==null  || destino.length==0 || /[\\^"'<>;ç`,_ª%&¿°¨Ç¡º#~¬€$.*+?=!:|\\/()\[\]{}]/.test(destino)){
	var destino=document.getElementById('destino').style.border="2px solid red"
				return false;

			}else if (isNaN(destino)==false) {
var destino=document.getElementById('destino').style.border="2px solid red"
				return false;

			}else if (destino.length>50) {
var destino=document.getElementById('destino').style.border="2px solid red"
				return false;

			}else{
var destino=document.getElementById('destino').style.border="2px solid green"

			return true;
			}
}
</script>
</body>

</html>
