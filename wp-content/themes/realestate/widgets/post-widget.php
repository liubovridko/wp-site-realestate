
<?php
/**
 * Custom Recommended Post Widget
 */

class Realestate_Recommended_Posts extends WP_Widget {

    function __construct() {
        parent::__construct(
            'custom_recent_posts_widget', // ID виджета
            'Custom Recommended Posts Widget', // Название виджета
            array( 'description' => 'A custom widget for displaying recent custom post types.' ) // Описание виджета
        );
    }

    // Фронтенд виджета
    public function widget( $args, $instance ) {
        // Заголовок виджета
        $title = apply_filters( 'widget_title', $instance['title'] );

        // Тип записи
        $post_type = $instance['post_type'];

        // Количество постов
        $posts_num = isset( $instance['posts_num'] ) ? absint( $instance['posts_num'] ) : 3;

        // Запрос на получение последних постов
        $args = array(
            'post_type' => $post_type,
            'posts_per_page' => $posts_num,
            'orderby' => 'date',
            'order' => 'DESC',
        );
        $recent_posts = new WP_Query( $args );

        // Вывод постов
        echo $args['before_widget'];
         echo '<div class="panel-heading">';
        if ( ! empty( $title ) ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }
        echo '</div>';

        if ( $recent_posts->have_posts() ) {
            echo '<div class="panel-body recent-property-widget"><ul>';

            while ( $recent_posts->have_posts() ) {
                $recent_posts->the_post();

                // Получение полей поста
                $post_id = get_the_ID();
                $post_title = get_the_title();
                $post_permalink = get_permalink();
                $post_thumbnail = get_the_post_thumbnail( $post_id, 'thumbnail' );
                $post_price = get_post_meta( $post_id, '_price', true );

                // Вывод поста
               echo '<li>';
                echo '<div class="col-md-3 col-sm-3 col-xs-3 blg-thumb p0"><a href="' .  $post_permalink .'" ><img src="' . esc_url( $post_thumbnail ) . '" /></a></div>';
                echo '<span class="property-seeker"><b class="b-1">A</b><b class="b-2">S</b></span></div>';
                echo '<div class="col-md-8 col-sm-8 col-xs-8 blg-entry">';
                echo '<h6> <a href="'.  $post_permalink .'"><?php echo $title; ?> </a></h6>';
                 echo  '<span class="property-price">'. $post_price.'$</span></div>';
               
                echo '</li>';
            }

            echo '</ul>';
             echo '</div>';
        }

        // Сброс запроса
        wp_reset_postdata();

        echo $args['after_widget'];
    }

    // Бэкэнд виджета
    public function form( $instance ) {
        // Название виджета
        $title = ! empty( $instance['title'] ) ? $instance['title'] : '';

        // Тип записи
        $post_type = ! empty( $instance['post_type'] ) ? $instance['post_type'] : 'post';

        // Количество постов
       $posts_num = ! empty( $instance['posts_num'] ) ? $instance['posts_num'] : 3;
?>
         <p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</p>

        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'type' ) ); ?>"><?php _e( 'Select post type:' ); ?></label>
        <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'type' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'type' ) ); ?>" type="text">
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
        <label for="<?php echo esc_attr( $this->get_field_id( 'posts_num' ) ); ?>"><?php _e( 'Number of posts to show:' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'posts_num' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'posts_num' ) ); ?>" type="number" min="1" step="1" value="<?php echo esc_attr( $posts_num ); ?>">
    </p>
    <?php
}



public function update( $new_instance, $old_instance ) {
   $instance = $old_instance;
	$instance['title'] = sanitize_text_field( $new_instance['title'] );
    $instance['post_type'] = ( ! empty( $new_instance['post_type'] ) ) ? sanitize_text_field( $new_instance['post_type'] ) : '';
    $instance['posts_num'] = ( ! empty( $new_instance['posts_num'] ) ) ? absint( $new_instance['posts_num'] ) : 3;

    return $instance;
}
}