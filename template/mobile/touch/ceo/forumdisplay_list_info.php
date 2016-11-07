<?php exit;?>
<div class="item_info">
    <span class="src space">{$thread[name]}</span>
    <span class="src space"><!--{if $thread['authorid'] && $thread['author']}-->{$thread[author]}<!--{else}--><!--{if $_G['forum']['ismoderator']}-->{lang anonymous}<!--{else}-->{$_G[setting][anonymoustext]}<!--{/if}--><!--{/if}--></span>
    <span class="cmt space">{echo m_lang('views')}&nbsp;<!--{if $thread[views] > 0}-->{$thread[views]}<!--{else}-->0<!--{/if}--></span>
    <span class="cmt space">{echo m_lang('reply')}&nbsp;<!--{if $thread[replies] > 0}-->{$thread[replies]}<!--{else}-->0<!--{/if}--></span>
    <span class="time">{$thread[dateline]}</span>
</div>
