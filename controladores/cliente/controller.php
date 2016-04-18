<?php
include_once('model.php');

	if(isset($_POST['btnCliente'])){
	switch($_POST['btnCliente'])
	{
	
	
	case "Login":{
		login();
	} break;
	
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
	
	
	function login()
	{
		$x=new cliente();
		if($x->login($_POST["username"],$_POST["pass"]))
		{
			echo json_encode(array("login"=>true));	 
		}else
		{
			echo json_encode(array("login"=>false));	 
		}
	}
	function modificar()
	{
		//session_start();
		$x=new cliente();
		$x->nombre=$_POST['nombre'].' '.$_POST['apellido1'].' '.$_POST['apellido2'];
		$x->noCliente=$_POST['noCliente'];
		$x->pass=$_POST['pass'];
		$x->empresa=$_POST['empresa'];
		$x->contacto=$_POST['contacto'];
		$x->email=$_POST['email'];
		$x->registradoPor='1';
		if($x->modificar()){ echo "Modificacion correcta";}else{echo "Error al agregar";}
	}
	function guardar()
	{
		//session_start();
		$x=new cliente();
		$x->nombre=$_POST['nombre'].' '.$_POST['apellido1'].' '.$_POST['apellido2'];
		$x->noCliente=$_POST['noCliente'];
		$x->pass=$_POST['pass'];
		$x->empresa=$_POST['empresa'];
		$x->contacto=$_POST['contacto'];
		$x->email=$_POST['email'];
		$x->registradoPor='1';
		if($x->insertar()){ echo "Agregado correctamente";}else{echo "Error al agregar";}
	}
	
	function borrar()
	{
		$x=new cliente();
		if($x->borrar($_POST['noCliente'])){ echo "Eliminado correctamente";}else{echo "Error al borrar";}
	}
	
	function mostrar_ul($registro)
	{
		
		while($fila=mysqli_fetch_object($registro)){
		echo "<li>";
		echo "<a href='#' class='bt_soporte' title='".$fila->idcliente."'>".$fila->nombre."</a>";
		echo "</li>";
		}
		
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
	$c= new cliente();
	switch($_POST['tipo_busqueda'])
	{
	case 1:{ $registro=$c->buscar_id($_POST["noCliente"]);
			 mostrar_json($registro);
		   } break;
	case 2:{ $registro=$c->buscar_soporte_10();
			 mostrar_ul($registro);
		   } break;
		   
	case 3:{ 
		   } break;
	 
	}
	}
	
	
?>