<?php

/**
 * Template Name: Oferta
 *
 * @package imenet
 */
$page_title = get_the_title();
$offer = get_field('offer');
$product_catalog = get_field('product_catalog', 'option');

get_header(); ?>

<div class="products-page" class="content-area">
    <main id="main" class="site-main">
        <?php
        if (!empty($page_title) && isset($page_title)) : ?>
            <div class="container">
                <h1 class="page-title-heading"><?php echo esc_html($page_title); ?></h1>
            </div>
        <?php endif;

        if (!empty($offer) && isset($offer)) :
            $desc = $offer['description'];
            $button = $offer['button'];
            if (!empty($button) && isset($button)) :
                $button_type = $button['button_type'];
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
                    $button_link = $button['button_link'];
                    $button_icon = $button['button_icon'];
                endif;
            endif;
            if (!empty($desc) && isset($desc)) :?>
            <section class="products-page__info container">
                <?php echo $desc; 
                if (!empty($button_link) && isset($button_link)) :
                    get_template_part('components/cta-button/index', null, array( 
                        'button_icon' => $button_icon,
                        'button_link'  => $button_link,
                        'button_title' => $button_title)
                    );
                endif; ?>
            </section>
            <?php endif; ?>
            <section id="products-container-anchor" class="products-page__products-section container">
                <div class="products-page__products-filters">
                    <h2 class="filters-title"><?php echo esc_html__('Kategoria', 'imenet') ?></h2>
                    <ul class="product-categories remove-ul-styling">
                        <li class="product-single-cat js-filter-item">
                            <a href="<?php echo get_post_type_archive_link( "products"); ?>" value="<?php echo esc_html("Wszystkie produkty"); ?>">
                                <span><?php echo esc_html("Wszystkie produkty"); ?></span>
                                <span class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="7.657" height="13.314" viewBox="0 0 7.657 13.314"><path d="M7.071,2.828l-4.95,4.95A1,1,0,1,1,.707,6.364L6.364.707a1,1,0,0,1,1.414,0l5.657,5.657a1,1,0,1,1-1.414,1.414l-4.95-4.95Z" transform="translate(8.071 -0.414) rotate(90)"/></svg>
                                </span>
                            </a>
                        </li>
                        <?php
                            $args = array(
                            'taxonomy' => 'product_category',
                            'orderby' => 'name',
                            'order'   => 'ASC',
                            'hide_empty' => false
                        );
                
                        $categories = get_categories($args);
                        
                        foreach ($categories as $category) : ?>
                            <li class="product-single-cat js-filter-item">
                                <a data-category="<?= $category->term_id ?>" href="<?php echo get_category_link($category->term_id) ?>" value="<?php echo esc_html($category->name); ?>">
                                    <span><?php echo esc_html($category->name); ?></span>
                                    <span class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="7.657" height="13.314" viewBox="0 0 7.657 13.314"><path d="M7.071,2.828l-4.95,4.95A1,1,0,1,1,.707,6.364L6.364.707a1,1,0,0,1,1.414,0l5.657,5.657a1,1,0,1,1-1.414,1.414l-4.95-4.95Z" transform="translate(8.071 -0.414) rotate(90)"/></svg>
                                    </span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="posts-container products-page__products-container">
                    <?php
                        $params = array(
                            'post_type' => 'products',
                            'post_status' => 'publish',
                            'posts_per_page' => 9                           
                        );

                        $query = new WP_Query($params);
                        
                        if ($query->have_posts()) : ?>
                            <ul id="products-container" class="remove-ul-styling products-grid" data-page="<?= get_query_var('paged') ? get_query_var('paged') : 1; ?>" data-max="<?= $query->max_num_pages; ?>">
                                <?php while ($query->have_posts()) : $query->the_post();
                                    get_template_part('components/product-thumbnail/index');
                                endwhile; ?>
                            </ul>
                            <div id="pagination" data-category="-1">
                                <?php numeric_pagination($query);?>
                            </div>
                        <?php else :
                            get_template_part('template-parts/content', 'none');
                        endif; ?>
                </div>
                
            </section>


        <?php endif; ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();
