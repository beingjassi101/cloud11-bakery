<?php
/**
 * Template Name: Menu Page
 * Description:  Dynamic bakery menu powered by ACF repeater fields.
 *
 * @package Cloud11_Bakery
 */

get_header();
?>

<section class="section" style="padding-top: 8rem;">
    <div class="site-container">
        <div class="section-label">Our Menu</div>
        <h1 class="section-title">Baked Fresh Daily</h1>
        <p class="section-desc">
            Everything is made in-house with locally sourced ingredients. Menu items and prices may vary with the season.
        </p>

        <?php if ( have_rows( 'menu_categories' ) ) : ?>
            <div class="menu-categories">
                <?php while ( have_rows( 'menu_categories' ) ) : the_row(); ?>
                    <div class="menu-category">
                        <h3><?php echo esc_html( get_sub_field( 'category_name' ) ); ?></h3>

                        <?php if ( have_rows( 'items' ) ) : ?>
                            <?php while ( have_rows( 'items' ) ) : the_row();
                                $image = get_sub_field( 'item_image' );
                            ?>
                                <div class="menu-item">
                                    <div>
                                        <div class="menu-item-name">
                                            <?php echo esc_html( get_sub_field( 'item_name' ) ); ?>
                                        </div>
                                        <?php if ( get_sub_field( 'item_description' ) ) : ?>
                                            <div class="menu-item-desc">
                                                <?php echo esc_html( get_sub_field( 'item_description' ) ); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="menu-item-price">
                                        $<?php echo esc_html( get_sub_field( 'item_price' ) ); ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>

        <?php else : ?>
            <!-- Fallback static menu when ACF fields are empty -->
            <div class="menu-categories">
                <div class="menu-category">
                    <h3>Artisan Breads</h3>
                    <div class="menu-item">
                        <div>
                            <div class="menu-item-name">Classic Sourdough</div>
                            <div class="menu-item-desc">72-hour ferment, crisp crust, open crumb</div>
                        </div>
                        <div class="menu-item-price">$8.50</div>
                    </div>
                    <div class="menu-item">
                        <div>
                            <div class="menu-item-name">Whole Wheat Loaf</div>
                            <div class="menu-item-desc">Stone-milled Ontario wheat, honey, oats</div>
                        </div>
                        <div class="menu-item-price">$7.00</div>
                    </div>
                    <div class="menu-item">
                        <div>
                            <div class="menu-item-name">Olive Rosemary Focaccia</div>
                            <div class="menu-item-desc">Kalamata olives, fresh rosemary, sea salt</div>
                        </div>
                        <div class="menu-item-price">$9.00</div>
                    </div>
                    <div class="menu-item">
                        <div>
                            <div class="menu-item-name">Multigrain Seed Loaf</div>
                            <div class="menu-item-desc">Flax, sunflower, sesame, pumpkin seeds</div>
                        </div>
                        <div class="menu-item-price">$8.00</div>
                    </div>
                </div>

                <div class="menu-category">
                    <h3>Pastries &amp; Viennoiserie</h3>
                    <div class="menu-item">
                        <div>
                            <div class="menu-item-name">Butter Croissant</div>
                            <div class="menu-item-desc">French butter, 48 layers, golden &amp; flaky</div>
                        </div>
                        <div class="menu-item-price">$4.50</div>
                    </div>
                    <div class="menu-item">
                        <div>
                            <div class="menu-item-name">Almond Croissant</div>
                            <div class="menu-item-desc">Frangipane fill, toasted almonds, icing sugar</div>
                        </div>
                        <div class="menu-item-price">$5.25</div>
                    </div>
                    <div class="menu-item">
                        <div>
                            <div class="menu-item-name">Pain au Chocolat</div>
                            <div class="menu-item-desc">Dark chocolate batons, laminated dough</div>
                        </div>
                        <div class="menu-item-price">$5.00</div>
                    </div>
                    <div class="menu-item">
                        <div>
                            <div class="menu-item-name">Cinnamon Roll</div>
                            <div class="menu-item-desc">Brown sugar, Ceylon cinnamon, cream cheese glaze</div>
                        </div>
                        <div class="menu-item-price">$5.50</div>
                    </div>
                </div>

                <div class="menu-category">
                    <h3>Seasonal Specials</h3>
                    <div class="menu-item">
                        <div>
                            <div class="menu-item-name">Berry Frangipane Tart</div>
                            <div class="menu-item-desc">Ontario strawberries &amp; blueberries, almond cream</div>
                        </div>
                        <div class="menu-item-price">$6.50</div>
                    </div>
                    <div class="menu-item">
                        <div>
                            <div class="menu-item-name">Lavender Lemon Scone</div>
                            <div class="menu-item-desc">Dried lavender, lemon zest, clotted cream</div>
                        </div>
                        <div class="menu-item-price">$4.00</div>
                    </div>
                    <div class="menu-item">
                        <div>
                            <div class="menu-item-name">Maple Pecan Danish</div>
                            <div class="menu-item-desc">Ontario maple syrup, candied pecans</div>
                        </div>
                        <div class="menu-item-price">$5.75</div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    </div>
</section>

<?php get_footer(); ?>
