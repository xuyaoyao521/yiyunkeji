<?php
function GetThreadPicList($getpiclist, $num, $w, $h, $type){
	$listarray = array();
	for ($i=0; $i<$num; $i++)
	{
		$listarray[] = getforumimg($getpiclist[$i], '0', $w, $h, $type);
	}
	return $listarray;
}


?>
