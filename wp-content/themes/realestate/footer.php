<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package RealEstate
 */

?>

	  <!-- Footer area-->
        <div class="footer-area">

            <div class=" footer">
                <div class="container">
                    <div class="row">

            <?php dynamic_sidebar( 'sidebar-footer' ); ?>
                    </div>
                </div>
            </div>
            </div>


            <div class="footer-copy text-center">
                <div class="container">
                    <div class="row">
                        <div class="pull-left">
                            <span> (C) <a href="http://www.KimaroTec.com">KimaroTheme</a> , <?php _e('All rights reserved 2016', 'realestate'); ?>  </span> 
                        </div> 
                        <div class="bottom-menu pull-right"> 
                        	<!-- выводим зарегистрированное меню WP -->
                        	<?php 
                                wp_nav_menu([
                                'theme_location' => 'footer_nav',
                                'container'=> false,
                                'menu_class'		=> false,
                                                        ]);

                                ?>
                            
                        </div>
                    </div>
                </div>
            </div>

        </div>
    <?php wp_footer(); ?>

</body>
</html>
