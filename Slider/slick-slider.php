<?php

// slick slider css js enqueue start 
	add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
	function my_theme_enqueue_styles() {
		wp_enqueue_style( 'slick-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css'); 
		wp_enqueue_style( 'slick-theme-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css'); 
		wp_enqueue_script('slick-js','https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js');	 
	}
add_action("wp_footer","custom_scripts_code",999);
function custom_scripts_code(){
?>
<script>

jQuery(".verdier-icon-section .entry-content-wrapper").addClass("newclass");

jQuery(function($){
	$('.verdier-icon-section .entry-content-wrapper').slick({
		infinite: true,
		slidesToShow:1,
		slidesToScroll:1,
		dots: true,
     	mobileFirst: true,
		arrows: false,
		responsive: [
        	{
            breakpoint:767,
            settings: "unslick"
        },
    ]
	});
});
</script>


<?php
}
