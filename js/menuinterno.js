// JavaScript Document
$(document).ready(function(e) {
	alert("inicio");
	
		$("#btn1").click(function(){
		alert("1");
		$('#menuTab').load('almacen.html');
		
		});    
		
		$("#tab-2").click(function(){
			alert("2");
		$('#menuTab').load('administracion.html');});  
		
		$('#tab-3').click(function(){
		$('#menuTab').load('obras.html');}); 
		
		$('#tab-4').click(function(){
		$('#menuTab').load('ventas.html');});
		
		
		$('#tab-5').click(function(){
		$('#menuTab').load('nomina.html');});
		
		
		$('#tab-6').click(function(){
		$('#menuTab').load('recHumanos.html');});
		
		
		$('#tab-7').click(function(){
		$('#menuTab').load('sincronizador.html');});
		
		
});