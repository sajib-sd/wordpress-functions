<?php


function header_menu_social_link(){
	?>
	<div class="header-social-section">
		<div class="social-list">
			<div class="social-list-fa">
				<ul>
					<li><a class="facebook" href="https://www.facebook.com/" target="_blank">Facebook</a></li>
					<li><a class="youtube" href="https://youtube.com/"  target="_blank">Youtube</a></li>	
					<li><a class="instagram" href="https://www.instagram.com/" target="_blank">Instagram</a></li>
				</ul>
			</div>
		</div>
</div>
<?php
}
add_shortcode("header_social_link","header_menu_social_link");




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

