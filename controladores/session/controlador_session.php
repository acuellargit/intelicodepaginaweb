<?php
include_once('../cliente/model.php');
session_start();


if(isset($_POST['agregarnivel']))
{
$_SESSION['nivel']=	$_POST['agregarnivel'];
$_SESSION['usuario']=$_POST['usuario'];

//echo "nivel agregado ".$_SESSION['nivel'];
}

if(isset($_POST['atendidoPor']))
{

$cliente=new cliente();
$cliente->cambiar_atendidoPor_cliente_soporte($_POST['atendidoPor'],$_POST['usuario']);
$_SESSION['usuario_soporte']=$_POST['usuario'];
return;
}

if(isset($_POST['agregarsoporte']))
{
//if($_SESSION['nivel']>1){
if(true){
$cliente=new cliente();
//$usuario->usuario=;
$r=$cliente->getSoporte($_POST['usuario']);
if($r!=$_POST['usuario']){
$_SESSION['usuario_soporte']=$_POST['usuario'];

echo json_encode(array("result"=>true));
//$usuario->modificar_estado(2,$_POST['usuario']);
$cliente->cliente_soporte($_POST['usuario']);
}else{echo "Tiene un sesion abierta.";}
//$_SESSION['usuario']=$_POST['usuario'];
//echo $r;

}else
{
	echo json_encode(array("result"=>true));
	//echo "error";
}

//echo "nivel agregado ".$_SESSION['nivel'];
}

if(isset($_POST['consultarnivel']))
{
	if(isset($_SESSION['nivel'])){
	echo json_encode(array("usuario"=>$_SESSION['usuario'],"nivel"=>$_SESSION['nivel']  ));
	}else{ echo "error";}
}

?>