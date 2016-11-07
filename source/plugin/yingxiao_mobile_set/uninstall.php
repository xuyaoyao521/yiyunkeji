<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$tablename = DB::table('yingxiao_mobile_set_style');

$sql = <<<EOF
DROP TABLE IF EXISTS `{$tablename}`;
EOF;

runquery($sql);


$finish = TRUE;
?>