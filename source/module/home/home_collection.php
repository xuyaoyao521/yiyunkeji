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



$fids="";

foreach($menus as $k=>$v){
		$menus[$k]['count']=DB::result_first("SELECT count(f.favid) FROM " .DB::table('home_favorite')." as f inner join " .DB::table('forum_thread')." as t on f.id=t.tid where f.idtype='tid' and f.uid=".$_G['uid']." and t.fid=".$v['fid']);
		
		$fids.=",".$v['fid'];
}
$fids=ltrim($fids,",");
$dycount=DB::result_first("SELECT count(*) FROM " .DB::table('froum_dingyue')."  where uid=".$_G['uid']);

$action="collection";

$type=$_GET['type']?$_GET['type']:1;

include template("home/collection"); 



?>