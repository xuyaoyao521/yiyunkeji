<?php exit;?>
    <div class="celi box_bg">    
    <a href="home.php?mod=space&uid=$comment[uid]" class="avatar"><!--{avatar($comment['uid'],small)}--></a>        
	<div class="user">
    <!--{if !empty($comment['uid'])}-->
		<a href="home.php?mod=space&uid=$comment[uid]" class="xi2">$comment[username]</a>
	<!--{else}-->
		{lang guest}
	<!--{/if}-->
    <!--{if $comment[status] == 1}-->({lang moderate_need})<!--{/if}-->
    <em class="p_dl">{echo date('m-d H:i',$comment['dateline']);}</em>
    </div>
    
    <p class="mess"><!--{if $_G[adminid] == 1 || $comment[uid] == $_G[uid] || $comment[status] != 1}-->$comment[message]<!--{else}-->{lang moderate_not_validate}<!--{/if}--></p>
    
    		<!--{if ($_G['group']['allowmanagearticle'] || $_G['uid'] == $comment['uid']) && $_G['groupid'] != 7 && !$article['idtype']}-->
            <div class="vtrim">
			<a href="portal.php?mod=portalcp&ac=comment&op=edit&cid=$comment[cid]" id="c_$comment[cid]_edit" class="xi2" onclick="showWindow(this.id, this.href, 'get', 0);">{lang edit}</a>
            <span class="pipe">|</span>
			<a href="portal.php?mod=portalcp&ac=comment&op=delete&cid=$comment[cid]" id="c_$comment[cid]_delete" class="xi2" onclick="showWindow(this.id, this.href, 'get', 0);">{lang delete}</a>
            </div>
		<!--{/if}-->    
	</div>
