<?php 
if ( !empty($args) && isset($args) ) {
    $icon = $args['button_icon'];
    $link = $args['button_link'];
    $title = $args['button_title'];
    if ( !empty($link) && isset($link) ) {
        $link_url = $link['url'];
        $link_title = $link['title'];
        $link_target = $link['target'] ? $link['target'] : '_self';
    }

    if ( !empty($title) && isset($title) ){
        $link_title = $title;
    }

    $atts['class'] = "cta-button";
    
    if (is_front_page()):
        $atts['href'] = !empty($link_url) ? substr($link_url, strpos($link_url, "#") ) : ''; //? $link_url : '';//
        
        if(strpos($atts['href'], '#') !== false):
            $atts['class'] .= " js-trigger";
        endif;
        
    else:
        $atts['href'] = !empty($link_url) ? $link_url : '';
    endif;
    ?>
    
    <a class="<?php echo $atts['class'];?>" href="<?php echo esc_url( $atts['href'] ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
        <?php echo $icon;?>
        <h3 class="cta-button__title">
            <?php echo esc_html( $link_title ); ?>
        </h3>
    </a>
<?php } ?>