<?php
/**
 * Plugin Name: RealEstate Recommended Posts
 * Description: RealEstate Recommended Posts for WordPress.
 * Version: 1.0
 * Author: Liubov Ridkokasha
 
 */



function realestate_recent_posts_shortcode() {
        ob_start();
        recent_posts_shortcode(); 
        return ob_get_clean();
    }

add_shortcode( 'recent_posts', 'realestate_recent_posts_shortcode' ); 

function recent_posts_shortcode( $atts ) {
    $atts = shortcode_atts( array(
    	
        'category'            => '',
        'number'              => -1,
        'order'               => 'DESC',
        'orderby'             => 'date',
        'tag'                 => '',
        'exclude_posts'       => '',
        'ignore_sticky_posts' => true,
    ), $atts );

    $args = array(
        'post_type'           => 'properties',
        'post_status'         => 'publish',
        'category_name'       => $atts['category'],
        'showposts'           => $atts['number'],
        'order'               => strtoupper( $atts['order'] ),
        'orderby'             => $atts['orderby'],
        'tag'                 => explode( ',', $atts['tag'] ),
        'post__not_in'        => explode( ',', $atts['exclude_posts'] ),
        'ignore_sticky_posts' => $atts['ignore_sticky_posts'],
    );

    $query = new WP_Query( $args );
    $return_string='<div class="panel panel-default sidebar-menu wow fadeInRight animated">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Recommended</h3>
                                </div>
                                <div class="panel-body recent-property-widget">';

    if ( $query->have_posts() ) {
        $return_string .= '<ul>';
        while ( $query->have_posts() ) {
            $query->the_post();
            $return_string .= '<li>';
            $return_string .= '<div class="col-md-3 col-sm-3 col-xs-3 blg-thumb p0"><a href="' . get_permalink() . '"><img src="'.esc_url(get_the_post_thumbnail_url()).'"></a></div>';
            $return_string. = '<span class="property-seeker">
                                                    <b class="b-1">A</b>
                                                    <b class="b-2">S</b>
                                                </span></div>';
            $return_string .= '<div class="col-md-8 col-sm-8 col-xs-8 blg-entry"><h6> <a href="' . get_permalink() . '">' . get_the_title() . '</a></h6>';
            $return_string .= '<span class="property-price">'. get_post_meta(get_the_ID(),'price', true) .'$</span></div>';
           
            $return_string .= '</li>';
        }
        $return_string .= '</ul>';
    } else {
        $return_string = 'Нет записей';
    }

    wp_reset_postdata();
    $return_string. ='</div>';

    return $return_string;
}




//[recent_posts number="5"]



 