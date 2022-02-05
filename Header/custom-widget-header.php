<?php
function header_widgets_init() {

register_sidebar( array(

    'name' => 'Header',
    'id' => 'header-sidebar1',
    'before_widget' => '<aside class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>',
) );
}
add_action( 'widgets_init', 'header_widgets_init' );


function below_header_sidebar(){
	
 	if ( is_active_sidebar( "header-sidebar1" )) {
	dynamic_sidebar( "header-sidebar1" );
 	}
}
add_action( 'ava_after_main_menu', 'below_header_sidebar' );