<?php
/**
 * Template Name: Custom Sales Page
 */
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Jarod Carter</title>
	<link href="<?php echo get_stylesheet_directory_uri(); ?>/css/style.css" rel="stylesheet" />
	<?php wp_head(); ?>
	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-17214953-3']);
	  _gaq.push(['_setDomainName', 'drjarodcarter.com']);
	  _gaq.push(['_trackPageview']);

	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();	  </script>
	<!-- Start Visual Website Optimizer Asynchronous Code -->
	<script type='text/javascript'>
	var _vwo_code=(function(){
	var account_id=43488,
	settings_tolerance=2000,
	library_tolerance=2500,
	use_existing_jquery=false,
	// DO NOT EDIT BELOW THIS LINE
	f=false,d=document;return{use_existing_jquery:function(){return use_existing_jquery;},library_tolerance:function(){return library_tolerance;},finish:function(){if(!f){f=true;var a=d.getElementById('_vis_opt_path_hides');if(a)a.parentNode.removeChild(a);}},finished:function(){return f;},load:function(a){var b=d.createElement('script');b.src=a;b.type='text/javascript';b.innerText;b.onerror=function(){_vwo_code.finish();};d.getElementsByTagName('head')[0].appendChild(b);},init:function(){settings_timer=setTimeout('_vwo_code.finish()',settings_tolerance);this.load('//dev.visualwebsiteoptimizer.com/j.php?a='+account_id+'&u='+encodeURIComponent(d.URL)+'&r='+Math.random());var a=d.createElement('style'),b='body{opacity:0 !important;filter:alpha(opacity=0) !important;background:none !important;}',h=d.getElementsByTagName('head')[0];a.setAttribute('id','_vis_opt_path_hides');a.setAttribute('type','text/css');if(a.styleSheet)a.styleSheet.cssText=b;else a.appendChild(d.createTextNode(b));h.appendChild(a);return settings_timer;}};}());_vwo_settings_timer=_vwo_code.init();
	</script>
	<!-- End Visual Website Optimizer Asynchronous Code -->

</head>
<body>
	<div id="wrap">
		<div id="header">
			<div class="pre-header">
				<h1 class="title lighter">Your Guide To</h1>
				<h1 class="title emphasized">Cash-Based Physical Therapy</h1>
			</div>
			
			<div class="img-name">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/css/images/jarod-carter-name.png" alt="Dr. Jarod Carter" title="Dr. Jarod Carter" />
			</div>
			
			<div class="handed-cash">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/css/images/handed-cash.png" alt="" title="" />
			</div>
			<div class="jarod-carter">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/css/images/jarod-carter-image.png" alt="Jarod Carter" title="Jarod Carter" />
			</div>
		</div>
		
		<div id="inner">
		<?php if(have_posts()): ?>
			<?php while(have_posts()): the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
		<?php endif; ?>
		</div> <!-- end of #inner -->
		
		<div id="sales-footer">
			<?php wp_nav_menu( array('theme_location' => 'sales_page_footer_menu', 'container_id' => 'sales-footer-menu' )); ?>
		</div>
	</div>
	
	<div id="footer">
		<p class="copyright">&copy <?php echo date('Y'); ?> Jarod Carter PT, DPT, MTC</p>
		<?php wp_footer(); ?>
	</div>
</body>
</html>