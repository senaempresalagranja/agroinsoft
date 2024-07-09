<?php 

$nombre_maquinaria=$_POST["nombre_maquinaria"];

$connection=mysqli_connect("localhost","root","","bdagroinsoft");
$query="SELECT idMaqEquipo, nomElemento, codInventario, imagen, codInterno FROM maqyequipo WHERE  codInterno LIKE '%$nombre_maquinaria%'  OR nomElemento LIKE '%$nombre_maquinaria%' GROUP BY  nomElemento LIMIT 8   ";
$resource=mysqli_query($connection, $query);


	$total = mysqli_num_rows($resource);						
if($total==0){
   echo "  
<div class='conte-bus'  onclick=''>

    <div id='contene'  align='left'>

      

        <div id='aviso'>
        	No Existe Una Maquinaria
        </div>

    
         
     

        </div>
   

</div>";
}else{
	$contar=1;
while ($fila=mysqli_fetch_row($resource)) {

 
$contador_funcion="prueba";
$contador_funcion="prueba". $contar;

echo "  
<div class='conte-bus'  onclick='$contador_funcion()'>

    <div id='contene'  align='left'>

        <input type='button' name='id'   id='$contar' class='ocultar'  value='$fila[0]'>

        <div class='img' style='float:left; margin-right:6px;'><img src='../form_maquina/imagenes/<?php echo $fila[3] ?>' width='60' height='60' /></div>
    <div>
      <div style='margin-center:6px;'><b>
         $fila[1]
        </div>


        <div style='margin-right:6px; font-size:14px;' class='desc'>
        Cod Inventario: $fila[2]    Cod Interno: $fila[4] 

        </div>
    </div>
        
 


    </div>


</div>


";

echo "<script>

function $contador_funcion()
{
var id=document.getElementById($contar).value;
$('#contenedor1').load('consultar.php',{id:id})
var id=id;
var id_maquina=document.getElementById('id_maquina').value=id;
}

</script>";


$contar=$contar+1;
}
                        };
                 
 
	  	



 ?>


  <script>
//   	  function prueba () {

// alert(id);
// $('#contenedor1').load('prueba.php',{id:id});


// }

  </script>




 


