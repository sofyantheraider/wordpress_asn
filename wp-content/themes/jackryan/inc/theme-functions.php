<?php if ( ! defined( 'ABSPATH' ) ) { exit( 'Direct script access denied.' ); }

// Menu
function jackryan_primary_menu() {

    echo wp_nav_menu( array(
        'theme_location' => 'primary-menu',
        'container' => true,
        'depth' => 2,
        'menu_id'        => 'primary-menu',
        'menu_class'     => 'dropdown__wrapper dropdown__trigger',
    ) );

}

// Footer Menu
function jackryan_footer_menu() {

    echo wp_nav_menu( array(
        'theme_location' => 'footer-menu',
        'depth' => 1,
        'container' => true,
        'menu_id'        => 'footer-menu',
    ) );

}

// Header Class
function jackryan_header_class() {

    if( class_exists('acf')) {
        $hero_class = null;
        if ( get_field('hero_style') == 'background-image' ):
            $hero_class = 'transparent-bg';
        elseif ( get_field('hero_style') == 'background-video' ):
            $hero_class = 'transparent-bg';
        elseif ( get_field('project_hero_style') == 'image' ):
            $hero_class = 'transparent-bg';
        elseif ( get_field('project_hero_style') == 'default' ):
            $hero_class =  null;
        elseif ( get_field('hero_style') == 'default' ):
            $hero_class =  null;
        endif;
    } else {
        $hero_class = null;
    }

    if ( true == get_theme_mod( 'blur_hedaer', true ) ) {
        $effect = ' is-blur';
    } else {
        $effect = null;
    }

    if( get_theme_mod( 'type_header' )) {
        $type = ' ' . get_theme_mod( 'type_header' );
    } else {
        $type = ' default';
    }

    if ( is_admin_bar_showing() ) {
        echo 'class="main-header main-header__admin js-main-header auto-hide-header '. $hero_class . $effect . '' . $type . '"';
    } else {
        echo 'class="main-header js-main-header auto-hide-header '. $hero_class . $effect . '' . $type .'"';
    }

}

// Theme Mode
function jackryan_theme_mode() {
    if(get_theme_mod( 'theme_mode' )) {
        echo get_theme_mod( 'theme_mode' );
    } else {
        echo "light";
    }
}

// Theme Transition
function jackryan_theme_transition() {
    if(get_theme_mod( 'page_transition' ) && get_theme_mod( 'page_transition' ) == '1') {
        echo "on";
    } else {
        echo "off";
    }
}
// Hero Style
function jackryan_hero_style() {
    if( class_exists('acf') && get_field('hero_style')) {
        $hero_style = get_field('hero_style');
        return $hero_style; 
    } else {
        $hero_style = 'default';
        return $hero_style; 
    }
}

// Hero title
function jackryan_hero_title() {
    if( class_exists('acf') && jackryan_hero_style() == 'default') {
       $hero_t = the_title( '<span>', '</span>' );
       return $hero_t;
    } else {
        $hero_t = '';
        return $hero_t;
    }
    
}

// Posts Loop
function jackryan_posts_loop($items) {

	$paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
	$args = array(
	    'post_type' => 'post',
	    'post_status' => 'publish',
        'paged' => $paged,
        'posts_per_page' => $items,
	);
	$query = new WP_Query($args);
	return $query;

}

// Posts Pagination
function jackryan_posts_pagination( $query = null ) {
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    if ( $query == null ) {
        global $wp_query;
        $query = $wp_query;
    } 
    /* Stop the code if there is only a single page page */
    if( $query->max_num_pages <= 1 )
        return;
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $query->max_num_pages );
    /*Add current page into the array */
    if ( $paged >= 1 )
        $links[] = $paged;
    /*Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
    echo '<nav class="pagination" aria-label="Pagination"><ol class="pagination__list">' . "\n";
    /*Display Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li class="page-item prev">%s </li>' . "\n", get_previous_posts_link('<svg class="icon" aria-hidden="true" viewBox="0 0 16 16"><title>Previous</title><g stroke-width="2" stroke="currentColor"><polyline fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="9.5,3.5 5,8 9.5,12.5 "></polyline></g></svg>') );
    /*Display Link to first page*/
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class=""' : '';
        printf( '<li%s class=""><a href="%s" class="pagination__item">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
        if ( ! in_array( 2, $links ) )
            echo '<li class=""><span>…</span></li>';
    }
    /* Link to current page */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="page-item active"' : '';
        printf( '<li%s><a href="%s" class="pagination__item">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
    /* Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li class="display--sm">…</li>' . "\n";
        $class = $paged == $max ? ' class="display--sm"' : '';
        printf( '<li%s class="display--sm"><a href="%s" class="pagination__item pagination__item--ellipsis">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
 
    /** Next Post Link */
    if ( get_next_posts_link('Next', $max) )
        printf( '<li class="page-item next">%s </li>' . "\n", get_next_posts_link('<svg class="icon" aria-hidden="true" viewBox="0 0 16 16"><title>Next</title><g stroke-width="2" stroke="currentColor"><polyline fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="6.5,3.5 11,8 6.5,12.5 "></polyline></g></svg>', $max) );
    echo '</ol></nav>' . "\n";

}

// Single Post Navigation
function jackryan_posts_navigation() {
    $out = '<div class="ms-post-navigation parent grid grid-gap-xs">';
    $out = the_post_navigation( array(
        'next_text' => '<div class="next-post"><span class="nav-label" aria-hidden="true">' . __( 'Next page', 'jackryan' ) . '</span> ' .
             '<h3 class="post-title">%title</h3>' .
            '<span class="screen-reader-text">' . __( 'Next page', 'jackryan' ) . '</span></div> ',
        'prev_text' => '<div class="prev-post"><span class="nav-label" aria-hidden="true">' . __( 'Prev page', 'jackryan' ) . '</span> ' .
            '<span class="screen-reader-text">' . __( 'Previous page', 'jackryan' ) . '</span> ' .
            '<h3 class="post-title">%title</h3></div>'
    ) );
    $out .= '</div>';
    return $out;
}

// Related Posts
function jackryan_related_posts() {
    global $post;
    $id =  $post->ID;
    $related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 3, 'post__not_in' => array($post->ID) ) );
    return $related;
}

// Socials Custom Plugin
function jackryan_twitter_share() {
$posttags = get_the_tags();
if ($posttags) {
  foreach($posttags as $tag) {
    echo strtolower('#' . $tag->name . ', '); 
  }
}
}

// Custom Comments
function jackryan_comments( $comment, $args, $depth ) {

	$GLOBALS['comment'] = $comment;
	
	switch ( $comment->comment_type ) :
		case 'pingback':
		case 'trackback':
		?>
        <li class="post pingback" id="comment-<?php comment_ID(); ?>">
        	<div class="pingback ms-author-name"><?php comment_author_link(); ?></div>
        	<div class="post-date"><?php comment_date(); ?></div>
        	<div class="ms-commentcontent"><?php comment_text();  ?></div>
        	<?php edit_comment_link( __( 'Edit', 'jackryan' ), '<span class="edit-link">', '</span>' ); ?></p>
    	</li>
		<?php 
		break;
		default: 
		?>
            <li id="comment-<?php comment_ID(); ?>">
            <div <?php comment_class(); ?>>
				<div class="ms-comment-body">
                    <div class="avatar avatar--lg">
                        <figure class="avatar__figure" role="img" aria-label="Avatar">
                            <svg class="avatar__placeholder" aria-hidden="true" viewBox="0 0 20 20" stroke-linecap="round" stroke-linejoin="round"><circle cx="10" cy="6" r="2.5" stroke="currentColor"/><path d="M10,10.5a4.487,4.487,0,0,0-4.471,4.21L5.5,15.5h9l-.029-.79A4.487,4.487,0,0,0,10,10.5Z" stroke="currentColor"/></svg>
                        <div class="avatar__img"><?php echo get_avatar( $comment, 64 ); ?></div>
                        </figure>
                    </div>
					<div class="ms-author-vcard">
                        <div class="ms-author-vcard__top">
                            <div class="ms-author-name"><?php comment_author(); ?></div>
                            <span class="ms-comment-time"><?php comment_date(); ?></span>
                        </div>
						
						<div class="ms-commentcontent text-component text-component__inner">
							<?php comment_text(); ?>
						</div>
						<div class="ms-comment-footer">
							<div class="ms-comment-edit">
                                <?php edit_comment_link( $text = '<svg height="14px" id="Layer_1" version="1.1" viewBox="0 0 24 24" width="14px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M21.635,6.366c-0.467-0.772-1.043-1.528-1.748-2.229c-0.713-0.708-1.482-1.288-2.269-1.754L19,1C19,1,21,1,22,2S23,5,23,5  L21.635,6.366z M10,18H6v-4l0.48-0.48c0.813,0.385,1.621,0.926,2.348,1.652c0.728,0.729,1.268,1.535,1.652,2.348L10,18z M20.48,7.52  l-8.846,8.845c-0.467-0.771-1.043-1.529-1.748-2.229c-0.712-0.709-1.482-1.288-2.269-1.754L16.48,3.52  c0.813,0.383,1.621,0.924,2.348,1.651C19.557,5.899,20.097,6.707,20.48,7.52z M4,4v16h16v-7l3-3.038V21c0,1.105-0.896,2-2,2H3  c-1.104,0-2-0.895-2-2V3c0-1.104,0.896-2,2-2h11.01l-3.001,3H4z"/></svg>Edit' ); ?></div>
							<div class="ms-comment-reply">
								<?php comment_reply_link( array_merge( $args, array(
									'reply_text' => '<svg height="16px" version="1.1" viewBox="0 0 16 16" width="14px" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" xmlns:xlink="http://www.w3.org/1999/xlink"><g fill="none" fill-rule="evenodd" id="Icons with numbers" stroke="none" stroke-width="1"><g fill="none" id="Group" transform="translate(0.000000, -336.000000)"><path d="M0,344 L6,339 L6,342 C10.5,342 14,343 16,348 C13,345.5 10,345 6,346 L6,349 L0,344 L0,344 Z M0,344" id="Shape"/></g></g></svg>Reply',
									'depth' => $depth,
									'max_depth' => $args['max_depth'] 
								) ) ); ?>
							</div>
						</div>
					</div>
				</div>
            </div>
   	<?php
        break;
    endswitch;
}

// Blog Custom Comments
function jackryan_comments_number() {

	$comment_count = get_comments_number();
	printf(
	    '<span>' . esc_html( _nx( '1 comment', '%1$s comments', get_comments_number(), 'comments title', 'jackryan' ) ),
	    number_format_i18n( get_comments_number() ) . '</span>',
        '<span>' . get_the_title() . '</span>'
	);
	
}

// Pagination
function jackryan_link_pages() {

    wp_link_pages( array(
        'before'      => '<div class="page-links">' . __( 'Pages:', 'jackryan' ),
        'after'       => '</div>',
        'link_before' => '<span class="page-number">',
        'link_after'  => '</span>',
    ) );

}

// Check Portfolio Plugins
function jackryan_check_portfolio() {
    if ( !function_exists( 'portfolios_register' ) ) {
        $jr_plugin = esc_html__('Jack Ryan Theme Plugin', 'jackryan');  
    } else {
        $jr_plugin = null;
    }

    if ( !class_exists( 'acf' ) ) {
        $acf_plugin = esc_html__('Advanced Custom Fields PRO', 'jackryan');
    } else {
        $acf_plugin = null;
    }
    if ($jr_plugin !== null && $acf_plugin !== null) {
        $sep = ', ';
    } else {
        $sep = null;
    }
    $out =  $jr_plugin . $sep . $acf_plugin;
    return $out;
}

// Portfolio Filter
function jackryan_filter_category() {
    if ( isset($_GET['category']) ) {
        $out = $_GET['category'];
        return $out;
    } else {
        $out = null;
        return $out;
    }
}

// Portfolio Loop
function jackryan_portfolio_loop( $cat = null ) {
    if ( get_field('projects_per_page') ) {
        $items = get_field('projects_per_page');
    } else {
        $items = '9';
    }
    if ($cat == null) {
        $paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
        $args = array(
            'post_type'      => 'portfolios',
            'post_status'    => 'publish',
            'posts_per_page' => $items,         
            'paged'          => $paged
        );  
    } else {
        $paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
        $args = array(
            'post_type'      => 'portfolios',
            'post_status'    => 'publish',
            'posts_per_page' => $items,         
            'paged'          => $paged,
            'tax_query' => array(
                array(
                    'taxonomy' => 'portfolios_categories',
                    'field'    => 'slug',
                    'terms' => $cat
                )
            )
        );  
    }
    $query = new WP_Query($args);
    return $query;
}

// Get Works Taxonomy
if ( !function_exists( 'jackryan_works_category' ) ) {

    function jackryan_work_category($post_id) {
        $terms = wp_get_post_terms($post_id, 'portfolios_categories');
        $count = count($terms);
        $slug = '';
        $out = '';
        if ( $count > 1 ) {
            foreach ( $terms as $term ) {
                $out = implode(', ', array_map(function($term) { return $term->slug; }, $terms));
            }
        } else {
           foreach ( $terms as $term ) {
               $out = $term->slug;
            } 
        }
        return $out;
    }

}

// Portfolio pagination
function jackryan_portfolio_pagination($total_pages) {

    if ( class_exists( 'acf' ) ) {
        $total = $total_pages;
        $out = '<div class="ajax-area" data-max="' . $total . '">';
        $out .= '<button class="btn btn--sm btn-load-more btn--primary btn--preserve-width">';
        $out .= '<span class="btn__content-a"><span>' . esc_html__('Load More', 'jackryan') . '</span><span>' . esc_html__('No more projects', 'jackryan') . '</span><span class="btn__content-c">' . esc_html__('Load More', 'jackryan') . '</span></span>';
        $out .= '<span class="btn__content-b">';
        $out .= '<svg class="load-more-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="35px" height="35px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
    <circle cx="50" cy="50" r="30" stroke="" stroke-width="0" fill="none"></circle>
    <circle cx="50" cy="50" r="30" stroke="" stroke-width="8" stroke-linecap="round" fill="none" transform="rotate(307.62 50 50)">
      <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;180 50 50;720 50 50" keyTimes="0;0.5;1"></animateTransform>
      <animate attributeName="stroke-dasharray" repeatCount="indefinite" dur="1s" values="18.84955592153876 169.64600329384882;94.2477796076938 94.24777960769377;18.84955592153876 169.64600329384882" keyTimes="0;0.5;1"></animate>
    </circle>
</svg>';
        $out .= '</span>';
        $out .= '</button>';
        $out .= '</div>';
        return $out;
    }

}

//Infinite next and previous post looping in WordPress
function jackryan_portfolio_nav_prev() {

    if (get_previous_post() == true) {
        $prevPost = get_previous_post();
        $prevTitle = get_the_title($prevPost);
        $out_title = '<div class="container"><span>' . esc_html__('Next', 'jackryan') . '</span><h1>' . $prevTitle . '</h1></div>';
        $prevThumbnail = get_the_post_thumbnail( $prevPost->ID, 'jackryan-portfolio-nav-thumb' ) . $out_title ;
        previous_post_link( '%link', $prevThumbnail );        
    } else {
        $first = new WP_Query( array(
            'post_type'      => 'portfolios',
            'post_status'    => 'publish',
            'posts_per_page' => 1,
            'order' => 'DESC',
        ));

        $first->the_post();
        $img = get_the_post_thumbnail_url($post = null, $size = 'jackryan-portfolio-nav-thumb');
        $out = '<a href="' . get_permalink() . '">';
        $out .= '<img src="' . $img . '" />';
        $out .= '<div class="container"><span>' . esc_html__('Next', 'jackryan') . '</span><h1>';
        $out .=  get_the_title();
        $out .=  '</h1></div>';
        $out .= '</a>';
       

        return $out;
        wp_reset_postdata();
    };

}

// Single Portfolio Page Next Link
function jackryan_portfolio_nav_next() {

    if (get_next_post() == true) {
        $nextPost = get_next_post();
        $nextThumbnail = get_the_post_thumbnail( $nextPost->ID, 'jackryan-portfolio-nav-thumb' );
        next_post_link( '%link', $nextThumbnail );
        $nextTitle = get_the_title( get_next_post() );
        echo '<h3>' . $nextTitle . '</h3>';
    }
   
}
function jackryan_get_in_touch_link() {

    $pages = query_posts(array(
         'post_type' =>'page',
         'meta_key'  =>'_wp_page_template',
         'meta_value'=> 'page-contact.php'
     ));

     $url = null;
     if(isset($pages[0])) {
         $url = get_permalink($pages[0]);
     }
     return $url;

}

// Portfolio Go Page
function go_to_portfolio(){

     $pages = query_posts(array(
         'post_type' =>'page',
         'meta_key'  =>'_wp_page_template',
         'meta_value'=> 'portfolios-page.php'
     ));

     $url = null;
     if(isset($pages[0])) {
         $url = get_permalink($pages[0]);
     }
     return $url;
 }

// Load More Button
if( !function_exists( 'jackryan_infinity_load' ) ){

    function jackryan_infinity_load( $query = null ) {
        
        $max = $query->max_num_pages;
        $paged = ( get_query_var('paged') > 1 ) ? get_query_var('paged') : 1;

        wp_localize_script( 'jackryan-main-script', 'infinity_load', array(
                'startPage' => $paged,
                'maxPages' => $max,
                'nextLink' => next_posts($max, false)
        ) );

    }

}

// Go to Contacts Page
function jackryan_go_to_contacts() {

     $pages = query_posts(array(
         'post_type' =>'page',
         'meta_key'  =>'_wp_page_template',
         'meta_value'=> 'page-contact.php'
     ));

     $url = null;
     if(isset($pages[0])) {
         $url = get_permalink($pages[0]);
     }
     return $url;
 }
// Check No Sidebar Page
function jackryan_no_sidebar_page() {
    if ( is_page_template('blog-no-sidebar-page.php') ) {
        $no_sidebar = true;
    } else {
        $no_sidebar = false;
    }
    return $no_sidebar;
}
// Check Sidebar
function jackryan_sidebar_check() {

    if ( is_active_sidebar( 'blog_sidebar' ) ) {
        $cont_col = '8';
        $cont_class = 'blog-sidebar';
        $cont_img = '16:9';
        $img_size = 'jackryan-default-post-thumb';
        return array($cont_col, $cont_class, $cont_img, $img_size);
    } else {
        $cont_col = '12';
        $cont_class = 'no-sidebar';
        $cont_img = '21:9';
        $img_size = 'jackryan-no-post-thumb';
        return array($cont_col, $cont_class, $cont_img, $img_size);
    }

}

// Custom excerpt lenght
function jackryan_excerpt_length( $length ) {
    return 24;
}
add_filter( 'excerpt_length', 'jackryan_excerpt_length', 999 );

function wpshout_change_and_link_excerpt( $more ) {
    if ( is_admin() ) {
        return $more;
    }

    return '...';
 }
 add_filter( 'excerpt_more', 'wpshout_change_and_link_excerpt', 999 );

 // One click demo importer
function ocdi_import_files() {
  return array(
    array(
        'import_file_name'           => 'Jack Ryan Demo Import',
        'import_file_url'            => 'https://theme.madsparrow.me/jackryan/import/jackryan-demo.xml',
        'import_widget_file_url'     => 'https://theme.madsparrow.me/jackryan/import/widgets.wie',
        'import_customizer_file_url' => 'https://theme.madsparrow.me/jackryan/import/customizer.dat',
    ),
  );
}
add_filter( 'pt-ocdi/import_files', 'ocdi_import_files' );

function ocdi_after_import_setup() {

    $main_menu = get_term_by( 'name', 'Header', 'nav_menu' );
    $footer_menu = get_term_by( 'name', 'Footer', 'nav_menu' );
    set_theme_mod( 'nav_menu_locations', array(
            'primary-menu' => $main_menu->term_id,
            'footer-menu' => $footer_menu->term_id,
        )
    );
    $front_page_id = get_page_by_title( 'Slider Full Page' );
    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'ocdi_after_import_setup' );
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );