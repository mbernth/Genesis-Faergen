// Image Section Height
var windowHeight = $( window ).height();

				$( '.image-section' ) .css({'height': windowHeight /'2.5' +'px'});
		
				$( window ).resize(function(){
	
				var windowHeight = $( window ).height();
			
				$( '.image-section' ) .css({'height': windowHeight /'2.5' +'px'});
	
});
		