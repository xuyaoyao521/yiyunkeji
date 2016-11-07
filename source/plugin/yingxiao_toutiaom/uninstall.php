<?php

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

$files = glob("data/cache/toutiaom_forum*.php");
for ($i=0; $i<count($files); $i++) { 
    @unlink($files[$i]); 
}
$files = glob("data/cache/toutiaom_portal*.php");
for ($i=0; $i<count($files); $i++) { 
    @unlink($files[$i]); 
}

$finish = TRUE;
?>