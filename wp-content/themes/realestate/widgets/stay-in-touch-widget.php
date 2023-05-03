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
        $shortcode2 = ! empty( $instance['shortcode2'] ) ? $instance['shortcode2'] : '';
        
        echo $args['before_widget'];
       
        ?>
        <div class="single-footer">
            <?php  if ( ! empty(  $title ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title',  $title ) . $args['after_title'];
        } ?> 
            <div class="footer-title-line"></div>
            
            
            <p><?php echo  $paragraph; ?></p>
                              <form>
                                    <div class="input-group">
                                        <input class="form-control" type="text" placeholder="E-mail ... ">
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary subscribe" type="button"><i class="pe-7s-paper-plane pe-2x"></i></button>
                                        </span>
                                    </div> 
                                    
                               </form> 

                          <div class="social pull-right"> 
                                    <ul>
                                        <li><a class="wow fadeInUp animated" href="https://twitter.com/kimarotec"><i class="fa fa-twitter"></i></a></li>
                                        <li><a class="wow fadeInUp animated" href="https://www.facebook.com/kimarotec" data-wow-delay="0.2s"><i class="fa fa-facebook"></i></a></li>
                                        <li><a class="wow fadeInUp animated" href="https://plus.google.com/kimarotec" data-wow-delay="0.3s"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a class="wow fadeInUp animated" href="https://instagram.com/kimarotec" data-wow-delay="0.4s"><i class="fa fa-instagram"></i></a></li>
                                        <li><a class="wow fadeInUp animated" href="https://instagram.com/kimarotec" data-wow-delay="0.6s"><i class="fa fa-dribbble"></i></a></li>
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
        $shortcode2 = ! empty( $instance['shortcode2'] ) ? $instance['shortcode2'] : '';
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
            <label for="<?php echo $this->get_field_id( 'shortcode2' ); ?>">Shortcode for icons:</label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'shortcode2' ); ?>" name="<?php echo $this->get_field_name( 'shortcode2' ); ?>" type="text" value="<?php echo esc_attr( $shortcode2 ); ?>">
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
        $instance['shortcode2'] = ! empty( $new_instance['shortcode2'] ) ? strip_tags( $new_instance['shortcode2'] ) : '';
        return $instance;
    }
}