<?php

/**
 * Template Name: Zamówienia
 *
 * @package imenet
 */
$page_title = get_the_title();
$orders = get_field('orders_and_delivery');
$product_catalog = get_field('product_catalog', 'option');

get_header(); ?>

<div class="content-area">
  <main id="main" class="site-main">
    <?php if (!empty($page_title) && isset($page_title)) : ?>
      <div class="container">
        <h1 class="page-title-heading">
          <?php echo $page_title; ?>
        </h1>
      </div>
    <?php endif;

    if (!empty($orders) && isset($orders)) :
      $desc = $orders['description'];
      $button_type = $orders['button_type'];

      if ($button_type == 'catalog'):
        if (!empty($product_catalog) && isset($product_catalog)):
          $cat_button = $product_catalog['button'];
        
          if (!empty($cat_button) && isset($cat_button)):
            $button_title = $cat_button['button_title'];
            $button_icon = $cat_button['button_icon'];
          endif;

          $product_cat_file = $product_catalog['product_catalog_file'];
          if (!empty($product_cat_file) && isset($product_cat_file)):
            $button_link = $product_cat_file;
          endif;
        endif;
      else:
        $button_link = $orders['button_link'];
        $button_icon = $orders['button_icon'];
        $button_title = '';
      endif;
      
      if (!empty($desc) && isset($desc)) :?>
        <section class="orders container fade-in">
          <?php echo $desc; 
          if (!empty($button_link) && isset($button_link)) :
            get_template_part('template-parts/components/cta-button', null, array( 
                'button_icon' => $button_icon,
                'button_link'  => $button_link,
                'button_title' => $button_title)
            );
          endif;?>
        </section>
      <?php endif;
    endif; ?>
  </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();
