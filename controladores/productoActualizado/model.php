
<?php
include_once('../core/core.php');
class producto
{
	
	public $noProducto;
	public $modulo;
	public $registradoPor;
	
	
	public function producto()
	{
		
	$this->link=new dal();
	$this->noProducto="";
	$this->modulo="";
	$this->registradoPor="";

	}

	
	
		public function insertar() {
		$sql="insert into productoActualizado(idproductoActualizado,archivo,fechaActualizado,registradoPor) values ('$this->noProducto','$this->modulo',date(now()),'$this->registradoPor')";
	  	
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