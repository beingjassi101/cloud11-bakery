<?php
/**
 * Default Template
 *
 * @package Cloud11_Bakery
 */

get_header();
?>

<section class="section" style="padding-top: 8rem;">
    <div class="site-container">

        <?php if ( have_posts() ) : ?>

            <div class="section-label">Blog</div>
            <h1 class="section-title">From Our Kitchen</h1>
            <p class="section-desc">Stories, recipes, and behind-the-scenes looks at what goes into every bake.</p>

            <div class="menu-categories">
                <?php while ( have_posts() ) : the_post(); ?>
                    <article class="menu-category">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="about-image" style="margin-bottom: 1.25rem;">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail( 'c11-menu-item' ); ?>
                                </a>
                            </div>
                        <?php endif; ?>

                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p style="font-size: 0.82rem; color: var(--c11-text-muted); margin-bottom: 0.5rem;">
                            <?php echo get_the_date(); ?>
                        </p>
                        <p style="color: var(--c11-text-muted); font-size: 0.92rem;">
                            <?php echo esc_html( get_the_excerpt() ); ?>
                        </p>
                        <a href="<?php the_permalink(); ?>" style="font-weight: 600; font-size: 0.88rem;">
                            Read More &rarr;
                        </a>
                    </article>
                <?php endwhile; ?>
            </div>

            <div style="text-align: center; margin-top: 3rem;">
                <?php
                the_posts_pagination( array(
                    'mid_size'  => 2,
                    'prev_text' => '&larr; Previous',
                    'next_text' => 'Next &rarr;',
                ));
                ?>
            </div>

        <?php else : ?>
            <h2 class="section-title">Nothing here yet!</h2>
            <p class="section-desc">Check back soon — fresh content is on the way.</p>
        <?php endif; ?>

    </div>
</section>

<?php get_footer(); ?>
