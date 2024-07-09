<!DOCTYPE html>
<html>
<?php 
include '../../login/inicio_sesion.php';

 ?>

<head>
	<title>Maquinaria o Equipo</title>
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
		margin-top: 30px;
	}
	
	#id_maquina{
	
		opacity:  0;
	}
	@media (min-width: 530px ) {
	form{
 	margin-top: 20px;
  }
}
</style>



</head>
        
<body>
<div id="heade">

<header>
    <div class="menu_bar">
      <a href="#" class="bt-menu"><span class="icon-list2"></span>AGROINSOFT <h3>Registrar Maquinaria o Equipo</h3></a>
    </div>
 
    <nav>
      <ul>
        <li id="logo"><img src="../../img/isologo.png"  class="isologo"></img><a href="#" >AGROINSOFT</a>

		   <div class="itms-menu">

                       <h2>Registrar Maquinaria o Equipo</h2>
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
	<form  class="form" action=""  method="post" id="formulario"  name="formulario" enctype="multipart/form-data" >
	   
		
<div class="input_conteiner-top">
 
	<div class="input_item-top">
		<button disabled="true" class="boton-item-top" type="button"><label>Buscar:</label></button>
		
       <input type="text" name="" id="buscar" placeholder="Escribir Numero Interno">

       <button onclick="consultar_datos()" class="boton-item-top boton-top" type="button"><img class="icon"  src="../iconos/consultar.svg" alt="x" /></button>
	</div> 	
</div>

<div class="input_conteiner">


	<div class="input_item input-gran">
	 	<label>Nombre Maquina:</label>
		<input type="text" name="nomElemento" id="nomElemento">	
	</div>

	<div class="input_item">
	 <label>Codigo Inventario:</label>
		<input type="number" name="codInventario" id="codInventario">	
	</div>

	<div class="input_item">
	 <label>Codigo Interno:</label>
		<input type="number" name="codInterno" id="codInterno">	
	</div>
	
</div>
<div class="input_conteiner">
	<div class="input_item input-gran">
	
		<label>Marca:</label>
		<input type="text"  name="marElemento" id="marElemento">
			
	</div>

	<div class="input_item">

		<label>Serial:</label>
		<input type="text"  name="seriale" id="seriale">

	</div>

	<div class="input_item">

		<label>Modelo:</label>
		<input type="text"  name="modelo" id="modelo">

	</div>

</div>	

<div class="input_conteiner">

	<div class="input_item">

		<label>Capacidad:</label>
		<input type="text"  name="capacidad" id="capacidad">

	</div>

	<div class="input_item">

		<label>Fecha de Adqusición:</label> 
		<input  type="date"   value="<?php echo date('Y-m-d'); ?>" name="fecAdquisicion" id="fecAdquisicion" >

	</div>

	<div class="input_item input-gran">

	<label>Ubicación: </label>
		<select   name="idUbicacion" required="" id="idUbicacion" onclick="validar_ubicacion()">
		<option value="Selecciona">Selecciona</option>
				 <?php

     		$servidor = "localhost"; 
		$usuario = "root"; 
		$contraseña = ""; 
		$BD = "bdagroinsoft"; 
		$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD);
		$insertar="SELECT  idUbicacion, CONCAT(nomUbicacion) AS idUbicacionnomUbicacion FROM ubicacion ";
			$resource=mysqli_query($conexion, $insertar);

                        while($lista=mysqli_fetch_row($resource)){
                        			echo "<option value='".$lista[0]."' class='form-control'>".$lista[1]. "</option>";
                        };

                        mysqli_close($conexion);
 
	  				  ?> 
     
    
		</select>   
	</div>	

</div>	


	<div class="input_conteiner">
		<div class="input_item ">
			<label>Estado de  maquina:</label>
			<select  name="estElemento" id="estElemento" onclick="validar_estado()">
			<option value="Selecciona">Selecciona</option>
				<option value="EN USO">EN USO</option>
				<option value="NO USO">NO USO</option>
			</select>
		</div>

		<div class="input_item">
	 <label>Responsable:</label>
		<select  id="idCuentadante" name="idCuentadante" required="" onclick="validar_responsable()">
				<option value="Selecciona">Selecciona</option>
						 <?php

   		$servidor = "localhost"; 
		$usuario = "root"; 
		$contraseña = ""; 
		$BD = "bdagroinsoft"; 
		$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD);
		$insertar="SELECT  idCuentadante, CONCAT( numDocumento, ' ',  nomCuentadante, ' ', apeCuentadante) AS infCuentadante FROM cuentadante";
						$resource=mysqli_query($conexion, $insertar);

                        while($lista=mysqli_fetch_row($resource)){
                        			echo "<option value='".$lista[0]."' class='form-control'>".$lista[1]. "</option>";
                        };
 
	  				  ?> 
     
    
				</select>   	
	</div>
	
	<div class="input_item">

		<label>Numero Ficha Técnica:</label>
		<input type="number"  name="numFicTecnica" id="numFicTecnica">

	</div>

	<div class="input_item">
	 <label>Clasificación:</label>
		<select id="idClasificacion" name="idClasificacion" required=""  onclick="validar_clasificacion()">
				<option value="Selecciona">Selecciona</option>
						 <?php

   		$servidor = "localhost"; 
		$usuario = "root"; 
		$contraseña = ""; 
		$BD = "bdagroinsoft"; 
		$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD);
		$insertar="SELECT  idClasificacion, CONCAT( nomClasificacion) AS idClasificacionnomClasificacion FROM clasificacion";
						$resource=mysqli_query($conexion, $insertar);

                        while($lista=mysqli_fetch_row($resource)){
                        			echo "<option value='".$lista[0]."' class='form-control'>".$lista[1]. "</option>";
                        };
 
	  				  ?> 
     
    
				</select>   	
	</div>
	
	</div>

	



<div class="input_conteiner">
	<div class="input_item input-gran">

		<label>Subir Foto:</label>
		<span class="btn btn-default btn-file">
		<img src="" onclick="cambiar_imagen()" alt="" id="img">
		<input  type="file" accept=".jpg, .png, .gif" class="file"  id="files" name="imagen">
		</span>
	

	</div >
	<div class="input_item">
		<output id="list"></output>
	</div>

</div>
	<div id="contenedor">
		


	</div>
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

	

	</form>
	
	
	<!--====  End of formulario   ====-->
	</section>

	
</body>

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
		$insertar="SELECT * FROM `ayuda` WHERE id_formulario=1 order by ayuda.terAyuda";
						$resource=mysqli_query($conexion, $insertar);

                        while($lista=mysqli_fetch_row($resource)){
                        			echo "<option value='".$lista[0]."' class='form-control'>".$lista[2]. "</option>";
                        };
 
	  				  ?> 
					</select>	
					<textarea disabled="" name=""  type="button" value="" id="conAyuda">
						
					</textarea>
							
			<input class="bnt-poad close" type="button"  align="center"   name="" value="cerrar">	
		

			</div>
	</div>
</div>

<script>

function consultar_ayuda() {


  var id_consulta=document.getElementById('id_consulta').value;

$("#contenedor").load("consultar.php",{id_consulta:id_consulta})
}


	$(document).ready(inicio);


function exportarpdf() {



swal({   title: "Opciones de Exportación",   text: "Opciones de Exportación",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Exportar Todos",   cancelButtonText: "Exportar uno",   closeOnConfirm: true,   closeOnCancel: true }, 

	function(isConfirm){   

	if (isConfirm) { 
        document.formulario.action="exportaciones/pdf_todo_maquina.php";
        document.formulario.submit();
		alert('Esta exportando todos los registros a PDF');

      } else {    

		document.formulario.action="exportaciones/pdf_uno_maquina.php";
        document.formulario.submit();
		alert('Esta exportando Formulario Actual a PDF');

        } });


}


function exportarexcel() {


swal({   title: "Opciones de Exportación", closeOnConfirm: false,  text: "Opciones de Exportación",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Exportar Todos",   cancelButtonText: "Exportar uno",   closeOnConfirm: true,   closeOnCancel: true }, 

	function(isConfirm){   

	if (isConfirm) { 

        document.formulario.action="exportaciones/excel_todo_maquina.php";
        document.formulario.submit();
        alert('Exportando todos los Registros')

      } else {    

		document.formulario.action="exportaciones/excel_uno_maquina.php";
        document.formulario.submit();
        alert('Exportando Formulario Actual');

        } });



}



</script>


<script type="text/javascript">
	$(document).ready(function () {


    $('.ayuda').selectpicker({
      liveSearch: true,
      maxOptions: 1
    });




  });
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

	if (validar_nombre()==true && validar_codigo()==true && validar_codigo_interno()==true && validar_marca()==true && 
		validar_seriale()==true && validar_modelo()==true && validar_capacidad()==true && validar_ubicacion()==true &&
		validar_estado()==true && validar_responsable()==true && validar_numFicTecnica()==true && validar_clasificacion()==true && validar_files()==true) {

var formulario=document.getElementById('formulario').action="envioDatos.php";
var codInterno=document.getElementById('codInterno').value;

$("#contenedor").load("valdiar_existencia.php",{codInterno:codInterno})


 	}else{
 		alert("algunos campos no estan correctos o vacios ")
 	}
}

function actualizar_datos() {
 
var formulario=document.getElementById('formulario').action="actualizar_datos.php";
$("#formulario").submit();
 alert('REGISTRO ACTUALIZADO');
}



function cambiar_imagen() {
	

var img=document.getElementById('img').style.display='none';
	var files=document.getElementById("files").style.display='block';
}


function consultar_datos() {
var img=document.getElementById('img').style.display='block';
var buscar=document.getElementById("buscar").value;

$("#contenedor").load("consultar_datos.php",{buscar:buscar});

var files=document.getElementById("files").style.display='none';
}




//script para mostrar imagen antes de cargar a la base de datos 
	function archivo(evt) {
      var files = evt.target.files; // FileList object
       
        //Obtenemos la imagen del campo "file". 
      for (var i = 0, f; f = files[i]; i++) {         
           //Solo admitimos imágenes.
           if (!f.type.match('image.*')) {
                continue;
           }
       
           var reader = new FileReader();
           
           reader.onload = (function(theFile) {
               return function(e) {
               // Creamos la imagen.
                      document.getElementById("list").innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
               };
           })(f);
 
           reader.readAsDataURL(f);
       }
}
             
      document.getElementById('files').addEventListener('change', archivo, false);

function eliminar_datos() {

var formulario=document.getElementById('formulario').action="eliminar_datos.php";
$("#formulario").submit();
alert('REGISTRO ELIMINADO');



}



// ------------------------------VALIDACIONES----------------------------------------------------


$(document).ready(inicio);
function inicio() {
	$("#nomElemento").keyup(validar_nombre);
	$("#codInventario").keyup(validar_codigo);
	$("#codInterno").keyup(validar_codigo_interno);
	$("#marElemento").keyup(validar_marca);
	$("#seriale").keyup(validar_seriale);
	$("#modelo").keyup(validar_modelo);
	$("#capacidad").keyup(validar_capacidad);
	$("#numFicTecnica").keyup(validar_numFicTecnica);
	$("#files").keyup(validar_files);

}



	function validar_nombre() {
			var nomElemento=document.getElementById('nomElemento').value;
			nomElemento=nomElemento.toUpperCase();
			if(nomElemento==null  || nomElemento.length==0 || /[\\^"'<>;ç`,_ª%&¿°¨Ç¡º#~¬€$.*+?=!:|\\/()\[\]{}]/.test(nomElemento)){
	var nomElemento=document.getElementById('nomElemento').style.border="2px solid red"
				return false;

			}else if (isNaN(nomElemento)==false) {
var nomElemento=document.getElementById('nomElemento').style.border="2px solid red"
				return false;

			}else if (nomElemento.length>200) {
var nomElemento=document.getElementById('nomElemento').style.border="2px solid red"
				return false;

			}else{
var nomElemento=document.getElementById('nomElemento').style.border="2px solid green"

			return true;
			}
}


function validar_codigo() {

			var codInventario=parseFloat(document.getElementById('codInventario').value);

			if(codInventario==null  || codInventario.length==0 || /^\s+$/.test(codInventario) || codInventario<0){


var codInventario=document.getElementById('codInventario').style.border="2px solid red"
				return false;

			}
			else if (isNaN(codInventario)) {
var codInventario=document.getElementById('codInventario').style.border="2px solid red"
				return false;

			}else {

		var codInventario=document.getElementById('codInventario').style.border="2px solid green"
				return true;
			}

}

function validar_codigo_interno() {

			var codInterno=parseFloat(document.getElementById('codInterno').value);

			if(codInterno==null  || codInterno.length==0 || /^\s+$/.test(codInterno) || codInterno<0){


var codInterno=document.getElementById('codInterno').style.border="2px solid red"
				return false;

			}
			else if (isNaN(codInterno)) {
var codInterno=document.getElementById('codInterno').style.border="2px solid red"
				return false;

			}else {

		var codInterno=document.getElementById('codInterno').style.border="2px solid green"
				return true;
			}

}



function validar_marca() {
			var marElemento=document.getElementById('marElemento').value;
			if(marElemento==null  || marElemento.length==0 || /[¿!"#$%&/()=?¡'{}_+´´*;:.,']/.test(marElemento)){
	var marElemento=document.getElementById('marElemento').style.border="2px solid red"
				return false;

			}else if (marElemento.length>50) {
var marElemento=document.getElementById('marElemento').style.border="2px solid red"
				return false;

			} else{
var marElemento=document.getElementById('marElemento').style.border="2px solid green"

			return true;
			}
}


function validar_seriale() {
			var seriale=document.getElementById('seriale').value;


			if(seriale==null  || seriale.length==0 || /[¿!"#$%&/()=?¡'{}_+´´*;:.,']/.test(seriale) || seriale<0){


var seriale=document.getElementById('seriale').style.border="2px solid red"
				return false;

			}else {

		var seriale=document.getElementById('seriale').style.border="2px solid green"
				return true;
			}
}


function validar_modelo() {
			var modelo=document.getElementById('modelo').value;
			if(modelo==null  || modelo.length==0 || /[¿!"#$%&/()=?¡'{}_+´´*;:.,']/.test(modelo)){
	var modelo=document.getElementById('modelo').style.border="2px solid red"
				return false;

			}else if (modelo.length>50) {
var modelo=document.getElementById('modelo').style.border="2px solid red"
				return false;

			}else{
var modelo=document.getElementById('modelo').style.border="2px solid green"

			return true;
			}
}



function validar_capacidad() {

			var capacidad=document.getElementById('capacidad').value;

			if(capacidad==null  || capacidad.length==0 || /[¿!"#$%&/()=?¡'{}_+´´*;:.,']/.test(capacidad)){
	var capacidad=document.getElementById('capacidad').style.border="2px solid red"
				return false;

			}else if (capacidad.length>50) {
var capacidad=document.getElementById('capacidad').style.border="2px solid red"
				return false;

			}else{
var capacidad=document.getElementById('capacidad').style.border="2px solid green"

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


function validar_estado() {
	var estElemento=document.getElementById('estElemento').value;
	if (estElemento=="Selecciona") {
var estElemento=document.getElementById('estElemento').style.border="2px solid red"
				return false;


	}else{

		var estElemento=document.getElementById('estElemento').style.border="2px solid green"
				return true;

	}
}


function validar_responsable() {
	var idCuentadante=document.getElementById('idCuentadante').value;
	if (idCuentadante=="Selecciona") {
var idCuentadante=document.getElementById('idCuentadante').style.border="2px solid red"
				return false;


	}else{

		var idCuentadante=document.getElementById('idCuentadante').style.border="2px solid green"
				return true;

	}
}

function validar_numFicTecnica() {

			var numFicTecnica=parseFloat(document.getElementById('numFicTecnica').value);

			if(numFicTecnica==null  || numFicTecnica.length==0 || /^\s+$/.test(numFicTecnica) || numFicTecnica<0){


var numFicTecnica=document.getElementById('numFicTecnica').style.border="2px solid red"
				return false;

			}
			else if (isNaN(numFicTecnica)) {
var numFicTecnica=document.getElementById('numFicTecnica').style.border="2px solid red"
				return false;

			}else {

		var numFicTecnica=document.getElementById('numFicTecnica').style.border="2px solid green"
				return true;
			}

}



function validar_clasificacion() {
	var idClasificacion=document.getElementById('idClasificacion').value;
	if (idClasificacion=="Selecciona") {
var idClasificacion=document.getElementById('idClasificacion').style.border="2px solid red"
				return false;


	}else{

		var idClasificacion=document.getElementById('idClasificacion').style.border="2px solid green"
				return true;

	}
}

function validar_files() {
	var files=document.getElementById('files').value;
	if (files=="" && files.lenght==0) {
var files=document.getElementById('files').style.border="2px solid red"
				return false;


	}else{

		var files=document.getElementById('files').style.border="2px solid green"
				return true;

	}
}


</script>
</html>