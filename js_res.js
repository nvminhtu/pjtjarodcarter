
jQuery.noConflict();
jQuery(document).ready(function($) {
   $('#menu-icon-btn').click(function(){
		$('#menu-top_menu').slideToggle();
	});
});



jQuery(window).bind('load resize',function($){
	
	//check header
	
	var w_header = jQuery('#header').outerWidth();
	var h_header = w_header*208/947;
	//alert("sdfsdf");
	jQuery('#header').css('height',h_header);
});

jQuery(document).ready(function($) {
  $('#footer').click(function(){
		$('#menu-top_menu').slideToggle();
	});
	$('#header').click(function(){
		window.location.href = "http://www.drjarodcarter.com/";
	});
});


jQuery(window).bind('load resize',function($){
	init_size($);
});
function init_size($)
{
		screen_w = jQuery(window).width();

		if(screen_w < 640){
			jQuery("#menu-top_menu").css("display","none");
			//alert("screen_w < 640");
		}
		else{
//alert("screen_w >640");
			jQuery("#menu-top_menu").css("display","block");
			
		}	
}

