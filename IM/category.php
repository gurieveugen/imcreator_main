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
	</div>
</div>
<? get_footer(); ?>