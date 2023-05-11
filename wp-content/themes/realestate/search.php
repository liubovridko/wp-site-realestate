<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package RealEstate
 */

get_header();

$orderby = isset($_POST['orderby']) ? $_POST['orderby'] : 'date' ;
  $order = isset($_POST['order']) ? $_POST['order'] : 'DESC' ;

			 $args = array(
			    'post_type' => 'property',
			    'post_status' => 'publish',
			    's' => get_search_query(),
			     'orderby' => $orderby,
                 'order' => $order,
                 'posts_per_page' => -1 ,
                
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


			// получение значения из поля цены
				$price_range = $_GET['price_range'];

				// разделение значения на массив
				$prices = explode(",", $price_range);
				// первое значение - минимальная цена
				$min_price = $prices[0];
				// второе значение - максимальная цена
				$max_price = $prices[1];

				// получение значения из поля 
				$area_range = $_GET['area_range'];
				// разделение значения на массив
				$area = explode(",", $area_range);
				// первое значение - минимальная 
				$min_area = $area[0];
				// второе значение - максимальная 
				$max_area = $area[1];

				// получение значения из поля 
				$baths_range = $_GET['baths_range'];
				// разделение значения на массив
				$baths= explode(",", $baths_range);
				// первое значение - минимальная 
				$min_baths = $baths[0];
				// второе значение - максимальная 
				$max_baths = $baths[1];


				// получение значения из поля 
				$rooms_range = $_GET['rooms_range'];
				// разделение значения на массив
				$rooms= explode(",", $rooms_range);
				// первое значение - минимальная 
				$min_room = $rooms[0];
				// второе значение - максимальная 
				$max_room = $rooms[1];

			// Add meta_query parameter to query
			if( ! empty( $_GET['price_range'] ) &&  ! empty( $_GET['area_range'] ) && ! empty( $_GET['baths_range'] )  && ! empty( $_GET['rooms_range'] ) ) {
			    $meta_query = array(
			        'relation' => 'AND',
			        array(
			            'key' => 'price',// кастомное поле с ценой
			            'value' => array($min_price, $max_price), // массив с минимальной и максимальной ценами
			            'type' => 'NUMERIC',
			            'compare' => 'BETWEEN',
			        ),
			        array(
			            'key' => 'area',
			            'value' => array($min_area, $max_area),
			            'type' => 'NUMERIC',
			            'compare' => 'BETWEEN',
			        ),
			         array(
			            'key' => 'bathrooms',
			            'value' => array($min_baths, $max_baths),
			            'type' => 'NUMERIC',
			            'compare' => 'BETWEEN',
			        ),
			         array(
			            'key' => 'rooms',
			            'value' => array($min_room, $max_room),
			            'type' => 'NUMERIC',
			            'compare' => 'BETWEEN',
			        ),
			    );
			    $args['meta_query'] = $meta_query;
			}

			$query = new WP_Query( $args );

			if ( $query->have_posts() ) {
				?>
				<div class="page-head"> 
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <h1 class="page-title">
                        	<?php
								printf(
									/* translators: %s: Search term. */
									esc_html__( 'Results for "%s"', 'realEstate' ),
									'<span class="page-description search-term">' . esc_html( get_search_query() ) . '</span>'
								);
								?>
                        </h1>               
                    </div>
                </div>
            </div>
        </div>
				
             <!-- property area -->
        <div class="properties-area recent-property" style="background-color: #FFF;">
            <div class="container">  
                <div class="row">
                     
                <div class="col-md-3 p0 padding-top-40">
                    <div class="blog-asside-right pr0">
                    	<?php dynamic_sidebar( 'sidebar-left' ); ?>
                    </div>
                    
                </div>


                <div class="col-md-9  pr0 padding-top-40 properties-page">
                    <div class="col-md-12 clear"> 
                        <div class="col-xs-10 page-subheader sorting pl0">
                            <ul class="sort-by-list">
                                <li class="active">
                                    <a href="javascript:void(0);" class="order_by_date" data-orderby="date" data-order="ASC">
                                        Property Date <i class="fa fa-sort-amount-asc"></i>					
                                    </a>
                                </li>
                                <li class="">
                                    <a href="javascript:void(0);" class="order_by_price" data-orderby="meta_value_num" data-order="DESC">
                                        Property Price <i class="fa fa-sort-numeric-desc"></i>						
                                    </a>
                                </li>
                            </ul><!--/ .sort-by-list-->

                            <div class="items-per-page">
                                <label for="items_per_page"><b>Property per page :</b></label>
                                <div class="sel">
                                    <select id="items_per_page" name="per_page">
                                        <option value="3">3</option>
                                        <option value="6">6</option>
                                        <option value="9">9</option>
                                        <option selected="selected" value="12">12</option>
                                        <option value="15">15</option>
                                        <option value="30">30</option>
                                        <option value="45">45</option>
                                        <option value="60">60</option>
                                    </select>
                                </div><!--/ .sel-->
                            </div><!--/ .items-per-page-->
                        </div>

                        <div class="col-xs-2 layout-switcher">
                            <a class="layout-list" href="javascript:void(0);"> <i class="fa fa-th-list"></i>  </a>
                            <a class="layout-grid active" href="javascript:void(0);"> <i class="fa fa-th"></i> </a>                          
                        </div><!--/ .layout-switcher-->
                    </div>

                    <div class="col-md-12 clear"> 
                        <div id="list-type" class="proerty-th">
				<?php
			/* Start the Loop */
			while ( $query->have_posts() ) {
				$query->the_post();
			
        // Display post content



				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				//get_template_part( 'template-parts/content', 'search' );
				                    $price= get_post_meta(get_the_ID(), 'price', true);
                                    $area= get_post_meta(get_the_ID(), 'area', true);
                                    $rooms= get_post_meta(get_the_ID(), 'rooms', true);
                                    $bathrooms= get_post_meta(get_the_ID(), 'bathrooms', true);
                                    $cars= get_post_meta(get_the_ID(), 'cars', true);
                                    ?>

                            <div class="col-sm-6 col-md-4 p0">

                                    <div class="box-two proerty-item">
                                        <div class="item-thumb">
                                            <a href="<?php echo esc_url(get_post_permalink()) ?>" ><img src="<?php echo esc_url(get_the_post_thumbnail_url()) ?>"></a>
                                        </div>

                                        <div class="item-entry overflow">
                                            <h5><a href="<?php echo esc_url(get_post_permalink()) ?>"> <?php the_title(); ?> </a></h5>
                                            <div class="dot-hr"></div>
                                            <span class="pull-left"><b> Area :</b> <?php echo $area; ?>m </span>
                                            <span class="proerty-price pull-right"> $ <?php echo $price; ?></span>
                                            <p style="display: none;"><?php the_content(); ?></p>
                                            <div class="property-icon">
                                                <img src="<?php echo get_template_directory_uri()?>/assets/img/icon/bed.png">(<?php echo $rooms; ?>)
                                                 <img src="<?php echo get_template_directory_uri()?>/assets/img/icon/shawer.png">(<?php echo $bathrooms; ?>)
                                                <img src="<?php echo get_template_directory_uri()?>/assets/img/icon/cars.png">(<?php echo $cars; ?>)  
                                            </div>
                                        </div>


                                    </div>
                                </div> 
                <?php 

			}


		    } else {
              //<!-- если нет постов -->
			get_template_part( 'template-parts/content', 'none' );

			}

            wp_reset_postdata();
			//the_posts_navigation();

			?>
                              
                    
                    <div class="col-md-12"> 
                        <div class="pull-right">
                            <div class="pagination">
                                <ul>
                                    <li><a href="#">Prev</a></li>
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">Next</a></li>
                                </ul>
                            </div>
                        </div>                
                    </div>
                  </div>  
      


                </div>              
            </div>
        </div>
		
  </div>


<?php

get_footer();
