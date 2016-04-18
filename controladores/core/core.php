<?php
//Capa datos
class dal 
{
	private $servidor;
	private $usuario;
	private $password;
	private $basedatos;
	//constructor
	public function dal()
	{
	$this->servidor="localhost";
	$this->usuario="root";
	$this->password="tecnicoweb";/*danae*/
	$this->basedatos="intelicodeweb";
	}
	public function conectar()
	{
	$bd=mysqli_connect($this->servidor,$this->usuario,$this->password,$this->basedatos);
	
	
	if($bd)
	  return $bd;
	else
	  echo "Error al conectarser con la Base de datos";
	  
	  mysqli_set_charset('utf8',$bd);
		
	}
	
	public function ultimo_id($sql)
	{
		$db=$this->conectar();
		mysqli_query($db,$sql);
		return mysqli_insert_id($db);
	}
	
	public function ejecutar($sql)
	{
	$db=$this->conectar();
	return mysqli_query($db,$sql);
	}
	}
?>
