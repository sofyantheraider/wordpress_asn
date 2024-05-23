<nav class="main-header__nav ms-nav-drawer" id="main-header-nav" aria-labelledby="primary-menu">
<span class="b_menu-wrapper" aria-controls="drawer3">
    <span class="b_menu"></span>
</span>
<div class="drawer drawer--modal js-drawer js-drawer--modal" id="drawer3">
  <div class="drawer__content" role="alertdialog"  aria-labelledby="drawerTitle3">
    <div class="drawer__body padding-x-md padding-y-sm js-drawer__body">
        <nav class="main-header__nav-drawer">
        <?php if ( has_nav_menu( 'primary-menu' ) ) {  jackryan_primary_menu(); } ?>
        </nav>
    </div>
    <button class="reset drawer__close-btn position-fixed js-tab-focus js-drawer__close">
      <svg class="icon" viewBox="0 0 18 18" ><title>Close drawer panel</title><g stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"><line x1="16" y1="2" x2="2" y2="16"></line><line x1="2" y1="2" x2="16" y2="16"></line></g></svg>
    </button>
  </div>
</div>
</nav>