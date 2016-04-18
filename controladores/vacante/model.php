
<?php
include_once('../core/core.php');
class vacante
{
	
	public $vacante;
	public $requisitos;
	public $registradoPor;
	
	
	public function vacante()
	{
		
	$this->link=new dal();
	$this->vacante="";
	$this->requisitos="";
	$this->registradoPor="";

	}
	
	
	
		public function insertar() {
		$sql="insert into vacante(vacante,requisitos,fecha,registradoPor) values ('$this->vacante','$this->requisitos',date(now()),'$this->registradoPor')";
		$result=$this->link->ejecutar($sql);
		if($result)
		   return true;
		else
		   return false; 

		}
		
		public function buscar_vacante()
		{
		$sql="select * from vacante";
		return $this->link->ejecutar($sql);
		}
}
		

?>