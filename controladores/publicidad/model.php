
<?php
include_once('../core/core.php');
class publicidad
{
	
	public $imagen;
	public $tipo;
	public $registradoPor;
	
	
	public function publicidad()
	{
		
	$this->link=new dal();
	$this->imagen="";
		$this->tipo="";
	$this->registradoPor="";

	}
	
	
	
		public function insertar() {
		$sql="insert into publicidad(sliderImagen,registradoPor,tipo) values ('$this->imagen','$this->registradoPor','$this->tipo')";
	  //echo $sql;
		$result=$this->link->ejecutar($sql);
		if($result)
		   return true;
		else
		   return false; 

		}
		
		public function eliminar($id) {
		$sql="delete from publicidad where idPublicidad='$id'";
	  //echo $sql;
		$result=$this->link->ejecutar($sql);
		if($result)
		   return true;
		else
		   return false; 

		}
		public function buscar_($tipo)
		{
		$sql="select * from publicidad where tipo='".$tipo."'";
		return $this->link->ejecutar($sql);
		}
		
		public function buscar_slider()
		{
		$sql="select sliderImagen from publicidad where tipo='slider' order by idpublicidad desc limit 10";
		return $this->link->ejecutar($sql);
		}
		
		
		
}
		

?>