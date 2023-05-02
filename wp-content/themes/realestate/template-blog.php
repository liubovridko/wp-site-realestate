<?php
/**
 Template Name: Template Blog 
 */

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
<?php if ( have_posts() ) : ?>

        <div class="content-area blog-page padding-top-40" style="background-color: #FCFCFC; padding-bottom: 55px;">
            <div class="container">   
                <div class="row">
                    <div class="blog-lst col-md-9">

			<?php
			/* Start the Loop */
			global $post;
                 $args = array( 'post_type' => 'post','post_status' => 'publish','numberposts' => 5 /*, 'offset' => 6*/);
                 $myposts = get_posts( $args );
                 foreach( $myposts as $post ){ setup_postdata($post);

                $price=get_post_meta(get_the_ID(),'price', true);
                $weight=get_post_meta(get_the_ID(),'weight', true);
                $dimensions=get_post_meta(get_the_ID(),'dimensions', true);
                $voltage=get_post_meta(get_the_ID(),'voltage', true);
                $category_id = get_the_category()[0]->cat_ID;
                $format = 'F j , Y ';

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				//get_template_part( 'template-parts/content', get_post_type() );
            ?>

              <section class="post">
                            <div class="text-center padding-b-50">
                                <h2 class="wow fadeInLeft animated"><?php the_title(); ?></h2>
                                <div class="title-line wow fadeInRight animated"></div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="author-category">
                                        By <a href="#">John Snow</a>
                                        in <a href="<?php echo esc_url( get_category_link( $category_id ) ); ?>"><?php echo get_the_category( )[0]->name ; ?></a>
                                    </p>
                                </div>
                                <div class="col-sm-6 right" >
                                    <p class="date-comments">
                                        <a href="<?php echo esc_url(get_post_permalink()) ?>"><i class="fa fa-calendar-o" title="<?php the_title_attribute(); ?>"></i> <?php echo get_the_date( $format ); ?></a>
                                        <a href="<?php echo esc_url(get_post_permalink()) ?>"><i class="fa fa-comment-o"></i> 8 Comments</a>
                                    </p>
                                </div>
                            </div>
                            <div class="image wow fadeInLeft animated">
                                <a href="<?php echo esc_url(get_post_permalink()) ?>" title="<?php the_title_attribute(); ?>">
                                    <img src="<?php echo esc_url(get_the_post_thumbnail_url()) ?>" class="img-responsive" alt="Example blog post alt">
                                </a>
                            </div>
                            <p class="intro"><?php the_content(); ?></p>
                            <p class="read-more">
                                <a href="<?php echo esc_url(get_post_permalink()) ?>" class="btn btn-default btn-border">Continue reading</a>
                            </p>
                        </section>           
                <?php
              }
                wp_reset_postdata();
              ?>
                    <?php
			

			//the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );
			?>        
               

                    </div> 

                    
                </div>

			<?php endif;
					?>

            </div>
           
            <?php get_sidebar(); ?>
        </div>

</div>
	
<?php

get_footer();
