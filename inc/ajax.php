<?php
//---------------------------------------------------------------
//Filter function for products page
//---------------------------------------------------------------
add_action('wp_ajax_ajaxFilterProducts', 'filter_function_products'); // wp_ajax_{ACTION HERE}
add_action('wp_ajax_nopriv_ajaxFilterProducts', 'filter_function_products');

function filter_function_products()
{
    $category = $_POST['category'];

    //Here define how many posts should by loaded after clicking category filter
    $params = array(
        'post_type' => 'products',
        'posts_per_page' => 9,
        'post_status' => 'publish'
    );

    if (isset($category) && $category != -1) :
        $tax_query[] = array(
                'taxonomy' => "product_category",
                'field' => 'term_id',
                'operator' => 'IN',
                'terms' => $category
        );
        $params['tax_query'] = $tax_query;
    endif;

    $query = new WP_Query($params);
    
    if ($query->have_posts()) :?>
        <ul class="remove-ul-styling products-grid" data-page="<?= get_query_var('paged') ? get_query_var('paged') : 1; ?>" data-max="<?= $query->max_num_pages; ?>">
            <?php 
            while ($query->have_posts()) : $query->the_post();
                get_template_part('components/product-thumbnail/index');
            endwhile; ?>
            
        </ul>
        <div id="pagination" data-category="-1">
            <?php numeric_pagination($query);?>
        </div>
    <?php else :
        get_template_part('template-parts/content', 'none');
    endif;  ?>
<?php
    wp_reset_postdata();
    die();
}
//---------------------------------------------------------------
//Pagination function for products page
//---------------------------------------------------------------
add_action('wp_ajax_paginationAjax', 'pagination_ajax');
add_action('wp_ajax_nopriv_paginationAjax', 'pagination_ajax');

function pagination_ajax(){
   
    $next_page = $_POST['next_page'];
    $category = $_POST['category'];
  
    $params = array(
        'post_type' => "products",
        'post_status' => 'publish',
        'posts_per_page' => 9,
        'paged' => $next_page
    );
    if (isset($category) && $category != -1) :
        $tax_query[] = array(
                'taxonomy' => "product_category",
                'field' => 'term_id',
                'operator' => 'IN',
                'terms' => $category
        );
        $params['tax_query'] = $tax_query;
    endif;

    $query = new WP_Query($params);

    if ($query->have_posts()) : ?>
        <ul class="remove-ul-styling products-grid" data-page="<?= get_query_var('paged') ? get_query_var('paged') : 1; ?>" data-max="<?= $query->max_num_pages; ?>">
            <?php while ($query->have_posts()) : $query->the_post();
                get_template_part('components/product-thumbnail/index');
            endwhile; ?>
        </ul>

        
        <div id="pagination" data-category="-1">
            <?php numeric_pagination($query);?>
        </div>
       
    <?php else :
        get_template_part('template-parts/content', 'none');
    endif;
    wp_reset_postdata();  
    die();
}