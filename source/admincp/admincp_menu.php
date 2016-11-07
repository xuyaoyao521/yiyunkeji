<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: admincp_menu.php 34521 2014-05-14 09:07:25Z nemohou $
 */

global $_G;
if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

$isfounder = isset($isfounder) ? $isfounder : isfounder();

$topmenu = $menu = array();

$topmenu = array (
	'index' => '',
	'global' => '',
	'topic' => '',
	'APP' => '',
	'user' => '',
	
);

$menu['index'] = array(
	array('menu_home', 'index'),
	
	
);

$custommenu = get_custommenu();
$menu['index'] = array_merge($menu['index'], $custommenu);

$menu['global'] = array(
	
	array("站点", '', 1),
		
		array('menu_block', 'block'),
		array('门户板块管理', 'forums'),
		array('论坛板块管理', 'forums_for'),
		array('menu_setting_basic', 'setting_basic'),
		array('menu_setting_seo', 'setting_seo'),
		array('menu_setting_domain', 'domain'),
		array('menu_setting_user', 'setting_permissions'),
		array('menu_setting_antitheft', 'setting_antitheft'),
		array('防灌水', 'setting_sec'),
		array('menu_tools_updatecaches', 'tools_updatecache'),
		array('menu_tools_updatecounters', 'counter'),
	array("站点", '', 2),
	array("其他", '', 1),
		array('menu_posting_smilies', 'smilies'),
		array('menu_thread_stamp', 'misc_stamp'),
	array("其他", '', 2),
);

$menu['style'] = array(
	

	
	
);

$menu['topic'] = array(
	//array('menu_moderate_posts', 'moderate'),
	array('menu_posting_censors', 'misc_censor'),
	array('menu_maint_report', 'report'),
	array('menu_setting_tag', 'tag'),
	array('用户反馈', 'feedback'),
	array(cplang('nav_portal'), '', 1),
		array('新增门户主题', 'threadsadd'),
		array('menu_maint_threads_prtal', 'threads'),
		array('门户批量删除', 'prune'),
		array('menu_maint_attaches_prtal', 'attach'),
	array(cplang('nav_portal'), '', 2),
	array(cplang('nav_forum'), '', 1),
		array('menu_maint_threads', 'threads_for'),
		array('menu_maint_prune', 'prune_for'),
		array('menu_maint_attaches', 'attach_for'),
	array(cplang('nav_forum'), '', 2),
	
	array(cplang('thread'), '', 1),
    		array('menu_moderate_recyclebin', 'recyclebin'),
		array('menu_moderate_recyclebinpost', 'recyclebinpost'),
		
	array(cplang('thread'), '', 2),
	
	
);

$menu['user'] = array(
array('menu_members_add', 'members_add'),
	array('menu_members_edit', 'members_search'),
	
	
	array('menu_members_newsletter', 'members_newsletter'),

	
	array('menu_members_edit_ban_user', 'members_ban'),
	array('menu_members_ipban', 'members_ipban'),
	
	
	array('menu_admingroups', 'admingroup'),
	array('menu_usergroups', 'usergroups'),
	
	
);

if(is_array($_G['setting']['verify'])) {
	foreach($_G['setting']['verify'] as $vid => $verify) {
		if($vid != 7 && $verify['available']) {
			$menu['user'][] = array($verify['title'], "verify_verify_$vid");
		}
	}
}





$menu['APP'] = array(
	array('广告管理', 'adv'),
	array('消息推送', 'push'),
	
);



if(file_exists($menudir = DISCUZ_ROOT.'./source/admincp/menu')) {
	$adminextend = $adminextendnew = array();
	if(file_exists($adminextendfile = DISCUZ_ROOT.'./data/sysdata/cache_adminextend.php')) {
		@include $adminextendfile;
	}
	$menudirhandle = dir($menudir);
	while($entry = $menudirhandle->read()) {
		if(!in_array($entry, array('.', '..')) && preg_match("/^menu\_([\w\.]+)$/", $entry, $entryr) && substr($entry, -4) == '.php' && strlen($entry) < 30 && is_file($menudir.'/'.$entry)) {
			@include_once $menudir.'/'.$entry;
			$adminextendnew[] = $entryr[1];
		}
	}
	if($adminextend != $adminextendnew) {
		@unlink($adminextendfile);
		if($adminextendnew) {
			require_once libfile('function/cache');
			writetocache('adminextend', getcachevars(array('adminextend' => $adminextendnew)));
		}
		unset($_G['lang']['admincp']);
	}
}


loadcache('adminmenu');




if($isfounder) {
	$topmenu['founder'] = '';

	$menu['founder'] = array(
		array('menu_founder_perm', 'founder_perm'),
		
		

	);

	$menu['uc'] = array();
}

if(!isfounder() && !isset($GLOBALS['admincp']->perms['all'])) {
	$menunew = $menu;
	foreach($menu as $topkey => $datas) {
		if($topkey == 'index') {
			continue;
		}
		$itemexists = 0;
		foreach($datas as $key => $data) {
			if(array_key_exists($data[1], $GLOBALS['admincp']->perms)) {
				$itemexists = 1;
			} else {
				unset($menunew[$topkey][$key]);
			}
		}
		if(!$itemexists) {
			unset($topmenu[$topkey]);
			unset($menunew[$topkey]);
		}
	}
	$menu = $menunew;
}

?>