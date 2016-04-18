<?php
if(isset($_GET["numeroOrden"]))
{
	
}else
{
	die("Error acceso denegado");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sistema de pago online</title>
<link rel="stylesheet" href="css/tablas.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
	<script>
		buscarProducto();
		
		function sumarTotales()
		{
			var total=0;
			$('input[name="orderBox"]').each(function() {
			//alert($(this).prop("title"));
			total+=parseFloat($(this).prop('title'));
			$("#monto").val(total);
			});
			
			var i=parseFloat($("#monto").val()).toFixed(2);
			$("#monto").val(i);
			
		}
		function buscarProducto(){
		var idx="<?php echo $_GET["numeroOrden"]; ?>";
		var postData = { btnVenta: "Buscar", tipo_busqueda: "2",id:idx };
		var formURL= "controladores/clienteventa/controller.php";
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			beforeSend: function(){
			$("#frmProductos").html("<img src='images/loading2.gif' />");
			},
			success:function(data, textStatus, jqXHR) 
			{	
				//alert(data);
				$("#frmProductos").empty();
				$("#frmProductos").html(data);
				sumarTotales();
				
				
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				alert("error al cargar los datos");
				//if fails      
			}
		});	
		}
	</script>
</head>

<body>
<p>
Proceso de pago con tarjeta de credito o cuenta Paypal.
</p>
<div>
	<p>Su numero de orden de compra es:<b><?php echo $_GET["numeroOrden"]; ?></b></p>
	<p>Lista de productos a pagar:</p>
</div>
	<div id="frmProductos"></div>


<p>Le recordamos que sus datos son confidenciales y que todo pago efectuado en esta plataforma esta respaldado por <b>Paypal.</b></p>
<center>Oprima el boton comprar ahora para continuar</center>


<form id="frmPaypal" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="sheloveyou1@hotmail.com">
<input type="hidden" name="lc" value="MX">
<input type="hidden" name="item_name" value="Software intelcode">
<input type="hidden" id="monto" name="amount" >
<input type="hidden" name="currency_code" value="MXN">
<input type="hidden" name="button_subtype" value="services">
<input type="hidden" name="no_note" value="0">
<input type="hidden" name="tax_rate" value="16.000">
<input type="hidden" id="shipping" name="shipping" >
<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">
<input type="image" id="imagen1" src="https://www.paypalobjects.com/es_XC/MX/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal, la forma más segura y rápida de pagar en línea.">
<img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
</form>
	
</body>
</html>