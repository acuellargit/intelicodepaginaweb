
<?php
include_once('../core/core.php');
class clienteventa
{
	public $cliente;
	public $pass;
	public $nombre;
	public $direccion;
	public $num;
	public $cPostal;
	public $colonia;
	public $estado;
	public $rfc;
	public $empresaLabora;
	public $status;
	public $codigoDescarga;
	public $email;
	private $link;
	public function clienteventa()
	{
		
	$this->link=new dal();
	$this->cliente="";
	$this->pass="";
	$this->nombre="";
	$this->direccion="";
	$this->num="";
	$this->cPostal="";
	$this->colonia="";
	$this->estado="";
	$this->rfc="";
	$this->email="";
	$this->empresaLabora="";
	$this->status="";
	$this->codigoDescarga="";
	
	}
	
	
		public function guardarDetalle($producto,$id)
		{
			$sql="insert into clienteventadetalle values($id,$producto,curdate())";
			$result=$this->link->ejecutar($sql);
			if($result)
			   return true;
			else
			   return false; 
		}
		public function insertar() {
		$sql="insert into clienteventa(cliente,pass,nombre,direccion,num,cPostal,colonia,estado,rfc,empresaLabora,status,email) values ('$this->cliente','$this->pass','$this->nombre','$this->direccion','$this->num','$this->cPostal','$this->colonia','$this->estado','$this->rfc','$this->empresaLabora','$this->status','$this->email')";
	  //echo $sql;
		
		  return $this->link->ultimo_id($sql);
		   

		}
		
		
		
		public function login($usuariox,$passx)
		{
		$query="SELECT idClienteVenta,codigoDescarga FROM clienteventa WHERE idClienteVenta='".$usuariox."' and codigoDescarga='".$passx."'";
		
		$verifica = $this->link->ejecutar($query);
		
		if(!isset($verifica))
		{
			return false;
		}else{
		
		$fila = $verifica->fetch_assoc(); 
		if ($fila['idClienteVenta'] == $usuariox) 
		{
			$this->id=$fila['idClienteVenta'];
			return true; 
		}
		else
		{
			return false;
		}	
		
		}
		}
		
		
		public function modificar($id,$clave,$status) {
		$sql="update clienteventa set codigoDescarga='$clave',status='$status' where idClienteVenta='$id'";
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
		public function buscar_cliente_venta()
		{
		$sql="select * from clienteventa";
		return $this->link->ejecutar($sql);
		}
		public function buscar_($tipo)
		{
		$sql="select * from clienteventadetalle c inner join producto p on p.idProducto=c.moduloCompra where noVenta='".$tipo."'";
		
		return $this->link->ejecutar($sql);
		}
		
		public function buscar_slider()
		{
		$sql="select sliderImagen from publicidad where tipo='slider' order by idpublicidad desc limit 10";
		return $this->link->ejecutar($sql);
		}
		
		
		
}
		

?>