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
$logo_secondary = get_field('logo_secondary', 'option');
?>
<footer id="colophon" class="site-footer">
	<div class="container">
		<div class="site-footer__info">
			<div class="site-footer__site-branding">
				<?php if (is_front_page() && is_home()) : ?>
					<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
						<span class="screen-reader-text"><?php bloginfo('name'); ?></span>
						<?php if (!empty($logo_secondary) && isset($logo_secondary)) : ?>
							<figure class="site-footer__site-branding-figure">
                <?php echo wp_get_attachment_image($logo_secondary, 'large', false, ["class" => "logo"]); ?>
              </figure>
						<?php endif; ?>
					</a>
				<?php else : ?>
					<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
						<span class="screen-reader-text"><?php bloginfo('name'); ?></span>
						<?php if (!empty($logo_secondary) && isset($logo_secondary)) : ?>
							<figure class="site-footer__site-branding-figure">
                <?php echo wp_get_attachment_image($logo_secondary, 'large', false, ["class" => "logo"]); ?>
              </figure>
						<?php endif; ?>
					</a>
				<?php endif; ?>
			</div><!-- .site-branding -->
			
			<?php get_template_part('template-parts/components/social-media'); ?>
		</div>

    <div class="site-footer__theme-info">
    <div>
    <span>
        <?php echo esc_html('Szkółka Mikulscy © 2023 •'); ?>
      </span>
      <span>
        <?php esc_html_e(' Projekt i wykonanie ', 'JSerweta'); ?>
        <a href="<?php echo esc_url('https://jakubserweta.pl/') ?>" target="_blank">
        <?php echo esc_html('JSerweta'); ?>
      </a>
      </span>
    </div>
    <div>
    <span>
        <?php esc_html_e('Ta strona używa Cookies • ', 'imenet'); ?>
      </span>
      <a href="<?php echo esc_url('/polityka-prywatnosci') ?>" class="no-external-link-indicator">
        <?php esc_html_e('Polityka Prywatności'); ?>
      </a>
    </div>
    </div>
	</div>

  <a href="#page" id="back-to-top" class="back-to-top no-text-link no-external-link-indicator smooth-scroll"> 
    <span class="screen-reader-text">
      <?php echo esc_html__('Back to top', 'imenet'); ?>
    </span>
    <?php include get_theme_file_path('/svg/chevron-upwards-arrow.svg'); ?>
  </a>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>

</html>