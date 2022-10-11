<?php

/**
 * Template Name: Kontakt
 *
 * @package imenet
 */
$page_title = get_the_title();
$contact = get_field('contact');

get_header(); ?>

<div class="content-area">
  <main id="main" class="site-main">
    <?php if (!empty($contact) && isset($contact)) :
      $title = $contact['title'];
      $form = $contact['form'];
      $copy = $contact['copy']; ?>

      <section class="contact">
        <div class="container">
          <?php if (!empty($form) && isset($form)) : ?>
            <div class="contact__form-wrapper">
              <?php if (!empty($title) && isset($title)) : ?>
                  <h2 class="contact__title">
                    <?php echo $title ?>
                  </h2>
              <?php endif; 
              
              if (!empty($form) && isset($form)) : ?>
                <div class="contact__form">
                  <?php echo do_shortcode($form); ?>
                </div>
              <?php endif; ?>
            </div>
          <?php endif; 
          
          if (!empty($copy) && isset($copy)) : ?>
            <div class="contact__copy-wrapper">
              <?php if (!empty($copy) && isset($copy)) : ?>
                <div class="contact__copy">
                  <?php echo $copy ?>
                </div>
              <?php endif; ?>
            </div>
          <?php endif; ?>
        </div>
      </section>
    <?php endif; ?>
  </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();
