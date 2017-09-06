<?php 
include 'setting.php';
$id 	= $_GET['v'];
$sing	= 'https://www.googleapis.com/youtube/v3/videos?part=snippet,contentDetails,statistics&id='.$_GET['v'].'&key='.$apikey;
$data 		= json_decode(get_contents($sing));
$judul		= fixed($data->items[0]->snippet->title);
$pub 		= dateYT($data->items[0]->snippet->publishedAt);
$description = $data->items[0]->snippet->description;
$channel 	= $data->items[0]->snippet->channelId;
$duration	= durationYT($data->items[0]->contentDetails->duration);
$size 		= size($data->items[0]->contentDetails->duration);
$user 		= ucwords(strtolower($data->items[0]->snippet->channelTitle));
$like 		= $data->items[0]->statistics->likeCount;
$play 		= $data->items[0]->statistics->viewCount;
$image 		= 'https://img.youtube.com/vi/'.$id.'/hqdefault.jpg';

$related = 'https://www.googleapis.com/youtube/v3/search?part=snippet&relatedToVideoId='.$_GET['v'].'&type=video&maxResults=10&key='.$apikey;
$jsonR 	 = json_decode(get_contents($related)); 
if(!empty($jsonR->items)) {
		$vidlist = array();
		foreach($jsonR->items as $item) $vidlist[] = $item->id->videoId;
		$source2 = file_get_contents('https://www.googleapis.com/youtube/v3/videos?part=contentDetails,statistics&id='.join(',', $vidlist).'&key='.$apikey);
		$json2 = json_decode($source2);
		foreach($json2->items as $k=>$item) {
			$jsonR->items[$k]->contentDetails = $item->contentDetails;
			$jsonR->items[$k]->statistics = $item->statistics;
		}
	}
	
	
//start meta
$title 		= '['.$size.'] Download Lagu '.$judul.' - '.$sitetitle;
$keywords 	= 'download, musik, lagu, '.$judul.' Gratis, Download, Lagu, unduh, song, musik, pop indo, kpop, dangdut koplo, campursari, hip hop, reggae, sholawat, qasidah';
$description= 'Download lagu '.$judul.' size ['.$size.'] durasi ['.$duration.'] as mp3 or video, this file upload on youtube by '.$user;
$author 	= $user;
include 'header.php';

?>
<h1 class="headmenu">Download Lagu <?php echo $judul;?></h1>

<?php //include "iklan/adsense.php";?> 

<div class="maincontent">
<img title="<?php echo $judul?>" width="100%" height="200px" src="<?php echo $image?>" alt="<?php echo $judul;?>">
<p style="border-bottom:1px solid #ddd;padding-bottom:5px;text-align:justify;">
Download Lagu <?php echo $judul;?> Mp3 di situs ini bisa anda dapatkan secara gratis, Tapi jangan lupa Bahwa semua lagu yang ada di situs ini semata mata hanyalah bertujuan untuk untuk review serta mempromosikan lagu tersebut, Untuk Mendapatkan Kualitas terbaik Lagu Ini Silahkan Membeli kaset / Vcd Original di Toko Toko Terdekat Di Kota Anda serta Menadikan Lagu dengan judul <u><?php echo $judul;?></u> sebagi I-Ring / Ringtones / Nada Sambung Pribadi Di Ponsel Anda Sebagai Bentuk Penghargaan kita kepada Artis Yang bersangkutan.
</p>

	<p class="lihat">
	LIHAT JUGA => <a rel="bookmark" href="/unduh/watch?v=<?php echo $jsonR->items[0]->id->videoId;?>"><?php echo $jsonR->items[0]->snippet->title;?></a>
	</p>
	

<p>
<h3 style="margin: 0;padding: 0;border-bottom: 1px solid #ddd;">DETAIL <?php echo strtoupper($judul) ?></h3>
<table>
<tbody>
<tr valign="top"><td>Title</td><td>:</td><td><a href="/search-mp3-<?php echo url_slug($judul);?>.html"><?php echo $judul ?></a></td></tr>
<tr><td>Size</td><td>:</td><td><?php echo $size ?></td></tr>
<tr><td>Duration</td><td>:</td><td><?php echo $duration ?></td></tr>
<tr><td>Hits</td><td>:</td><td><?php echo $play ?></td></tr>
<tr valign="top"><td>Author</td><td>:</td><td><?php echo $user ?></td></tr>
<tr><td>Sumber</td><td>:</td><td>https://www.youtube.com/watch?v=<?php echo $id ?></td></tr>

</tbody>
</table>
</p>

	<p class="lihat">
	LIHAT JUGA => <a href="/unduh/watch?v=<?php echo $jsonR->items[1]->id->videoId;?>"><?php echo $jsonR->items[1]->snippet->title;?></a>
	</p>
	
<p>
<h3 style="margin: 0;padding: 0;border-bottom: 1px solid #ddd;">DOWNLOAD / PLAY <?php echo strtoupper($judul) ?></h3>
<div style="margin:5px;padding:10px;text-align:center">

<?php //include "iklan/adsense.php";?>                  

<p><a class="download" rel="nofollow" target="_blank" href="http://www.youtubeinmp3.com/id/download/?video=https://www.youtube.com/watch?v=<?php echo $id;?>"><i class="fa fa-download"></i> DOWNLOAD MP3</a> 
<a class="download" onclick="playing()" title="play <?php echo $judul;?>" href="javascript:void(0);"><i class="fa fa-play"></i> PLAY VIDEO</a></p>

<?php //include "iklan/adsense.php";?>
</div>

<div id="play"></div>
<script>
function playing(){
	document.getElementById("play").innerHTML = '<iframe width="100%" height="230" src="http://www.youtube.com/embed/<?php echo $id;?>?feature=player_embedded&amp;autoplay=1&amp;rel=0&amp;fs=0&amp;theme=light&amp;showinfo=0&amp;hd=0&amp;autohide=0&amp;color=white" frameborder="0" allowfullscreen="0"></iframe>';
}
</script>
</p>

<p style="border:1px solid #ddd;text-align:center;padding:5px">
<?php echo nl2br($description);?>
</p>
 

<h3 style="margin: 0;padding: 0;border-bottom: 1px solid #ddd;">RELATED MUSIK <?php echo strtoupper($judul) ?></h3>
	<ul style="list-style-type:none;margin: 2px;"><?php include 'related.php';?></ul>
</div>


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