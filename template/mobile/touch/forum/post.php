<?php exit;?> 
<!--{template common/header}-->
<script>SetWebTitle("<!--{if $_GET[action] == 'newthread'}-->{echo m_lang('send_thread')}<!--{elseif $_GET[action] == 'reply'}-->{echo m_lang('join_thread')}<!--{elseif $_GET[action] == 'edit'}-->{echo m_lang('edit_thread')}<!--{/if}-->");SetTopLeftNav("backpage");</script>
<script type="text/javascript" src="template/mobile/toutiao_mobile/js/common.js"></script>
<script type="text/javascript">
	var allowpostattach = parseInt('{$_G['group']['allowpostattach']}');
	var allowpostimg = parseInt('$allowpostimg');
	var pid = parseInt('$pid');
	var tid = parseInt('$_G[tid]');
	var extensions = '{$_G['group']['attachextensions']}';
	var imgexts = '$imgexts';
	var postminchars = parseInt('$_G['setting']['minpostsize']');
	var postmaxchars = parseInt('$_G['setting']['maxpostsize']');
	var disablepostctrl = parseInt('{$_G['group']['disablepostctrl']}');
	var seccodecheck = parseInt('<!--{if $seccodecheck}-->1<!--{else}-->0<!--{/if}-->');
	var secqaacheck = parseInt('<!--{if $secqaacheck}-->1<!--{else}-->0<!--{/if}-->');
	var typerequired = parseInt('{$_G[forum][threadtypes][required]}');
	var sortrequired = parseInt('{$_G[forum][threadsorts][required]}');
	var special = parseInt('$special');
	var isfirstpost = <!--{if $isfirstpost}-->1<!--{else}-->0<!--{/if}-->;
	var allowposttrade = parseInt('{$_G['group']['allowposttrade']}');
	var allowpostreward = parseInt('{$_G['group']['allowpostreward']}');
	var allowpostactivity = parseInt('{$_G['group']['allowpostactivity']}');
	var sortid = parseInt('$sortid');
	var special = parseInt('$special');
	var fid = $_G['fid'];
	var postaction = '{$_GET['action']}';
	var ispicstyleforum = <!--{if $_G['forum']['picstyle']}-->1<!--{else}-->0<!--{/if}-->;
</script>

<!--{if $_GET[action] == 'edit'}--><!--{eval $editor[value] = $postinfo[message];}--><!--{else}--><!--{eval $editor[value] = $message;}--><!--{/if}-->
<!--{if $isfirstpost && $sortid}-->
<script type="text/javascript">
	var forum_optionlist = <!--{if $forum_optionlist}-->'$forum_optionlist'<!--{else}-->''<!--{/if}-->;
</script>

<script type="text/javascript" src="template/mobile/toutiao_mobile/js/threadsort.js"></script>

<!--{/if}-->


<div class="postbox box_bg">

  <!--{eval $adveditor = $isfirstpost && $special || $special == 2 && ($_GET['action'] == 'newthread' || $_GET['action'] == 'reply' && !empty($_GET['addtrade']) || $_GET['action'] == 'edit' && $thread['special'] == 2);}--> 
  <!--{eval $advmore = !$showthreadsorts && !$special || $_GET['action'] == 'reply' && empty($_GET['addtrade']) || $_GET['action'] == 'edit' && !$isfirstpost && ($thread['special'] == 2 && !$special || $thread['special'] != 2);}-->
  <form method="post" name="postform" id="postform" enctype="multipart/form-data"
			{if $_GET[action] == 'newthread'}action="forum.php?mod=post&action={if $special != 2}newthread{else}newtrade{/if}&fid=$_G[fid]&extra=$extra&topicsubmit=yes&mobile=2"
			{elseif $_GET[action] == 'reply'}action="forum.php?mod=post&action=reply&fid=$_G[fid]&tid=$_G[tid]&extra=$extra&replysubmit=yes&mobile=2"
			{elseif $_GET[action] == 'edit'}action="forum.php?mod=post&action=edit&extra=$extra&editsubmit=yes&mobile=2" $enctype
			{/if}>
  <input type="hidden" name="formhash" id="formhash" value="{FORMHASH}" />
  <input type="hidden" name="posttime" id="posttime" value="{TIMESTAMP}" />
  <!--{if $_GET['action'] == 'edit'}-->
  <input type="hidden" name="delattachop" id="delattachop" value="0" />
  <!--{/if}--> 
  <!--{if !empty($_GET['modthreadkey'])}-->
  <input type="hidden" name="modthreadkey" id="modthreadkey" value="$_GET['modthreadkey']" />
  <!--{/if}-->
  <input type="hidden" name="wysiwyg" id="{$editorid}_mode" value="$editormode" />
  <!--{if $_GET[action] == 'reply'}-->
  <input type="hidden" name="noticeauthor" value="$noticeauthor" />
  <input type="hidden" name="noticetrimstr" value="$noticetrimstr" />
  <input type="hidden" name="noticeauthormsg" value="$noticeauthormsg" />
  <!--{if $reppid}-->
  <input type="hidden" name="reppid" value="$reppid" />
  <!--{/if}--> 
  <!--{if $_GET[reppost]}-->
  <input type="hidden" name="reppost" value="$_GET[reppost]" />
  <!--{elseif $_GET[repquote]}-->
  <input type="hidden" name="reppost" value="$_GET[repquote]" />
  <!--{/if}--> 
  <!--{/if}--> 
  <!--{if $_GET[action] == 'edit'}-->
  <input type="hidden" name="fid" id="fid" value="$_G[fid]" />
  <input type="hidden" name="tid" value="$_G[tid]" />
  <input type="hidden" name="pid" value="$pid" />
  <input type="hidden" name="page" value="$_GET[page]" />
  <!--{/if}--> 
  <!--{if $special}-->
  <input type="hidden" name="special" value="$special" />
  <!--{/if}--> 
  <!--{if $specialextra}-->
  <input type="hidden" name="specialextra" value="$specialextra" />
  <!--{/if}-->

	<div class="post_from cl">
		<ul class="cl">
			<li>
			<!--{if $_GET['action'] != 'reply'}-->
			<div class="post_select" style="display: block;">
                <select name="" onchange="javascript:location.href=this.value;">
                    <!--{if !$_G['forum']['allowspecialonly']}-->
                    <option  value="forum.php?mod=post&action=newthread&fid=$_G[fid]" {if $postspecialcheck[0]} selected="selected"{/if}>{lang post_newthread}</option>
                    <!--{/if}--> 
                    <!--{if $ceo_sortopen}-->
                    <!--{loop $_G['forum']['threadsorts'][types] $tsortid $name}-->
                    <option value="forum.php?mod=post&action=newthread&sortid=$tsortid&fid=$_G[fid]" {if $sortid == $tsortid} selected="selected" {/if}>{lang threadtype_option}:<!--{echo strip_tags($name);}--></option>
                    <!--{/loop}--> 
                    <!--{/if}--> 
                    <!--{if $_G['group']['allowpostpoll']}-->
                    <option value="forum.php?mod=post&action=newthread&fid=$_G[fid]&special=1" {if $postspecialcheck[1]} selected="selected"{/if}>{lang post_newthreadpoll}</option>
                    <!--{/if}--> 
                    <!--{if $_G['group']['allowpostreward']}-->
                    <option value="forum.php?mod=post&action=newthread&fid=$_G[fid]&special=3" {if $postspecialcheck[3]} selected="selected"{/if}>{lang post_newthreadreward}</option>
                    <!--{/if}--> 
                    <!--{if $_G['group']['allowpostdebate']}-->
                    <option value="forum.php?mod=post&action=newthread&fid=$_G[fid]&special=5" {if $postspecialcheck[5]} selected="selected"{/if}>{lang post_newthreaddebate}</option>
                    <!--{/if}--> 
                    <!--{if $_G['group']['allowpostactivity']}-->
                    <option value="forum.php?mod=post&action=newthread&fid=$_G[fid]&special=4" {if $postspecialcheck[4]} selected="selected"{/if}>{lang post_newthreadactivity}</option>
                    <!--{/if}--> 
                    <!--{if $_G['group']['allowposttrade']}-->
                    <option value="forum.php?mod=post&action=newthread&fid=$_G[fid]&special=2" {if $postspecialcheck[2]} selected="selected"{/if}>{lang post_newthreadtrade}</option>
                    <!--{/if}-->
                </select>
            </div>
			<!--{else}-->
			<!--{/if}--> 
			
 			<!--{subtemplate forum/post_editor_extra}-->
			</li>
			
			<!--{if $_GET[action] == 'edit' && $isorigauthor && ($isfirstpost && $thread['replies'] < 1 || !$isfirstpost) && !$rushreply && $_G['setting']['editperdel']}-->
			<li class="delthread">
				<input type="checkbox" name="delete" id="delete" class="pc" value="1" title="{lang post_delpost}{if $thread[special] == 3}{lang reward_price_back}{/if}"> {lang delete_check}
			</li>
			<!--{/if}-->
           
			<li class="post_message area cl">
			<textarea class="pt box_bg mtm nrk" id="needmessage" tabindex="3" autocomplete="off" id="{$editorid}_textarea" name="$editor[textarea]" cols="80" rows="2"  placeholder="{lang thread_content}" fwin="reply">$postinfo[message]</textarea>
			</li>
		</ul>
		<ul id="imglist" class="post_imglist cl">
<!--{if $_GET[action] == 'edit'}-->
        <!--{if !empty($imgattachs['used'])}--><!--{eval $imagelist = $imgattachs['used'];}-->
            <!--{template forum/ajax_imagelist}-->
        <!--{/if}-->
<!--{/if}-->
		</ul>
		
		<!--{if $_GET[action] != 'edit' && ($secqaacheck || $seccodecheck)}-->
		<!--{subtemplate common/seccheck}-->
		<!--{/if}-->
		<div class="post_btn"><button id="postsubmit" class="btn_default <!--{if $_GET[action] == 'edit'}-->btn_submit" disable="false"<!--{else}-->btn_disable" disable="true"<!--{/if}-->><span><!--{if $_GET[action] == 'newthread'}-->{lang send_thread}<!--{elseif $_GET[action] == 'reply'}-->{lang join_thread}<!--{elseif $_GET[action] == 'edit'}-->{lang edit_save}<!--{/if}--></span></button></div>
		<!--{hook/post_bottom_mobile}-->
	</div>
	</form>
</div>
<!--{if $_G[setting][fastsmilies]}-->
<script src="data/cache/common_smilies_var.js?eAa" type="text/javascript"></script>
<script type="text/javascript">
function seditor_insertunit(key, smilies) {
	 textarea = document.postform.message;
	 textarea.value += smilies;
	 textarea.focus();
}
function insertAtCursor(myField, myValue) {
	//IE support
	if (document.selection) {
	myField.focus();
	sel = document.selection.createRange();
	sel.text = myValue;
	sel.select();
}

//MOZILLA/NETSCAPE support 
else if (myField.selectionStart || myField.selectionStart == '0') {
	var startPos = myField.selectionStart;
	var endPos = myField.selectionEnd;
	// save scrollTop before insert www.keleyi.com
	var restoreTop = myField.scrollTop;
	myField.value = myField.value.substring(0, startPos) + myValue + myField.value.substring(endPos, myField.value.length);
	if (restoreTop > 0) {
		myField.scrollTop = restoreTop;
	}
	myField.focus();
	myField.selectionStart = startPos + myValue.length;
	myField.selectionEnd = startPos + myValue.length;
	} else {
		myField.value += myValue;
		myField.focus();
	}
} 

var j = 1, smilies_fastdata = '',  img, seditorkey = document.getElementById("needmessage");
for(i = 0;i < smilies_fast.length; i++) {
	if(j == 0) {
		smilies_fastdata += '<tr>';
	}
	j = ++j > 10 ? 0 : j;
	s = smilies_array[smilies_fast[i][0]][smilies_fast[i][1]][smilies_fast[i][2]];
	smilieimg = "static/" + 'image/smiley/' + smilies_type['_' + smilies_fast[i][0]][1] + '/' + s[2];
	smilies_fastdata += s ? '<td onclick="' + (typeof wysiwyg != 'undefined' ? 'insertSmiley(' + s[0] + ')': 'insertAtCursor(seditorkey, \'' + s[1].replace(/'/, '\\\'') + '\')') +
	'" ><img src="' + smilieimg + '" />' : '<td>';
}
</script>
<!--{/if}-->


<script type="text/javascript">
	(function() {
		var needsubject = needmessage = false;

		<!--{if $_GET[action] == 'reply'}-->
			needsubject = true;
		<!--{elseif $_GET[action] == 'edit'}-->
			needsubject = needmessage = true;
		<!--{/if}-->

		<!--{if $_GET[action] == 'newthread' || ($_GET[action] == 'edit' && $isfirstpost)}-->
		$('#needsubject').on('keyup input', function() {
			var obj = $(this);
			if(obj.val()) {
				needsubject = true;
				if(needmessage == true) {
					$('.btn_default').removeClass('btn_disable').addClass('btn_submit');
					$('.btn_default').attr('disable', 'false');
				}
			} else {
				needsubject = false;
				$('.btn_default').removeClass('btn_submit').addClass('btn_disable');
				$('.btn_default').attr('disable', 'true');
			}
		});
		<!--{/if}-->
		$('#needmessage').on('keyup input', function() {
			var obj = $(this);
			if(obj.val()) {
				needmessage = true;
				if(needsubject == true) {
					$('.btn_default').removeClass('btn_disable').addClass('btn_submit');
					$('.btn_default').attr('disable', 'false');
				}
			} else {
				needmessage = false;
				$('.btn_default').removeClass('btn_submit').addClass('btn_disable');
				$('.btn_default').attr('disable', 'true');
			}
		});

		$('#needmessage').on('scroll', function() {
			var obj = $(this);
			if(obj.scrollTop() > 0) {
				obj.attr('rows', parseInt(obj.attr('rows'))+2);
			}
		}).scrollTop($(document).height());
	 })();
</script>
<script type="text/javascript" src="template/mobile/toutiao_mobile/js/ajaxfileupload.js?{VERHASH}"></script>
<script type="text/javascript" src="template/mobile/toutiao_mobile/js/buildfileupload.js?{VERHASH}"></script>
<script type="text/javascript">
	var imgexts = typeof imgexts == 'undefined' ? 'jpg, jpeg, gif, png' : imgexts;
	var STATUSMSG = {
		'-1' : '{lang uploadstatusmsgnag1}',
		'0' : '{lang uploadstatusmsg0}',
		'1' : '{lang uploadstatusmsg1}',
		'2' : '{lang uploadstatusmsg2}',
		'3' : '{lang uploadstatusmsg3}',
		'4' : '{lang uploadstatusmsg4}',
		'5' : '{lang uploadstatusmsg5}',
		'6' : '{lang uploadstatusmsg6}',
		'7' : '{lang uploadstatusmsg7}(' + imgexts + ')',
		'8' : '{lang uploadstatusmsg8}',
		'9' : '{lang uploadstatusmsg9}',
		'10' : '{lang uploadstatusmsg10}',
		'11' : '{lang uploadstatusmsg11}'
	};
	var form = $('#postform');
	$(document).on('change', '#upimg #filedata', function() {
			popup.open('<div class="postloading"><img src="template/mobile/toutiao_mobile/img/imageloading.gif" width="35"></div>');

			uploadsuccess = function(data) {
				if(data == '') {
					popup.open('{lang uploadpicfailed}', 'alert');
				}
				var dataarr = data.split('|');
				if(dataarr[0] == 'DISCUZUPLOAD' && dataarr[2] == 0) {
					popup.close();
					ubbarrtach = '[attachimg]'  + dataarr[3] +'[/attachimg]';
					$('#imglist').append('<li><span aid="'+dataarr[3]+'" class="del"><a href="javascript:;"><img src="{STATICURL}image/mobile/images/icon_del.png"></a></span><span class="p_img"><a href="javascript:insertAtCursor(seditorkey,ubbarrtach);"><img style="height:54px;width:54px;" id="aimg_'+dataarr[3]+'" title="'+dataarr[6]+'" src="{$_G[setting][attachurl]}forum/'+dataarr[5]+'" /></a></span><input type="hidden" name="attachnew['+dataarr[3]+'][description]" /></li>');
				} else {
					var sizelimit = '';
					if(dataarr[7] == 'ban') {
						sizelimit = '{lang uploadpicatttypeban}';
					} else if(dataarr[7] == 'perday') {
						sizelimit = '{lang donotcross}'+Math.ceil(dataarr[8]/1024)+'K)';
					} else if(dataarr[7] > 0) {
						sizelimit = '{lang donotcross}'+Math.ceil(dataarr[7]/1024)+'K)';
					}
					popup.open(STATUSMSG[dataarr[2]] + sizelimit, 'alert');
				}
			};

			if(typeof FileReader != 'undefined' && this.files[0]) {//note 支持html5上传新特性
				
				$.buildfileupload({
					uploadurl:'misc.php?mod=swfupload&operation=upload&type=image&inajax=yes&infloat=yes&simple=2',
					files:this.files,
					uploadformdata:{uid:"$_G[uid]", hash:"<!--{eval echo md5(substr(md5($_G[config][security][authkey]), 8).$_G[uid])}-->"},
					uploadinputname:'Filedata',
					maxfilesize:"$swfconfig[max]",
					success:uploadsuccess,
					error:function() {
						popup.open('{lang uploadpicfailed}', 'alert');
					}
				});

			} else {

				$.ajaxfileupload({
					url:'misc.php?mod=swfupload&operation=upload&type=image&inajax=yes&infloat=yes&simple=2',
					data:{uid:"$_G[uid]", hash:"<!--{eval echo md5(substr(md5($_G[config][security][authkey]), 8).$_G[uid])}-->"},
					dataType:'text',
					fileElementId:'filedata',
					success:uploadsuccess,
					error: function() {
						popup.open('{lang uploadpicfailed}', 'alert');
					}
				});

			}
	});

	<!--{if 0 && $_G['setting']['mobile']['geoposition']}-->
	geo.getcurrentposition();
	<!--{/if}-->
	$('#postsubmit').on('click', function() {
		var obj = $(this);
		if(obj.attr('disable') == 'true') {
			return false;
		}

		obj.attr('disable', 'true').removeClass('btn_submit').addClass('btn_disable');
		popup.open('<div class="postloading"><img src="template/mobile/toutiao_mobile/img/loading.gif"></div>');

		var postlocation = '';
		if(geo.errmsg === '' && geo.loc) {
			postlocation = geo.longitude + '|' + geo.latitude + '|' + geo.loc;
		}

		$.ajax({
			type:'POST',
			url:form.attr('action') + '&geoloc=' + postlocation + '&handlekey='+form.attr('id')+'&inajax=1',
			data:form.serialize(),
			dataType:'xml'
		})
		.success(function(s) {
			popup.open(s.lastChild.firstChild.nodeValue);
		})
		.error(function() {
			popup.open('{lang networkerror}', 'alert');
		});
		return false;
	});

	$(document).on('click', '.del', function() {
		var obj = $(this);
		var mes = document.getElementById("needmessage");
		$.ajax({
			type:'GET',
			url:'forum.php?mod=ajax&action=deleteattach&inajax=yes&tid=$_G[tid]&pid=$pid&aids[]=' + obj.attr('aid'),
		})
		.success(function(s) {
			ubbarrtach = '[attachimg]'  + obj.attr('aid') + '[/attachimg]';
			shtml = mes.value;
			while( shtml.indexOf( ubbarrtach ) != -1 ) {
				 shtml = shtml.replace(ubbarrtach, ""); 
			}
			mes.value = shtml;
			obj.parent().remove();
			mes.focus();

		})
		.error(function() {
			popup.open('{lang networkerror}', 'alert');
		});
		return false;
	});


</script>
<script>
setTimeout(function(){
$('#fastsmilies').html('<table cellspacing="0" cellpadding="0" class="smilies"><tr>' + smilies_fastdata + '</tr></table>');
}, 0);
</script>
<div id="upfile"></div>
<div id="append_parent"></div>
<!--{template common/footer}-->