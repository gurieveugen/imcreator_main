<?php

/*

 * @package WordPress

 * @subpackage HivistaSoft_Theme

 */

Global $TO, $matrix_cat_str;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

	<head>
<!-- One Analytics: 
ReTargetting via Google Analytics is enabled by running dc.js instead of ga.js
However, dc.js is an AdWords code that is disabled by AdBlockers
The solution: if an AdBlocker is on, run the original ga.js instead of dc.js (so that GA data is always collected).
The method: By default, gaAdsBlocked=true (i.e. assuming AdBlock is on), so ga.js will run.
The file ./advertising.com changes gaAdsBlocked to false, but this file will only run if AdBlock is off.
  -- One Analytics-->

<script>
var gaAdsBlocked=true;
</script>

<script type="text/javascript" src="http://imcreator.com/wp-content/uploads/2013/01/advertising.js"></script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  var pluginUrl = '//www.google-analytics.com/plugins/ga/inpage_linkid.js';
  _gaq.push(['_require', 'inpage_linkid', pluginUrl]);
  _gaq.push(['_setAccount', 'UA-21520422-1']);
  _gaq.push(['_setAllowLinker', true]);
  _gaq.push(['_addIgnoredRef', 'imcreator.com']);
  _gaq.push(['_addIgnoredRef', 'i-m.co']);
  _gaq.push(['_addIgnoredRef', 'i-m.mx']);  
  _gaq.push(['_addIgnoredRef', '*.appspot.com']);
  _gaq.push(['_setDomainName', 'imcreator.com']);
  _gaq.push(['_trackPageview']);

 
(function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;

	if (gaAdsBlocked==true)
		{
	   ga.src = ('http:' == document.location.protocol ? 'http://ssl' : 'http://www') + '.google-analytics.com/ga.js';
 	   }
    else
       	   {
		   ga.src = ('http:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
        }
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>


<script>

function getCookie(c_name) {
            var i,x,y,ARRcookies=document.cookie.split(";");
            for (i=0;i<ARRcookies.length;i++) {
                x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
                y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
                x=x.replace(/^\s+|\s+$/g,"");
                if (x==c_name) {
                    return unescape(y);
                }
            }
        }


var username=getCookie("expr");
if (!username) {  

var isChromium = window.chrome,
    vendorName = window.navigator.vendor;
if(isChromium !== null && isChromium !== undefined && vendorName === "Google Inc.") {
   
random = Math.random() * 100
if (random < 5){window.location.href='https://www.imxprs.com/?is=5r3w'}
} else {

}


} else { 
   
//do nothing not chrome

}



</script>
		<meta name="p:domain_verify" content="4f697159a05bbbc0f682ddb865379df0"/>				

		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

		<title><? wp_title('|',true,'right'); ?></title>

		<link rel="profile" href="http://gmpg.org/xfn/11" />

		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />		

		<?php if (is_singular() && get_option('thread_comments')) wp_enqueue_script('comment-reply'); wp_head(); ?>       
        
        
<!-- t2gRy23uV8B7YymvYBetl0kVBDU -->



		<?php if (is_front_page ()) : ?>





 <script>

   // Allows for multiple-domain tracking

   _udn = ".imcreator.com";

   </script>










		<?php endif; ?>

		<script type="text/javascript">
		var paged = 1;		
        var imgLoading = true;
        var js_siteurl = "<?php bloginfo('url'); ?>/index.php";
		</script>

        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.cycle.all.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/main.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.total-storage.min.js"></script>
        <?php if (is_page('coupon')) : ?>
        <script src="//platform.twitter.com/widgets.js"></script>
        <script type="text/javascript" src="https://apis.google.com/js/plusone.js">
            {"parsetags": "explicit"}
        </script>
        <?php endif; ?>		

		

		<?php if ( (is_single() && in_category( explode(',', $matrix_cat_str) ) ) || is_category(explode(',', $matrix_cat_str)) || is_tag() ) : ?>



		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/masonry.pkgd.min.js"></script>		

		<script type="text/javascript">

		jQuery(document).ready(function(){            

			jQuery('.images-box').masonry({

				itemSelector: '.box, .box-banner',

				columnWidth: 313,

				isFitWidth: true,

			    gutterWidth:10

			});

			add_height();

			jQuery(window).scroll(function() {

                if ( jQuery(this).scrollTop() >= (jQuery('.images-box').position().top + jQuery('.images-box').height() - (jQuery(window).height() / 2)) && imgLoading)  {

				//if ((jQuery(document).height() - jQuery(window).height() < jQuery(window).scrollTop() + 1200) && imgLoading)  {

                    imgLoading = false;

					++paged;                                       

                    jQuery('#ajax-loading').show();					

					jQuery.ajax({

						url: js_siteurl,

						type: "POST",							

						data: {

							ajax_load_img: "load",

							<?php

							if (is_single() ) {

								$post_cats = $post_cats = get_the_category();

								/*foreach ( $post_cats as $post_cat ) :

									$c = get_category($post_cat);

									$m_cat_id = $c->term_id;

								endforeach; */

								echo 'm_cat_id: '. $post_cats[0]->term_id .',';

							} else if ( is_category(explode(',', $matrix_cat_str)) ) {

								$m_cat_id = get_query_var("cat");

								echo 'm_cat_id: '. $m_cat_id .',';

							} else if ( is_tag() ) {

								echo 'm_tag: "'. get_query_var("tag") .'",';

							}

							?>	

							page: paged,

							<?php if ( strlen( $_GET['s'] ) ) echo "s_val: '". $_GET['s'] ."'" ?>

						},

						success: function(data) {                            

							if (data.length > 0) {
                                data = data.replace(/class="box"/g, 'class="box hidden"');
                                data = data.replace(/class="box-banner/g, 'class="box-banner hidden"');
                                newHTML = jQuery(data);
								jQuery('.images-box').append(newHTML).masonry( 'appended', newHTML, true );
								add_height();
                                var imgLength = jQuery('.images-box .hidden img').length ;
                                var counter = 0;
                                jQuery(".images-box .hidden img").each(function() {
                                    jQuery(this).load(function(){
                                        jQuery(this).animate({ opacity: 1 }, 500, "linear", function(){
                                            jQuery(this).parent().removeClass('hidden');
                                            jQuery(this).parent().parent().removeClass('hidden');
                                        });
                                        counter++;
                                        if(counter == imgLength) {
                                            jQuery('#ajax-loading').hide();
                                            imgLoading = true;
                                        }
                                    });
                                });
							} else {
                                jQuery('#ajax-loading').hide();
							}
						}
					});
				}
			});
		});
		</script>
		<?php endif; ?>

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

<script type="text/javascript">

  (function() {

    var fl = document.createElement('script'); fl.type = 'text/javascript'; fl.async = true;

    fl.src = document.location.protocol + '//filamentapp.s3.amazonaws.com/e8341bca2d60a357ac6f30c57f0f4db7.js';

    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(fl, s);

  })();

</script>

								<div class="header-content">

										<div class="header-info">

											<h1 style="padding-left:41px;"><?=$TO->get_option('title','hptop');?></h1>

											<h2 class="aligncenter"><?=$TO->get_option('subtitle','hptop');?></h2>

											<span class="btn-holder">

												<a href="<?=$TO->get_option('link','hptop');?>">Start Now</a>

<p style="text-align: center;"><a href="http://www.youtube.com/watch?v=s0jlUDatXGs?width=900&height=550&rel=0" rel="wp-video-lightbox"><img class="size-full wp-image-1022 aligncenter" title="" alt="Website builder demo" src="http://imcreator.com/wp-content/uploads/2011/06/60_sec_videotour.png"></a></p>

</span>

										</div>

										<img src="http://imcreator.com/wp-content/uploads/2011/04/butterflies3.png" width="435" height="498" alt="" class="img-header-content" />

								</div>

							<?php endif; ?>

						</div>