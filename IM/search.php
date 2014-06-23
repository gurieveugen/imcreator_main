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
				<? if (have_posts ()) : ?>
				<h1>Search Results for: <span> <? echo get_search_query() ?></span></h1>
				<? include('loop.php'); ?>
				<? else : ?>
				<div class="topic-holder">
					<h1>Nothing Found</h1>
					<div class="topic-content">
						<p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
						<? get_search_form(); ?>
					</div>
				</div>

				<? endif; ?>
			</div>
		</div>
		<!-- sidebar -->
		<? get_sidebar(); ?>
	</div>		
</div>		
<? get_footer(); ?>