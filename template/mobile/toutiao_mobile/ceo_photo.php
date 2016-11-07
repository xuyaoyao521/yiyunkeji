<?php

if ( !defined( "IN_DISCUZ" ) )
{
		exit( "Access Denied" );
}

global $_G;
loadcache('plugin');
$settings = $_G['cache']['plugin']['yingxiao_mobile_set'];

//setting
//$ceo_photowall = isset($settings['ceo_photowall']) ? intval($settings['ceo_photowall']) : 0;
$ceo_module = isset($settings['ceo_photomodule']) ? intval($settings['ceo_photomodule']) : 1;
$ceo_forumfids = isset($settings['ceo_photoforumfids']) ? trim($settings['ceo_photoforumfids']) : '';
$ceo_catids = isset($settings['ceo_photocatids']) ? trim($settings['ceo_photocatids']) : '';
$ceo_listmodule = isset($settings['ceo_photolist']) ? intval($settings['ceo_photolist']) : 2;
$ceo_day = isset($settings['ceo_photoday']) ? intval($settings['ceo_photoday']) : 300;
$ceo_num = isset($settings['ceo_photonum']) ? intval($settings['ceo_photonum']) : 30;
$ceo_cachetime = isset($settings['ceo_photocache']) ? intval($settings['ceo_photocache']) : 0;
$ceo_onlypic = isset($settings['ceo_photoionlypic']) ? intval($settings['ceo_photoionlypic']) : 0;
$ceo_picwidth = isset($settings['ceo_photowidth']) ? intval($settings['ceo_photowidth']) : 150;
$ceo_picheight = isset($settings['ceo_photoheight']) ? intval($settings['ceo_photoheight']) : 100;
$ceo_pictype = isset($settings['ceo_phototype']) ? trim($settings['ceo_phototype']) : 'fixwr';

$ceo_url = '';

$curPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
$begin = ($curPage - 1) * $ceo_num;
$needupdate = 0;
$photolist = array( );
$whereadd = '';
$cachefile = '';
$cacheflag = '_0';

if($_GET['mods'] == 'forum')
{
    $ceo_module = 1;
    $ceo_url = '&mods=' .$_GET['mod'];
}
if($_GET['mods'] == 'portal')
{
    $ceo_module = 2;
    $ceo_url = '&mods=' .$_GET['mod'];
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

if($ceo_module == 1){ $cachefile = "data/cache/toutiao2_m_photo_forum" .$cacheflag. "_" .$curPage. ".php"; }
if($ceo_module == 2){ $cachefile = "data/cache/toutiao2_m_photo_portal" .$cacheflag. "_" .$curPage. ".php";;}

if ( $ceo_cachetime )
{
	if ( $_G['timestamp'] - @filemtime( $cachefile ) < $ceo_cachetime )
	{
        if(file_exists($cachefile)){
			$photolist = include($cachefile);
    		$allnum = intval( $photolist['allnum'] );
    		unset( $photolist['allnum'] );
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
    //require_once libfile('function/post');
	if($ceo_module == 1)
	{
		if ( $ceo_forumfids ) { $whereadd .= " and t.`fid` in (".$ceo_forumfids.")"; }
		if ( $ceo_onlypic )	{ $whereadd .= " and t.cover<>0 "; } else { $whereadd .= " and t.attachment=2 "; }
     
		$rs = DB::fetch_all( "SELECT t.tid,t.subject,t.cover,p.pid FROM ".DB::table( "forum_thread" )." t  LEFT JOIN ".DB::table( "forum_post" )." p on p.tid=t.tid and p.first=1 WHERE t.displayorder>=0 ".$whereadd." group by t.tid ORDER BY t.dateline DESC LIMIT ".$begin.",".$ceo_num."" );
		
		$instr = getDImplode($rs, 'pid');
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
			//$rw['dateline'] = date('m-d', $rw['dateline'] );
			if($tableid[$rw['pid']][1][0]) {
				$piccount = $tableid[$rw['pid']][0];
				$rw['piccount'] = $piccount;
				//if ( $ceo_onlypic )	{ 
				//	$rw['pic'] = getthreadcover( $rw['tid'], $rw['cover'] );
				//} else {
					$rw['pic'] = getforumimg($tableid[$rw['pid']][1][0], 0, $ceo_picwidth, $ceo_picheight, $ceo_pictype);
				//}
				$photolist[] = $rw;
			} else {
				continue;
			}
		}
		unset($tableid);
		unset($rs);
		$allnum = DB::result_first( "select count(*) from ".DB::table( "forum_thread" ).( " t where t.displayorder>=0 {$whereadd}" ) );
	}
	elseif($ceo_module == 2)
	{
		if ( $ceo_catids ) { $whereadd .= " and t.`catid` in (".$ceo_catids.")"; }
		if ( $ceo_onlypic )	{ $whereadd .= " and t.thumb=1 "; }
		$rs = DB::fetch_all( "SELECT aid,title,pic FROM ".DB::table( "portal_article_title" )." t WHERE t.status=0 {$whereadd} group by t.aid ORDER BY t.dateline DESC LIMIT {$begin} , {$ceo_num}" );

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
						//$tableid[$item['aid']][1][] = $item['attachment'];
					}
				}
				else {
					$tableid[$item['aid']][0] = 1;
					//$tableid[$item['aid']][1] = array($item['attachment']);
				}
			}
			unset($tableitem);
		}
		unset($instr);

		foreach ( $rs as $rw )
		{
			//$rw['dateline'] = date('m-d', $rw['dateline'] );
            //$rw['reply'] = C::t('portal_comment')->count_by_id_idtype($rw['aid'], 'aid');
			//$piccount = $tableid[$rw['aid']][0];
			$rw['piccount'] = $tableid[$rw['aid']][0];
			//$rw['pics'] = $tableid[$rw['aid']][1];
			$photolist[] = $rw;
		}
		unset($tableid);
		unset($rs);
		$allnum = DB::result_first( "select count(*) from ".DB::table( "portal_article_title" ).( " t where t.status=0 {$whereadd}" ) );
	}
	
	$photolist['allnum'] = $allnum;
    if($ceo_cachetime > 0)
    {
        @file_put_contents( $cachefile, "<?php\nreturn " . var_export($photolist, true) . ";" );
    }
    unset( $photolist['allnum'] );
}

$pagenav = multi( $allnum, $ceo_num, $_G['page'], "forum.php?mod=photo" .$ceo_url );

?>
