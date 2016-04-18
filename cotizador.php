<link rel="stylesheet" type="text/css" href="css/opciones.css" />
<link rel="stylesheet" href="css/carrito.css" />
<link rel="stylesheet" href="css/formularioContacto.css"/>
         <link href="css/colorbox.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="js/jquery.colorbox.js"></script>
<script>
		//----------------------------Inicio, cuando el documento esta listo
		$(document).ready(function(e) {
        $("#formElem").hide();
		$("#footer").hide();
		/*$("#btnBuscar").click(function(e) {
			//alert("buscar");
			buscar_producto(); 
			$("#formElem").show();
        });*/
		
		buscar_producto();
		//----------------------------Metodo para recorrer las ventas detalle
		function guardarVentaDetalle(id)
		{
			$('.iEfectivo').each(function() {
		//cada elemento seleccionado
			if($(this).val()>=1){
				ingresar_venta_detalle($(this).prop('name'),id);
			}
			//ingresar_venta_detalle($(this).val(),id);

			});
			
				if($("#efectivo").prop("checked"))
				{
					
					//alert("efectivo");
					
					
			
					
					$.colorbox({href:'http://www.inteli-code.com.mx/PDF/pagoEfectivo.php?numeroOrden='+id,open:true,iframe:true,width:"70%", innerHeight:'70%',close:'Cerrar Ventana'});
					
				}else
				{
					
					
					$.colorbox({href:'http://www.inteli-code.com.mx/pagoOnline.php?numeroOrden='+id,open:true,iframe:true,width:"70%", innerHeight:'70%',close:'Cerrar Ventana'});
				}

		}
		//----------------------------Ingresar Venta detalle
		function ingresar_venta_detalle(id_producto,id_venta)
		{
			var postData = { btnVenta: "RegistrarDetalle",producto:id_producto ,id: id_venta };
			var formURL= "controladores/clienteventa/controller.php";
			$.ajax(
			{
				url : formURL,
				type: "POST",
				data : postData,
				success:function(data, textStatus, jqXHR) 
				{	
				if(data!="Guardado")
				{
					$("#dialogy").empty();
					$("#dialogy").html("<p>Error al agregar codigo de error: <span>"+data+"</span></p>");
					$( "#dialogy" ).dialog();
				}
					
					
					
				},
				error: function(jqXHR, textStatus, errorThrown) 
				{
					alert("error al cargar los datos");
					//if fails      
				}
			});	
		}
		//----------------------------Funcion para sumar los totales de la venta.
		function sumarTotales()
		{
			console.log("inicia suma");
			
			var total=0;
			$("#txtSuma").val("0");
			
			
			$('.iEfectivo').each(function() {
			//alert($(this).prop("title"));
			var x=$(this).prop('name');
			x="td#"+x+".alpha";
			$(x).html("0.00");
			if($(this).val()>=1){
			total+=(parseFloat($(this).prop('title'))*$(this).val());
			$("#txtSuma").val(total);
			
			$(x).empty();
			var r=parseFloat($(this).prop('title'))*$(this).val();
			
			
			if(r>0){
			$(x).html(r);
			}else
			{
				$(x).html("0.00");
			}
			console.log(x);
			console.log("suma----->"+r);
			}
			
			});
			if(total<=0)
			{
				$("#txtSubTotal").empty();
				$("#txtSubTotal").html("0.00");
				$("#txtSuma").empty();
				$("#txtSuma").val("0.00");
				$("#txtIva").empty();
				$("#txtIva").html("0.00");
				return;
				
			}
			if($("#txtSuma").val()>0){
			var subTotal=parseFloat($("#txtSuma").val()).toFixed(2);
			$("#txtSubTotal").empty();
			$("#txtSubTotal").html(subTotal);
			
			
			var i=parseFloat($("#txtSuma").val()*1.16).toFixed(2);
			var iva=parseFloat($("#txtSuma").val()*0.16).toFixed(2);
			
			$("#txtIva").empty();
			$("#txtIva").html(iva);
			
			$("#txtSuma").empty();
			$("#txtSuma").html(i);
			}
			
			//alert(i);
			//$("#monto").val(i);
		}
		
		
		function $_GET(param)
		{
		/* Obtener la url completa */
		url = document.URL;
		/* Buscar a partir del signo de interrogación ? */
		url = String(url.match(/\?+.+/));
		/* limpiar la cadena quitándole el signo ? */
		url = url.replace("?", "");
		/* Crear un array con parametro=valor */
		url = url.split("&");
		 
		/* 
		Recorrer el array url
		obtener el valor y dividirlo en dos partes a través del signo = 
		0 = parametro
		1 = valor
		Si el parámetro existe devolver su valor
		*/
		x = 0;
		while (x < url.length)
		{
		p = url[x].split("=");
		if (p[0] == param)
		{
		return decodeURIComponent(p[1]);
		}
		x++;
		}
		}
		
		
		function buscar_producto()
		{
		
		var busq=$_GET("busq");
		//alert("GET:   -->"+busq);
		var postData = { btnProducto: "Buscar", tipo_busqueda: "4",op:busq};
		var formURL= "controladores/producto/controller.php";
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			beforeSend: function(){
			$("#frmCarro").html("<img src='images/loading.gif' />");
			},
			success:function(data, textStatus, jqXHR) 
			{	
				//alert(data);
				$("#frmCarro").empty();
				$("#frmCarro").html(data);
				$(".iEfectivo").change(function(e) {
            	sumarTotales();
        		});
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				alert("error al cargar los datos");
				//if fails      
			}
		});	
		}
		
		/*Guarda cliente*/
		$("#frmGenerar").submit(function(e)
		{
	
		var postData = $(this).serializeArray();
		var formURL =  $(this).attr("action");
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,beforeSend: function()
			{
				$("#wait").html("<img src='images/loading2.gif' height='35' />");
			},
			success:function(data, textStatus, jqXHR) 
			{
				var num=data;
				alert(data);
				if(num<0)
				{
				var hr="<p>Error al generar la transaccion codigo de error: <span>"+data+"</span></p>";
				$.colorbox({html:hr});
				
				return;
				}
				var hr="<p>Su orden de compra se ha dado de alta con el numero de transacción: "+data+"</p>";
				$.colorbox({html:hr});
				
				$("#wait").empty();
				guardarVentaDetalle(data);
			
				$('#formElem').each (function(){
				  this.reset();
				});
				
				$('input[name="orderBox"]:checked').each(function() {
			
				$(this).removeProp("checked");
			
				});
				$("#frmCotizador").empty();
				$("#txtSuma").val("");
				
			
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				//if fails      
			}
		});
		e.preventDefault(); //STOP default action
		});
		
		        });
				
				
</script>





<section>
<aside class="wrapper wrapper__gamma">
      <h2 class="__alpha">Venta online</h2>   
<table class="">
          <thead>
            <tr>
              <th>Módulos(s)</th>
              <th></th>
              <th>Total(s)</th>
            </tr>
          </thead>
          <tbody id="frmCarro">
   
          </tbody>
          <tr>
            <th colspan='2'>Subtotal</th>
            <td><div id="txtSubTotal">$00.0</div></td>
          </tr>
          <tr>
            <th colspan='2'>Iva</th>
            <td><div id="txtIva">$00.0</div></td>
          </tr>
          <tr>
            <th colspan='2'>Embarque</th>
            <td>$00.00</td>
          </tr>
          <tr class="alpha">
            <th colspan='2'>Total</th>
            <td><div id="txtSuma">$00.0</div></td>
          </tr>
        </table>
              
     
      </aside>
              
<!-- Fin carrito -->
</section>

<section id="modulosForm">


<div class="container">
	<section id="content">
		
    <form id="frmGenerar" action="controladores/clienteventa/controller.php" >
	<h1>Cliente</h1>
    <div>
    <input id="txtNombre" name="nombre" type="text" placeholder="Nombre de la persona fisica o moral" required="required" />
    </div>
    
    <div>
    <input id="txtNum" name="num" type="hidden" value="1202" placeholder="Núm cliente" required="required" />
    </div>
    <div>
    <input id="txtPass"  name="pass" type="hidden" value="master"  placeholder="Contraseña" required="required" />
    </div>
    <div>
    <input id="txtPass2" name="pass2" type="hidden" value="master"  placeholder="Confirmar contraseña" required="required"/>
    </div>
    <h1>Contacto</h1>
    <div>
    <input id="txtDireccion" name="direccion" type="text"  placeholder="Direccion" required="required" />
    </div>
    <div>
    <input id="txtNumero" name="numero" type="number"  placeholder="Num ext/int" required="required" />
    </div>
    <div>
    <input id="txtColonia" name="colonia" type="text"  placeholder="Colonia" required="required" />
    </div>
    <div>
    <input id="txtCp" name="cp" type="text"  placeholder="Codigo Postal" required="required" />
    </div>
     <div>
    <input id="txtEmail" name="email" type="email"  placeholder="Email para contacto" required="required" />
    </div>
    <div>
    <input id="txtEstado" name="estado" type="text" placeholder="Estado" required="required" />
    </div>
    
    <div>
            	<input type="hidden" name="btnVenta" value="Registrar" />
				<input type="submit" value="Pagar compra" />
			</div>
</form>

        
        <div id="wait"></div>
		
	</section><!-- content -->
</div><!-- container -->

</section>




<!--
<div id="aux">

 <h2><strong>Sector de su empresa</strong></h2>
  <span class="botoneraSuperior">
  
<input type="hidden" name="btnSector" id="btnSector" /> 

<select name="listaSector" id="listaSector" placeholder="Seleccionae el sector">
<option>Industrial</option>
<option>Pyme</option>
<option>Petrolero</option>
<option>Comercial</option>
</select>

  <input  type="submit" class="btnBuscar" id="btnBuscar" value="Ver paquetes&rarr;" />
    </span>
    <label>Forma de pago</label> 
 	<span><input id="efectivo"  value="efectivo" type="radio" name="opPago" checked="checked"  >Deposito bancario</input></span>
    <span><input value="paypal" type="radio" name="opPago">Tarjeta</input></span>
    </div>
    <div id="cuadro">
    <div id="frmCotizador"></div>
    
    <div>
    <fieldset id="totalGlobal">
      <label>Total en MXN: &nbsp;</label><input id="txtSuma" name="txtSuma" /></fieldset>
<!--<fieldset>

<form id="frmGenerar" action="" >
	<label>Nombre de la persona Fisica o moral</label>
    <input id="txtNombre" name="nombre" placeholder="Nombre de la persona fisica o moral" />
    <label>Contraseña</label>
    <input id="txtPass"  name="pass" type="password" />
    <label>Confirmar contraseña</label>
    <input id="txtPass2" name="pass2" type="password" />
    <label>Direccion</label>
    <input id="txtDireccion" name="direccion" type="text" />
    <label>Numero exterior</label>
    <input id="txtNumero" name="numero" type="number" />
    <label>Estado</label>
    <input id="txtEstado" name="estado" type="text" />
    
    
    
<button>Generar orden de pago</button>
</form>
</fieldset>-->
<!--
</div>
</div> <!-- termina menu div-->
<!--
<div id="aux">
 
<h2><strong>Registro de clientes</strong></h2>

 
<form name="formElem" id="formElem" action="controladores/clienteventa/controller.php" method="post">
<ul>


<li class="derecha">
  <label class="titulo" for="contacto">Elija una contraseña para sus operacion. <span class="requerido">*</span></label>
 
  <div>


 
    <span class="tercio">
    
    
      <input type="password" id="pass" name="pass" value="" placeholder="Contraseña" required="required"/>
        </span>
  </div>
 
</li>


<li class="izquierda">
  
  <label class="titulo" for="nombre">Nombre y apellidos persona física<span class="requerido">*</span></label>

  <div>
    <span class="completo">
      <input id="nombre" name="nombre" value="" placeholder="Nombre" required="required" />
    </span>
 
    <span class="completo">
      <input id="apellido1" name="apellido1" value="" placeholder="Primer apellido" required="required"/>
    </span>
 
    <span class="completo">
      <input id="apellido2" name="apellido2" value="" placeholder="Segundo apellido" required="required"/>
    </span>
  </div>
 
  <p class="ayuda">No te olvides de escribir también el segundo apellido</p>
</li>
 
 
 
  
<li class="derecha">
  <label class="titulo" for="contacto">Datos de facturación</label>
 
  <div>
  <span class="completo">
      <input id="rfc" name="rfc" value="" placeholder="RFC " required=""/>
    </span>
    <span class="completo">
      <input id="direccion" name="direccion" value="" placeholder="Direccion " required=""/>
    </span>
 
     <span class="tercio">
    <input id="num" name="num" value="" placeholder="Num. Ext/Int" required=""/>
      
  
    </span>
 
    <span class="dostercios">
    
    <input id="cp" name="cp" value="" placeholder="Codigo postal " required=""/>
     
        </span>
        
        
     <span class="tercio">
    <input id="colonia" name="colonia" value="" placeholder="Colonia" required=""/>
      
  
    </span>
 
    <span class="dostercios">
    
     <input id="estado" name="estado" value="" placeholder="Estado " required=""/>
      
        </span>
        
          <span class="completo">
      <input id="empresa" name="empresa" value="" placeholder="Empresa donde labora " required=""/>
    </span>
  </div>
 
</li>
 
 


<li class="botones">
 <input type="hidden" id="btnVenta" name="btnVenta" value="Registrar" />
  <input id="alta" type="submit" value="Registrar cliente &rarr;" />
   <div id="wait"></div>

</li>
 
</ul>
</form>



 <div id="dialog" title=""></div>
</div>

</div>
-->


