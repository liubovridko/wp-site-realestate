<?php
/**
 * Custom Recommended Post Widget
 */


class Realestate_Recommended_Posts extends WP_Widget {

	/**
	 * Sets up a new Recent Posts widget instance.
	 *
	 * @since 2.8.0
	 */
	public function __construct() {
		$widget_ops = array(
			'classname'                   => 'widget_recommend_entries',
			'description'                 => __( 'Your site&#8217;s Recommended Posts.' ),
			'customize_selective_refresh' => true,
			'show_instance_in_rest'       => true,
		);
		parent::__construct( 'recommended-posts', __( 'Recommended Posts ReaLEstate' ), $widget_ops );
		$this->alt_option_name = 'widget_recommend_entries';
	}

	/**
	 * Outputs the content for the current Recent Posts widget instance.
	 *
	 * @since 2.8.0
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Recent Posts widget instance.

	 */
	

	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$default_title = __( 'Recommended Posts' );
		$title         = ( ! empty( $instance['title'] ) ) ? $instance['title'] : $default_title;

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 3;
		if ( ! $number ) {
			$number = 3;
		}
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
		 // Тип записи
        $post_type = $instance['post_type'];


		$r = new WP_Query(
			/**
			 * Filters the arguments for the Recent Posts widget.
			 *
			 * @since 3.4.0
			 * @since 4.9.0 Added the `$instance` parameter.
			 *
			 * @see WP_Query::get_posts()
			 *
			 * @param array $args     An array of arguments used to retrieve the recent posts.
			 * @param array $instance Array of settings for the current widget.
			 */
			apply_filters(
				'widget_posts_args',
				array(
					'post_type'           => $post_type,
					'posts_per_page'      => $number,
					'no_found_rows'       => true,
					'post_status'         => 'publish',
					'ignore_sticky_posts' => true,
				),
				$instance
			)
		);

		if ( ! $r->have_posts() ) {
			return;
		}
		?>
		<?php
		if (is_singular('property')) { // Проверяем, является ли текущая страница типом 'property'
        $args['before_widget'] = str_replace('widget_recommend_entries panel panel-default sidebar-menu wow fadeInRight animated', 'widget_recommend_entries panel panel-default sidebar-menu similar-property-wdg wow fadeInRight animated', $args['before_widget']);
        echo $args['before_widget'];
        } else {
        echo $args['before_widget'];	
        }
		 ?>

		<?php
		echo '<div class="panel-heading">';
		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
        echo '</div>';
		
		?>
         <div class="panel-body recent-property-widget">
		<ul>
			<?php foreach ( $r->posts as $recent_post ) : ?>
				<?php
				$post_title   = get_the_title( $recent_post->ID );
				$title        = ( ! empty( $post_title ) ) ? $post_title : __( '(no title)' );
				$aria_current = '';
				$post_thumbnail = get_the_post_thumbnail( $recent_post->ID, 'thumbnail' );
                $post_price = get_post_meta( $recent_post->ID, 'price', true );


				if ( get_queried_object_id() === $recent_post->ID ) {
					$aria_current = ' aria-current="page"';
				}
				?>
				<li>
					<div class="col-md-3 col-sm-3 col-xs-3 blg-thumb p0">
						<a href="<?php the_permalink( $recent_post->ID ); ?>" <?php echo $aria_current; ?> > <?php echo $post_thumbnail; ?> </a>
                            <span class="property-seeker">
                                 <b class="b-1">A</b>
                                  <b class="b-2">S</b>
                             </span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8 blg-entry">
                           <h6> <a href="<?php the_permalink( $recent_post->ID ); ?>"><?php echo $title; ?> </a></h6>
                             <span class="property-price"><?php echo $post_price; ?>$</span>
                      </div>
					
					
				</li>
			<?php endforeach; ?>
		</ul>
	</div>

		<?php
		

		echo $args['after_widget'];
	}

	/**
	 * Handles updating the settings for the current Recent Posts widget instance.
	 *
	 * @since 2.8.0
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance              = $old_instance;
		$instance['title']     = sanitize_text_field( $new_instance['title'] );
		 // Тип записи
        $instance['post_type'] = ( ! empty( $new_instance['post_type'] ) ) ? sanitize_text_field( $new_instance['post_type'] ) : '';
		$instance['number']    = (int) $new_instance['number'];
		$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
		return $instance;
	}

	/**
	 * Outputs the settings form for the Recent Posts widget.
	 *
	 * @since 2.8.0
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		 // Тип записи
        $instance['post_type'] = ( ! empty( $new_instance['post_type'] ) ) ? sanitize_text_field( $new_instance['post_type'] ) : 'post';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 3;
		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</p>


        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'post_type' ) ); ?>"><?php _e( 'Select post type:' ); ?></label>
        <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'post_type' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_type' ) ); ?>" type="text">
            <?php
            $post_types = get_post_types( array( 'public' => true ), 'names' );
            foreach ( $post_types as $post_type ) {
                ?>
                <option value="<?php echo esc_attr( $post_type ); ?>" <?php selected( $type, $post_type ); ?>><?php echo esc_html( $post_type ); ?></option>
                <?php
            }
            ?>
        </select>
      </p>

		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:' ); ?></label>
			<input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1" min="1" value="<?php echo $number; ?>" size="3" />
		</p>

		<p>
			<input class="checkbox" type="checkbox"<?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display post date?' ); ?></label>
		</p>
		<?php
	}
}
