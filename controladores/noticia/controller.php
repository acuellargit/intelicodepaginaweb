<?php
include_once('model.php');

	if(isset($_POST['btnNota'])){
	switch($_POST['btnNota'])
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
	if(!is_dir("imagenes/")) 
        mkdir("imagenes/", 0777);
    if ($file && move_uploaded_file($_FILES['archivo']['tmp_name'],"imagenes/".$file))
    {
		
       guardar($file);
	   
    }
	}
	
	function mostrar_noticia($registro)
	{	
	$i=1;
	while($fila=mysqli_fetch_object($registro))
	{
		
	echo "<article>";
    echo '<input type="checkbox" id="read_more'.$i.'" role="button">';
    echo '<label for="read_more'.$i.'" onclick=""><span>Leer mas</span><span>Ocultar</span></label>     ';
      
    echo '<figure>';
    echo '<img src="controladores/noticia/imagenes/'.$fila->imagen.'" />';
    echo '</figure>';

    echo '<section>';
    echo '<p>'.$fila->titulo.'</p>';
    echo '</section>    ';
	echo '<section>';
    echo  $fila->noticia;
	echo '</section>';
	echo '</article>';
	$i++;
	
	}
	
	
	}
	function buscar()
	{
	$c= new nota();
	switch($_POST['tipo_busqueda'])
	{
	case 1:{ $registro=$c->buscar_nota();
			 mostrar_noticia($registro);
		   } break;
	case 2:{ 
		   } break;
		   
	case 3:{ 
		   } break;
	 
	}
	}
	function guardar($file)
	{
		$x=new nota();
		$x->noticia=$_POST['nota'];
		$x->titulo=$_POST['tituloNota'];
		$x->imagen=$file;
		$x->registradoPor='1';
		
		if($x->insertar()){ echo "Agregado correctamente";}else{echo "Error al agregarien";}
	}
	
	
?>