<?php
/* Template Name: Homepage Template */

get_header();
?>




  <div class="slider-area">
            <div class="slider">
                <div id="bg-slider" class="owl-carousel owl-theme">

                    <div class="item"><img src="<?php echo  get_template_directory_uri()?>/assets/img/slide1/slider-image-1.jpg" alt="GTA V"></div>
                    <div class="item"><img src="<?php echo  get_template_directory_uri()?>/assets/img/slide1/slider-image-2.jpg" alt="The Last of us"></div>
                    <div class="item"><img src="<?php echo  get_template_directory_uri()?>/assets/img/slide1/slider-image-1.jpg" alt="GTA V"></div>

                </div>
            </div>
            <div class="slider-content">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12">
                        <h2><?php echo esc_html(pll__('property Searching Just Got So Easy')) ?></h2>
                        <p><?php echo esc_html(pll_e('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi deserunt deleniti, ullam commodi sit ipsam laboriosam velit adipisci quibusdam aliquam teneturo!')) ?></p>
                        <div class="search-form wow pulse" data-wow-delay="0.8s">

                            <form action="" class=" form-inline">
                                <button class="btn  toggle-btn" type="button"><i class="fa fa-bars"></i></button>

                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="<?php echo esc_attr(pll__('Key word')); ?>">
                                </div>
                                <div class="form-group">                                   
                                    <select id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="<?php pll_e('Select your city', 'realestate'); ?>">

                                        <option><?php pll_e('New york, CA', 'realestate'); ?></option>
                                        <option><?php pll_e('Paris', 'realestate'); ?></option>
                                        <option><?php pll_e('Casablanca', 'realestate'); ?></option>
                                        <option><?php pll_e('Tokyo', 'realestate'); ?></option>
                                        <option><?php pll_e('Marraekch', 'realestate'); ?></option>
                                        <option><?php pll_e('kyoto , shibua', 'realestate'); ?></option>
                                    </select>
                                </div>
                                <div class="form-group">                                     
                                    <select id="basic" class="selectpicker show-tick form-control">
                                        <option> <?php pll_e('-Status-', 'realestate'); ?> </option>
                                        <option> <?php pll_e('Rent', 'realestate'); ?></option>
                                        <option><?php pll_e('Buy', 'realestate'); ?></option>
                                        <option><?php pll_e('used', 'realestate'); ?></option>  

                                    </select>
                                </div>
                                <button class="btn search-btn" type="submit"><i class="fa fa-search"></i></button>

                                <div style="display: none;" class="search-toggle">

                                    <div class="search-row">   

                                        <div class="form-group mar-r-20">
                                            <label for="price-range"><?php pll_e('Price range', 'realestate'); ?> ($):</label>
                                            <input type="text" class="span2" value="" data-slider-min="0" 
                                                   data-slider-max="600" data-slider-step="5" 
                                                   data-slider-value="[0,450]" id="price-range" ><br />
                                            <b class="pull-left color">2000$</b> 
                                            <b class="pull-right color">100000$</b>
                                        </div>
                                        <!-- End of  -->  

                                        <div class="form-group mar-l-20">
                                            <label for="property-geo"><?php pll_e('Property geo (m2) ', 'realestate'); ?> :</label>
                                            <input type="text" class="span2" value="" data-slider-min="0" 
                                                   data-slider-max="600" data-slider-step="5" 
                                                   data-slider-value="[50,450]" id="property-geo" ><br />
                                            <b class="pull-left color">40m</b> 
                                            <b class="pull-right color">12000m</b>
                                        </div>
                                        <!-- End of  --> 
                                    </div>

                                    <div class="search-row">

                                        <div class="form-group mar-r-20">
                                            <label for="price-range"><?php pll_e('Min baths ', 'realestate'); ?>:</label>
                                            <input type="text" class="span2" value="" data-slider-min="0" 
                                                   data-slider-max="600" data-slider-step="5" 
                                                   data-slider-value="[250,450]" id="min-baths" ><br />
                                            <b class="pull-left color">1</b> 
                                            <b class="pull-right color">120</b>
                                        </div>
                                        <!-- End of  --> 

                                        <div class="form-group mar-l-20">
                                            <label for="property-geo"><?php pll_e('Min bed ', 'realestate'); ?>:</label>
                                            <input type="text" class="span2" value="" data-slider-min="0" 
                                                   data-slider-max="600" data-slider-step="5" 
                                                   data-slider-value="[250,450]" id="min-bed" ><br />
                                            <b class="pull-left color">1</b> 
                                            <b class="pull-right color">120</b>
                                        </div>
                                        <!-- End of  --> 

                                    </div>
                                    <br>
                                    <div class="search-row">  

                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> <?php pll_e('Fire Place', 'realestate'); ?>(3100)
                                                </label>
                                            </div>
                                        </div>
                                        <!-- End of  -->  

                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> <?php pll_e('Dual Sinks', 'realestate'); ?>(500)
                                                </label>
                                            </div>
                                        </div>
                                        <!-- End of  --> 

                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> <?php pll_e('Hurricane Shutters', 'realestate'); ?>(99)
                                                </label>
                                            </div>
                                        </div>
                                        <!-- End of  --> 
                                    </div>

                                    <div class="search-row">  

                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> <?php pll_e('Swimming Pool', 'realestate'); ?>(1190)
                                                </label>
                                            </div>
                                        </div>
                                        <!-- End of  -->  

                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> 2 <?php pll_e('Stories', 'realestate'); ?>(4600)
                                                </label>
                                            </div>
                                        </div>
                                        <!-- End of  --> 

                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> <?php pll_e('Emergency Exit', 'realestate'); ?>(200)
                                                </label>
                                            </div>
                                        </div>
                                        <!-- End of  --> 
                                    </div>                                    

                                    <div class="search-row">  

                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> <?php pll_e('Laundry Room', 'realestate'); ?>(10073)
                                                </label>
                                            </div>
                                        </div>
                                        <!-- End of  -->  

                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> <?php pll_e('Jog Path', 'realestate'); ?>(1503)
                                                </label>
                                            </div>
                                        </div>
                                        <!-- End of  --> 

                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> 26' <?php pll_e('Ceilings', 'realestate'); ?>(1200)
                                                </label>
                                            </div>
                                        </div>
                                        <!-- End of  --> 
                                        <br>
                                        <hr>
                                    </div>                             
                                    <button class="btn search-btn prop-btm-sheaerch" type="submit"><i class="fa fa-search"></i></button>  
                                </div>                    

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- property area -->
        <div class="content-area home-area-1 recent-property" style="background-color: #FCFCFC; padding-bottom: 55px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                        <!-- /.feature title -->
                        <h2><?php echo esc_html(pll__('Top submitted property')); ?></h2>
                        <p><?php echo esc_html(pll__('Nulla quis dapibus nisl. Suspendisse ultricies commodo arcu nec pretium. Nullam sed arcu ultricies .')); ?> </p>
                    </div>
                </div>
                <?php 
                 $args = array(
                    'post_type' => 'property',
                     'post_status' => 'publish',
                    'posts_per_page' => 7 ,
                  );

                  $query = new WP_Query($args);
                   if ($query->have_posts()) {

                ?>
                <div class="row">
                    <div class="proerty-th">
                        <?php
                          while ($query->have_posts()) {
                            $query->the_post();
                                    $price= get_post_meta(get_the_ID(), 'price', true);
                                    $area= get_post_meta(get_the_ID(), 'area', true); 
                        ?>
                        <div class="col-sm-6 col-md-3 p0">
                            <div class="box-two proerty-item">
                                <div class="item-thumb">
                                    <a href="<?php echo esc_url(get_post_permalink()) ?>" ><img src="<?php echo esc_url(get_the_post_thumbnail_url()) ?>"></a>
                                </div>
                                <div class="item-entry overflow">
                                    <h5><a href="<?php echo esc_url(get_post_permalink()) ?>" ><?php the_title(); ?> </a></h5>
                                    <div class="dot-hr"></div>
                                    <span class="pull-left"><b><?php pll_e('Area', 'realestate'); ?> :</b> <?php echo $area; ?>m </span>
                                    <span class="proerty-price pull-right">$ <?php echo $price; ?></span>
                                </div>
                            </div>
                        </div>

                       <?php
                        } 
                       ?>

                        <div class="col-sm-6 col-md-3 p0">
                            <div class="box-tree more-proerty text-center">
                                <div class="item-tree-icon">
                                    <i class="fa fa-th"></i>
                                </div>
                                <div class="more-entry overflow">
                                    <h5><a href="property-1.html" ><?php pll_e('CAN`T DECIDE', 'realestate'); ?> ? </a></h5>
                                    <h5 class="tree-sub-ttl"><?php pll_e('Show all properties', 'realestate'); ?></h5>
                                    <button class="btn border-btn more-black" onclick="window.open('/properties')" value="<?php  esc_attr(pll__('All properties')) ?>"><?php esc_html(pll_e('All properties', 'realestate')); ?></button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <?php
                     } else {
                             get_template_part( 'template-parts/content', 'none' );
                  }
                  wp_reset_postdata();
                ?>
            </div>
        </div>

        <!--Welcome area -->
        <div class="Welcome-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 Welcome-entry  col-sm-12">
                        <div class="col-md-5 col-md-offset-2 col-sm-6 col-xs-12">
                            <div class="welcome_text wow fadeInLeft" data-wow-delay="0.3s" data-wow-offset="100">
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                                        <!-- /.feature title -->
                                        <h2><?php _e('GARO ESTATE', 'realestate'); ?> </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-6 col-xs-12">
                            <div  class="welcome_services wow fadeInRight" data-wow-delay="0.3s" data-wow-offset="100">
                                <div class="row">
                                    <div class="col-xs-6 m-padding">
                                        <div class="welcome-estate">
                                            <div class="welcome-icon">
                                                <i class="pe-7s-home pe-4x"></i>
                                            </div>
                                            <h3><?php esc_html(pll_e('Any property', 'realestate')); ?></h3>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 m-padding">
                                        <div class="welcome-estate">
                                            <div class="welcome-icon">
                                                <i class="pe-7s-users pe-4x"></i>
                                            </div>
                                            <h3><?php esc_html(pll_e('More Clients', 'realestate')); ?></h3>
                                        </div>
                                    </div>


                                    <div class="col-xs-12 text-center">
                                        <i class="welcome-circle"></i>
                                    </div>

                                    <div class="col-xs-6 m-padding">
                                        <div class="welcome-estate">
                                            <div class="welcome-icon">
                                                <i class="pe-7s-notebook pe-4x"></i>
                                            </div>
                                            <h3><?php esc_html(pll_e('Easy to use', 'realestate')); ?></h3>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 m-padding">
                                        <div class="welcome-estate">
                                            <div class="welcome-icon">
                                                <i class="pe-7s-help2 pe-4x"></i>
                                            </div>
                                            <h3><?php esc_html(pll_e('Any help', 'realestate')); ?> </h3>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--TESTIMONIALS -->
        <div class="testimonial-area recent-property" style="background-color: #FCFCFC; padding-bottom: 15px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                        <!-- /.feature title -->
                        <h2><?php esc_html(pll_e('Our Customers Said', 'realestate')); ?>  </h2> 
                    </div>
                </div>

                <div class="row">
                    <div class="row testimonial">
                        <div class="col-md-12">
                            <?php 
                                 $args = array(
                                    'post_type' => 'testimonial',
                                     'post_status' => 'publish',
                                   
                                  );

                                  $query = new WP_Query($args);
                                   if ($query->have_posts()) {
                           ?>
                            <div id="testimonial-slider">
                                <?php
                          while ($query->have_posts()) {
                                    $query->the_post();
                                    ?>

                                <div class="item">
                                    <div class="client-text">                                
                                        <?php the_content(); ?>
                                        <h4><strong><?= the_title(); ?>, </strong><i><?= get_field('position'); ?></i></h4>
                                    </div>
                                    <div class="client-face wow fadeInRight" data-wow-delay=".9s"> 
                                        <img src="<?php echo esc_url(get_the_post_thumbnail_url()) ?>" alt="">
                                    </div>
                                </div>
                               <?php
                                    } /*end while loop*/
                                ?>
                            </div>
                            <?php
                        } /*end if loop*/
                            ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Count area -->
        <div class="count-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                        <!-- /.feature title -->
                        <h2><?php esc_html(pll_e('You can trust Us', 'realestate')); ?> </h2> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-xs-12 percent-blocks m-main" data-waypoint-scroll="true">
                        <div class="row">
                            <div class="col-sm-3 col-xs-6">
                                <div class="count-item">
                                    <div class="count-item-circle">
                                        <span class="pe-7s-users"></span>
                                    </div>
                                    <div class="chart" data-percent="5000">
                                        <h2 class="percent" id="counter">0</h2>
                                        <h5><?php esc_html(pll_e('HAPPY CUSTOMER', 'realestate')); ?> </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <div class="count-item">
                                    <div class="count-item-circle">
                                        <span class="pe-7s-home"></span>
                                    </div>
                                    <div class="chart" data-percent="12000">
                                        <h2 class="percent" id="counter1">0</h2>
                                        <h5><?php esc_html(pll_e('Properties in stock', 'realestate')); ?></h5>
                                    </div>
                                </div> 
                            </div> 
                            <div class="col-sm-3 col-xs-6">
                                <div class="count-item">
                                    <div class="count-item-circle">
                                        <span class="pe-7s-flag"></span>
                                    </div>
                                    <div class="chart" data-percent="120">
                                        <h2 class="percent" id="counter2">0</h2>
                                        <h5><?php esc_html(pll_e('City registered', 'realestate')); ?> </h5>
                                    </div>
                                </div> 
                            </div> 
                            <div class="col-sm-3 col-xs-6">
                                <div class="count-item">
                                    <div class="count-item-circle">
                                        <span class="pe-7s-graph2"></span>
                                    </div>
                                    <div class="chart" data-percent="5000">
                                        <h2 class="percent"  id="counter3">5000</h2>
                                        <h5><?php esc_html(pll_e('DEALER BRANCHES', 'realestate')); ?></h5>
                                    </div>
                                </div> 

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- boy-sale area -->
        <div class="boy-sale-area">
            <div class="container">
                <div class="row">

                    <div class="col-md-6 col-sm-10 col-sm-offset-1 col-md-offset-0 col-xs-12">
                        <div class="asks-first">
                            <div class="asks-first-circle">
                                <span class="fa fa-search"></span>
                            </div>
                            <div class="asks-first-info">
                                <h2><?php esc_html(pll_e('ARE YOU LOOKING FOR A Property?')) ?></h2>
                                <p> <?php esc_html(pll_e('varius od lio eget conseq uat blandit, lorem auglue comm lodo nisl no us nibh mas lsa')) ?></p>                                        
                            </div>
                            <div class="asks-first-arrow">
                                <a href="properties.html"><span class="fa fa-angle-right"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-10 col-sm-offset-1 col-xs-12 col-md-offset-0">
                        <div  class="asks-first">
                            <div class="asks-first-circle">
                                <span class="fa fa-usd"></span>
                            </div>
                            <div class="asks-first-info">
                                <h2><?php esc_html(pll_e('DO YOU WANT TO SELL A Property?')) ?></h2>
                                <p> <?php esc_html(pll_e('varius od lio eget conseq uat blandit, lorem auglue comm lodo nisl no us nibh mas lsa')) ?></p>
                            </div>
                            <div class="asks-first-arrow">
                                <a href="properties.html"><span class="fa fa-angle-right"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <p  class="asks-call"><?php esc_html(pll_e('QUESTIONS? CALL US', 'realestate')); ?>  : <span class="strong"> + 3-123- 424-5700</span></p>
                    </div>
                </div>
            </div>
<?php
get_footer();