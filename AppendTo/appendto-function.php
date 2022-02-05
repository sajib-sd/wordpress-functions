<?php


function nyg_custom_script(){
?>
	<script>
		jQuery(function($){
// 			$( "#header_main .header-social-section" ).hide();
			$('.av-burger-menu-main').on('click', function() {
				$( "#header_main .header-social-section" ).appendTo( $( ".av-burger-overlay #av-burger-menu-ul" ) );
				$( "#header_main .header-social-section" ).show();
			})
		});
	</script>
<?php
}
add_action('wp_footer', 'nyg_custom_script', 999);