<?php
include_once('model.php');

	if(isset($_POST['btnGaleria'])){
	switch($_POST['btnGaleria'])
	{
	case "Registrar":{
		procesar();
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
	
	function mostrar_publicidad($registro)
	{	
	echo "<ul id='imageBox'>";
	while($fila=mysqli_fetch_object($registro))
	{
		echo " <li>";
        echo" <img src='controladores/galeria/files/$fila->galeriaImagen' alt='IntelCode'  height='100px' /></li>";
        echo "<li>";
	}
	echo "</ul>";
	
	}
	
	function mostrar_galeriaEditable($registro)
	{
     
	echo "<ul class='gallery'>";
	while($fila=mysqli_fetch_object($registro))
	{
		echo " <li>";
   echo"<img src='controladores/galeria/files/$fila->galeriaImagen'/> <span class='validar'><input type='checkbox' title='".$fila->idgaleria."' class='option-input checked'/>";
        echo "</li>";
	}
	echo "</ul>";
	
	}
	
	function buscar()
	{
	$c= new galeria();
	switch($_POST['tipo_busqueda'])
	{
	case 1:{ $registro=$c->buscar_galeria();
			 mostrar_publicidad($registro);
		   } break;
	case 2:{ 
	$registro=$c->buscar_galeria();
			 mostrar_galeriaEditable($registro);
		   } break;
		   
	case 3:{ 
		   } break;
	 
	}
	}
	
	function eliminar()
	{
		$x=new galeria();
		
		if($x->borrar($_POST['id'])){ echo "Borrado correctamente";}else{echo "Error al borrar";}
	}
	function guardar($file)
	{
		$x=new galeria();
		$x->imagen=$file;
		$x->registradoPor='1';
		if($x->insertar()){ echo "Agregado correctamente";}else{echo "Error al agregar";}
	}
	
	
?>