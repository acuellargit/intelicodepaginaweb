<?php
include_once('model.php');
	
	if(isset($_POST['btnVenta'])){
	switch($_POST['btnVenta'])
	{
	case "Registrar":{
		guardar();
	} break;
	
	case "Login":{
		login();
	} break;
	
	case "RegistrarDetalle":{
		guardarDetalle();
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
		$x=new clienteventa();
		if($x->login($_POST["username"],$_POST["pass"]))
		{
			$_SESSION['inge_soporte']=$x->id;
			echo json_encode(array("login"=>true));	 
		}else
		{
			echo json_encode(array("login"=>false));	 
		}
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
	function modificar()
	{
		$x= new clienteventa();
		if($x->modificar($_POST["id"],$_POST["clave"],$_POST["status"]))
		{
		enviar_correo_clave($_POST["id"],$_POST["clave"],$_POST["email"]);	
		echo "Liberado con exito";
		}else
		{
			echo "Error al liberar :: sql";
		}
	}
	function guardarDetalle()
	{
		$x= new clienteventa();
		if($x->guardarDetalle($_POST["producto"],$_POST["id"]))
		{
			echo "Guardado";
		}else
		{
			echo "Error al guardar";
		}
	}
	function guardar()
	{
		$x= new clienteventa();
		
		$x->cliente=$_POST['num'];
		$x->codigoDescarga='0';
		$x->colonia=$_POST['colonia'];
		$x->cPostal=$_POST['cp'];
		$x->direccion=$_POST['direccion'];
		$x->empresaLabora=$_POST['empresa'];
		$x->estado=$_POST['estado'];
		$x->nombre=$_POST['nombre'].' '.$_POST['apellido1'].' '.$_POST['apellido2'];
		$x->num=$_POST['num'];
		$x->pass=$_POST['pass'];
		$x->email=$_POST['email'];
		$x->rfc=$_POST['rfc'];
		$x->status='0';
	
		echo($x->insertar());
		
	}
	
	
	function enviar_correo_clave($id,$clave,$correo)
	{
		$mensaje="";
	$mensaje.="Enviado por: info@inteli-code.com.mx\n\n";
	$mensaje.="Mensaje: Se envian sus contraseñas para descargar los modulos que adquiero en nuestra empresa. \n Usuario: $id  \n  Contraseña: $clave  \n  \n  Pagina http://www.inteli-code.com.mx/ Accede al modulo de Descargas/Productos ";
	// definimos a quien se lo enviamos
	$email_destiny=$correo;
	$subject="--Correo WEB. <> "." Claves para descargar software Intelicode ERP";
	// verificamos si se envió
	if (mail($email_destiny,$subject,$mensaje,"From: info@inteli-code.com.mx")) {
		echo '\n -->Mensaje enviado';
	} else {
		echo '\n -->Error al enviar mensaje';
	}
		
	}
	
	function mostrar_tabla_venta($registro)
	{
		$estatus[0]='pendiente';
		$estatus[1]='aprobado';
		$estatus[2]='rechazado';
		echo '<table class="generic rounded">';
		echo '<caption>Lista de pagos pendientes</caption>';
		echo '<thead>';
		echo '<tr><th>Id de peticion</th><th># de cliente</th><th>Cliente</th><th>Empresa</th><th>Estado</th><th>Estatus</th><th>Peticion</th></tr>';
		echo '</thead>';
		echo '<tbody>';
		while($fila=mysqli_fetch_object($registro)){
		echo '<tr><td>'.$fila->idClienteVenta.'</td><td>'.$fila->cliente.'</td><td>'.$fila->nombre.'</td><td>'.$fila->empresaLabora.'</td>
		<td>'.$fila->estado.'</td><td>'.$estatus[$fila->status].'</td><td>  
		<input name="btnBuscar" class="btnPago" id="'.$fila->email.'" type="button" title="'.$fila->idClienteVenta.'" value="Ver pedido" /></td>';
		echo "</tr>";
		}
		echo '</tbody>';
		echo '</table>';
	}
	
	function mostrar_tabla($registro)
	{
		echo "<table class='generic rounded'>";
		echo "<thead>";
		echo "<tr>";
		echo "<th>Nombre</th>";
		echo "<th>Descripcion del modulo</th>";
		echo "<th>Costo MXN</th>";
		echo "<th>Seleccion</th>";
  		echo "</tr>";
		echo "</thead>";
		echo "<tbody>";
		while($fila=mysqli_fetch_object($registro)){
		echo "<tr>";
	 	echo "<td align='center'>$fila->moduloNombre</td>";
		echo "<td align='center'>$fila->moduloDescripcion</td>";
		echo "<td align='center'>$fila->costo</td>";
		echo "<td align='center'><input class='checkProducto' name='orderBox' title='$fila->costo' type='checkbox' value='$fila->idProducto' /></td>";
		echo "<tr>";
		
		}
		echo "</tbody>";
		echo "</table>";
	}
	
	function mostrar_slider($registro)
	{	
	while($fila=mysqli_fetch_object($registro))
	{
	 echo "<div><img src='controladores/publicidad/files/$fila->sliderImagen' width='997' height='360'></div>";
	}
	
	}
	
	function buscar()
	{
	$c= new clienteventa();
	switch($_POST['tipo_busqueda'])
	{
	case 1:{ $registro=$c->buscar_slider();
			 mostrar_slider($registro);
		   } break;
	case 2:{ 
			$registro=$c->buscar_($_POST['id']);
			 mostrar_tabla($registro);
		   } break;
		   
	case 3:{
			$registro=$c->buscar_cliente_venta();
			 mostrar_tabla_venta($registro);
		   } break;
	 
	}
	}
	
	
?>