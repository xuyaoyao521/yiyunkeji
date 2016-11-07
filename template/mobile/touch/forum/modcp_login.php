<?php exit;?>
<link rel="stylesheet" href="template/mobile/toutiao_mobile/css/forum/modcp.css" type="text/css" media="all">

<div class="modcp_box box_bg">
	<p class="xw1">{lang panel_login}</p>
	<p class="xg1">{lang panel_notice_login}</p>
	<form method="post" autocomplete="off" action="{$cpscript}?mod=modcp&action=login&mobile=2" class="exfm">
		<input type="hidden" name="formhash" value="{FORMHASH}" />
		<input type="hidden" name="fid" value="{$_G[fid]}" />
        <input type="hidden" name="uid" value="{$_GET[uid]}" />
		<input type="hidden" name="submit" value="yes" />
		<input type="hidden" name="login_panel" value="yes" />
		<p>{lang panel_login_username}: <strong>{$_G[member][username]}</strong></p>

        <p>{lang panel_login_password}:<input type="password" name="cppwd" id="cppwd" class="txt" /></p>

        <p class="mtn"><input type="submit" name="submit" id="submit"  value="{lang submit}" class="btn_default" /></p>
	</form>
</div>