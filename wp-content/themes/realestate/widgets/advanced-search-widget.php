<?php
/**
 * Custom Advanced Search Widget
 */

class Custom_Real_Estate_Search_Widget extends WP_Widget {

    // Constructor function
    public function __construct() {
        parent::__construct(
            'custom_real_estate_search_widget', // Widget ID
            __('Real Estate Advanced Search', 'realestate'), // Widget Name
            array(
                'description' => __('A custom widget for real estate search', 'realestate')
            )
        );
    }

    // Output the widget form in the admin panel
    public function form($instance) {
        // Get the current saved values for the widget
        $title = !empty($instance['title']) ? $instance['title'] : __('Search Properties', 'text_domain');
        $field_price = !empty($instance['field_price']) ? $instance['field_price'] : 'Price range ($)';
        $price_min = !empty($instance['price_min']) ? $instance['price_min'] : '20000';
        $price_max = !empty($instance['price_max']) ? $instance['price_max'] : '1000000';
        $field_beds = !empty($instance['field_beds']) ? $instance['field_beds'] : 'Min bed';
        $beds_min = !empty($instance['beds_min']) ? $instance['beds_min'] : '1';
        $beds_max = !empty($instance['beds_max']) ? $instance['beds_max'] : '120';
        $field_baths = !empty($instance['field_baths']) ? $instance['field_baths'] : 'Min baths';
        $baths_min = !empty($instance['baths_min']) ? $instance['baths_min'] : '1';
        $baths_max = !empty($instance['baths_max']) ? $instance['baths_max'] : '120';
        $field_area = !empty($instance['field_area']) ? $instance['field_area'] : 'Property geo (m2) ';
        $area_min = !empty($instance['area_min']) ? $instance['area_min'] : '40';
        $area_max = !empty($instance['area_max']) ? $instance['area_max'] : '12000';

        // Output the widget form
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_attr_e('Title:', 'realestate'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
       <!-- Beds -->
       <p>
		    <label for="<?php echo esc_attr( $this->get_field_id( 'field_beds' ) ); ?>"><?php esc_attr_e( 'field_beds', 'realestate' ); ?></label>
		    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'field_beds' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'field_beds' ) ); ?>" type="text" value="<?php echo esc_attr( $field_beds ); ?>" />
		</p>
		
		<p>
		    <label for="<?php echo esc_attr( $this->get_field_id( 'beds_min' ) ); ?>"><?php esc_attr_e( 'Beds (min):', 'text_domain' ); ?></label>
		    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'beds_min' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'beds_min' ) ); ?>" type="number" value="<?php echo esc_attr( $beds_min ); ?>" />
	    <p>
		    <label for="<?php echo esc_attr( $this->get_field_id( 'beds_max' ) ); ?>"><?php esc_attr_e( 'Beds (max):', 'text_domain' ); ?></label>
		    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'beds_max' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'beds_max' ) ); ?>" type="number" value="<?php echo esc_attr( $beds_max ); ?>" />
        </p>
		
		
		<!-- Price -->
		<p>
		    <label for="<?php echo esc_attr( $this->get_field_id( 'field_price' ) ); ?>"><?php esc_attr_e( 'field_price:', 'realestate' ); ?></label>
		    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'field_price' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'field_price' ) ); ?>" type="text" value="<?php echo esc_attr( $field_price ); ?>" />
		</p>
		
		<p>
		    <label for="<?php echo esc_attr( $this->get_field_id( 'price_min' ) ); ?>"><?php esc_attr_e( 'Price (min):', 'text_domain' ); ?></label>
		    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'price_min' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'price_min' ) ); ?>" type="number" value="<?php echo esc_attr( $price_min ); ?>" />
		</p>

		<p>
		    <label for="<?php echo esc_attr( $this->get_field_id( 'price_max' ) ); ?>"><?php esc_attr_e( 'Price (max):', 'text_domain' ); ?></label>
		    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'price_max' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'price_max' ) ); ?>" type="number" value="<?php echo esc_attr( $price_max ); ?>" />
		</p>
		<!-- Baths -->
		<p>
		    <label for="<?php echo esc_attr( $this->get_field_id( 'field_baths' ) ); ?>"><?php esc_attr_e( 'field_baths:', 'realestate' ); ?></label>
		    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'field_baths' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'field_baths' ) ); ?>" type="text" value="<?php echo esc_attr( $field_baths ); ?>" />
		</p>
		
		<p>
		    <label for="<?php echo esc_attr( $this->get_field_id( 'baths_min' ) ); ?>"><?php esc_attr_e( 'Baths (min):', 'text_domain' ); ?></label>
		    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'baths_min' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'baths_min' ) ); ?>" type="number" value="<?php echo esc_attr( $baths_min ); ?>" />
		</p>

		<p>
		    <label for="<?php echo esc_attr( $this->get_field_id( 'baths_max' ) ); ?>"><?php esc_attr_e( 'Baths (max):', 'text_domain' ); ?></label>
		    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'baths_max' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'baths_max' ) ); ?>" type="number" value="<?php echo esc_attr( $baths_max ); ?>" />
		</p>


		<!-- Area -->
		<p>
		    <label for="<?php echo esc_attr( $this->get_field_id( 'field_area' ) ); ?>"><?php esc_attr_e( 'Area (field):', 'text_domain' ); ?></label>
		    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'field_area' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'field_area' ) ); ?>" type="text" value="<?php echo esc_attr( $field_area ); ?>" />
		</p>
		<p>
		    <label for="<?php echo esc_attr( $this->get_field_id( 'area_min' ) ); ?>"><?php esc_attr_e( 'Area (min):', 'text_domain' ); ?></label>
		    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'area_min' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'area_min' ) ); ?>" type="number" value="<?php echo esc_attr( $area_min ); ?>" />
		</p>

		<p>
		    <label for="<?php echo esc_attr( $this->get_field_id( 'area_max' ) ); ?>"><?php esc_attr_e( 'Area (max):', 'text_domain' ); ?></label>
		    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'area_max' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'area_max' ) ); ?>" type="number" value="<?php echo esc_attr( $area_max ); ?>" />
		</p>
<?php }
		

//frontend

public function widget( $args, $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$title = !empty($instance['title']) ? $instance['title'] : __('Search Properties', 'text_domain');
        $field_price = !empty($instance['field_price']) ? $instance['field_price'] : 'Price range ($)';
        $price_min = !empty($instance['price_min']) ? $instance['price_min'] : '20000';
        $price_max = !empty($instance['price_max']) ? $instance['price_max'] : '1000000';
        $field_beds = !empty($instance['field_beds']) ? $instance['field_beds'] : 'Min bed';
        $beds_min = !empty($instance['beds_min']) ? $instance['beds_min'] : '1';
        $beds_max = !empty($instance['beds_max']) ? $instance['beds_max'] : '120';
        $field_baths = !empty($instance['field_baths']) ? $instance['field_baths'] : 'Min baths';
        $baths_min = !empty($instance['baths_min']) ? $instance['baths_min'] : '1';
        $baths_max = !empty($instance['baths_max']) ? $instance['baths_max'] : '120';
        $field_area = !empty($instance['field_area']) ? $instance['field_area'] : 'Property geo (m2) ';
        $area_min = !empty($instance['area_min']) ? $instance['area_min'] : '40';
        $area_max = !empty($instance['area_max']) ? $instance['area_max'] : '12000';

		echo $args['before_widget'];
	?>

	                      <div class="panel-heading">
                                <?php

                       if ( $title ) {
			                echo $args['before_title'] . $title . $args['after_title'];
		                 }
                                ?>
                            </div>
                            <div class="panel-body search-widget">
                                <form  class=" form-inline" role="search" method="get" id="searchform"  action=" <?php echo esc_url( home_url( '/' ) ); ?>" > 
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="text" class="form-control" placeholder="<?php echo esc_attr('Key word', 'realestate') ?>" value="<?php  get_search_query(); ?>">
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset>
                                        <div class="row">
                                            <div class="col-xs-6">

                                                <select id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Select Your City">

                                                    <option>New york, CA</option>
                                                    <option>Paris</option>
                                                    <option>Casablanca</option>
                                                    <option>Tokyo</option>
                                                    <option>Marraekch</option>
                                                    <option>kyoto , shibua</option>
                                                </select>
                                            </div>
                                            <div class="col-xs-6">

                                                <select id="basic" class="selectpicker show-tick form-control">
                                                    <option> -Status- </option>
                                                    <option>Rent </option>
                                                    <option>Boy</option>
                                                    <option>used</option>  

                                                </select>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="padding-5">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label for="price-range"><?php echo  $field_price; ?> :</label>
                                                <input type="text" class="span2" value="" data-slider-min="0" 
                                                       data-slider-max="600" data-slider-step="5" 
                                                       data-slider-value="[0,450]" id="price-range" ><br />
                                                <b class="pull-left color"><?php echo $price_min; ?>$</b> 
                                                <b class="pull-right color"><?php echo $price_max; ?>$</b>                                                
                                            </div>
                                            <div class="col-xs-6">
                                                <label for="property-geo"><?php echo $field_area; ?> :</label>
                                                <input type="text" class="span2" value="" data-slider-min="0" 
                                                       data-slider-max="600" data-slider-step="5" 
                                                       data-slider-value="[50,450]" id="property-geo" ><br />
                                                <b class="pull-left color"><?php echo $area_min; ?>m</b> 
                                                <b class="pull-right color"><?php echo $area_max; ?>m</b>                                                
                                            </div>                                            
                                        </div>
                                    </fieldset>                                

                                    <fieldset class="padding-5">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label for="price-range"><?php echo  $field_baths; ?> :</label>
                                                <input type="text" class="span2" value="" data-slider-min="0" 
                                                       data-slider-max="600" data-slider-step="5" 
                                                       data-slider-value="[250,450]" id="min-baths" ><br />
                                                <b class="pull-left color"><?php echo $baths_min; ?></b> 
                                                <b class="pull-right color"><?php echo $baths_max; ?></b>                                                
                                            </div>

                                            <div class="col-xs-6">
                                                <label for="property-geo"><?php echo $field_beds; ?> :</label>
                                                <input type="text" class="span2" value="" data-slider-min="0" 
                                                       data-slider-max="600" data-slider-step="5" 
                                                       data-slider-value="[250,450]" id="min-bed" ><br />
                                                <b class="pull-left color"><?php echo $beds_min; ?></b> 
                                                <b class="pull-right color"><?php echo $beds_max; ?></b>

                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="padding-5">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="checkbox">
                                                    <label> <input type="checkbox" checked> Fire Place</label>
                                                </div> 
                                            </div>

                                            <div class="col-xs-6">
                                                <div class="checkbox">
                                                    <label> <input type="checkbox"> Dual Sinks</label>
                                                </div>
                                            </div>                                            
                                        </div>
                                    </fieldset>

                                    <fieldset class="padding-5">
                                        <div class="row">
                                            <div class="col-xs-6"> 
                                                <div class="checkbox">
                                                    <label> <input type="checkbox" checked> Swimming Pool</label>
                                                </div>
                                            </div>  
                                            <div class="col-xs-6"> 
                                                <div class="checkbox">
                                                    <label> <input type="checkbox" checked> 2 Stories </label>
                                                </div>
                                            </div>  
                                        </div>
                                    </fieldset>

                                    <fieldset class="padding-5">
                                        <div class="row">
                                            <div class="col-xs-6"> 
                                                <div class="checkbox">
                                                    <label><input type="checkbox"> Laundry Room </label>
                                                </div>
                                            </div>  
                                            <div class="col-xs-6"> 
                                                <div class="checkbox">
                                                    <label> <input type="checkbox"> Emergency Exit</label>
                                                </div>
                                            </div>  
                                        </div>
                                    </fieldset>

                                    <fieldset class="padding-5">
                                        <div class="row">
                                            <div class="col-xs-6"> 
                                                <div class="checkbox">
                                                    <label>  <input type="checkbox" checked> Jog Path </label>
                                                </div>
                                            </div>  
                                            <div class="col-xs-6"> 
                                                <div class="checkbox">
                                                    <label>  <input type="checkbox"> 26' Ceilings </label>
                                                </div>
                                            </div>  
                                        </div>
                                    </fieldset>

                                    <fieldset class="padding-5">
                                        <div class="row">
                                            <div class="col-xs-12"> 
                                                <div class="checkbox">
                                                    <label>  <input type="checkbox"> Hurricane Shutters </label>
                                                </div>
                                            </div>  
                                        </div>
                                    </fieldset>

                                    <fieldset >
                                        <div class="row">
                                            <div class="col-xs-12">  
                                                <input class="button btn largesearch-btn" value="Search" type="submit">
                                            </div>  
                                        </div>
                                    </fieldset>                                     
                                </form>
                            </div>
                        

	<?php	echo $args['after_widget'];
	}


public function update( $new_instance, $old_instance ) {
		$instance              = $old_instance;
		$instance['title']     = sanitize_text_field( $new_instance['title'] );
		$instance['field_price'] = sanitize_text_field( $new_instance['field_price'] );
        $instance['price_min'] = (int)( $new_instance['price_min'] );
        $instance['price_max'] = (int)( $new_instance['price_max'] );
        $instance['field_beds'] = sanitize_text_field( $new_instance['field_beds'] );
        $instance['beds_min'] = (int)( $new_instance['beds_min'] );
        $instance['beds_max'] = (int)( $new_instance['beds_max'] );
        $instance['field_baths'] = sanitize_text_field( $new_instance['field_baths'] );
        $instance['baths_min'] = (int)( $new_instance['baths_min'] );
        $instance['baths_max'] = (int)( $new_instance['baths_max'] );
        $instance['field_area'] = sanitize_text_field( $new_instance['field_area'] );
        $instance['area_min'] = (int)( $new_instance['area_min'] );
        $instance['area_max'] = (int)( $new_instance['area_max'] );
		
		return $instance;
	}

}