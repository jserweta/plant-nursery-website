<?php
$section_about_us = get_field('section_about_us');

if (!empty($section_about_us) && isset($section_about_us)):
  $desc = $section_about_us['description'];
  $button = $section_about_us['button'];
  $image = $section_about_us['image'];

  if (!empty($button) && isset($button)):
    $link_url = $button['url'];
    $link_title = $button['title'];
    $link_target = $button['target'] ? $button['target'] : '_self';
  endif; ?>
  
  <section id="about-us" class="section-about-us sec-detection fade-in">
    <figure class="section-about-us__image">
      <?php echo wp_get_attachment_image($image['id'], 'large', false, []); ?>
    </figure>

    <div class="section-about-us__content">
      <?php echo $desc;?>

      <a class="button-white" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
        <?php echo esc_html( $link_title ); ?>
      </a>
    </div>
  </section>
<?php endif; ?>