<?php
/**
 * Theme Footer
 *
 * @package Cloud11_Bakery
 */
?>
</main><!-- #main-content -->

<footer class="site-footer">
    <div class="footer-inner">
        <div class="footer-brand">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo">
                Cloud <span>11</span>
            </a>
            <p>Artisan breads, pastries, and seasonal specials baked fresh daily in Bilaspur, India.</p>
        </div>

        <div class="footer-col">
            <h4><?php esc_html_e( 'Quick Links', 'cloud11-bakery' ); ?></h4>
            <?php
            wp_nav_menu( array(
                'theme_location' => 'footer',
                'container'      => false,
                'menu_class'     => '',
                'fallback_cb'    => false,
            ));
            ?>
        </div>

        <div class="footer-col">
            <h4><?php esc_html_e( 'Hours', 'cloud11-bakery' ); ?></h4>
            <ul>
                <li>Mon – Fri: 7:00 AM – 6:00 PM</li>
                <li>Sat – Sun: 8:00 AM – 4:00 PM</li>
            </ul>
            <h4 style="margin-top: 1.25rem;"><?php esc_html_e( 'Contact', 'cloud11-bakery' ); ?></h4>
            <ul>
                <li><a href="tel:+91XXXXXXXXXX">+91 (XXX) XXX-XXXX</a></li>
                <li><a href="mailto:hello@cloud11bakery.in">hello@cloud11bakery.in</a></li>
            </ul>
        </div>
    </div>

    <div class="footer-bottom">
        <p>&copy; <?php echo date( 'Y' ); ?> Cloud 11 Bakery. All rights reserved. Built with WordPress.</p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
