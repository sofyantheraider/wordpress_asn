<?php

/*  Add Thumbnails To Admin & size them to max at 200px
/* ------------------------------------ */
add_filter('manage_posts_columns', 'add_thumbnail_column', 5);
 
function add_thumbnail_column($columns){
    $columns['new_post_thumb'] = esc_html__('Featured Image', 'jackryan');
    return $columns;
}
 
/*  Display Thumb in admin panel
/* ------------------------------------ */
function display_thumbnail_column($column_name, $post_id){
    switch($column_name){
        case 'new_post_thumb':
            $post_thumbnail_id = get_post_thumbnail_id($post_id);
            if ($post_thumbnail_id) {
                $post_thumbnail_img = wp_get_attachment_image_src( $post_thumbnail_id, 'thumbnail' );
                echo '<img width="50" src="' . $post_thumbnail_img[0] . '" />';
            }
        break;
    }
}

/*  Add responsive container to embeds
/* ------------------------------------ */
function jackryan_embed_html( $html ) {
    return '<div class="video-container">' . $html . '</div>';
}
 
add_filter( 'embed_oembed_html', 'jackryan_embed_html', 10, 3 );
add_filter( 'video_embed_html', 'jackryan_embed_html' ); // Jetpack

add_action('manage_posts_custom_column', 'display_thumbnail_column', 5, 2);