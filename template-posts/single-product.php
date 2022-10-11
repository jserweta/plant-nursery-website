<?php
/**
 * 
 * Template Name: Products
 * Template Post Type: products
 * 
 * The template for displaying all single product posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package imenet
 */

$product = get_field('single_product');
$product_catalog = get_field('product_catalog', 'option');

get_header(); ?>

<div class="content-area product">
	<main id="primary" class="site-main">
    <?php while (have_posts()) : the_post(); 
      if (!empty($product) && isset($product)):
				$subtitle = $product['subtitle'];
				$image_gallery = $product['image_gallery'];
				$characteristics = $product['characteristics_group'];
				$parameters = $product['parameters_group'];
				$buttons = $product['buttons']; ?>

			  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				  <div class="product__hero container">
					  <div class="product__hero-details slide-right">
					    <?php $product_terms = get_the_terms($post->ID, 'product_category');
                if ($product_terms) : 
								  foreach ($product_terms as $product_term) :
									  $term_name = $product_term->name; ?>

									  <h3 class="product-cat">
                      <?php echo esc_html($term_name); ?>
                    </h3>
						      <?php endforeach;
                endif; ?>

                <h1 class="product-name">
                  <?php echo esc_html(get_the_title()); ?>
                </h1>

                <?php if (!empty($subtitle) && isset($subtitle)): ?>
                  <h4 class="title-latin">
                    <?php echo esc_html($subtitle); ?>
                  </h4>
                <?php endif; ?>
					    </div>

              <?php if (!empty($image_gallery) && isset($image_gallery)):?>
                <div class="swiper-container product__hero-swiper slide-left">
                  <div class="swiper-wrapper">
                    <?php foreach ($image_gallery as $index=>$img):?>
                      <div class="swiper-slide">
                        <?php echo wp_get_attachment_image($img['id'], 'full', false, ["class" => "swiper-image"]); ?>
                      </div>
                    <?php endforeach; ?>
                  </div>
                  <div class="swiper-pagination"></div>		
                </div>
              <?php endif; ?>
            </div>

            <div class="container product__info">
              <?php if (!empty($characteristics) && isset($characteristics)):
                $title = $characteristics['characteristics_title'];
                $desc = $characteristics['characteristics_description']; ?>

                <div class="characteristics fade-in">
                  <?php if (!empty($title) && isset($title)): ?>
                    <h2 class="sec-heading"><?php echo esc_html($title); ?></h2>
                  <?php endif;
                  if (!empty($desc) && isset($desc)):
                    echo $desc;
                  endif; ?>
                </div>
              <?php endif;

              if (!empty($parameters) && isset($parameters)): 
                $title = $parameters['plant_parameters_title'];
                $parameter = $parameters['plant_parameters']; ?>

                <div class="plant-parameters fade-in" data-delay="100">
                  <?php if (!empty($title) && isset($title)): ?>
                    <h2 class="sec-heading">
                      <?php echo esc_html($title); ?>
                    </h2>
                  <?php endif;?>

                  <div class="plant-parameters__list">
                    <?php foreach ($parameter as $idx => $p):
                        if ($p):
                          $icon = $p['parameter_icon'];
                          $param_value = $p['parameter_value'];
                        endif;
                        
                        $value = $icon['value'];
                        $label = $icon['label']; ?>
                      <div class="plant-parameters__item fade-in" data-delay="<?php echo $idx*40; ?>">
                        <div class="plant-parameters__label">
                          <?php if ($value == "group"):
                              echo '<svg xmlns="http://www.w3.org/2000/svg" width="44.265" height="37" viewBox="0 0 44.265 37"><g transform="translate(-924.115 -433.129)"><path d="M925.185,455.867c9.49-1.306,14.912,1.038,17.511,4.439a9.777,9.777,0,0,1,.792,10.435c-1.659,3.125-4.893,5-8.569,3.412-3.535-1.531-7.458-6.474-10.507-17.106l-.3-1.031,1.07-.147Zm16.029,5.57c-2.142-2.8-6.681-4.75-14.7-3.858,2.809,9.282,6.167,13.577,9.141,14.865,2.62,1.134,4.96-.269,6.182-2.572a7.9,7.9,0,0,0-.623-8.435Z" transform="translate(0 -16.792)" /><path d="M1040.364,435.018c-8.063-.287-12.423,1.882-14.328,4.721a7.508,7.508,0,0,0,.146,8.325c1.478,2.2,4.019,3.428,6.578,2.078,2.836-1.5,5.742-5.929,7.6-15.124Zm-15.875,3.685c2.316-3.451,7.516-6.066,17.05-5.5l1.055.063-.193,1.035c-1.974,10.572-5.389,15.7-8.772,17.486-3.548,1.873-7.012.264-8.993-2.691a9.373,9.373,0,0,1-.146-10.4Z" transform="translate(-74.214)"/><path d="M1018.893,477.448a.932.932,0,0,0-.73-1.715c-3.684,1.579-6.816,5.227-8.87,9.9a32.114,32.114,0,0,0-2.485,15.577.931.931,0,1,0,1.854-.168A30.214,30.214,0,0,1,1011,486.38c1.871-4.252,4.66-7.547,7.892-8.932Z" transform="translate(-61.975 -31.924)"/><path d="M972.039,495.469a.932.932,0,1,0-1.262,1.372,15.017,15.017,0,0,1,4.576,7.329c.848,2.983,1.13,6.675,1.315,11.671a.931.931,0,1,0,1.861-.066c-.19-5.142-.485-8.959-1.38-12.109a16.779,16.779,0,0,0-5.109-8.2Z" transform="translate(-34.8 -46.61)" /></g></svg>';
                            elseif ($value == "height"):
                              echo '<svg xmlns="http://www.w3.org/2000/svg" width="22.2" height="37" viewBox="0 0 22.2 37"><g transform="translate(124.6) rotate(90)"><g transform="translate(0 115.967)"><g transform="translate(0 0)"><path d="M36.383,290.133H.617A.616.616,0,0,0,0,290.75v7.4a.616.616,0,0,0,.617.617H36.383A.616.616,0,0,0,37,298.15v-7.4A.616.616,0,0,0,36.383,290.133Zm-.617,7.4H1.233v-6.167h1.85V292.6a.617.617,0,0,0,1.233,0v-1.233H6.783v2.467a.617.617,0,0,0,1.233,0v-2.467h2.467V292.6a.617.617,0,0,0,1.233,0v-1.233h2.467v2.467a.617.617,0,0,0,1.233,0v-2.467h2.467V292.6a.617.617,0,0,0,1.233,0v-1.233h2.467v2.467a.617.617,0,0,0,1.233,0v-2.467h2.467V292.6a.617.617,0,0,0,1.233,0v-1.233h2.467v2.467a.617.617,0,0,0,1.233,0v-2.467h2.468V292.6a.617.617,0,0,0,1.233,0v-1.233h1.849v6.167Z" transform="translate(0 -290.133)"/></g></g><g transform="translate(0 102.4)"><path d="M.617,102.4a.616.616,0,0,0-.617.617V113.5a.617.617,0,0,0,1.233,0V103.017A.616.616,0,0,0,.617,102.4Z" transform="translate(0 -102.4)"/></g><g transform="translate(35.767 102.4)"><path d="M495.551,102.4a.616.616,0,0,0-.617.617V113.5a.617.617,0,0,0,1.233,0V103.017A.616.616,0,0,0,495.551,102.4Z" transform="translate(-494.934 -102.4)" /></g><g transform="translate(2.467 104.249)"><path d="M66.068,131.915l-2.863-3.7a.549.549,0,0,0-.635-.185.617.617,0,0,0-.377.58v3.083H38.142v-3.084a.616.616,0,0,0-.377-.58.547.547,0,0,0-.635.185l-2.863,3.7a.655.655,0,0,0,0,.79l2.863,3.7a.557.557,0,0,0,.44.221.539.539,0,0,0,.195-.037.617.617,0,0,0,.377-.58v-3.083h24.05v3.083a.616.616,0,0,0,.377.58.539.539,0,0,0,.195.037.56.56,0,0,0,.44-.221l2.863-3.7a.654.654,0,0,0,0-.791ZM37,134.307l-1.545-2,1.545-2Zm26.34,0v-3.994l1.545,2Z" transform="translate(-34.134 -127.993)"/></g></g></svg>';
                            elseif ($value == "position"):
                              echo '<svg xmlns="http://www.w3.org/2000/svg" width="34.336" height="37" viewBox="0 0 34.336 37"><g transform="translate(-381.135 -416.386)"><path d="M453.054,440.962a8.195,8.195,0,1,1-2.675,15.943l-.007-.018a4.752,4.752,0,0,0-.9-1.478,4.756,4.756,0,0,0,.238-.487,6.662,6.662,0,1,0-3.285-6.457q-.165-.039-.334-.066a4.751,4.751,0,0,0-1.2-.041,8.2,8.2,0,0,1,8.156-7.394Z" transform="translate(-50.717 -19.548)"/><path d="M431.108,449.858a.765.765,0,0,0,.766-1.323l-2.8-1.615a.765.765,0,0,0-.767,1.323l2.8,1.615Z" transform="translate(-37.221 -24.204)"/><path d="M482.146,417.153a.766.766,0,1,0-1.533,0v3.23a.766.766,0,0,0,1.533,0v-3.23Z" transform="translate(-79.124)"/><path d="M506.2,425.7a.763.763,0,1,0-1.323-.76l-1.615,2.8a.763.763,0,1,0,1.323.761l1.615-2.8Z" transform="translate(-97.056 -6.496)"/><path d="M523.59,448.249a.763.763,0,1,0-.76-1.323l-2.8,1.615a.763.763,0,0,0,.761,1.323l2.8-1.615Z" transform="translate(-110.174 -24.21)"/><path d="M529.667,478.762a.767.767,0,0,0,0-1.533h-3.23a.767.767,0,0,0,0,1.533Z" transform="translate(-114.963 -48.394)"/><path d="M522.83,502.814a.763.763,0,1,0,.76-1.323l-2.8-1.615a.763.763,0,1,0-.761,1.323l2.8,1.615Z" transform="translate(-110.174 -66.326)"/><path d="M482.146,523.053a.766.766,0,1,0-1.533,0v3.23a.766.766,0,1,0,1.533,0v-3.23Z" transform="translate(-79.124 -84.233)"/><path d="M504.874,520.207a.763.763,0,1,0,1.324-.76l-1.615-2.8a.763.763,0,0,0-1.323.761l1.615,2.8Z" transform="translate(-97.056 -79.444)"/><path d="M451.924,428.494a.763.763,0,0,0,1.324-.761l-1.615-2.8a.763.763,0,1,0-1.323.76l1.615,2.8Z" transform="translate(-54.94 -6.496)"/><path d="M394.261,483.814a2.451,2.451,0,0,0,1.979-4.484l-1.165-.534,1.021-.772a2.45,2.45,0,0,0-2.894-3.953l-1.046.743L392,473.542a2.45,2.45,0,0,0-4.87.534l.12,1.27-1.176-.5a2.451,2.451,0,0,0-1.979,4.484l1.165.534-1.021.771a2.45,2.45,0,0,0,2.894,3.953l1.046-.742.158,1.272a2.45,2.45,0,0,0,4.87-.534l-.119-1.27,1.176.5Zm2.424,1.44a3.98,3.98,0,0,1-2,.246,3.982,3.982,0,0,1-7.6.829,3.981,3.981,0,0,1-4.518-6.171,3.98,3.98,0,0,1,3.084-7,3.982,3.982,0,0,1,7.6-.829,3.98,3.98,0,0,1,4.518,6.171,3.976,3.976,0,0,1-1.084,6.75Zm-9.511-3.731A3.712,3.712,0,1,1,389.6,483a3.7,3.7,0,0,1-2.426-1.473Zm.837-2.525a2.184,2.184,0,1,0,.868-1.426,2.173,2.173,0,0,0-.868,1.426Z" transform="translate(0 -42.536)"/><path d="M387.763,546.608a.763.763,0,0,0-1.425-.545,24.165,24.165,0,0,0-.818,2.864c-.645,2.651-1.348,5.534-3.664,5.685a.765.765,0,0,0,.1,1.527c3.44-.224,4.281-3.677,5.054-6.852a23.307,23.307,0,0,1,.758-2.678Z" transform="translate(-0.002 -102.754)"/></g></svg>';
                            elseif($value == "flowering"):
                              echo '<svg xmlns="http://www.w3.org/2000/svg" width="2048" height="2048" viewBox="0 0 2048 2048"><rect width="2048" height="2048" fill="none"/><rect width="1536" height="1536" transform="translate(255.999 255.999)" fill="none"/><path d="M756.864,1003.16a31.906,31.906,0,0,0-34,54c127.322,80.411,195.529,187.018,227.06,309.874,32.288,125.8,26.891,269.794,6.872,420.84a31.893,31.893,0,1,0,63.25,8.251c20.942-158.007,26.329-309.64-8.372-444.842-35.456-138.149-112.011-257.936-254.811-348.123Z" /><path d="M1666.2,844.9a111.776,111.776,0,0,0,39.524-151.729l-.053.031a111.683,111.683,0,0,0-151.177-41.733l-46.579,25.981-.8-53.48a111.716,111.716,0,0,0-223.4,0l-.79,53.48-46.585-25.981a111.789,111.789,0,0,0-151.182,41.617v.125a111.648,111.648,0,0,0,39.48,151.689l45.83,27.373-45.83,27.378a111.657,111.657,0,0,0-39.47,151.707v.125a111.781,111.781,0,0,0,151.173,41.6l46.585-25.984.79,53.484a111.8,111.8,0,0,0,111.7,109.967v-.125a111.591,111.591,0,0,0,111.7-109.841l.789-53.484,46.586,25.984a111.791,111.791,0,0,0,151.177-41.609v-.125a111.648,111.648,0,0,0-39.471-151.7l-45.828-27.371L1666.2,844.9ZM1778.784,793.1a175.526,175.526,0,0,1-44.9,79.166,175.674,175.674,0,0,1,27.035,211.078l-.054-.032a175.513,175.513,0,0,1-196.239,82.075,175.7,175.7,0,0,1-169.209,129.033v-.125a175.425,175.425,0,0,1-169.21-128.907,175.5,175.5,0,0,1-196.235-82.067l-.054.032a175.68,175.68,0,0,1,27.031-211.081,175.675,175.675,0,0,1-27.04-211.067l.054.032a175.509,175.509,0,0,1,196.245-82.082,175.5,175.5,0,0,1,338.414,0,175.649,175.649,0,0,1,196.3,82.041v.125A174.775,174.775,0,0,1,1778.784,793.1Zm-383.366,242.707a163.537,163.537,0,1,1,115.629-47.9,163.024,163.024,0,0,1-115.629,47.9Zm-70.384-93.15a99.555,99.555,0,1,0-29.148-70.387,99.224,99.224,0,0,0,29.148,70.387Z" /><path d="M851.923,746.77a111.776,111.776,0,0,0,39.524-151.729l-.053.031a111.683,111.683,0,0,0-151.176-41.733L693.64,579.319l-.8-53.48a111.716,111.716,0,0,0-223.4,0l-.789,53.48-46.586-25.981a111.789,111.789,0,0,0-151.182,41.617v.125a111.648,111.648,0,0,0,39.48,151.689l45.832,27.373-45.832,27.378a111.657,111.657,0,0,0-39.47,151.707v.125a111.781,111.781,0,0,0,151.173,41.6l46.586-25.983.789,53.483a111.8,111.8,0,0,0,111.7,109.967v-.125a111.591,111.591,0,0,0,111.7-109.841l.79-53.483,46.585,25.983a111.791,111.791,0,0,0,151.176-41.609v-.125a111.648,111.648,0,0,0-39.471-151.7L806.1,774.15l45.827-27.38Zm112.584-51.795a175.526,175.526,0,0,1-44.9,79.166,175.675,175.675,0,0,1,27.035,211.078l-.054-.032a175.513,175.513,0,0,1-196.239,82.075A175.7,175.7,0,0,1,581.142,1196.3v-.125a175.425,175.425,0,0,1-169.21-128.907A175.5,175.5,0,0,1,215.7,985.2l-.054.032a175.68,175.68,0,0,1,27.031-211.081,175.675,175.675,0,0,1-27.04-211.067l.054.032a175.509,175.509,0,0,1,196.245-82.082,175.5,175.5,0,0,1,338.414,0,175.649,175.649,0,0,1,196.3,82.041v.125a174.774,174.774,0,0,1,17.863,131.779ZM581.141,937.682a163.537,163.537,0,1,1,115.629-47.9,163.024,163.024,0,0,1-115.629,47.9Zm-70.384-93.15a99.555,99.555,0,1,0-29.148-70.387,99.224,99.224,0,0,0,29.148,70.387Z" /><path d="M1255.37,1161.75a31.9,31.9,0,0,0-60.751-19.5c-39.473,123.24-39.474,123.242-216.48,377.857a31.971,31.971,0,1,0,52.5,36.5c182.209-262.1,182.211-262.1,224.731-394.858Z" /></svg>';
                            elseif ($value == "use"):
                              echo '<svg xmlns="http://www.w3.org/2000/svg" width="31.139" height="37.159" viewBox="0 0 31.139 37.159"><g transform="translate(-662.346 -1042.669)"><path d="M786.773,1042.669l4.277,3.311-.958,1.24-4.277-3.311.958-1.24Z" transform="translate(-97.565)" /><path d="M728,1052.189l-18.208,23.523-1.24-.958,18.208-23.523,1.24.958Z" transform="translate(-36.509 -6.766)" /><path d="M668.5,1143.781l9.267,7.173.62.48-.479.619-3.724,4.811a6.435,6.435,0,0,1-9,1.148l-.356-.276a6.436,6.436,0,0,1-1.148-9l3.724-4.811.48-.62.619.479Zm7.689,7.933-8.028-6.214-3.244,4.191a4.865,4.865,0,0,0,.865,6.8l.356.276a4.866,4.866,0,0,0,6.8-.865l3.245-4.193Z" transform="translate(0 -79.52)" /></g></svg>';
                            endif; ?>
                            <p>
                              <?php echo esc_html($label); ?>
                            </p>
                        </div>

                        <div class="plant-parameters__value">
                          <p>
                            <?php echo esc_html($param_value); ?>
                          </p>
                        </div>
                      </div>
                    <?php endforeach;?>
                  </div>
                </div>
              <?php endif; ?>
            </div>

            <?php if (!empty($buttons) && isset($buttons)): ?>
              <div class="product__buttons container">
                <?php foreach ($buttons as $idx => $b):
                  if ($b):
                    $button_type = $b['button_type'];
                  endif;

                  if ($button_type == 'catalog'):
                    if (!empty($product_catalog) && isset($product_catalog)):
                      $cat_button = $product_catalog['button'];
                      
                      if (!empty($cat_button) && isset($cat_button)):
                        $button_title = $cat_button['button_title'];
                        $button_icon = $cat_button['button_icon'];
                      endif;
          
                      $product_cat_file = $product_catalog['product_catalog_file'];
                      if (!empty($product_cat_file) && isset($product_cat_file)):
                        $button_link = $product_cat_file;
                      endif;
                    endif;
                  else:
                    $button_title = '';
                    $button_link = $b['button_link'];
                    $button_icon = $b['button_icon'];
                  endif;

                  get_template_part('template-parts/components/cta-button', null, array( 
                    'button_icon' => $button_icon,
                    'button_link'  => $button_link,
                    'button_title' => $button_title,
                    'class' => "fade-in",
                    "data-delay" => 100 * $idx)
                  );
                endforeach; ?>
              </div>
            <?php endif;?>	
          </div>					
        </article>
      <?php endif;?>
    <?php endwhile; ?>
  </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
