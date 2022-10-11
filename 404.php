<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package imenet
 */

get_header();
?>

<main id="primary" class="site-main">

	<section class="block-error-404 not-found">
		<div class="container">
			<header class="page-header">
        <h1 class="page-title-heading"><?php esc_html_e('404', 'imenet'); ?></h1>
				<h2 class=""><?php esc_html_e('Strony nie znaleziono.', 'imenet'); ?></h2>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php esc_html_e('Spróbuj ponownie lub skorzystaj z głównej nawigacji.', 'imenet'); ?></p>
			</div><!-- .page-content -->
		</div>

	</section><!-- .error-404 -->

</main><!-- #main -->

<?php
get_footer();
