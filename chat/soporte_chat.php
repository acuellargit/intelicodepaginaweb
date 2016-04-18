<?php
session_start();
if(!isset($_SESSION['inge_soporte']))
{
die("No tienes permisos para entrar");
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chat de soporte ::Ingenieria::</title>
<link href="chat/estilo.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="js/jquery.min.js"></script>
     <link href="css/colorbox.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="js/jquery.colorbox.js"></script>
    
    <script>
	var scroll_s=false;
    $(document).ready(function(e) {
	var contador=0;
	function cerrar_session()
	{
		var username="<?php echo $_SESSION['usuario_soporte'] ?>";
		
		var postData={ btnUsuario:"Eliminar",usuario:username };
		
		//var postData = $(this).serializeArray();
    	var formURL = "controladores/mensajes/controller.php";
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data, textStatus, jqXHR) 
			{
				//alert(data);
				$.colorbox({html:"<h1>"+data+"</h1>"});

				
			
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				//if fails      
			}
		});
		
	}
	
	
	
	function mostrarMensajes()
	{
		
		//var oldscrollHeight = $("#mensajes").prop("scrollHeight") – 20; //La altura del scroll 
		var usuario="<?php echo $_SESSION['usuario_soporte'] ?>";
		//alert(usuario);
		var postData={ btnUsuario:"Buscar",username:usuario,tipo_busqueda:1 };
		var oldscrollHeight=$("#mensajes").prop('scrollHeight');
		//var postData = $(this).serializeArray();
    	var formURL = "controladores/mensajes/controller.php";
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data, textStatus, jqXHR) 
			{
				//alert(data);
				$("#mensajes").html(data);
				var newscrollHeight = $("#mensajes").prop('scrollHeight'); //La altura del scroll después del pedido
				if(newscrollHeight > oldscrollHeight){
				$("#mensajes").animate({ scrollTop: newscrollHeight }, 'normal'); }
				
			
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				//if fails      
			}
		});
	}
	//mostrarMensajes();
	setInterval(function(){ mostrarMensajes(); }, 500);
	//alert("hi: "+hx);
	$
	$("#texto").keydown(function(e) {
        if(e.keyCode==13)
		{
			agregar_mensaje();
		}
    });
	
	function agregar_mensaje()
	{
		var r=$("#texto").val();
			var usuario="<?php echo $_SESSION['usuario_soporte'] ?>";
			var soporte="<?php echo $_SESSION['inge_soporte'] ?>";
			
		//alert(soporte);
		//alert(usuario);
		var postData={ btnUsuario: "Registrar",mensaje:r,username:usuario,respuesta:1,u_soporte:soporte };
		//var postData = $(this).serializeArray();
    	var formURL = "controladores/mensajes/controller.php";
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data, textStatus, jqXHR) 
			{
				//alert(data);
			mostrarMensajes();
				//limpiar
				$("#texto").val("");
				var hx= $("#mensajes").prop('scrollHeight');
				//alert(hx);
				$("#mensajes").scrollTop(hx);
			
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				//if fails      
			}
		});
	}
	
	
		
		$("#btn-sub").click(function(e) {
            agregar_mensaje();
        });
		
		$("#cerrar_chat").click(function(e) {
            cerrar_session();
			
        });
		
    });
    </script>

</head>

<body>

	
    
<div id="chat">
	<div id="header-chat">
		Chat de soporte tecnico
	</div>
	<div id="mensajes">
    <!--
		<div class="mensaje-autor">
			<img src="usuario.jpg" height="100" alt="" class="foto">
			<div class="flecha-izquierda"></div>
			<div class="contenido">
				Hola mi Jenny!!! Cómo estás??
			</div>
			<div class="fecha">Enviado hace tres minutos</div>
		</div>

	<div class="mensaje-autor">
			<div class="contenido">
				Jajaja que onda señor Rivas, como está?? <br />
				Yo estoy muy bien, cansada como siempre por la 
			</div>
			<div class="flecha-derecha"></div>
			<img src="soporte_tecnico.png" width="100" alt="" class="foto">
			<div class="fecha">Enviado hace tres minutos</div>
		</div>
	</div>
    -->

</div>

<div id="caja-mensaje">
	<input type="text" id="texto" placeholder="Escribir mensaje...">
	<button id="btn-sub">&#8594; </button>
</div>
<div><button id="cerrar_chat">Cerrar sesion</button></div>
</body>
</html>
