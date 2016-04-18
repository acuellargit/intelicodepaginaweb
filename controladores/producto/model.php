
<?php
include_once('../core/core.php');
class producto
{
	
	public $noProducto;
	public $nombre;
	public $descripcion;
	public $modulo;
	public $costo;
	public $registradoPor;
	
	
	public function producto()
	{
		
	$this->link=new dal();
	$this->noProducto="";
	$this->nombre="";
	$this->descripcion="";
	$this->modulo="";
	$this->costo="";
	$this->registradoPor="";

	}

	
	
		public function insertar() {
		$sql="insert into producto(idproducto,moduloNombre,moduloDescripcion,archivoModulo,costo,fechaRegistro,usuarioRegistro) values ('$this->noProducto','$this->nombre','$this->descripcion','$this->modulo','$this->costo',date(now()),'$this->registradoPor')";
	  
		$result=$this->link->ejecutar($sql);
		if($result)
		   return true;
		else
		   return false; 

		}
		
		public function modificar() {
		$sql="update producto set moduloNombre='$this->nombre',moduloDescripcion='$this->descripcion',costo='$this->costo' where idproducto='$this->noProducto'";
	  
		$result=$this->link->ejecutar($sql);
		if($result)
		   return true;
		else
		   return false; 

		}
		
		public function modificar_portada($file) {
		$sql="update producto set portada='$file' where idproducto='$this->noProducto'";
	  
		$result=$this->link->ejecutar($sql);
		if($result)
		   return true;
		else
		   return false; 

		}
		
		public function borrar($id) {
		$sql="delete from producto where idproducto='$id'";
	  
		$result=$this->link->ejecutar($sql);
		if($result)
		   return true;
		else
		   return false; 

		}
		
		public function buscar_id($id)
		{
		$sql="select * from producto where idproducto='$id'";
		return $this->link->ejecutar($sql);
		}
		
		public function buscar_descargas($id)
		{
		$sql=" select p.* from producto p inner join clienteventadetalle v on v.moduloCompra=p.idProducto where noVenta='$id'";
		return $this->link->ejecutar($sql);
		}
		
		
		public function buscar_like($id)
		{
		$sql="select * from producto where modulonomnbre like '%".$id."%' or modulodescripcion like '%".$id."%'";
		return $this->link->ejecutar($sql);
		}
		
		public function buscar()
		{
		$sql="select * from producto";
		return $this->link->ejecutar($sql);
		}
		
		public function buscar_()
{
$sql="select idProducto,moduloNombre from producto";
return($this->link->ejecutar($sql));
}


}
		

?>