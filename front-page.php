<?php
/**
 * Template: Front Page (Homepage)
 *
 * @package Cloud11_Bakery
 */

get_header();
?>

<section class="hero">
    <div class="site-container">
        <h1>Baked Fresh.<br><span class="gold">Every Single Day.</span></h1>
        <p class="tagline">
            Artisan breads, flaky pastries, and seasonal specials crafted with care at Cloud 11 Bakery — serving London, Ontario.
        </p>
        <div class="hero-cta">
            <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'menu' ) ) ); ?>" class="btn btn-primary">
                View Our Menu
            </a>
            <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'catering' ) ) ); ?>" class="btn btn-outline">
                Catering Inquiries
            </a>
        </div>
    </div>
</section>

<!-- Featured Items -->
<section class="section section--alt">
    <div class="site-container">
        <div class="section-label">Today's Picks</div>
        <h2 class="section-title">Fresh From the Oven</h2>
        <p class="section-desc">Our bakers start at 4 AM so you don't have to. Here's what's waiting for you.</p>

        <div class="menu-categories">
            <?php
            // Pull 3 most recent posts tagged as "featured"
            $featured = new WP_Query( array(
                'posts_per_page' => 3,
                'tag'            => 'featured',
                'post_status'    => 'publish',
            ));

            if ( $featured->have_posts() ) :
                while ( $featured->have_posts() ) : $featured->the_post();
            ?>
                <div class="menu-category">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="about-image">
                            <?php the_post_thumbnail( 'c11-menu-item' ); ?>
                        </div>
                    <?php endif; ?>
                    <h3><?php the_title(); ?></h3>
                    <p style="color: var(--c11-text-muted); font-size: 0.92rem;">
                        <?php echo esc_html( get_the_excerpt() ); ?>
                    </p>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
            ?>
                <!-- Fallback: static featured items -->
                <div class="menu-category">
                    <h3>Sourdough Loaf</h3>
                    <p style="color: var(--c11-text-muted); font-size: 0.92rem;">
                        72-hour fermented dough, crisp crust, open crumb. Our signature.
                    </p>
                </div>
                <div class="menu-category">
                    <h3>Almond Croissant</h3>
                    <p style="color: var(--c11-text-muted); font-size: 0.92rem;">
                        French butter, toasted almonds, light dusting of icing sugar.
                    </p>
                </div>
                <div class="menu-category">
                    <h3>Seasonal Berry Tart</h3>
                    <p style="color: var(--c11-text-muted); font-size: 0.92rem;">
                        Vanilla custard, Ontario-grown berries, buttery shortcrust shell.
                    </p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- About Teaser -->
<section class="section">
    <div class="site-container">
        <div class="about-grid">
            <div>
                <div class="section-label">Our Story</div>
                <h2 class="section-title">Small Batch. Big Heart.</h2>
                <div class="about-text">
                    <p>
                        Cloud 11 started with a simple idea — what if your neighbourhood bakery cared about every loaf
                        as much as you do? We source local ingredients, bake in small batches, and never cut corners.
                    </p>
                    <p>
                        Whether you're grabbing a morning croissant or ordering a custom cake for your celebration,
                        we're here to make your day a little better.
                    </p>
                </div>
                <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'about' ) ) ); ?>" class="btn btn-outline" style="margin-top: 1.5rem;">
                    Read More &rarr;
                </a>
            </div>
            <div class="about-image">
                <?php
                // If a featured image is set on the front page, use it
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail( 'c11-hero' );
                } else {
                    echo '<img src="' . esc_url( C11_THEME_URI . '/assets/images/bakery-interior.jpg' ) . '" alt="Inside Cloud 11 Bakery" loading="lazy">';
                }
                ?>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="section section--alt" style="text-align: center;">
    <div class="site-container">
        <div class="section-label">Catering</div>
        <h2 class="section-title">Planning an Event?</h2>
        <p class="section-desc" style="margin-left: auto; margin-right: auto;">
            From office breakfasts to wedding dessert tables — we'd love to be part of your next gathering.
        </p>
        <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'catering' ) ) ); ?>" class="btn btn-primary">
            Request a Quote
        </a>
    </div>
</section>

<?php get_footer(); ?>
