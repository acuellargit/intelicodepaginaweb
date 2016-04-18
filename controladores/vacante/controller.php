<?php
include_once('model.php');

	
	if(isset($_POST['btnVacante'])){
	switch($_POST['btnVacante'])
	{
	case "Registrar":{
		guardar();
	} break;
	
	case "Borrar":{
		borrar();
	} break;
	
	case "Modificar":{modificar();
	} break;
	case "Eliminar":{eliminar();
	} break;
	case "Buscar":{buscar();
	} break;
	 
	}
	}else{die("error fatal");
	}
	
	
	
	function buscar()
	{
	$c= new vacante();
	switch($_POST['tipo_busqueda'])
	{
	case 1:{ $registro=$c->buscar_vacante();
			 mostrar_tabla($registro);
		   } break;
	case 2:{ 
		   } break;
		   
	case 3:{ 
		   } break;
	 
	}
	}
	
	function mostrar_tabla($registro)
	{	
	
	echo "<ul>";
	while($fila=mysqli_fetch_object($registro))
	{
	echo "<li>";
    echo "<strong>VACANTE: </strong>$fila->vacante<BR /><BR />";
    echo "<strong>REQUISITOS: </strong><BR />";
    echo '<p align="justify">';
    echo "".$fila->requisitos;
    echo "</p>";
    echo "</li>";
	
	
	}
	echo "</ul>";
	
	}
	
	function guardar()
	{
		$x=new vacante();
		$x->vacante=$_POST['cargo'];
		$x->requisitos=$_POST['requisitos'];
		$x->registradoPor='1';
		if($x->insertar()){ echo "Agregado correctamente";}else{echo "Error al agregar";}
	}
	
	
?>