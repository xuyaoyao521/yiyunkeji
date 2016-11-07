<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

global $_G;
loadcache('plugin');
$settings = $_G['cache']['plugin']['yingxiao_toutiaom'];

//setting
$ceo_listclass = isset($settings['ceo_listclass']) ? intval($settings['ceo_listclass']) : 3;
$ceo_listcode = isset($settings['ceo_listcode']) ? trim($settings['ceo_listcode']) : '';
$ceo_listcell = isset($settings['ceo_listcell']) ? intval($settings['ceo_listcell']) : 4;

if($_GET['mods'] == 'forum')
{
    $ceo_listclass = 2;
}
if($_GET['mods'] == 'portal')
{
    $ceo_listclass = 1;
}

if($ceo_listclass != 2 && $ceo_listclass != 4)
{
    $sql = "SELECT catid,catname FROM " .DB::table( "portal_category" ). " WHERE closed=0 ORDER BY upid ASC";
	$catelist = DB::fetch_all( $sql );
}
if($ceo_listclass != 1 && $ceo_listclass != 4)
{
    $sql = "SELECT fid,name FROM " .DB::table( "forum_forum" ). " WHERE type<>'group' and fup=1 and status<>0 and status<>3 ORDER BY fid ASC";
	$forumlist = DB::fetch_all( $sql );
}

?>