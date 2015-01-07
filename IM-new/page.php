<?php
/**
 *
 * @package WordPress
 * @subpackage HivistaSoft_Theme
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
		<div class="main-holder">

                        <?php if ($imgsrc = get_post_meta(get_the_ID(),'iiframe',true)) {
						echo '<div class="futured-image" alt=""> '.$imgsrc.' </div>';
					}?>

                        <!-- content -->
			<div id="content">
				<div class="headings-holder">
					<h1><? the_title(); ?></h1>
					<div class="topic-info">
						<div class="tags-holder">
							<p><?=the_tags('<span>Tags:</span>'); ?>
							<span class="comments"><a href="<? comments_link(); ?>"><? comments_number('No comments','1 Comment','% Comments'); ?></a></span></p>
						</div>
						<div class="like-holder">
							<iframe src="http://www.facebook.com/plugins/like.php?href=<?php bloginfo('url'); echo $_SERVER['REQUEST_URI']; ?>&amp;layout=button_count&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;height=21"
								scrolling="no" frameborder="0"
								style="border:none; overflow:hidden; width:90px; height:21px;"
								allowTransparency="true">
							</iframe>
						</div>
					</div>
				</div>
				<div class="content-holder">

					<?php if ($imgsrc = get_post_meta(get_the_ID(),'big_image',true)) {
						echo '<img class="futured-image" alt="" src="'.$imgsrc.'" />';
					}?>
					<div class="quote-post post-wrap">
						<?php include( TEMPLATEPATH . '/inc/quote.php' ); ?>
						<div class="text content-column-right">
							<? the_content(); ?>
							<? wp_link_pages(array('before' => '<div class="page-link">Pages:', 'after' => '</div>')); ?>
							<? edit_post_link('Edit', '<span class="edit-link">', '</span>'); ?>
						</div>
					</div>
				</div>
			</div>

            <script>            
            jQuery(document).ready(function(){
            	SocialLocker.init("#locked");
            });
            
            var SocialLocker = (function() {
            	var lock_div, lock_div_identifier;
            	var constructor = function(div) {
            		lock_div = div;
            		lock_div_identifier = jQuery(div).data('lock-id');
            		if(jQuery.totalStorage(lock_div_identifier) == 1) {
            			jQuery(div).show();
            		} else {
            			jQuery(window).load(function(){
            			SocialLocker.lock();
            			twttr.widgets.load();
                			window.twttr.events.bind('tweet', function (event) {
                				SocialLocker.unlock();
                			});                        
            			});
            		}		
            	};
            
            	buildLocker = function() {
            		var overlayHTML = "<div class='lock-overlay' style='height:57px;width:380px'><p>Just Tweet or +1 To Get The Coupon</p><div align='center'><a href=\"https://twitter.com/share\" class=\"twitter-share-button\" data-url=\"http://www.imcreator.com/\" data-text=\"Free Website Builder\">Tweet</a><g:plusone size=\"medium\" href=\"http://www.imcreator.com/\" onendinteraction=\"gCallback\"></g:plusone></div></div>";
            		jQuery(lock_div).append(overlayHTML).show();
                    gapi.plusone.go("lock-overlay");
            	}
            
            	buildUnlocker = function() {
            		jQuery.totalStorage(lock_div_identifier,1);
            		jQuery(lock_div).find('.lock-overlay').slideUp();
            	}
            
            	return {
            	init: constructor,
            	lock: buildLocker,
            	unlock: buildUnlocker
            	}
            }());
            
            function gCallback(jsonParam) {
                if ( jsonParam.type == "confirm") {
                    SocialLocker.unlock();
                }
            }            
            
            </script>
			<!-- sidebar -->
			
<?php if ($imgsrc = get_post_meta(get_the_ID(),'iiframe',true)) {
} else {
get_sidebar();
}?>

		</div>
		<? /* comments_template('', true); */ ?>

	</div>
	<? endif; ?>
<?php if ($imgsrc = get_post_meta(get_the_ID(),'nofooterr',true)) {
						
					} else { get_footer(); } ?>