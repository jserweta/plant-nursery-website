<?php

/**
 * The home page template is the front page by default. If you do not set WordPress to use a static front page, this template is used to show latest posts.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package imenet
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

// front page ACF groups
// $header = get_field('header', $slug->ID);

get_header(); ?>

<div class="content-area">
    <main id="main" class="site-main">

        <?php
        if (have_posts()) : ?>
            <div class="container blog-posts">

                <!-- Start the Loop -->
                <?php while (have_posts()) :
                    the_post();

                    get_template_part('template-parts/content', 'home');

                endwhile; ?>
            </div>

            <nav class="navigation numeric-pagination-container container">
                <div class="nav-links">
                    <?php numeric_pagination(); ?>
                </div>
            </nav>

        <?php else :

            get_template_part('template-parts/content', 'none'); ?>

        <?php endif; ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();
