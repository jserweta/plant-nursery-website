<?php 
function products_post_link( $post_link, $id = 0 ){
    $post = get_post($id);  
    if ( is_object( $post ) ){
        $terms = wp_get_object_terms( $post->ID, 'product_category' );
        if( $terms ){
            return str_replace( '%product_category%' , $terms[0]->slug , $post_link );
        }
    }
    return $post_link;  
}
add_filter( 'post_type_link', 'products_post_link', 1, 3 );


function mmp_rewrite_rules($rules)
{
	$newRules  = array();
	$newRules['nasza-oferta/(.+)/(.+)/(.+)/?$'] = 'index.php?product=$matches[3]'; // my custom structure will always have the post name as the 5th uri segment

	return array_merge($newRules, $rules);
}
add_filter('rewrite_rules_array', 'mmp_rewrite_rules');