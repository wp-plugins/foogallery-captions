<?php
//This init class is used to add the extension to the extensions list while you are developing them.
//When the extension is added to the supported list of extensions, this file is no longer needed.

if ( !class_exists( 'FooGallery_Foundation_Template_FooGallery_Extension_Init' ) ) {
	class FooGallery_Foundation_Template_FooGallery_Extension_Init {

		function __construct() {
			add_filter( 'foogallery_available_extensions', array( $this, 'add_to_extensions_list' ) );
		}

		function add_to_extensions_list( $extensions ) {
			$extensions[] = array(
				'slug'=> 'foogallery-foundation',
				'class'=> 'FooGallery_Foundation_Template_FooGallery_Extension',
				'title'=> __('FooGallery Foundation', 'foogallery-foogallery-foundation'),
				'file'=> 'foogallery-foogallery-foundation-extension.php',
				'description'=> __('A template based on the Foundation Grid', 'foogallery-foogallery-foundation'),
				'author'=> 'Tor Morten Jensen ',
				'author_url'=> 'http://anunatak.no',
				'thumbnail'=> FOOGALLERY_FOUNDATION_TEMPLATE_FOOGALLERY_EXTENSION_URL . '/assets/extension_bg.png',
				'tags'=> array( __('template', 'foogallery') ),	//use foogallery translations
				'categories'=> array( __('Build Your Own', 'foogallery') ), //use foogallery translations
				'source'=> 'generated'
			);

			return $extensions;
		}
	}

	new FooGallery_Foundation_Template_FooGallery_Extension_Init();
}