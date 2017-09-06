<?php
$yasifun = 'http://uyeshare.com/site_lagu-dangdut.xhtml';
$content = file_get_contents($yasifun);
preg_match_all('#">([^>]+).mp3<\/a>\<hr alt="" />#i', $content, $ganteng);

// highlight_string(print_r($ganteng, true));
// unset($ganteng[0]);

foreach ($ganteng[1] as $sipun){
	$sipuntamvan = str_replace(" ", "-", $sipun);
	$sipuntamvan = str_replace("---", "-", $sipuntamvan);
	$sipuntamvan = strtolower($sipuntamvan);
	
	echo '<h2 class="itemslist" style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><a href="http://planetlagu.sangkarlagump3.asia/unduh-mp3-'.$sipuntamvan.'.html">'.$sipun.'</a></h2>
	<div style="display:block;height:6px;border-bottom:1px solid #DDD;"></div>
	<div style="display:block;height:6px;"></div>';

}
?>