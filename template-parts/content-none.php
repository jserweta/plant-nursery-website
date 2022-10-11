<?php

/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package imenet
 */

?>

<section class="no-results not-found">
	<div class="container">
		<header class="page-header">
			<h1 class="page-title"><?php esc_html_e('Upss...', 'imenet'); ?></h1>
			<p><?php esc_html_e('Aktualnie nie posiadamy tego typu produktów w ofercie.', 'imenet'); ?></p>
      </header><!-- .page-header -->

		<div class="page-content">
			<?php
			if (is_home() && current_user_can('publish_posts')) :

				printf(
					'<p>' . wp_kses(
						/* translators: 1: link to WP admin new post page. */
						__('Gotowy do działania? <a href="%1$s">Zacznij tutaj!</a>.', 'imenet'),
						array(
							'a' => array(
								'href' => array(),
							),
						)
					) . '</p>',
					esc_url(admin_url('post-new.php'))
				);
			elseif (is_search()) :
			?>
				<p><?php esc_html_e('Spróbuj ponownie lub skorzystaj z głównej nawigacji.', 'imenet'); ?></p>
			<?php endif; ?>
		</div><!-- .page-content -->
	</div>
</section><!-- .no-results -->