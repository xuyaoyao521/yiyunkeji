<?php
function GetThreadPicList($getpiclist, $num, $w, $h, $type){
	$listarray = array();
	for ($i=0; $i<count($getpiclist); $i++)
	{
		$listarray[] = getforumimg($getpiclist[$i], '0', $w, $h, $type);
	}
	return $listarray;
}

function getDImplode($arr, $item)
{
    $num =  count($arr);
    $c = array();
    foreach ( $arr as $rw )
    {
        $c[] = $rw[$item];
    }
    return dimplode($c);
}

function reg_china_codeing($str)
{
	preg_match_all('/[\x{4e00}-\x{9fff}]+/u', $str, $matches);
	$str = join('', $matches[0]);
	return $str;
}
function file_get_php($cachefile) {	
	if(file_exists($cachefile)){
		$arraylist = include($cachefile);
	}
	
	return $arraylist;
}

function GetAdsList($text)
{
	$adslist = explode("\n", $text);
    $adsarray = array();
	foreach ($adslist as $ads) 
	{ 
        $arr = explode("|", $ads);
        $adsarray[$arr[0]] = array($arr[1], $arr[2]); 
	}
	return $adsarray;
}
?>
