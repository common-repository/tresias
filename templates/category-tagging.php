<?php
/**
 * Holds the html template for the category tagging.
 *
 * Used in the main plugin file.
 *
 * @package WooCommerce Tiresias Tagging
 * @since   1.0.0
 * @var string $category_path The category path
 */
?>

<?php if ( isset( $category_path ) && is_string( $category_path ) ): ?>
	<div class="tiresias_category" style="display:none"><?php echo esc_html( $category_path ); ?></div>
<?php endif; ?>
