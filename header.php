<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package imenet
 */

$logo_svg = get_field('logo', 'option');
$logo_main = get_field('logo_main', 'option');

$phones = get_field('phones', 'option');
$emails = get_field('e-mails', 'option');
$open_hours = get_field('godziny_otwarcia', 'option');

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Strona zwierająca ofertę szkółki roślin Mikulscy.">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class('no-js'); ?>>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Przeskocz do treści', 'imenet'); ?></a>
		<div class="nav-container">
			<div class="top-bar">
				<div class="container">
					<?php 
						if (!empty($open_hours) && isset($open_hours)) : 
							$monday_friday = $open_hours['pon-pt'];
							$saturday = $open_hours['sob'];
							$sunday = $open_hours['nd'];
							$icon = $open_hours['icon'];?>
							<div class="top-bar__open-hours">
                <figure class="top-bar__open-hours-figure">
                  <?php echo wp_get_attachment_image($icon, "large"); ?>
                </figure>

								<div class="hours">
									<span><?php echo esc_html('Pon-pt: '); echo $monday_friday;?></span>
									<span><?php echo esc_html('Sob: '); echo $saturday; ?></span>
								</div>
							</div>
						<?php endif; ?>
				</div>
			</div>
			<header class="site-header" role="banner">
				<div class="site-branding">
					<?php if (is_front_page() && is_home()) : ?>
						<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
							<span class="screen-reader-text"><?php bloginfo('name'); ?></span>
							<?php if (!empty($logo_main) && isset($logo_main)) : ?>
                <figure class="site-branding__figure">
                  <?php echo wp_get_attachment_image($logo_main, 'large', false, ["class" => "logo"]); ?>
                </figure>
							<?php endif; ?>
						</a>
					<?php else : ?>
						<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
							<span class="screen-reader-text"><?php bloginfo('name'); ?></span>
							<?php if (!empty($logo_main) && isset($logo_main)) : ?>
								<!-- ACF PNG logo -->
                <figure class="site-branding__figure">
								  <?php echo wp_get_attachment_image($logo_main, 'large', false, ["class" => "logo"]); ?>
                </figure>
							<?php endif; ?>
						</a>
					<?php endif; ?>
				</div><!-- .site-branding -->

				<div class="main-navigation-wrapper" id="main-navigation-wrapper">
					<button id="nav-toggle" class="nav-toggle hamburger" type="button" aria-label="<?php esc_attr_e('Menu', 'imenet'); ?>">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
						<span id="nav-toggle-label" class="screen-reader-text" aria-label="<?php esc_attr_e('Menu', 'imenet'); ?>"><?php esc_attr_e('Menu', 'imenet'); ?></span>
					</button>

					<nav id="nav" class="nav-primary" role="navigation">

						<?php wp_nav_menu(array(
							'theme_location'    => 'primary',
							'container'         => false,
							'depth'             => 4,
							'menu_class'        => 'menu-items',
							'menu_id'           => 'main-menu',
							'echo'              => true,
							'fallback_cb'       => 'Nav_Walker::fallback',
							'items_wrap'     	=> '<ul role="menu" aria-label="menubar" id="%1$s" class="%2$s">%3$s</ul>',
							'walker'         	=> new Nav_Walker(),
						)); ?>

					</nav><!-- #nav -->
				</div>

				<?php get_template_part('template-parts/components/social-media'); ?>
			</header>
		</div><!-- .nav-container -->