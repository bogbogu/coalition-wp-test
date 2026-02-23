<?php
/*
Template Name: Homepage
*/
get_header();
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

        <h1 class="homepage-mockup__title"><?php the_title(); ?></h1>
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
                    <p><strong>Coalition Skills Test</strong></p>
                    <p>535 La Plata Street</p>
                    <p>4200 Argentina</p>
                    <p class="homepage-mockup__contact-lines">
                        Phone: 385.154.11.28.38<br>
                        Fax: 385.154.35.66.78
                    </p>
                </div>

                <ul class="homepage-mockup__social" aria-label="Social links">
                    <li><a href="#" aria-label="Facebook">f</a></li>
                    <li><a href="#" aria-label="Twitter">t</a></li>
                    <li><a href="#" aria-label="LinkedIn">in</a></li>
                    <li><a href="#" aria-label="Pinterest">p</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>