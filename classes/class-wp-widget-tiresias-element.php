<?php
/**
 * Holds the "Tiresias Tagging" widget class used to show Tiresias elements in the sidebars.
 * The widget is registered in the main plugin file.
 *
 * @package WooCommerce Tiresias Tagging
 */

/**
 * Widget for showing Tiresias elements in the shops sidebars.
 *
 * @since 1.0.0
 */
class WP_Widget_Tiresias_Element extends WP_Widget
{
	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 * @return WP_Widget_Tiresias_Element
	 */
	public function __construct() {
		$widget_options = array(
			'description' => __( 'Adds Tiresias elements used by the Tiresias Tagging plugin to show product recommendations' ),
		);
		parent::__construct( false, __( 'Tiresias Element' ), $widget_options );
	}

	/**
	 * Outputs the widget.
	 *
	 * @since 1.0.0
	 * @param array $args     Display arguments including before_title, after_title, before_widget, and after_widget
	 * @param array $instance The settings for the particular instance of the widget
	 */
	public function widget( $args, $instance ) {
		if ( isset( $instance['tiresias_id'] ) ) {
			if ( is_array( $args ) ) {
				extract( $args );
			}

			$element_ids = array(
				$instance['tiresias_id'],
			);

			/** @var $before_widget string */
			echo $before_widget;

			WC_Tiresias_Tagging::get_instance()->render( 'tiresias-elements', array(
				'element_ids' => $element_ids,
			) );

			/** @var $after_widget string */
			echo $after_widget;
		}
	}

	/**
	 * Widget options form.
	 *
	 * @since 1.0.0
	 * @param array $instance Current settings
	 * @return string
	 */
	public function form( $instance ) {
		$defaults = array(
			'tiresias_id' => '',
		);
		$instance = wp_parse_args( (array) $instance, $defaults );

		WC_Tiresias_Tagging::get_instance()->render( 'widget-tiresias-element-options', array(
			'tiresias_id'            => $instance['tiresias_id'],
		   	'tiresias_id_field_id'   => $this->get_field_id( 'tiresias_id' ),
		   	'tiresias_id_field_name' => $this->get_field_name( 'tiresias_id' ),
		) );
	}

	/**
	 * Update a particular instance.
	 *
	 * This function should check that $new_instance is set correctly.
	 * The newly calculated value of $instance should be returned.
	 * If "false" is returned, the instance won't be saved/updated.
	 *
	 * @since 1.0.0
	 * @param array $new_instance New settings for this instance as input by the user via form()
	 * @param array $old_instance Old settings for this instance
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		if ( isset( $new_instance['tiresias_id'] ) ) {
			// Must begin with a letter (a-z), and may be followed by any number of letters (a-z),
			// digits (0-9), hyphens ("-"), underscores ("_"), colons (":"), and periods (".").
			if ( ! preg_match( '@^[A-Za-z][A-Za-z0-9-_:.]+$@', $new_instance['tiresias_id'] ) ) {
				return false;
			}

			$instance             = $old_instance;
			$instance['tiresias_id'] = $new_instance['tiresias_id'];
			return $instance;
		}

		return false;
	}
}
