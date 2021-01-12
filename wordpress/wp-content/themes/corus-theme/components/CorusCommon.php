<?php

/*
 * Common functions/methods to be used throughout the Corus custom code
 */

class CorusCommon {

	// variable definitions that can be used throughout the custom code
	public $dir;
	public $url;
	public $component_dir;
	public $component_url;

	public function __construct( $component_name = false ) {
		$this->component_dir = get_template_directory() . '/' . 'components';
		$this->component_url = get_template_directory_uri() . '/' . 'components';

		if ( ! $component_name ) {
			$reflector = new ReflectionClass( get_class( $this ) );

			$path = str_replace( '/class', '', dirname( $reflector->getFileName() ) );

			$component_name = basename( $path );
		}

		$this->dir = get_template_directory() . '/' . 'components' . '/' . $component_name . '/';
		$this->url = get_template_directory_uri() . '/' . 'components' . '/' . $component_name . '/';
	}

	/**
	 * Add a custom JavaScript file to WordPress
	 *
	 * @param $handle
	 * @param $file_name
	 * @param false $component_name
	 */
	public function addScript( $handle, $file_name, $component_name = false ) {
		list( $file_url, $v ) = $this->getFilenameAndVersion( $file_name, 'js', $component_name );
		wp_enqueue_script( $handle, $file_url, [], $v );
	}

	/**
	 * Add a custom CSS file to WordPress
	 *
	 * @param $handle
	 * @param $file_name
	 * @param $component_name
	 */
	public function addCSS( $handle, $file_name, $component_name = false ) {
		list( $file_url, $v ) = $this->getFilenameAndVersion( $file_name, 'css', $component_name );
		wp_enqueue_style( $handle, $file_url, [], $v );
	}

	/**
	 * Return version of the file and the path to the file
	 *
	 * @param $file_name
	 * @param $type
	 * @param $component_name
	 *
	 * @return array
	 */
	private function getFilenameAndVersion( $file_name, $type, $component_name ) {

		$dir = $this->dir . $type;
		$url = $this->url . $type;

		if ( $component_name !== false ) {
			$dir = $this->component_dir . '/' . $component_name . '/' . $type;
			$url = $this->component_url . '/' . $component_name . '/' . $type;
		}

		$v   = filemtime( $dir . '/' . $file_name );
		$url = $url . '/' . $file_name;

		return [ $url, $v ];
	}
}
