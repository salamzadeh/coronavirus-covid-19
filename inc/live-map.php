<?php 
$all_options = get_option( 'covid19_options' );
$world_map = file_get_contents( plugin_dir_url(__FILE__).'../assets/img/world_map.svg');
?>



<div class="covid19_info <?php echo $all_options['cov_theme'];?>" style="font-family:<?php echo $all_options['cov_font'];?>">
<div class="header_covid19"><?php echo $all_options['cov_title'];?><br><p class="desc_covid19"><?php echo $all_options['cov_desc'];?></p></div>

    <section class="canvas">
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