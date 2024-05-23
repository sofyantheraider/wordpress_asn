<a class="back-to-top js-back-to-top" href="" data-offset="500" data-duration="300">
<svg viewBox="0 0 20 20">
<path d="M17,0H3C1.3,0,0,1.3,0,3v14c0,1.7,1.3,3,3,3h14c1.7,0,3-1.3,3-3V3C20,1.3,18.7,0,17,0z M12.3,11.7L11,10.4V16H9v-5.6
    l-1.3,1.3l-1.4-1.4L10,6.6l3.7,3.7L12.3,11.7z M14,6H6V4h8V6z"/>
</svg>
</a>
<footer class="ms-footer">
    <div class="footer-contacts">
        <div class="container footer-c__info">
            <div class="ms-logo__default">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <div class="logo-light">
                        <?php if (get_theme_mod( 'logo_light' )): ?>
                            <img src="<?php echo esc_url( get_theme_mod( 'logo_light' ) ); ?>" alt="<?php echo esc_attr( bloginfo( 'name' ) ); ?>">
                        <?php else: ?>
                            <h1><?php bloginfo( 'name' ); ?></h1>
                        <?php endif; ?>
                    </div>
                </a>
            </div> 
            <?php if ( is_active_sidebar( 'socials' )) : ?>
                <div class="footer__menu">
                    <?php if ( has_nav_menu( 'footer-menu' ) ) {  jackryan_footer_menu(); } ?>
                </div>
                <?php dynamic_sidebar( 'socials' ); ?>
            <?php else: ?>
                <div class="footer__menu right">
                    <?php if ( has_nav_menu( 'footer-menu' ) ) {  jackryan_footer_menu(); } ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="footer-copyright">
        <?php if ( get_theme_mod( 'footer_text' ) ) : ?>
            <p><?php echo get_theme_mod( 'footer_text' ); ?></p>
        <?php else: ?>
            <p><?php esc_html_e( 'Copyright &copy; 2020. Developed by MadSparrow', 'jackryan'); ?></p>
        <?php endif; ?>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>