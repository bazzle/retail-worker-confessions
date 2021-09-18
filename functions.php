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
    wp_enqueue_script( 'flickity_script', 'https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'main_script', get_template_directory_uri() . '/build/scripts/main.js', array(), '1.0.0', true );
    wp_enqueue_style ('flickity_style', 'https://unpkg.com/flickity@2/dist/flickity.min.css');
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
		'page_title' 	=> 'RWC Settings',
		'menu_title'	=> 'RWC Settings',
		'menu_slug'	=> 'rwc_settings',
	));
	acf_add_options_page(array(
		'page_title' 	=> 'Global',
		'menu_title'	=> 'Global',
		'menu_slug'	=> 'global_settings',
        'parent_slug' => 'rwc_settings',
	));
    acf_add_options_page(array(
		'page_title' 	=> 'Confessions',
		'menu_title'	=> 'Confessions',
		'menu_slug'	=> 'confessions_settings',
        'parent_slug' => 'rwc_settings',
	));
    acf_add_options_page(array(
		'page_title' 	=> 'Rants',
		'menu_title'	=> 'Rants',
		'menu_slug'	=> 'rants_settings',
        'parent_slug' => 'rwc_settings',
	));
    acf_add_options_page(array(
		'page_title' 	=> 'Misc',
		'menu_title'	=> 'Misc',
		'menu_slug'	=> 'misc_settings',
        'parent_slug' => 'rwc_settings',
	));
}

add_image_size('tiny', 50, 50, true);
add_image_size('thumbcustom', 374, 280, true);
add_image_size('postimagesize', 760, false);

add_filter( 'image_size_names_choose', 'my_custom_sizes' );
function my_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'postimagesize' => __( 'Standard image size' ),
    ) );
}

function posts_list($atts = []) {
    $sc_atts = shortcode_atts([
        'post_type' => '',
        'category' => '',
        'number_of_posts' => '',
        'exclude' => '',
        'excerpts' => ''
    ], $atts);
	ob_start();
    include( locate_template('includes/section-posts-list.php' ) );
    return ob_get_clean();
}

function posts_list_stacked($atts = []) {
    $sc_atts = shortcode_atts([
        'category' => '',
        'number_of_posts' => '',
        'exclude' => ''
    ], $atts);
	ob_start();
    include( locate_template('includes/section-posts-list--stacked.php' ) );
    return ob_get_clean();
}

function posts_list_thumb($atts = []) {
    $sc_atts = shortcode_atts([
        'number_of_posts' => '',
        'category' => '',
        'post_type' => '',
        'exclude' => ''
    ], $atts);
	ob_start();
    include( locate_template('includes/section-posts-list--thumb.php' ) );
    return ob_get_clean();
}

function posts_list_basic($atts = []) {
    $sc_atts = shortcode_atts([
        'number_of_posts' => '',
        'category' => '',
        'excerpt_as_title' => 'false',
        'exclude' => ''
    ], $atts);
	ob_start();
    include( locate_template('includes/section-posts-list--basic.php' ) );
    return ob_get_clean();
}

function signup_form(){
    ob_start();
    include( locate_template('includes/component-signup-form.php' ) );
    return ob_get_clean();
}

function category_info_sidebar(){
    ob_start();
    include( locate_template('includes/component-category-description.php' ) );
    return ob_get_clean();
}

function ad_vertical() {
    ob_start(); ?>
<div class="ad--vertical">
    <img class="ad__image" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ads/ad-vertical.png"
        alt="Ad Horizontal">
</div>
<?php return ob_get_clean();
}

function ad_square() {
    ob_start(); ?>
<div class="ad--vertical ad--vertical-square">
    <img class="ad__image" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ads/ad-square.png"
        alt="Ad Horizontal">
</div>
<?php return ob_get_clean();
}

function ad_horizontal() {
    ob_start(); ?>
<div class="ad--horizontal">
    <img class="ad__image" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ads/ad-horizontal.png"
        alt="Ad Horizontal">
</div>
<?php return ob_get_clean();
}

function facebook_feature() {
    ob_start();
    include( locate_template('includes/component-facebook-feature.php' ) );
    return ob_get_clean();
}

function contribute_cta() {
    ob_start();
    include( locate_template('includes/component-sidebar-contribute.php' ) );
    return ob_get_clean();
}

function gap() {
    ob_start(); ?>
    <div class="article__body__gap"></div>
    <?php return ob_get_clean();
}

function insights_subnav(){
    $args = array(
        'child_of' => 3
    );
    $pages = get_pages($args);
    foreach ($pages as $page) :
        $pageid = $page->ID;
        $pageurl = get_permalink($pageid);
        $pagename = $page->post_title;
        echo '<a href="' . $pageurl + '">' . $pagename . '</a>';
    endforeach;
}


function shortcodes_init(){
    add_shortcode('posts_list', 'posts_list');
    add_shortcode('posts_list_basic', 'posts_list_basic');
    add_shortcode('posts_list_thumb', 'posts_list_thumb');
    add_shortcode('posts_list_stacked', 'posts_list_stacked');
    add_shortcode('signup_form', 'signup_form');
    add_shortcode('ad_vertical', 'ad_vertical');
    add_shortcode('ad_square', 'ad_square');
    add_shortcode('facebook_feature', 'facebook_feature');
    add_shortcode('category_info_sidebar','category_info_sidebar');
    add_shortcode('insights_subnav','insights_subnav');
    add_shortcode('contribute_cta','contribute_cta');
    add_shortcode('gap','gap');
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


// Ajax calls
function add_ajax_scripts() {
    wp_enqueue_script( 'ajaxcalls', get_template_directory_uri() . '/build/scripts/ajaxcalls.js', array(), '1.0.0', true );
    wp_localize_script( 'ajaxcalls', 'ajax_object', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' )
    ) );
}
add_action( 'wp_enqueue_scripts', 'add_ajax_scripts' );



function upvote_update() {
    $post_id = $_POST['post_id'];
    $count = get_field('vote_number', $post_id);
    $count++;
    update_field( 'vote_number', $count, $post_id );
    echo $count;
    wp_die();
}

add_action( 'wp_ajax_upvote_update', 'upvote_update' );
add_action( 'wp_ajax_nopriv_upvote_update', 'upvote_update' );


function orderbyconfessions() {
    $thisselection = $_POST['selection'];
    $thisposttype = $_POST['posttype'];
    if($thisselection === 'orderbydate'){
        $orderby = 'date';
    }elseif($thisselection === 'orderbypopular'){
        $orderby = 'meta_value_num';
    }
    $ajaxposts = new WP_Query([
        'meta_key' => 'vote_number',
        'orderby' => $orderby,
        'order' => 'DESC',
        'posts_per_page' => -1,
        'post_type' => $thisposttype
    ]);
    $response = '';
    if ($ajaxposts->have_posts()) {
        while($ajaxposts->have_posts()) : $ajaxposts->the_post();
            $response .= get_template_part( 'includes/section', 'confessions-posts' );
        endwhile;
    } else {
        $response = 'Nothing here';
    }
    echo $response;
    wp_die();
}
add_action('wp_ajax_orderbyconfessions', 'orderbyconfessions');
add_action('wp_ajax_nopriv_orderbyconfessions', 'orderbyconfessions');



function filter_ptags_on_images($content){
    return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'filter_ptags_on_images');