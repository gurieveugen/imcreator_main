<?php
/*
 * @package WordPress
 * @subpackage HivistaSoft_Theme
 * Template Name: Contact Page
*/
?>

<?php 

if ($imgsrc = get_post_meta(get_the_ID(),'noheaderr',true)) {
						echo '<div class="futured-image" alt=""> '.$imgsrc.' </div>';
					} else { get_header(); }
						
				 ?>

	<? if (have_posts ()) : the_post(); ?>
	<!-- main -->
	<div id="main" class="contact">
		<? /* comments_template('', true); */ ?>
	<div class="form-contact">
		<?php echo apply_filters('the_content', '[contact-form-7 id="11569" title="Contact form"]'); ?>
	</div>
	</div>
	<? endif; ?>
<?php if ($imgsrc = get_post_meta(get_the_ID(),'nofooterr',true)) {
						
					} else { get_footer(); } ?>