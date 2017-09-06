<?php 
$indihome = 'bismillah';
include 'setting.php';


//start meta	
if($_GET['page']){
	$title = $sitetitle.' - Page '.$pag.' - '.$shortdes;
} else {
$title 		= $sitetitle.' - '.$shortdes;
}
$keywords 	= 'Download, Lagu, unduh, song, musik, mp3, video, pop indo, k-pop, j-pop, v-pop, dangdut koplo, campursari, hip hop, reggae, sholawat, qasidah';
$description= 'http://planetlagu.sangkarlagump3.asia adalah tempat untuk download kumpulan lagu dan video mp3 terpopuler dan terbaru di situs youtube.com';
$author 	= 'Ainun Abdullah';

// highlight_string(print_r($items,true));
include  'header.php';
?>

<div class="maincontent">
<div style="text-align:center">

<p>Selamat datang di situs pencarian musik terpercaya <?php echo $domain;?>. situs ini memudahkan anda mencari lagu lokal maupun mancanegara favorit yang anda inginkan dengan mudah melaluai Hp maupun Pc anda.</p>
<p>Semua Lagu Yang Ada di situs ini semata mata hanyalah untuk review / mempromosikan lagu dari artis / management produksi musik tersebut</p>

<p><strong>PENTING:</strong> SEMUA LAGU YANG ADA DI SITUS KAMI TIDAK TERSIMPAN DI DATABASE KAMI MELAINKAN BERSUMBER DARI PENCARIAN MUSIK TERPERCAYA <strong><a title="YouTube.com" href="https://www.youtube.com">YouTube.com</a></strong>.</p>

<p><strong>DMCA:</strong> DMCA request silahkan hubungi kami di <?php echo $email;?>.</p>

</div>
</div>

<h3 class="headmenu">Lagu Dangdut Populer</h3>
<div class="maincontent">
<?php include 'new-pallapa.php';?>
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