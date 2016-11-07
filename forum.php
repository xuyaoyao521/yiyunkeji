<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: forum.php 33828 2013-08-20 02:29:32Z nemohou $
 */


define('APPTYPEID', 2);
define('CURSCRIPT', 'forum');



require './source/class/class_core.php';


require './source/function/function_forum.php';



$modarray = array('ajax','announcement','attachment','forumdisplay',
	'group','image','index','medal','misc','modcp','notice','post','redirect',
	'relatekw','relatethread','rss','topicadmin','trade','viewthread','tag','collection','guide','appad'
);

$modcachelist = array(
	'index'		=> array('announcements', 'onlinelist', 'forumlinks',
			'heats', 'historyposts', 'onlinerecord', 'userstats', 'diytemplatenameforum'),
	'forumdisplay'	=> array('smilies', 'announcements_forum', 'globalstick', 'forums',
			'onlinelist', 'forumstick', 'threadtable_info', 'threadtableids', 'stamps', 'diytemplatenameforum'),
	'viewthread'	=> array('smilies', 'smileytypes', 'forums', 'usergroups',
			'stamps', 'bbcodes', 'smilies',	'custominfo', 'groupicon', 'stamps',
			'threadtableids', 'threadtable_info', 'posttable_info', 'diytemplatenameforum'),
	'redirect'	=> array('threadtableids', 'threadtable_info', 'posttable_info'),
	'post'		=> array('bbcodes_display', 'bbcodes', 'smileycodes', 'smilies', 'smileytypes',
			'domainwhitelist', 'albumcategory'),
	'space'		=> array('fields_required', 'fields_optional', 'custominfo'),
	'group'		=> array('grouptype', 'diytemplatenamegroup'),
);

$mod = !in_array(C::app()->var['mod'], $modarray) ? 'index' : C::app()->var['mod'];

define('CURMODULE', $mod);
$cachelist = array();
if(isset($modcachelist[CURMODULE])) {
	$cachelist = $modcachelist[CURMODULE];

	$cachelist[] = 'plugin';
	$cachelist[] = 'pluginlanguage_system';
}
if(C::app()->var['mod'] == 'group') {
	$_G['basescript'] = 'group';
}

C::app()->cachelist = $cachelist;

C::app()->init();


loadforum();



set_rssauth();


runhooks();




$navtitle = str_replace('{bbname}', $_G['setting']['bbname'], $_G['setting']['seotitle']['forum']);
$_G['setting']['threadhidethreshold'] = 1;

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
}


if($_GET['mod']=='viewthread'&&$_GET['tid']){
		$_GET['fid']=DB::result_first("SELECT fid FROM " .DB::table('forum_thread')." where tid=".$_GET['tid']);	
}
foreach($menus as $k=>$v){
	if($v['fid']==$_GET['fid']&&!$_GET['mobile']){
		$_GET['ordertype']=1;
		break;	
	}	
}


$catid=$_GET['fid']?$_GET['fid']:0;

$piclist = DB::fetch_all("SELECT tid,subject as title FROM " .DB::table('forum_thread')." where displayorder>=0 and  digest=1 and fid=41 order by lastpost desc limit 5");

foreach($piclist as $k=>$v){
	$piclist[$k]['piclist']=	DB::fetch_all("SELECT aid,tableid FROM " .DB::table('forum_attachment')." where tid=".$v['tid']);
	$piclist[$k]['picnum']=count($piclist[$k]['piclist']);
	foreach($piclist[$k]['piclist'] as $kk=>$vv){
			$piclist[$k]['piclist'][$kk]['attachment']=DB::result_first("SELECT attachment FROM " .DB::table('forum_attachment_'.$vv['tableid'])." where aid=".$vv['aid']);
	}
}

if($_GET['tid']){
	$whereadd=" and tid!=".	$_GET['tid'];
}

$videolist = DB::fetch_all("SELECT tid,subject as title,dateline,authorid,author FROM " .DB::table('forum_thread')." where displayorder>=0 ".$whereadd." and  digest=1 and fid=40 order by dateline desc limit 5");
$whereadd="";
foreach($videolist as $k=>$v){
	$str=DB::result_first("SELECT value FROM " .DB::table('forum_typeoptionvar')." where tid=".$v['tid']." and optionid=9 ");
	$str=str_replace("\\", "", $str);
	$thumb=unserialize($str);
	$videolist[$k]['thumb']=$thumb['url'];
	$videolist[$k]['dateline']=dgmdate($v['dateline'], 'u', '9999', getglobal('setting/dateformat').' H:i:s');
	$videolist[$k]['videotime']=DB::result_first("SELECT value FROM " .DB::table('forum_typeoptionvar')." where  tid=".$v['tid']." and optionid=7 ");
	
}

require DISCUZ_ROOT.'./source/module/forum/forum_'.$mod.'.php';


?>