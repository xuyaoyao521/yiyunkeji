<?php exit;?>
<li class="blogc">

<a name="comment_anchor_$value[cid]"></a>
	<!--{if $value[author]}-->
	<div class="blogc_avt"><a href="home.php?mod=space&uid=$value[authorid]" c="1"><!--{avatar($value[authorid],small)}--></a></div>
	<!--{else}-->
	<div class="blogc_avt"><img src="{STATICURL}image/magic/hidden.gif" alt="hidden" /></div>
	<!--{/if}-->
	<div class="mbm">
		<span class="y">                
		<!--{if $_G[uid]}-->
			<!--{if $value[authorid]==$_G[uid]}-->
				<a href="home.php?mod=spacecp&ac=comment&op=edit&cid=$value[cid]&handlekey=editcommenthk_{$value[cid]}" id="c_$value[cid]_edit" onclick="showWindow(this.id, this.href, 'get', 0);">{lang edit}</a>
			<!--{/if}-->
			<!--{if $value[authorid]==$_G[uid] || $value[uid]==$_G[uid] || checkperm('managecomment')}-->
				<a href="home.php?mod=spacecp&ac=comment&op=delete&cid=$value[cid]&handlekey=delcommenthk_{$value[cid]}" id="c_$value[cid]_delete" onclick="showWindow(this.id, this.href, 'get', 0);">{lang delete}</a>
			<!--{/if}-->
		<!--{/if}-->
		</span>

		<!--{if $value[author]}-->
		<a href="home.php?mod=space&uid=$value[authorid]" id="author_$value[cid]">{$value[author]}</a>
		<!--{else}-->
		$_G[setting][anonymoustext] 
		<!--{/if}-->        
		<span class="xg1"><!--{date($value[dateline])}--></span>
        
	</div>
	<div class="magicflicker"><!--{if $value[status] == 0 || $value[authorid] == $_G[uid] || $_G[adminid] == 1}-->$value[message]<!--{else}--> {lang moderate_not_validate} <!--{/if}--></div>
    
    </li>