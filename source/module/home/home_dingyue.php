<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: home_space.php 33660 2013-07-29 07:51:05Z nemohou $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}




if(empty($_G['uid'])) {
	showmessage('login_before_enter_home', null, array(), array('showmsg' => true, 'login' => 1));
}
$uid = empty($_GET['uid']) ? 0 : intval($_GET['uid']);

$member = array();

$userjianjie=DB::result_first("SELECT jianjie FROM " .DB::table('ucenter_members')." where uid=".$_G['uid']);	
$_G[member][lastvisit]=date('Y-m-d H:i',$_G[member][lastvisit]);


$fids="";

foreach($menus as $k=>$v){
		$menus[$k]['count']=DB::result_first("SELECT count(f.favid) FROM " .DB::table('home_favorite')." as f inner join " .DB::table('forum_thread')." as t on f.id=t.tid where f.idtype='tid' and f.uid=".$_G['uid']." and t.fid=".$v['fid']);
		
		$fids.=",".$v['fid'];
}
$fids=ltrim($fids,",");



$dylist=DB::fetch_all("SELECT * FROM " .DB::table('froum_dingyue')." d inner join " .DB::table('ucenter_members')." m on d.puid=m.uid   where d.uid=".$_G['uid']);

foreach($dylist as $k=>$v){
	$dylist[$k]['count']=DB::result_first("SELECT count(tid) FROM " .DB::table('forum_thread')."  where authorid=".$v['puid']);
	if($dylist[$k]['count']>99){
		$dylist[$k]['count']="99+";	
	}
	$dylist[$k]['dateline']=DB::result_first("SELECT dateline FROM " .DB::table('forum_thread')."  where authorid=".$v['puid']." order by dateline desc limit 1");
	 $dylist[$k]['dateline']=dgmdate($dylist[$k]['dateline'], 'u', '9999', getglobal('setting/dateformat').' H:i:s');
}



$action="dingyue";
$navtitle="订阅";
if($_GET['mobile']){
		include template("touch/home/dingyue"); 
}else{
include template("home/dingyue"); 
}


?>