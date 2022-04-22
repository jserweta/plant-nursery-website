<?php

/**
 * Enqueue scripts and styles.
 * @package imenet
 */

add_action('wp_enqueue_scripts', 'imenet_theme_scripts');
function imenet_theme_scripts()
{
	if ('development' === getenv('WP_ENV')) {
		$imenet_template = 'global';
	} else {
		$imenet_template = 'global.min';
	}

	// Styles.
	wp_enqueue_style('styles', get_theme_file_uri("css/{$imenet_template}.css"), array(), filemtime(get_theme_file_path("css/{$imenet_template}.css")));

	// Scripts.
	wp_enqueue_script('jquery-core');
	wp_enqueue_script('scripts', get_theme_file_uri('js/dist/front-end.js'), array(), filemtime(get_theme_file_path('js/dist/front-end.js')), true);

	// Required comment-reply script
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	wp_localize_script('scripts', 'imenet_screenReaderText', array(
		'expand'   => esc_html__('Otwórz menu potomne', 'imenet'),
		'collapse' => esc_html__('Zamknij menu potomne', 'imenet'),
		'expand_for' =>  esc_html__('Otwórz menu potomne dla', 'imenet'),
		'collapse_for' => esc_html__('Zamknij menu potomne dla', 'imenet'),
		'expand_toggle'   => esc_html__('Rozszerz', 'imenet'),
		'collapse_toggle' => esc_html__('Zamknij', 'imenet'),
		'external_link' => esc_html__('Zewnętrzny adres URL:', 'imenet'),
		'target_blank' => esc_html__('otwórz w nowym oknie', 'imenet'),
	));
}

/**
 * Load polyfills for legacy browsers
 */
function enqueue_polyfills()
{
	$legacy_scripts = 'js/dist/legacy.js';
	// Include polyfills
	$script = '
	var supportsES6 = (function () {
	try {
	  new Function("(a = 0) => a");
	  return true;
	} catch (err) {
	  return false;
	}
	}());
	var legacyScript ="' . esc_url(get_theme_file_uri($legacy_scripts)) . '";
	if (!supportsES6) {
	  var script = document.createElement("script");
	  script.src = legacyScript;
	  document.head.appendChild(script);
	}';

	if (file_exists(get_theme_file_path($legacy_scripts))) {
		wp_register_script('imenet_legacy', ''); // phpcs:ignore
		wp_enqueue_script('imenet_legacy', '', [], filemtime(get_theme_file_path($legacy_scripts)), false);
		wp_add_inline_script('imenet_legacy', $script, true);
	}
}
