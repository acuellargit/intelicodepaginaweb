
<?php
include_once('../core/core.php');
class nota
{
	
	public $noticia;
	public $titulo;
	public $registradoPor;
	public $imagen;
	
	
	public function nota()
	{
		
	$this->link=new dal();
	$this->noticia="";
	$this->titulo="";
	$this->registradoPor="";

	}
	
	
	
		public function insertar() {
		$sql="insert into noticia(noticia,fecha,registradoPor,titulo,imagen) values ('$this->noticia',date(now()),'$this->registradoPor','$this->titulo','$this->imagen')";
	  
		$result=$this->link->ejecutar($sql);
		if($result)
		   return true;
		else
		   return false; 

		}
		
		public function buscar_nota()
		{
		$sql="select * from noticia";
		return $this->link->ejecutar($sql);
		}
}
		

?>