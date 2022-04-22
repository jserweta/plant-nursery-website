<?php

/**
 * Template part for displaying posts on the blog page (home.php)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package imenet
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php imenet_post_thumbnail(); ?>

    <header class="entry-header">
        <?php
        if (is_singular()) :
            the_title('<h1 class="entry-title">', '</h1>');
        else :
            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
        endif; ?>
    </header><!-- .entry-header -->


    <div class="entry-meta">

        <?php if ('post' === get_post_type()) {

            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list();
            if ($categories_list) {
                /* translators: 1: list of categories. */
                printf(esc_html__('%1$s', 'imenet'), $categories_list); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            }
        }


        ?>
    </div><!-- .entry-meta -->

    <div class="entry-content">
        <p class="entry-content__excerpt">
            <?= get_the_excerpt() ?>
        </p>
        <?=
            sprintf(
                '<a class="read-more button button-ghost button-large" href="%1$s">%2$s</a>',
                get_permalink(get_the_ID()),
                __('Więcej', 'imenet')
            );
        ?>
    </div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->