<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

define('APP', DISCUZ_ROOT.'./source/plugin/yingxiao_toutiaom/');
require_once APP.'class.func.php';
require_once APP.'lang.php';

global $_G;
loadcache('plugin');
$settings = $_G['cache']['plugin']['yingxiao_toutiaom'];

//setting
$ceo_headertemplate = isset($settings['ceo_headertemplate']) ? intval($settings['ceo_headertemplate']) : 1;
$ceo_headerbg = isset($settings['ceo_headerbg']) ? trim($settings['ceo_headerbg']) : '#d73333';
$ceo_headertext = isset($settings['ceo_headertext ']) ? trim($settings['ceo_headertext ']) : '#fff';
$ceo_navcode = isset($settings['ceo_navcode']) ? trim($settings['ceo_navcode']) : '';
$ceo_module = isset($settings['ceo_module']) ? intval($settings['ceo_module']) : 1;
$ceo_forumfids = isset($settings['ceo_forumfids']) ? trim($settings['ceo_forumfids']) : '';
$ceo_catids = isset($settings['ceo_catids']) ? trim($settings['ceo_catids']) : '';
$ceo_order = isset($settings['ceo_order']) ? trim($settings['ceo_order']) : 'dateline';
$ceo_day = isset($settings['ceo_day']) ? intval($settings['ceo_day']) : 300;
$ceo_num = isset($settings['ceo_num']) ? intval($settings['ceo_num']) : 30;
$ceo_cachetime = isset($settings['ceo_cachetime']) ? intval($settings['ceo_cachetime']) : 0;
$ceo_onlypic = isset($settings['ceo_onlypic']) ? intval($settings['ceo_onlypic']) : 0;
$ceo_picwidth = isset($settings['ceo_picwidth']) ? intval($settings['ceo_picwidth']) : 150;
$ceo_picheight = isset($settings['ceo_picheight']) ? intval($settings['ceo_picheight']) : 100;
$ceo_pictype = isset($settings['ceo_pictype']) ? trim($settings['ceo_pictype']) : 'fixwr';
$ceo_message = isset($settings['ceo_message']) ? intval($settings['ceo_message']) : 1;
$ceo_messagenum = isset($settings['ceo_messagenum']) ? intval($settings['ceo_messagenum']) : 60;
$ceo_ad = isset($settings['ceo_ad']) ? trim($settings['ceo_ad']) : '';
$ceo_seotitle = isset($settings['ceo_seotitle']) ? trim($settings['ceo_seotitle']) : '';
$ceo_seokeywords = isset($settings['ceo_seokeywords']) ? trim($settings['ceo_seokeywords']) : '';
$ceo_seodescription = isset($settings['ceo_seodescription']) ? trim($settings['ceo_seodescription']) : '';
$ceo_listclass = isset($settings['ceo_listclass']) ? intval($settings['ceo_listclass']) : 3;
$ceo_listcode = isset($settings['ceo_listcode']) ? trim($settings['ceo_listcode']) : '';
$ceo_listcell = isset($settings['ceo_listcell']) ? intval($settings['ceo_listcell']) : 3;
$ceo_murl = isset($settings['ceo_murl']) ? intval($settings['ceo_murl']) : 0;

if($ceo_ad) { $ceo_ad = GetAdsList($ceo_ad); }

$ceo_url = '';

$curPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
$begin = ($curPage - 1) * $ceo_num;
$needupdate = 0;
$toutiaolist = array( );
$whereadd = '';
$cachefile = '';
$cacheflag = '_0';


if($_GET['mod'] == 'forum')
{
    $ceo_module = 1;
    $ceo_url = '&mod=' .$_GET['mod'];
}
if($_GET['mod'] == 'portal')
{
    $ceo_module = 2;
    $ceo_url = '&mod=' .$_GET['mod'];
}

if($_GET['fids'])
{
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

if($ceo_module == 1){ $cachefile = "data/cache/toutiaom_forum" .$cacheflag. "_" .$curPage. ".php"; }
if($ceo_module == 2){ $cachefile = "data/cache/toutiaom_portal" .$cacheflag. "_" .$curPage. ".php";;}

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
      
		$rs = DB::fetch_all( "SELECT t.*,p.message,p.pid,f.name FROM ".DB::table( "forum_thread" )." t  LEFT JOIN ".DB::table( "forum_post" )." p on p.tid=t.tid and p.first=1 LEFT JOIN ".DB::table( "forum_forum" ).( " f on f.fid=t.fid WHERE t.displayorder>=0 ".$whereadd." group by t.tid ORDER BY t.".$ceo_order." DESC,t.dateline DESC LIMIT ".$begin.",".$ceo_num."" ) );
		
		$instr = getWhereIN($rs, 'pid');
		$tableid = array();
		if($instr)
		{
			$tableitem = DB::fetch_all("SELECT aid,pid FROM %t WHERE pid in(".$instr.")", array('forum_attachment'));
			foreach ( $tableitem as $item )
			{
				if($tableid[$item['pid']]) {
					if($tableid[$item['pid']][0] < 3) {
						$tableid[$item['pid']][0]++;
						$tableid[$item['pid']][1][] = $item['aid'];
					}
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
			$rw['dateline'] = date('m-d', $rw['dateline'] );
			if($rw['attachment'] == 2)
			{
                $piccount = $tableid[$rw['pid']][0];
				$rw['piccount'] = $piccount;
				if($piccount >= 1 && $piccount < 3)
				{
					$rw['pic'] = getforumimg($tableid[$rw['pid']][1][0], 0, $ceo_picwidth, $ceo_picheight, $ceo_pictype);
				}
				elseif( $piccount >= 3)
				{
					$rw['pics'] = GetThreadPicList($tableid[$rw['pid']][1], 3, $ceo_picwidth, $ceo_picheight, $ceo_pictype);
				}
				else
				{
					if($ceo_message == 1)
					{
						$rw['message'] = reg_china_codeing(messagecutstr($rw['message'],$ceo_messagenum, ''));
					}
				}
			}
			else
			{
				if($ceo_message == 1)
				{
					$rw['message'] = reg_china_codeing(messagecutstr($rw['message'],$ceo_messagenum, ''));
				}
			}
			$toutiaolist[] = $rw;
		}
		unset($tableid);
		unset($rs);
		$allnum = DB::result_first( "select count(*) from ".DB::table( "forum_thread" ).( " t where t.displayorder>=0 {$whereadd}" ) );
	}
	elseif($ceo_module == 2)
	{
		if ( $ceo_catids ) { $whereadd .= " and t.`catid` in (".$ceo_catids.")"; }
		if ( $ceo_onlypic )	{ $whereadd .= " and t.thumb=1 "; }
		$rs = DB::fetch_all( "SELECT t.*,p.cid,f.catname FROM ".DB::table( "portal_article_title" )." t  LEFT JOIN ".DB::table( "portal_article_content" )." p on p.aid=t.aid LEFT JOIN ".DB::table( "portal_category" ).( " f on f.catid=t.catid WHERE t.status=0 {$whereadd} group by t.aid ORDER BY t.dateline DESC LIMIT {$begin} , {$ceo_num}" ) );
		
		$instr = getWhereIN($rs, 'aid');
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
            $rw['reply'] = C::t('portal_comment')->count_by_id_idtype($rw['aid'], 'aid');
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
					$rw['summary'] = reg_china_codeing(messagecutstr($rw['summary'],$ceo_messagenum, ''));
				}
			}
			$toutiaolist[] = $rw;
		}
		unset($tableid);
		unset($rs);
		$allnum = DB::result_first( "select count(*) from ".DB::table( "portal_article_title" ).( " t where t.status=0 {$whereadd}" ) );
	}
	
	$toutiaolist['allnum'] = $allnum;
    if($ceo_cachetime > 0)
    {
        @file_put_contents( $cachefile, "<?php\nreturn " . var_export($toutiaolist, true) . ";" );
    }
    unset( $toutiaolist['allnum'] );
}

include template('yingxiao_toutiaom:default/index');

?>