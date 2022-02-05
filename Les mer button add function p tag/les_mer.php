<?php


add_action('wp_footer', 'ava_custom_script_mobile_menu', 9999);
function ava_custom_script_mobile_menu() {
?>

<script>
	
(function($) {
	var width = $(window).width();
    if (width < 767) {
        $('.facilisis-column').addClass('scrolled');
    }
	
	var maxLength =250;
	$(".scrolled").each(function(){
		var myStr = $(this).html();
		if($.trim(myStr).length > maxLength){
			var newStr = myStr.substring(0, maxLength);
			var strResult = newStr.replace(/<(p)>/ig,"");
			var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
			$(this).empty().text(strResult);
			$(this).append(' <span class="dot-string">....</span> <a href="javascript:void(0);" class="read-more"> Les mer</a>');
			$(this).append('<span class="more-text">' + removedStr + '</span>');
		}
	});
	$(".read-more").click(function(){
		$(this).siblings(".more-text").contents().unwrap();
		$(this).remove();
		$('.dot-string').remove();
	});
		
})(jQuery);	
	
	</script>
<?php
}