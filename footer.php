<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package imenet
 */
$logo_png_round = get_field('logo_png_round', 'option');
?>

<footer id="colophon" class="site-footer">
	<div class="container">
		<div class="site-footer__info">

			<div class="site-footer__site-branding">
				<?php if (is_front_page() && is_home()) : ?>
					<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
						<span class="screen-reader-text"><?php bloginfo('name'); ?></span>
						<?php if (!empty($logo_svg) && isset($logo_svg)) : ?>
							<!-- ACF SVG logo -->
							<span class="logo"><?php echo $logoSvg ?></span>
						<?php endif; ?>

						<?php if (!empty($logo_png_round) && isset($logo_png_round)) : ?>
							<!-- ACF PNG logo -->
							<img class="logo" src="<?php echo $logo_png_round['url'] ?>" alt="<?php echo $logo_png_round['alt'] ?>">
						<?php endif; ?>
					</a>
				<?php else : ?>
					<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
						<span class="screen-reader-text"><?php bloginfo('name'); ?></span>
						<?php if (!empty($logo_svg) && isset($logo_svg)) : ?>
							<!-- ACF SVG logo -->
							<?php echo $logo_svg ?>
						<?php endif; ?>
						<?php if (!empty($logo_png_round) && isset($logo_png_round)) : ?>
							<!-- ACF PNG logo -->
							<img class="logo" src="<?php echo $logo_png_round['url'] ?>" alt="<?php echo $logo_png_round['alt'] ?>">
						<?php endif; ?>
					</a>
				<?php endif; ?>
			</div><!-- .site-branding -->
			
			<?php get_template_part('components/social-media/index'); ?>
		
		</div>

		 <div class="site-footer__theme-info"> <!--//copyright -->
			<span><?php echo esc_html('Mikulscy © 2021 •'); ?></span>
			<!-- <span><?php //esc_html_e('Uszyte na ', 'imenet'); ?><a href="<?php //echo esc_url('https://wordpress.org/') ?>"><?php //echo esc_html('WordPress'); ?></a></span> -->
			<span><?php esc_html_e(' Projekt i wykonanie ', 'JSerweta'); ?><a href="<?php echo esc_url('https://jakubserweta.pl/') ?>" target="_blank"><?php echo esc_html('JSerweta'); ?></a></span>
			<span><?php esc_html_e(' •  Ta strona używa Cookies, przeglądanie jej to zgoda na ich używanie • ', 'imenet'); ?></span>
			<a href="<?php echo esc_url('/polityka-prywatnosci') ?>" class="no-external-link-indicator"><?php esc_html_e('Polityka Prywatności'); ?></a>
		</div>
		<!-- <div class="site-footer__privacy-policy">
			
		</div> -->
	</div>
	<p class="back-to-top"><a href="#page" class="js-trigger top no-text-link no-external-link-indicator" data-mt-duration="300"><span class="screen-reader-text"><?php echo esc_html('Powrót do góry strony'); ?></span><?php include get_theme_file_path('/svg/chevron-upwards-arrow.svg'); ?></a></p>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>

</html>