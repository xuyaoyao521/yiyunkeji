<?php exit;?>
<!--{subtemplate common/header}-->
<div class="pt box_bg"><a href="javascript:history.back();" onclick="javascript:history.back();" >{lang back}</a> <em> &gt; </em> {lang delete_log}</div>
<div class="bm_c box_bg">
	<form method="post" autocomplete="off" id="doingform_{$doid}_{$id}" name="doingform" action="home.php?mod=spacecp&ac=doing&op=delete&doid=$doid&id=$id">
		<!--{if $_G[inajax]}--><input type="hidden" name="handlekey" value="$_GET[handlekey]" /><!--{/if}-->
		<input type="hidden" name="referer" value="{echo dreferer()}" />
		<input type="hidden" name="formhash" value="{FORMHASH}" />
        <div class="mbm mtm xg1">{lang determine_delete_doing}</div>
		<button name="deletesubmit" type="submit" class="btn_default btn_submit" value="true">{lang determine}</button>
	</form>
    </div>
<!--{subtemplate common/footer}-->