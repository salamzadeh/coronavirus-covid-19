<?php 
$all_options = get_option( 'covid19_options' );
$rand = wp_rand(0,100000);
?>
<div id="<?php print "covid_widget_".$rand?>" class="covid19-item covid19-theme-<?php echo esc_attr($params['theme'] ? $params['theme'] : 'default'); ?> covid19-<?php echo esc_attr($params['country'] ? 'country' : 'global'); ?> <?php echo esc_attr($params['darkmode'] ? 'darkmode' : ''); ?>" data-country="<?php echo esc_attr($params['country'] ? $params['country'] : 'total'); ?>">
	<h4 class="covid19-title"><?php echo esc_html(isset($params['title']) ? $params['title'] : ''); ?></h4>
	<div class="covid19-row">
		<div class="covid19-col covid19-confirmed">
			<span class="covid19-value"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></span>
			<span class="covid19-label"><?php echo esc_html($params['label_confirmed']); ?></span>
		</div>
		<div class="covid19-col covid19-deaths">
			<span class="covid19-value"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></span>
			<span class="covid19-label"><?php echo esc_html($params['label_deaths']); ?></span>
		</div>
		<div class="covid19-col covid19-recovered">
			<span class="covid19-value"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></span>
			<span class="covid19-label"><?php echo esc_html($params['label_recovered']); ?></span>
		</div>
	</div>
</div>