<?php
/**
 *
 * @package WordPress
 * @subpackage HivistaSoft_Theme
 */
get_header();

while ( have_posts() ) : the_post(); ?>

<div id="main">	

	<div class="main-holder">

		<?php

		$matrix_cat = $TO->get_option('check-cat');

		$matrix_cat = explode(',', $matrix_cat);		



		if (in_category($matrix_cat)) : ?>



		<div class="post-block">

            <?php $download_link = get_post_meta(get_the_ID(), 'download_link', true); ?>

			<div class="image-holder">

                <?php if ( strlen($download_link)) { ?>

                    <a href="<?php echo $download_link; ?>" target="_blank">

                <?php } ?>

				<?php if ( has_post_thumbnail() ) {

					the_post_thumbnail( array(620,9999));

				} ?>

                <?php if ( strlen($download_link)) { ?>

                    </a>

                <?php } ?>

			</div>

			<div class="text-holder">

				<div class="heading-row">

					<h1 class="entry-title"><?php the_title(); ?></h1>

				</div>

				<?php $creator = get_post_meta(get_the_ID(), 'creator', true);

				$creator_link = get_post_meta(get_the_ID(), 'creator_link', true);

				if ( (strlen($creator) != 0) && (strlen($creator_link) !=0 ) ) : ?>

				<a href="<?php echo $creator_link; ?>" target="_blank" class="author">by <?php echo $creator; ?></a>

				<?php endif; ?>

				

				<div class="entry-content">

					<?php the_content();?>

				</div>

                <?php $customize_template = get_post_meta(get_the_ID(), 'customize_template', true); ?>

                <?php $icons = get_post_meta(get_the_ID(), 'icons', true); ?>

                

                <?php if ($customize_template == "yes") : ?>

                

                    <?php $customize_template_link = get_post_meta(get_the_ID(), 'customize_template_link', true); ?>

                    <?php if ( strlen($customize_template_link) ) : ?>

                        <a href="<?php echo $customize_template_link; ?>" class="customize-template" target="_blank">Customize Template</a>

                    <?php endif; ?>

                    

                <?php elseif ($icons == 'yes') : ?>

                

                    <?php $download_ai_link = get_post_meta(get_the_ID(), 'download_ai_link', true); ?>

                    <?php if ( strlen($download_ai_link) ) : ?>

                        <a href="<?php echo $download_ai_link; ?>" class="icon1" target="_blank">Download .ai</a>

                    <?php endif; ?>

                    

                    <?php $download_jpegs_link = get_post_meta(get_the_ID(), 'download_jpegs_link', true); ?>

                    <?php if ( strlen($download_jpegs_link) ) : ?>

                        <a href="<?php echo $download_jpegs_link; ?>" class="icon2" target="_blank">Download PNGs</a>

                    <?php endif; ?>

                    

                    <?php $download_psds_link = get_post_meta(get_the_ID(), 'download_psds_link', true); ?>

                    <?php if ( strlen($download_psds_link) ) : ?>

                        <a href="<?php echo $download_psds_link; ?>" class="icon3" target="_blank">Download PSDs</a>

                    <?php endif; ?>

                    

                <?php else : ?>

                 

    				<?php if ( strlen($download_link)) : ?>

    				    <a href="<?php echo $download_link; ?>" class="download" target="_blank">Download</a>

    				<?php endif;?>

    				<?php $cc_link = get_post_meta(get_the_ID(), 'cc_link', true);

    				if ( strlen($cc_link)) : ?>

    				    <a href="<?php echo $cc_link; ?>"><img src="<?php bloginfo('template_url'); ?>/images/text-creative-commons.gif" class="creative-commons" alt="image description"></a>

    				<?php endif;?>

    				<p>

    					Free for commercial use,

    					<br>

    					Some Rights Reserved.

    					<br>

    					Please keep attribution to the creator.

    				</p>

                    

                <?php endif; ?>

				<div class="tags">

					<?php the_tags('','',''); ?> 

				</div>
				<?php $contact_page = get_page_by_title( 'Report An Image', 'OBJECT', 'page' ); ?>
                <?php if ( $contact_page ) : ?>
                    <?php $permalink = get_permalink($contact_page->ID) .'?pp='. get_permalink($post->ID); ?>
				    <a href="<?php echo $permalink; ?>" class="btn-gray">Report this image</a>                
                <?php endif; ?>

			</div>

		</div>

		<?php $post_cats = get_the_category();

        $post_cats[0]->cat_name;

		/*foreach ( $post_cats as $post_cat ) :

			$c = get_category($post_cat);

			$cat_name = $c->name;

		endforeach;*/

		?>		

		<div class="recent-block">

			<h2><?php echo $post_cats[0]->cat_name;; ?></h2>

			<div class="images-box">

                <div id="ajax-loading">

                        <img src="<?php bloginfo('template_url'); ?>/images/loading.gif" alt="loading">

                    </div>

                    <?php $_SESSION['im_banner_counter'] = 0; ?>

				<?php display_waterfall_of_posts ( $post_cats[0]->term_id, get_the_ID() ); ?>

				

			</div>

		</div>

	</div>	

		<?php else : ?>



		<!-- content -->

			<div id="content">

				<div class="headings-holder">

					<h1><? the_title(); ?></h1>

					<div class="topic-info">

						<div class="tags-holder">

							<p><span class="date"><a href="<? the_permalink() ?>" rel="bookmark"><span class="topic-date"><? the_time('j.m.y'); ?></span></a> By <span class="topic-author"><a href="<?the_author_url();?>" target="_blank" ><? the_author() ?></a></span></span>

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

						<div class="<?=($sQuote)?'text':''?> content-column-right">

							<? the_content(); ?>

							<? wp_link_pages( array( 'before' => '<div class="page-link"> Pages:', 'after' => '</div>' ) ); ?>

						</div>

					</div>

				</div>

			</div>

			<!-- sidebar -->

			<? get_sidebar(); ?>

		</div>

        <?php if (in_category("blog") || in_category("create-a-website")) : ?>

		<div id="nav-below" class="pages-navigation">

			<div class="nav-previous-holder"><? previous_post_link('&laquo; %link', '%title'); ?></div>

			<div class="nav-next-holder"><? next_post_link('%link', '%title &raquo;'); ?></div>

		</div>

        <?php endif; ?>

        

        <?php $main_cat = get_category_by_slug('blog');

        if ($main_cat) {

            $main_cat_id = $main_cat->term_id;                    

            $cat_arr = array();

            $cat_arr[] = $main_cat_id;

            $cats_chield = get_categories('child_of='.$main_cat_id.'&hide_empty=0');                    

            if ($cats_chield) {

                foreach($cats_chield as $cat) {

                    $cat_arr[] = $cat->term_id;

                }

            }

        }

        if (in_category($cat_arr))

            comments_template( '', true );

        ?>

        <?php endif; ?>

	

</div>

<? endwhile; ?>

<? get_footer(); ?>