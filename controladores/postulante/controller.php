<?php
include_once('model.php');


	
	if(isset($_POST['btnPostulante'])){
	switch($_POST['btnPostulante'])
	{
	case "Registrar":{
		procesar();
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
	
	echo "<table>";
	
	echo "<tr>";
    echo "<th>Vacante</th>";
	echo "<th>Requisitos</th>";
	echo "<th>Seleccionar</th>";
  	echo "</tr>";
	while($fila=mysqli_fetch_object($registro))
	{
	 echo "<tr>";
	 echo "<td align='center'>$fila->vacante</td>";
	 echo "<td align='center'>$fila->requisitos</td>";
	 echo "<td align='center'><input type='checkbox' value='$fila->idVacante' /></td>";
	 
	 echo "</tr>";	
	}
	echo "</table>";
	
	}
	
	function procesar(){
	  $file = $_FILES['archivo']['name'];
	if(!is_dir("files/")) 
        mkdir("files/", 0777);
    if ($file && move_uploaded_file($_FILES['archivo']['tmp_name'],"files/".$file))
    {
       guardar($file);
    }

	}
	
	function guardar($file)
	{
		$x=new postulante();
		$x->vacante=$_POST['vacante'];
		$x->archivo=$file;
		
		if($x->insertar()){ echo "Agregado correctamente";}else{echo "Error al agregar";}
	}
	
	
?>