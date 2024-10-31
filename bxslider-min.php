<?php
/**
 * @package bx_slider
 * @version 1.0
 */
/*
Plugin Name:prowexpert bx slider
Plugin URI: 
Description: This is bxslider plugin in wordpress
Author:  md sohel
Version: 1.0
Author URI: http://paisleyfarmersmarket.ca/sohels/
*/

function bxx_wp_latest_jquery_d() {
	wp_enqueue_script('jquery');
}
add_action('init', 'bxx_wp_latest_jquery_d');

function plugin_function_bx_slider() {
    wp_enqueue_script( 'bxslider-js-d', plugins_url( '/js/jquery.bxslider.min.js', __FILE__ ), true);
    wp_enqueue_style( 'bxslider-css-d', plugins_url( '/css/jquery.bxslider.css', __FILE__ ));
}

add_action('init','plugin_function_bx_slider');


//add tinymce button 
/* Add Slider Shortcode Button on Post Visual Editor */
function bxsliderbxslider_button_function() {
	add_filter ("mce_external_plugins", "bxslide_button_js");
	add_filter ("mce_buttons", "bxslider_buttons");
}

function bxslide_button_js($plugin_array) {
	$plugin_array['tinymcebxslide'] = plugins_url('js/custom-button.js', __FILE__);
	return $plugin_array;
}

function bxslider_buttons($buttons) {
	array_push ($buttons, 'bxslide_buttom');
	return $buttons;
}
add_action ('init', 'bxsliderbxslider_button_function'); 

function bxslider_script_slider_function () {?>
	<script>
		jQuery(document).ready(function(){
		  jQuery('#bxslider1, #bxslider2, #bxslider3').bxSlider();
		});
	</script>
	

<?php
}
add_action('wp_footer','bxslider_script_slider_function');

function bxslider_slider_shortcode_d($atts){
	extract( shortcode_atts( array(
		'category' => '',
		'post_type' => 'bxslider-eitems',
		'count' => '5',
		'id' => 'bxslider1',
	), $atts) );
	
    $q = new WP_Query(
        array('posts_per_page' => $count, 'post_type' => $post_type, 'category_name' => $category)
        );		
		
		$plugins_url = plugins_url();
		
	$list = ' <div class="slider"> <ul id="'.$id.'"> ';
	while($q->have_posts()) : $q->the_post();
		$idd = get_the_ID();
		$bxslider_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'bxslider-thumb' );
		
		$list .= '
			
			
			<li><img src="'.$bxslider_img[0].'"></li>

		
		';        
	endwhile;
	$list.= '</ul> </div>';
	wp_reset_query();
	return $list;
}
add_shortcode('bxslider1', 'bxslider_slider_shortcode_d');



add_action( 'init', 'bxslider_siler_custom_post_d' );
function bxslider_siler_custom_post_d() {

	register_post_type( 'bxslider-eitems',
		array(
			'labels' => array(
				'name' => __( 'bxslider' ),
				'singular_name' => __( 'bxsliders' )
			),
			'public' => true,
			'supports' => array('title', 'thumbnail'),
			'has_archive' => true,
			'rewrite' => array('slug' => 'bxslider-slider'),
			'taxonomies' => array('category', 'post_tag') 
		)
	);	
	}
	
/* Move featured image box under title */
add_action('do_meta_boxes', 'bxchange_image_box');
function bxchange_image_box()
{
    remove_meta_box( 'postimagediv', 'bxslider-image', 'side' );
    add_meta_box('postimagediv', __('Upload bxslider Image'), 'post_thumbnail_meta_box', 'bxslider-eitems', 'normal', 'high');
}

add_theme_support( 'post-thumbnails', array( 'post', 'bxslider-eitems' ) );

add_image_size( 'bxslider-thumb', 580, 180, true );
?>