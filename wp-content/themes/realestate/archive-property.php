<?php
   get_header();
?>

 <div class="page-head"> 
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <h1 class="page-title">List Layout With Sidebar</h1>               
                    </div>
                </div>
            </div>
        </div>
        <!-- End page header -->

        <!-- property area -->
        <div class="properties-area recent-property" style="background-color: #FFF;">
            <div class="container">  
                <div class="row">
                     
                <div class="col-md-3 p0 padding-top-40">
                    <div class="blog-asside-right pr0">

                     
                        <?php dynamic_sidebar( 'sidebar-left' ); ?>

                      
                    </div>
                </div>
                 <!-- вывод всех постов -->
                <?php 
                /* $args = array(
                     'post_type' => 'property',
                     'post_status' => 'publish',
                     'posts_per_page' => 6
                  );
                 $query = new WP_Query($args);*/

                if ( have_posts() ) : 
                    ?>

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
                                        <option selected="selected" value="6">6</option>
                                        <option value="9">9</option>
                                        <option  value="12">12</option>
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
                        	
                                <!-- out all posts -->
								<?php
								/* Start the Loop */

								/*while ( $query->have_posts() ) : //if post>=lenght {} если есть посты
=======
									$query->the_post();
                                    $price= get_post_meta(get_the_ID(), 'price', true);
                                    $area= get_post_meta(get_the_ID(), 'area', true);
                                    $rooms= get_post_meta(get_the_ID(), 'rooms', true);
                                    $bathrooms= get_post_meta(get_the_ID(), 'bathrooms', true);
                                    $cars= get_post_meta(get_the_ID(), 'cars', true);*/
=======
                                    

								

								?>

                           <!--  <div class="col-sm-6 col-md-4 p0">

                                    <div class="box-two proerty-item">
                                        <div class="item-thumb">
                                            <a href="<?php echo esc_url(get_post_permalink()) ?>" ><img src="<?php echo esc_url(get_the_post_thumbnail_url()) ?>"></a>
                                        </div>

                                        <div class="item-entry overflow">
                                            <h5><a href="<?php echo esc_url(get_post_permalink()) ?>"> <?php the_title(); ?> </a></h5>
                                            <div class="dot-hr"></div>
                                            <span class="pull-left"><b> Area :</b> 120m </span>
                                            <span class="proerty-price pull-right"> $ 300,000</span>
                                            <p style="display: none;"><?php the_content(); ?></p>
                                            <div class="property-icon">
                                                <img src="<?php echo get_template_directory_uri()?>/assets/img/icon/bed.png">(5)|
                                                <img src="<?php echo get_template_directory_uri()?>/assets/img/icon/shawer.png">(2)|
                                                <img src="<?php echo get_template_directory_uri()?>/assets/img/icon/cars.png">(1)  
                                            </div>
                                        </div>


                                    </div>
                                </div>  -->
                             
                <?php 
		                //endwhile;
                   /* echo do_shortcode('[ajax_load_more id="8529698665" loading_style="infinite classic" post_type="property" posts_per_page="5" no_results_text="<div class="no-results">Sorry, nothing found in this query</div>" meta_key="price" orderby="date" order="ASC"]');*/
				?>

                <div id="loader">
                  <div style="padding-top:63.636%;position:relative;"><img src="<?php echo get_template_directory_uri()?>/assets/img/A6Yw.gif" width="20%" height="20%" style='position:absolute;top:0;left:50%;' /></div>
                </div><!--/ #loader-->
                    <!-- pagination  -->         
                    </div>
                  

                <!-- если нет постов -->
                <?php

                else :

					get_template_part( 'template-parts/content', 'none' );

				endif;

                ?> 

                </div>              
            </div>
        </div>
		
  </div>
        
<?php
   get_footer();
