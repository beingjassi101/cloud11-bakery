
<?php
/**
 * Theme Header
 *
 * @package Cloud11_Bakery
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cloud 11 Bakery - Artisan breads, pastries, and seasonal specials baked fresh daily in Bilaspur, India.">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header" id="siteHeader">
    <div class="header-inner">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo">
            Cloud <span>11</span>
        </a>

        <nav class="main-nav" role="navigation" aria-label="<?php esc_attr_e( 'Primary Navigation', 'cloud11-bakery' ); ?>">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'nav-list',
                'fallback_cb'    => 'cloud11_fallback_menu',
            ));
            ?>
        </nav>

        <button class="nav-toggle" id="navToggle" aria-label="<?php esc_attr_e( 'Toggle menu', 'cloud11-bakery' ); ?>">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</header>

<main id="main-content" class="site-main">
