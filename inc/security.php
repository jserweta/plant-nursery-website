<?php

/**
 * WP security
 *
 * @package imenet
 */
// Remove WP version from HEAD
remove_action('wp_head', 'wp_generator');

// Remove WP version from RSS
function my_secure_generator($generator, $type)
{
  return '';
}

add_filter('the_generator', 'my_secure_generator', 10, 2);

// Remove WP version from JS files
function my_remove_src_version($src)
{
  global $wp_version;

  $version_str = '?ver=' . $wp_version;
  $offset = strlen($src) - strlen($version_str);

  if ($offset >= 0 && strpos($src, $version_str, $offset) !== FALSE)
    return substr($src, 0, $offset);

  return $src;
}

add_filter('script_loader_src', 'my_remove_src_version');
add_filter('style_loader_src', 'my_remove_src_version');

// Disable XMLRPC
add_filter('xmlrpc_enabled', '__return_false');
