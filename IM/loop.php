<?php
/**
 * @package WordPress
 * @subpackage HivistaSoft_Theme
 */
?>
<!-- 404 post -->
<? if ( ! have_posts() ) : ?>
	<div class="topic-holder">
		<h2>Not Found</h2>
		<div class="topic-content">
			<p>Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.</p>
			<? get_search_form(); ?>
		</div>
	</div>
<? endif; ?>

<!-- posts -->
<? while ( have_posts() ) : the_post(); ?>
				<!-- no image post -->
				<!--
									<div class="post-box no-image">
										<div class="text">
											<div class="heading-holder">
												<h2><a href="#">Name of item</a></h2>
						<span class="date">09.09.11  By Jonathan Saragossi</span>
											</div>
											<div class="post-content">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis odio neque, aliquam ac fermentum vel, tincidunt non augue. Quisque vehicula eleifend quam, id euismod est laoreet ut. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
											</div>
											<a href="#" class="btn-more">more</a>
										</div>
									</div>
				-->
			<?php
				if (has_post_thumbnail()) {
					$sClass = '';
					$aSrc = wp_get_attachment_image_src(get_post_thumbnail_id(),'medium');
					$sImg = '<div class="img-holder" style="
width: 230px; height: 230px;
background:url('.$aSrc[0].');
background-repeat:no-repeat; background-size: cover;  background-position: center center;">
						
						  </div>';
				} else {
					$sClass = 'no-image';
					$sImg = '';
				}
			?>
			<div class="post-box <?=$sClass?>">
				<?=$sImg; ?>
				<div class="text">
					<div class="heading-holder">
						<h2><a href="<? the_permalink(); ?>" rel="bookmark"><? the_title(); ?></a></h2>
						<span class="date"><a href="<? the_permalink() ?>" rel="bookmark"><span class="topic-date"><? the_time('j.m.y'); ?></span></a> By <span class="topic-author"><a href="<?the_author_url();?>" target="_blank" ><? the_author() ?></a></span>
						<span class="comments"><a href="<? comments_link(); ?>"><? comments_number('No comments','1 Comment','% Comments'); ?></a></span></p>
					</div>
					<div class="post-content">
						<div class="topic-content">
							<?php
							$cont = get_the_excerpt();
							if (!$cont) $cont = short_content(get_the_content());
							echo $cont;
							?>
						</div>
					</div>
					<a href="<? the_permalink(); ?>" class="btn-more">more</a>
				</div>
			</div>
			<? comments_template( '', true ); ?>

<? endwhile; ?>