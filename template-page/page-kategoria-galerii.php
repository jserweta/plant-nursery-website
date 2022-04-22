<?php

/**
 * Template Name: Kategoria galerii
 *
 * @package imenet
 */
$page_title = get_the_title();
$group_description = get_field('group_description');
$images = get_field('images');

get_header(); ?>

<div id="image-gallery-page" class="content-area">
    <main id="main" class="site-main">
        <?php
        if (!empty($page_title) && isset($page_title)) : ?>
            <div class="container">
                <h1 class="page-title-heading">
                    <?php echo $page_title; ?>
                </h1>
            </div>
        <?php endif; ?>
            <section class="image-group container">
            <?php if (!empty($group_description) && isset($group_description)) :
                    echo $group_description; 
                endif;
                if (!empty($images) && isset($images)) : ?>
                <div class="popup-gallery image-group__gallery">
                    <?php foreach( $images as $index => $image ):?>
                    <a href="<?php echo esc_url($image['sizes']['large']); ?>" desc="<?php echo esc_attr($image['description']); ?>" class="image-group__single-image">
                        <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" width="300" height="300"/>
                    </a>
                    <?php endforeach;?>
                </div>
                <?php endif; ?>
            </section>
       



    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();