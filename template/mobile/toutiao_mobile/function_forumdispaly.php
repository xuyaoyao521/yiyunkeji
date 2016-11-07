<?php
function GetDataFirstItem($database, $item, $where){
	$p = DB::fetch_first('SELECT ' .$item. ' FROM '.DB::table($database).' WHERE ' .$where);
	return $p;
}

function GetThreadPicTable($tid, $pid){
	return DB::fetch_all('SELECT tableid FROM '.DB::table('forum_attachment').' WHERE tid=' .$tid. ' AND pid=' .$pid. ' ORDER BY aid ASC');
}

function GetThreadPic($tid, $pid, $tableid, $w, $h, $type){
	$pic = DB::fetch_first('SELECT * FROM '.DB::table('forum_attachment_'.$tableid).' WHERE tid=' .$tid. ' AND pid=' .$pid. ' AND isimage=1 ORDER BY aid ASC');
	return getforumimg($pic['aid'], '0', $w, $h);
}

function GetThreadPicList($tid, $pid, $tableid, $num, $w, $h, $type){
	$getpiclist = DB::fetch_all('SELECT * FROM '.DB::table('forum_attachment_'.$tableid).' WHERE tid = ' .$tid. ' AND pid = ' .$pid. ' AND isimage=1 LIMIT  0,' .$num. '');
	foreach ($getpiclist as $threadpic)
	{
			$piclistarray[$threadpic['aid']] = getforumimg($threadpic['aid'], '0', $w, $h, $type);
	}
	return $piclistarray;
}


function SetThreadPicSize($picscale) {
	$ceo_size = explode('x', $picscale);
	if($ceo_size[0] == $ceo_size[1]) {
		$ceo_size['scale'] = 1;
	}
	else {
		$ceo_size['scale'] = 2;
	}
	return $ceo_size;
}
?>
