<?php
//session_start();
include_once('model.php');

	if(isset($_POST['btnUsuario'])){
	switch($_POST['btnUsuario'])
	{
	case "Registrar":{
		guardar();
		
	} break;
	case "Solicitud":{
		$x=new messages();
		$x->solicita_soporte=$_POST['value'];
		$x->setSolicitud();
	} break;
	
	case "Borrar":{
		//procesar();
		borrar();
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
		$x=new messages();
		if($x->eliminar($_POST['usuario']))
		{
			echo "Se ha cerrado la session... vuelva a cargar la pagina";
		}else
		{
			echo "Error de sql";
		}
	}

	function modificar()
	{
		/*$x=new messages();
		$x->apellidoM=$_POST['producto'];
		$x->apellidoP=$_POST['folio'];
		$x->correo=$_POST['descripcion'];
		$x->nombre=$_POST['cantidad'];
		$x->pass=$_POST['preciou'];
		$x->usuario=$_POST['usuario'];
		$x->modificar();*/
	}
	
	function guardar()
	{
		$x=new messages();
		$x->username=$_POST['username'];
		$x->mensaje=$_POST['mensaje'];
		echo $_POST['mensaje'];
		$x->respuesta=$_POST['respuesta'];
		if($x->insertar())
		{
			echo "Agregado con exito";
		}else
		{
			echo "Error de sql";
		}
		
			
		
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
	
	function mostrar_tabla($registro)
	{	
	$cont="contenido";
	
	while($fila=mysqli_fetch_object($registro))
	{
	echo "<div class='mensaje-autor'>";
	if($fila->respuesta==0){
	echo "<img src='http://www.inteli-code.com.mx/chat/usuario.jpg' height='100' alt='' class='foto'> ->".$fila->nombre;
	$cont="contenido";
	}else
	{
		echo "<img src='http://www.inteli-code.com.mx/chat/soporte_tecnico.png' height='100' alt='' class='foto'> ->  Ingeniero en turno: ".$fila->usuarioSoporte;
		$cont="contenido2";
	}
			
			echo '<div class="flecha-izquierda"></div>';
			echo '<div class="'.$cont.'">';
				echo $fila->mensaje;
			echo '</div>';
			echo '<div class="fecha">'.$fila->fecha.' <> '.$fila->hora.'</div>';
			echo "</div>";
	}
	
	}
	
	function buscar()
	{
	$c= new messages();
	switch($_POST['tipo_busqueda'])
	{
	case 1:{
			$c->username=$_POST['username'];
			$registro=$c->buscar_id();
			 mostrar_tabla($registro);
		   } break;
	case 2:{ /*$registro=$c->buscar_disponibles();
			 mostrar_json($registro);*/
		   } break;   
	}
	}
	

?>