<?php

/**
 * Template Name: Galeria
 *
 * @package imenet
 */
$page_title = get_the_title();
$image_gallery = get_field('image_gallery');

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
        <?php endif; 
        if (!empty($image_gallery) && isset($image_gallery)) : ?>
         <section class="gallery-cat container">
            <?php foreach ($image_gallery as $ig):
                $group_title = $ig['group_title'];
                $image = $ig['featured_image'];
                $permalink = sanitize_title($group_title); ?>
                <a href="<?php echo esc_url(get_permalink()).$permalink; ?>">
                    <div class="gallery-cat__single-cat">
                        <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <div class="gallery-cat__overlay">
                            <h2><?php echo $group_title; ?></h2>
                        </div>
                    </div>
                </a>
                <?php 
                endforeach;?>
            </section>
        <?php endif;?>



    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();