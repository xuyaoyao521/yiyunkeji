<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: portal.php 33234 2013-05-08 04:13:19Z andyzheng $
 */

define('APPTYPEID', 4);
define('CURSCRIPT', 'portal');

require './source/class/class_core.php';

$discuz = C::app();

$cachelist = array('userapp', 'portalcategory', 'diytemplatenameportal');
$discuz->cachelist = $cachelist;
$discuz->init();


require './source/function/function_forum.php';

if(empty($_GET['mod']) || !in_array($_GET['mod'], array('list', 'view', 'comment', 'portalcp', 'topic', 'attachment', 'rss', 'block','feedback'))) $_GET['mod'] = 'index';



define('CURMODULE', $_GET['mod']);
runhooks();

$navtitle = str_replace('{bbname}', $_G['setting']['bbname'], $_G['setting']['seotitle']['portal']);
$_G['disabledwidthauto'] = 1;

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
$piclist = DB::fetch_all("SELECT tid,subject as title FROM " .DB::table('forum_thread')." where digest=1 and fid=41 order by lastpost desc limit 4");

foreach($piclist as $k=>$v){
	$piclist[$k]['piclist']=	DB::fetch_all("SELECT aid,tableid FROM " .DB::table('forum_attachment')." where tid=".$v['tid']);
	$piclist[$k]['picnum']=count($piclist[$k]['piclist']);
	foreach($piclist[$k]['piclist'] as $kk=>$vv){
			$piclist[$k]['piclist'][$kk]['attachment']=DB::result_first("SELECT attachment FROM " .DB::table('forum_attachment_'.$vv['tableid'])." where aid=".$vv['aid']);
	}
}

$videolist = DB::fetch_all("SELECT tid,subject as title FROM " .DB::table('forum_thread')." where digest=1 and fid=40 order by lastpost desc limit 4");
foreach($videolist as $k=>$v){
	$str=DB::result_first("SELECT value FROM " .DB::table('forum_typeoptionvar')." where tid=".$v['tid']." and optionid=9 ");
	$str=str_replace("\\", "", $str);
	$thumb=unserialize($str);
	$videolist[$k]['thumb']=$thumb['url'];
	$videolist[$k]['videotime']=DB::result_first("SELECT value FROM " .DB::table('forum_typeoptionvar')." where tid=".$v['tid']." and optionid=7 ");
	
}

$catid=$_GET['fid']?$_GET['fid']:0;

require_once libfile('portal/'.$_GET['mod'], 'module');



?>