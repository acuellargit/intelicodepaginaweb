<?php
include_once('../core/core.php');
session_start();
class messages
{
	
	public $id;
	public $username;
	public $mensaje;
	public $fecha;
	public $ip;
	public $hora;
	public $respuesta;
	
	const RESPUESTA_ = 1;
	const PREGUNTA_ = 0;
	
	public function messages()
	{
	$this->link=new dal();
	$this->id="";
	$this->username="";
	$this->mensaje="";
	$this->fecha="";
	$this->ip="";
	$this->hora="";
	$this->respuesta=0;
	}
	
	
	
		public function insertar() {
		$_tmp_ip=$_SERVER['REMOTE_ADDR']; //codigo para determinar la ip del cliente que esta mandando msj.
		$soporte="0";
		$respuesta=0;
		if($_SESSION['nivel']>1)
		{
			$respuesta=1;
			
		}
		
		$x="insert into mensajes(usuarioCliente,mensaje,fecha,ip,hora,respuesta) values ('".$_POST['username']."','".$_POST['mensaje']."',now(),'".$_tmp_ip."',curtime(),'".$_POST['respuesta']."')";
		
		//echo "   -->>  ".$qw;	  
		$result=$this->link->ejecutar($x);
		if($result){
			if(isset($_POST['u_soporte']))
		{
			$soporte=$_POST['u_soporte'];
			$sql="select idUsuario from usuario where usuario='".$_POST['u_soporte']."'";
			$rest=$this->link->ejecutar($sql);
			$fila = $rest->fetch_assoc(); 
			$us=$fila['idUsuario'];
			$sql="update mensajes set usuarioSoporte='".$_POST['u_soporte']."' where usuarioCliente='".$us."'";
			echo $sql;
			$result=$this->link->ejecutar($sql);
			//echo $result;
		}
		   return true;
		}
		else
		   return false; 
		

		}
		
		public function modificar() {
		$sql="update messages set nombre='".$_POST['u_soporte']."' where usuario='$this->usuario'";
	  
		$result=$this->link->ejecutar($sql);
		if($result)
		   return true;
		else
		   return false; 
	
		}	
		public function eliminar($id) {
		$sql="delete from mensajes where usuarioCliente='".$id."'";
	  
		$result=$this->link->ejecutar($sql);
		
		$sql="delete from clientesoporte where idclientesoporte='".$id."'";
	  
		$result=$this->link->ejecutar($sql);
		if($result)
		   return true;
		else
		   return false; 
	
		}
		
		public function eliminar_solo_mensajes($id) {
		$sql="delete from mensajes where usuarioCliente='$id'";
	  
		$result=$this->link->ejecutar($sql);
		if($result)
		   return true;
		else
		   return false; 
	
		}
		
		public function buscar_id()
		{
		$sql="select m.*,c.* from mensajes m inner join cliente c on c.idCliente=m.usuarioCliente  where usuarioCliente='$this->username'";
		return($this->link->ejecutar($sql));
		}
	
}

?>