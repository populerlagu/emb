<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $title;?></title>
<meta name="google-site-verification" content="qsC-BSoCmJNK_1U5sAtjMR2_9tHEHFDUpaHtCiPtF8E" />
<meta name="description" content="<?php echo $description;?>"/>
<meta name="keywords" content="<?php echo $keywords;?>"/>
<meta name="revisit-after" content="1 days" />
<meta name="robots" content="index, follow" />
<meta content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0" name="viewport"/>
<meta name="author" content="<?php echo $author;?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta name="google" content="notranslate" />
<meta property="fb:app_id" name="fb:app_id" content="226875977396331"/>
<meta property="og:title" content="<?php echo $title;?>" />
<meta property="og:type" content="website" />
<meta property="og:url" content="<?php echo $domain;?>" />
<meta property="og:site_name" content="Dewa Musik" />
<meta property="og:description" content="<?php echo $description;?>" />
<link rel="shortcut icon" href="/favicon.ico" />
<link href='//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css' rel='stylesheet'/>
<style type="text/css">
body{background:#eee;color:#222;font-family:"Trebuchet MS",Arial,Helvetica,sans-serif;font-size:15px;}a:link,a:visited{color:#0087ff;text-decoration:none;outline:none}a:hover{color:#0e1eea;text-decoration:underline}a:active{color:#ff5ca5;text-decoration:none}#wrapper{background:#fff;border:1px solid #ddd;margin:0 auto;padding:0;max-width:780px}#header{margin:5px;padding:0;border-bottom:2px solid #0087ff;text-align:center}#header h2,h1{font-size:25px;margin:4px;padding:4px;}#footer{margin:5px;padding:5px;border-top:1px solid #ddd;text-align:center}.maincontent{margin:0 5px 5px 5px;padding:5px;border:1px solid #ddd;}h3.headmenu,h1.headmenu{background:#111010;margin:5px 5px 0 5px;padding:5px;border-bottom:3px solid #60acea;color:#ddd;font-size:18px;}.items{border-bottom:1px solid #ddd;padding:5px;margin-botton:5px;}.thumbnail{float:left;margin-right:10px;padding:5px}h2.itemslist{font-weight:normal;font-size:15px;margin:0;padding:0;}.searchContForm{width:100%;padding:2px;text-align:center}#searchbox{height:35px}.search{padding:5px 9px;height:20px;width:70%;}.submit{height:33px;width:10%;color:#fff;background:#60acea;border:none}.submit:hover{background-color:#6fb6e0}.download{background:#0087ff;padding:5px;margin:5px;}a.download{color:white}.lihat{border-left:6px solid #e60d0d;padding:4px;background:#c5c5c5;color:#030117;}
#menu{background:#454545;color:#eee;height:30px}
#menu ul,#menu li{margin:0;padding:0;list-style:none}
#menu ul{height:30px}
#menu li{float:left;display:inline;position:relative;font:bold 12px Arial;text-shadow:0 -1px 0 #000;text-transform:uppercase}
#menu li:first-child{border-left:none}
#menu a{display:block;line-height:30px;padding:0 14px;text-decoration:none;color:#eee}
#menu li:hover > a,#menu li a:hover{background:#3b5998}
#menu input{display:none;margin:0;padding:0;width:80px;height:30px;opacity:0;cursor:pointer}
#menu label{font:bold 30px Arial;display:none;width:30px;height:31px;line-height:31px;text-align:center}
#menu label span{font-size:12px;position:absolute;left:35px}
#menu ul.menus{height:auto;overflow:hidden;width:180px;background:#3b5998;position:absolute;z-index:99;display:none;border:0}
#menu ul.menus li{display:block;width:100%;font:12px Arial;text-transform:none;border-bottom:1px solid #f9f9f9}
#menu li:hover ul.menus{display:block}
#menu a.prett{padding:0 27px 0 14px}
#menu a.prett::after{content:"";width:0;height:0;border-width:6px 5px;border-style:solid;border-color:#eee transparent transparent;position:absolute;top:15px;right:9px}
#menu ul.menus a:hover{background:#333}
#menu a.home{background:#c00}

@media screen and (max-width:612px){#menu{position:relative;margin:0}#menu ul{background:#111;position:absolute;top:100%;right:0;left:0;z-index:3;height:auto;display:none}#menu ul.menus{width:100%;position:static;padding-left:20px}#menu li{display:block;float:none;width:auto}#menu input,#menu label{position:absolute;top:0;left:0;display:block}#menu input{z-index:4}#menu input:checked + label{color:#fff}#menu input:checked ~ ul{display:block}
</style>
<?php if($indihome){ ?>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<script type="text/JavaScript">
(function($)
{
    $(document).ready(function()
    {
        $.ajaxSetup(
        {
            cache: false,
            beforeSend: function() {
                $('#content').hide();
                $('#loading').show();
            },
            complete: function() {
                $('#loading').hide();
                $('#content').show();
            },
            success: function() {
                $('#loading').hide();
                $('#content').show();
            }
        });
        var $container = $("#content");
        $container.load("en.php");
        var refreshId = setInterval(function()
        {
            $container.load('en.php');
        }, 10000);
    });
})(jQuery);
</script> 
<?php } ?>
<body>
<div id="wrapper">
<div id="header">
	<?php if($indihome){ ?>
		<h1><a href="<?php echo $domain;?>" title="<?php echo $sitetitle;?>"><?php echo strtoupper($sitetitle);?></a></h1>
	<?php  } else { ?>
		<h2><a href="<?php echo $domain;?>" title="<?php echo $sitetitle;?>"><?php echo strtoupper($sitetitle);?></a></h2>
	<?php } ?>
	<div style="margin: 0 0 10px 0;"><?php echo $shortdes;?></div>
<nav id="menu">
<input type="checkbox">
<label>≡<span>Navigation</span></label>
<ul>
<li><a class="<?php echo $sitetitle;?>" href="<?php echo $domain;?>/"><i class="fa fa-home"></i> Home</a></li>
<li><a title="Kumpulan Mp3 Pop Indo terbaru" href="/kumpulan-mp3-pop-indo.html">Pop Indo</a>
	<ul class='menus'>
		<li><a title="Lagu Ost Mp3" href="/kumpulan-mp3-lagu-ost-mp3.html" style="float: left;font-size: 13px;">Lagu Ost Mp3</a></li>     
		<li><a title="Lagu Kenangan" href="/kumpulan-mp3-lagu-kenangan.html" style="float: left;font-size: 13px;">Lagu Kenangan</a></li>
	</ul>
	</li>
<li><a title="Kumpulan Mp3 Lagu Barat" href="/kumpulan-mp3-lagu-barat.html">Barat</a></li>
<li><a title="Kumpulan Mp3 Dangdut Koplo" href="/kumpulan-mp3-dangdut-koplo.html" >Dangdut Koplo</a>
	<ul class='menus'>
		<li><a title="New Pallapa" href="/kumpulan-mp3-new-pallapa.html" style="float: left;font-size: 13px;">New Pallapa</a></li>
		<li><a title="Om Adella" href="/kumpulan-mp3-om-adella.html" style="float: left;font-size: 13px;">Om Adella</a></li>
		<li><a title="Om Sera" href="/kumpulan-mp3-om-sera.html" style="float: left;font-size: 13px;">Om Sera</a></li>
		<li><a title="Om Monata" href="/kumpulan-mp3-om-monata.html" style="float: left;font-size: 13px;">Om Monata</a></li>
		<li><a title="Lagista" href="/kumpulan-mp3-lagista.html" style="float: left;font-size: 13px;">Lagista</a></li>  
		<li><a title="The Rosta" href="/kumpulan-mp3-the-rosta.html" style="float: left;font-size: 13px;">The Rosta</a></li>  
	</ul>
	</li>
<li><a title="Kumpulan Mp3 Religi" href="/kumpulan-mp3-lagu-religi.html">Religi</a>
	<ul class='menus'>
		<li><a title="Sholawat Religi" href="/kumpulan-mp3-lagu-sholawat.html" style="float: left;font-size: 13px;">Sholawat Religi</a></li>
		<li><a title="Nasyid Religi" href="/kumpulan-mp3-lagu-nasyid.html" style="float: left;font-size: 13px;">Nasyid Religi</a></li>
		<li><a title="Qosidah Religi" href="/kumpulan-mp3-lagu-qosidah.html" style="float: left;font-size: 13px;">Qosidah Religi</a></li>
		<li><a title="Indo Religi" href="/kumpulan-mp3-lagu-religi-indo.html" style="float: left;font-size: 13px;">Indo Religi</a></li>
	</ul>
	</li>
<li><a title="Kumpulan Mp3 Lagu Daerah" href="/kumpulan-mp3-lagu-daerah.html">Lagu Daerah</a></li>
<li><a title="Kumpulan Mp3 Lagu K-pop" href="/kumpulan-mp3-1thek.html">K-pop</a></li>
<li><a target="_blank" href="/sitemap2.xml">Sitemap</a></li>
</ul>
</nav>
</div>

<div class="searchContForm">
	<form id="searchbox" method="GET" action="/search.php">
	<input class="search" type="text" name="q" value="<?php echo fixed($term);?>" placeholder="Cari Lagu Favorit Anda Di Sini">
	<input class="submit" type="submit" value="GO">
	</form>
</div>
<div>
<?php //include 'iklan/rh1.php';?>
</div>