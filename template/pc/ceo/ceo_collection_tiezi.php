<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
global $_G;
loadcache('plugin');
$settings = $_G['cache']['plugin']['yingxiao_toutiaom'];

//setting
$ceo_headertemplate = isset($settings['ceo_headertemplate']) ? intval($settings['ceo_headertemplate']) : 1;
$ceo_headerbg = isset($settings['ceo_headerbg']) ? trim($settings['ceo_headerbg']) : '#ed344a';
$ceo_headertext = isset($settings['ceo_headertext ']) ? trim($settings['ceo_headertext ']) : '#fff';
$ceo_navcode = isset($settings['ceo_navcode']) ? trim($settings['ceo_navcode']) : '';
$ceo_module = isset($settings['ceo_module']) ? intval($settings['ceo_module']) : 1;
$ceo_forumfids = isset($settings['ceo_forumfids']) ? trim($settings['ceo_forumfids']) : '';
$ceo_catids = isset($settings['ceo_catids']) ? trim($settings['ceo_catids']) : '';
$ceo_order = isset($settings['ceo_order']) ? trim($settings['ceo_order']) : 'dateline';
$ceo_day = isset($settings['ceo_day']) ? intval($settings['ceo_day']) : 300;
$ceo_num = isset($settings['ceo_num']) ? intval($settings['ceo_num']) : 10;



$ceo_cachetime = isset($settings['ceo_cachetime']) ? intval($settings['ceo_cachetime']) : 0;
$ceo_onlypic = isset($settings['ceo_onlypic']) ? intval($settings['ceo_onlypic']) : 0;
$ceo_picwidth = isset($settings['ceo_picwidth']) ? intval($settings['ceo_picwidth']) : 150;
$ceo_picheight = isset($settings['ceo_picheight']) ? intval($settings['ceo_picheight']) : 100;
$ceo_pictype = isset($settings['ceo_pictype']) ? trim($settings['ceo_pictype']) : 'fixwr';
$ceo_message = isset($settings['ceo_message']) ? intval($settings['ceo_message']) : 1;
$ceo_messagenum = isset($settings['ceo_messagenum']) ? intval($settings['ceo_messagenum']) : 60;
$ceo_listad = isset($settings['ceo_ad']) ? trim($settings['ceo_ad']) : '';
$ceo_listclass = isset($settings['ceo_listclass']) ? intval($settings['ceo_listclass']) : 3;
$ceo_listcode = isset($settings['ceo_listcode']) ? trim($settings['ceo_listcode']) : '';
$ceo_listcell = isset($settings['ceo_listcell']) ? intval($settings['ceo_listcell']) : 3;

if($ceo_listad) { $ceo_listad = GetAdsList($ceo_listad); }

$ceo_url = '';
$theurl = '';

$curPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
$begin = ($curPage - 1) * $ceo_num;
$needupdate = 0;
$toutiaolist = array( );
$whereadd = '';
$cachefile = '';
$cacheflag = '_0';



if($type==1)
{
    $ceo_forumfids = intval($_GET['fids']);
    $cacheflag = '_' .$ceo_forumfids;
	$forumfids="";
	foreach($menus as $kkk=>$vvv){
		if($vvv['fid']!=40&&$vvv['fid']!=41&&$vvv['fid']!=42){
			$forumfids.=",".$vvv['fid'];
			
		}
	}
	$forumfids=ltrim($forumfids,",");
	
    $ceo_url .= '&type=1';
}

if($type==2){
	$forumfids="41";	
	 $ceo_url .= '&type=2';
}
if($type==3){
	$forumfids="40";	
	 $ceo_url .= '&type=3';
}
if($type==4){
	$forumfids="42";	
	 $ceo_url .= '&type=4';
}

if($type==5){
	$not_forumfids="";
	foreach($menus as $kkk=>$vvv){
		
			$not_forumfids.=",".$vvv['fid'];
			
		
	}
	$not_forumfids=ltrim($not_forumfids,",");	
	 $ceo_url .= '&type=5';
}


	$needupdate = 1;


if ( $needupdate )
{
	
    require_once libfile('function/post');
	if($ceo_module == 1)
	{
		
		if ( $forumfids ) { $whereadd .= " and t.`fid` in (".$forumfids.")"; }
		if ( $not_forumfids )	{ $whereadd .= " and t.`fid` not in (".$not_forumfids.")"; }
      
	
		
		$whereadd .= " and h.uid=".$_G['uid']." and h.idtype='tid' ";
		
		
		
		$rs = DB::fetch_all( "SELECT t.*,p.message,p.pid,p.authorid,f.name FROM ".DB::table( "home_favorite" )." h INNER JOIN ".DB::table( "forum_thread" )." t on h.id=t.tid INNER JOIN ".DB::table( "forum_post" )." p on p.tid=t.tid and p.first=1 INNER JOIN ".DB::table( "forum_forum" )." f on f.fid=t.fid  WHERE t.displayorder>=0 ".$whereadd." group by t.tid ORDER BY t.".$ceo_order." DESC LIMIT ".$begin.",".$ceo_num."" );

		

		$instr = getDImplode($rs, 'pid');

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
					$rw['pics'] = GetThreadPicList($tableid[$rw['pid']][1], 4, $ceo_picwidth, $ceo_picheight, $ceo_pictype);
				}
				else
				{
					if($ceo_message == 1)
					{
						$rw['message'] = str_replace(array("\r", "\n"), '', messagecutstr(strip_tags($rw['message']), $ceo_messagenum));
						//$rw['message'] = trim(reg_china_codeing(messagecutstr($rw['message'],$ceo_messagenum, '')));
					}
				}
			}
			else
			{
				if($ceo_message == 1)
				{
					$rw['message'] = trim(reg_china_codeing(messagecutstr($rw['message'],$ceo_messagenum, '')));
				}
			}
			$toutiaolist[] = $rw;
		}
		unset($tableid);
		unset($rs);
		$allnum = DB::result_first( "select count(*) from ".DB::table( "home_favorite" ). " h  inner join ".DB::table( "forum_thread" ). "  t on h.id=t.tid where t.displayorder>=0 {$whereadd}" );
		
		$theurl = 'portal.php?mod=toutiao' .$ceo_url;
	}
	
	
	$toutiaolist['allnum'] = $allnum;
    if($ceo_cachetime > 0)
    {
        @file_put_contents( $cachefile, "<?php\nreturn " . var_export($toutiaolist, true) . ";" );
    }
    unset( $toutiaolist['allnum'] );
}
$multipage = multi($allnum, $ceo_num, $curPage, $theurl);

//print_r($toutiaolist);die();
?>