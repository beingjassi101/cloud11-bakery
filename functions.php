<?php
/**
 * Cloud 11 Bakery Theme Functions
 *
 * @package Cloud11_Bakery
 * @version 1.0.0
 * @author  Jaspreet Singh Bharaj
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'C11_THEME_VERSION', '1.0.0' );
define( 'C11_THEME_DIR', get_template_directory() );
define( 'C11_THEME_URI', get_template_directory_uri() );

/* ----------------------------------------------------------------
   1. THEME SETUP
   ---------------------------------------------------------------- */
function cloud11_theme_setup() {
    // HTML5 support
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'
    ));

    // Featured images
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'c11-hero', 1400, 600, true );
    add_image_size( 'c11-menu-item', 400, 400, true );

    // Title tag
    add_theme_support( 'title-tag' );

    // Custom logo
    add_theme_support( 'custom-logo', array(
        'height'      => 80,
        'width'       => 250,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Register nav menus
    register_nav_menus( array(
        'primary'   => __( 'Primary Navigation', 'cloud11-bakery' ),
        'footer'    => __( 'Footer Navigation', 'cloud11-bakery' ),
    ));
}
add_action( 'after_setup_theme', 'cloud11_theme_setup' );


/* ----------------------------------------------------------------
   2. ENQUEUE STYLES & SCRIPTS
   ---------------------------------------------------------------- */
function cloud11_enqueue_assets() {
    // Google Fonts
    wp_enqueue_style(
        'c11-google-fonts',
        'https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap',
        array(),
        null
    );

    // Main stylesheet (style.css)
    wp_enqueue_style(
        'c11-main-style',
        get_stylesheet_uri(),
        array( 'c11-google-fonts' ),
        C11_THEME_VERSION
    );

    // Additional component styles
    wp_enqueue_style(
        'c11-custom',
        C11_THEME_URI . '/assets/css/custom.css',
        array( 'c11-main-style' ),
        C11_THEME_VERSION
    );

    // Main JS — deferred, no jQuery dependency
    wp_enqueue_script(
        'c11-main-js',
        C11_THEME_URI . '/assets/js/main.js',
        array(),
        C11_THEME_VERSION,
        true
    );

    // Google Maps API (only on pages that need it)
    if ( is_page( 'contact' ) || is_page( 'catering' ) ) {
        wp_enqueue_script(
            'c11-google-maps',
            'https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY_HERE&callback=initMap',
            array(),
            null,
            true
        );
    }
}
add_action( 'wp_enqueue_scripts', 'cloud11_enqueue_assets' );


/* ----------------------------------------------------------------
   3. SCHEMA.ORG LOCAL BUSINESS STRUCTURED DATA
   ---------------------------------------------------------------- */
function cloud11_schema_markup() {
    if ( ! is_front_page() ) return;

    $schema = array(
        '@context'    => 'https://schema.org',
        '@type'       => 'Bakery',
        'name'        => 'Cloud 11 Bakery',
        'description' => 'Artisan breads, pastries, and seasonal specials baked fresh daily.',
        'url'         => home_url( '/' ),
        'telephone'   => '+1-XXX-XXX-XXXX',
        'address'     => array(
            '@type'           => 'PostalAddress',
            'streetAddress'   => '123 Main Street',
            'addressLocality' => 'London',
            'addressRegion'   => 'ON',
            'postalCode'      => 'N6A 1A1',
            'addressCountry'  => 'CA',
        ),
        'geo'         => array(
            '@type'     => 'GeoCoordinates',
            'latitude'  => '42.9849',
            'longitude' => '-81.2453',
        ),
        'openingHoursSpecification' => array(
            array(
                '@type'     => 'OpeningHoursSpecification',
                'dayOfWeek' => array( 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday' ),
                'opens'     => '07:00',
                'closes'    => '18:00',
            ),
            array(
                '@type'     => 'OpeningHoursSpecification',
                'dayOfWeek' => array( 'Saturday', 'Sunday' ),
                'opens'     => '08:00',
                'closes'    => '16:00',
            ),
        ),
        'priceRange'  => '$$',
        'servesCuisine' => 'Bakery',
        'image'       => C11_THEME_URI . '/assets/images/storefront.jpg',
    );

    echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ) . '</script>' . "\n";
}
add_action( 'wp_head', 'cloud11_schema_markup' );


/* ----------------------------------------------------------------
   4. ACF FIELD REGISTRATION (Menu Items)
   ---------------------------------------------------------------- */
function cloud11_register_acf_fields() {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) return;

    acf_add_local_field_group( array(
        'key'      => 'group_c11_menu',
        'title'    => 'Bakery Menu',
        'fields'   => array(
            // Menu Categories (Repeater)
            array(
                'key'          => 'field_c11_menu_categories',
                'label'        => 'Menu Categories',
                'name'         => 'menu_categories',
                'type'         => 'repeater',
                'layout'       => 'block',
                'button_label' => 'Add Category',
                'sub_fields'   => array(
                    array(
                        'key'   => 'field_c11_cat_name',
                        'label' => 'Category Name',
                        'name'  => 'category_name',
                        'type'  => 'text',
                    ),
                    array(
                        'key'          => 'field_c11_cat_items',
                        'label'        => 'Items',
                        'name'         => 'items',
                        'type'         => 'repeater',
                        'layout'       => 'table',
                        'button_label' => 'Add Item',
                        'sub_fields'   => array(
                            array(
                                'key'   => 'field_c11_item_name',
                                'label' => 'Item Name',
                                'name'  => 'item_name',
                                'type'  => 'text',
                            ),
                            array(
                                'key'   => 'field_c11_item_desc',
                                'label' => 'Description',
                                'name'  => 'item_description',
                                'type'  => 'text',
                            ),
                            array(
                                'key'   => 'field_c11_item_price',
                                'label' => 'Price',
                                'name'  => 'item_price',
                                'type'  => 'text',
                            ),
                            array(
                                'key'           => 'field_c11_item_image',
                                'label'         => 'Image',
                                'name'          => 'item_image',
                                'type'          => 'image',
                                'return_format' => 'array',
                                'preview_size'  => 'c11-menu-item',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param'    => 'page_template',
                    'operator' => '==',
                    'value'    => 'page-menu.php',
                ),
            ),
        ),
    ));
}
add_action( 'acf/init', 'cloud11_register_acf_fields' );


/* ----------------------------------------------------------------
   5. SECURITY HARDENING
   ---------------------------------------------------------------- */
// Disable XML-RPC
add_filter( 'xmlrpc_enabled', '__return_false' );

// Remove WordPress version from head
remove_action( 'wp_head', 'wp_generator' );

// Limit login attempts (basic — for production, use a plugin)
function cloud11_limit_login_attempts( $user, $username, $password ) {
    $ip = $_SERVER['REMOTE_ADDR'];
    $transient_key = 'c11_login_attempts_' . md5( $ip );
    $attempts = get_transient( $transient_key );

    if ( $attempts !== false && $attempts >= 5 ) {
        return new WP_Error( 'too_many_attempts',
            __( 'Too many failed login attempts. Please try again in 15 minutes.', 'cloud11-bakery' )
        );
    }

    return $user;
}
add_filter( 'authenticate', 'cloud11_limit_login_attempts', 30, 3 );

function cloud11_track_failed_login( $username ) {
    $ip = $_SERVER['REMOTE_ADDR'];
    $transient_key = 'c11_login_attempts_' . md5( $ip );
    $attempts = get_transient( $transient_key );
    $attempts = $attempts ? $attempts + 1 : 1;
    set_transient( $transient_key, $attempts, 15 * MINUTE_IN_SECONDS );
}
add_action( 'wp_login_failed', 'cloud11_track_failed_login' );


/* ----------------------------------------------------------------
   6. PERFORMANCE HELPERS
   ---------------------------------------------------------------- */
// Add lazy loading to content images
function cloud11_lazy_load_images( $content ) {
    if ( is_admin() ) return $content;
    return preg_replace(
        '/<img(.*?)src=/i',
        '<img$1loading="lazy" src=',
        $content
    );
}
add_filter( 'the_content', 'cloud11_lazy_load_images' );

// Preconnect to Google Fonts
function cloud11_preconnect_fonts() {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
}
add_action( 'wp_head', 'cloud11_preconnect_fonts', 1 );


/* ----------------------------------------------------------------
   7. WIDGET AREAS
   ---------------------------------------------------------------- */
function cloud11_register_sidebars() {
    register_sidebar( array(
        'name'          => __( 'Footer Widget Area', 'cloud11-bakery' ),
        'id'            => 'footer-widgets',
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ));
}
add_action( 'widgets_init', 'cloud11_register_sidebars' );


/* ----------------------------------------------------------------
   8. CUSTOM EXCERPT LENGTH
   ---------------------------------------------------------------- */
function cloud11_excerpt_length( $length ) {
    return 25;
}
add_filter( 'excerpt_length', 'cloud11_excerpt_length' );
