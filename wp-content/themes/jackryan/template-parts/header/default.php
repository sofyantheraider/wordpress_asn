<button class="btn btn--subtle main-header__nav-trigger js-main-header__nav-trigger" aria-label="Toggle menu" aria-expanded="false" aria-controls="main-header-nav">
<i class="main-header__nav-trigger-icon" aria-hidden="true"></i>
<span><?php esc_html_e('Menu', 'jackryan'); ?></span>
</button>
<nav class="main-header__nav js-main-header__nav" id="main-header-nav" aria-labelledby="primary-menu">
    <?php if ( has_nav_menu( 'primary-menu' ) ) {  jackryan_primary_menu(); } ?>
</nav>