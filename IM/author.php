<?php
/**
 *
 * @package WordPress
 * @subpackage HivistaSoft_Theme
 */
?>
<? get_header(); ?>
<!-- main -->
<div id="main">
	<div class="main-holder">
		<!-- content -->
		<div id="content">
			<div class="content-holder">

					<? global $post;
				setup_postdata($post); ?>
				<div class="topic-holder">
					<h1>
			Author Archives:
						<span class="vcard"><a href="<? echo get_author_posts_url(get_the_author_meta('ID')) ?> " title="<? echo esc_attr(get_the_author()) ?>" rel='me'><? the_author() ?></a></span>
					</h1>
					<div class="topic-content">
						<? if (get_the_author_meta('description')) : ?>
							<div id="topic-author-info">
								<div id="author-avatar">
								<? echo get_avatar(get_the_author_meta('user_email'), 60); ?>
							</div>
							<div id="author-description">
								<h2>About <? the_author() ?></h2>
								<? the_author_meta('description'); ?>
							</div>
						</div>
						<? endif; ?>
							</div>
						</div>
				<? include('loop.php'); ?>

			</div>
		</div>
		<!-- sidebar -->
		<? get_sidebar(); ?>
	</div>
</div>
<? get_footer(); ?>