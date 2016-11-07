<?php exit;?>
<div class="item_info">
    <span class="src space">{$thread[catname]}</span>
    <span class="src space">{$thread[username]}</span>
    <span class="cmt space">{echo m_lang('views')}&nbsp;{$thread['viewnum']}</span>
    <!--{if $thread['allowcomment'] == 1}-->
    <span class="cmt space">{echo m_lang('reply')}&nbsp;{$thread['commentnum']}</span>
    <!--{/if}-->
    <span class="time">{$thread[dateline]}</span>
</div>
