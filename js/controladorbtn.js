// Controlador de funciones por pulsacion de botones



$(document).ready(function(){

	
	$('#solucion').click(function(){
		
		$('#soluciones').load('software.html');
		var focalizar = $('body').position().top;
$('#soluciones').animate({scrollTop: focalizar}, 1000);
		})
		
		
		
		$('#inicio').click(function(){
		var focalizar = $('body').position().top;
$('#').animate({scrollTop: focalizar}, 1000);
		})
	
	
	
	$('#menuEmpresa').click(function(){	
	
	$('#soluciones').load('empresa.html');
		var focalizar = $('body').position().top;
$('#soluciones').animate({scrollTop: focalizar}, 1000);
		})
		
		
		
	
	
	
	
})

