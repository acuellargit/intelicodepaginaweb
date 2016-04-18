<?php
include_once('model.php');

	if(isset($_POST['btnProducto'])){
	switch($_POST['btnProducto'])
	{
	case "Registrar":{
		procesar();
	} break;
	
	case "Borrar":{
		//procesar();
		borrar();
	} break;
	
	case "Portada":{
		//procesar();
		procesar_portada();
	} break;
	
	case "Modificar":{modificar();
	} break;
	case "Eliminar":{borrar();
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
	   procesar_portada();
    }

	}
	
	function procesar_portada(){
	  $file = $_FILES['portada']['name'];
	if(!is_dir("portada/")) 
        mkdir("portada/", 0777);
    if ($file && move_uploaded_file($_FILES['portada']['tmp_name'],"portada/".$file))
    {
       modificar_file($file);
    }

	}
	
	function modificar_file($file)
	{
		$x=new producto();
		$x->noProducto=$_POST['noProducto'];
		if($x->modificar_portada($file)){ echo ">>";}else{echo "  ----  Error sql";}
	}
	
	function guardar($file)
	{
		$x=new producto();
		$x->noProducto=$_POST['noProducto'];
		$x->nombre=$_POST['nombre'];
		$x->descripcion=$_POST['descripcionModulo'];
		$x->modulo=$file;
		$x->costo=$_POST['costoModulo'];
		$x->registradoPor='1';
		if($x->insertar()){ echo "Agregado correctamente";}else{echo "Error al agregar";}
	}
	
	function modificar()
	{
		$x=new producto();
		$x->noProducto=$_POST['noProducto'];
		$x->nombre=$_POST['nombre'];
		$x->descripcion=$_POST['descripcionModulo'];
		//$x->modulo=$file;
		$x->costo=$_POST['costoModulo'];
		$x->registradoPor='1';
		if($x->modificar()){ echo "Modificado correctamente";}else{echo "Error al agregar";}
	}
	
	function borrar()
	{
		$x=new producto();
		if($x->borrar($_POST['noProducto'])){ echo "Eliminado correctamente";}else{echo "Error al borrar";}
	}
	
	
	function mostrar_ul($registro)
	{
		echo "<ul >";
		while($fila=mysqli_fetch_object($registro)){
		echo "<li>";
		echo "<a class='cbp-vm-image' href='#'><img  src='controladores/producto/portada/".$fila->portada."' width='100' height='100'></a>";
		echo "<h3 class='cbp-vm-title'>".$fila->moduloNombre."</h3>";
		echo "<div class='cbp-vm-price'>$".$fila->costo."</div>";
		echo "<div class='cbp-vm-details'>".$fila->moduloDescripcion."</div>";
		//echo "<div class='cbp-vm-add' ><a href='controladores/producto/files/".$fila->archivoModulo."'>Descargar</a></div>";
		echo "</li>";
		}
		echo "</ul>";
	}
	
	function mostrar_ul_oculto($registro)
	{
		echo "<ul >";
		while($fila=mysqli_fetch_object($registro)){
		echo "<li>";
		echo "<a class='cbp-vm-image' href='#'><img  src='controladores/producto/portada/".$fila->portada."' width='100' height='100'></a>";
		echo "<h3 class='cbp-vm-title'>".$fila->moduloNombre."</h3>";
		echo "<div class='cbp-vm-price'>$".$fila->costo."</div>";
		echo "<div class='cbp-vm-details'>".$fila->moduloDescripcion."</div>";
		echo "<div class='cbp-vm-add' ><a href='controladores/producto/files/".$fila->archivoModulo."'>Descargar</a></div>";
		echo "</li>";
		}
		echo "</ul>";
	}
	
	function mostrar_carro($registro)
	{
		while($fila=mysqli_fetch_object($registro)){
		echo '<tr class="wrapper--box">';
        echo '<td class="alpha">';
        echo '<div class="pure-g">';
        echo '<div class="pure-u-1-4">';
		echo '<img width="100px" src="controladores/producto/portada/'.$fila->portada.'">';
        echo '</div>';
        echo '<div class="pure-u-3-4">';
        echo '<div class="helper--alpha">';
        echo '<h3>'.$fila->moduloDescripcion.'</h3>'; 
        echo '<p>$'.$fila->costo.'</p>';
        echo '<p>';
        echo '<button class="alpha">borrar</button>';
        echo '</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</td>';
        echo '<td class="alpha">';
        echo "<input type='number' name='".$fila->idProducto."' title='".$fila->costo."' class='iEfectivo'  value='0'>";
        echo '</td>';
        echo '<td class="alpha" id="'.$fila->idProducto.'">';
        echo  "0.00";
        echo  '</td>';
        echo '</tr>';
              
          echo '<tr>
            <td colspan="3"><hr></td>
          </tr>';
		}
	}
	
	
	
	function mostrar_tabla($registro)
	{
		echo "<table>";
		echo "<tr>";
		echo "<th>Nombre</th>";
		echo "<th>Descripcion del modulo</th>";
		echo "<th>Costo MXN</th>";
		echo "<th>Seleccion</th>";
  		echo "</tr>";

		while($fila=mysqli_fetch_object($registro)){
		echo "<tr>";
	 	echo "<td align='center'>$fila->moduloNombre</td>";
		echo "<td align='center'>$fila->moduloDescripcion</td>";
		echo "<td align='center'>$fila->costo</td>";
		echo "<td align='center'><input class='checkProducto' name='orderBox' title='$fila->costo' type='checkbox' value='$fila->idProducto' /></td>";
		echo "<tr>";
		
		}
		echo "</table>";
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
	
	function mostrar_combobox($registro)
{
	echo'<select id="select_producto" name="producto" >';
	echo '<option selected="selected" value="-1">Seleccione un modulo</option>';

while($fila=mysqli_fetch_object($registro))
{
echo'<option value="'.$fila->idProducto.'">'.$fila->moduloNombre.'</option>';
}
echo "</select>";
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
	case 4:{ 
	      $registro=$c->buscar();
		  echo "\n ".$_POST["op"]."\n ";
           mostrar_carro($registro);
		   } break;
		   
		   case 5:{ 
	      $registro=$c->buscar();
           mostrar_carro($registro);
		   } break;
		   
		     case 6:{ 
	      $registro=$c->buscar_descargas($_POST["id"]);
           mostrar_ul_oculto($registro);
		   } break;
	 
	}
	}
	
	
?>