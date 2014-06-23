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
					<?php
					global $post;
					if (is_day ()) :
						echo 'Daily Archives: <span>' . get_the_date() . '</span>';
					elseif (is_month ()) :
						echo 'Monthly Archives: <span>' . get_the_date('F Y') . '</span>';
					elseif (is_year ()) :
						echo 'Yearly Archives: <span>' . get_the_date('Y') . '</span>';
					elseif (is_tag ()) :
						echo 'Tag Archives: <span>' . single_tag_title() . '</span>';
					else :
						echo 'Blog Archives';
					endif;
					?>
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
					<?php include( TEMPLATEPATH . '/inc/futured.php' ); ?>
					<? include("loop.php"); ?>
				</div>
				<div class="pagination-holder">
					<div class="holder">
						<div class="frame">
							<div class="pages">
								<span>Page 1 of 10</span>
								<a href="#">1</a>
								<a href="#">2</a>
								<a href="#">3</a>
								<a href="#">4</a>
								<a href="#">5</a>
								<a href="#">6</a>
								<a href="#">7</a>
								<a href="#">8</a>
								<a href="#">9</a>
								<a href="#">10</a>
								<a href="#">&gt;&gt;</a>
							</div>
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