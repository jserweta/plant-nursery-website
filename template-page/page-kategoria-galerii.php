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
    <?php if (!empty($page_title) && isset($page_title)) : ?>
      <div class="container">
        <h1 class="page-title-heading">
          <?php echo $page_title; ?>
        </h1>
      </div>
    <?php endif; ?>

    <section class="image-group container">
      <?php if (!empty($group_description) && isset($group_description)) : ?>
        <div class="image-group__description fade-in">
          <?php echo $group_description; ?>
        </div>
      <?php endif; 
      
      if (!empty($images) && isset($images)) : ?>
        <div class="popup-gallery image-group__gallery">
          <?php foreach( $images as $index => $image ) : ?>
          <a href="<?php echo esc_url($image['sizes']['large']); ?>" desc="<?php echo esc_attr($image['description']); ?>" class="image-group__single-image fade-in" data-delay="<?php echo $index * 70; ?>">
            <figure class="image-group__single-image-figure">
              <?php echo wp_get_attachment_image($image['id'], 'large', false, []); ?>
            </figure>
          </a>
          <?php endforeach;?>
        </div>
      <?php endif; ?>
    </section>
  </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();