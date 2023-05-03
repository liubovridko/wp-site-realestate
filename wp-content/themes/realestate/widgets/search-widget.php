<?php
/**
 * Custom Search Widget
 */


class RealEstate_Search_Widget extends WP_Widget {


/*
     * создание виджета
     */
   function __construct() {
        parent::__construct(
            'custom_search_widget', // ID виджета
            'RealEstate_Search_Widget', // Название виджета
            array( 'description' => 'A custom search widget for adding custom text and HTML.' ) // Описание виджета
        );
    }
//frontend

public function widget( $args, $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		echo $args['before_widget'];
		echo '<div class="panel-heading">';
		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
        echo '</div>';
        echo '<div class="panel-body">';
		// Use active theme search form if it exists.
		get_search_form();
		echo '</div>';

		echo $args['after_widget'];
	}

//backend

	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
		$title    = $instance['title'];
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php
	}

//option
	
	public function update( $new_instance, $old_instance ) {
		$instance          = $old_instance;
		$new_instance      = wp_parse_args( (array) $new_instance, array( 'title' => '' ) );
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		return $instance;
	}

}
