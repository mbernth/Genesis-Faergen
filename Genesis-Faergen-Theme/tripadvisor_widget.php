<div class="tripadvisor">
 


<?php
	$tripadvisor_url = get_field( 'tripadvisor_url', $widget_id );  // url
	if ( $tripadvisor_url ) {
		echo '<a href="' . $tripadvisor_url . '" class="button_icon" target="_blank">Tripadvisor</a>';
	}
?>
 
</div>