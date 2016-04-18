
<?php
include_once('../core/core.php');
class cliente
{
	
	public $noCliente;
	public $pass;
	public $nombre;
	public $empresa;
	public $contacto;
	public $email;
	public $registradoPor;
	
	
	public function cliente()
	{
		
	$this->link=new dal();
	$this->noCliente="";
	$this->pass="";
	$this->nombre="";
	$this->empresa="";
	$this->contacto="";
	$this->email="";
	$this->registradoPor="";

	}
	
		public function login($clientex,$passx)
		{
		$query="SELECT idcliente FROM cliente WHERE idcliente='".$clientex."' and pass='".$passx."'";
		$verifica = $this->link->ejecutar($query);
		
		$fila = $verifica->fetch_assoc(); 
		if ($fila['idcliente'] == $clientex) {return true; }else{return false;}	
		}
	
	
	
		public function insertar() {
		$sql="insert into cliente(idcliente,pass,registradoPor,nombre,empresa,contacto,email) values ('$this->noCliente','$this->pass','$this->registradoPor','$this->nombre','$this->empresa','$this->contacto','$this->email')";
	  
		$result=$this->link->ejecutar($sql);
		if($result)
		   return true;
		else
		   return false; 

		}
		public function modificar() {
		$sql="update cliente set pass='$this->pass',nombre='$this->nombre',empresa='$this->empresa',contacto='$this->contacto',email='$this->email' where idcliente='$this->noCliente'";
	  
		$result=$this->link->ejecutar($sql);
		if($result)
		   return true;
		else
		   return false; 

		}
		public function borrar($id) {
		$sql="delete from cliente where idcliente='$id'";
	  
		$result=$this->link->ejecutar($sql);
		if($result)
		   return true;
		else
		   return false; 

		}
		
		public function getSoporte($usuario)
		{
		$query="SELECT idclientesoporte FROM clientesoporte where idclientesoporte='$usuario'";
		//echo " >> ".$query;
		$verifica = $this->link->ejecutar($query);
		
		$fila = $verifica->fetch_assoc(); 
		return $fila['idclientesoporte'];
		}
		
		public function buscar_id($id)
		{
		$sql="select * from cliente where idcliente='$id'";
		return $this->link->ejecutar($sql);
		}
		
		public function buscar_soporte_10()
		{
		$sql="select * from clientesoporte cs inner join cliente c on cs.idclienteSoporte=c.idcliente order by fecha desc limit 10";
		return $this->link->ejecutar($sql);
		}
		
		public function borrar_soporte_id($id)
		{
		$sql="select * from clientesoporte where id='".$id."'";
		return $this->link->ejecutar($sql);
		}
		
		public function cliente_soporte($id)
		{
		$sql="insert into clientesoporte(idclienteSoporte,fecha,hora,estado) values ('".$id."',now(),curtime(),'0')";
	  
		$result=$this->link->ejecutar($sql);
		if($result)
		   return true;
		else
		   return false;
		}
		
		public function cambiar_estado_cliente_soporte($value,$id)
		{
		$sql="update cliente set estado='$value' where idClienteSoporte='$id'";
	  
		$result=$this->link->ejecutar($sql);
		if($result)
		   return true;
		else
		   return false;
		}
		
		public function cambiar_atendidoPor_cliente_soporte($value,$id)
		{
		$sql="update cliente set atendidoPor='$value' where idClienteSoporte='$id'";
	  
		$result=$this->link->ejecutar($sql);
		if($result)
		   return true;
		else
		   return false;
		}
		
}
		

?>