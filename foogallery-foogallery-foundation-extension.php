<?php
/**
 * FooGallery FooGallery Foundation Extension
 *
 * A template based on the Foundation Grid
 *
 * @package   FooGallery_Foundation_Template_FooGallery_Extension
 * @author    Tor Morten Jensen 
 * @license   GPL-2.0+
 * @link      http://anunatak.no
 * @copyright 2014 Tor Morten Jensen 
 *
 * @wordpress-plugin
 * Plugin Name: FooGallery - FooGallery Foundation
 * Description: A template based on the Foundation Grid
 * Version:     1.0.0
 * Author:      Tor Morten Jensen 
 * Author URI:  http://anunatak.no
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

if ( !class_exists( 'FooGallery_Foundation_Template_FooGallery_Extension' ) ) {

	define('FOOGALLERY_FOUNDATION_TEMPLATE_FOOGALLERY_EXTENSION_URL', plugin_dir_url( __FILE__ ));
	define('FOOGALLERY_FOUNDATION_TEMPLATE_FOOGALLERY_EXTENSION_VERSION', '1.0.0');

	require_once( 'foogallery-foogallery-foundation-init.php' );

	class FooGallery_Foundation_Template_FooGallery_Extension {
		/**
		 * Wire up everything we need to run the extension
		 */
		function __construct() {
			add_filter( 'foogallery_gallery_templates', array( $this, 'add_template' ) );
			add_filter( 'foogallery_gallery_templates_files', array( $this, 'register_myself' ) );
			add_filter( 'foogallery_located_template-foogallery-foundation', array( $this, 'enqueue_dependencies' ) );
		}

		/**
		 * Register myself so that all associated JS and CSS files can be found and automatically included
		 * @param $extensions
		 *
		 * @return array
		 */
		function register_myself( $extensions ) {
			$extensions[] = __FILE__;
			return $extensions;
		}

		/**
		 * Enqueue any script or stylesheet file dependencies that your gallery template relies on
		 */
		function enqueue_dependencies() {
			//$js = FOOGALLERY_FOUNDATION_TEMPLATE_FOOGALLERY_EXTENSION_URL . 'js/jquery.foogallery-foundation.js';
			//wp_enqueue_script( 'foogallery-foundation', $js, array('jquery'), FOOGALLERY_FOUNDATION_TEMPLATE_FOOGALLERY_EXTENSION_VERSION );

			//$css = FOOGALLERY_FOUNDATION_TEMPLATE_FOOGALLERY_EXTENSION_URL . 'css/foogallery-foundation.css';
			//wp_enqueue_style( 'foogallery-foundation', $css, array(), FOOGALLERY_FOUNDATION_TEMPLATE_FOOGALLERY_EXTENSION_VERSION );
		}

		/**
		 * Add our gallery template to the list of templates available for every gallery
		 * @param $gallery_templates
		 *
		 * @return array
		 */
		function add_template( $gallery_templates ) {

			$gallery_templates[] = array(
				'slug'        => 'foogallery-foundation',
				'name'        => __( 'FooGallery Foundation', 'foogallery-foogallery-foundation'),
				'preview_css' => FOOGALLERY_FOUNDATION_TEMPLATE_FOOGALLERY_EXTENSION_URL . 'css/gallery-foogallery-foundation.css',
				'admin_js'	  => FOOGALLERY_FOUNDATION_TEMPLATE_FOOGALLERY_EXTENSION_URL . 'js/admin-gallery-foogallery-foundation.js',
				'fields'	  => array(
					array(
						'id'      => 'thumbnail_size',
						'title'   => __('Thumbnail Size', 'foogallery-foogallery-foundation'),
						'desc'    => __('Choose the size of your thumbs.', 'foogallery-foogallery-foundation'),
						'type'    => 'thumb_size',
						'default' => array(
							'width' => get_option( 'thumbnail_size_w' ),
							'height' => get_option( 'thumbnail_size_h' ),
							'crop' => true
						)
					),
					array(
						'id'      => 'thumbnail_link',
						'title'   => __('Thumbnail Link', 'foogallery-foogallery-foundation'),
						'default' => 'image' ,
						'type'    => 'thumb_link',
						'spacer'  => '<span class="spacer"></span>',
						'desc'	  => __('You can choose to either link each thumbnail to the full size image or to the image\'s attachment page.', 'foogallery-foogallery-foundation')
					),
					array(
						'id'      => 'lightbox',
						'title'   => __('Lightbox', 'foogallery-foogallery-foundation'),
						'desc'    => __('Choose which lightbox you want to use in the gallery.', 'foogallery-foogallery-foundation'),
						'type'    => 'lightbox'
					),
					array(
						'id'      => 'per_row',
						'title'   => __('Images per Row (large screens)', 'foogallery-foogallery-foundation'),
						'desc'    => __('How many images should be shown per row?', 'foogallery-foogallery-foundation'),
						'default' => '4',
						'type'    => 'select',
						'choices' => array(
							'1' => __( '1 per row', 'foogallery-foogallery-foundation' ),
							'2' => __( '2 per row', 'foogallery-foogallery-foundation' ),
							'3' => __( '3 per row', 'foogallery-foogallery-foundation' ),
							'4' => __( '4 per row', 'foogallery-foogallery-foundation' ),
							'5' => __( '5 per row', 'foogallery-foogallery-foundation' ),
							'6' => __( '6 per row', 'foogallery-foogallery-foundation' ),
							'7' => __( '7 per row', 'foogallery-foogallery-foundation' ),
							'8' => __( '8 per row', 'foogallery-foogallery-foundation' ),
							'9' => __( '9 per row', 'foogallery-foogallery-foundation' ),
							'10' => __( '10 per row', 'foogallery-foogallery-foundation' ),
						)
					),
					array(
						'id'      => 'per_row_medium',
						'title'   => __('Images per Row (medium screens)', 'foogallery-foogallery-foundation'),
						'desc'    => __('How many images should be shown per row?', 'foogallery-foogallery-foundation'),
						'default' => '4',
						'type'    => 'select',
						'choices' => array(
							'1' => __( '1 per row', 'foogallery-foogallery-foundation' ),
							'2' => __( '2 per row', 'foogallery-foogallery-foundation' ),
							'3' => __( '3 per row', 'foogallery-foogallery-foundation' ),
							'4' => __( '4 per row', 'foogallery-foogallery-foundation' ),
							'5' => __( '5 per row', 'foogallery-foogallery-foundation' ),
							'6' => __( '6 per row', 'foogallery-foogallery-foundation' ),
							'7' => __( '7 per row', 'foogallery-foogallery-foundation' ),
							'8' => __( '8 per row', 'foogallery-foogallery-foundation' ),
							'9' => __( '9 per row', 'foogallery-foogallery-foundation' ),
							'10' => __( '10 per row', 'foogallery-foogallery-foundation' ),
						)
					),
					array(
						'id'      => 'per_row_small',
						'title'   => __('Images per Row (small screens)', 'foogallery-foogallery-foundation'),
						'desc'    => __('How many images should be shown per row?', 'foogallery-foogallery-foundation'),
						'default' => '4',
						'type'    => 'select',
						'choices' => array(
							'1' => __( '1 per row', 'foogallery-foogallery-foundation' ),
							'2' => __( '2 per row', 'foogallery-foogallery-foundation' ),
							'3' => __( '3 per row', 'foogallery-foogallery-foundation' ),
							'4' => __( '4 per row', 'foogallery-foogallery-foundation' ),
							'5' => __( '5 per row', 'foogallery-foogallery-foundation' ),
							'6' => __( '6 per row', 'foogallery-foogallery-foundation' ),
							'7' => __( '7 per row', 'foogallery-foogallery-foundation' ),
							'8' => __( '8 per row', 'foogallery-foogallery-foundation' ),
							'9' => __( '9 per row', 'foogallery-foogallery-foundation' ),
							'10' => __( '10 per row', 'foogallery-foogallery-foundation' ),
						)
					),
					array(
						'id'      => 'gallery_description',
						'title'   => __('Description', 'foogallery-foogallery-foundation'),
						'desc'    => __('Gallery description', 'foogallery-foogallery-foundation'),
						'default' => '',
						'type'    => 'textarea'
					),
					
					//available field types available : html, checkbox, select, radio, textarea, text, checkboxlist, icon
					//an example of a icon field used in the default gallery template
					//array(
					//	'id'      => 'border-style',
					//	'title'   => __('Border Style', 'foogallery-foogallery-foundation'),
					//	'desc'    => __('The border style for each thumbnail in the gallery.', 'foogallery-foogallery-foundation'),
					//	'type'    => 'icon',
					//	'default' => 'border-style-square-white',
					//	'choices' => array(
					//		'border-style-square-white' => array('label' => 'Square white border with shadow', 'img' => FOOGALLERY_DEFAULT_TEMPLATES_EXTENSION_URL . 'assets/border-style-icon-square-white.png'),
					//		'border-style-circle-white' => array('label' => 'Circular white border with shadow', 'img' => FOOGALLERY_DEFAULT_TEMPLATES_EXTENSION_URL . 'assets/border-style-icon-circle-white.png'),
					//		'border-style-square-black' => array('label' => 'Square Black', 'img' => FOOGALLERY_DEFAULT_TEMPLATES_EXTENSION_URL . 'assets/border-style-icon-square-black.png'),
					//		'border-style-circle-black' => array('label' => 'Circular Black', 'img' => FOOGALLERY_DEFAULT_TEMPLATES_EXTENSION_URL . 'assets/border-style-icon-circle-black.png'),
					//		'border-style-inset' => array('label' => 'Square Inset', 'img' => FOOGALLERY_DEFAULT_TEMPLATES_EXTENSION_URL . 'assets/border-style-icon-square-inset.png'),
					//		'border-style-rounded' => array('label' => 'Plain Rounded', 'img' => FOOGALLERY_DEFAULT_TEMPLATES_EXTENSION_URL . 'assets/border-style-icon-plain-rounded.png'),
					//		'' => array('label' => 'Plain', 'img' => FOOGALLERY_DEFAULT_TEMPLATES_EXTENSION_URL . 'assets/border-style-icon-none.png'),
					//	)
					//),
				)
			);

			return $gallery_templates;
		}
	}
}