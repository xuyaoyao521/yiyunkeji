<?php exit;?>
<!--{subtemplate common/header}-->
<script>SetWebTitle("{lang confirms}");SetTopLeftNav("backpage");</script>
<link rel="stylesheet" href="template/mobile/toutiao_mobile/css/portal/portal.css" type="text/css" media="all">
<div class="pt box_bg"><a href="javascript:history.back();" onclick="javascript:history.back();" >{lang back}</a> <em> &gt; </em> {lang article_delete}</div> 
<div class="bm_c box_bg">
<!--{if $op == 'delete'}-->
<form method="post" autocomplete="off" action="portal.php?mod=portalcp&ac=article&op=delete&aid=$_GET[aid]">
        <!--{if $_G['group']['allowpostarticlemod'] && $article['status'] == 1}-->
		{lang article_delete_sure}
		<input type="hidden" name="optype" value="0" class="pc" />
		<!--{else}-->
		<p class="mtm mbm xg1"><label class="lb"><input type="radio" name="optype" value="0" class="pc" /> {lang article_delete_direct}</label></p>
		<p class="mbm xg1"><label class="lb"><input type="radio" name="optype" value="1" class="pc" checked="checked" /> {lang article_delete_recyclebin}</label></p>
		<!--{/if}-->

	<button type="submit" name="btnsubmit" value="true" class="btn_default btn_submit"><strong>{lang confirms}</strong></button>
	<input type="hidden" name="aid" value="$_GET[aid]" />
	<input type="hidden" name="referer" value="{echo dreferer()}" />
	<input type="hidden" name="deletesubmit" value="true" />
	<input type="hidden" name="formhash" value="{FORMHASH}" />
</form>
<!--{else}-->
<div class="wmt"><a href="javascript:history.back();" onclick="javascript:history.back();" >{lang goback}</a></div>
<!--{/if}-->
</div>
<!--{subtemplate common/footer}-->