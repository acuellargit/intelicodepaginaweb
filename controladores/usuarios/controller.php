<?php
include_once('model.php');

	if(isset($_POST['btnUsuario'])){
	switch($_POST['btnUsuario'])
	{
	case "Registrar":{
		guardar();
	} break;
	case "Login":{
		login();
	} break;
	case "Solicitud":{
		$x=new usuario();
		$x->solicita_soporte=$_POST['value'];
		$x->setSolicitud();
	} break;
	
	case "Borrar":{
		//procesar();
		eliminar();
	} break;
	
	case "Modificar":{modificar();
	} break;
	case "Eliminar":{eliminar();
	} break;
	case "Buscar":{
	buscar();
	} break;
	 
	}
	}else{die("error fatal");
	}
	
	function eliminar()
	{
		$x=new usuario();
		$x->usuario=$_POST['usuario'];
		if($x->eliminar())
		{
			echo "Borrado correctamente";
		}else
		{
			echo "Error al borrar";
		}
	}

	function modificar()
	{
		$x=new usuario();
		
		$x->correo=$_POST['email'];
		$x->nombre=$_POST['usuario'];
		$x->pass=md5($_POST['pass']);
		$x->usuario=$_POST['usuario'];
		if($x->modificar())
		{
			echo "Modificado correctamente";
		}else
		{
			echo "Error al modificar";
		}
	}
	
	function guardar()
	{
		$x=new usuario();;
		$x->correo=$_POST['email'];
		$x->nombre=$_POST['usuario'];
		$x->pass=md5($_POST['pass']);
		if($x->insertar()){ echo "Agregado correctamente";}else{echo "Error al agregar";}
	}
	
	//funciones para mostrar usuarios;
	//json way you know;
	function mostrar_json($result)
	{
	$rawdata = array(); //creamos un array
    //guardamos en un array multidimensional todos los datos de la consulta
    while($row = mysqli_fetch_object($result))
    {
        $rawdata[] = $row;
    }
	echo json_encode($rawdata);
	}
	
	function login()
	{
		$x=new usuario();
		if($x->login($_POST["username"],$_POST["pass"]))
		{
			$_SESSION['inge_soporte']=$x->id;
			echo json_encode(array("login"=>true));	 
		}else
		{
			echo json_encode(array("login"=>false));	 
		}
	}
	
	function mostrar_tabla($registro)
	{	
	
	while($fila=mysqli_fetch_object($registro))
	{
	echo "<tr>";
	echo "<td align='center'><strong>$fila->nombre</strong></td>";
	echo "<td align='center'>$fila->apellidoP</td>";
	echo "<td align='center'>$fila->apellidoM</td>";
	echo "<td align='center'>$fila->correo</td>";
	echo "<td align='center'>$fila->usuario</td>";
	echo "<td align='center'><input title='".$fila->usuario."' value='Soporte' type='button' class='accionUsuarios' ></td>";
	echo "</tr>";
	
	
	}
	
	}
	
	function buscar()
	{
	$c= new usuario();
	switch($_POST['tipo_busqueda'])
	{
	case 1:{ $registro=$c->buscar_disponibles();
			 mostrar_tabla($registro);
		   } break;
	case 2:{ $registro=$c->buscar_disponibles();
			 mostrar_json($registro);
		   } break;  
		   	case 3:{ $registro=$c->buscar_($_POST['usuario']);
			mostrar_json($registro);
		   } break;   
	}
	}
	

?>