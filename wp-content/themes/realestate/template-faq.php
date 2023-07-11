 
<?php
/* Template Name: Template FAQ */

get_header();
?>
 <div class="page-head"> 
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <h1 class="page-title">FAQ PAge</h1>               
                    </div>
                </div>
            </div>
        </div>
        <!-- End page header -->
        

        <!-- property area -->
        <div class="content-area recent-property" style="background-color: #FCFCFC; padding-bottom: 55px;">
            <div class="container">    

                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                        <!-- /.feature title -->
                        <h2>Our terms </h2>
                        <br>
                    </div>
                </div>

                <div class="row row-feat"> 
                    <div class="col-md-12">

                            <?php 
                     $args = array(
                        'post_type' => 'faq',
                         'post_status' => 'publish',
                        'posts_per_page' => 3 ,
                      );

                      $query = new WP_Query($args);
                       if ($query->have_posts()) {

                    ?>
 
                        <div class="col-sm-6 feat-list">
                            <?php
                          while ($query->have_posts()) :
                            $query->the_post();
                             $number= get_post_meta(get_the_ID(), 'num', true);                                  
                            ?>
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                         <h4 class="panel-title fqa-title" data-toggle="collapse" data-target="#fqa<?php echo  $number; ?>" >
                                            <?php the_title(); ?>
                                         </h4> 
                                    </div>
                                    <div id="fqa<?php echo  $number; ?>" class="panel-collapse collapse fqa-body">
                                        <div class="panel-body">
                                            <?php the_content(); ?>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; ?>

                        </div>
                         <?php
                         } else {
                                 get_template_part( 'template-parts/content', 'none' );
                      }
                      wp_reset_postdata();
                    ?>


                    <?php 
                     $args = array(
                        'post_type' => 'faq',
                         'post_status' => 'publish',
                        'posts_per_page' => 3 ,
                        'offset' => 3,
                      );

                      $query = new WP_Query($args);
                       if ($query->have_posts()) {

                    ?>
                        <div class="col-sm-6 feat-list">
                            <?php
                          while ($query->have_posts()) :
                            $query->the_post(); 
                             $number2= get_post_meta(get_the_ID(), 'num', true);                                 
                            ?>
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                         <h4 class="panel-title fqa-title" data-toggle="collapse" data-target="#fqa<?php echo  $number2; ?>" >
                                           <?php the_title(); ?> 
                                         </h4> 
                                    </div>
                                    <div id="fqa<?php echo  $number2; ?>" class="panel-collapse collapse fqa-body">
                                        <div class="panel-body">
                                            <?php the_content(); ?>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        </div>

                     <?php
                         } else {
                                 get_template_part( 'template-parts/content', 'none' );
                      }
                      wp_reset_postdata();
                    ?>    

                    </div>
                </div>
                
            </div>
        </div>


         <?php
get_footer();