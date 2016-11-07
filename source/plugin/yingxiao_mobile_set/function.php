<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

//输出文件
function file_put_php($cachefile, $arraylist) {	
	@file_put_contents( $cachefile, "<?php\nreturn " . var_export($arraylist, true) . ";" );
}
//导入文件
function file_get_php($cachefile) {	
	if(file_exists($cachefile)){
		$arraylist = include($cachefile);
	}
	
	return $arraylist;
}
//编码
function array_iconv($in_charset,$out_charset,$arr){    
	return eval('return '.iconv($in_charset,$out_charset,var_export($arr,true).';'));    
} 

function updateimg($key, $value) {
	global $_G;
	if($_FILES[$key]) {
		$upload = new discuz_upload();
		if($upload->init($_FILES[$key], 'common') && $upload->save(1)) {
			$value[$key] = (!strstr($_G['setting']['attachurl'], '://') ? $_G['siteurl'] : '').$_G['setting']['attachurl'].'common/'.$upload->attach['attachment'];
		}
	} else {
		$value[$key] = !empty($_GET[$key]) ? trim($_GET[$key]) : "";
	}
	return $value;
}

?>