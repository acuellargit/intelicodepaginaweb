
<?php
include_once('../core/core.php');
class galeria
{
	
	public $imagen;
	public $registradoPor;
	
	
	public function galeria()
	{
		
	$this->link=new dal();
	$this->imagen="";
	$this->registradoPor="";

	}
	
	
	
		public function insertar() {
		$sql="insert into galeria(galeriaImagen,registradoPor) values ('$this->imagen','$this->registradoPor')";
	  
		$result=$this->link->ejecutar($sql);
		if($result)
		   return true;
		else
		   return false; 

		}
		
		public function borrar($id) {
		$sql="delete from galeria where idgaleria='$id'";
	  
		$result=$this->link->ejecutar($sql);
		if($result)
		   return true;
		else
		   return false; 

		}
		
		public function buscar_galeria()
		{
		$sql="select idgaleria,galeriaImagen from galeria";
		return $this->link->ejecutar($sql);
		}
}
		

?>