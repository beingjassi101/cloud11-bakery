<?php
/**
 * Template Name: Catering Page
 * Description:  Catering inquiry page with Contact Form 7 integration.
 *
 * @package Cloud11_Bakery
 */

get_header();
?>

<section class="section" style="padding-top: 8rem;">
    <div class="site-container">
        <div style="text-align: center; margin-bottom: 3rem;">
            <div class="section-label">Catering</div>
            <h1 class="section-title">Let Us Cater Your Event</h1>
            <p class="section-desc" style="margin-left: auto; margin-right: auto;">
                From office breakfasts and corporate lunches to wedding dessert tables and birthday parties — 
                we'll bring the bakery to you. Fill out the form below and we'll get back to you within 24 hours.
            </p>
        </div>

        <div class="catering-form-wrapper">
            <?php
            /**
             * Contact Form 7 shortcode.
             *
             * Create a CF7 form in WP Admin → Contact → Add New with these fields:
             *   - Your Name (text, required)
             *   - Email (email, required)
             *   - Phone (tel, optional)
             *   - Event Date (date, required)
             *   - Guest Count (number, required)
             *   - Event Type (select: Corporate, Wedding, Birthday, Other)
             *   - Message / Special Requests (textarea)
             *
             * Replace the ID below with your actual CF7 form ID.
             */
            if ( shortcode_exists( 'contact-form-7' ) ) {
                echo do_shortcode( '[contact-form-7 id="REPLACE_WITH_FORM_ID" title="Catering Inquiry"]' );
            } else {
                // Fallback HTML form if CF7 is not installed
            ?>
                <p style="color: var(--c11-text-muted); margin-bottom: 1.5rem; font-size: 0.9rem;">
                    <em>Contact Form 7 plugin required. Install it from Plugins → Add New in WordPress admin.</em>
                </p>

                <div style="display: grid; gap: 1rem;">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                        <div>
                            <label style="font-size: 0.85rem; font-weight: 600; display: block; margin-bottom: 0.35rem;">
                                Your Name *
                            </label>
                            <input type="text" placeholder="Full name" required
                                   style="width:100%; padding: 0.85rem 1.2rem; border: 1px solid var(--c11-border);
                                          border-radius: var(--c11-radius); font-family: var(--c11-font-body); font-size: 0.9rem;">
                        </div>
                        <div>
                            <label style="font-size: 0.85rem; font-weight: 600; display: block; margin-bottom: 0.35rem;">
                                Email *
                            </label>
                            <input type="email" placeholder="you@email.com" required
                                   style="width:100%; padding: 0.85rem 1.2rem; border: 1px solid var(--c11-border);
                                          border-radius: var(--c11-radius); font-family: var(--c11-font-body); font-size: 0.9rem;">
                        </div>
                    </div>
                    <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 1rem;">
                        <div>
                            <label style="font-size: 0.85rem; font-weight: 600; display: block; margin-bottom: 0.35rem;">
                                Phone
                            </label>
                            <input type="tel" placeholder="(XXX) XXX-XXXX"
                                   style="width:100%; padding: 0.85rem 1.2rem; border: 1px solid var(--c11-border);
                                          border-radius: var(--c11-radius); font-family: var(--c11-font-body); font-size: 0.9rem;">
                        </div>
                        <div>
                            <label style="font-size: 0.85rem; font-weight: 600; display: block; margin-bottom: 0.35rem;">
                                Event Date *
                            </label>
                            <input type="date" required
                                   style="width:100%; padding: 0.85rem 1.2rem; border: 1px solid var(--c11-border);
                                          border-radius: var(--c11-radius); font-family: var(--c11-font-body); font-size: 0.9rem;">
                        </div>
                        <div>
                            <label style="font-size: 0.85rem; font-weight: 600; display: block; margin-bottom: 0.35rem;">
                                Guest Count *
                            </label>
                            <input type="number" placeholder="25" min="1" required
                                   style="width:100%; padding: 0.85rem 1.2rem; border: 1px solid var(--c11-border);
                                          border-radius: var(--c11-radius); font-family: var(--c11-font-body); font-size: 0.9rem;">
                        </div>
                    </div>
                    <div>
                        <label style="font-size: 0.85rem; font-weight: 600; display: block; margin-bottom: 0.35rem;">
                            Event Type
                        </label>
                        <select style="width:100%; padding: 0.85rem 1.2rem; border: 1px solid var(--c11-border);
                                       border-radius: var(--c11-radius); font-family: var(--c11-font-body); font-size: 0.9rem;
                                       background: var(--c11-white);">
                            <option value="">Select type...</option>
                            <option value="corporate">Corporate</option>
                            <option value="wedding">Wedding</option>
                            <option value="birthday">Birthday</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div>
                        <label style="font-size: 0.85rem; font-weight: 600; display: block; margin-bottom: 0.35rem;">
                            Message / Special Requests
                        </label>
                        <textarea rows="5" placeholder="Tell us about your event, dietary requirements, preferences..."
                                  style="width:100%; padding: 0.85rem 1.2rem; border: 1px solid var(--c11-border);
                                         border-radius: var(--c11-radius); font-family: var(--c11-font-body); font-size: 0.9rem;
                                         resize: vertical;"></textarea>
                    </div>
                    <button class="btn btn-primary" onclick="alert('Thank you! We\'ll be in touch within 24 hours.')">
                        Submit Inquiry
                    </button>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
