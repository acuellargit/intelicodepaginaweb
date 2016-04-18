
<?php
include_once('../core/core.php');
class postulante
{
	
	public $vacante;
	public $archivo;
	
	
	
	public function postulante()
	{
		
	$this->link=new dal();
	$this->vacante="";
	$this->archivo="";
	

	}
	
	
	
		public function insertar() {
		$sql="insert into postulante(vacante,archivo,fecha) values ('$this->vacante','$this->archivo',date(now()))";
		$result=$this->link->ejecutar($sql);
		if($result)
		   return true;
		else
		   return false; 

		}
		
		public function buscar_vacante()
		{
		$sql="select * from postulante";
		return $this->link->ejecutar($sql);
		}
}
		

?>