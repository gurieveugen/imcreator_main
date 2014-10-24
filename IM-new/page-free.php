<?php
/*
 * @package WordPress
 * @subpackage HivistaSoft_Theme
 * Template Name: Free page
*/
?>
<?php

query_posts( 'category_name=free' );
?>
<? get_header(); ?>

<?php global $matrix_cat_str; ?>
<!-- main -->
<div id="main">
	<div class="main-holder">

		<!-- content -->
		<?php
		$matrix_cat = explode(',', $matrix_cat_str);
		$cat_id = get_query_var('cat');
        ?>

		<?php if ( in_array($cat_id, $matrix_cat) ) : ?>
            <?php // matrix category header ?>            
    		<div class="heading-row">
    			<?php
                $mcat = get_category($cat_id);                
                $cat_posts = get_posts("posts_per_page=1&category={$cat_id}&meta_key=use_as_featured&meta_value=".$mcat->name);
                if ( count($cat_posts) < 1 )
                    $cat_posts = get_posts("posts_per_page=1&orderby=rand&category={$cat_id}");
                
                foreach ( $cat_posts as $cat_post ) :
                    $cat_post_id = $cat_post->ID;                
                    $cat_post_creator = get_post_meta($cat_post_id, 'creator', true);
                    $cat_post_creator_link = get_post_meta($cat_post_id, 'creator_link', true);
                    $cat_post_img = get_featured_image_id($cat_post_id);
                endforeach;
                echo "<!--<pre>";
                var_dump($cat_post_id);
                echo "</pre>-->";
                ?>
    			<div class="flexible-block">
    				<div class="overlay">&nbsp;</div>
                    <?php if ($cat_post_img) : ?>
                        <?php echo get_the_post_thumbnail( $cat_post_id, array(99999, 490) ); ?>
                    <?php endif; ?>
    			</div>
    
    			<div class="text">
    				<div class="holder">
	    				<span class="new-ico">new!</span>
	    				<h1><? echo single_cat_title('', false); ?></h1>
	                    <?php
	                    $cat_description = category_description();
	                    if ( ! empty( $cat_description ) )
	                        echo  $cat_description;
	                    ?>				
	    				<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
	    					<div id="search">
	    						<input type="text" value="Search" onclick="this.value='';" name="s" id="s" />		
	    						<input type="hidden" name="cat" value="<?php echo $matrix_cat_str; ?>" />					<input type="submit" value="Search">
	    					</div>
	    				</form>
	                    <?php if ( (strlen($cat_post_creator) != 0) && (strlen($cat_post_creator_link) !=0 ) ) : ?>
	    				    <div class="author"><a href="<?php echo $cat_post_creator_link; ?>"><span>pic by <?php echo $cat_post_creator; ?></span></a></div>
	                    <?php endif; ?>
    				</div>
    			</div>						
    		</div>
            <script type="text/javascript">
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
                        jQuery('.flexible-block').css({'position':'relative','margin-left': -res, 'margin-right': -res});
    					var img_height = jQuery('.flexible-block img').height(); 
                        /*jQuery('.flexible-block img').css({'margin-top': -img_height/3});*/
    					jQuery('.flexible-block img').css({'margin-top': -img_height/7});
                        jQuery('.flexible-block img').css({'display':'block'}).animate({'opacity': '1'}, 1000);
                        jQuery('.flexible-block .overlay').css({'display':'block'}).animate({'opacity': 0.3}, 2000);
                    }
                }
                
                jQuery(document).ready(function(){                
                    width_eval();
                });              
                jQuery(window).resize(function(){
                    width_eval();
                });  
            </script>

			<?php
			$cat = get_category( $cat_id );
			$cat_parent = $cat->category_parent;
            $sub_cats = get_categories('parent='.$cat_id);

			// main category 
			if ( /* $cat_parent == 0 || */ count($sub_cats) > 0 ) :
				//$sub_cats = get_categories('parent='.$cat_id);

				// print sub-categories of main category
				//if ( count($sub_cats) > 0 ) : ?>
                    <div class="box-holder">
                    <h2>Collections</h2>
					<?php
					foreach ( $sub_cats as $sub_cat ) :
						$s_c_id = $sub_cat->term_id;
						$s_c_name = $sub_cat->name;
                        $s_c_count = 0;
						$s_c_count = wp_get_cat_postcount($s_c_id);
						$s_c_options = $wpdb->get_results( "SELECT option_value FROM ".$wpdb->prefix."options WHERE option_name = 'IM_category_custom_".$s_c_id."'");						
						/*$s_c_img = '';						
						if ( $s_c_options ) :
							$s_c_options_array = unserialize( $s_c_options[0]->option_value );
							$s_c_img = $s_c_options_array[0][2];
						endif;*/						
						$s_c_permalink = get_category_link($s_c_id);
						$items_count = $s_c_count.' items';
						if ( $s_c_count == 1 ) $items_count = $s_c_count.' item';                        
						?>
						<div id="cat-<?php echo $s_c_id; ?>" class="box">
							<a href="<?php echo $s_c_permalink; ?>" class="text">
								<span class="holder">
	                                <span class="num-item"><?php echo $items_count; ?></span>
	                                <h3><?php echo $s_c_name; ?></h3>
								</span>
                            </a>							
                            <?php
            				if ( (strlen($cpost_creator) != 0) && (strlen($cpost_creator_link) !=0 ) ) : ?>
            				<!--<span class="author"><a href="<?php echo $cpost_creator_link; ?>" target="_blank">pic by <?php echo $cpost_creator; ?></a></span>-->
            				<?php endif; ?>
            				<ul class="category-slider">
                                <?php $cposts = get_posts("posts_per_page=-1&category={$s_c_id}&meta_key=use_as_featured&meta_value=yes&orderby=rand");
                                if ( count($cposts) < 1 )
                                    $cposts = get_posts("posts_per_page=10&category={$s_c_id}&orderby=rand");
                                $class = 'class="active"';
                                $counter = 0;
                                foreach ( $cposts as $cpost ) :
                                    $cpost_id = $cpost->ID;
                                    $cpost_creator = get_post_meta($cpost_id, 'creator', true);
                                    $cpost_creator_link = get_post_meta($cpost_id, 'creator_link', true);
                                    $cpost_img = get_featured_image_id($cpost_id);
                                    if ($counter > 0) $class = '';
                                    ?>
                                    <li <?php echo $class; ?>>
                                    <?php if ( !empty($cpost_img) ) : ?>
        								<img src="<?php echo get_thumb( $cpost_img, 450, 325, true ) ; ?>" alt="<?php echo $s_c_name; ?>">
        							<?php endif; ?>
                                    <?php if ( (strlen($cpost_creator) != 0) && (strlen($cpost_creator_link) !=0 ) ) : ?>
                    				<span class="author"><a href="<?php echo $cpost_creator_link; ?>" target="_blank">pic by <?php echo $cpost_creator; ?></a></span>
                    				<?php endif; ?>
      					       </li>
                                <?php $counter++; ?> 
                                <?php endforeach; ?>
            				</ul>
                            <script type="text/javascript">
                                var cycleConfigured<?php echo $s_c_id; ?> = false;
                                                                
                                    jQuery("#cat-<?php echo $s_c_id; ?>").hover(
                                        function(){                            
                                            if(cycleConfigured<?php echo $s_c_id; ?>) {
                                                jQuery(this).find("ul").cycle('resume');
                                                jQuery(this).find("ul").cycle('next');                                                    
                                            } else {
                                                jQuery(this).find("ul").cycle({
                                                    fx:     'fade',
                                                    speed:   100,
                                                    timeout: 900,
                                                    pause:   0,
                                                    after: function(el, next_el) {
                                                        jQuery(next_el).addClass('active');
                                                    },
                                                    before: function(el) {
                                                        jQuery(el).removeClass('active');
                                                    }
                                                });
                                                jQuery(this).find("ul").cycle('next');
                                                cycleConfigured<?php echo $s_c_id; ?> = true;
                                            }
                                        },
                                        function(){                            
                                            jQuery(this).find("ul").cycle('pause');
                                        }
                                    ).trigger("hover");
                                
                            </script>                           
						</div>
					<?php endforeach; ?>
                    <?php
                        if(has_post_thumbnail(get_the_id()))
                        {
                            ?>
                        <div class="box">
                            <a class="text" href="/button-maker">
                                <span class="holder">
                                    <h3>Button Maker</h3>
                                </span>
                            </a>
                            <?php //the_post_thumbnail(array(450,325), array('class'=> 'img')); ?>
                            <?php //echo get_thumb( get_the_ID(), 450, 325, true ) ; ?>
                            <img src="<?php echo get_thumb( get_featured_image_id(get_the_ID()), 450, 325, true ) ; ?>" alt="Button Maker">
                        </div>
                        <?php
                        }
                        ?>
					</div>                                       
				<?php //endif; ?>

				<?php // waterfall of post ?>
				<div class="recent-block">
					<h2>Recent</h2>
					<h6>Third Party Intellectual Property Rights Disclaimer- Please read carefully and follow the license terms with respect to each image. Use of images is at the sole responsibility of the user and IM Creator takes no responsibly or liability with respect to any such use.</h6>
					<div class="images-box">
                        <div id="ajax-loading">
                            <img width="60" height="60" src="<?php bloginfo('template_url'); ?>/images/loading.gif" alt="loading">
                        </div>
                        <?php $_SESSION['im_banner_counter'] = 0; ?>
						<?php display_waterfall_of_posts( $cat_id ); ?>
					</div>
				</div>

			<?php 
			// sub-category
			else :
            ?>
				<div class="images-box">
                    <div id="ajax-loading">
                        <img src="<?php bloginfo('template_url'); ?>/images/loading.gif" alt="loading">
                    </div>
                    <?php $_SESSION['im_banner_counter'] = 0; ?>
					<?php display_waterfall_of_posts( $cat_id ); ?>
				</div>
				<?php
				$sub_cats = get_categories('parent='.$cat_parent.'&exclude='.$cat_id);
				if ( count($sub_cats) > 0 ) : ?>
					<div class="recent-block">
						<h2>Other</h2>
						<h6>Third Party Intellectual Property Rights Disclaimer- Please read carefully and follow the license terms with respect to each image. Use of images is at the sole responsibility of the user and IM Creator takes no responsibly or liability with respect to any such use.</h6>
						<div class="box-holder">
							<?php foreach ( $sub_cats as $sub_cat ) :
								$s_c_id = $sub_cat->term_id;
								$s_c_name = $sub_cat->name;
								$s_c_count = wp_get_cat_postcount($s_c_id);
								$s_c_options = $wpdb->get_results( "SELECT option_value FROM ".$wpdb->prefix."options WHERE option_name = 'IM_category_custom_".$s_c_id."'");
								/*$s_c_img = '';
								if ( $s_c_options ) :
									$s_c_options_array = unserialize( $s_c_options[0]->option_value );
									$s_c_img = $s_c_options_array[0][2];
								endif;*/
								$s_c_permalink = get_category_link($s_c_id);
								$items_count = $s_c_count.' items';
								if ( $s_c_count == 1 ) $items_count = $s_c_count.' item';
                                if ( $s_c_count == 1 ) $items_count = $s_c_count.' item';
                                ?>
                                
                                <div id="cat-<?php echo $s_c_id; ?>" class="box">
        							<a href="<?php echo $s_c_permalink; ?>" class="text">
        								<span class="holder">
        	                                <span class="num-item"><?php echo $items_count; ?></span>
        	                                <h3><?php echo $s_c_name; ?></h3>
        								</span>
                                    </a>							
                                    <?php
                    				if ( (strlen($cpost_creator) != 0) && (strlen($cpost_creator_link) !=0 ) ) : ?>
                    				<!--<span class="author"><a href="<?php echo $cpost_creator_link; ?>" target="_blank">pic by <?php echo $cpost_creator; ?></a></span>-->
                    				<?php endif; ?>
                    				<ul class="category-slider">
                                        <?php $cposts = get_posts("posts_per_page=-1&category={$s_c_id}&meta_key=use_as_featured&meta_value=yes&orderby=rand");
                                        if ( count($cposts) < 1 )
                                            $cposts = get_posts("posts_per_page=10&category={$s_c_id}&orderby=rand");
                                        
                                        foreach ( $cposts as $cpost ) :
                                            $cpost_id = $cpost->ID;
                                            $cpost_creator = get_post_meta($cpost_id, 'creator', true);
                                            $cpost_creator_link = get_post_meta($cpost_id, 'creator_link', true);
                                            $cpost_img = get_featured_image_id($cpost_id);
                                            ?>
                                            <li>
                                            <?php if ( !empty($cpost_img) ) : ?>
                								<img src="<?php echo get_thumb( $cpost_img, 450, 325, true ) ; ?>" alt="<?php echo $s_c_name; ?>">
                							<?php endif; ?>
                                            <?php if ( (strlen($cpost_creator) != 0) && (strlen($cpost_creator_link) !=0 ) ) : ?>
                            				<span class="author"><a href="<?php echo $cpost_creator_link; ?>" target="_blank">pic by <?php echo $cpost_creator; ?></a></span>
                            				<?php endif; ?>
              					       </li>
                                        <?php endforeach; ?>
                    				</ul>
                                    <script type="text/javascript">
                                        var cycleConfigured<?php echo $s_c_id; ?> = false;
                                                                        
                                            jQuery("#cat-<?php echo $s_c_id; ?>").hover(
                                                function(){                            
                                                    if(cycleConfigured<?php echo $s_c_id; ?>) {
                                                        jQuery(this).find("ul").cycle('resume');
                                                    } else {
                                                        jQuery(this).find("ul").cycle({
                                                            fx:     'fade',
                                                            speed:   200,
                                                            timeout: 1500,
                                                            pause:   0,
                                                        });
                                                        cycleConfigured<?php echo $s_c_id; ?> = true;
                                                    }
                                                },
                                                function(){                            
                                                    jQuery(this).find("ul").cycle('pause');
                                                }
                                            ).trigger("hover");
                                        
                                    </script>                           
        						</div>
							<?php endforeach; ?>						
						</div>
					</div>
				<?php endif; ?>		
			<?php endif; ?>		

		<?php else : ?>
			<div id="content">
				<div class="headings-holder">
					<h1>
						<? echo single_cat_title('', false) ?>
					</h1>
					<div class="topic-info">
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
									<div class="topic-content">
						<?php
							
							include('loop.php');
						?>
					</div>

					<div class="pagination-holder">
						<div class="holder">
							<div class="frame">
								<? wp_pagenavi(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- sidebar -->
			<? get_sidebar(); ?>
		<?php endif; ?>
	</div>
</div>
<? get_footer(); ?>