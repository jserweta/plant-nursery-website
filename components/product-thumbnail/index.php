<li class="product-thumbnail">
    <a class="product-thumbnail__link" href="<?php the_permalink() ?>">
  
    <?php if (has_post_thumbnail($post->ID)) : ?>
    <div class="product-thumbnail__image">
      <?php  
                $thumbnail_id = get_post_thumbnail_id($post->ID);
                $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                
                the_post_thumbnail('medium_large', array('alt' => $alt));
                $product_terms = get_the_terms($post->ID, 'product_category');
                if ($product_terms) : ?>
      <div class="product-thumbnail__image-badge">
        <ul class="remove-ul-styling">
          <?php foreach ($product_terms as $product_term) :
                  $term_name = $product_term->name;?>
          <li class="product-cats-thumbnail__cat">
            <?php echo esc_html($term_name); ?>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
      <?php endif; ?>
    </div>
    <?php endif; ?>


    <div class="product-thumbnail__content">
      <div class="product-thumbnail__title">
        <h3><?php echo esc_html(get_the_title()); ?></h3>
        <span class="product-thumbnail__icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="7.657" height="13.314" viewBox="0 0 7.657 13.314">
            <path
              d="M7.071,2.828l-4.95,4.95A1,1,0,1,1,.707,6.364L6.364.707a1,1,0,0,1,1.414,0l5.657,5.657a1,1,0,1,1-1.414,1.414l-4.95-4.95Z"
              transform="translate(8.071 -0.414) rotate(90)" /></svg>
        </span>
      </div>
      <?php $product = get_field('single_product');
        if (!empty($product) && isset($product)): 
          $subtitle = $product['subtitle'];
            if (!empty($subtitle) && isset($subtitle)):   ?>
              <h4 class="product-thumbnail__title-latin title-latin">
                <?php echo esc_html($subtitle); ?>
              </h4>
          <?php 
            endif;
        endif;  ?>
    </div>
    </a>
</li>
