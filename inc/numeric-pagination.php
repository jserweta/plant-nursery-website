<?php

/**
 * Numeric pagination
 *
 * @package imenet
 */


function numeric_pagination($query)
{ 
	$total_pages = $query->max_num_pages;
	$big = 9999999; // need an unlikely integer

	if ($total_pages > 1){
        $current_page = max(1, $query->query_vars['paged']);
		
		echo paginate_links(array(
			'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
			'format' => '?paged=%#%',
			'current' => $current_page,
			'total' => $total_pages,
			'prev_next' => false,
			'mid_size' => 1
		));
	}	
}