<?php 
include 'setting.php';
$term = rawurlencode($_GET['list']);
$menutit = 'Kumpulan Lagu '.fixed($term);

if(!empty($_GET['page'])){
	$source = 'https://www.googleapis.com/youtube/v3/search?part=snippet&type=video&pageToken='.$_GET['page'].'&q='.$term.'&maxResults=10&videoCategoryId=10&order=date&key='.$apikey;
} else {
	$source ='https://www.googleapis.com/youtube/v3/search?part=snippet&type=video&q='.$term.'&order=date&videoDuration=any&maxResults=10&key='.$apikey;
}

$zafa = array( //start random proxy
	// 'http://www.unhideing.link/index.php?q='.base64_encode($source),
	'https://www.websurf.in/browse.php?u='.urlencode($source), 
	// 'https://webproxy.stealthy.co/browse.php?u='.urlencode($source),
	// 'http://helloproxy.in/browse.php?u='.urlencode($source),
	$source,
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
// highlight_string(print_r($json,true)); exit;
//start meta
$title 		= $menutit.' - '.$sitetitle;
$keywords 	= $menutit.' Gratis, Download, Lagu, unduh, song, musik, pop indo, kpop, dangdut koplo, campursari, hip hop, reggae, sholawat, qasidah';
$description= 'Download '.$menutit.' as mp3 or video 3gp, mp4, flv, m4a and last link update on '.$json->items[0]->snippet->publishedAt;
$author 	= 'Ainun Abdullah';
include 'header.php';	
?>
<h1 class="headmenu"><?php echo $menutit;?> Mp3 / Video</h1>
<div class="maincontent">
<p style="text-align:center;border-bottom:1px solid #222;margin:5px;padding:5px">
Download and Streaming <strong><?php echo $menutit; ?></strong> Mp3 Online on Website <?php echo $domain;?>. Dont Forget to Buy An Original Songs on I-Tunes or amazon.com
</p>
<?php 
foreach($json->items as $hasil) {
	$name 			= ucwords(strtolower(strip_tags($hasil->snippet->title)));
	$name 			= strip_tags($name);
	$name 			= str_ireplace('Window.location','',$name);
	$description 	= ucwords(strtolower($hasil->snippet->description));
	$tokenpage 		= $json->nextPageToken;
	$id 			= $hasil->id->videoId;
	$duration 		= durationYT($hasil->contentDetails->duration);
	$size			= size($hasil->contentDetails->duration);
	$tgl 			= $hasil->snippet->publishedAt;
	$view 			= $hasil->statistics->viewCount;
	$date 			= dateYt($tgl);
	$cover			='https://img.youtube.com/vi/'.$id.'/default.jpg';
		$x++;
		if($id) {
	?> 
	<div class="items"> 
		<img width="100" height="90" class="thumbnail" title="<?php echo $name;?>" alt="<?php echo $name;?>" src="<?php echo $cover;?>">
		<span style="margin-top:5px;padding:0">
			<h2 class="itemslist"><a title="<?php echo $name;?>" rel="alternate" href="/unduh-mp3-<?php echo url_slug($name)?>.html"><?php echo $name;?></a></h2>
				<p style="padding:2px;margin:0">Size : <?php echo $size;?></p>				
				<p style="padding:2px;margin:0">Duration: <?php echo $duration;?></p>
				<p style="padding:2px;margin:0">Hits : <?php echo $view;?> Views </p>
				<p style="padding:2px;margin:0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><?php echo $description;?></p>
				</p>

			<span>  
			<div style="clear:both"></div>
			</span>
		</span> 

	</div>
<?php
		}
	} // end foreach ?>
</div><!--end maincontent-->	
<?php	
// highlight_string(print_r($json,true))
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
<?php if($extreem == 'true'){ ?>
<h3 class="headmenu">Random Music K-Pop</h3>
<div class="maincontent">
<div id="content"></div>
<p id="loading">
Refresh Content........
</p>
</div>
<?php } ?>
<?php include 'footer.php';?>