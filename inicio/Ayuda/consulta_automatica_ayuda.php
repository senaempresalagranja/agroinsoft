<?php 

$terAyuda=$_POST["terAyuda"];



$connection=mysqli_connect("localhost","root","","bdagroinsoft");
$query="SELECT idAyuda, terAyuda, conAyuda FROM ayuda WHERE terAyuda LIKE '%$terAyuda%' ";
// $query="SELECT idAyuda, terAyuda, conAyuda FROM ayuda WHERE terAyuda LIKE '%$terAyuda%'  OR conAyuda LIKE '%$terAyuda%'  ";
$resource=mysqli_query($connection, $query);



$contar=1;
while ($fila=mysqli_fetch_row($resource)) {

 
$contador_funcion="prueba";
$contador_funcion="prueba". $contar;



echo "  
<div   onclick='$contador_funcion()'>

    <div id='contene'  align='left'>

        <input type='button' name='id'   id='$contar' class='ocultar'  value='$fila[0]'>
       
        <div style='margin-center:6px;'><b>
         $fila[1]
        </div>


        <div style='margin-right:6px; font-size:14px;' class='desc'>
        </div>
 


    </div>


</div>





";




echo "<script>

function $contador_funcion()
{
var id=document.getElementById($contar).value='$fila[0]';

$('#contenedor1').load('consultar.php',{id:id})

var contene=document.getElementById('contenedor').style.display='none';

var terAyuda=document.getElementById('terAyuda').value='$fila[1]';

}

</script>";


$contar++;

}



 ?>

