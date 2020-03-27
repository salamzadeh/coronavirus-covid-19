<?php
/*
  Plugin Name: CoronaVirus (COVID-19) Plugin
  Plugin URI: https://salamzadeh.net/plugins/covid-19
  Description: This is a very simple plugin with a sole purpose of allowing website owners a quick way to show COVID-19 Live Statistics in your website, This plugin provided a shortcode [COVID-19] to display Live Statistics, you can use the shortcode in posts or pages . 
  Version: 1.1.0
  Author: Sasan Salamzadeh
  Text Domain: covid-19
  Author URI: https://salamzadeh.net/
 */

define('COVID19_PLUGIN_NAME',plugin_basename(__FILE__));
define('COVID19_PLUGIN_DIR',__DIR__);
define('COVID19_VERSION','1.1.0');

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Load plugin textdomain.
 *
 * @since 1.1.0
 */
function covid19_load_textdomain() {
    load_plugin_textdomain( 'covid-19', null, basename( dirname( __FILE__ ) ) . '/languages' );
}
add_action( 'init', 'covid19_load_textdomain' );


/**
 * Load Map Style and Scripts
 *
 * @since 1.0.0
 */

function covid19_load_map_styles()
{
	$dir = plugin_dir_url(__FILE__);
    wp_enqueue_style('covid_19_styles', $dir . 'assets/css/styles.css', array(), COVID19_VERSION, 'all');
    wp_enqueue_style('covid_19_custom', $dir . 'assets/css/custom.css', array(), COVID19_VERSION, 'all');
	wp_enqueue_script( 'covid_19_app', $dir .'assets/js/scripts.js', array(), COVID19_VERSION );

	$covid_style = '<style>';
	if($all_options['cov_countries_hide']==!$checked) $covid_style ='body .info{display: none} ';
	if($all_options['cov_map_hide']==!$checked) $covid_style.= ' body .canvas.canvas--visible svg,body .legend{display: none}body .canvas{padding: 0rem 1rem 1rem} ';
	if($all_options['cov_map_hide']==!$checked) $covid_style.= ' body .canvas.canvas--visible svg,body .legend{display: none}body .canvas{padding: 0rem 1rem 1rem} ';
	$covid_style .= $all_options['cov_css'];
	$covid_style .='</style>';
	echo $covid_style;
	
}
/**
 * Load Widget Style and Scripts
 *
 * @since 1.1.0
 */
function covid19_widget_styles()
{
	$dir = plugin_dir_url(__FILE__);
	wp_enqueue_style('covid_19_styles', $dir . 'assets/css/widget.css', array(), COVID19_VERSION, 'all');
}
//add_action('wp_enqueue_scripts', 'covid19_load_map_styles');

include (dirname(__FILE__).'/admin.php');

/**
 * COVID-19 Shortcode - Load Map Statistics
 *
 * @since 1.1.0
 */
function covid19_shortcode(){
	ob_start();
	// get the shortcode detail
	include(dirname(__FILE__).'/inc/live-map.php');
	//assign the file output to $result variable and clean buffer
	$result = ob_get_clean();
	covid19_load_map_styles();
	return $result;
}
add_shortcode('COVID-19', 'covid19_shortcode'); 


/**
 * COVID-19-WIDGET Shortcode - Widget Statistics
 *
 * @since 1.1.0
 */
function covid19_widget_shortcode($atts){
	$params = shortcode_atts( array(
		'title' => esc_attr__( 'Global', 'covid19' ),
		'country' => "Total",
		'label_confirmed' => esc_attr__( 'Confirmed', 'covid19' ),
		'label_deaths' => esc_attr__( 'Deaths', 'covid19' ),
		'label_recovered' => esc_attr__( 'Recovered', 'covid19' ),
		'darkmode' => false,
		'theme' => 'default'
	), $atts );
	if($params["country"] != "Total" && ! isset($atts["title"])) $params["title"] = $params["country"]; 
	$data = covid19_get_api_data($params);
	
	ob_start();
	// get the shortcode detail
	include(dirname(__FILE__).'/inc/widget.php');
	//assign the file output to $result variable and clean buffer
	$result = ob_get_clean();
	covid19_widget_styles();
	return $result;
}

add_shortcode('COVID-19-WIDGET', 'covid19_widget_shortcode'); 

/**
 * Get Widget Data From New API
 *
 * @since 1.1.0
 */
function covid19_get_api_data($params) {
	$response = file_get_contents('https://salamzadeh.net/api/get_covid19_widget?country='.$params["country"]);
	$response = json_decode($response);
	return $response;
}
