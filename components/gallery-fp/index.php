<?php 
$sec_gallery = get_field('section_gallery');

if (!empty($sec_gallery) && isset($sec_gallery)):
    $gallery = $sec_gallery['gallery']; 
    $button_icon = $sec_gallery['button_icon'];
    $button_link = $sec_gallery['button_link'];?>
    <section id="gallery" class="section-gallery">
    <?php if( $gallery ): ?>
        <ul class="remove-ul-styling section-gallery__gallery">
            <?php foreach( $gallery as $index => $image ):?>
                <li class="section-gallery__single-image">
                    <a href="<?php echo esc_url($image['sizes']['large']); ?>" desc="<?php echo esc_attr($image['description']); ?>" class="section-gallery__single-image-link">
                         <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" width="300" height="300"/>
                         <div class="single-image-overlay">
                            <h3><?php echo esc_html($image['caption']); ?></h3>
                        </div>
                    </a>
                    <?php if ($index == 0):
                            if (!empty($button_link) && isset($button_link)) : 
                                get_template_part('components/cta-button/index', null, array( 
                                    'button_icon' => $button_icon,
                                    'button_link'  => $button_link)
                                );
                            endif; 
                        endif;?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    </section>
<?php endif;?>