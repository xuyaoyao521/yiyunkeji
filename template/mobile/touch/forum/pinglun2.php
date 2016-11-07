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
<!--{template common/share}-->