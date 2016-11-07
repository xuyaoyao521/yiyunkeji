<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
function array_iconv($in_charset,$out_charset,$arr){    
	return eval('return '.iconv($in_charset,$out_charset,var_export($arr,true).';'));    
} 

$tablename = DB::table ( 'yingxiao_mobile_set_lang' );
$sql = <<<EOF
DROP TABLE IF EXISTS `{$tablename}`;
CREATE TABLE IF NOT EXISTS `{$tablename}` (
  `langid` int(11) NOT NULL AUTO_INCREMENT,
  `langvar` varchar(128) NOT NULL,
  `langstr`  varchar(128) DEFAULT NULL,
  PRIMARY KEY (`langid`)
);

EOF;
runquery($sql);

$version = $_G['setting']['plugins']['version']['yingxiao_mobile_set'];
	$file = "./template/mobile/toutiao_mobile/lang.php";
	$fc = file_get_contents( $file );
	
	$fcs = explode("array(", $fc);
	$fcs = explode(");", $fcs[1]);
	$fcs = explode("\n", $fcs[0]);
	$mlang = array();
	foreach($fcs as $query) {
		$item = explode("=>", $query);
		$item[1] = explode("',", $item[1]);
		$item[0] = trim(str_replace("'", "", $item[0]));
		$item[1] = trim(str_replace("'", "", $item[1][0]));
		if($item[0]) {
			$mlang[$item[0]] = $item[1];
		}
	}
//print_r($mlang);die();
	unset($fc);
	unset($fcs);
	
	$cachefile = "./source/plugin/yingxiao_mobile_set/cache/lang.php";
	$plang = include($cachefile);
	
	if(count($mlang) >= count($plang)) {
		foreach($mlang as $key => $la) {
			if(CHARSET =='gbk'){
				$la = $la;
				$plang[$key] = $plang[$key];
			}else{
				$la = diconv($la,'GBK',CHARSET);
				$plang[$key] = diconv($plang[$key],'GBK',CHARSET);
			}
	
			if($plang[$key] != $la) {
				$plang[$key] = $la;	
			}
		}
	}
	else {
		foreach($plang as $key => $la) {
			if(CHARSET =='gbk'){
				$plang[$key] = $la;
				$mlang[$key] = $mlang[$key];
			}else{
				$plang[$key] = diconv($la,'GBK',CHARSET);
				$mlang[$key] = diconv($mlang[$key],'GBK',CHARSET);
			}
	
			if($mlang[$key] && $mlang[$key] != $la) {
				$plang[$key] = $mlang[$key];	
			}
		}
	}
	
	
	foreach($plang as $key => $la) {
		$sql = "INSERT INTO " .$tablename. "(langvar,langstr) VALUES('".$key."','".$la."')";
		DB::query($sql);
	}
	//$plang = array_iconv('utf-8','gbk',$plang);
	$cachefile = "./source/plugin/yingxiao_mobile_set/cache/lang.php";
	@file_put_contents( $cachefile, "<?php\nreturn " . var_export($plang, true) . ";" );
	unset($mlang);
	unset($plang);

/*
$tablename = DB::table ( 'yingxiao_mobile_set_style' );
$sql = <<<EOF
DROP TABLE IF EXISTS `{$tablename}`;
CREATE TABLE `{$tablename}` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `sname` varchar(18) NOT NULL,
  `isopen` int(1) NOT NULL DEFAULT '0',
  `htmlbg` varchar(7) DEFAULT NULL,
  `isopen` varchar(1024) DEFAULT NULL,
  `smenuorder` varchar(7) DEFAULT NULL,
  `smenulogo` varchar(7) DEFAULT NULL,
  `boxbg` varchar(7) DEFAULT NULL,
  `buttonbg` varchar(7) DEFAULT NULL,
  `buttontext` varchar(7) DEFAULT NULL,
  `selectbg` varchar(7) DEFAULT NULL,
  `selecttext` varchar(7) DEFAULT NULL,
  `userinfobg` varchar(7) DEFAULT NULL,
  `userinfobgimg` varchar(1024) DEFAULT NULL,
  `loginbg` varchar(7) DEFAULT NULL,
  `loginbgimg` varchar(1024) DEFAULT NULL,
  `btoolbg` varchar(7) DEFAULT NULL,
  `btooltext` varchar(7) DEFAULT NULL,
  `btooltexthover` varchar(7) DEFAULT NULL,
  `html_style` TEXT,
  `btool_style` TEXT,
  PRIMARY KEY (`smid`)
);

EOF;
runquery($sql);


$tablename = DB::table ( 'yingxiao_mobile_set_sidemenus' );
$sql = <<<EOF
DROP TABLE IF EXISTS `{$tablename}`;
CREATE TABLE `{$tablename}` (
  `smid` int(11) NOT NULL AUTO_INCREMENT,
  `smenuname` varchar(18) NOT NULL,
  `smenuurl` varchar(1024) NOT NULL,
  `smenulogo` varchar(10) DEFAULT NULL,
  `smenuorder` int(2) NOT NULL DEFAULT '0',
  `isopen` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`smid`)
);

EOF;
runquery($sql);
*/
$finish = TRUE;
?>