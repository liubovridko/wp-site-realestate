<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package RealEstate
 */

?>

<?php

		if ( 'post' === get_post_type() ) :
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
                                        in <a href="<?php echo esc_url( home_url('/blog') ); ?>"><?php echo get_the_category( the_ID() )[0]->name ; ?></a>
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
		<?php endif; ?>

