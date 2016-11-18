/*
Defined in functions.php:
obj jsLocalized
	-> audioPlay
	-> audioPause
	-> adudioFade
*/




// Audio controls
function audioToggle(button){
	var audio = jQuery('#backgroundMusic');
	switch(button.attr('class')){
		case 'playing' :
			button.html(jsLocalized.adudioFade).removeClass('playing').addClass('fadeDown');
			audio.animate({volume: 0}, 1000, function(){
				audio.trigger('pause');
				button.html(jsLocalized.audioPlay).removeClass('fadeDown').addClass('paused');
			});
			break;
		case 'paused' :
			button.html(jsLocalized.adudioFade).removeClass('paused').addClass('fadeUp');
			audio.trigger('play');
			audio.animate({volume: 1}, 1000, function(){
				button.html(jsLocalized.audioPause).removeClass('fadeUp').addClass('playing');
			});
			break;
		default :
			break;
	}
}


jQuery(document).ready(function($) {
	
	// Add background audio and controls
	jQuery('body').append('<audio loop id="backgroundMusic"><source src="/wp-content/themes/Genesis-Faergecafeen-Theme/audio/ferry.ogg"><source src="/wp-content/themes/Genesis-Faergecafeen-Theme/audio/ferry.mp3"></audio>');
	jQuery('#backgroundMusic').volume = 0;
	jQuery('.footer-widgets-3').append('<div id="audiocontrols" class="paused">'+jsLocalized.audioPlay+'</div>');
	jQuery('#audiocontrols').click(function(e){
		e.preventDefault();
		audioToggle(jQuery(this));
	});
	
});