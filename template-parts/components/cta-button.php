<?php 
if ( !empty($args) && isset($args) ) :
  $icon = $args['button_icon'];
  $link = $args['button_link'];
  $title = $args['button_title'];

  $animation = array_key_exists('class', $args) ? $args['class'] : '';
  $animation_delay = array_key_exists('data-delay', $args) ? $args['data-delay'] : '';

  if ( !empty($link) && isset($link) ) :
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = array_key_exists('target', $link) ? ($link['target'] ? $link['target'] : '_self') : '_blank';
  endif;

  if ( !empty($title) && isset($title) ) :
    $link_title = $title;
  endif;

  $atts['smooth-scroll'] = false;
  
  if (is_front_page()):
    $atts['href'] = !empty($link_url) ? substr($link_url, strpos($link_url, "#") ) : ''; //? $link_url : '';//
    
    if(strpos($atts['href'], '#') !== false) :
      $atts['smooth-scroll'] = true;
    endif;
  else :
    $atts['href'] = !empty($link_url) ? $link_url : '';
  endif; ?>
  
  <a class="cta-button <?php echo $atts['smooth-scroll'] ? 'smooth-scroll' : ''; ?> <?php echo $animation; ?>" href="<?php echo esc_url( $atts['href'] ); ?>" data-delay="<?php echo $animation_delay;?>" target="<?php echo esc_attr( $link_target ); ?>">
    <?php if(! empty($icon)) : ?>
      <figure class="cta-button__figure">
        <?php echo wp_get_attachment_image($icon, "large"); ?>
      </figure>
    <?php endif; ?>

    <span class="cta-button__title">
      <?php echo esc_html( $link_title ); ?>
    </span>
  </a>
 
<?php endif; ?>

<?php //echo $atts['js-trigger'] ? 'js-trigger' : '' ?>