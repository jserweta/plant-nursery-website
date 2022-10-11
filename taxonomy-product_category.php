<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package imenet
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="container">
		<?php if (have_posts()) : ?>
			<ul class="remove-ul-styling s-one-col m-two-cols l-three-col">
				<?php while (have_posts()) : the_post();
					get_template_part('template-parts/components/product-thumbnail');
				endwhile;
				the_posts_navigation();
			else :
				get_template_part('template-parts/content', 'none'); ?>
			</ul>
		<?php endif; ?>
	</div>
</main><!-- #main -->

<?php
get_footer();
