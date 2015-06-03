<?php
echo '<ul>';
if (!empty($favorite_post_ids)):
	$c = 0;
	$favorite_post_ids = array_reverse($favorite_post_ids);
    foreach ($favorite_post_ids as $post_id) {
    	if ($c++ == $limit) break;
        $p = get_post($post_id);
		$meta = get_user_meta(wpfp_get_user_id(), WPFP_META_KEY_TITLE, true);
		$tl = $p->post_title;
		if(is_array($meta)){
			foreach($meta as $mt){
				if($mt['id'] == $post_id){
					$tl = ($mt['title'] != '')?$mt['title'] : $p->post_title;
					break;
				}
			}
		}
        echo '<li>';
        echo '<a href="'.get_permalink($post_id).'" title="'. $p->post_title .'">' . $tl . '</a> ';
		if($remove == 1){
			wpfp_remove_favorite_link($post_id);
		}
        echo '</li>';
    }
else:
    echo '<li>';
    echo 'Your favorites will be here.';
    echo '</li>';
endif;
echo '</ul>';
?>
