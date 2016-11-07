<?php
function tplhtmlcode( $k, $v )
{
		$file = "./source/plugin/yingxiao_mobile_set/template/touch/".$k.".htm";
		$fc = file_get_contents( $file );
		if ( $v != $fc )
		{
				file_put_contents( $file, $v );
		}
		include( template( "yingxiao_mobile_set:".$k ) );
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
function reg_china_codeing($str)
{
	preg_match_all('/[\x{4e00}-\x{9fff}]+/u', $str, $matches);
	$str = join('', $matches[0]);
	return $str;
}
function microtime_float()
{
   list($usec, $sec) = explode(" ", microtime());
   return ((float)$usec + (float)$sec);
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
?>
