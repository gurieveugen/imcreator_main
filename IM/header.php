<?php
/*
 * @package WordPress
 * @subpackage HivistaSoft_Theme
 */
Global $TO;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>

		<?php if (is_front_page ()) : ?>


 <script>
   // Allows for multiple-domain tracking
   _udn = ".imcreator.com";
   </script>


<!-- Google Analytics Content Experiment code -->
<script>function utmx_section(){}function utmx(){}(function(){var
k='42537450-2',d=document,l=d.location,c=d.cookie;
if(l.search.indexOf('utm_expid='+k)>0)return;
function f(n){if(c){var i=c.indexOf(n+'=');if(i>-1){var j=c.
indexOf(';',i);return escape(c.substring(i+n.length+1,j<0?c.
length:j))}}}var x=f('__utmx'),xx=f('__utmxx'),h=l.hash;d.write(
'<sc'+'ript src="'+'http'+(l.protocol=='https:'?'s://ssl':
'://www')+'.google-analytics.com/ga_exp.js?'+'utmxkey='+k+
'&utmx='+(x?x:'')+'&utmxx='+(xx?xx:'')+'&utmxtime='+new Date().
valueOf()+(h?'&utmxhash='+escape(h.substr(1)):'')+
'" type="text/javascript" charset="utf-8"><\/sc'+'ript>')})();
</script><script>utmx('url','A/B');</script>
<!-- End of Google Analytics Content Experiment code -->


		<?php endif; ?>
						
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title><? wp_title('|',true,'right'); ?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="alternate" hreflang="es" href="http://es.imcreator.com/" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-1.4.4.min_2.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/main.js"></script>
		<?php if (is_singular() && get_option('thread_comments')) wp_enqueue_script('comment-reply'); wp_head(); ?>









	</head>
	<body <? body_class(); ?>>
		<!-- wrapper -->
		<div id="wrapper">
			<div class="w1">
				<div class="w2">
					<!-- container -->
					<div id="container">
						<!-- header -->
						<div id="header">
							<div class="header-holder">
								<strong class="logo"><a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a></strong>
								<? get_top_menu(); ?>
							</div>
							<? if (!is_front_page ()) : ?>
									<div class="path-holder">
		                                <?php if(function_exists('bcn_display')){ bcn_display();}?>
	                           	 	</div>
	                        <? endif; ?>
							<?php if (is_front_page ()) : ?>
								<div class="header-content">
										<div class="header-info">
											<h1 style="padding-left:41px;"><?=$TO->get_option('title','hptop');?></h1>
											<p class="aligncenter"><?=$TO->get_option('subtitle','hptop');?></p>
											<span class="btn-holder"><a href="<?=$TO->get_option('link','hptop');?>">Start Now</a><a href="http://www.youtube.com/watch?v=s0jlUDatXGs?width=900&height=550" rel="wp-video-lightbox" style="margin-top:10px; background-image:url('http://imcreator.com/wp-content/uploads/2011/06/60_sec_videotour.png');">Video Tour</a></span>
										</div>
										<img src="http://imcreator.com/wp-content/uploads/2011/04/butterflies3.png" width="435" height="498" alt="" class="img-header-content" />
								</div>
							<?php endif; ?>
						</div>