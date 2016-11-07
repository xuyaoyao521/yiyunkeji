<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); 
0
|| checktplrefresh('./template/mobile/touch/common/pinglun2.htm', './template/mobile/touch/forum/forumdisplay_fastpost.htm', 1478249824, '3', './data/template/4_3_touch_common_pinglun2.tpl.php', './template/mobile', 'touch/common/pinglun2')
|| checktplrefresh('./template/mobile/touch/common/pinglun2.htm', './template/mobile/touch/common/seccheck.htm', 1478249824, '3', './data/template/4_3_touch_common_pinglun2.tpl.php', './template/mobile', 'touch/common/pinglun2')
;?>
<script>SetWebTitle("<?php echo $_G['forum']['name'];?>");SetTopLeftNav("forum_backpage");</script>
<link rel="stylesheet" href="template/mobile/toutiao_mobile/css/forum/viewthread.css" type="text/css" media="all">
<style>
.viewpi{ background:none; border:none; margin-bottom:5px;}
#ceo_reply_click{ background:#333; border:none; color:#fafafa; margin-top:5px;}
</style>
<div class="content" style=" background:none;"><?php $ceo_btoolopen = 0;?><form method="post" autocomplete="off" id="fastpostform" action="forum.php?mod=post&amp;action=reply&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;extra=<?php echo $_GET['extra'];?>&amp;replysubmit=yes&amp;mobile=2">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
    <div class="viewpi" id="ceo_reply">
        <div class="fastpostbox">
        <input type="text" id="ceo_reply_click" onclick=" $('#ceo_reply_post,#ceo_reply_hide').show();                               $('#fastpostmessage').focus().val('').attr('placeholder', '<?php echo m_lang('post_default_text1'); ?>');" class="input finp" placeholder="<?php echo m_lang('post_default_text2'); ?>">
        </div>
        <div class="icon_box">
        	<ul>
            	<li class="reply_view"><a href="javascript:;"><i class="iconfont icon-xinxi"></i><?php if($_G['forum_thread']['allreplies']) { ?><span><?php echo $_G['forum_thread']['allreplies'];?></span><?php } ?></a></li>
            	<script>
var rep_height=$(".mobile_evaluate_main").offset().top;
                	$(".reply_view a").click(function(){

$('html,body').animate({'scrollTop':rep_height-45},500);	
})
                </script>
            	<li class="fav_view"><a href="home.php?mod=spacecp&amp;ac=favorite&amp;type=thread&amp;id=<?php echo $_G['tid'];?>" class="favbtn<?php if($thread['shoucang']) { ?> xi1<?php } ?>"><i class="iconfont icon-biaoxing"></i><?php if(!$_G['forum_thread']['favtimes']) { ?><span></span><?php } ?></a></li>
                
               <li class="share_view"><a href="javascript:sharenv('share_qt')"><i class="iconfont icon-fenxiang2"></i></a></li>
            	
            </ul>
        </div>
    </div>
    

<div id="ceo_reply_hide" style="position: fixed; width: 100%; height: 100%; left: 0px; top: 0px; opacity: 0.5; z-index: 80; display: none; background: rgb(0, 0, 0);" onclick="$('#ceo_reply_post,#ceo_reply_hide').hide(); $(this).empty().hide();"></div>
<div class="viewpi_t" id="ceo_reply_post" style="display: none;">
<ul class="fastpost">
<?php if($_G['forum_thread']['special'] == 5 && empty($firststand)) { ?>
<li>
<select id="stand" name="stand" >
<option value="">!debate_viewpoint!</option>
<option value="0">!debate_neutral!</option>
<option value="1">正方</option>
<option value="2">反方</option>
</select>
</li>
<?php } ?>
<li<?php if($secqaacheck || $seccodecheck) { ?> class="mbm" <?php } ?>><textarea type="text" value="我也说一句" class="input grey" color="gray" name="message" id="fastpostmessage"></textarea></li>
<li id="fastpostsubmitline"><?php if($secqaacheck || $seccodecheck) { $sechash = 'S'.random(4);
$sectpl = !empty($sectpl) ? explode("<sec>", $sectpl) : array('<br />',': ','<br />','');	
$ran = random(5, 1);?><?php if($secqaacheck) { $message = '';
$question = make_secqaa();
$secqaa = lang('core', 'secqaa_tips').$question;?><?php } if($sectpl) { if($secqaacheck) { ?>
<p class="mbm">        
        <span class="xg2"><?php echo $secqaa;?></span><br />
<input name="secqaahash" type="hidden" value="<?php echo $sechash;?>" />
        <input name="secanswer" id="secqaaverify_<?php echo $sechash;?>" type="text" class="txt" />
        </p>
<?php } if($seccodecheck) { ?>
<div class="sec_code vm mbm">
<input name="seccodehash" type="hidden" value="<?php echo $sechash;?>" />
<input type="text" class="txt px vm" style="ime-mode:disabled;width:60px;background:white;" autocomplete="off" value="" id="seccodeverify_<?php echo $sechash;?>" name="seccodeverify" placeholder="验证码" fwin="seccode">
        <img src="misc.php?mod=seccode&amp;update=<?php echo $ran;?>&amp;idhash=<?php echo $sechash;?>&amp;mobile=2" class="seccodeimg"/>
</div>
<?php } } ?>
<script type="text/javascript">
(function() {
$('.seccodeimg').on('click', function() {
$('#seccodeverify_<?php echo $sechash;?>').attr('value', '');
var tmprandom = 'S' + Math.floor(Math.random() * 1000);
$('.sechash').attr('value', tmprandom);
$(this).attr('src', 'misc.php?mod=seccode&update=<?php echo $ran;?>&idhash='+ tmprandom +'&mobile=2');
});
})();
</script>
<?php } ?><input type="button" value="发表" class="btn_default btn_threplay" name="replysubmit" id="fastpostsubmit"><?php if(!empty($_G['setting']['pluginhooks']['viewthread_fastpost_button_mobile'])) echo $_G['setting']['pluginhooks']['viewthread_fastpost_button_mobile'];?></li>
</ul>
</div>
    </form>

<script type="text/javascript">
(function() {
var form = $('#fastpostform');
<?php if(!$_G['uid'] || $_G['uid'] && !$allowpostreply) { ?>
$('#fastpostmessage').on('focus', function() {
<?php if(!$_G['uid']) { ?>
$('#ceo_reply_post,#ceo_reply_hide').hide();  
popup.open('您还未登录，立即登录?', 'confirm', 'member.php?mod=logging&action=login');
<?php } else { ?>
popup.open('您暂时没有权限发表', 'alert');

<?php } ?>


});
<?php } else { ?>
/*
$('#fastpostmessage').on('focus', function() {
var obj = $(this);
if(obj.attr('color') == 'gray') {
obj.attr('value', '');
obj.removeClass('grey');
obj.attr('color', 'black');
$('#fastpostsubmitline').css('display', 'block');
}
})
.on('blur', function() {
var obj = $(this);
if(obj.attr('value') == '') {
obj.addClass('grey');
obj.attr('value', '我也说一句');
obj.attr('color', 'gray');
}
});
*/
<?php } ?>
$('#fastpostsubmit').on('click', function() {

var msgobj = $('#fastpostmessage');
if(msgobj.val() == '我也说一句') {
msgobj.attr('value', '');
}
$.ajax({
type:'POST',
url:form.attr('action') + '&handlekey=fastpost&loc=1&inajax=1',
data:form.serialize(),
dataType:'xml'
})
.success(function(s) {
evalscript(s.lastChild.firstChild.nodeValue);
$('#ceo_reply_post,#ceo_reply_hide').hide(); 
$(this).empty().hide();




})
.error(function() {
window.location.href = obj.attr('href');
popup.close();
});
return false;
});

$('#replyid').on('click', function() {
$(document).scrollTop($(document).height());
$('#fastpostmessage')[0].focus();
});

})();

function succeedhandle_fastpost(locationhref, message, param) {
var pid = param['pid'];
var tid = param['tid'];
if(pid) {
$.ajax({
type:'POST',
url:'forum.php?mod=viewthread&tid=' + tid + '&viewpid=' + pid + '&mobile=2',
dataType:'xml'
})
.success(function(s) {
alert("发表成功！");
$('#post_new').append(s.lastChild.firstChild.nodeValue);

})
.error(function() {
window.location.href = 'forum.php?mod=viewthread&tid=' + tid;
popup.close();
});
} else {
if(!message) {
message = '本版回帖需要审核，您的帖子将在通过审核后显示';
}
popup.open(message, 'alert');
}
$('#fastpostmessage').attr('value', '');
if(param['sechash']) {
$('.seccodeimg').click();
}
}

function errorhandle_fastpost(message, param) {
popup.open(message, 'alert');
}
</script>
</div>
<form method="post" autocomplete="off" name="modactions" id="modactions">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="optgroup" />
<input type="hidden" name="operation" />
<input type="hidden" name="listextra" value="<?php echo $_GET['extra'];?>" />
<input type="hidden" name="page" value="<?php echo $page;?>" />
</form><?php include template('common/share'); ?>