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
    <?php if (!empty($page_title) && isset($page_title)) : ?>
      <div class="container">
        <h1 class="page-title-heading">
          <?php echo $page_title; ?>
        </h1>
      </div>
    <?php endif;

    $page_id = get_the_ID();
    $args = array(
      'post_type'      => 'page',
      'posts_per_page' => -1,
      'post_parent'    => $page_id,
      'order'          => 'ASC',
      'orderby'        => 'menu_order'
    );

    $page_children = get_children($args);

    if ($page_children) : ?>

      <section class="gallery-cat container">
        <?php
        $idx = 0;

        foreach ($page_children as $child) :
          $group_title = $child->post_title;
          $permalink = get_permalink($child->ID); ?>

          <a href="<?php echo $permalink; ?>">
            <div class="gallery-cat__single-cat fade-in" data-delay="<?php echo $idx * 70; ?>">
              <figure class="gallery-cat__single-cat-figure">
                <?php echo get_the_post_thumbnail($child->ID, 'large'); ?>
              </figure>
              <div class="gallery-cat__overlay">
                <h2>
                  <?php echo $group_title; ?>
                </h2>
              </div>
            </div>
          </a>

        <?php $idx += 1;
        endforeach;
        
        wp_reset_postdata(); ?>
      </section>

    <?php endif; ?>

  </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();
