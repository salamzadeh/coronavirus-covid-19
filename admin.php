<?php
// add style files

function covid19_style() {
    wp_enqueue_style('my-covid-theme', plugins_url('/assets/css/admin-style.css', __FILE__));
}
add_action('admin_enqueue_scripts', 'covid19_style');
add_action('login_enqueue_scripts', 'covid19_style');
 
// add contact and pro version links

add_filter("plugin_action_links_".COVID19_PLUGIN_NAME, 'covid_contact_link');
function covid_contact_link( $links ) {
	$links[] = '<a href="https://salamzadeh.net/contact" target="_blank">' . __('Need Help?') . '</a>';
	return $links;
}

add_filter("plugin_action_links_".COVID19_PLUGIN_NAME, 'covid_pro_version_link');
function covid_pro_version_link( $links ) {
	$links[] = '<a href="https://salamzadeh.net/contact" target="_blank">' . __('Get Pro Version') . '</a>';
	return $links;
}
 
add_filter("plugin_action_links_".COVID19_PLUGIN_NAME, 'covid_settings_link');
function covid_settings_link( $links ) {
	$links[] = '<a href="' .
		admin_url( 'options-general.php?page=covid-plugin-options' ) .
		'">' . __('Settings') . '</a>';
	return $links;
}
 
//admin page 

function coronavirus_covid19_options() {
	global $covid_page;
	add_options_page( 'COVID-19 Options', 'COVID-19 Options', 'manage_options', 'covid-plugin-options', 'get_covid19_option_page');  
}
add_action('admin_menu', 'coronavirus_covid19_options');

function get_covid19_option_page(){
	global $covid_page;
	?><div class="covid_wrap wrap">
		<h2><?php _e('Coronavirus COVID-19 Options') ?></h2><br/>
		<div class="notify"><?php _e('The plugin provided a shortcode <b>[COVID-19]</b> to display Live Statistics, you can use the shortcode in posts or pages and etc.') ?></div>
		<form method="post" enctype="multipart/form-data" action="options.php">
			<?php 
			settings_fields('covid19_options');
			do_settings_sections($covid_page);
			?>
			<p class="submit">  
				<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />  
			</p>
		</form>
	</div><?php
}
 

function get_covid19_option_settings() {
	global $covid_page;
	// validate fields of covid19_options
	register_setting( 'covid19_options', 'covid19_options', 'covid19_validate_fields_settings' ); 
 
	// Add section
	add_settings_section( 'covid_section_1', 'Options', '', $covid_page );

	$covid_field_params = array(
		'type'      => 'text', // type
		'id'        => 'cov_title',
		'value'        => 'An interactive web-based dashboard to track COVID-19 in real time.',
		'desc'      => 'Default: An interactive web-based dashboard to track COVID-19 in real time.', // description
		'label_for' => 'cov_title'
	);
	add_settings_field( 'my_text_field', 'Title', 'get_covid19_option_display_settings', $covid_page, 'covid_section_1', $covid_field_params );
 
	$covid_field_params = array(
		'type'      => 'textarea',
		'id'        => 'cov_desc',
		'value'        => 'To identify new cases, we monitor various twitter feeds, online news services, and direct communication sent through the dashboard.',
		'desc'      => 'Optional.'
	);
	add_settings_field( 'cov_desc_field', 'Description', 'get_covid19_option_display_settings', $covid_page, 'covid_section_1', $covid_field_params );
 
	add_settings_section( 'covid_section_2', 'Customization', '', $covid_page );

	$covid_field_params = array(
		'type'      => 'checkbox',
		'id'        => 'cov_countries_hide',
		'desc'      => 'Hide'
	);
	add_settings_field( 'cov_countries_hide_field', 'List of countries', 'get_covid19_option_display_settings', $covid_page, 'covid_section_2', $covid_field_params );
	
	$covid_field_params = array(
		'type'      => 'checkbox',
		'id'        => 'cov_map_hide',
		'desc'      => 'Hide'
	);
	add_settings_field( 'cov_map_hide_field', 'World Map', 'get_covid19_option_display_settings', $covid_page, 'covid_section_2', $covid_field_params );

	$covid_field_params = array(
		'type'      => 'select',
		'id'        => 'cov_theme',
		'desc'      => '',
		'vals'		=> array( 'style1_theme' => 'Dark Style', 'style2_theme' => 'Light Style')
	);
	add_settings_field( 'cov_theme_field', 'Theme', 'get_covid19_option_display_settings', $covid_page, 'covid_section_2', $covid_field_params );
	
	$covid_field_params = array(
		'type'      => 'textarea',
		'id'        => 'cov_css',
		'desc'      => 'Without &lt;style&gt; tags'
	);
	add_settings_field( 'cov_css_field', 'Custom CSS', 'get_covid19_option_display_settings', $covid_page, 'covid_section_2', $covid_field_params );
}
add_action( 'admin_init', 'get_covid19_option_settings' );
 
/*
 * Show fields
 */
function get_covid19_option_display_settings($args) {
	extract( $args );
	$option_name = 'covid19_options';
 
	$o = get_option( $option_name );
 
	switch ( $type ) {  
		case 'text':  
			$o[$id] = esc_attr( stripslashes($o[$id]) );
			echo "<input class='regular-text' type='text' id='$id' name='" . $option_name . "[$id]' value='$o[$id]' />";  
			echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";  
		break;
		case 'textarea':  
			$o[$id] = esc_attr( stripslashes($o[$id]) );
			echo "<textarea class='code regular-text' cols='12' rows='5' type='text' id='$id' name='" . $option_name . "[$id]'>$o[$id]</textarea>";  
			echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";  
		break;
		case 'checkbox':
			$checked = ($o[$id] == 'on') ? " checked='checked'" :  '';  
			echo "<label><input type='checkbox' id='$id' name='" . $option_name . "[$id]' $checked /> ";  
			echo ($desc != '') ? $desc : "";
			echo "</label>";  
		break;
		case 'select':
			echo "<select id='$id' name='" . $option_name . "[$id]'>";
			foreach($vals as $v=>$l){
				$selected = ($o[$id] == $v) ? "selected='selected'" : '';  
				echo "<option value='$v' $selected>$l</option>";
			}
			echo ($desc != '') ? $desc : "";
			echo "</select>";  
		break;
		case 'radio':
			echo "<fieldset>";
			foreach($vals as $v=>$l){
				$checked = ($o[$id] == $v) ? "checked='checked'" : '';  
				echo "<label><input type='radio' name='" . $option_name . "[$id]' value='$v' $checked />$l</label><br />";
			}
			echo "</fieldset>";  
		break; 
	}
}
 
/*
 * Fields Validator
 */
function covid19_validate_fields_settings($input) {
	foreach($input as $k => $v) {
		$valid_input[$k] = trim($v);
	}
	return $valid_input;
}