<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: home.php 32932 2013-03-25 06:53:01Z zhangguosheng $
 */

define('APPTYPEID', 1);
define('CURSCRIPT', 'home');

if(!empty($_GET['mod']) && ($_GET['mod'] == 'misc' || $_GET['mod'] == 'invite')) {
	define('ALLOWGUEST', 1);
}

require_once './source/class/class_core.php';

require_once './source/function/function_home.php';

$discuz = C::app();

$cachelist = array('magic','userapp','usergroups', 'diytemplatenamehome');
$discuz->cachelist = $cachelist;

$discuz->init();

$space = array();

$mod = getgpc('mod');
if(!in_array($mod, array('space', 'spacecp', 'misc', 'magic', 'editor', 'invite', 'task', 'medal', 'rss', 'follow','collection','dingyue','auther'))) {
	$mod = 'collection';
	$_GET['do'] = 'home';
}




if($mod == 'space' && ((empty($_GET['do']) || $_GET['do'] == 'index') && ($_G['inajax']))) {
	$_GET['do'] = 'profile';
}
$curmod = !empty($_G['setting']['followstatus']) && (empty($_GET['diy']) && empty($_GET['do']) && $mod == 'space' || $_GET['do'] == 'follow') ? 'follow' : $mod;
define('CURMODULE', $curmod);
runhooks($_GET['do'] == 'profile' && $_G['inajax'] ? 'card' : $_GET['do']);


$menus = DB::fetch_all("SELECT * FROM " .DB::table('forum_forum')." where fup=1");

if($_G['uid']){
$dycount=DB::result_first("SELECT count(*) FROM " .DB::table('froum_dingyue')."  where uid=".$_G['uid']);


$allcount=DB::result_first("SELECT count(f.favid) FROM " .DB::table('home_favorite')." as f inner join " .DB::table('forum_thread')." as t on f.id=t.tid where f.idtype='tid' and f.uid=".$_G['uid']);

$tiezicount=DB::result_first("SELECT count(tid) FROM " .DB::table('forum_thread')." where authorid=".$_G['uid']);

$announcepm  = 0;
		foreach(C::t('common_member_grouppm')->fetch_all_by_uid($_G['uid'], $filter == 'announcepm' ? 1 : 0) as $gpmid => $gpuser) {
			
			if($gpuser['status'] == 0) {
				$announcepm ++;
			}
		}
		loaducenter();
$newpmarr = uc_pm_checknew($_G['uid'], 1);
		$newpm = $newpmarr['newpm'];
		
$newpmcount = $newpm + $announcepm;	
$_G['member']['lastvisit']	=date("Y-m-d H:i:s");
}


require_once libfile('home/'.$mod, 'module');


?>