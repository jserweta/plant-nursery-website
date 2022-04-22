<?php 
$hero = get_field('hero');
$hours = get_field('godziny_otwarcia', 'option');

if (!empty($hero) && isset($hero)):
    $hero_elements = $hero['hero_elements'];
    if (!empty($hero_elements) && isset($hero_elements)):?>

    <div class="swiper-container fp-hero-slider">
        <div class="swiper-wrapper">
        <?php
        foreach ($hero_elements as $index=>$he){
        if ($he):
            $hero_background = $he['background_image'];
            $hero_heading = $he['heading'];
            $hero_desc = $he['description'];
            $hero_link = $he['link'];

            if($hero_link):
                $hero_url = $hero_link['url'];
                $hero_url_title = $hero_link['title'];
                $hero_url_target = $hero_link['target'] ? $hero_link['target'] : '_self';
            endif;
        endif;
            
            ?>
            <div class="swiper-slide">
                <!-- <div class="swiper-slide-container container"> -->
                    <div class="container">
                        <div class="swiper-content">
                            <div class="swiper-content__info">
                                <?php
                                if ($index == 0):
                                    if (!empty($hours) && isset($hours)) : 
                                        $monday_friday = $hours['pon-pt'];
                                        $saturday = $hours['sob'];
                                        $sunday = $hours['nd'];
                                        $icon = $hours['icon'];?>
                                        <div class="swiper-content__open-hours">
                                            <?php echo $icon; ?>
                                            <h1 class="swiper-content__heading"><?php echo esc_html('Pon-pt: ')." ". $monday_friday."<br />".esc_html('Sob:')." ".$saturday;?></h1>
                                        </div>
                                    <?php endif; ?>
                                <?php else:
                                    if(!empty($hero_heading) && isset($hero_heading)):?>
                                    <h1 class="swiper-content__heading"><?= $hero_heading;?></h1>
                                    <?php endif;
        
                                    if(!empty($hero_desc) && isset($hero_desc)):?>
                                    <p class="swiper-content__desc"> <?= $hero_desc;?></p>
                                    <?php endif; 
                                endif;?>
                            </div>
                           
                          
                                <?php if(!empty($hero_link) && isset($hero_link)):?>
                                    <a href="<?= esc_url($hero_url); ?>" class="js-trigger button-green swiper-content__button" target="<?= esc_attr($hero_url_target); ?>">
                                        <?= esc_html($hero_url_title); ?>
                                    </a>
                                <?php endif; ?>
                           
                           

                        </div>
                    </div>
                   
                    <div class="image-wrapper">
                        <div class="overlay"></div>
                        <img class="swiper-image" <?php awesome_acf_responsive_image($hero_background['id'], 'full', '2000px'); ?> alt="<?= esc_html($hero_background['alt']);?>">
                    </div>
                    
                
                </div>
            <!-- </div> -->
            <?php
            }?>
        </div>
        <!-- <div class="container"> -->
            <div class="swiper-pagination"></div>
        <!-- </div> -->
        
    </div>

    <?php endif;?>
<?php endif;?>