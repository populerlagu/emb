<?php 
include 'setting.php';
if($_GET['q']){
	header('Location: /unduh-mp3-'.url_slug($_GET['q']).'.html');
		exit;
}