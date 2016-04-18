
<?php
include_once('../core/core.php');
class usuario
{
	
	public $correo;
	public $nombre;
	public $pass;
	private $link;
	
	const SOLICITUD_INACTIVA = 0;
	const SOLICITUD_PENDIENTE = 1;
	const SOLICITUD_ACTIVA = 2;
	const SOLICITUD_CANCELADA = 3;
	
	public function usuario()
	{
		
	$this->link=new dal();
	$this->correo="";
	$this->nombre="";
	$this->pass="";
	$this->solicita_soporte=0;

	}
	
		
	
		public function insertar() {
		$sql="insert into usuario(usuario,pass,email) values ('$this->nombre','$this->pass','$this->correo')";
	  
		$result=$this->link->ejecutar($sql);
		if($result)
		   return true;
		else
		   return false; 

		}
		
		public function login($usuariox,$passx)
		{
		$query="SELECT usuario,idUsuario FROM usuario WHERE usuario='".$usuariox."' and pass=md5('".$passx."')";
		$verifica = $this->link->ejecutar($query);
		
		$fila = $verifica->fetch_assoc(); 
		if ($fila['usuario'] == $usuariox) 
		{
			$this->id=$fila['idUsuario'];
			return true; 
		}
		else
		{
			return false;
		}	
		}
		
		public function modificar_estado($estado,$usuario)
		{
			$sql="update usuario set solicitud_soporte='$estado' where usuario='".$usuario."'";
			$result=$this->link->ejecutar($sql);
		}
	
		public function modificar() {
		$sql="update usuario set usuario='$this->nombre',email='$this->correo',pass='$this->pass' where usuario='$this->usuario'";
	  
		$result=$this->link->ejecutar($sql);
		if($result)
		   return true;
		else
		   return false; 
	
		}
		
		public function setSolicitud() {
		$sql="update usuario set pass='".self::$solicita_soporte."' where usuario='".self::$this->usuario."'";
	  
		$result=$this->link->ejecutar($sql);
		if($result)
		   return true;
		else
		   return false; 
	
		}
		
		public function eliminar() {
		$sql="delete from usuario where usuario='$this->usuario'";
	  
		$result=$this->link->ejecutar($sql);
		if($result)
		   return true;
		else
		   return false; 
	
		}
		
	
		
		public function login_administrador()
		{
		$query="SELECT usuario FROM administradores WHERE usuario='".self::$usuario."' and pass=md5('".self::$pass."')";
		$verifica = $this->link->ejecutar($sql);
		
		$fila = $verifica->fetch_assoc(); 
		if ($fila['usuario'] == self::$usuario) {return true; }else{return false;}	
		}
		
		public function buscar_disponibles()
		{
		$sql="select * from usuario where solicitud_soporte='1'";
		return($this->link->ejecutar($sql));
		}
		
		public function buscar_($id)
		{
		$sql="select * from usuario where usuario='".$id."'";
		return($this->link->ejecutar($sql));
		}
		
		public function buscar_todo()
		{
		$sql="select * from usuario";
		return($this->link->ejecutar($sql));
		}
	
}

?>