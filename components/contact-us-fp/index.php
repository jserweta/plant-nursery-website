<?php
$sec_contact = get_field('section_contact');
$phones = get_field('phones', 'option');
$phones_icon = get_field('phones_icon', 'option');
$emails = get_field('e-mails', 'option');
$email_icon = get_field('email_icon', 'option');

if (!empty($sec_contact) && isset($sec_contact)):
    $sec_heading = $sec_contact['section_title'];
    $sec_background = $sec_contact['section_hero_background'];
    $form = $sec_contact['form_shortcode']; ?>

    <div id="contact" class="section-contact">
        <?php if (!empty($sec_heading) && isset($sec_heading)) : ?>
        <div class="section-contact__hero">
            <h2 class="sec-heading"><?php echo $sec_heading ?></h2>

            <div class="image-wrapper">
                <div class="overlay"></div>
                <img class="contact-hero-background" <?php awesome_acf_responsive_image($sec_background['id'], 'full', '2000px'); ?> alt="<?= esc_html($sec_background['alt']);?>">
            </div>
        </div>
        <?php endif;?>

        <div class="section-contact__content container">
            <div class="section-contact__contact-info">
                
                <?php if (!empty($phones) && isset($phones)) : ?>
                <div class="phones">
                    <?php if (!empty($phones_icon) && isset($phones_icon)) :
                        echo $phones_icon;
                    endif;?>

                    <ul class="phone-list remove-ul-styling">
                        <li class="phone-item-type"><?php echo esc_html("Szkółka roślin"); ?></li>
                        <?php foreach ($phones as $p) {
                            if ($p) :
                                $phone_without_spaces = $p['phone_without_spaces'];
                                $phone_with_spaces = $p['phone_with_spaces'];
                                $phone_type = $p['phone_type'];
                            endif;
                        if ($phone_type == "Szkółka roślin"):
                        ?>
                            <li class="phone-item">
                                <a class="phone-link" href="tel:<?php echo $phone_without_spaces ?>" aria-label="<?php echo $phone_without_spaces ?>"><?php echo $phone_with_spaces; ?></a>
                            </li>
                        <?php 
                        endif;
                    } ?>
                    </ul>

                    <ul class="phone-list remove-ul-styling">
                        <li class="phone-item-type"><?php echo esc_html("Punkt sprzedaży"); ?></li>
                        <?php foreach ($phones as $p) {
                            if ($p) :
                                $phone_without_spaces = $p['phone_without_spaces'];
                                $phone_with_spaces = $p['phone_with_spaces'];
                                $phone_type = $p['phone_type'];
                            endif;
                        if ($phone_type == "Punkt sprzedaży"):
                        ?>
                            <li class="phone-item">
                                <a class="phone-link" href="tel:<?php echo $phone_without_spaces ?>" aria-label="<?php echo $phone_without_spaces ?>"><?php echo $phone_with_spaces; ?></a>
                            </li>
                        <?php 
                        endif;
                    } ?>
                    </ul>
                </div>
                <?php endif; ?>
                
                <div class="divider"></div>
               
                <?php if (!empty($emails) && isset($emails)) : ?>
                <div class="emails">
                    <?php 
                    if (!empty($email_icon) && isset($email_icon)) :
                        echo $email_icon;
                    endif;?>

                    <ul class="e-mails-list remove-ul-styling">
                        <?php foreach ($emails as $e) {
                            if ($e) :
                                $email = $e['e-mail'];
                            endif ?>
                            <li class="e-mail-item">
                                <a class="e-mail-link" href="mailto:<?php echo $email ?>" aria-label="<?php echo $email ?>"><?php echo $email ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <?php endif; ?>
            </div>
            <?php

            if (!empty($form) && isset($form)): ?>
            <div class="section-contact__form">
                <?php echo do_shortcode($form); ?>
            </div>
            <?php endif; ?>

        </div>
    </div>


<?php endif; ?>