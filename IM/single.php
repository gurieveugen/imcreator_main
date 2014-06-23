<?php
/**
 *
 * @package WordPress
 * @subpackage HivistaSoft_Theme
 */

get_header();
while ( have_posts() ) : the_post(); ?>

	<!-- main -->
	<div id="main">
		<div class="main-holder">
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
		<div id="nav-below" class="pages-navigation">
			<div class="nav-previous-holder"><? previous_post_link('&laquo; %link', '%title'); ?></div>
			<div class="nav-next-holder"><? next_post_link('%link', '%title &raquo;'); ?></div>
		</div>

		<? /* comments_template( '', true ); */ ?>

	</div>

<? endwhile; ?>

<? get_footer(); ?>