<!--{hook/viewthread_top_mobile}-->
<script>SetWebTitle("$_G['forum']['name']");SetTopLeftNav("forum_backpage");</script>
<link rel="stylesheet" href="template/mobile/toutiao_mobile/css/forum/viewthread.css" type="text/css" media="all">
<style>
	.viewpi{ background:none; border:none; margin-bottom:5px;}
	#ceo_reply_click{ background:#333; border:none; color:#fafafa; margin-top:5px;}
</style>
<div class="content" style=" background:none;"><!--{subtemplate forum/forumdisplay_fastpost}--></div>
<form method="post" autocomplete="off" name="modactions" id="modactions">
	<input type="hidden" name="formhash" value="{FORMHASH}" />
	<input type="hidden" name="optgroup" />
	<input type="hidden" name="operation" />
	<input type="hidden" name="listextra" value="$_GET[extra]" />
	<input type="hidden" name="page" value="$page" />
</form>

<div id="box" style="display:none;" class=""></div>

<div id="share_other" class="sharepop share_qt" style="display:none; background:none;">
    <div onclick="sharenv('hide')" style="width: 100%;height: 100%"></div>
    <div class="share_fx">
        <p onclick="sharenv('share_qt')">{echo m_lang('share_tit')}</p>
        <ul onclick="sharenv('share_qt')">
            <li><a href="javascript:;" onclick="WeiXinShareBtn()"><span></span>{echo m_lang('share_weixin')}</a></li>
            <li><a href="javascript:;" onclick="jiathis_mh5.sendTo('qzone');"><span class="fx_qq"></span>{echo m_lang('share_qzone')}</a></li>
            <li><a href="javascript:;" onclick="jiathis_mh5.sendTo('tsina');"><span class="fx_sina"></span>{echo m_lang('share_tsina')}</a></li>
            <li><a href="javascript:;" onclick="jiathis_mh5.sendTo('tqq');"><span class="fx_qqkj"></span>{echo m_lang('share_tqq')}</a></li>
        </ul>
        <!-- JiaThis Button BEGIN -->
<script src="template/mobile/toutiao_mobile/js/jiathis_m.js"></script>
        <!-- JiaThis Button END -->
    <p onclick="sharenv('hide')">{echo m_lang('share_exit')}</p>
</div>
</div>
<script>
function sharenv(action) {
	if (action == 'share_qt') {
		$('#share_other').fadeIn(350);
		$(".share_fx").slideDown();
	} else {
		$(".share_fx").slideUp();
		$('#share_other').fadeOut(350);
	}
}

</script>