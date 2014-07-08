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
		<?php if (is_tag ()) : ?>
		<h1>Tag Archives: <span><?php echo single_tag_title(); ?></span></h1>
		<div class="images-box">
            <?php global $query_string;
           
            query_posts( $query_string . '&posts_per_page=15' );
            ?>
			<? if (have_posts ()) : 
				$content = '';
				while ( have_posts() ) : the_post(); 								
					$wp_title = get_the_title();
					$wp_permalink = get_permalink($post->ID);
					$creator = '';
					$creator = get_post_meta(get_the_ID(), 'creator', true);
					$class = 'box';
					if ( $i % 2 ) $class = 'box w2';

					$content .= '<div class="'.$class.'">';
					if ( has_post_thumbnail() ) {
						$content .= get_the_post_thumbnail($post->ID, 'post-matrix');
					}
					$content .= '<a href="'.$wp_permalink.'" class="image">';
					$content .= '<div class="text">';
					$content .= '<h4>'. $wp_title .'</h4>';
					if ( strlen( $creator ) ) $content .= '<span>by '.$creator.'</span>';
					$content .= '</div>';
					$content .= '</a>';
					$content .= '</div>';
				endwhile;
				echo $content;
			endif; ?>
		</div>
		<?php else: ?>
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
					/*elseif (is_tag ()) :
						echo 'Tag Archives: <span>' . single_tag_title() . '</span>';*/
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
	<?php endif; ?>
	</div>
</div>
<? get_footer(); ?>