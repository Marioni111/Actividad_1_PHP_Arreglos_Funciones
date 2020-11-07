<!DOCTYPE html>
<html>
<head>
	<title>Arreglos y Funciones</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<h1 style="text-align:center;">Arreglos y Funciones</h1>
	<h3 style="text-align:center;">Alumnos</h3>
	<?php
	ini_set ('error_reporting', E_ALL & ~E_NOTICE);	
	$arregloAsociativo=array(
		'Felix'=>array(rand(60,100),rand(60,100),rand(60,100),rand(60,100),rand(60,100),rand(60,100)),
		'Miguel'=>array(rand(60,100),rand(60,100),rand(60,100),rand(60,100),rand(60,100),rand(60,100)),
		'Daniel'=>array(rand(60,100),rand(60,100),rand(60,100),rand(60,100),rand(60,100),rand(60,100)),
		'Albar'=>array(rand(60,100),rand(60,100),rand(60,100),rand(60,100),rand(60,100),rand(60,100)),
		'Ivan'=>array(rand(60,100),rand(60,100),rand(60,100),rand(60,100),rand(60,100),rand(60,100)),
		'Andrew'=>array(rand(60,100),rand(60,100),rand(60,100),rand(60,100),rand(60,100),rand(60,100)),
		'Deisy'=>array(rand(60,100),rand(60,100),rand(60,100),rand(60,100),rand(60,100),rand(60,100)),
		'Gonzo'=>array(rand(60,100),rand(60,100),rand(60,100),rand(60,100),rand(60,100),rand(60,100)),
		'Adan'=>array(rand(60,100),rand(60,100),rand(60,100),rand(60,100),rand(60,100),rand(60,100)),
		'Manuel'=>array(rand(60,100),rand(60,100),rand(60,100),rand(60,100),rand(60,100),rand(60,100)),
	);


	//echo promGeneral($arregloAsociativo)."<br>";
	$promedios=promAlumno($arregloAsociativo);
	$promediosMaterias=promMateria($arregloAsociativo);
	//print_r($promediosMaterias);
	//echo "<br>";
	//print_r($promedios);
	//echo "<br>".mejorPromAlumno($promedios);


		echo"
	<table class='table'>
		<thead class='thead-dark'>
			<th scope='col'>Numero de calficacion</th>
      		<th scope='col'>Calificacion 1</th>
      		<th scope='col'>Calificacion 2</th>
      		<th scope='col'>Calificacion 3</th>
      		<th scope='col'>Calificacion 4</th>
      		<th scope='col'>Calificacion 5</th>
      		<th scope='col'>Calificacion 6</th>
      		<th scope='col'>Promedio</th>
		</thead>
		<tbody>";
		$i=0;
			foreach ($arregloAsociativo as $key => $value) {
			echo "<tr> <th scope='row'>".($key)."</th>";
			foreach ($value as $calificacion ) {
			echo "<td>".$calificacion."</td>";
			
			}
			echo "<td>".$promedios[$i]."</td>";
			echo "</tr>";
			$i++;
		}
			

		echo " </tbody></table>";
		echo "<br><br><br>";

		echo "<h3 style='text-align:center;'>Materias</h3>";

		echo"
	<table class='table'>
		<thead class='thead-dark'>
			<th scope='col'>Numero de la materia</th>
      		<th scope='col'>Promedio</th>
      		
		</thead>
		<tbody>";
		
			for($i=0; $i<6; $i++) {
			echo "<tr> <th scope='row'>".($i+1)."</th>";
			
			echo "<td>".$promediosMaterias[$i]."</td>";
			echo "</tr>";
		
		}
			

		echo " </tbody></table>";
		echo "<br><br><br>";


	?>

	<h3 style="text-align:center;">Mejor promedio: <input type="text" name="" value="<?php echo mejorPromAlumno($promedios)?>"></h3>

</body>
</html>
<?php

function promGeneral($array){
	$vectorCalis=array(0,0,0,0,0,0);
	$prom=0;
	$aux=0;
	$cont=0;

	foreach ($array as $value) {
		foreach ($value as $calif ) {
			$aux+=$calif;
		}
		
		$vectorCalis[$cont]=$aux/6;
		$prom+=$vectorCalis[$cont];
		$cont++;
		$aux=0;
	}
	return $prom=$prom/10;
}
function promAlumno($array){
	$vectorCalis=array(0,0,0,0,0,0);
	$prom=0;
	$aux=0;
	$cont=0;

	foreach ($array as $value) {
		foreach ($value as $calif ) {
			$aux+=$calif;
		}
		$aux=$aux/6;
		$vectorCalis[$cont]=round($aux,2);
		$prom+=$vectorCalis[$cont];
		$cont++;
		$aux=0;
	}
	return $vectorCalis;
}
function promMateria($array){
	$vector;
	$cont=0;
	$vectorCalis;
	foreach ($array as $value) {
		$vector[$cont]=$value;
		$cont++;
		
	}
	
		for ($i=0; $i <= 5; $i++) { 
			for ($j=0; $j <= 9; $j++) { 
				$vectorCalis[$i]+=$vector[$j][$i];
			}
			$vectorCalis[$i]=$vectorCalis[$i]/10;
			$vectorCalis[$i]=round($vectorCalis[$i],2);
				
		}
	return $vectorCalis;

}
function mejorPromAlumno($array){
	for($i=1;$i<count($array);$i++)
    {
        for($j=0;$j<count($array)-$i;$j++)
        {
            if($array[$j]>$array[$j+1])
            {
                $k=$array[$j+1];
                $array[$j+1]=$array[$j];
                $array[$j]=$k;
            }
        }
    }
 
    return $array[9];
}

?>