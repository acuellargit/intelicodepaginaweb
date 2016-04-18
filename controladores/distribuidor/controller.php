<?php
include_once('model.php');

	if(isset($_POST['btnDistribuidor'])){
	switch($_POST['btnDistribuidor'])
	{
	
	
	case "Login":{
		login();
	} break;
	
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
	
	
	
	function guardar()
	{
		//session_start();
		$x=new distribuidor();
		$x->nombre=$_POST['nombreDistribuidor'];
		$x->noDistribuidor=$_POST['noDistribuidor'];
		$x->direccion=$_POST['direccionDistribuidor'];
		$x->telefono=$_POST['telDistribuidor'];
		$x->empresa=$_POST['empresa'];
		$x->celular=$_POST['celular'];
		$x->email=$_POST['email'];
		$x->estado=$_POST['estado'];
		$x->registradoPor='1';
		if($x->insertar()){ echo "Agregado correctamente";}else{echo "Error al agregar";}
	}
	
	function modificar()
	{
		$x=new distribuidor();
		$x->nombre=$_POST['nombreDistribuidor'];
		$x->noDistribuidor=$_POST['noDistribuidor'];
		$x->direccion=$_POST['direccionDistribuidor'];
		$x->telefono=$_POST['telDistribuidor'];
		$x->empresa=$_POST['empresa'];
		$x->celular=$_POST['celular'];
		$x->email=$_POST['email'];
		$x->estado=$_POST['estado'];
		if($x->modificar()){ echo "Modificado correctamente";}else{echo "Error al agregar";}
	}
	
	
	function borrar()
	{
		$x=new distribuidor();
		if($x->borrar($_POST['noDistribuidor'])){ echo "Eliminado correctamente";}else{echo "Error al borrar";}
	}
	
	function mostrar_ul($registro)
	{
	
		while($fila=mysqli_fetch_object($registro)){
		echo "<li>";
		echo "<a href='#' class='bt_soporte' title='".$fila->idcliente."'>".$fila->nombre."</a>";
		echo "</li>";
		}
		
	}
	function mostrar_tabla($registro)
	{
		echo "<ul>";
		

		while($fila=mysqli_fetch_object($registro)){
    	echo "<li>";
		echo '<img src="img/Location.png" height="12"/ > <strong >Estado de la republica: '.$fila->estado.' </strong>  <br/>';
        echo '<img src="img/Contact_Card.png" height="12"/ > <strong >Empresa: </strong> '.$fila->empresa.' <br/>';
        echo '<img src="img/Location.png" height="12"/><strong>DIRECCION:</strong>'.$fila->direccion.'<br/>';
        echo '<img src="img/iPhone.png" height="12"/><strong>CONTACTO: '.$fila->nombre.' </strong><BR />';
        echo '<p align="justify">';
        echo 'Telefono: '.$fila->telefono.'<BR />';
        echo 'Celular: '.$fila->celular.'<BR />';
        echo 'Email: '.$fila->email.' <BR />';
      	echo '</p>';
    	echo '</li>';
		
		}
		echo "</ul>";
	}
	function mostrar_json($result)
	{
		$rawdata=array();
		
		while($row=mysqli_fetch_object($result))
		{
			$rawdata[]=$row;
		}
		echo json_encode($rawdata);
	}
	
	function buscar()
	{
	$c= new distribuidor();
	switch($_POST['tipo_busqueda'])
	{
	case 1:{ $registro=$c->buscar_id($_POST["noDistribuidor"]);
			 mostrar_json($registro);
		   } break;
	case 2:{ $registro=$c->buscar_distribuidor();
			 mostrar_tabla($registro);
		   } break;
		   
	case 3:{ 
		   } break;
	 
	}
	}
	
	
?>