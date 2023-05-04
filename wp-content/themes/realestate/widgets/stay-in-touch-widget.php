<?php
/**
 * Custom Stay In Touch Widget
 */


class Realestate_Stay_In_Touch extends WP_Widget {


	function __construct() {
        parent::__construct(
            'stay_in_touch_footer_widget',
            __( 'Stay in Footer Widget', 'realastate' ),
            array(
                'description' => __( 'Displays custom footer block.', 'realastate' ),
            )
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
        
       
        $shortcode1 = ! empty( $instance['shortcode1'] ) ? $instance['shortcode1'] : '';
       
        
        echo $args['before_widget'];
       
        ?>
        <div class="single-footer news-letter">
            <?php  if ( ! empty(  $title ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title',  $title ) . $args['after_title'];
        } ?> 
            <div class="footer-title-line"></div>
            
            
            <p><?php echo  $paragraph; ?></p>
                             
               <?php echo do_shortcode( $shortcode1 ); ?>
                  
                          <div class="social pull-right"> 
                            <ul>                                    

                                <?php if (!empty($instance['twitter'])) : ?>
                                    <li><a class="wow fadeInUp animated" href="<?php echo esc_attr($instance['twitter']); ?>"><i class="fa fa-twitter"></i></a></li>
                                <?php endif; ?>
                                <?php if (!empty($instance['facebook'])) : ?>
                                    <li><a class="wow fadeInUp animated" href="<?php echo esc_attr($instance['facebook']); ?>"  data-wow-delay="0.2s"><i class="fa fa-facebook"></i></a></li>
                                <?php endif; ?>
                                
                                <?php if (!empty($instance['google'])) : ?>
                                    <li><a class="wow fadeInUp animated" href="<?php echo esc_attr($instance['google']); ?>"  data-wow-delay="0.3s"><i class="fa fa-google-plus"></i></a></li>
                                <?php endif; ?>

                                <?php if (!empty($instance['instagram'])) : ?>
                                    <li><a class="wow fadeInUp animated" href="<?php echo esc_attr($instance['instagram']); ?>"  data-wow-delay="0.4"><i class="fa fa-instagram"></i></a></li>
                                <?php endif; ?>

                                <?php if (!empty($instance['linkedin'])) : ?>
                                    <li><a class="wow fadeInUp animated" href="<?php echo esc_attr($instance['linkedin']); ?>"  data-wow-delay="0.6s"><i class="fa fa-linkedin"></i></a></li>
                                <?php endif; ?>
                            
                            </ul> 
                        </div>
                    </div>
        <?php
        echo $args['after_widget'];
    }

    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Stay in Touch', 'realestate' );
        $paragraph = ! empty( $instance['paragraph'] ) ? $instance['paragraph'] : '';
        $shortcode1 = ! empty( $instance['shortcode1'] ) ? $instance['shortcode1'] : '';
        $facebook = ! empty( $instance['facebook'] ) ? $instance['facebook'] : '';
        $google = ! empty( $instance['google'] ) ? $instance['google'] : '';
        $twitter = ! empty( $instance['twitter'] ) ? $instance['twitter'] : '';
        $instagram = ! empty( $instance['instagram'] ) ? $instance['instagram'] : '';
        $linkedin = ! empty( $instance['linkedin'] ) ? $instance['linkedin'] : '';
       
        ?>
       
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
       <p>
            <label for="<?php echo $this->get_field_id( 'paragraph' ); ?>"><?php _e( 'Paragraph:' ); ?></label>
            <textarea class="widefat" rows="4" cols="20" id="<?php echo $this->get_field_id( 'paragraph' ); ?>" name="<?php echo $this->get_field_name( 'paragraph' ); ?>"><?php echo esc_attr( $paragraph ); ?></textarea>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'shortcode1' ); ?>">Shortcode for subscribe:</label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'shortcode1' ); ?>" name="<?php echo $this->get_field_name( 'shortcode1' ); ?>" type="text" value="<?php echo esc_attr( $shortcode1 ); ?>">
        </p>
         <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>"><?php esc_attr_e( 'Facebook URL:', 'realestate' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook' ) ); ?>" type="text" value="<?php echo esc_attr( $facebook ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>"><?php esc_attr_e( 'Twitter URL:', 'realestate' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitter' ) ); ?>" type="text" value="<?php echo esc_attr( $twitter ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'google' ) ); ?>"><?php esc_attr_e( 'Google plus URL:', 'realestate' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'google' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'google' ) ); ?>" type="text" value="<?php echo esc_attr( $google ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>"><?php esc_attr_e( 'Instagram URL:', 'realestate' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'instagram' ) ); ?>" type="text" value="<?php echo esc_attr( $instagram ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>"><?php esc_attr_e( 'LinkedIn URL:', 'realestate' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'linkedin' ) ); ?>" type="text" value="<?php echo esc_attr( $linkedin ); ?>">
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
        $instance['shortcode1'] = ! empty( $new_instance['shortcode1'] ) ? strip_tags( $new_instance['shortcode1'] ) : '';
        $instance['facebook'] = ( ! empty( $new_instance['facebook'] ) ) ? sanitize_text_field( $new_instance['facebook'] ) : '';
        $instance['twitter'] = ( ! empty( $new_instance['twitter'] ) ) ? sanitize_text_field( $new_instance['twitter'] ) : '';
        $instance['instagram'] = ( ! empty( $new_instance['instagram'] ) ) ? sanitize_text_field( $new_instance['instagram'] ) : '';
        $instance['linkedin'] = ( ! empty( $new_instance['linkedin'] ) ) ? sanitize_text_field( $new_instance['linkedin'] ) : '';
        $instance['google'] = ( ! empty( $new_instance['google'] ) ) ? sanitize_text_field( $new_instance['google'] ) : '';
        return $instance;
    }
}