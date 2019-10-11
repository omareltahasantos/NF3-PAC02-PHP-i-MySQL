<?php

$db = mysqli_connect('localhost', 'root') or die ('Unable to connect. Check your connection parameters.'); //conexion base de datos
mysqli_select_db($db,'biblioteca') or die(mysqli_error($db)); //seleccion base de datos


$tamagno_paginas = 3; //registros que queremos ver por pagina
if(isset($_GET["pagina"])) { //Si el usuario da click en el 1 para volver a la pagina 1 se hace. Si acaba de cargar no entrara en el if
    if ($_GET["pagina"]==1){ //Si vale 1 volvera a la principal
       header("Location:paginacion.php");
    }else { //Si no le cambiara el numero de la pagina cuando l
       $pagina = $_GET["pagina"];
    }
}else {
  $pagina=1; //pagina a la cual accedemos por primera vez
}

//$empezar_desde = ($pagina -1) *tamagno_paginas; //Esto lo que hara es empezar desde a la hora de hacer el limit
$sql_total = "SELECT juegostype_id, juegostype_label FROM juegostype "; //Query para sacar los campos seleccionados de la tabla juegostype poniendole que muestre siempre del registro 0 al 2.
$resultado = mysqli_query($db,$sql_total) or die(mysqli_error($db)); //Para asegurarnos que entra a la query



//MOSTRAR TODOS LOS REGISTROS REFERENTES A LA PAGINACION

//$num_filas = "SELECT count( ) FROM juegostype "; //Cuenta las filas que tenemos dentro del array

  $num_filas = "SELECT count(*) FROM juegostype"; //Cuento el total de registros

$resultado =  mysqli_query($db,$num_filas) or die(mysqli_error($db));

$row = mysqli_fetch_array($resultado);
$totalRegistros = $row["count(*)"]; //Almaceno el total en una variable 8
//$totalRegistros = 8;
$total_paginas= ceil($totalRegistros/$tamagno_paginas); //dividira el total de registros hechos con el count anterior entre los registro que quiero que salgan por pagina






echo "Numero de registros de la consulta es: " . $totalRegistros . "<br>"; //Muestra registros totales
echo "Mostramos " . $tamagno_paginas . " registros por pagina <br>"; //registro por pagina muestra
echo "Mostrando la pagina " . $pagina . "de " . $total_paginas . "<br>"; //Muestra en que pagina está de la paginacion de las totales que hay



$sql_limite =  "SELECT juegostype_id, juegostype_label FROM juegostype LIMIT ".($pagina-1)*$tamagno_paginas." ,$tamagno_paginas";  
//cosulta para mostrar esos dos campos Limitando que comience pagina -1 (el valor cambiara segun en la pagina que estemos a traves de get) y despues los registros por pagina
//Que muestre siempre los 3 siguientes.

$resultado3 = mysqli_query($db,$sql_limite) or die(mysqli_error($db));

while($registro2 = mysqli_fetch_array($resultado3)) {  //Bucle para mientras registro sea igual a la array de resultado que vaya pasando por todos los registros y los muestre por pantalla
	echo "Identificador tipo de juegos: " . $registro2["juegostype_id"] . 
	" Nombre de genero: " . $registro2["juegostype_label"] .  "<br>";
		  
		  
}






//--------------------------------------------------------------PAGINACION  ----------------------

for($i=1; $i<=$total_paginas; $i++){ //bucle para que muestre el numero de paginas que tiene 1.2.3.4...
    echo "<a href='?pagina="  . $i . "'>" . $i . "</a>  ";
}

?>