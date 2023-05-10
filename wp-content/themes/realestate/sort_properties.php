<?php

 $orderby = $_POST['orderby'];
  $order = $_POST['order'];
  $args = array(
    'post_type' => 'property',
     'post_status' => 'publish',
     's' => '',//get_search_query(),
    'orderby' => $orderby,
    'order' => $order,
  );

  // Add category parameter to query
			
			if( ! empty( $_GET['category_name'] ) ) {
			    $args['tax_query'] =array(
					array(
					'taxonomy' => 'cities' ,
					'field' => 'slug',
					'terms' => sanitize_text_field( $_GET['category_name'] ) ,
					
					),
					) ;
			}

  $query = new WP_Query($args);
  if ($query->have_posts()) {
   
    while ($query->have_posts()) {
      $query->the_post();
                                    $price= get_post_meta(get_the_ID(), 'price', true);
                                    $area= get_post_meta(get_the_ID(), 'area', true);
                                    $rooms= get_post_meta(get_the_ID(), 'rooms', true);
                                    $bathrooms= get_post_meta(get_the_ID(), 'bathrooms', true);
                                    $cars= get_post_meta(get_the_ID(), 'cars', true);

                         $output = '<div class="col-sm-6 col-md-4 p0"><div class="box-two proerty-item">';
                                       $output .=  '<div class="item-thumb"> <a href="'. esc_url(get_post_permalink()) .'" ><img src="'. esc_url(get_the_post_thumbnail_url()) .'"></a>';
                                         $output .= '</div><div class="item-entry overflow">';
                                             $output .= '<h5><a href="'. esc_url(get_post_permalink()). '"> '. the_title() . ' </a></h5>';
                                            $output .='<div class="dot-hr"></div>';
                                             $output .= '<span class="pull-left"><b> Area :</b>'. $area. 'm </span>';
                                             $output .= '<span class="proerty-price pull-right"> $'. $price. '</span>';
                                             $output .= '<p style="display: none;">' . the_content() . '</p>';
                                             $output .= '<div class="property-icon">' ;
                                                 $output .= '<img src="' . get_template_directory_uri(). '/assets/img/icon/bed.png">('. $rooms .'>)';
                                                  $output .= '<img src="' .get_template_directory_uri() . '/assets/img/icon/shawer.png">('. $bathrooms . ')';
                                                 $output .= '<img src="'. get_template_directory_uri() . '/assets/img/icon/cars.png">(' . $cars . ')';  
                                             $output .= '</div>';
                                         $output .= '</div>';
                                     $output .= '</div>';
                                 $output .= '</div> ' ;
    }
    
  } else {
    $output = 'No properties found';
  }
  wp_reset_postdata();
  echo $output;
  wp_die();