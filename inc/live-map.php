<?php 
$all_options = get_option( 'covid19_options' );
$world_map = file_get_contents( plugin_dir_url(__FILE__).'../assets/img/world_map.svg');
?>



<div class="covid19_info <?php echo $all_options['cov_theme'];?>" style="font-family:<?php echo $all_options['cov_font'];?>">
<div class="header_covid19"><?php echo $all_options['cov_title'];?><br><p class="desc_covid19"><?php echo $all_options['cov_desc'];?></p>
<?php if(! $all_options['cov_map_top_widget_hide']) :
if($all_options["cov_scountry"] == "") $all_options["cov_scountry"] ="Total";
 ?>
	<div class="top_map_widget covid19-item" data-country="<?php echo esc_attr($all_options['country'] ? $all_options['country'] : 'total'); ?>" >
		<h4 class="covid19-title-big"><?php print $all_options["cov_scountry"] ?></h4>
		<div class="covid19-row">
			<div class="covid19-col covid19-confirmed">
				<div class="covid19-value"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div>
				<div class="covid19-title">Confirmed</div>
			</div>
			<div class="covid19-col covid19-deaths">
				<div class="covid19-value"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div>
				<div class="covid19-title">Deaths</div>
			</div>
			<div class="covid19-col covid19-recovered">
				<div class="covid19-value"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div>
				<div class="covid19-title">Recovered</div>
			</div>
		</div>
	</div>
<?php endif ?>
</div>

    <section class="canvas_map">
        <?php  print $world_map ?>
        <div id="tooltip"></div>
    </section>

    <footer class="footer_covid19">
        <div class="covid19_map_hint">
            <span>0</span>
            <span>&gt;&nbsp;10000</span>
        </div>
		<span class="copyright"> Developed by : <a href="https://salamzadeh.net">Salamzdeh.net </a></span>
    </footer>

</div>