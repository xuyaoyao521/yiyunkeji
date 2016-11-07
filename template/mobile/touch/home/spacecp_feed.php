<?php exit;?>
<!--{subtemplate common/header}-->
<script>SetWebTitle("{lang delete_feed}");SetTopLeftNav("backpage");</script>

<div class="bm_c box_bg">
	<form method="post" autocomplete="off" id="feedform_{$feedid}" name="feedform_{$feedid}" action="home.php?mod=spacecp&ac=feed&op=delete&feedid=$feedid&handlekey=$_GET[handlekey]" {if $_G[inajax]}onsubmit="ajaxpost(this.id, 'return_$_GET[handlekey]');"{/if}>
		<input type="hidden" name="referer" value="{echo dreferer()}" />
		<input type="hidden" name="feedsubmit" value="true" />
		<input type="hidden" name="formhash" value="{FORMHASH}" />
		<div class="xg1 mbm mtm">{lang determine_delete_feed}</div>
		<div class="mbm">
			<button name="feedsubmitbtn" type="submit" class="btn_default btn_submit" value="true"><strong>{lang determine}</strong></button>
		</div>
	</form>
</div>
	<script type="text/javascript">
		function succeedhandle_$_GET[handlekey](url, msg, values) {
			var obj = $('feed_'+ values['feedid'] +'_li');
			obj.style.display = "none";
			hideWindow('$_GET['handlekey']');
		}
	</script>

<!--{subtemplate common/footer}-->
