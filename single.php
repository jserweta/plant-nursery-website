<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package imenet
 */

get_header();
?>

<main id="primary" class="site-main">

	<?php
	while (have_posts()) :
		the_post();

		get_template_part('template-parts/content', get_post_type());

		the_post_navigation(
			array(
				'prev_text' => '<span class="nav-subtitle">' . esc_html__('Poprzedni:', 'imenet') . '</span> <span class="nav-title">%title</span>',
				'next_text' => '<span class="nav-subtitle">' . esc_html__('Następny:', 'imenet') . '</span> <span class="nav-title">%title</span>',
			)
		);

		// If comments are open or we have at least one comment, load up the comment template.
		if (comments_open() || get_comments_number()) :

			// custom function disabling comments - set on deafult
			if (!function_exists('df_disable_comments_post_types_support')) : ?>
				<div class="container">
					<?php comments_template(); ?>
				</div>

			<?php endif; ?>
		<?php endif; ?>
	<?php endwhile; ?>

</main><!-- #main -->

<?php
get_footer();
