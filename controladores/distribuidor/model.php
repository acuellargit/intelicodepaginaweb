
<?php
include_once('../core/core.php');
class distribuidor
{
	
	public $noDistribuidor;
	public $nombre;
	public $direccion;
	public $telefono;
	public $empresa;
	public $celular;
	public $email;
	public $estado;
	public $registradoPor;
	
	
	public function distribuidor()
	{
		
	$this->link=new dal();
	$this->noDistribuidor="";
	$this->nombre="";
	$this->direccion="";
	$this->telefono="";
	$this->empresa="";
	$this->celular="";
	$this->registradoPor="";

	}
	
		
	
	
	
		public function insertar() {
		$sql="insert into distribuidor(iddistribuidor,nombre,direccion,telefono,empresa,celular,registradoPor,email,estado) values ('$this->noDistribuidor','$this->nombre','$this->direccion','$this->telefono','$this->empresa','$this->celular','$this->registradoPor','$this->email','$this->estado')";
	  
		$result=$this->link->ejecutar($sql);
		if($result)
		   return true;
		else
		   return false; 

		}
		
			public function modificar() {
		$sql="update distribuidor set nombre='$this->nombre',direccion='$this->direccion',telefono='$this->telefono',celular='$this->celular',empresa='$this->empresa',estado='$this->estado',email='$this->email' where idDistribuidor='$this->noDistribuidor'";
	  
		$result=$this->link->ejecutar($sql);
		if($result)
		   return true;
		else
		   return false; 

		}
		
		public function borrar($id) {
		$sql="delete from distribuidor where idDistribuidor='$id'";
	  
		$result=$this->link->ejecutar($sql);
		if($result)
		   return true;
		else
		   return false; 

		}
		
	
		public function buscar_id($id)
		{
		$sql="select * from distribuidor where idDistribuidor='$id'";
		return $this->link->ejecutar($sql);
		}
		
		public function buscar_distribuidor()
		{
		$sql="select * from distribuidor";
		return $this->link->ejecutar($sql);
		}
		
		
		
	
}
		

?>