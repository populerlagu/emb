<?php 
// include 'setting.php';
foreach(array_slice($jsonR->items,2,6) as $value){
	$reltitle 	= fixed($value->snippet->title);
	$videoid 	= $value->id->videoId;
	$size	 	= size($value->contentDetails->duration);
?>
<li style="padding: 5px;margin-left: -2.5em;border-bottom: 1px dotted #ddd;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">[<?php echo $size;?>] <a title="<?php echo $reltitle;?>" href="/unduh/watch?v=<?php echo $videoid;?>"><?php echo $reltitle ?></a></li>
<?php }
?>