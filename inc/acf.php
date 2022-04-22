<?php

/**
 * ACF stuff.
 */

add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init()
{


    if (function_exists('acf_add_options_page')) {

        acf_add_options_page(array(
            'page_title'    => 'Ustawienia Imenet',
            'menu_title'    => 'Ustawienia Imenet',
            'menu_slug'     => 'imenet',
            'capability'    => 'edit_posts',
            'redirect'        => true
        ));

        acf_add_options_sub_page(array(
            'page_title'     => 'Logo',
            'menu_title'    => 'Logo',
            'parent_slug'    => 'imenet',
        ));

        acf_add_options_sub_page(array(
            'page_title'     => 'Ogólne informacje',
            'menu_title'    => 'Ogólne informacje',
            'parent_slug'    => 'imenet',
        ));

        acf_add_options_sub_page(array(
            'page_title'     => 'Dane kontaktowe',
            'menu_title'    => 'Dane kontaktowe',
            'parent_slug'    => 'imenet',
        ));

        acf_add_options_sub_page(array(
            'page_title'     => 'Social media',
            'menu_title'    => 'Social media',
            'parent_slug'    => 'imenet',
        ));

        acf_add_options_sub_page(array(
            'page_title'     => 'Katalog produktów',
            'menu_title'    => 'Katalog produktów',
            'parent_slug'    => 'imenet',
        ));
    }
}
