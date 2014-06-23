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
                    $args = array( 'category__in' => $cat_arr, 'paged' => get_query_var( 'paged' ) );                    
                    query_posts($args);
                }?>
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