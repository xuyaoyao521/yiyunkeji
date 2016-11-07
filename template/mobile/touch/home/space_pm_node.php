<?php exit;?>
<!--{if $value[msgfromid] != $_G['uid']}-->
<div class="friend_msg cl">
	<img style="height:32px;width:32px;" src="<!--{avatar($value[msgfromid], small, true)}-->" class="avatar_img" />
    <div class="date"><!--{date($value[dateline], 'u')}--></div>
	<div class="dialog_green">
		<div class="dialog_c">
			<div class="dialog_t">$value[message]</div>
		</div>		
	</div>
</div>
<!--{else}-->
<div class="self_msg cl">
	<img style="height:32px;width:32px;" src="<!--{avatar($value[msgfromid], small, true)}-->" class="avatar_img" />
    <div class="date"><!--{date($value[dateline], 'u')}--></div>
	<div class="dialog_white">			
		<div class="dialog_c">
			<div class="dialog_t">$value[message]</div>
		</div>		
	</div>
</div>
<!--{/if}-->
