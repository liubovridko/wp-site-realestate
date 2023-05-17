<div class="col-sm-6 col-md-4 p0">
<?php global $post; ?>
                                    <div class="box-two proerty-item">
                                        <div class="item-thumb">
                                            <a href="<?php echo esc_url(get_post_permalink()) ?>" ><img src="<?php echo esc_url(get_the_post_thumbnail_url()) ?>"></a>
                                        </div>

                                        <div class="item-entry overflow">
                                            <h5><a href="<?php echo esc_url(get_post_permalink()) ?>"> <?php the_title(); ?> </a></h5>
                                            <div class="dot-hr"></div>
                                            <span class="pull-left"><b> Area :</b> <?php echo get_post_meta($post->ID, 'area', true); ?>m </span>
                                            <span class="proerty-price pull-right"> $ <?php echo get_field('price', $post->ID); ?></span>
                                            <p style="display: none;"><?php the_content(); ?></p>
                                            <div class="property-icon">
                                                <img src="<?php echo get_template_directory_uri()?>/assets/img/icon/bed.png">(<?php echo get_post_meta($post->ID, 'rooms', true); ?>)
                                                 <img src="<?php echo get_template_directory_uri()?>/assets/img/icon/shawer.png">(<?php echo get_post_meta($post->ID, 'bathrooms', true); ?>)
                                                <img src="<?php echo get_template_directory_uri()?>/assets/img/icon/cars.png">(<?php echo get_post_meta($post->ID, 'cars', true); ?>)  
                                            </div>
                                        </div>


                                    </div>
                                </div>