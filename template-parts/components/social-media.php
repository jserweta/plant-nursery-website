<?php 
$social_media = get_field('social_media', 'option');

if (!empty($social_media) && isset($social_media)) : ?>
  <ul class="social-medias remove-ul-styling">
    <?php foreach ($social_media as $s) :
      if ($s) :
        $icon = $s['icon'];
        $url = $s['url'];
        if (!empty($url) && isset($url)) :
            $link_url = $url['url'];
            $link_title = $url['title'];
            $link_target = $url['target'] ? $url['target'] : '_self';
        endif;
      endif; ?>
      <li class="social-medias__social-media">
        <a class="social-medias__social-media-link no-text-link no-external-link-indicator" href="<?php echo $link_url ?>" target="<?php echo esc_attr( $link_target ); ?>">
          <span class="screen-reader-text">
            <?php echo esc_html('Social Media link '); ?>
            <?php echo $link_title ?>
          </span>
          <figure class="social-medias__social-media-link-figure">
            <?php echo wp_get_attachment_image($icon, "large"); ?>
          </figure>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>