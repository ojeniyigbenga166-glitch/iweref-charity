<?php
/**
 * Template part for rendering the Contact section.
 *
 * @package iweref
 */

$contact_address = get_theme_mod( 'iweref_contact_address', 'Plot 2, Peniel Plaza, Block C Olusegun Obasanjo Way, Ilesha Road Akure, Ondo State, Nigeria' );
$contact_email   = get_theme_mod( 'iweref_contact_email',   'info@iweref.org' );
$contact_phone   = get_theme_mod( 'iweref_contact_phone',   '+234 903 239 0394, +234 803 714 54' );
?>

<section class="contact-section" id="contact">
    <div class="container grid grid-2">

        <!-- Contact Info Column -->
        <div class="contact-info scroll-reveal fade-right">
            <span class="section-label"><?php esc_html_e( 'CONTACT US', 'iweref' ); ?></span>
            <h2 class="section-title"><?php esc_html_e( 'Connect With Our Global Offices', 'iweref' ); ?></h2>
            <p class="section-desc"><?php esc_html_e( 'Have questions about our programs, sponsorships, or volunteering paths? Send us a message and our team will follow up within 24 hours.', 'iweref' ); ?></p>
            
            <div class="contact-details">
                <div class="contact-detail-item">
                    <div class="detail-icon" aria-hidden="true"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg></div>
                    <div>
                        <h4><?php esc_html_e( 'Main Office', 'iweref' ); ?></h4>
                        <p><?php echo esc_html( $contact_address ); ?></p>
                    </div>
                </div>
                <div class="contact-detail-item">
                    <div class="detail-icon" aria-hidden="true"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg></div>
                    <div>
                        <h4><?php esc_html_e( 'Email Us', 'iweref' ); ?></h4>
                        <p><a href="mailto:<?php echo esc_attr( $contact_email ); ?>"><?php echo esc_html( $contact_email ); ?></a></p>
                    </div>
                </div>
                <div class="contact-detail-item">
                    <div class="detail-icon" aria-hidden="true"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg></div>
                    <div>
                        <h4><?php esc_html_e( 'Call Centre', 'iweref' ); ?></h4>
                        <p><a href="tel:<?php echo esc_attr( preg_replace( '/[^\d+]/', '', $contact_phone ) ); ?>"><?php echo esc_html( $contact_phone ); ?></a></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Form Column -->
        <div class="contact-form-container scroll-reveal fade-left">
            <form id="iweref-contact-form" method="POST" action="">
                <?php wp_nonce_field( 'iweref_contact_nonce', 'nonce' ); ?>
                <input type="hidden" name="action" value="iweref_contact">
                <div class="form-row">
                    <div class="form-group">
                        <label for="contact-name"><?php esc_html_e( 'Your Name', 'iweref' ); ?> *</label>
                        <input type="text" id="contact-name" name="name" required placeholder="<?php esc_attr_e( 'John Doe', 'iweref' ); ?>">
                    </div>
                    <div class="form-group">
                        <label for="contact-email"><?php esc_html_e( 'Email Address', 'iweref' ); ?> *</label>
                        <input type="email" id="contact-email" name="email" required placeholder="<?php esc_attr_e( 'john@example.com', 'iweref' ); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="contact-subject"><?php esc_html_e( 'Subject', 'iweref' ); ?></label>
                    <input type="text" id="contact-subject" name="subject" placeholder="<?php esc_attr_e( 'How can we partner?', 'iweref' ); ?>">
                </div>
                <div class="form-group">
                    <label for="contact-message"><?php esc_html_e( 'Your Message', 'iweref' ); ?> *</label>
                    <textarea id="contact-message" name="message" required placeholder="<?php esc_attr_e( 'Write your message here...', 'iweref' ); ?>"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" id="contact-submit-btn"><?php esc_html_e( 'Send Message', 'iweref' ); ?></button>
                <div id="contact-form-response" class="form-response" aria-live="polite"></div>
            </form>
        </div>

    </div>
</section>
