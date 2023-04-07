<?php
$sec_contact  = get_field('section_contact');
$phones       = get_field('phones', 'option');
$phones_icon  = get_field('phones_icon', 'option');
$emails       = get_field('e-mails', 'option');
$email_icon   = get_field('email_icon', 'option');

if (!empty($sec_contact) && isset($sec_contact)) :
  $sec_heading = $sec_contact['section_title'];
  $sec_background = $sec_contact['section_hero_background'];
  $form = $sec_contact['form_shortcode']; ?>

  <section id="contact" class="section-contact sec-detection">
    <?php if (!empty($sec_heading) && isset($sec_heading)) : ?>
      <div class="section-contact__hero">
        <h2 class="sec-heading">
          <?php echo $sec_heading ?>
        </h2>

        <figure class="image-wrapper">
          <div class="overlay"></div>
          <?php if (!empty($sec_background)) :
            echo wp_get_attachment_image($sec_background['id'], 'large', false, ["class" => "contact-hero-background"]);
          endif; ?>
        </figure>
      </div>
    <?php endif; ?>

    <div class="section-contact__content container ">
      <div class="section-contact__contact-info fade-in">
        <div class="section-contact__contact-info-wrapper">
          <?php if (!empty($phones) && isset($phones)) : ?>
            <div class="phones">
              <?php if (!empty($phones_icon) && isset($phones_icon)) : ?>
                <figure class="phones-figure">
                  <?php echo wp_get_attachment_image($phones_icon, "large"); ?>
                </figure>
              <?php endif; ?>

              <ul class="phone-list remove-ul-styling">
                <li class="phone-item-type">
                  <?php echo esc_html("Szkółka roślin"); ?>
                </li>

                <?php foreach ($phones as $p) :
                  if ($p) :
                    $phone_without_spaces = $p['phone_without_spaces'];
                    $phone_with_spaces = $p['phone_with_spaces'];
                    $phone_type = $p['phone_type'];
                  endif;

                  if ($phone_type == "Szkółka roślin") : ?>
                    <li class="phone-item">
                      <a class="phone-link" href="tel:<?php echo $phone_without_spaces ?>" aria-label="<?php echo $phone_without_spaces ?>">
                        <?php echo $phone_with_spaces; ?>
                      </a>
                    </li>
                <?php endif;
                endforeach; ?>
              </ul>

              <ul class="phone-list remove-ul-styling">
                <li class="phone-item-type">
                  <?php echo esc_html("Punkt sprzedaży"); ?>
                </li>

                <?php foreach ($phones as $p) :
                  if ($p) :
                    $phone_without_spaces = $p['phone_without_spaces'];
                    $phone_with_spaces = $p['phone_with_spaces'];
                    $phone_type = $p['phone_type'];
                  endif;

                  if ($phone_type == "Punkt sprzedaży") : ?>
                    <li class="phone-item">
                      <a class="phone-link" href="tel:<?php echo $phone_without_spaces ?>" aria-label="<?php echo $phone_without_spaces ?>">
                        <?php echo $phone_with_spaces; ?>
                      </a>
                    </li>
                <?php endif;
                endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>

          <div class="divider"></div>

          <?php if (!empty($emails) && isset($emails)) : ?>
            <div class="emails">
              <?php if (!empty($email_icon) && isset($email_icon)) : ?>
                <figure class="emails-figure">
                  <?php echo wp_get_attachment_image($email_icon, "large"); ?>
                </figure>
              <?php endif; ?>

              <ul class="e-mails-list remove-ul-styling">
                <?php foreach ($emails as $e) :
                  if ($e) :
                    $email = $e['e-mail'];
                  endif; ?>

                  <li class="e-mail-item">
                    <a class="e-mail-link" href="mailto:<?php echo $email ?>" aria-label="<?php echo $email ?>">
                      <?php echo $email ?>
                    </a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>
        </div>
      </div>

      <?php if (!empty($form) && isset($form)) : ?>
        <div class="section-contact__form fade-in" data-delay="100">
          <?php echo do_shortcode($form); ?>
        </div>
      <?php endif; ?>
    </div>
  </section>
<?php endif; ?>