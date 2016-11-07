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

$ceo_url = '&type=4';
$theurl = '';

$curPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
$begin = ($curPage - 1) * $ceo_num;
$needupdate = 0;
$toutiaolist4 = array( );
$whereadd = '';
$cachefile = '';
$cacheflag = '_0';


	$needupdate = 1;


if ( $needupdate )
{
	
    require_once libfile('function/post');
	if($ceo_module == 1)
	{
		if ( $ceo_forumfids ) { $whereadd .= " and t.`fid` in (".$ceo_forumfids.")"; }
		if ( $ceo_onlypic )	{ $whereadd .= " and t.attachment=2 "; }
      
		//$rs = DB::fetch_all( "SELECT t.*,p.message,p.pid,f.name FROM ".DB::table( "forum_thread" )." t  LEFT JOIN ".DB::table( "forum_post" )." p on p.tid=t.tid and p.first=1 LEFT JOIN ".DB::table( "forum_forum" )." f on f.fid=t.fid LEFT JOIN ".DB::table( "forum_attachment" )." a on a.pid=p.pid WHERE t.displayorder>=0 ".$whereadd." group by t.tid ORDER BY t.".$ceo_order." DESC LIMIT ".$begin.",".$ceo_num."" );
		
		
					$whereadd .= " and t.fid = 42";
					
		
		
		$whereadd .= "  and h.uid=".$_G['uid']." and h.idtype='tid' ";
		
		$rs = DB::fetch_all( "SELECT t.*,p.message,p.pid,p.authorid,f.name FROM ".DB::table( "home_favorite" )." h INNER JOIN ".DB::table( "forum_thread" )." t on h.id=t.tid INNER JOIN ".DB::table( "forum_post" )." p on p.tid=t.tid and p.first=1 INNER JOIN ".DB::table( "forum_forum" )." f on f.fid=t.fid  WHERE t.displayorder>=0 ".$whereadd." group by t.tid ORDER BY t.".$ceo_order." DESC LIMIT ".$begin.",".$ceo_num."" );

		
		
		
		
        foreach ( $rs as $rw )
		{
			$rw['dateline'] =  dgmdate($rw['dateline'], 'u', '9999', getglobal('setting/dateformat').' H:i:s');
			
			$rw['message'] = trim(reg_china_codeing(messagecutstr($rw['message'],$ceo_messagenum, '')));
			
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
			
			$toutiaolist4[] = $rw;
		}
		unset($tableid);
		unset($rs);
		$allnum = DB::result_first( "select count(*) from ".DB::table( "home_favorite" ). " h  inner join ".DB::table( "forum_thread" ). "  t on h.id=t.tid where t.displayorder>=0 {$whereadd}" );
		
		
		
		
	}
	
	
	$toutiaolist4['allnum'] = $allnum;
    if($ceo_cachetime > 0)
    {
        @file_put_contents( $cachefile, "<?php\nreturn " . var_export($toutiaolist4, true) . ";" );
    }
    unset( $toutiaolist4['allnum'] );
}




//print_r($toutiaolist);die();
?>