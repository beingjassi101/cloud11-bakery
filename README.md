# Cloud 11 Bakery — Custom WordPress Theme

A fully responsive, performance-optimized WordPress theme built for **Cloud 11 Bakery**, a newly launched artisan bakery. Developed from scratch using a child theme architecture with custom HTML/CSS, dynamic content fields, and local SEO integration.

---

## Live Features

- **Dynamic Menu Page** — Built with ACF (Advanced Custom Fields) repeater fields, allowing the owner to add, edit, and categorize items (breads, pastries, seasonal specials) without developer involvement.
- **Catering Inquiry Page** — Custom page template (`page-catering.php`) with Contact Form 7 integration, input validation, and email notification routing.
- **Local SEO** — Google Maps API embed on the location page with Schema.org `LocalBusiness` structured data in the theme header.
- **Performance Optimized** — 90+ Lighthouse score achieved via lazy loading, browser caching (W3 Total Cache), asset compression (Autoptimize), and WebP image conversion.
- **Analytics** — Google Analytics 4 configured via Google Site Kit with conversion tracking on the contact form.
- **Responsive Design** — Tested across Chrome, Firefox, Safari, and Edge on mobile, tablet, and desktop breakpoints using CSS Grid and Flexbox.

---

## Tech Stack

| Layer         | Technology                                              |
|---------------|---------------------------------------------------------|
| CMS           | WordPress 6.x                                          |
| Server        | LAMP (Linux, Apache, MySQL, PHP 8.x)                   |
| Frontend      | HTML5, CSS3, JavaScript (vanilla)                       |
| Plugins       | ACF Pro, Contact Form 7, W3 Total Cache, Google Site Kit|
| APIs          | Google Maps API, Schema.org, GA4                        |
| Version Control | Git                                                   |

---

## Theme Structure

```
cloud11-bakery-theme/
├── style.css                 # Theme declaration + custom styles
├── functions.php             # Theme setup, enqueues, ACF registration
├── header.php                # Site header, nav, Schema.org markup
├── footer.php                # Site footer, scripts
├── index.php                 # Default template
├── front-page.php            # Homepage — hero, featured items, CTA
├── page-menu.php             # Template: Dynamic bakery menu (ACF)
├── page-catering.php         # Template: Catering inquiry form
├── templates/
│   └── template-about.php    # Template: About / Our Story
├── assets/
│   ├── css/
│   │   └── custom.css        # Additional component styles
│   ├── js/
│   │   └── main.js           # Lazy loading, smooth scroll, mobile nav
│   └── images/               # Theme images & screenshots
├── screenshot.png            # Theme preview in WP admin
└── README.md
```

---

## Installation

1. **Prerequisites** — WordPress 6.x running on a LAMP/LEMP stack (or [Local by Flywheel](https://localwp.com/) for local dev).

2. **Clone the repo:**
   ```bash
   cd wp-content/themes/
   git clone https://github.com/beingjassi/cloud11-bakery-theme.git
   ```

3. **Activate the theme** in `Appearance → Themes` from the WordPress admin panel.

4. **Install required plugins:**
   - [Advanced Custom Fields Pro](https://www.advancedcustomfields.com/)
   - [Contact Form 7](https://wordpress.org/plugins/contact-form-7/)
   - [W3 Total Cache](https://wordpress.org/plugins/w3-total-cache/)
   - [Google Site Kit](https://wordpress.org/plugins/google-site-kit/)

5. **Import ACF field groups** — Navigate to `Custom Fields → Tools → Import` and upload the `acf-export.json` file (included in the repo root).

6. **Create pages** and assign templates:
   - `Home` → Set as static front page
   - `Our Menu` → Assign **Menu Page** template
   - `Catering` → Assign **Catering Page** template
   - `About` → Assign **About Page** template

7. **Configure plugins:**
   - Add your Google Maps API key in `functions.php` (line 48)
   - Connect Google Site Kit to your GA4 property
   - Enable W3 Total Cache → Page Cache & Browser Cache

---

## Performance

| Metric               | Score     |
|----------------------|-----------|
| Lighthouse Performance | 92       |
| Lighthouse Accessibility | 95     |
| Lighthouse SEO         | 100      |
| First Contentful Paint | 1.2s     |
| Largest Contentful Paint | 2.1s   |

---

## Key Development Decisions

- **Child theme architecture** — Custom overrides sit in `style.css` and `functions.php` without modifying the parent, ensuring update compatibility.
- **ACF repeater fields over WooCommerce** — The bakery doesn't sell online; a lightweight ACF-based menu is faster and simpler than a full e-commerce plugin.
- **Vanilla JS over jQuery** — Reduced payload by avoiding jQuery dependency for scroll effects, lazy loading, and mobile nav toggle.
- **Schema.org LocalBusiness** — Injected via `wp_head` hook in `functions.php` for clean separation; improves Google Business Profile integration.

---

## Post-Launch Support

Provided 30 days of post-launch maintenance:
- Uptime monitoring via UptimeRobot (99.9% uptime)
- WordPress core and plugin security patches
- Resolved 2 plugin compatibility issues after a CF7 update
- Owner training on Gutenberg editor, media library, and plugin updates

---

## Screenshots

> *Add screenshots of the homepage, menu page, mobile view, and WP admin panel here.*

---

## Author

**Jaspreet Singh Bharaj**
- Email: jsbharaj@protonmail.com
- LinkedIn: [linkedin.com/in/beingjassi](https://linkedin.com/in/beingjassi)
- GitHub: [github.com/beingjassi](https://github.com/beingjassi)

---

## License

This theme is developed for Cloud 11 Bakery. Code is available for portfolio and reference purposes.
