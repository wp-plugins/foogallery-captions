<?php
/**
 * FooGallery FooGallery Foundation gallery template
 * This is the template that is run when a FooGallery shortcode is rendered to the frontend
 */
//the current FooGallery that is currently being rendered to the frontend
global $current_foogallery;
//the current shortcode args
global $current_foogallery_arguments;
//get our thumbnail sizing args
$args = foogallery_gallery_template_setting( 'thumbnail_size', 'thumbnail' );
//add the link setting to the args
$args['link'] = foogallery_gallery_template_setting( 'thumbnail_link', 'image' );
//get which lightbox we want to use
$lightbox = foogallery_gallery_template_setting( 'lightbox', 'unknown' );
//get foundation options
$foundation_large = foogallery_gallery_template_setting( 'per_row', '4' );
$foundation_medium = foogallery_gallery_template_setting( 'per_row_medium', $foundation_large );
$foundation_small = foogallery_gallery_template_setting( 'per_row_small', $foundation_medium );
$foundation_text = foogallery_gallery_template_setting( 'gallery_description', '' );
?>

<?php if($foundation_text) : ?>
<p>
	<?php echo apply_filters('the_content', $foundation_text) ?>
</p>
<?php endif ?>

<ul id="foogallery-gallery-<?php echo $current_foogallery->ID; ?>" class="foogallery-container foogallery-foogallery-foundation foogallery-lightbox-<?php echo esc_attr($lightbox); ?> small-block-grid-<?php echo esc_attr($foundation_small); ?> medium-block-grid-<?php echo esc_attr($foundation_medium); ?> large-block-grid-<?php echo esc_attr($foundation_large); ?>">
	<?php foreach ( $current_foogallery->attachments() as $attachment ) {
		echo '<li>' . $attachment->html( $args ) . '</li>';
	} ?>
</ul>