<?php

session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inteli-code</title>
<link rel="stylesheet" href="css/estilo.css" />

<link rel="stylesheet" href="css/menu.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/sunny/jquery-ui.css">
<script type="text/javascript" src="js/modernizr.custom.28468.js"> </script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
<script src="js/common.js"></script>
<script src="js/jquery.tabSlideOut.v1.3.js"></script>
<link href="css/colorbox.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.colorbox.js"></script>
<link rel="stylesheet" href="css/formulario.css">

 <script>
$(document).ready(function(e) {
		setInterval(function(){ buscar_clientes_soporte(); }, 8000);
		
		buscar_clientes_soporte();
		function agregarSoporte(u){
			var postData = { agregarsoporte: "agregarsoporte",usuario:u};
			var formURL = "controladores/session/controlador_session.php";
			$.ajax(
			{
				url : formURL,
				type: "POST",
				data : postData,
				success:function(data, textStatus, jqXHR) 
				{
					//alert(data);
				},
				error: function(jqXHR, textStatus, errorThrown) 
				{
					//if fails      
				}
			});
		}
		
		function agregar_atendido_por(u,atendidoPor)
		{
			var postData = { atendidoPor: atendidoPor, usuario: u};
		var formURL= "controladores/session/controlador_session.php";
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			beforeSend: function(){
			//$("#frmSoporte").html("<img src='images/loading2.gif' height='50' />");
			},
			success:function(data, textStatus, jqXHR) 
			{	
				
                //alert(data);
				
				
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				alert("error al cargar los datos");
				//if fails      
			}
		});	
			
		}
		
		
		function buscar_clientes_soporte()
		{
		var postData = { btnCliente: "Buscar", tipo_busqueda: "2" };
		var formURL= "controladores/cliente/controller.php";
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			beforeSend: function(){
			$("#frmSoporte").html("<img src='images/loading2.gif' height='50' />");
			},
			success:function(data, textStatus, jqXHR) 
			{	

				//alert(data);
				$("#frmSoporte").empty();
				$("#frmSoporte").html(data);
				$(".bt_soporte").click(function(e) {
                    var x=$(this).attr("title");
					var sop="<?php echo $_SESSION['usuario']; ?>";
					agregarSoporte(x);
					<?php
					
					$_SESSION['inge_soporte']=$_SESSION['usuario'];

					?>
					agregar_atendido_por(x,sop);
					$('#contenido').load('chat/soporte_chat.php');
					
					e.preventDefault();
                });
				
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				alert("error al cargar los datos");
				//if fails      
			}
		});	
		}
		
		function menu_slide()
		{
			 $('.slide-out-div').tabSlideOut({
			 tabHandle: '.handle',         // no-tocar, corresponde a la class del botón
			 pathToTabImage: 'http://3.bp.blogspot.com/-SRwZItqEcjo/TpOMh16a3dI/AAAAAAAAAMY/LeIqvUxWNMI/s1600/square-arrow-right.gif', 
			 //Imagen del boton
			 imageHeight: '36px',         //alto de la imagen
			 imageWidth: '36px',         //ancho de la imagen
			 tabLocation: 'left',            //ubicación del contenedor
			 speed: 300,                     //velocidad de la animación
			 action: 'click',                   //cambiar por hover si deseas que el script se active al pasar el mouse
			 topPos: '200px',               //posición superior del contenedor
			 leftPos: '20px',                  //posición a la izquierda del contenedor
			 fixedPosition: true            //esto permite que el botón siga la pantalla, cambiar a false en caso contrario.
			});
		}
		
		$('.gPago').click(function(){
			$( "#contenido" ).empty();
			$('#contenido').load('liberarSoftware.html');
		});
		$('.gCliente').click(function(){
			$( "#contenido" ).empty();
			$('#contenido').load('gestionCliente.html');
		});
		
		$('.gNoticia').click(function(){
			$( "#contenido" ).empty();
			$('#contenido').load('gestionNoticia.html');
		});
		
		$('.gPublicidad').click(function(){
			$( "#contenido" ).empty();
			$('#contenido').load('gestionPublicidad.html');
		});
		
		$('.gGaleria').click(function(){
			$( "#contenido" ).empty();
			$('#contenido').load('gestionGaleria.html');
		});
		$('.gProducto').click(function(){
			$( "#contenido" ).empty();
			$('#contenido').load('gestionProducto.html');
		});
		
		$('.gVacante').click(function(){
			$( "#contenido" ).empty();
			$('#contenido').load('gestionVacantes.html');
		});
		
		$('.gActulizacion').click(function(){
			$( "#contenido" ).empty();
			$('#contenido').load('gestionActualizacion.html');
		});
		
		
		$('.gUsuario').click(function(){
			$( "#contenido" ).empty();
			$('#contenido').load('gestionUsuario.html');
		});
		
		$('.gDistribuidor').click(function(){
			$( "#contenido" ).empty();
			$('#contenido').load('gestionDistribuidor.html');
		});
		
		$('.gOferta').click(function(){
			$( "#contenido" ).empty();
			$('#contenido').load('gestionOfertas.html');
		});
		
		
		
		$("#inicio_s").click(function(e) {
            $(document).attr("location","servidor.php");
        });
		
		$("#salir_s").click(function(e) {
			
            $(document).attr("location","index.html");
			//salir de session
        });
		
		
}); 
	</script>
    
    <style>
	#inicio_s:hover,#salir_s:hover
	{
		cursor:pointer;
		color:#600;
	}
	
	slide-out-div {
	padding: 0;
	width: 150px;
	color:fff;
	} 
	
	.slide-out-div ul {
	margin:0;
	margin-left:-40px;
	float:left;
	}
	.slide-out-div li {
	text-align:right;
	width:120px;
	color:#fff;
	margin-top:2px;
	font-size:13px;
	background: #2facd6; /*Color de fondo de los enlaces*/
	padding:4px;
	list-style:none;
	}      
	
	.slide-out-div li:hover {
	background: #2d2d2d; /*Color de fondo al pasar el mouse por un enlace*/
	padding:4px;
	list-style:none;
	-moz-transition: 0.2s; 
	-webkit-transition: 0.2s; 
	-o-transition:1s; 
	transition: 1s;
	-webkit-transform: rotate(0deg) scale(1.5) skew(1deg) translate(0px);
	-moz-transform: rotate(0deg) scale(1.5) skew(1deg) translate(0px);
	-o-transform: rotate(0deg) scale(1.5) skew(1deg) translate(0px);
	}      
	   
	.slide-out-div li a {color:#fff; text-decoration:none;font-weight:none;font-family: Century Gothic, sans-serif; }
	
	
    </style>
 
</head>

<body >

<?php


if(!isset($_SESSION['usuario']) || !isset($_SESSION['nivel']) )
{
	echo '<section class="sinLogin">
	<div class="container">
	<section id="content">
	<p>Necesita iniciar sesión 
	para acceder al chat de soporte.
	</p>
	<p align="right"><strong>Inicio sesión ></strong></p>
	</section>
	</div>
	</section>'; exit();
	
}else{


?>

<section id="contenedor">
<header class="hServidor"> 
<span class="tituloEncabezado"><strong>Panel Administrativo</strong></span>
<nav class="navServidor">

<ul>
<li id="inicio_s">
<strong>inicio</strong>
</li>
<li id="salir_s">
<strong>Salir</strong>
</li>

<li>
<span>Usuario: <?php echo $_SESSION['usuario']; ?></span>
</li>

</ul>

</nav>
</header>

<section class="aviso">
<aside>
</aside>
<h3>¡Atención!</h3>
<p><strong>Por motivo de seguridad, su sesión será cerrada despúes de 10 minutos de inactividad en el panel administrativo.</strong></p>

</section>



<article id="contenido">

<section class="opciones">
<ul class="menuServidor">
<li><img src="img/blue-35.png" /><p><strong><a href="#" class="gCliente">Clientes</a></strong></p></li>
<li><img src="img/red-05.png"/><p><strong><a href="#" class="gProducto">Productos</a></strong></p></li>
<li><img src="img/green-12.png"/><p><strong><a href="#" class="gNoticia">Noticias</a></strong></p></li>
<li><img src="img/yellow-06.png"/><p><strong><a href="#" class="gActulizacion">Actualizaciones</a></strong></p></li>
<li><img src="img/blue-22.png"/><p><strong><a href="#" class="gPublicidad">Publicidad</a></strong></p></li>
<li><img src="img/red-39.png"/><p><strong><a href="#" 
class="gOferta">Ofertas</a></strong></p></li>
<li><img src="img/green-10.png"/><p><strong><a href="#" class="gGaleria">Galeria</a></strong></p></li>

<li><img src="img/yellow-38.png"/><p><strong><a href="#" class="gDistribuidor">Distribuidores</a></strong></p></li>
<li><img src="img/blue-04.png"/><p><strong><a href="#" class="gVacante">Vacantes</a></strong></p></li>
<li><img src="img/red-35.png"/><p><strong><a href="#" class="gUsuario">Usuarios</a></strong></p></li>
<li><img src="img/blue-04.png"/><p><strong><a href="#" class="gPago">Liberacion de pago</a></strong></p></li>
<li><br /><br /><br /></li>
</ul>
</section>

</article>

<footer id="footer">
    <span><h4>2015 - Inteli-Code</h4></span>
</footer>

</section>
<div class='slide-out-div'>

      <p class='handle'>Lista de usuarios pendientes de soporte</p>
	<ul id="frmSoporte">
        <!--<li><a href='#'>Enlace 1</a></li>
        <li><a href='#'>Enlace 2</a></li>
        <li><a href='#'>Enlace 3</a></li>
        <li><a href='#'>Enlace 4</a></li>
        <li><a href='#'>Enlace 5</a></li>
        <li><a href='#'>Enlace 6</a></li>-->
	</ul>       
</div>
<?php }?>
</body>
</html>
