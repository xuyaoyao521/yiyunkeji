<?php
/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: admincp_tag.php 25889 2011-11-24 09:52:20Z monkey $
 */

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
cpheader();
$operation = in_array($operation, array('admin')) ? $operation : 'admin';
$current = array($operation => 1);
shownav('global', 'tag');
$catname=DB::result_first('SELECT name FROM '.DB::table('forum_forum').' where fid='.$_GET['fid']);
showsubmenu($catname.'-添加新主题', array(
));
if($operation == 'admin') {
	$tagarray = array();
	if(submitcheck('submit') && !empty($_GET['tagidarray']) && is_array($_GET['tagidarray']) && !empty($_GET['operate_type'])) {
		$class_tag = new tag();
		$tagidarray = array();
		$operate_type = $newtag = $thread =  '';
		$tagidarray = $_GET['tagidarray'];
		$operate_type = $_GET['operate_type'];
		if($operate_type == 'delete') {
			$class_tag->delete_tag($tagidarray);
		} elseif($operate_type == 'open') {
			C::t('common_tag')->update($tagidarray, array('status' => 0));
		} elseif($operate_type == 'close') {
			C::t('common_tag')->update($tagidarray, array('status' => 1));
		} elseif($operate_type == 'merge') {
			$data = $class_tag->merge_tag($tagidarray, $_GET['newtag']);
			if($data != 'succeed') {
				cpmsg($data);
			}
		}
		cpmsg('tag_admin_updated', 'action=tag&operation=admin&searchsubmit=yes&tagname='.$_GET['tagname'].'&perpage='.$_GET['perpage'].'&status='.$_GET['status'].'&page='.$_GET['page'], 'succeed');
	}
	if(!submitcheck('searchsubmit', 1)) {
	
		
		
		
	} else {
		$tagname = trim($_GET['tagname']);
		$status = $_GET['status'];
		if(!$status) {
			$table_status = NULL;
		} else {
			$table_status = $status;
		}
		$ppp = $_GET['perpage'];
		$startlimit = ($page - 1) * $ppp;
		$multipage = '';
		$totalcount  = C::t('common_tag')->fetch_all_by_status($table_status, $tagname, 0, 0, 1);
		$multipage = multi($totalcount, $ppp, $page, ADMINSCRIPT."?action=tag&operation=admin&searchsubmit=yes&tagname=$tagname&perpage=$ppp&status=$status");
		$query = C::t('common_tag')->fetch_all_by_status($table_status, $tagname, $startlimit, $ppp);
		showformheader('tag&operation=admin');
		showtableheader(cplang('tag_result').' '.$totalcount.' <a href="###" onclick="location.href=\''.ADMINSCRIPT.'?action=tag&operation=admin;\'" class="act lightlink normal">'.cplang('research').'</a>', 'nobottom');
		showhiddenfields(array('page' => $_GET['page'], 'tagname' => $tagname, 'status' => $status, 'perpage' => $ppp));
	
		foreach($query as $result) {
			if($result['status'] == 0) {
				$tagstatus = cplang('misc_tag_status_0');
			} elseif($result['status'] == 1) {
				$tagstatus = cplang('misc_tag_status_1');
			}
			showtablerow('', array('class="td25"', 'width=400', ''), array(
				"<input class=\"checkbox\" type=\"checkbox\" name=\"tagidarray[]\" value=\"$result[tagid]\" />",
				$result['tagname'],
				$tagstatus
			));
		}
		showtablerow('', array('class="td25" colspan="3"'), array('<input name="chkall" id="chkall" type="checkbox" class="checkbox" onclick="checkAll(\'prefix\', this.form, \'tagidarray\', \'chkall\')" /><label for="chkall">'.cplang('select_all').'</label>'));
		showtablerow('', array('class="td25"', 'colspan="2"'), array(
				cplang('operation'),
				'<input class="radio" type="radio" name="operate_type" value="open" checked> '.cplang('misc_tag_status_0').' &nbsp; &nbsp;<input class="radio" type="radio" name="operate_type" value="close"> '.cplang('misc_tag_status_1').' &nbsp; &nbsp;<input class="radio" type="radio" name="operate_type" value="delete"> '.cplang('delete').' &nbsp; &nbsp;<input class="radio" type="radio" name="operate_type" value="merge"> '.cplang('mergeto').' <input name="newtag" value="" class="txt" type="text">'
			));
		showsubmit('submit', 'submit', '', '', $multipage);
		showtablefooter();
		showformfooter();
	}
}
?>
<iframe src="forum.php?mod=post&action=newthread&isadmin=1&fid=<?php echo $_GET['fid']; ?>" style="width:100%; border:0;" onload="setIframeHeight(this)"></iframe>

<script>
function setIframeHeight(iframe) { if (iframe) { var iframeWin = iframe.contentWindow || iframe.contentDocument.parentWindow; if (iframeWin.document.body) { iframe.height = iframeWin.document.documentElement.scrollHeight || iframeWin.document.body.scrollHeight; } } }; window.onload = function () { setIframeHeight(document.getElementById('external-frame')); };
</script>