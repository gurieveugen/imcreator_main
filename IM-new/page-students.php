<?php
/*
 * @package WordPress
 * @subpackage HivistaSoft_Theme
 * Template Name: Students Page
*/
?>

<?php 

if ($imgsrc = get_post_meta(get_the_ID(),'noheaderr',true)) {
						echo '<div class="futured-image" alt=""> '.$imgsrc.' </div>';
					} else { get_header(); }
						
				 ?>

	<? if (have_posts ()) : the_post(); ?>
	<!-- main -->
	<div id="main">
		<div class="image-block inner">
			<div class="image">
				<!--<div class="overlay"></div>-->
	            <?php if ( has_post_thumbnail() ) : ?>	                
                    <?php echo get_the_post_thumbnail(get_the_id(), 'full'); //the_post_thumbnail( array(9999999, 9999999) ); ?>	                
	            <?php endif; ?>
			</div>
            <!--<script type="text/javascript">
                function width_eval(){
                    var ww = jQuery(window).width();
                    if (ww > 980) {  
                        var fw = jQuery('#main').width(); 
                        var res = (ww-fw)/2;  /*alert('window - '+ww+'; #main - '+fw+'; res - '+res);*/
    					if (res == 0) {
    						res = 41;
    					}
    					if (res < 41 && res > 0) {
    						res = (41 - res) * 2;
    					}
    					if (res < 0) {
    						res = (41 - res);
    					}
                        jQuery('.image-block .image').css({'position':'relative','margin-left': -res, 'margin-right': -res});
    					var img_height = jQuery('.image-block .image img').height(); 
                        /*jQuery('.flexible-block img').css({'margin-top': -img_height/3});*/
    					jQuery('.image-block .image img').css({'margin-top': -img_height/7});
                        jQuery('.image-block .image img').css({'display':'block'}).animate({'opacity': '1'}, 1000);
                        jQuery('.image-block .image .overlay').css({'display':'block'}).animate({'opacity': 0.3}, 2000);
                    }
                }
                
                jQuery(document).ready(function(){                
                    width_eval();
                });              
                jQuery(window).resize(function(){
                    width_eval();
                });  
            </script>-->
			<div class="valign-text">
                <div class="holder">
                    <h2>Launch Your Career</h2>
                    <p>Build your website, online portfolio or resume</p>
                </div>
            </div>
        </div>
        <div class="career-block cf">
			<div class="career-promo">
                <h4>30%</h4>
                <h5>STUDENT DISCOUNT</h5>
                <h6>*Discount valid for 1 -year and up subscriptions</h6>
            </div>
            <div class="career-form">
                <?php echo do_shortcode('[contact-form-7 id="11587" title="Student"]'); ?>
            </div>
		</div>
        <?php the_content(''); ?>		
        <?php if ( get_field( "sites" ) ) : ?>
            <div class="blocks-holder">
            <?php while ( has_sub_field( "sites" ) ) : ?>
                <div class="block">
                    <?php if ( get_sub_field("image") ) : ?>
                        <?php if ( get_sub_field("site_url") ) : ?>
                            <a href="<?php the_sub_field("site_url"); ?>" class="image"  target="_blank" title="<?php the_sub_field("name"); ?>">
                        <?php endif; ?>
                        <img src="<?php echo get_thumb( get_sub_field("image"), 250, 233, true ) ; ?>" alt="<?php the_sub_field("name"); ?>" />
                        <?php if ( get_sub_field("site_url") ) : ?>
                            </a>
                        <?php endif; ?>
                    <?php endif; ?>
                    <h5><?php the_sub_field("name"); ?></h5>
                    <?php if ( get_sub_field("site_url") ) : ?>
				        <a href="<?php the_sub_field("site_url"); ?>" target="_blank" title="<?php the_sub_field("name"); ?>"><?php the_sub_field("site_url"); ?></a>
                    <?php endif; ?>
                </div>                
            <?php endwhile; ?>
            </div>
        <?php endif; ?>
	</div>
	<? endif; ?>
<?php if ($imgsrc = get_post_meta(get_the_ID(),'nofooterr',true)) {
						
					} else { get_footer(); } ?>