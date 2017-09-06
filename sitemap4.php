<?php
include 'setting.php';
$date = date('Y-m-d');
$host=$_SERVER['HTTP_HOST'];
Header("Content-Type: application/xml; charset=UTF-8");
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
<url>
<loc>http://<?php echo $host;?></loc>
<changefreq>daily</changefreq>
<priority>1.0</priority>
</url>

		
<?php
$divda = "|#|";
$datda='koplo.txt';
$fada=fopen($datda, 'r');
$bda=fgets($fada);
fclose($fada);
$cda = explode($divda, $bda);
$eda = str_replace('  ',' ',$cda);

$eda = str_replace('&', '&amp;', $eda);
foreach(array_reverse($eda) as $dda){
$kaa = str_replace(' ','-',$dda);
$kaa = strtolower($kaa).'.html';
$kaa = str_replace('_.html','.html',$kaa);
 ?>

<url>
<loc>http://<?php echo $host;?>/unduh-mp3-<?php echo strtolower($kaa);?></loc>
<lastmod><?php echo $date;?></lastmod>
<changefreq>Monthly</changefreq>
<priority>0.8</priority></url>

<?php }
?>		
 </urlset>