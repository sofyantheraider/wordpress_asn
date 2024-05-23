<?php

/**
 * Include required assets (css, js etc.)
 */

class JackryanEnqueueAssets{

	public function __construct() {
		$theme_info = wp_get_theme();
		$this->assets_dir = JACKRYAN_THEME_DIRECTORY . 'assets/';
		$this->theme_version = $theme_info[ 'Version' ];
		$this->init_assets();
	}

	public function init_assets(){
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_gutenberg_editor_styles' ) );
	}

	public function enqueue_gutenberg_editor_styles() {
		wp_enqueue_style( 'ms-gutenberg', $this->assets_dir .'css/ms-gutenberg-style.css', array(), $this->theme_version );
	}

	public function fonts_url() { 
		$fonts_url = ''; 
		$fonts = array(); 
		$subsets = 'latin-ext'; 
		$fonts[] = 'Bebas Neue|Roboto:300,400,400i,500,700,900';  
		if ( $fonts ) { 
			$fonts_url = add_query_arg( array( 
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ), 
			), 'https://fonts.googleapis.com/css' ); 
		} 
		return $fonts_url; 
	}

	public function enqueue_styles() {
		wp_enqueue_style( 'swiper', $this->assets_dir .'css/vendor/swiper.min.css', array(), $this->theme_version );
		wp_enqueue_style( 'magnific-popup', $this->assets_dir .'css/vendor/magnific-popup.css', array(), $this->theme_version );
		wp_enqueue_style( 'socicon', $this->assets_dir .'css/vendor/socicon.css', array(), $this->theme_version );
		wp_enqueue_style( 'google-font-archivo-narrow', $this->fonts_url(), false, $this->theme_version );
		wp_enqueue_style( 'jackryan-main-style', $this->assets_dir .'css/main.css', array(), $this->theme_version );
	}

	public function enqueue_scripts() {
		if( is_singular() && comments_open() ) {
			wp_enqueue_script( 'comment-reply' );
		}
		wp_enqueue_script( 'imagesloaded' );
		wp_enqueue_script( 'modernizr', $this->assets_dir .'js/vendor/modernizr.js', array( 'jquery' ), $this->theme_version, true );
		wp_enqueue_script( 'isotope', $this->assets_dir .'js/vendor/isotope.pkgd.min.js', array( 'jquery' ), $this->theme_version, true );
		wp_enqueue_script( 'swiper', $this->assets_dir .'js/vendor/swiper.min.js', array( 'jquery' ), $this->theme_version, true );
		wp_enqueue_script( 'jarallax', $this->assets_dir .'js/vendor/jarallax.min.js', array( 'jquery' ), $this->theme_version, true );
		wp_enqueue_script( 'jarallax-video', $this->assets_dir .'js/vendor/jarallax-video.min.js', array( 'jquery' ), $this->theme_version, true );
		wp_enqueue_script( 'fslightbox', $this->assets_dir .'js/vendor/fslightbox.js', array( 'jquery' ), $this->theme_version, true );
		wp_enqueue_script( 'gsap', $this->assets_dir .'js/vendor/gsap.min.js', array( 'jquery' ), $this->theme_version, true );
		wp_enqueue_script( 'util', $this->assets_dir .'js/util.js', array( 'jquery' ), $this->theme_version, true );
		
		wp_enqueue_script( 'jackryan-main-script', $this->assets_dir .'js/app.js', array( 'jquery' ), $this->theme_version, true );
	}
	
}

new JackryanEnqueueAssets;