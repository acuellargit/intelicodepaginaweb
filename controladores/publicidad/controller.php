<?php
include_once('model.php');

	if(isset($_POST['btnPublicidad'])){
	switch($_POST['btnPublicidad'])
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
       if(guardar($file))
	   {
		   echo "Agregado correctamente";
		}else
		{
			echo "Error al agregar";
		}
    }

}
	function eliminar()
	{
		$x=new publicidad();
		if($x->eliminar($_POST["id"]))
		{
			 echo "Borrado correctamente";
		}else
		{
			 echo "Error al borrar";
		}
	}
	function guardar($file)
	{
		$x=new publicidad();
		$x->imagen=$file;
		$x->registradoPor='1';
		$rx=$_POST["cual"];
		if($rx=="slider")
		{
		$x->tipo=$rx;
		}else
		{
			$x->tipo="publicidad";
		}
		
		//echo $_POST["cual"];
		
		if($x->insertar())
		{ 
		echo "Agregado correctamente";
		}else{echo "Error al agregar";}
	}
	
	function mostrar_tabla_publicidad($registro)
	{	
	echo "<ul class='publicidad'>";
	while($fila=mysqli_fetch_object($registro))
	{
		echo " <li>";
   echo"<img width='700px' src='controladores/publicidad/files/$fila->sliderImagen'/>";
        echo "</li>";
	}
	echo "</ul>";
	
	}
	
	
	function mostrar_tabla($registro)
	{	
	echo "<ul class='gallery'>";
	while($fila=mysqli_fetch_object($registro))
	{
		echo " <li>";
   echo"<img src='controladores/publicidad/files/$fila->sliderImagen'/> <span class='validar'><input type='checkbox' title='".$fila->idPublicidad."' class='option-input checked'/>";
        echo "</li>";
	}
	echo "</ul>";
	
	}
	
	function mostrar_slider($registro)
	{	
	while($fila=mysqli_fetch_object($registro))
	{
	 echo "<div><img src='controladores/publicidad/files/$fila->sliderImagen' width='1000' height='360'></div>";
	}
	
	}
	
	function buscar()
	{
	$c= new publicidad();
	switch($_POST['tipo_busqueda'])
	{
	case 1:{ $registro=$c->buscar_slider();
			 mostrar_slider($registro);
		   } break;
	case 2:{ 
			$registro=$c->buscar_($_POST['cual']);
			 mostrar_tabla($registro);
		   } break;
		   
	case 3:{ 
			$registro=$c->buscar_("publicidad");
			 mostrar_tabla_publicidad($registro);
		   } break;
	 
	}
	}
	
	
?>