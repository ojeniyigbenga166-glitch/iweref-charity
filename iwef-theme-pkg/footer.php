<?php
/**
 * IWEREF Theme Footer Template
 *
 * @package iweref
 */

// Customizer values
$address  = get_theme_mod( 'iweref_contact_address', 'Plot 2, Peniel Plaza, Block C Olusegun Obasanjo Way, Ilesha Road Akure, Ondo State, Nigeria' );
$email    = get_theme_mod( 'iweref_contact_email', 'info@iweref.org' );
$phone    = get_theme_mod( 'iweref_contact_phone', '+234 903 239 0394, +234 803 714 54' );
$fb       = get_theme_mod( 'iweref_social_facebook',  '#' );
$tw       = get_theme_mod( 'iweref_social_twitter',   '#' );
$ig       = get_theme_mod( 'iweref_social_instagram', '#' );
$li       = get_theme_mod( 'iweref_social_linkedin',  '#' );
?>

<!-- FOOTER -->
<footer class="footer">
    <div class="container grid grid-4 footer-top">

        <!-- Col 1: Brand -->
        <div class="footer-col">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-logo" aria-label="IWEREF Home">
                <svg class="logo-icon text-white" width="30" height="30" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <circle cx="50" cy="50" r="46" stroke="currentColor" stroke-width="8"/>
                    <path d="M50 22C50 22 72 48 72 62C72 74.1503 62.1503 84 50 84C37.8497 84 28 74.1503 28 62C28 48 50 22 50 22Z" fill="currentColor"/>
                    <path d="M50 45C58 45 70 52 70 65C70 73 62 78 50 78C53 73 53 62 50 45Z" fill="#65B307"/>
                </svg>
                <span class="footer-logo-text"><?php bloginfo( 'name' ); ?></span>
            </a>
            <p class="footer-desc"><?php esc_html_e( 'Restoring rivers, rebuilding forest corridors, and working with local communities to develop smart ecosystems that endure climate challenges.', 'iweref' ); ?></p>
            <div class="social-links">
                <a href="<?php echo esc_url( $fb ); ?>" aria-label="<?php esc_attr_e( 'Facebook', 'iweref' ); ?>" rel="noopener noreferrer" target="_blank">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                </a>
                <a href="<?php echo esc_url( $tw ); ?>" aria-label="<?php esc_attr_e( 'Twitter / X', 'iweref' ); ?>" rel="noopener noreferrer" target="_blank">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>
                </a>
                <a href="<?php echo esc_url( $ig ); ?>" aria-label="<?php esc_attr_e( 'Instagram', 'iweref' ); ?>" rel="noopener noreferrer" target="_blank">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                </a>
                <a href="<?php echo esc_url( $li ); ?>" aria-label="<?php esc_attr_e( 'LinkedIn', 'iweref' ); ?>" rel="noopener noreferrer" target="_blank">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
                </a>
            </div>
        </div>

        <!-- Col 2: About Links -->
        <div class="footer-col">
            <h3 class="footer-title"><?php esc_html_e( 'About Us', 'iweref' ); ?></h3>
            <ul class="footer-links">
                <li><a href="#about"><?php esc_html_e( 'Our Vision', 'iweref' ); ?></a></li>
                <li><a href="#about"><?php esc_html_e( 'Our Mission', 'iweref' ); ?></a></li>
                <li><a href="#about"><?php esc_html_e( 'The Team', 'iweref' ); ?></a></li>
                <li><a href="#contact"><?php esc_html_e( 'Partners', 'iweref' ); ?></a></li>
            </ul>
        </div>

        <!-- Col 3: Programs Links -->
        <div class="footer-col">
            <h3 class="footer-title"><?php esc_html_e( 'Programs', 'iweref' ); ?></h3>
            <ul class="footer-links">
                <li><a href="#programs"><?php esc_html_e( 'Water Management', 'iweref' ); ?></a></li>
                <li><a href="#programs"><?php esc_html_e( 'Conservation', 'iweref' ); ?></a></li>
                <li><a href="#programs"><?php esc_html_e( 'Climate Action', 'iweref' ); ?></a></li>
            </ul>
        </div>

        <!-- Col 4: Contact Details -->
        <div class="footer-col">
            <h3 class="footer-title"><?php esc_html_e( 'Contact', 'iweref' ); ?></h3>
            <address class="footer-contact">
                <p><strong><?php esc_html_e( 'Address:', 'iweref' ); ?></strong> <?php echo esc_html( $address ); ?></p>
                <p><strong><?php esc_html_e( 'Email:', 'iweref' ); ?></strong> <a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a></p>
                <p><strong><?php esc_html_e( 'Phone:', 'iweref' ); ?></strong> <a href="tel:<?php echo esc_attr( preg_replace( '/\D/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a></p>
            </address>
        </div>

    </div>

    <!-- Footer Bottom Bar -->
    <div class="footer-bottom">
        <div class="container flex justify-between align-center footer-bottom-flex">
            <p class="copyright">
                &copy; <?php echo esc_html( gmdate( 'Y' ) ); ?>
                <?php bloginfo( 'name' ); ?>.
                <?php esc_html_e( 'All rights reserved.', 'iweref' ); ?>
            </p>
            <div class="footer-policy">
                <a href="<?php echo esc_url( get_privacy_policy_url() ); ?>"><?php esc_html_e( 'Privacy Policy', 'iweref' ); ?></a>
                <span aria-hidden="true">|</span>
                <a href="#"><?php esc_html_e( 'Terms of Service', 'iweref' ); ?></a>
            </div>
        </div>
    </div>

</footer>

<?php wp_footer(); ?>
</body>
</html>
