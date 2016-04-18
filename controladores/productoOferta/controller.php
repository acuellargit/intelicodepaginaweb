<?php
include_once('model.php');

	if(isset($_POST['btnProductoOferta'])){
	switch($_POST['btnProductoOferta'])
	{
	
	
	case "Registrar":{
		guardar();
	} break;
	
	case "Borrar":{
		//procesar();
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
	
	
	
	function guardar()
	{
		$x=new producto();
		$x->noProducto=$_POST['producto'];
		$x->descuento=$_POST['descuento'];
		$x->registradoPor='1';
		if($x->insertar()){ echo "Agregado correctamente";}else{echo "Error al agregar";}
	}
	
	
	

	
	function buscar()
	{
	$c= new producto();
	switch($_POST['tipo_busqueda'])
	{
	case 1:{ $registro=$c->buscar_id($_POST["noProducto"]);
			 mostrar_json($registro);
		   } break;

	 
	}
	}
	
	
?>