<?php
/*
Template Name: Homepage
*/
get_header();

$ct_phone             = get_option( 'ct_phone', '385.154.11.28.38' );
$ct_fax               = get_option( 'ct_fax', '385.154.35.66.78' );
$ct_address_raw       = get_option( 'ct_address', "Coalition Skills Test\n535 La Plata Street\n4200 Argentina" );
$ct_address_lines     = preg_split( '/\r\n|\r|\n/', (string) $ct_address_raw );
$ct_address_lines     = array_values( array_filter( array_map( 'trim', $ct_address_lines ) ) );
$ct_address_title     = isset( $ct_address_lines[0] ) ? $ct_address_lines[0] : 'Coalition Skills Test';
$ct_address_rest      = array_slice( $ct_address_lines, 1 );
$ct_social_facebook   = get_option( 'ct_social_facebook', '' );
$ct_social_twitter    = get_option( 'ct_social_twitter', '' );
$ct_social_linkedin   = get_option( 'ct_social_linkedin', '' );
$ct_social_pinterest  = get_option( 'ct_social_pinterest', '' );
?>

<section class="homepage-mockup">
    <div class="homepage-mockup__container">
        <p class="homepage-mockup__breadcrumb">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
            <span>/</span>
            <a href="#">Who we are</a>
            <span>/</span>
            <strong>Contact</strong>
        </p>

        <h1 class="homepage-mockup__title">Contact</h1>
        <p class="homepage-mockup__intro">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam posuere ipsum nec velit mattis elementum.
            Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas eu placerat
            metus, eget placerat libero.
        </p>

        <div class="homepage-mockup__content">
            <div class="homepage-mockup__column homepage-mockup__column--form">
                <h2>Contact Us</h2>
                <form class="homepage-mockup__form" action="#" method="post">
                    <label class="screen-reader-text" for="contact-name">Name</label>
                    <input id="contact-name" type="text" name="name" placeholder="Name *" required>

                    <div class="homepage-mockup__form-row">
                        <label class="screen-reader-text" for="contact-phone">Phone</label>
                        <input id="contact-phone" type="tel" name="phone" placeholder="Phone *" required>

                        <label class="screen-reader-text" for="contact-email">Email</label>
                        <input id="contact-email" type="email" name="email" placeholder="Email *" required>
                    </div>

                    <label class="screen-reader-text" for="contact-message">Message</label>
                    <textarea id="contact-message" name="message" rows="6" placeholder="Message *" required></textarea>

                    <button type="submit">Submit</button>
                </form>
            </div>

            <div class="homepage-mockup__column homepage-mockup__column--info">
                <h2>Reach Us</h2>
                <div class="homepage-mockup__address">
                    <p><?php echo esc_html( $ct_address_title ); ?></p>
                    <p class="homepage-mockup__address-info">
                        <?php
                        if ( ! empty( $ct_address_rest ) ) {
                            foreach ( $ct_address_rest as $index => $line ) {
                                echo esc_html( $line );
                                if ( $index < count( $ct_address_rest ) - 1 ) {
                                    echo '<br>';
                                }
                            }
                        }
                        ?>
                    </p>
                    <p class="homepage-mockup__contact-lines">
                        Phone: <?php echo esc_html( $ct_phone ); ?><br>
                        Fax: <?php echo esc_html( $ct_fax ); ?>
                    </p>
                </div>

                <ul class="homepage-mockup__social" aria-label="Social links">
                    <li>
                        <a href="<?php echo esc_url( $ct_social_facebook ? $ct_social_facebook : '#' ); ?>" aria-label="Facebook">
                            <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                                <path d="M13.5 8H16V5h-2.5c-2.2 0-3.5 1.5-3.5 3.8V11H8v3h2v5h3v-5h2.5l.5-3H13v-2c0-.7.3-1 1-1z"></path>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url( $ct_social_twitter ? $ct_social_twitter : '#' ); ?>" aria-label="Twitter">
                            <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                                <path d="M22 6.2c-.7.3-1.4.5-2.1.6.8-.5 1.3-1.2 1.6-2.1-.7.4-1.6.8-2.4.9A3.8 3.8 0 0 0 12.5 9c0 .3 0 .6.1.9-3.1-.2-5.8-1.7-7.7-4-.3.5-.5 1.2-.5 1.8 0 1.3.6 2.4 1.7 3.1-.6 0-1.2-.2-1.7-.5v.1c0 1.8 1.3 3.3 3 3.6-.3.1-.7.2-1 .2-.2 0-.5 0-.7-.1.5 1.5 2 2.6 3.7 2.7A7.7 7.7 0 0 1 4 18.5 10.8 10.8 0 0 0 9.9 20c7 0 10.8-5.8 10.8-10.8v-.5c.8-.5 1.4-1.2 1.9-2z"></path>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url( $ct_social_linkedin ? $ct_social_linkedin : '#' ); ?>" aria-label="LinkedIn">
                            <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                                <path d="M6.4 8.8a1.9 1.9 0 1 1 0-3.8 1.9 1.9 0 0 1 0 3.8zM4.8 10h3.2v9.2H4.8V10zm5.2 0h3v1.3h.1c.4-.8 1.5-1.6 3.1-1.6 3.3 0 3.9 2.1 3.9 4.9v4.6h-3.2v-4.1c0-1 0-2.2-1.4-2.2s-1.6 1-1.6 2.1v4.2H10V10z"></path>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url( $ct_social_pinterest ? $ct_social_pinterest : '#' ); ?>" aria-label="Pinterest">
                            <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                                <path d="M12 4C7.8 4 5 6.9 5 10.8c0 3 1.7 4.7 2.7 4.7.4 0 .7-1 .7-1.3 0-.3-.8-1-1-2.5-.2-2.9 2.2-5.5 5.3-5.5 2.9 0 4.9 1.6 4.9 4.6 0 2.2-.9 6.4-3.9 6.4-1.1 0-2-1-1.7-2.1.3-1.3.8-2.7.8-4.1 0-2.4-3.4-2.2-3.4 1.1 0 1 .3 1.6.3 1.6l-1.3 5.6c1.2.4 2.4.6 3.7.6 4.8 0 8.2-3.5 8.2-8.3C20.3 7.3 16.8 4 12 4z"></path>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>