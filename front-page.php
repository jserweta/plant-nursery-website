<?php
/**
 * The template for displaying front page
 *
 * Contains the closing of the #content div and all content after.
 * Initial styles for front page template.

  * @package imenet
  * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
  */

$cta_buttons = get_field('cta_buttons');

get_header(); ?>

<div class="content-area">
  <main id="main" class="site-main">
    <!-- Hero section -->
    <?php get_template_part('template-parts/blocks/hero-fp-2'); ?>
    <!-- Hero section END -->

    <div class="container">
      <!-- CTA section -->
      <?php if (!empty($cta_buttons) && isset($cta_buttons)):
        $buttons = $cta_buttons['buttons'];

        if (!empty($buttons) && isset($buttons)): ?>
          <section class="cta-section">
            <?php foreach ($buttons as $idx => $btn):
              $link = $btn['link']; 
              $icon = $btn['icon'];
              $title = '';
              
              get_template_part('template-parts/components/cta-button', null, array( 
                'button_icon' => $icon,
                'button_link'  => $link,
                'button_title' => $title,
                'class' => "fade-in",
                'data-delay' => 100 * $idx)
              );
            endforeach; ?>
          </section>
        <?php endif;
      endif; ?>
      <!-- CTA section END -->

      <!-- About us section -->
      <?php get_template_part('template-parts/blocks/about-us-fp'); ?>
      <!-- About us section END -->

      <!-- Sales point section -->
      <?php get_template_part('template-parts/blocks/sales-point-fp'); ?>
      <!-- Sales point section END -->

      <!-- Gallery section -->
      <?php get_template_part('template-parts/blocks/gallery-fp'); ?>
      <!-- Gallery section END -->
    </div>

    <!-- Contact section -->
    <?php get_template_part('template-parts/blocks/contact-us-fp'); ?>
    <!-- Contact section END -->
  </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();
