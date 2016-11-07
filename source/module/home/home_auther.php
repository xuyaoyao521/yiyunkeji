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

if(!$uid){
	header("Location:/");	
}

$member = array();

$usercontent=DB::fetch_first("SELECT * FROM " .DB::table('ucenter_members')." where uid=".$uid);	

$ceo_messagenum = isset($settings['ceo_messagenum']) ? intval($settings['ceo_messagenum']) : 200;

$fids="";

foreach($menus as $k=>$v){
	
		$fids.=",".$v['fid'];
}
$fids=ltrim($fids,",");

$historylist=DB::fetch_all("SELECT * FROM " .DB::table('forum_thread')." where authorid=".$uid." and fid in (".$fids.") and displayorder>=0  order by chakan desc limit 5");
foreach($historylist as &$v){
		$v['dateline']=date("Y/m/d H:i",$v['dateline']);
		
		
}

$toutiaolist2 = array( );
$whereadd = '';
 require_once libfile('function/post');
$type=$_GET['type']?$_GET['type']:1;
$ceo_url="&uid=".$uid;
if($type==1){
		$whereadd.=" and t.fid in (".$fids.") and t.fid not in (40,41,42) ";
		
}
if($type==2){
		$whereadd.=" and t.fid =40 ";
}
if($type==3){
		$whereadd.=" and t.fid =41 ";
}
if($type==4){
		$whereadd.=" and t.fid =42 ";
}
$ceo_url.="&type=".$type;
$curPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
$ceo_num2 = isset($settings['ceo_num']) ? intval($settings['ceo_num']) : 10;
$ceo_picwidth = isset($settings['ceo_picwidth']) ? intval($settings['ceo_picwidth']) : 150;
$ceo_picheight = isset($settings['ceo_picheight']) ? intval($settings['ceo_picheight']) : 100;
$ceo_pictype = isset($settings['ceo_pictype']) ? trim($settings['ceo_pictype']) : 'fixwr';
$begin = ($curPage - 1) * $ceo_num2;
if($_G['uid']){
		$notinterested=DB::result_first("SELECT notinterested FROM " .DB::table('forum_notinterested')." where uid=".$_G['uid']);	
		
		if($notinterested){
				$whereadd .= " and t.tid not in (".$notinterested.")";
		}
		
		$dyid=DB::result_first("SELECT id FROM " .DB::table('froum_dingyue')." where uid=".$_G['uid']." and puid=".$uid);	
}

$rs = DB::fetch_all( "SELECT t.*,p.message,p.pid,p.authorid,f.name FROM ".DB::table( "forum_thread" )." t  INNER JOIN ".DB::table( "forum_post" )." p on p.tid=t.tid and p.first=1 INNER JOIN ".DB::table( "forum_forum" )." f on f.fid=t.fid  WHERE t.authorid=".$uid." and  t.displayorder>=0 ".$whereadd."  group by t.tid ORDER BY t.dateline DESC LIMIT ".$begin.",".$ceo_num2."" );

$instr = getDImplode2($rs, 'pid');

		$tableid = array();
		if($instr)
		{
			$tableitem = DB::fetch_all("SELECT aid,pid FROM %t WHERE pid in(".$instr.")", array('forum_attachment'));
			foreach ( $tableitem as $item )
			{
				if($tableid[$item['pid']]) {
					
						$tableid[$item['pid']][0]++;
						$tableid[$item['pid']][1][] = $item['aid'];
						
					
				}
				else {
					$tableid[$item['pid']][0] = 1;
					$tableid[$item['pid']][1][] = $item['aid'];
				}
				
				
				
			}
			
			unset($tableitem);
		}
		unset($instr);
		
        foreach ( $rs as $rw )
		{
			$rw['dateline'] =  dgmdate($rw['dateline'], 'u', '9999', getglobal('setting/dateformat').' H:i:s');
			
			$rw['favtimes']=DB::result_first("SELECT count(favid) FROM " .DB::table('home_favorite')." where id=".$rw['tid']." and idtype='tid' ");
			
			if($_G['uid']){
				$zanguo=DB::result_first("SELECT id FROM " .DB::table('froum_zan')." where tid=".$rw['tid']." and uid=".$_G['uid']." and type=1 ");
				$bishiguo=DB::result_first("SELECT id FROM " .DB::table('froum_zan')." where tid=".$rw['tid']." and uid=".$_G['uid']." and type=2 ");
				$shoucang=DB::result_first("SELECT favid FROM " .DB::table('home_favorite')." where uid=".$_G['uid']." and id=".$rw['tid']." and idtype='tid' ");
			}else{
				$ip=$_SERVER["REMOTE_ADDR"]; 	
				$zanguo=DB::result_first("SELECT id FROM " .DB::table('froum_zan')." where tid=".$rw['tid']." and openid='".$openid."' and type=1 ");
				$bishiguo=DB::result_first("SELECT id FROM " .DB::table('froum_zan')." where tid=".$rw['tid']." and openid='".$openid."' and type=2 ");
			}
			
			
			
			if($zanguo){
					$rw['zanguo']="on";
			}
			if($bishiguo){
					$rw['bishiguo']="on";
			}
			if($shoucang){
					$rw['shoucang']="on";
			}
			
			if($rw['fid']==40){
					$rw['videotime']=DB::result_first("SELECT value FROM " .DB::table('forum_typeoptionvar')." where tid=".$rw['tid']." and optionid=7 ");;
			}
			
			
			
			if($rw['attachment'] == 2)
			{
                $piccount = $tableid[$rw['pid']][0];
				$rw['piccount'] = $piccount;
				
				if($piccount >= 1 && $piccount < 4)
				{
					
					$rw['pic'] = getforumimg($tableid[$rw['pid']][1][0], 0, $ceo_picwidth, $ceo_picheight, $ceo_pictype);
					
					$rw['message'] = str_replace(array("\r", "\n"), '', messagecutstr(strip_tags($rw['message']), $ceo_messagenum));
					
				}
				elseif( $piccount >=4)
				{
					
					$rw['pics'] = GetThreadPicList2($tableid[$rw['pid']][1], 4, $ceo_picwidth, $ceo_picheight, $ceo_pictype);
					
				}
				else
				{
					
						$rw['message'] = str_replace(array("\r", "\n"), '', messagecutstr(strip_tags($rw['message']), $ceo_messagenum));
						//$rw['message'] = trim(reg_china_codeing2(messagecutstr($rw['message'],$ceo_messagenum, '')));
					
				}
			}
			else
			{
				
					$rw['message'] = trim(reg_china_codeing2(messagecutstr($rw['message'],$ceo_messagenum, '')));
				
			}
			$toutiaolist2[] = $rw;
		}
		unset($tableid);
		unset($rs);
		$navtitle="作者";
		
		
		
		$allnum2 = DB::result_first( "select count(*) from ".DB::table( "forum_thread" ).( " t where t.displayorder>=0 {$whereadd}" ) );
if($_GET['mobile']){
		include template("touch/home/auther"); 
}else{
include template("home/auther"); 
}
function getDImplode2($arr, $item)
{
    $num =  count($arr);
    $c = array();
    foreach ( $arr as $rw )
    {
        $c[] = $rw[$item];
    }
    return dimplode($c);
}

function GetThreadPicList2($getpiclist, $num, $w, $h, $type){
	$listarray = array();
	for ($i=0; $i<$num; $i++)
	{
		$listarray[] = getforumimg($getpiclist[$i], '0', $w, $h, $type);
	}
	return $listarray;
}
function reg_china_codeing2($str)
{
	preg_match_all('/[\x{4e00}-\x{9fff}]+/u', $str, $matches);
	$str = join('', $matches[0]);
	return $str;
}
?>