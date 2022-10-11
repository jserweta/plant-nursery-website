<?php

/**
 * Template Name: O nas
 *
 * @package imenet
 */
$page_title = get_the_title();
$about_us = get_field('about_us_sections');

get_header(); ?>

<div id="about-us-page" class="content-area">
  <main id="main" class="site-main">
    <?php if (!empty($page_title) && isset($page_title)) : ?>
      <div class="container">
        <h1 class="page-title-heading"><?php echo $page_title; ?></h1>
      </div>
    <?php endif;

    if (!empty($about_us) && isset($about_us)) :
      $section = $about_us['single_section'];
      
      if (!empty($section) && isset($section)) : 
        foreach ($section as $index=>$value):
          $my_index = $index + 1;
          $title = $value['title'];
          $desc = $value['description'];
          $image = $value['image'];
          $class = '';

          if ($my_index === 1) :
            $class .= "fade-in ";
          else :
              ($my_index % 2) ? $class .= "image-first ": $class .= "";
          endif; ?>

          <section id="<?php echo "section-".$my_index;?>"class="about-us-row container">
            <div class="about-us-row__content <?php echo $class; ?> <?php echo $my_index != 1 ? "slide-right": ""; ?>">
              <h2 class="sec-heading"><?php echo $title; ?></h2>
              <?php echo $desc; ?>
            </div>

            <div class="about-us-row__image <?php echo $class; ?> <?php echo $my_index != 1 ? "slide-left": ""; ?>" data-delay="<?php echo $my_index === 1 ? "100" : ''; ?>">
              <?php echo wp_get_attachment_image($image['id'], 'large', false, ["class" => "image-radius"]); ?>
            </div>
          </section>
        <?php endforeach;
      endif; ?>
    <?php endif; ?>
  </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();
