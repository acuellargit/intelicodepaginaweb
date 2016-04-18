<?php
session_start();

if(!isset($_SESSION['usuario']))
{
	echo '<section class="sinLogin">
	<div class="container">
	<section id="content">
	<p>Necesita iniciar sesión 
	para acceder al chat de soporte.
	</p>
	<p align="right"><a href="/index.html"><strong>Inicio sesión ></a></strong></p>
	</section>
	</div>
	</section>';	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chat de soporte ::Solicitud de soporte::</title>
     <link href="css/colorbox.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="js/jquery.colorbox.js"></script>
<style type="text/css">

.container { margin: 25px auto; position: relative; width: 900px; }
#content {
	background: #f9f9f9;
	background: -moz-linear-gradient(top,  rgba(248,248,248,1) 0%, rgba(249,249,249,1) 100%);
	background: -webkit-linear-gradient(top,  rgba(248,248,248,1) 0%,rgba(249,249,249,1) 100%);
	background: -o-linear-gradient(top,  rgba(248,248,248,1) 0%,rgba(249,249,249,1) 100%);
	background: -ms-linear-gradient(top,  rgba(248,248,248,1) 0%,rgba(249,249,249,1) 100%);
	background: linear-gradient(top,  rgba(248,248,248,1) 0%,rgba(249,249,249,1) 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f8f8f8', endColorstr='#f9f9f9',GradientType=0 );
	-webkit-box-shadow: 0 1px 0 #fff inset;
	-moz-box-shadow: 0 1px 0 #fff inset;
	-ms-box-shadow: 0 1px 0 #fff inset;
	-o-box-shadow: 0 1px 0 #fff inset;
	box-shadow: 0 1px 0 #fff inset;
	border: 1px solid #c4c6ca;
	margin: 0 auto;
	padding: 25px 0 0 ;
	padding-right:25px;
	position: relative;
	text-align: center;
	text-shadow: 0 1px 0 #fff;
	width: 400px;
}
#content h1 {
	color: #7E7E7E;
	font: bold 16px Helvetica, Arial, sans-serif;
	letter-spacing: -0.05em;
	line-height: 20px;
	margin: 10px 0 30px;
}
#content h1:before,
#content h1:after {
	content: "";
	height: 1px;
	position: absolute;
	top: 10px;
	width: 27%;
}
#content h1:after {
	background: rgb(126,126,126);
	background: -moz-linear-gradient(left,  rgba(126,126,126,1) 0%, rgba(255,255,255,1) 100%);
	background: -webkit-linear-gradient(left,  rgba(126,126,126,1) 0%,rgba(255,255,255,1) 100%);
	background: -o-linear-gradient(left,  rgba(126,126,126,1) 0%,rgba(255,255,255,1) 100%);
	background: -ms-linear-gradient(left,  rgba(126,126,126,1) 0%,rgba(255,255,255,1) 100%);
	background: linear-gradient(left,  rgba(126,126,126,1) 0%,rgba(255,255,255,1) 100%);
    right: 0;
}
#content h1:before {
	background: rgb(126,126,126);
	background: -moz-linear-gradient(right,  rgba(126,126,126,1) 0%, rgba(255,255,255,1) 100%);
	background: -webkit-linear-gradient(right,  rgba(126,126,126,1) 0%,rgba(255,255,255,1) 100%);
	background: -o-linear-gradient(right,  rgba(126,126,126,1) 0%,rgba(255,255,255,1) 100%);
	background: -ms-linear-gradient(right,  rgba(126,126,126,1) 0%,rgba(255,255,255,1) 100%);
	background: linear-gradient(right,  rgba(126,126,126,1) 0%,rgba(255,255,255,1) 100%);
    left: 0;
}
#content:after,
#content:before {
	background: #f9f9f9;
	background: -moz-linear-gradient(top,  rgba(248,248,248,1) 0%, rgba(249,249,249,1) 100%);
	background: -webkit-linear-gradient(top,  rgba(248,248,248,1) 0%,rgba(249,249,249,1) 100%);
	background: -o-linear-gradient(top,  rgba(248,248,248,1) 0%,rgba(249,249,249,1) 100%);
	background: -ms-linear-gradient(top,  rgba(248,248,248,1) 0%,rgba(249,249,249,1) 100%);
	background: linear-gradient(top,  rgba(248,248,248,1) 0%,rgba(249,249,249,1) 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f8f8f8', endColorstr='#f9f9f9',GradientType=0 );
	border: 1px solid #c4c6ca;
	content: "";
	display: block;
	height: 100%;
	left: -1px;
	position: absolute;
	width: 100%;
}
#content:after {
	-webkit-transform: rotate(2deg);
	-moz-transform: rotate(2deg);
	-ms-transform: rotate(2deg);
	-o-transform: rotate(2deg);
	transform: rotate(2deg);
	top: 0;
	z-index: -1;
}
#content:before {
	-webkit-transform: rotate(-3deg);
	-moz-transform: rotate(-3deg);
	-ms-transform: rotate(-3deg);
	-o-transform: rotate(-3deg);
	transform: rotate(-3deg);
	top: 0;
	z-index: -2;
}

/**********/
#chat{
			background-color: #eee;
			margin: 20px auto 0;
			width: 400px;
		}
		#chat #header-chat{
			background-color: #555;
			color: white;
			padding: 10px;
			margin-right:-25px;
			text-align: center;
			text-shadow: 1px 1px 3px rgba(0,0,0,0.6);
		}
		
		
		#caja-mensaje{
	background-color: #A8DCF7;
	margin: 0 auto;
	padding: 10px;
	width: 400px;
}
#caja-mensaje input{
	border: solid 1px #4193BF;
	outline: none;
	padding: 10px;
	width: 310px;
}
#caja-mensaje button{
	border: 0;
	background-color: #4193BF;
	color: white;
	font-size: 16px;
	padding: 8px;
	width: 50px;
}

#chat #mensajes{
	padding: 10px;
	height: 400px;
	width: 400px;
	overflow: hidden;
	overflow-y: scroll 
}

#chat #mensajes .mensaje-autor{
	margin-bottom: 50px;

}
#chat #mensajes .mensaje-autor img, #chat #mensajes .mensaje-amigo img{
	display: inline-block;
	vertical-align: top;
}
#chat #mensajes .mensaje-autor .contenido{
	background-color: white;
	border-radius: 5px;
	box-shadow: 2px 2px 3px rgba(0,0,0,0.3);
	display: inline-block;
	font-size: 13px;
	padding: 15px;
	vertical-align: top;
	width: 280px;
}

#chat #mensajes .mensaje-autor .contenido2{
	background-color:#2EB5D1;
	border-radius: 5px;
	box-shadow: 2px 2px 3px rgba(0,0,0,0.3);
	display: inline-block;
	font-size: 13px;
	padding: 15px;
	vertical-align: top;
	width: 280px;
}

#chat #mensajes .mensaje-autor .fecha{
	color: #777;
	font-style: italic;
	font-size: 13px;
	text-align: right;
	margin-right: 35px;
	margin-top: 10px;
}
#chat #mensajes .mensaje-autor .flecha-izquierda{
	display: inline-block;
	margin-right: -6px;
	margin-top: 10px;
	width: 0; 
	height: 0; 
	border-top: 0px solid transparent;
	border-bottom: 15px solid transparent;
	border-right: 15px solid white;
}



</style>
	<script type="text/javascript" src="js/jquery.min.js"></script>
    
    <script>
    $(document).ready(function(e) {
		
	$("#texto").val("::Solicitud de soporte:: usuario en linea");
	agregar_mensaje();
	
	setInterval(function(){ mostrarMensajes(); }, 500);
	
	$("#texto").keydown(function(e) {
        if(e.keyCode==13)
		{
			agregar_mensaje();
		}
    });
	$("#cerrar_chat").click(function(e) {
            cerrar_session();
			
        });
	function cerrar_session()
	{
		var username="<?php echo $_SESSION['usuario'] ?>";
		
		var postData={ btnUsuario:"Eliminar",usuario:username };
		
		//var postData = $(this).serializeArray();
    	var formURL = "http://www.inteli-code.com.mx/controladores/mensajes/controller.php";
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
	
	function agregar_mensaje()
	{
		var r=$("#texto").val();
		var usuario="<?php echo $_SESSION['usuario'] ?>";
		//alert(usuario);
		var postData={ btnUsuario: "Registrar",mensaje:r,username:usuario,respuesta:0 };
		//var postData = $(this).serializeArray();
    	var formURL = "http://www.inteli-code.com.mx/controladores/mensajes/controller.php";
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
			
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				//if fails      
			}
		});
	}
	
	function mostrarMensajes()
	{
		
		var usuario="<?php echo $_SESSION['usuario'] ?>";
		var postData={ btnUsuario:"Buscar",username:usuario,tipo_busqueda:1 };
		var oldscrollHeight=$("#mensajes").prop('scrollHeight');
		//var postData = $(this).serializeArray();
    	var formURL = "http://www.inteli-code.com.mx/controladores/mensajes/controller.php";
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data, textStatus, jqXHR) 
			{
				//alert(data);
					if(data.length<=0)
				{
					$("#mensajes").html("---<p>El ingeniero en turno cerro sesion, <Ya sea por exeder el tiempo de respuesta o por la finalizacion de su consulta> <h1>Es un placer atenderle. Gracias por su preferencia</h1></p>");
					return;
				}
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
		
		$("#btn-sub").click(function(e) {
            agregar_mensaje();
			/*var hx= $("#mensajes").prop('scrollHeight');
			$("#mensajes").scrollTop(hx);*/
        });
		
    });
    </script>

</head>

<body>

<?php




if(!isset($_SESSION['usuario']))
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
	</section>';
	
	exit();
}else{


?>


<input id="txtcontador" type="hidden" />
<div class="container">
	<section id="content">
    
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

</section>
</div>
</body>
</html>
<?php } ?>