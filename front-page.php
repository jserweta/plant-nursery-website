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
      <?php get_template_part('components/hero-fp/index'); ?>
      <!-- Hero section END -->

      <div class="container">

        <!-- CTA section -->
        <?php 
        if (!empty($cta_buttons) && isset($cta_buttons)):
          $buttons = $cta_buttons['buttons'];
          if (!empty($buttons) && isset($buttons)): ?>
          <section class="cta-section">
            <?php 
             
             foreach ($buttons as $btn):
              $link = $btn['link']; 
              $icon = $btn['icon'];
              
              get_template_part('components/cta-button/index', null, array( 
                'button_icon' => $icon,
                'button_link'  => $link)
              );
              endforeach;
            ?>
          </section>
          <?php endif;
        endif; ?>
         <!-- CTA section END -->

         <!-- About us section -->
         <?php get_template_part('components/about-us-fp/index'); ?>
         <!-- About us section END -->

         <!-- Sales point section -->
         <?php get_template_part('components/sales-point-fp/index'); ?>
         <!-- Sales point section END -->

        <!-- Gallery section -->
        <?php get_template_part('components/gallery-fp/index'); ?>
        <!-- Gallery section END -->
        
        
      </div>
      <!-- Contact section -->
      <?php get_template_part('components/contact-us-fp/index'); ?>
         <!-- Contact section END -->
    </main><!-- #main -->
  </div><!-- #primary -->

  <?php get_footer();
