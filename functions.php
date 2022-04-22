<?php

/**
 * imenet functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package imenet
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.1');
}

if (!function_exists('imenet_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	function imenet_setup()
	{
		/*
		 * Make theme available for translation.
		 */
		load_theme_textdomain('imenet', get_template_directory() . '/languages');

		/**
		 * Enable theme support for essential features.
		 */
		add_theme_support('automatic-feed-links');
		add_theme_support('title-tag');
		add_theme_support('post-thumbnails');
		add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
		// add_theme_support( 'woocommerce' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);
		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');
	}
endif;
add_action('after_setup_theme', 'imenet_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function imenet_content_width()
{
	$GLOBALS['content_width'] = apply_filters('imenet_content_width', 640);
}
add_action('after_setup_theme', 'imenet_content_width', 0);

require get_theme_file_path('/inc/acf.php');
require get_theme_file_path('/inc/ajax.php');
require get_theme_file_path('/inc/custom-post.php');
require get_theme_file_path('/inc/products-cpt-link.php');
require get_theme_file_path('/inc/disable-comments.php');
require get_theme_file_path('/inc/enque-scripts.php');
require get_theme_file_path('/inc/functions.php');
require get_theme_file_path('/inc/menus.php');
require get_theme_file_path('/inc/nav-walker.php');
require get_theme_file_path('/inc/numeric-pagination.php');
require get_theme_file_path('/inc/security.php');
require get_theme_file_path('/inc/template-tags.php');
require get_theme_file_path('/inc/utility.php');
