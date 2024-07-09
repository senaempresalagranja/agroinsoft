 <!DOCTYPE html>
 <?php 
include '../../login/inicio_sesion.php';

 ?>

<html>
<head>
	<title>Usuarios</title>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<!-- fondo y distribucion -->

	<link rel="stylesheet" type="text/css" href="../estilos/estilos.css">

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

	<script src="js/query.js"></script>
  <style type="text/css" media="screen">
    .contenido{
      width:70%;
      margin:130px auto 10px;
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

                       <h2>Cambiar Contraseña</h2>
                 	 </div>
        </li>
	<?php 
			include('../includes/menu.php');

		 ?>             
				  
</div>


</header>
	<section class="contenido">
	
	  <div class="form-group">
          <label for="">Rol</label>
          <div id="elemento_usuario">
            <input type="button" name="usuario"  class="form-control btn  filestyle"  id="usuario">
            <span class=""></span>
          </div>

        </div>
      </div>



 <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">


        <div class="form-group">
          <label for="dirreccion">Contraseña Actual</label>
          <div id="elemento_contraseña_actual">
            <input type="password" placeholder="Contraseña" name="contraseña_actual"  class="form-control filestyle"  id="contraseña_actual">
            <span class=""></span>
          </div>

        </div>
      </div>
 <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">


        <div class="form-group">
          <label for="dirreccion">Contraseña Nueva</label>
          <div id="elemento_contraseña_nueva">
            <input type="password" name="contraseña_nueva"  class="form-control filestyle"  id="contraseña_nueva">
            <span class=""></span>
          </div>

        </div>
      </div>

 <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">


        <div class="form-group">
          <label for="dirreccion">Repita Contraseña</label>
          <div id="elemento_repita_contraseña">
            <input type="password" name="repita_contraseña"  class="form-control filestyle"  id="repita_contraseña">
            <span class=""></span>
          </div>

        </div>
      </div>
<div class="col-md-1">

<input type="button" value="Actualizar" onclick="actualizar()">

</div>


</div>

<div class="col-md-12" id="contenedor">
  


</div>
</div>


<?php 

$hot='localhost';
$usuario='root';
$contra='';
$base='bdagroinsoft';

$conexion=mysqli_connect($hot,$usuario,$contra,$base);
$query="SELECT * FROM usuario  WHERE nomUsuario='$fila[1]'";

$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);

echo "<script>

var Usuario=document.getElementById('usuario').value='$fila[1]';


</script>";
 ?>


</body>




	</section>
<script>

$(document).ready(inicio);

function contraseña_igual() {


var contraseña_nueva=document.getElementById('contraseña_nueva').value;
var repita_contraseña=document.getElementById('repita_contraseña').value;


if (contraseña_nueva==repita_contraseña) {

return true;


}else{


return false;


}



}




function inicio() {




$("#contraseña_actual").keyup(validar_contraseña_actual);
$("#contraseña_nueva").keyup(validar_contraseña_nueva);
$("#repita_contraseña").keyup(validar_repita_contraseña);
$(document).keyup(contraseña_igual);
}





    

 function validar_contraseña_actual () {
      var contraseña_actual=document.getElementById('contraseña_actual').value;
      if(contraseña_actual==null  || contraseña_actual.length==0 || /^\s+$/.test(contraseña_actual)){
     
        return false;

      }else if (contraseña_actual.length>70) {
      
        return false;

      }else{


        return true;
      }

}


 function validar_contraseña_nueva () {
      var contraseña_nueva=document.getElementById('contraseña_nueva').value;
      if(contraseña_nueva==null  || contraseña_nueva.length==0 || /^\s+$/.test(contraseña_nueva)){
      
        return false;

      }else if (contraseña_nueva.length>70) {
       
        return false;

      }else{


        return true;
      }

}



function validar_repita_contraseña () {
      var repita_contraseña=document.getElementById('repita_contraseña').value;
      if(repita_contraseña==null  || repita_contraseña.length==0 || /^\s+$/.test(repita_contraseña)){
      
        return false;

      }else if (repita_contraseña.length>70) {
      
        return false;

      }else{



        return true;
      }

}


function actualizar() {
if (validar_contraseña_actual()==true && validar_contraseña_nueva()==true && validar_repita_contraseña()==true) {


if (contraseña_igual()==true) { 


var Usuario=document.getElementById('usuario').value;
var contraseña_actual=document.getElementById('contraseña_actual').value;
var contraseña_nueva=document.getElementById('contraseña_nueva').value;
$('#contenedor').load('actualizar_contrasena.php',{Usuario:Usuario,contraseña_actual:contraseña_actual,contraseña_nueva:contraseña_nueva});



}else{

alert("Contraseñas Diferentes","error");
var contraseña_nueva=document.getElementById('contraseña_nueva').value='';
var repita_contraseña=document.getElementById('repita_contraseña').value='';


}


}else{
 alert("ERROR  LLENE TODOS LOS CAMPOS");


}
}
  
</script>
</body>

</html>
