<?php
/**
 * This file adds the Landing template to the Christianshavns Færgecafe Theme.
 *
 * @author mono voce aps
 * @package Crone
 * @subpackage Customizations
 */

/*
Template Name: Events
*/

//* Add custom body class to the head
add_filter( 'body_class', 'crone_add_body_class' );
function crone_add_body_class( $classes ) {

   $classes[] = 'events';
   return $classes;
   
}

//* Remove breadcrumbs
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

//* Force full width content layout
add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

// Events and featured event
add_action( 'genesis_after_entry', 'cafe_events', 15 );
function cafe_events() {
	$f_headline = get_field( 'headline', 'option' );  //featured headline
	$f_image = get_field( 'udvalgt_event_billede', 'option' );  //featured image
	$f_text = get_field( 'udvalgt_event_text', 'option' );  //featured text
	$f_url = get_field( 'udvalgt_event_link', 'option' );  //Featured url
	$hide = get_field( 'skjul_event', 'option' );  //featured headline
	
	echo '<aside class="event-table">';
	if ( $f_headline ) {
		echo '<h2>' . $f_headline . '</h2>';
	}
	if( have_rows('event', 'option') ) {
		echo '<table><tbody>';
		
		
		while( have_rows('event', 'option') ): the_row();
			if( have_rows('skjul_event') ){
			}else{
			echo '<tr>';
				echo '<td><time itemprop="date" datetime="';
						the_sub_field('dato');
					echo '">';
					the_sub_field('dato');
					echo '</time>';
				echo '</td>';
				echo '<td>';
					echo '<span itemprop="name"><a href="';
					the_sub_field('event_link');
					echo '">';
					the_sub_field('event_navn');
					echo '</a></span>';
				echo '</td>';
				echo '<td>';
					if( have_rows('sold_out') ){
					echo '<span class="button sold_out">' . __( 'Sold out', 'mono' ) . '</span>';
						}else{
					echo '<a href="';
					the_sub_field('billet');
					echo '" class="button" target="_blank">';
					echo '' . __( 'Buy ticket', 'mono' ) . '';
					echo '</a>';
					}
				echo '</td>';
			echo '</tr>';
			}
		endwhile;
		
		echo '</table></tbody>';
	}
	echo '</aside>';
}

//* check if the flexible content field has rows of data
add_action( 'genesis_before_footer', 'mono_repeater_events', 5 );
function mono_repeater_events() {
	$events = get_field('event_preview');
	
	if($events) {
		echo '<div class="gridcontainer dark_background event_list">
				<div class="wrap">';
		foreach($events as $event ) {
					echo '<div class="coll3">';
						if( $event['titel']){
							echo '<h2>' . $event['titel']. '</h2>';
						}
						if( $event['picture']){
							echo '<img src="' . $event['picture']. '">';
						}
						if( $event['short_text']){
							echo '<div class="event_text">' . $event['short_text']. '</div>';
						}
						if( $event['page_link']){
							echo '<a href="' . $event['page_link']. '" class="button event_btn">' . $event['page_link_text']. '</a>';
						}
						if( $event['booking_url']){
							echo '<a href="' . $event['booking_url']. '" class="button booking_btn" target="_blank">' . $event['booking_button_text']. '</a>';
						}
					echo '</div>';
		}
		echo '	</div>
		  	  </div>';
	}
	
}


//* check if the flexible content field has rows of data
add_action( 'genesis_before_footer', 'mono_flexible_gridset_events', 5 );
function mono_flexible_gridset_events() {
	
	if( have_rows('content_events') ):

		// loop through the rows of data
    	while ( have_rows('content_events') ) : the_row();

        	if( get_row_layout() == 'full_width_column' ):
				
				if (get_sub_field('hide')){
					}else{
					
				if (get_sub_field('dark_background')){
				echo '<div class="gridcontainer dark_background">';
					}else{
				echo '<div class="gridcontainer">';
				}
				
				echo '<div class="wrap">';
					echo '<div class="coll1">';
						if ( get_sub_field('headline') ){
							echo '<h2 class="entry-title">';
        					the_sub_field('headline');
							echo '</h2>';
						}else{
						}
						the_sub_field('content');
					echo '</div>';
				echo '</div>';
				echo '</div>';
				
				}
				
        	elseif( get_row_layout() == 'two_columns' ):
			
				if (get_sub_field('hide')){
					}else{
						
				if (get_sub_field('dark_background')){
				echo '<div class="gridcontainer dark_background">';
					}else{
				echo '<div class="gridcontainer">';
				}
				
				echo '<div class="wrap">';
					echo '<div class="coll2">';
						if ( get_sub_field('headline_left') ){
							echo '<h2 class="entry-title">';
        					the_sub_field('headline_left');
							echo '</h2>';
						}else{
						}
						if ( get_sub_field('image_left') ){
							echo '<img src="';
        					the_sub_field('image_left');
							echo '">';
						}else{
						}
						the_sub_field('content_left');
					echo '</div>';
					echo '<div class="coll2">';
						if ( get_sub_field('headline_right') ){
							echo '<h2 class="entry-title">';
        					the_sub_field('headline_right');
							echo '</h2>';
						}else{
						}
						if ( get_sub_field('image_right') ){
							echo '<img src="';
        					the_sub_field('image_right');
							echo '">';
						}else{
						}
						the_sub_field('content_right');
					echo '</div>';
				echo '</div>';
				echo '</div>';
				
				}
				
			elseif( get_row_layout() == 'three_columns' ):
				
				if (get_sub_field('hide')){
					}else{
						
				if (get_sub_field('dark_background')){
				echo '<div class="gridcontainer dark_background">';
					}else{
				echo '<div class="gridcontainer">';
				}
				
				echo '<div class="wrap">';
					echo '<div class="coll3">';
        				if ( get_sub_field('headline_left') ){
							echo '<h2 class="entry-title">';
        					the_sub_field('headline_left');
							echo '</h2>';
						}else{
						}
						if ( get_sub_field('image_left') ){
							echo '<img src="';
        					the_sub_field('image_left');
							echo '">';
						}else{
						}
						the_sub_field('content_left');
					echo '</div>';
					echo '<div class="coll3">';
						if ( get_sub_field('headline_center') ){
							echo '<h2 class="entry-title">';
        					the_sub_field('headline_center');
							echo '</h2>';
						}else{
						}
						if ( get_sub_field('image_center') ){
							echo '<img src="';
        					the_sub_field('image_center');
							echo '">';
						}else{
						}
						the_sub_field('content_center');
					echo '</div>';
					echo '<div class="coll3">';
						if ( get_sub_field('headline_right') ){
							echo '<h2 class="entry-title">';
        					the_sub_field('headline_right');
							echo '</h2>';
						}else{
						}
						if ( get_sub_field('image_right') ){
							echo '<img src="';
        					the_sub_field('image_right');
							echo '">';
						}else{
						}
						the_sub_field('content_right');
					echo '</div>';
				echo '</div>';
				echo '</div>';
				
				}
				
			elseif( get_row_layout() == 'four_columns' ):
			
				if (get_sub_field('hide')){
					}else{
						
				if (get_sub_field('dark_background')){
				echo '<div class="gridcontainer dark_background">';
					}else{
				echo '<div class="gridcontainer">';
				}

				echo '<div class="wrap">';
					echo '<div class="coll4">';
        				the_sub_field('gridset_4_1');
					echo '</div>';
					echo '<div class="coll4">';
						the_sub_field('gridset_4_2');
					echo '</div>';
					echo '<div class="coll4">';
						the_sub_field('gridset_4_3');
					echo '</div>';
					echo '<div class="coll4">';
						the_sub_field('gridset_4_4');
					echo '</div>';
				echo '</div>';
				echo '</div>';
				}
				
			elseif( get_row_layout() == 'full_width_area' ):
				
				if (get_sub_field('hide')){
					}else{
				echo '<div class="gridcontainer">';
				}
					echo '<div class="coll1">';
						the_sub_field('full_width');
					echo '</div>';
				echo '</div>';
				
				
        	endif;

    	endwhile;

	else :

    // no layouts found

	endif;

}



//* Run the Genesis loop
genesis();
