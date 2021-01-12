<?php

/**
 * Class CorusGallery
 */
class CorusGallery extends CorusCommon {

	public function __construct() {
		parent::__construct();

		add_action( 'init', [ &$this, 'createGalleryPostType' ] );

		add_action( 'wp_enqueue_scripts', [ &$this, 'addScriptsAndStylesOnFrontEnd' ] );
	}

	/**
	 * Create gallery post type
	 */
	public function createGalleryPostType() {
		register_post_type( 'gallery',
			[
				'labels'      => [
					'name'          => __( 'Gallery' ),
					'singular_name' => __( 'Gallery' )
				],
				'public'      => true,
				'has_archive' => false,
				'rewrite'     => [ 'slug' => 'gallery' ],
			]
		);
	}

	/**
	 * Add gallery js/css assets
	 */
	public function addScriptsAndStylesOnFrontEnd() {
		// Add slick slider assets
		$this->addCSS( 'slick-css', 'slick.css', 'slick-slider' );
		$this->addCSS( 'slick-theme-css', 'slick-theme.css', 'slick-slider' );
		$this->addScript( 'slick-slider-js', 'slick.min.js', 'slick-slider' );

		// Add gallery assets
		$this->addCSS( 'corus-gallery-css', 'gallery.css' );
		$this->addScript( 'corus-gallery-js', 'gallery.js' );

	}
}



