<?php

//$rs = DB::fetch_all( "SELECT t.*,p.message,p.pid,f.name FROM ".DB::table( "forum_thread" )." t  LEFT JOIN ".DB::table( "forum_post" )." p on p.tid=t.tid and p.first=1 LEFT JOIN ".DB::table( "forum_forum" ).( " f on f.fid=t.fid WHERE t.displayorder>=0 ".$whereadd." group by t.tid ORDER BY t.".$ceo_order." DESC,t.dateline DESC LIMIT ".$begin.",".$ceo_num."" ) );
if($ceo_message == 1) {
    require_once libfile('function/post');
}
$rs = $_G['forum_threadlist'];

$instr = getDImplode($rs, 'tid');
$tableid = array();
$tablemessage = array();
if($instr)
{
	//$tableitem = DB::fetch_all("SELECT aid,pid FROM %t WHERE pid in(".$instr.")", array('forum_attachment'));
	$tableitem = DB::fetch_all( "SELECT p.tid,a.aid FROM ".DB::table( "forum_post" )." p LEFT JOIN ".DB::table( "forum_attachment" )." a on a.pid=p.pid WHERE a.tid in(".$instr.") AND p.first=1");
	foreach ( $tableitem as $item )
	{
		if($tableid[$item['tid']]) {
			if($tableid[$item['tid']][0] < 3) {
				$tableid[$item['tid']][0]++;
				$tableid[$item['tid']][1][] = $item['aid'];
			}
		}
		else {
			$tableid[$item['tid']][0] = 1;
			$tableid[$item['tid']][1][] = $item['aid'];
		}
	}
}
if($instr && $ceo_message == 1)
{
	$tableitem = DB::fetch_all( "SELECT tid,message FROM ".DB::table( "forum_post" )." WHERE tid in(".$instr.") AND first=1");
	foreach ( $tableitem as $item )
	{
		$tablemessage[$item['tid']] = $item['message'];
	}
}
unset($tableitem);
unset($instr);

$threadlist = array();
if($ceo_ForumStyle == 1) {
	foreach ( $rs as $rw )
	{
		//$rw['dateline'] = date('m-d', $rw['dateline'] );
		if($rw['attachment'] == 2)
		{
			$piccount = $tableid[$rw['tid']][0];
			$rw['piccount'] = $piccount;
			if($piccount >= 1 && $piccount < 3)
			{
				$rw['pic'] = getforumimg($tableid[$rw['tid']][1][0], 0, $ceo_picwidth, $ceo_picheight, $ceo_pictype);
			}
			elseif( $piccount >= 3)
			{
				$rw['pics'] = GetThreadPicList($tableid[$rw['tid']][1], 3, $ceo_picwidth, $ceo_picheight, $ceo_pictype);
			}
			else
			{
				if($ceo_message == 1)
				{
					$rw['message'] = reg_china_codeing(messagecutstr($tablemessage[$rw['tid']],$ceo_messagenum, ''));
				}
			}
		}
		else
		{
			if($ceo_message == 1)
			{
				$rw['message'] = reg_china_codeing(messagecutstr($tablemessage[$rw['tid']],$ceo_messagenum, ''));
			}
		}
		$threadlist[] = $rw;
	}
}
elseif($ceo_ForumStyle == 2) {
	foreach ( $rs as $rw )
	{
		//$rw['dateline'] = date('Y-m-d', $rw['dateline'] );
		if($rw['attachment'] == 2)
		{
			$piccount = $tableid[$rw['tid']][0];
			$rw['piccount'] = $piccount;
			$rw['pics'] = GetThreadPicList($tableid[$rw['tid']][1], 3, $ceo_picwidth, $ceo_picwidth, $ceo_pictype);
		}
		if($ceo_message == 1)
		{
			$rw['message'] = reg_china_codeing(messagecutstr($tablemessage[$rw['tid']],$ceo_messagenum, ''));
		}
		$threadlist[] = $rw;
	}
}
else {
	if($ceo_message == 1)
	{
		foreach ( $rs as $rw )
		{
			$rw['message'] = reg_china_codeing(messagecutstr($tablemessage[$rw['tid']],$ceo_messagenum, ''));
			$threadlist[] = $rw;
		}
	}
}
$_G['forum_threadlist'] = $threadlist;
unset($threadlist);
unset($tableid);
unset($rs);
?>