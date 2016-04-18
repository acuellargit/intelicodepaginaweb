<?php
include_once('model.php');

	if(isset($_POST['btnProductoActualizado'])){
	switch($_POST['btnProductoActualizado'])
	{
	
	
	case "Registrar":{
		procesar();
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
		$x=new producto();
		$x->noProducto=$_POST['producto'];
		$x->modulo=$file;
		$x->registradoPor='1';
		if($x->insertar()){ echo "Agregado correctamente";}else{echo "Error al agregar";}
	}
	
	function borrar()
	{
		$x=new producto();
		if($x->borrar($_POST['noProducto'])){ echo "Eliminado correctamente";}else{echo "Error al borrar";}
	}
	
	
	
	function buscar()
	{
	$c= new producto();
	switch($_POST['tipo_busqueda'])
	{
	case 1:{ $registro=$c->buscar_id($_POST["noProducto"]);
			 mostrar_json($registro);
		   } break;
	case 2:{ $registro=$c->buscar();
			 mostrar_ul($registro);
		   } break;
		   
	case 3:{ 
	      $registro=$c->buscar_();
           mostrar_combobox($registro);
		   } break;
	 
	}
	}
	
	
?>