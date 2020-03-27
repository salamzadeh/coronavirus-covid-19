<?php 
$all_options = get_option( 'covid19_options' );
?>
<div class="covid19-item covid19-theme-<?php echo esc_attr($params['theme'] ? $params['theme'] : 'default'); ?> covid19-<?php echo esc_attr($params['country'] ? 'country' : 'global'); ?> <?php echo esc_attr($params['darkmode'] ? 'darkmode' : ''); ?>" >
	<h4 class="covid19-title"><?php echo esc_html(isset($params['title']) ? $params['title'] : ''); ?></h4>
	<div class="covid19-row">
		<div class="covid19-col covid19-confirmed">
			<span class="covid19-value"><?php echo esc_html($data->cases); ?></span>
			<span class="covid19-label"><?php echo esc_html($params['label_confirmed']); ?></span>
		</div>
		<div class="covid19-col covid19-deaths">
			<span class="covid19-value"><?php echo esc_html($data->death); ?></span>
			<span class="covid19-label"><?php echo esc_html($params['label_deaths']); ?></span>
		</div>
		<div class="covid19-col covid19-recovered">
			<span class="covid19-value"><?php echo esc_html($data->recovered); ?></span>
			<span class="covid19-label"><?php echo esc_html($params['label_recovered']); ?></span>
		</div>
	</div>
</div>