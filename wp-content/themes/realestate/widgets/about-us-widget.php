<?php
/**
 * Custom Text Widget
 */


class About_Us_Text_Widget extends WP_Widget {


/*
     * создание виджета
     */
   function __construct() {
        parent::__construct(
            'custom_about_us_widget', // ID виджета
            'About_Us_Text_Widget', // Название виджета
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
        $paragraph = apply_filters( 'widget_text', empty( $instance['paragraph'] ) ? '' : $instance['paragraph'], $instance );
        
       
        $paragraph = ! empty( $instance['paragraph'] ) ? $instance['paragraph'] : '';
       // $logo_url = ! empty( $instance['logo_url'] ) ? $instance['logo_url'] : '';
        $address = ! empty( $instance['address'] ) ? $instance['address'] : '';
        $email = ! empty( $instance['email'] ) ? $instance['email'] : '';
        $phone = ! empty( $instance['phone'] ) ? $instance['phone'] : '';
        echo $args['before_widget'];
       
        ?>
        <div class="single-footer">
            <?php  if ( ! empty(  $title ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title',  $title ) . $args['after_title'];
        } ?> 
            <div class="footer-title-line"></div>
            
                <img src="<?php echo  get_template_directory_uri()?>/assets/img/footer-logo.png" alt="" class="wow pulse" data-wow-delay="1s">
            
            <p><?php echo  $paragraph; ?></p>
            <ul class="footer-adress">
                <li><i class="pe-7s-map-marker strong"> </i> <?php echo $address; ?></li>
                <li><i class="pe-7s-mail strong"> </i> <?php echo $email; ?></li>
                <li><i class="pe-7s-call strong"> </i> <?php echo  $phone; ?></li>
            </ul>
        </div>
        <?php
        echo $args['after_widget'];
    }

    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'About Us', 'realestate' );
       
        $paragraph = ! empty( $instance['paragraph'] ) ? $instance['paragraph'] : '';
       // $logo_url = ! empty( $instance['logo_url'] ) ? $instance['logo_url'] : '';
        $address = ! empty( $instance['address'] ) ? $instance['address'] : '';
        $email = ! empty( $instance['email'] ) ? $instance['email'] : '';
        $phone = ! empty( $instance['phone'] ) ? $instance['phone'] : '';
        ?>
       
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
       <p>
            <label for="<?php echo $this->get_field_id( 'paragraph' ); ?>"><?php _e( 'Paragraph:' ); ?></label>
            <textarea class="widefat" rows="4" cols="20" id="<?php echo $this->get_field_id( 'paragraph' ); ?>" name="<?php echo $this->get_field_name( 'paragraph' ); ?>"><?php echo esc_attr( $paragraph ); ?></textarea>
        </p>

        <!-- Address -->
        <p>
            <label for="<?php echo $this->get_field_id( 'address' ); ?>"><?php _e( 'Address:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'address' ); ?>" name="<?php echo $this->get_field_name( 'address' ); ?>" type="text" value="<?php echo esc_attr( $address ); ?>" />
        </p>
         <!-- Email -->
        <p>
            <label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php _e( 'Email:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" type="text" value="<?php echo esc_attr( $email ); ?>" />
        </p>

        <!-- Phone -->
        <p>
            <label for="<?php echo $this->get_field_id( 'phone' ); ?>"><?php _e( 'Phone:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'phone' ); ?>" name="<?php echo $this->get_field_name( 'phone' ); ?>" type="text" value="<?php echo esc_attr( $phone ); ?>" />
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
        $instance = $new_instance;
        $instance['title'] = sanitize_text_field( $new_instance['title'] );
        $instance['paragraph'] = wp_kses_post( $new_instance['paragraph'] );
        $adress = wp_kses_post( $new_instance['adress'] );
        $email = wp_kses_post( $new_instance['email'] );
        $phone= wp_kses_post( $new_instance['phone'] );
        return $instance;
    }
}