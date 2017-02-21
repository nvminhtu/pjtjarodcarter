<?php

// Using hooks is absolutely the smartest, most bulletproof way to implement things like plugins,
// custom design elements, and ads. You can add your hook calls below, and they should take the
// following form:
// add_action('thesis_hook_name', 'function_name');
// The function you name above will run at the location of the specified hook. The example
// hook below demonstrates how you can insert Thesis' default recent posts widget above
// the content in Sidebar 1:
// add_action('thesis_hook_before_sidebar_1', 'thesis_widget_recent_posts');

// Delete this line, including the dashes to the left, and add your hooks in its place.

/**
 * function custom_bookmark_links() - outputs an HTML list of bookmarking links
 * NOTE: This only works when called from inside the WordPress loop!
 * SECOND NOTE: This is really just a sample function to show you how to use custom functions!
 *
 * @since 1.0
 * @global object $post
*/
function custom_remove_defaults($content)
{
    return false;
}

function my_sales_page()
{
    if (is_page('5')) {
        add_filter('thesis_show_sidebars', 'custom_remove_defaults');
        }
}

add_action('template_redirect','my_sales_page');

remove_action('thesis_hook_footer', 'thesis_attribution');
function custom_bookmark_links()
{
    global $post;
?>
<ul class="bookmark_links">
    <li><a rel="nofollow" href="http://delicious.com/save?url=<?php urlencode(the_permalink()); ?>&amp;title=<?php urlencode(the_title()); ?>" onclick="window.open('http://delicious.com/save?v=5&amp;noui&amp;jump=close&amp;url=<?php urlencode(the_permalink()); ?>&amp;title=<?php urlencode(the_title()); ?>', 'delicious', 'toolbar=no,width=550,height=550'); return false;" title="Bookmark this post on del.icio.us">Bookmark this article on Delicious</a></li>
</ul>
<?php
}



/* Custom 404 Hooks */
function custom_thesis_404_title()
{
}

remove_action('thesis_hook_404_title', 'thesis_404_title');
add_action('thesis_hook_404_title', 'custom_thesis_404_title');

function custom_thesis_404_content()
{
?>
<div id="content_box2">
<div id="content2">

<div class="post_box top">
<style type="text/css">
.center { text-align: center; }
.title { color: #728799  ;font-size: 24px !important; margin-bottom: 50px;}
.padding50 { padding: 50px; background: #f1f1f1 !important; text-align: left;}
.enews { margin-top: 50px;}
.enews { margin-top: 50px;}
#content2 { padding: 0px 60px;}
#content2 .post-box{}
.page-404 { margin-bottom: 100px;}
#sidebars { display: none; }
#content {width: auto;float: none;}
#content_box { background: none;}
.post_box { padding-top: 0px;}
</style>
<!-- Content here -->
<div class="page-404 center">
<h3 class="title" style=" margin-top: 50px;">So sorry! The page you are looking for doesn't seem to exist.</h3>
<h3 class="title"><b>But don't leave this page empty-handed...</b></h3>

<!-- Ebook Area-->
<div class="padding50">
<div style="width: 70%;float:left;">
<span class="title">Enter your email below and instantly receive a FREE copy of my e-Book on Cash-Based Physical Therapy and Medicare</span>


<!-- BEGIN: Constant Contact Stylish Email Newsletter Form -->
<div align="left" class="enews">
<form name="ccoptin" action="http://visitor.r20.constantcontact.com/d.jsp" target="_blank" method="post" style="margin-bottom:3px;">

<input type="text" name="ea" size="34" value="" style="font-family:Verdana,Geneva,Arial,Helvetica,sans-serif; font-size:12px; border:1px solid #c2c2c2  ; height:30px; width:69%; padding: 5px; background: #fff;float: left;">
<input type="submit" name="go" value="Send it Now" class="submit"  style="width: auto;font-family:Verdana,Arial,Helvetica,sans-serif; font-size:14px;  border:1px solid #c2c2c2 !important; border-left :none;background: #4868ab !important; color: #fff; padding: 5px 20px;float: left; height:42px;">
<input type="hidden" name="llr" value="7ap9bseab">
<input type="hidden" name="m" value="1104412490780">
<input type="hidden" name="p" value="oi">
<div class="clearfix" style="clear: both;"></div>
</form>
</div>
<!-- END: Constant Contact Stylish Email Newsletter Form -->

</div>
<div style="width: 29%;float:left;">
<img src="<?php echo get_stylesheet_directory_uri(); ?>/custom/images/ebook.png" style="width: 100%;" alt="" />
</div>
<div style="clear: both;"></div>
</div>
</div>
<!-- End content here -->
</div>

</div>



</div>
<?php
}

remove_action('thesis_hook_404_content', 'thesis_404_content');
add_action('thesis_hook_404_content', 'custom_thesis_404_content');
/*---------------------------------*/
/* WIDGETIZED FOOTER - 3 COLUMNS   */

/* register sidebars for widgetized footer */
if (function_exists('register_sidebar')) {
 $sidebars = array(1, 2, 3);
 foreach($sidebars as $number) {
 register_sidebar(array(
 'name' => 'Footer ' . $number,
 'id' => 'footer-' . $number,
 'before_widget' => '',
 'after_widget' => '',
 'before_title' => '<h3>',
 'after_title' => '</h3>'
 ));
 }
}

/*-----------------------*/
/* set up footer widgets */
function widgetized_footer() {
?>
 <div id="footer_setup">

 <div class="footer_items">
 <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 1') ) : ?>
 <?php endif; ?>
 </div>

 <div class="footer_items">
 <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 2') ) : ?>
 <?php endif; ?>
 </div>

 <div class="footer_items">
 <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 3') ) : ?>
 <?php endif; ?>
 </div>

 </div>
<?php
}

add_action('thesis_hook_footer','widgetized_footer');
