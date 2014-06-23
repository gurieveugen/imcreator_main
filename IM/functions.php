<?php
/*
 * @package WordPress
 * @subpackage HivistaSoft_Theme
 */
error_reporting(0);
$content_width = 600;				// Defines maximum width of images in posts
add_editor_style();					// Allows editor-style.css to configure editor visual style.
add_theme_support('post-thumbnails');


register_sidebar( array(
	'description' => 'The primary widget area',
	'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
) );

register_sidebar( array(
	'name' => 'Secondary Sidebar',
	'description' => 'The secondary widget area',
	'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
) );

register_nav_menus( array(
	'main' => 'Main Navigation Menu',
	'secondary' => 'Secondary navigation Menu'
) );

function get_top_menu(){
  wp_nav_menu(array(
  'container'       => '', 			// tag name '' - for no container.
  'container_id'    => '',    // tag id
  'menu_class'      => 'main-navigation',				// ul class
  'menu_id'			=> 'nav',			// ul id
  'echo'            => true,
  'theme_location'  => 'main'));		// menu location name ('main' or 'secondary' by default)
}

function base_theme_filter_title( $title, $separator = '|') {
	if ( is_feed() ) return $title;
	global $paged, $page;

	if ( is_search() ) {
		$title = 'Search results for '. get_search_query();
		if ( $paged >= 2 )
			$title .= " $separator Page " . $paged;
		$title .= " $separator " . get_bloginfo( 'name', 'display' );
		return $title;
	}

	$title .= get_bloginfo( 'name', 'display' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $separator " . $site_description;
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $separator Page ". max( $paged, $page );
	return $title;
}

add_filter( 'wp_title', 'base_theme_filter_title', 10, 2 );


function remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'remove_recent_comments_style' );

function show_posted_in() {
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.';
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.';
	} else {
		$posted_in = 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.';
	}
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}

add_theme_support( 'automatic-feed-links' );

function short_content($content,$sz = 500,$more = '...') {
	if (strlen($content)<$sz) return $content;
	$p = strpos($content, " ",$sz);
    if (!$p) return $content;
        $content = strip_tags($content,"<ul><li>");
        if (strlen($content)<$sz) return $content;
        $p = strpos($content, " ",$sz);
        if (!$p) return $content;
	return substr($content, 0, $p).$more;
}


class Category_Custom {

	/*var $image  = '';
	var $quote  = '';
	var $author = '';
	var $sign   = '';
	var $photo  = '';
	var $caption= '';*/
	var $option  = '';
	var $term_id = '';
	const OPTION_NAME  = 0;
	const OPTION_TITLE = 1;
	const OPTION_VALUE = 2;
	const OPTION_TYPE  = 3;
	const OPTION_STRING= 0;
	const OPTION_TEXT  = 1;


	function Category_Custom() {
		add_action('edit_category_form_fields',array(&$this,'admin'));
		add_action('edit_category',array(&$this,'update'));
		add_action('template_redirect',array(&$this,'autoinit'));
	}

	function autoinit () {
		global $wp_query;
		if (is_category()) {
			$this->init($wp_query->get_queried_object_id());
		}

	}

	function optionName($option){
		return 'IM_category_'.$this->term_id.'_'.$option[Category_Custom::OPTION_NAME];
	}

	function init($nID) {
		if (is_object($nID)) {
			$nID = $nID->term_id;
		}
		$this->term_id = $nID;
		$this->option = get_option('IM_category_custom_'.$nID);
		if (!$this->option) {
			$this->option = array(
				array('image','Image','',0),
				array('quote','Quote','',1),
				array('author','Author Name','',0),
				array('sign','Author sign','',0),
				array('photo','Author photo','',0),
				array('caption','Photo caption','',0)
			);
		}

	}

	function update($nID) {
		$this->init($nID);
		foreach ($this->option as $key=>$option){
			if (in_array($option[Category_Custom::OPTION_NAME],array('photo','caption'))) continue;
			$this->option[$key][Category_Custom::OPTION_VALUE] = $_POST[$this->optionName($option)];
		}
		update_option('IM_category_custom_'.$nID,$this->option);
	}

	function admin ($tag) {
		$this->init($tag);
		foreach ($this->option as $option):
			if (in_array($option[Category_Custom::OPTION_NAME],array('photo','caption'))) continue;
			echo '<tr class="form-field"><th>'.$option[Category_Custom::OPTION_TITLE].'</th><td>';
			switch ($option[Category_Custom::OPTION_TYPE]) {
				case Category_Custom::OPTION_STRING :
					echo '<input name="'.$this->optionName($option).'"
							value="'.$option[Category_Custom::OPTION_VALUE].'" size="100" />';
						break;
				case Category_Custom::OPTION_TEXT :
					echo '<textarea name="'.$this->optionName($option).'"
							cols="100" rows="5">'.$option[Category_Custom::OPTION_VALUE].'</textarea>';
						break;
			}
			echo "</td></tr>\n";
		endforeach;
	}

	function get_option($sName) {
		foreach ($this->option as $option) {
			if ($sName == $option[Category_Custom::OPTION_NAME]) return $option[Category_Custom::OPTION_VALUE];
		}
		return false;
	}
}
global $CategoryCustom;
$CategoryCustom = new Category_Custom();
function get_category_custom($sName) {
	global $CategoryCustom;
	return $CategoryCustom->get_option($sName);
}

include('theme-admin.php');