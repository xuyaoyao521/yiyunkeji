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
$ceo_picwidth = isset($settings['ceo_picwidth']) ? intval($settings['ceo_picwidth']) : 450;
$ceo_picheight = isset($settings['ceo_picheight']) ? intval($settings['ceo_picheight']) : 250;
$ceo_pictype = isset($settings['ceo_pictype']) ? trim($settings['ceo_pictype']) : 'fixwr';
$ceo_message = isset($settings['ceo_message']) ? intval($settings['ceo_message']) : 1;
$ceo_messagenum = isset($settings['ceo_messagenum']) ? intval($settings['ceo_messagenum']) : 360;
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


if($_GET['mods'] == 'forum' && !$_GET['mods'])
{
    $ceo_module = 1;
    $ceo_url = '&mods=' .$_GET['mods'];
}
if($_GET['mods'] == 'portal')
{
    $ceo_module = 2;
    $ceo_url = '&mods=' .$_GET['mods'];
}

if($_GET['fids'])
{
	$catid=$_GET['fids'];
    $ceo_forumfids = intval($_GET['fids']);
    $cacheflag = '_' .$ceo_forumfids;
    $ceo_url .= '&fids=' .intval($_GET['fids']);
}
if($_GET['cats'])
{
    $ceo_catids = intval($_GET['cats']);
    $cacheflag = '_' .$ceo_catids;
    $ceo_url .= '&cats=' .intval($_GET['cats']);
}


if ( $ceo_cachetime )
{
	if ( $_G['timestamp'] - @filemtime( $cachefile ) < $ceo_cachetime )
	{
        if(file_exists($cachefile)){
			$toutiaolist = include($cachefile);
    		$allnum = intval( $toutiaolist['allnum'] );
    		unset( $toutiaolist['allnum'] );
        } else {
            $needupdate = 1;
        }
	} else {
		$needupdate = 1;
	}
} else {
	$needupdate = 1;
}

if ( $needupdate )
{
	if ( $ceo_day )
	{
		$dayago = time() - $ceo_day * 86400;
		$whereadd .= " and t.dateline>'".$dayago."'";
	}
    require_once libfile('function/post');
	if($ceo_module == 1)
	{
		if ( $ceo_forumfids ) { $whereadd .= " and t.`fid` in (".$ceo_forumfids.")"; }
		if ( $ceo_onlypic )	{ $whereadd .= " and t.attachment=2 "; }
      	
		if($_G['uid']){
		$notinterested=DB::result_first("SELECT notinterested FROM " .DB::table('forum_notinterested')." where uid=".$_G['uid']);	
		
		if($notinterested){
				$whereadd .= " and t.tid not in (".$notinterested.")";
		}
		}
		if($_GET['fids']){
					
					 $ceo_url .= '&fid=' .intval($_GET['fid']);
		}else{
			$mhfids = DB::fetch_all( "SELECT fid FROM ".DB::table( "forum_forum" )."   WHERE  fup=1" );	
			$menhuids="";
			foreach($mhfids as $k=>$v){
				$menhuids.=",".$v['fid'];
			}
			$menhuids=ltrim($menhuids,",");
			$whereadd .= " and t.fid in( ".$menhuids.")";
			$whereadd .= " and t.fid != 42";
		}
		
		$keyword=$_GET['keyword'];
		if($_GET['keyword']){
			$whereadd .= " and t.subject like '%".$_GET['keyword']."%' ";
			$ceo_url .= '&keyword=' .$_GET['keyword'];	
		}
		
		$rs = DB::fetch_all( "SELECT t.*,p.message,p.pid,f.name FROM ".DB::table( "forum_thread" )." t  LEFT JOIN ".DB::table( "forum_post" )." p on p.tid=t.tid and p.first=1 LEFT JOIN ".DB::table( "forum_forum" ).( " f on f.fid=t.fid WHERE t.displayorder>=0 ".$whereadd." group by t.tid ORDER BY t.".$ceo_order." DESC,t.dateline DESC LIMIT ".$begin.",".$ceo_num."" ) );
		
		

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
			
			if($_G['uid']){
				$zanguo=DB::result_first("SELECT id FROM " .DB::table('froum_zan')." where tid=".$rw['tid']." and uid=".$_G['uid']." and type=1 ");
				$bishiguo=DB::result_first("SELECT id FROM " .DB::table('froum_zan')." where tid=".$rw['tid']." and uid=".$_G['uid']." and type=2 ");
				$shoucang=DB::result_first("SELECT favid FROM " .DB::table('home_favorite')." where uid=".$_G['uid']." and id=".$rw['tid']." and idtype='tid' ");
			}else{
				
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
			
			$rw['dateline'] = dgmdate($rw['dateline'], 'u', '9999', getglobal('setting/dateformat').' H:i:s');
			if($rw['fid']==40){
					$rw['videotime']=DB::result_first("SELECT value FROM " .DB::table('forum_typeoptionvar')." where tid=".$rw['tid']." and optionid=7 ");;
			}
			if($rw['attachment'] == 2||$rw['fid']==40)
			{
                $piccount = $tableid[$rw['pid']][0];
				$rw['piccount'] = $piccount;
				
				if(($piccount >= 1 && $piccount < 4)||$rw['fid']==40)
				{
					
					
					
					$rw['pic'] = getforumimg($tableid[$rw['pid']][1][0], 0, $ceo_picwidth, $ceo_picheight, $ceo_pictype);
					$rw['message'] = str_replace(array("\r", "\n"), '', messagecutstr(strip_tags($rw['message']), $ceo_messagenum));
				}
				elseif( $piccount >= 4)
				{
					$rw['pics'] = GetThreadPicList($tableid[$rw['pid']][1], 4, $ceo_picwidth, $ceo_picheight, $ceo_pictype);
					$rw['pic'] = $rw['pics'][0];
				}
				else
				{
					if($ceo_message == 1)
					{
						$rw['message'] = str_replace(array("\r", "\n"), '', messagecutstr(strip_tags($rw['message']), $ceo_messagenum));
					}
				}
			}
			else
			{
				if($ceo_message == 1)
				{
					$rw['message'] = str_replace(array("\r", "\n"), '', messagecutstr(strip_tags($rw['message']), $ceo_messagenum));
				}
			}
			$toutiaolist[] = $rw;
		}
		
		
		
		unset($tableid);
		unset($rs);
		$allnum = DB::result_first( "select count(*) from ".DB::table( "forum_thread" ).( " t where t.displayorder>=0 {$whereadd}" ) );
		$theurl = 'forum.php?mod=phone' .$ceo_url;
	}
	elseif($ceo_module == 2)
	{
		if ( $ceo_catids ) { $whereadd .= " and t.`catid` in (".$ceo_catids.")"; }
		if ( $ceo_onlypic )	{ $whereadd .= " and t.thumb=1 "; }
		$rs = DB::fetch_all( "SELECT t.*,p.cid,f.catname FROM ".DB::table( "portal_article_title" )." t  LEFT JOIN ".DB::table( "portal_article_content" )." p on p.aid=t.aid LEFT JOIN ".DB::table( "portal_category" ).( " f on f.catid=t.catid WHERE t.status=0 {$whereadd} group by t.aid ORDER BY t.dateline DESC LIMIT {$begin} , {$ceo_num}" ) );
		
		$instr = getDImplode($rs, 'aid');
		$tableid = array();
		if($instr)
		{
			$tableitem = DB::fetch_all("SELECT aid,attachment FROM %t WHERE aid in(".$instr.") ORDER BY aid ASC,attachid ASC", array('portal_attachment'));
			foreach ( $tableitem as $item )
			{
				if($tableid[$item['aid']]) {
					if($tableid[$item['aid']][0] < 3)
					{
						$tableid[$item['aid']][0]++;
						$tableid[$item['aid']][1][] = $item['attachment'];
					}
				}
				else {
					$tableid[$item['aid']][0] = 1;
					$tableid[$item['aid']][1] = array($item['attachment']);
				}
			}
			unset($tableitem);
		}
		unset($instr);
		
		foreach ( $rs as $rw )
		{
			$rw['dateline'] = date('m-d', $rw['dateline'] );
			$article_count = C::t('portal_article_count')->fetch($rw['aid']);
            $rw['viewnum'] = $article_count['viewnum'];
            $rw['commentnum'] = $article_count['commentnum'];
            if($rw['thumb'] == 1)
			{
				$piccount = $tableid[$rw['aid']][0];
				$rw['piccount'] = $piccount;
				if( $piccount >= 3)
				{
					$rw['pics'] = $tableid[$rw['aid']][1];
				}
			}
			else
			{
				if($ceo_message == 1)
				{
					$rw['summary'] = trim(reg_china_codeing(messagecutstr($rw['summary'],$ceo_messagenum, '')));
				}
			}
			$toutiaolist[] = $rw;
		}
		unset($tableid);
		unset($rs);
		$allnum = DB::result_first( "select count(*) from ".DB::table( "portal_article_title" ).( " t where t.status=0 {$whereadd}" ) );
		$theurl = 'forum.php?mod=phone' .$ceo_url;
	}
	
	$toutiaolist['allnum'] = $allnum;
    if($ceo_cachetime > 0)
    {
        @file_put_contents( $cachefile, "<?php\nreturn " . var_export($toutiaolist, true) . ";" );
    }
    unset( $toutiaolist['allnum'] );
}
$multipage = multi($allnum, $ceo_num, $curPage, $theurl);

?>