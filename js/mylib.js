function openModal(url1,w,h)
{
		window.open(url1,"name","height="+h+",width="+w+",left=0,top=0");
}
function motorPagos(banco,tipo)
{
	document.getElementById('banco').value = banco;
	document.getElementById('tipoPago').value = tipo;
}
function motorPagosCredito(banco,tipo,meses)
{
	document.getElementById('banco').value = banco;
	document.getElementById('tipoPago').value = tipo;
	document.getElementById('meses').value = meses;
}
function openWindow(url,ancho,alto)
{
	$.fn.colorbox({href:url,open:true,iframe:true,width:ancho,height:alto,innerHeight:'100%',opacity:0.50,close:'Cerrar Ventana'});
}
function limpiarDiv(nombre)
{
		document.getElementById(nombre).innerHTML="";
}

function Isfecha(valor) 
{
	if (valor.indexOf("/")>-1)
	{
		aJecha=valor.split("/");
		if (aJecha.length==3)
		{
			var dia=aJecha[0];
			var mes=aJecha[1];
			var ano=aJecha[2];
			if (IsNumeric(ano) && IsNumeric(mes) && IsNumeric(dia) && ano!="" && aJecha[1].length==2 && aJecha[0].length==2)
			{ 
				ano=parseInt(ano,10);
				mes=parseInt(mes,10);
				dia=parseInt(dia,10);
				if ((ano==0) || (ano<1900) || (ano>2100)) 
					{return false; }
				if (mes ==2) 
				{ 
					if ((ano%4 == 0) && (dia<=29) && (dia>0)) 
						{return true;}
					else if((dia<=28) && (dia>0))
						{return true;}
					else
						{return false; }
				} 
				else if (((mes==1) || (mes==3) || (mes==5) || (mes==7) || (mes==8) || (mes==10) || (mes==12)) && (dia<=31) && (dia>0)) 
				{return true; } 
				else if (((mes==4) || (mes==6) || (mes==9) || (mes==11)) && (dia<=30) && (dia>0)) 
				{return true; }
				else 
					{return false; }
			} 
			else 
				{return false; } 
		}
		else 
			{return false; }
	}else 
		{return false; }
}


function IsNumeric(valor) 
{ 
	var log=valor.length; var sw="S"; 
	for (x=0; x<log; x++) 
	{ 
		v1=valor.substr(x,1); 
		v2 = parseInt(v1); 
		//Compruebo si es un valor numérico 
		if (isNaN(v2)) { sw= "N";} 
	} 
	if (sw=="S") 
		{return true;} 
	else 
		{return false; } 
} 

function formatNumber(num,prefix){
	prefix = prefix || '';
	num += '';
	var splitStr = num.split('.');
	var splitLeft = splitStr[0];
	var splitRight = splitStr.length > 1 ? '.' + splitStr[1] : '.00';
	var regx = /(\d+)(\d{3})/;
	while (regx.test(splitLeft)) {
		splitLeft = splitLeft.replace(regx, '$1' + ',' + '$2');
	}
	return prefix + splitLeft + splitRight;
}

function unformatNumber(num) {
	return num.replace(/([^0-9\.\-])/g,'')*1;
} 

function noDecimal(num,deci)
{
    num=Math.round(num*deci)/deci;
    return num
}

function trim (string) {
	string = string.replace(/^\s+/, '');
	for (var i = string.length; i > 0; i--) {
		if (/\S/.test(string.charAt(i))) {
			string = string.substring(0, i);
			break;
		}
	}
	return string;
}
function formatoNumero(valor)
{
	var valorNumero = valor.toString().replace(/\,/g,''); //reemplaza la coma con vacio
	return formatNumber(noDecimal(parseFloat(valorNumero),100).toString());
}
function convertirInt(valor)
{
	if (valor=="") return 0;
	return noDecimal(parseInt(valor.replace(/,/g,"")),100);
}
function convertirFloat(valor)
{
	if(valor=="") return 0;
	return noDecimal(parseFloat(valor.replace(/,/g,"")),100);
}

//Funcion del menu TOP temporal
function mainmenu(){
$(" #nav ul ").css({display: "none"}); // Opera Fix
$(" #nav li").hover(function(){
		$(this).find('ul:first').css({visibility: "visible",display: "none"}).show(400);
		},function(){
		$(this).find('ul:first').css({visibility: "hidden"});
		});
}
function defaultTooltip()
{
		overlib_pagedefaults(WIDTH,150,FGCOLOR,'#4E4E4E',BGCOLOR,'#666666',TEXTFONT,"Verdana",TEXTSIZE,'11px',TEXTCOLOR,'#FFFFFF');
}

function soloNumeros( e,value) {

        	tecla = (document.all) ? e.keyCode : e.which;
        	if (tecla==8 || tecla == 0) return true; //Tecla de retroceso (para poder borrar)
        	patron = /\d/;
        	te = String.fromCharCode(tecla);
		resp=patron.test(te);
        return resp;
     }  

     function soloDigitosDecimal(e, value) {
      tecla = (document.all) ? e.keyCode : e.which;
        if (tecla==8 || tecla == 0 ) return true; //Tecla de retroceso (para poder borrar)
        patron = /^\d+$/;// Solo acepta números
        te = String.fromCharCode(tecla);
        p=false;
        for(i=0;i<value.length;i++){
            if(value.charAt(i)=="."){
                p= true;              
            }
         }
       b=false;
        if (patron.test(te)==true){//si pasa o son puros decimales
            b=true;
        }
        else{//si no son decimales           
            if (tecla==46 && p==true){               
                b=false;                
            }            
            else if (tecla==46 && p==false){              
                b=true;
            }           
        }
       return b; //patron.test(te);
     }
	 function checarfecha(para)
	 {
		
			$cfechaAlta=$("#fechaAlta").val().split("/");
			$cfechaActual=$("#txtFechaActual").val().split("/");			
			var dFechaAlta=new Date();
			var dfechaActual=new Date();
			var dfechaDeclaracion=new Date();
			dFechaAlta.setFullYear(parseInt($cfechaAlta[2],10),parseInt($cfechaAlta[1],10)-1,parseInt($cfechaAlta[0]),10);
			dfechaActual.setFullYear(parseInt($cfechaActual[2],10),parseInt($cfechaActual[1],10)-1,parseInt($cfechaActual[0]),10);
			dfechaDeclaracion.setFullYear(parseInt($("#cmbAnio").val(),10),parseInt($("#cmbMes").val(),10)-1,1);
			/*if(dfechaDeclaracion<dFechaAlta)
			{
				alert("No puede seleccionar una fecha anterior a su alta.");
				if(para=="M")
					$("#cmbMes option:[value="+$('#txtMes').val()+"]").attr('selected',true);
				else if(para=="A")
					$("#cmbAnio option:[value="+$('#txtAnio').val()+"]").attr('selected',true);
				return false;
			}else
			{*/
				if(dfechaDeclaracion>dfechaActual)
				{
					alert("No puede seleccionar una fecha posterior a la fecha actual");
					if(para=="M")
						$("#cmbMes option:[value="+$('#txtMes').val()+"]").attr('selected',true);
					else if(para=="A")
						$("#cmbAnio option:[value="+$('#txtAnio').val()+"]").attr('selected',true);
					return false;
				}
			//}
			return true;			
	 }
	 function rssParser(xml)
     {
		if(xml==null)
		{
			$("#newsFeed").html("Error: URL Invalida");
		}else if ($(xml).find('RSS').text()=="null"){
			$("#newsFeed").html("Error: "+xml);
		}else{
                        var $rss=$(xml).find('rss');
                        var $chanel=$($rss).find('channel');
                        $html="<ul>";
                        var row=0;
                        $($chanel).find('item').each(function(){
                            var rowStyle="listaTd1";
                            if((row%2)!=0)rowStyle="listaTd2";
                            var $titulo = $(this).find('title').text();
                            var $link = $(this).find('link').text();
                            var $descripcion = $(this).find('description').text();
							$descripcion = $descripcion.replace(/"/gi,"&quot;");
                            $html+="<li><a href='"+$link+"' target='_blank' onmouseover=\"return overlib('"+$descripcion+"',WIDTH,250);\" onmouseout=\"return nd();\">"+$titulo+"</a></li>";
                            row++;				
                        	
                        });
						$html+="<\/ul>";
                        $("#newsFeed").html($html);
		}
	}
var openDHTMLlayer = false;
var openDHTMLalready = false;
function abrirAyuda(ruta,department)
{
          if(openDHTMLlayer == 1)
            destroyLayer('mylayer0Div');
          openDHTMLlayer = 0;
          openDHTMLalready = true;
          csTimeout=0;
              window.open(ruta + 'livehelp.php?department=' + department + '&cslhVISITOR=9454268df4e835c570f15cfec74e137d&cslheg=1&serversession=0', 'chat54050872', 'width=585,height=420,menubar=no,scrollbars=0,resizable=no');
          }
function destroyLayer(id,nestref) {
                //bc:if (is.ns) {
                if (is.ns4) {
                        if (nestref) eval("document."+nestref+".document."+id+".visibility = 'hide'")
                        else document.layers[id].visibility = "hide"
                }
                else if (is.ie) {
                        document.all[id].innerHTML = ""
                        document.all[id].outerHTML = ""
                }
              //bc:
              else if (is.ns5) {
                var elmref = document.getElementById(id);
                if (elmref)
                  elmref.parentNode.removeChild(elmref);
              }
}
	 
function ValidarBusqueda()
{
	txtBusc=$("#txtBusqueda").val();
	sBus=$("#sBusqueda").val();
	sNo=$("#sNoRegistros").val();	
	sTipo=$("#sTipoBusqueda").val();
	aBus=sBus.split("-");
	err="";
	var respuesta=new Array(3);
	respuesta[1]="";
	if(aBus[0]=="S")
	{
		if(txtBusc=="")
			err="Se necesita un valor de busqueda";
		respuesta[1]=" where "+aBus[1]+"='"+txtBusc+"'";
		if(sTipo==" like ")
			respuesta[1]=" where "+aBus[1]+" like '"+txtBusc+"%'";
	}else if(aBus[0]=="I")
	{
		if(!IsNumeric(txtBusc) || txtBusc=="")
			err="Se necesita un número";
		respuesta[1]=" where "+aBus[1]+"="+txtBusc+"";
		if(sTipo==">=")
			respuesta[1]=" where "+aBus[1]+">="+txtBusc+"";
		if(sTipo=="<=")
			respuesta[1]=" where "+aBus[1]+"<="+txtBusc+"";
	}else if(aBus[0]=="B")
	{
		if(txtBusc!="0" && txtBusc!="1")
			err="0- falso;  1- verdadero";
		respuesta[1]=" where "+aBus[1]+"="+txtBusc+"";
	}else if(aBus[0]=="D")
	{
		if(!Isfecha(txtBusc))
			err="No es un formato de fecha valido. (dd/mm/aaaa)";
		else
		{
			afecha=txtBusc.split("/");
			txtBusc="'"+afecha[2]+"-"+afecha[1]+"-"+afecha[0]+"'";
			respuesta[1]=" where "+aBus[1]+"="+txtBusc+"";
		}
	}
	respuesta[2]="";
	if(txtBusc!="" && aBus[0]!="T")
		respuesta[2]=" and rownum < "+sNo;
	respuesta[0]=err;
	return respuesta;
	
}
function ampliarMenu(div,ruta)
{
                    $('#menuAcceso').hide("slow");
                    $('#menuAccesoImg').html("<img src='"+ruta+"Play1.png' />");
                    $('#menuComunidades').hide("slow");
                    $('#menuComunidadesImg').html("<img src='"+ruta+"Play1.png' />");
                    $('#menuServiciosContribuyente').hide("slow");
                    $('#menuServiciosContribuyenteImg').html("<img src='"+ruta+"Play1.png' />");
					$('#menuServiciosOPDs').hide("slow");
                    $('#menuServiciosOPDsImg').html("<img src='"+ruta+"Play1.png' />");
                    $('#miCuenta').hide("slow");
                    $('#miCuentaImg').html("<img src='"+ruta+"Play1.png' />");
                    $('#menuServiciosComunidades').hide("slow");
                    $('#menuServiciosComunidadesImg').html("<img src='"+ruta+"Play1.png' />");
                    $('#menuComunidadesGubernamentales').hide("slow");
                    $('#menuComunidadesGubernamentalesImg').html("<img src='"+ruta+"Play1.png' />");
                    $('#menuTramites').hide("slow");
                    $('#menuTramitesImg').html("<img src='"+ruta+"Play1.png' />");
                    $('#menuFiscal').hide("slow");
                    $('#menuFiscalImg').html("<img src='"+ruta+"Play1.png' />");
                    $('#'+div).show("slow");
                    $('#'+div+'Img').html("<img src='"+ruta+"Play2.png' />");
}
	 