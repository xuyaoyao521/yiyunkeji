<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
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

$cachefile = "./source/plugin/yingxiao_mobile_set/cache/lang.php";
$m_lang = include($cachefile);
//print_r();die();
foreach($m_lang as $key => $la) {
	if(CHARSET =='gbk'){
		$la = $la;
	}else{
		$la = diconv($la,'GBK',CHARSET);
	}

	$sql = "INSERT INTO " .$tablename. "(langvar,langstr) VALUES('".$key."','".$la."')";
	DB::query($sql);
}


$finish = TRUE;
?>