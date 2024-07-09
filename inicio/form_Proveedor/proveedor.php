 <!DOCTYPE html>
 <?php 
include '../../login/inicio_sesion.php';

 ?>

<html>
<head>
	<title>Proveedores</title>
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
	
	<style type="text/css" media="screen">
		form{
		margin-top: 40px;
	}
	

	@media (min-width: 530px ) {
	form{
 	margin-top: 60px;
  }
}
</style>

</head>
<body>
<div id="heade">
<header>
    <div class="menu_bar">
      <a href="#" class="bt-menu"><span class="icon-list2"></span>AGROINSOFT <h3>Registrar Proveedores</h3></a>
    </div>
 
    <nav>
      <ul>
        <li id="logo"><img src="../../img/isologo.png" class="isologo"></img><a href="#" >AGROINSOFT</a>

		   <div class="itms-menu">

                       <h2>Registrar Proveedores</h2>
                 	 </div>
        </li>
	<?php 
			include('../includes/menu.php');

		 ?>             
				  
</div>

	<section class="contenido">

	<button type="button" class="button btn-ayuda" data-type="zoomin" value="ayuda"   type="button"><img class="icon-ayuda"  src="../iconos/ayuda.svg" alt="x" /></button> 
	<!--==================================
	=            formulario             =
	===================================-->
	
	<form   id="formulario"  name="formulario" action="" method="POST" >

<div class="input_conteiner">

	<div class="input_item">

    <label>Nombre Proveedor:</label>  <input type="text" name="nomProveedor" id="nomProveedor">
	
	</div>


	<div class="input_item">

    <label>NIT:</label>  <input type="number" name="nitProveedor" id="nitProveedor">
	</div>


	<div class="input_item">

    <label> Telefono Proveedor: </label><input type="number" name="telProveedor" id="telProveedor">

	</div>

</div>

<div class="input_conteiner">

	<div class="input_item">

    <label>Direccion Proveedor:</label>  <input type="text" name="dirProveedor" id="dirProveedor"><br/><br/>
 
 	</div>

 	<div class="input_item">

    <label>Email:</label>  <input type="text" name="emaProveedor" id="emaProveedor"><br/><br/>
 
 	</div>

 	<div class="input_item">

    <label>Sitio Web:</label>  <input type="text" name="sitWebProveedor" id="sitWebProveedor"><br/><br/>
 
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

<div id="contenedor">  



</div>

</form>

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
		$insertar="SELECT * FROM `ayuda` WHERE id_formulario=8 order by ayuda.terAyuda";
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



function exportarpdf() {


swal({   title: "Opciones de Exportación",   text: "Opciones de Exportación",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Exportar Todos",   cancelButtonText: "Exportar uno",   closeOnConfirm: true,   closeOnCancel: true }, 

	function(isConfirm){   

	if (isConfirm) { 
        document.formulario.action="exportaciones/pdf_todo_proveedor.php";
        document.formulario.submit();
		alert('Esta exportando todos los registros a PDF');

      } else {    

		document.formulario.action="exportaciones/pdf_uno_proveedor.php";
        document.formulario.submit();
		alert('Esta exportando Formulario Actual a PDF');

        } });


}


function exportarexcel() {


swal({   title: "Opciones de Exportación", closeOnConfirm: false,  text: "Opciones de Exportación",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Exportar Todos",   cancelButtonText: "Exportar uno",   closeOnConfirm: true,   closeOnCancel: true }, 

	function(isConfirm){   

	if (isConfirm) { 

        document.formulario.action="exportaciones/excel_todo_proveedor.php";
        document.formulario.submit();
        alert('Exportando todos los Registros')

      } else {    

		document.formulario.action="exportaciones/excel_uno_proveedor.php";
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


	</section>


<script type="text/javascript">


$(document).ready(inicio);
function inicio() {



$("#nomProveedor").keyup(validar_nomProveedor);
$("#nitProveedor").keyup(validar_nitProveedor);
$("#telProveedor").keyup(validar_telProveedor);
$("#dirProveedor").keyup(valdiar_dirProveedor);
$("#emaProveedor").keyup(validar_emaProveedor);
$("#sitWebProveedor").keyup(validar_sitWebProveedor);

}
	function enviar(){

if (validar_nomProveedor()==true && validar_nitProveedor()==true && validar_telProveedor()==true && valdiar_dirProveedor()==true && validar_emaProveedor()==true && validar_emaProveedor()==true && validar_sitWebProveedor()==true) {

var nomProveedor=document.getElementById('nomProveedor').value;
var nitProveedor=document.getElementById('nitProveedor').value;
var telProveedor=document.getElementById('telProveedor').value;
var dirProveedor=document.getElementById('dirProveedor').value;
var emaProveedor=document.getElementById('emaProveedor').value;
var sitWebProveedor=document.getElementById('sitWebProveedor').value;


$("#contenedor").load("enviar_datos.php",{nomProveedor:nomProveedor, nitProveedor:nitProveedor, telProveedor:telProveedor, dirProveedor:dirProveedor, emaProveedor:emaProveedor, sitWebProveedor:sitWebProveedor });
}else{


	alert("Algunos Campos estan Incorrectos porfavor Reviselos")	
}


}


function consultar_datos() {


var nomProveedor=document.getElementById('nomProveedor').value;

$("#contenedor").load("consultar_datos.php",{nomProveedor:nomProveedor});

}

function actualizar_datos(){

var nomProveedor=document.getElementById('nomProveedor').value;
var nitProveedor=document.getElementById('nitProveedor').value;
var telProveedor=document.getElementById('telProveedor').value;
var dirProveedor=document.getElementById('dirProveedor').value;
var emaProveedor=document.getElementById('emaProveedor').value;
var sitWebProveedor=document.getElementById('sitWebProveedor').value;


$("#contenedor").load("actualizar_datos.php",{nomProveedor:nomProveedor, nitProveedor:nitProveedor, telProveedor:telProveedor, dirProveedor:dirProveedor, emaProveedor:emaProveedor, sitWebProveedor:sitWebProveedor });

}



function eliminar_datos() {

var formulario=document.getElementById('formulario').action="eliminar_datos.php";
$("#formulario").submit();
alert('REGISTRO ELIMINADO');



}


function validar_nomProveedor() {
			var nomProveedor=document.getElementById('nomProveedor').value;
			nomProveedor=nomProveedor.toLowerCase();
			if(nomProveedor==null  || nomProveedor.length==0 || /[\\^"'<>;ç`,-_ª%&¿¨Ç¡º#~¬€$.*+?=!:|\\/()\[\]{}]/.test(nomProveedor)){
	var nomProveedor=document.getElementById('nomProveedor').style.border="2px solid red"
				return false;

			}else if (isNaN(nomProveedor)==false) {
var nomProveedor=document.getElementById('nomProveedor').style.border="2px solid red"
				return false;

			}else if (nomProveedor.length>50) {
var nomProveedor=document.getElementById('nomProveedor').style.border="2px solid red"
				return false;

			}else{
var nomProveedor=document.getElementById('nomProveedor').style.border="2px solid green"

			return true;
			}
}

function validar_nitProveedor() {
			var nitProveedor=parseFloat(document.getElementById('nitProveedor').value);

			if(nitProveedor==null  || nitProveedor.length==0 || /^\s+$/.test(nitProveedor) || nitProveedor<0){


var nitProveedor=document.getElementById('nitProveedor').style.border="2px solid red"
				return false;

			}
			else if (isNaN(nitProveedor)) {
var nitProveedor=document.getElementById('nitProveedor').style.border="2px solid red"
				return false;

			}else {

		var nitProveedor=document.getElementById('nitProveedor').style.border="2px solid green"
				return true;
			}
}


function validar_telProveedor() {
				var telProveedor=parseFloat(document.getElementById('telProveedor').value);

			if(telProveedor==null  || telProveedor.length==0 || /^\s+$/.test(telProveedor) || telProveedor<0){


var telProveedor=document.getElementById('telProveedor').style.border="2px solid red"
				return false;

			}
			else if (isNaN(telProveedor)) {
var telProveedor=document.getElementById('telProveedor').style.border="2px solid red"
				return false;

			}else {

		var telProveedor=document.getElementById('telProveedor').style.border="2px solid green"
				return true;
			}
}



function valdiar_dirProveedor() {
				var dirProveedor=document.getElementById('dirProveedor').value;
			if(dirProveedor==null  || dirProveedor.length==0 || /[¿!"#$%&/=?¡'{}_+´´*']/.test(dirProveedor)){
	var dirProveedor=document.getElementById('dirProveedor').style.border="2px solid red"
				return false;

			}else if (dirProveedor.length>50) {
var dirProveedor=document.getElementById('dirProveedor').style.border="2px solid red"
				return false;

			} else{
var dirProveedor=document.getElementById('dirProveedor').style.border="2px solid green"

			return true;
			}

}


function validar_emaProveedor() {
		var emaProveedor=document.getElementById('emaProveedor').value;

	if (/@/.test(emaProveedor)) {
		var emaProveedor=document.getElementById('emaProveedor').style.border="2px solid green"
				return true;


			}else {

			var emaProveedor=document.getElementById('emaProveedor').style.border="2px solid red"
				return false;
	
			}
}

function validar_sitWebProveedor() {
			var sitWebProveedor=document.getElementById('sitWebProveedor').value;
			if(sitWebProveedor==null  || sitWebProveedor.length==0 || /[¿!"#$%&/=?¡'{}_+´´*']/.test(sitWebProveedor)){
	var sitWebProveedor=document.getElementById('sitWebProveedor').style.border="2px solid red"
				return false;

			}else if (sitWebProveedor.length>50) {
var sitWebProveedor=document.getElementById('sitWebProveedor').style.border="2px solid red"
				return false;

			} else{
var sitWebProveedor=document.getElementById('sitWebProveedor').style.border="2px solid green"

			return true;
			}
}
</script>


</body>
</html>