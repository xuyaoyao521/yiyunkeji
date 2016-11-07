<?php exit;?>
<div class="item_info">
    <span class="src space">{$thread[username]}</span>
    <span class="cmt space">{echo p_lang('click1')}&nbsp;{$thread['click1']}</span>
    <!--{if $thread['allowcomment'] == 1}-->
    <span class="cmt space">{echo p_lang('reply')}&nbsp;<!--{if $thread['reply'] > 0}-->{$thread['reply']}<!--{else}-->0<!--{/if}--></span>
    <!--{/if}-->
    <span class="time">{$thread[dateline]}</span>
</div>
