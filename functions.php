<?php
add_action('admin_head', 'acf_cat_edit');

function acf_cat_edit() {
    echo '<style>
    #edittag{
        max-width:1200px;
    }
    </style>';
}


function consoleLog($message) {
    echo '<script type="text/javascript">' .
    'console.log(' . '"' . $message . '"' . ');</script>';
}

function add_theme_scripts() {
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_script( 'main_script', get_template_directory_uri() . '/build/scripts/main.js', array(), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );
add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('widgets');

// register sidebars
function my_sidebars(){
    register_sidebar(
        array(
            'name' => 'Standard sidebar',
            'id' => 'standard-sidebar'
        )
    );
};
add_action('widgets_init','my_sidebars');

register_nav_menus(
    array(
        'main-menu-location' => 'Main menu location',
        'mobile-menu-location' => 'Mobile menu location',
        'footer-menu-location' => 'Footer menu location'
    )
);

function the_field_without_wpautop( $field_name ) {
	remove_filter('acf_the_content', 'wpautop');
	the_field( $field_name );
	add_filter('acf_the_content', 'wpautop');
}

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Menus',
		'menu_title'	=> 'Menus',
		'menu_slug'	=> 'menus',
    ));
	acf_add_options_page(array(
		'page_title' 	=> 'Global',
		'menu_title'	=> 'Global',
		'menu_slug'	=> 'global',
	));
}

add_image_size('tiny', 50, 50, true);
add_image_size('thumb', 312, 257, true);
add_image_size('main', 630, 360, true);

function posts_list($atts = []) {
    $sc_atts = shortcode_atts([
        'category' => '',
        'number_of_posts' => ''
    ], $atts);
	ob_start();
    include( locate_template('includes/section-post-grid.php' ) );
    return ob_get_clean();
}

function posts_grid_list($atts = []) {
    $sc_atts = shortcode_atts([
        'number_of_posts' => '',
        'category' => '',
        'image' => false
    ], $atts);
	ob_start();
    include( locate_template('includes/section-post-grid--list.php' ) );
    return ob_get_clean();
    $sc_atts['image'] = filter_var( $args['image'], FILTER_VALIDATE_BOOLEAN );
}

function posts_list_sidebar($atts = []) {
    $sc_atts = shortcode_atts([
        'number_of_posts' => '',
        'category' => '',
        'image' => false
    ], $atts);
	ob_start();
    include( locate_template('includes/section-sidebar-list.php' ) );
    return ob_get_clean();
    $sc_atts['image'] = filter_var( $args['image'], FILTER_VALIDATE_BOOLEAN );
}

function signup_form(){
    ob_start();
    include( locate_template('includes/component-signup-form.php' ) );
    return ob_get_clean();
}

function category_info_sidebar(){
    ob_start();
    include( locate_template('includes/section-sidebar-category-info.php' ) );
    return ob_get_clean();
}

function ad_vertical() {
    ob_start(); ?>
    <div class="ad--vertical">
        <img class="ad__image" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ads/ad-vertical.png" alt="Ad Horizontal">
    </div>
    <?php return ob_get_clean();
}

function ad_square() {
    ob_start(); ?>
    <div class="ad--vertical ad--vertical-square">
    <img class="ad__image" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ads/ad-square.png" alt="Ad Horizontal">
    </div>
    <?php return ob_get_clean();
}

function ad_horizontal() {
    ob_start(); ?>
    <div class="ad--horizontal">
       <img class="ad__image" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ads/ad-horizontal.png" alt="Ad Horizontal">
    </div>
    <?php return ob_get_clean();
}

function facebook_feature() {
    ob_start();
    include( locate_template('includes/section-facebook-feature.php' ) );
    return ob_get_clean();
}


function shortcodes_init(){
    add_shortcode('posts_list', 'posts_list');
    add_shortcode('posts_grid_list', 'posts_grid_list');
    add_shortcode('posts_list_sidebar', 'posts_list_sidebar');
    add_shortcode('signup_form', 'signup_form');
    add_shortcode('ad_vertical', 'ad_vertical');
    add_shortcode('ad_square', 'ad_square');
    add_shortcode('facebook_feature', 'facebook_feature');
    add_shortcode('category_info_sidebar','category_info_sidebar');
}

add_action('init', 'shortcodes_init');


    add_shortcode('wp_caption', 'fixed_img_caption_shortcode');
    add_shortcode('caption', 'fixed_img_caption_shortcode');
    function fixed_img_caption_shortcode($attr, $content = null) {
    // New-style shortcode with the caption inside the shortcode with the link and image tags.
    if ( ! isset( $attr['caption'] ) ) {
        if ( preg_match( '#((?:<a [^>]+>s*)?<img [^>]+>(?:s*</a>)?)(.*)#is', $content, $matches ) ) {
            $content = $matches[1];
            $attr['caption'] = trim( $matches[2] );
        }
    }
 
    // Allow plugins/themes to override the default caption template.
    $output = apply_filters('img_caption_shortcode', '', $attr, $content);
    if ( $output != '' )
        return $output;
 
    extract(shortcode_atts(array(
        'id'    => '',
        'align' => 'alignnone',
        'width' => '',
        'caption' => ''
    ), $attr));
 
    if ( 1 > (int) $width || empty($caption) )
        return $content;
 
    if ( $id ) $id = 'id="' . esc_attr($id) . '" ';
 
    return '<div ' . $id . 'class="wp-caption ' . esc_attr($align) . '" style="width: ' . $width . 'px">'
    . do_shortcode( $content ) . '<p class="wp-caption-text">' . $caption . '</p></div>';
    }

?>