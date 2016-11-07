<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: forum_collection.php 28448 2012-03-01 03:27:53Z chenmengshu $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$appads = DB::fetch_all("SELECT * FROM " .DB::table('common_advertisement')." where type='custom'");
foreach($appads as $k=>$v){
		$parameters = dunserialize($v['parameters']);
		if($parameters['extra']['customid']!=2){
			unset($appads[$k]);  	
		}
		
		
}

$adscount=count($appads);

include template('forum/appad');


?>