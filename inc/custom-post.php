<?php
function products_post_type()
{
    $labels = array(
        'name'                => 'Produkty',
        'singular_name'       => 'Produkty',
        'menu_name'           => 'Produkty',
        'parent_item_colon'   => 'Nadrzędna strona',
        'all_items'           => 'Wszystkie',
        'view_item'           => 'Zobacz stronę',
        'add_new_item'        => 'Dodaj nowy',
        'add_new'             => 'Dodaj nowy',
        'edit_item'           => 'Edytuj',
        'update_item'         => 'Aktualizuj',
        'search_items'        => 'Szukaj',
        'not_found'           => 'Nie znaleziono',
        'not_found_in_trash'  => 'Nie znaleziono'
    );
    $args = array(
        'label' => 'products',
        'rewrite' => array(
            'slug' => 'nasza-oferta/%product_category%'
        ),
        'description'         => 'Produkty dostępne w szkółce roślin',
        'labels'              => $labels,
        'supports'            => array('title', 'thumbnail', 'excerpt', 'custom-fields'),
        'taxonomies'          => array(),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 4,
        'menu_icon'           => 'dashicons-buddicons-replies',
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',

    );
    register_post_type('products', $args);
}
add_action('init', 'products_post_type');

function create_product_taxonomies()
{
    $labels = array(
        'name'              => _x('Kategorie', 'taxonomy general name'),
        'singular_name'     => _x('Kategoria', 'taxonomy singular name'),
        'search_items'      => __('Szukaj kategorii'),
        'all_items'         => __('Wszystkie kategorie'),
        'parent_item'       => __('Kategoria nadrzędna'),
        'parent_item_colon' => __('Kategoria nadrzędna:'),
        'edit_item'         => __('Edytuj kategorię'),
        'update_item'       => __('Aktualizuj kategorię'),
        'add_new_item'      => __('Dodaj nową kategorię'),
        'new_item_name'     => __('Nowa nazwa kategorii'),
        'menu_name'         => __('Kategorie'),
    );
    $args = array(
        'label' => 'product-category',
        'rewrite' => array(
            'hierarchical' => true,
            'slug' => 'produkty'
        ),
        'hierarchical'      => true, // Set this to 'false' for non-hierarchical taxonomy (like tags)
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
    );
    register_taxonomy('product_category', array('products'), $args);
}
add_action('init', 'create_product_taxonomies', 0);

