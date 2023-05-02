<?php
/**
 * Custom Text Widget
 */


class RealEstate_Text_Widget extends WP_Widget {


/*
     * создание виджета
     */
   function __construct() {
        parent::__construct(
            'custom_text_widget', // ID виджета
            'RealEstate_Text_Widget', // Название виджета
            array( 'description' => 'A custom text widget for adding custom text and HTML.' ) // Описание виджета
        );
    }

    /**
     * Outputs the content of the widget.
     *
     * @param array $args
     * @param array $instance
     */
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
        $text = apply_filters( 'widget_text', empty( $instance['text'] ) ? '' : $instance['text'], $instance );
        echo '<div class="panel panel-default sidebar-menu wow fadeInRight animated" >';
        echo '<div class="panel-heading">';
        if ( ! empty( $title ) ) {
            echo '<h3 class="panel-title">' . $title . '</h3>';
        }
        echo '</div>';
        echo '<div class="panel-body text-widget">';
        echo !empty( $text ) ? wpautop( do_shortcode( $text ) ) : '';
        echo '</div>';
        echo '</div>';
        
    }

    /**
     * Outputs the options form on admin.
     *
     * @param array $instance The widget options
     */
    public function form( $instance ) {
        $instance = wp_parse_args(
            (array) $instance,
            array(
                'title' => '',
                'text' => '',
            )
        );
        $title = sanitize_text_field( $instance['title'] );
        $text = wp_kses_post( $instance['text'] );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Text:' ); ?></label>
            <textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>"><?php echo esc_textarea( $text ); ?></textarea>
        </p>
        <?php
    }

    /**
     * Processing widget options on save.
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     * @return array
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = sanitize_text_field( $new_instance['title'] );
        $instance['text'] = wp_kses_post( $new_instance['text'] );
        return $instance;
    }
}