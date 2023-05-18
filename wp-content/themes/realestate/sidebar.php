<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package RealEstate
 */

if ( ! is_active_sidebar( 'sidebar-right' ) ) {
	return;
}
?>

<div class="blog-asside-right col-md-3">

 <?php  if(get_the_ID() == 108) {  
dynamic_sidebar( 'sidebar-right' ); 
   } else if (get_the_ID() == 112) {
dynamic_sidebar( 'sidebar-right-2' ); 
   }

 ?>


</div> 

