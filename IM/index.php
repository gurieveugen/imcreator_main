<?php
/**
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
				<? include("loop.php"); ?>
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
	</div>
</div>
<? get_footer(); ?>