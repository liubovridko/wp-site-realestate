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
   

		<?php if ( is_archive() && !is_post_type_archive() )  : ?>

			<div class="page-head"> 
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <h1 class="page-title">FAQ PAge</h1>               
                    </div>
                </div>
            </div>
        </div>

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
				get_template_part( 'template-parts/content', get_post_type() );
            ?>

                      

            <?php
			endwhile;

			//the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );
			?>

		

		 
                        

                       

                    </div> 

                    <?php get_sidebar();?>
                </div>

			<?php endif;
					?>

            </div>
        </div>


	
<?php

get_footer();
