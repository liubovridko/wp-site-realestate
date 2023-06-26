<?php
/**
 * Custom Image Ads Widget
 */
class ImageWidget extends WP_Widget {
    
    public function __construct() {
        parent::__construct(
            'image_widget',
            'Image Widget',
            array( 'description' => 'Widget with image' )
        );
    }
    
    public function widget( $args, $instance ) {
        $default_title = __( 'Ads her' );
        $title = ! empty( $instance['title'] ) ? $instance['title'] : $default_title;
        $image_url = ! empty( $instance['image_url'] ) ? $instance['image_url'] : '/assets/img/ads.jpg';
        
        echo $args['before_widget'];
        
        if ( $title ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }
        
        if ( $image_url ) {
            echo '<div class="panel-body recent-property-widget">';
            echo '<img src="'. get_template_directory_uri() . esc_attr( $image_url ) . '">';
            echo '</div>';
        }
        
        echo $args['after_widget'];
    }
    
    public function form( $instance ) {
        $title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $image_url = isset( $instance['image_url'] ) ? esc_attr( $instance['image_url'] ) : '';
        
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'image_url' ); ?>">Image URL:</label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'image_url' ); ?>" name="<?php echo $this->get_field_name( 'image_url' ); ?>" type="text" value="<?php echo $image_url; ?>">
        </p>
        <?php
    }
    
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ! empty( $new_instance['title'] ) ? sanitize_text_field( $new_instance['title'] ) : '';
        $instance['image_url'] = ! empty( $new_instance['image_url'] ) ? esc_url( $new_instance['image_url'] ) : '';
        return $instance;
    }
    
}

