<?php 
include 'setting.php';
$term = rawurlencode($_GET['search']);
if(!empty($_GET['page'])){
	$source = 'https://www.googleapis.com/youtube/v3/search?part=snippet&type=video&pageToken='.$_GET['page'].'&q='.$term.'&maxResults=10&videoCategoryId=10&key='.$apikey;
} else {
	$source ='https://www.googleapis.com/youtube/v3/search?part=snippet&type=video&q='.$term.'&maxResults=10&key='.$apikey;
}

$zafa = array( //start random proxy
	 'https://www.websurf.in/browse.php?u='.urlencode($source), 
	// 'https://webproxy.stealthy.co/browse.php?u='.urlencode($source),
	// 'http://helloproxy.in/browse.php?u='.urlencode($source),
	// 'http://www.whatblock.com/browse.php?u='.urlencode($source),
	// 'http://www.predecessor.info/browse.php?u='.urlencode($source),
	// 'http://fishproxy.com/fish.php?u='.urlencode($source),
	// 'https://byproxyserver.info/browse.php?u='.urlencode($source),xx
	// 'http://vivome.xyz/index.php?q='.base64_encode($source),
	// 'http://www.proxy2019.top/index.php?q='.base64_encode($source),
	// 'http://abuomarlive.net/index.php?q='.base64_encode($source),
	// 'http://unproxy.gq/index.php?q='.base64_encode($source),
); //end random

$indy   = $zafa[array_rand($zafa)];
// echo $indy;
$json = json_decode(get_contents($indy));

$totalResults = $json->pageInfo->totalResults;
	if(!empty($json->items)) {
		$vidlist = array();
		foreach($json->items as $item) $vidlist[] = $item->id->videoId;
		$source2 = file_get_contents('https://www.googleapis.com/youtube/v3/videos?part=contentDetails,statistics&id='.join(',', $vidlist).'&key='.$apikey);
		$json2 = json_decode($source2);
		foreach($json2->items as $k=>$item) {
			$json->items[$k]->contentDetails = $item->contentDetails;
			$json->items[$k]->statistics = $item->statistics;
		}
	}
//start meta
$title 		= 'Download lagu '.fixed($term).' Mp3 Video - '.$sitetitle;
$keywords 	= 'Download lagu mp3 '.fixed($term).' Gratis, Download, Lagu, unduh, song, musik, pop indo, kpop, dangdut koplo, campursari, hip hop, reggae, sholawat, qasidah';
$description= 'Download lagu '.fixed($term).' as mp3 or video 3gp, mp4, flv, Hd dengan kualitas terbaik di situs '.$domain;
$author 	= 'Ainun Abdullah';
include 'header.php';	
?>
<h1 class="headmenu">Download <?php echo fixed($term); ?> Mp3 / Video</h1>
<div class="maincontent">
<p style="text-align:center;border-bottom:1px solid #222;margin:5px;padding:5px">
Download dan Streaming  <strong><?php echo fixed($term); ?></strong> Music Online on Website <?php echo $domain;?> Just For Review, For Get Most Quality Contents Of Music or Video Hd Please Buy Original Cassete / VCD / On The Store or Buy the Music Files of <strong><?php echo fixed($term); ?></strong> on Amazone or I-tunes.
</p>

<?php //include "iklan/ads.php";?>

<?php 
foreach($json->items as $hasil) {
	$name 			= ucwords(strtolower(strip_tags($hasil->snippet->title)));
	$description 	= ucwords(strtolower($hasil->snippet->description));
	$tokenpage 		= $json->nextPageToken;
	$id 			= $hasil->id->videoId;
	$duration 		= durationYT($hasil->contentDetails->duration);
	$size			= size($hasil->contentDetails->duration);
	$tgl 			= $hasil->snippet->publishedAt;
	$view 			= $hasil->statistics->viewCount;
	$date 			= dateYt($tgl);
	$cover			='https://img.youtube.com/vi/'.$id.'/default.jpg';
	$mama++;
		$x++;
		if($id) {
	?> 
	<div class="items"> 
		<img width="120" height="90" class="thumbnail" title="<?php echo $name;?>" alt="<?php echo $name;?>" src="<?php echo $cover;?>">
		<span style="margin-top:5px;padding:0">
			<h2 class="itemslist"><a title="<?php echo $name;?>" rel="bookmark" href="<?php echo $domain;?>/unduh-mp3-<?php echo url_slug($name)?>.html"><?php echo $name;?></a></h2>
				<p style="padding:2px;margin:0">Size : <?php echo $size;?></p>				
				<p style="padding:2px;margin:0">Duration: <?php echo $duration;?></p>
				<p style="padding:2px;margin:0">Hits : <?php echo $view;?> Views </p>
				<p style="display:none;padding:2px;margin:0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><?php echo $description;?></p><br />
				<p style="padding:2px;margin:0;float:right"><a class="download" rel="bookmark" href="<?php echo $domain;?>/unduh/watch?v=<?php echo $id?>"><i class="fa fa-download"></i> DOWNLOAD MP3 & VIDEO</a></p>
			<span>  
			<div style="clear:both"></div>
			</span>
		</span>
		
	<?php if($mama == 1) { ?>
		<?php //include "iklan/adsense.php";?>
	<?php } ?>
		
	<?php if($mama == 4) { ?>
		<?php //include "iklan/adsense.php";?>
	<?php } ?>
	
	<?php if($mama == 7) { ?>
		<?php //include "iklan/adsense.php";?>
	<?php } ?>

	</div>
<?php
		}
	} // end foreach ?>
</div><!--end maincontent-->

<?php include 'da4.php';?>

<?php	
// highlight_string(print_r($json,true))
?>
<?php
$tagsearch = rawurldecode($term);
$tagsearch = str_replace('-',' ', $tagsearch);
if (strlen($tagsearch) > 7) {
$div = "|#|";
$dat='zlast.txt';

$fp=fopen($dat, 'r');
$count=fgets($fp);
fclose($fp);
$cari = $tagsearch;
$data = explode($div, $count);
if (in_array($cari, $data)) {
$tulis = implode($div, $data);
$hit=$tulis;
}
else {
$data = explode($div, $count);
$tulis = $data[1].''.$div.''.$data[2].''.$div.''.$data[3].''.$div.''.$data[4].''.$div.''.$data[5].''.$div.''.$data[6].''.$div.''.$data[7].''.$div.''.$data[8].''.$div.''.$data[9].''.$div.''.$data[10].''.$div.''.$data[11].''.$div.''.$data[12].''.$div.''.$data[13].''.$div.''.$data[14].''.$div.''.$data[15].''.$div.''.$data[16].''.$div.''.$data[17].''.$div.''.$data[18].''.$div.''.$data[19].''.$div.''.$data[20].''.$div.''.$data[21].''.$div.''.$data[22].''.$div.''.$data[23].''.$div.''.$data[24].''.$div.''.$data[25].''.$div.''.$data[26].''.$div.''.$data[27].''.$div.''.$data[28].''.$div.''.$data[29].''.$div.''.$data[30].''.$div;
$tulis .= $cari;
$hit = $tulis;
}
$masuk=fopen($dat, 'w');
fwrite($masuk,$tulis);
fclose($masuk);
}
?>
<h3 class="headmenu">Most Trending Search Today</h3>
<div class="maincontent">
<?php
$divda = "|#|";
$datda='zlast.txt';
$fada=fopen($datda, 'r');
$bda=fgets($fada);
fclose($fada);
$cda = explode($divda, $bda);
$eda = str_replace('  ',' ',$cda);
	foreach(array_reverse($eda) as $dda){
		if($dda) {
		$arr [] = '<a href="'.$domain.'/unduh-mp3-'.url_slug($dda).'.html">'.ucwords(strtolower($dda)).'</a>'; 
		}
	} 
	echo join(' | ', $arr);
?>
</div>
<?php include 'footer.php';?>	