<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: menu_cloud.php 25593 2011-11-15 10:56:04Z yexinhao $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$appService = Cloud::loadClass('Service_App');

$topmenu['cloud'] = '';

try {
	$cloudStatus = $appService->checkCloudStatus();
} catch (Cloud_Service_AppException $e) {
}
if ($cloudStatus == 'cloud') {
	
	$apps = $appService->getCloudApps();
	if(is_array($apps) && $apps) {
		foreach($apps as $app) {
			if($app['status'] != 'close') {
				array_push($menu['cloud'], array("menu_cloud_{$app['name']}", "cloud_{$app['name']}"));
			}
		}
	}

} else {
	if ($cloudStatus == 'upgrade') {
		$menuitem = 'menu_cloud_upgrade';
	} else {
		$menuitem = 'menu_cloud_open';
	}

	
}