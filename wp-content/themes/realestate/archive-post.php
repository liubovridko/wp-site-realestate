<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package RealEstate
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
			while ( have_posts() ) :
				the_post();

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
                                        in <a href="<?php echo esc_url( home_url('/blog') ); ?>"><?php echo get_the_category( get_the_ID(); )[0]->name ; ?></a>
                                    </p>
                                </div>
                                <div class="col-sm-6 right" >
                                    <p class="date-comments">
                                        <a href="<?php echo esc_url(get_post_permalink()) ?>"><i class="fa fa-calendar-o"></i> June 20, 2013</a>
                                        <a href="<?php echo esc_url(get_post_permalink()) ?>"><i class="fa fa-comment-o"></i> 8 Comments</a>
                                    </p>
                                </div>
                            </div>
                            <div class="image wow fadeInLeft animated">
                                <a href="<?php echo esc_url(get_post_permalink()) ?>">
                                    <img src="<?php echo esc_url(get_the_post_thumbnail_url()) ?>" class="img-responsive" alt="Example blog post alt">
                                </a>
                            </div>
                            <p class="intro"><?php the_content(); ?></p>
                            <p class="read-more">
                                <a href="<?php echo esc_url(get_post_permalink()) ?>" class="btn btn-default btn-border">Continue reading</a>
                            </p>
                        </section>   

            <?php
			endwhile;

			//the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );
			?>

		

		 
                        

                       

                    </div> 

                    <?php get_sidebar(); ?>
                </div>

			<?php endif;
					?>

            </div>
        </div>


	
<?php

get_footer();
