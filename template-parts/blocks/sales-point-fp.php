<?php $section_sales_point = get_field('section_sales_point');
$hours = get_field('godziny_otwarcia', 'option');
$phones = get_field('phones', 'option');
$phones_icon = get_field('phones_icon', 'option');
$address = get_field('adres', 'option');
$address_icon = get_field('address_icon', 'option');

if (!empty($section_sales_point) && isset($section_sales_point)):
  $sec_heading = $section_sales_point['section_title'];

  $season_1_h = $section_sales_point['sezon_1_naglowek'];
  $season_1_d = $section_sales_point['sezon_1_opis'];
  $season_2_h = $section_sales_point['sezon_2_naglowek'];
  $season_2_d = $section_sales_point['sezon_2_opis'];

  $cta_desc = $section_sales_point['cta_description'];
  $button = $section_sales_point['button'];?>

  <section id="sales-point" class="section-sales-point sec-detection fade-in">
    <div class="section-sales-point__content">
      <h2 class="sec-heading">
        <?php echo $sec_heading ?>
      </h2>
      <div class="section-sales-point__open-hours">
        <div class="season">
          <?php if (!empty($season_1_h) && isset($season_1_h)): ?>
            <h3>
              <?php echo $season_1_h;?>
            </h3>
          <?php endif;
            
          if (!empty($hours) && isset($hours)) :
            $icon = $hours['icon']; ?>

            <figure class="section-sales-point__open-hours-figure">
              <?php echo wp_get_attachment_image($icon, "large"); ?>
            </figure>
          <?php endif;

          if (!empty($season_1_d) && isset($season_1_d)):
            echo $season_1_d;
          else: 
            if (!empty($hours) && isset($hours)) : 
            $monday_friday = $hours['pon-pt'];
            $saturday = $hours['sob'];
            $sunday = $hours['nd'];?>
                <p><?php echo esc_html('Pon-pt: ')." ". $monday_friday."<br />".esc_html('Sob:')." ".$saturday."<br />".esc_html('Niedziela i święta:')." ".$sunday;?></p>
            <?php endif;
          endif;?>
        </div>
      
        <div class="season">
          <?php if (!empty($season_2_h) && isset($season_2_h)): ?>
            <h3>
              <?php echo $season_2_h;?>
            </h3>
          <?php endif;

          if (!empty($icon) && isset($icon)) : ?>
            <figure class="section-sales-point__open-hours-figure">
              <?php echo wp_get_attachment_image($icon, "large"); ?>
            </figure>
          <?php endif;

          if (!empty($season_2_d) && isset($season_2_d)):
            echo $season_2_d;
          endif;?>
        </div>             
      </div>

      <?php if (!empty($cta_desc) && isset($cta_desc)):?>
        <div class="section-sales-point__cta">
          <?php echo $cta_desc; ?>
          <?php if (!empty($button) && isset($button)):
            $link_url = $button['url'];
            $link_title = $button['title'];
            $link_target = $button['target'] ? $button['target'] : '_self'; ?>

            <a class="button-green-border" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
              <?php echo esc_html( $link_title ); ?>
            </a>
          <?php endif; ?>           
        </div>
      <?php endif; ?>

      <div class="section-sales-point__contact">
        <?php if (!empty($phones) && isset($phones)) : ?>
        <div class="phones">
          <?php if (!empty($phones_icon) && isset($phones_icon)) : ?>
            <figure class="phones-figure">
              <?php echo wp_get_attachment_image($phones_icon, "large"); ?>
            </figure>
          <?php endif;?>
          <ul class="phone-list remove-ul-styling">
            <?php foreach ($phones as $p) :
                if ($p) :
                    $phone_without_spaces = $p['phone_without_spaces'];
                    $phone_with_spaces = $p['phone_with_spaces'];
                    $phone_type = $p['phone_type'];
                endif;

                if ($phone_type == "Punkt sprzedaży"): ?>
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
          
        <?php if (!empty($address) && isset($address)) : ?>
          <div class="divider"></div>
          
          <div class="address">
            <figure class="address-figure">
              <?php echo wp_get_attachment_image($address_icon, "large"); ?>
            </figure>
            <?php echo $address; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>

    <div class="section-sales-point__map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12578.851245702312!2d20.600476991307087!3d49.915745878113185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4716272b74510643%3A0xd939c7da8fea1e89!2zU3prw7PFgmthIFJvxZtsaW4gTWlrdWxzY3k!5e0!3m2!1spl!2spl!4v1629706934958!5m2!1spl!2spl" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
  </section>
<?php endif; ?>