<?php 


include '../../login/inicio_sesion.php';
include 'Connet.php';

 ?>

 <script src="../../query.js"></script>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Copia de Seguridad</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<!-- fondo y distribucion -->

	<link rel="stylesheet" type="text/css" href="../estilos/estilos.css">
	<link rel="stylesheet" type="text/css" href="../estilos/sweetalert.css">
	<link rel="stylesheet" type="text/css" href="../../login/demo.css">

	<!-- fondo y distribucion -->

	<!--  estilos formularios  -->

	<link rel="stylesheet" type="text/css" href="../estilos/estilosBotones.css">
	

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
	
	<style>
		.contenido{
			margin: 130px auto 10px;
			width: 80%;
		}
		input{
			margin: 20px auto;
		}
		span {
			display: block;
			width: 100%;
			margin: 10px;
			font-size: 20px;
		}
	</style>

</head>
<body>
<div id="heade">

<header>
    <div class="menu_bar">
      <a href="#" class="bt-menu"><span class="icon-list2"></span>AGROINSOFT <h3>Copia de Seguridad</h3></a>
    </div>
 
    <nav>
      <ul>
        <li id="logo"><img src="../../img/isologo.png"  class="isologo"></img><a href="#" >AGROINSOFT</a>

		   <div class="itms-menu">

                       <h2>Copia de Seguridad</h2>
                 	 </div>
        </li>
	<?php 
			include('../includes/menu.php');

		 ?>                    
				  
</div>

<section class="contenido">

<div class="container">
	
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
	<span > COPIA DE SEGURIDAD BASE DE DATOS AGROINSOFT</span><input type="button" value="Realizar copia de seguridad" onclick="backup()">
</div>
  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" id="contenedor">
    
    
  </div>
<div class="row">
	<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
			
		




	</div>

</div>
<div class="row">
  

<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<br>
<span >  RESTAURAR BACKUP</span>

</div>
	
</div>


<div class="row">
	<div >
		
<span >  Selecciona Punto de Restauracion</span>
	</div>
	<div  id="contenedor2">
		<span class="icon   icon-spinner6" id="espere">  Por favor Espere Restaurando Backup</span>


	</div>
</div>

<div class="row">
	<div class="col-md-4col-xs-12 col-sm-4 col-md-4 col-lg-4">
		<select name="restaurar" id="restaurar" class="form-control">
			<option value="Selecciona" >Selecciona</option>
			<?php
				$ruta=BACKUP_PATH;
				if(is_dir($ruta)){
				    if($aux=opendir($ruta)){
				        while(($archivo = readdir($aux)) !== false){
				            if($archivo!="."&&$archivo!=".."){
				                $nombrearchivo=str_replace(".sql", "", $archivo);
				                $nombrearchivo=str_replace("-", ":", $nombrearchivo);
				                $ruta_completa=$ruta.$archivo;
				                if(is_dir($ruta_completa)){
				                }else{
				                    echo '<option value="'.$ruta_completa.'">'.$nombrearchivo.'</option>';
				                }
				            }
				        }
				        closedir($aux);
				    }
				}else{
				    echo $ruta." No es ruta válida";
				}
			?>
		</select>
	</div>
	<div class="col-md-2">
<input type="button" value="Restaurar copia de seguridad" onclick="restaurar()">
		
	</div>


</div>
	


	


	</div>
</body>

<script>






var espere=document.getElementById('espere').style.display='none';
	
function restaurar() {

		var restaurar=document.getElementById('restaurar').value;
	if (restaurar=="Selecciona") {
alert("Selecciona Un Punto de Restauracion")


	}else{
var restaurar=document.getElementById('restaurar').value;
var espere=document.getElementById('espere').style.display='block';
$("#contenedor2").load("Restore.php",{restaurar:restaurar});
		
	}




}

function backup(){


$("#contenedor").load('Backup.php');
}

</script>


       <script>
         $(document).ready(function(){
    $(document).bind("contextmenu", function(e){
        return false;
    });
});

         
       </script>

</html>