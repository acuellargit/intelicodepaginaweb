function pagina_revelacion(imagenGrande,imagenPeel,url)
{
	 $('body').peelback({
        adImage  : imagenGrande,
        peelImage  : imagenPeel,
        clickURL : url,
        smallSize: 60,
        bigSize: 500,
        gaTrack  : true,
        gaLabel  : '#1 Stegosaurus',
        autoAnimate: true
      });
}