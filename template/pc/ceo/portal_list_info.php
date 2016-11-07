<?php exit;?>
<div class="footer clearfix">
    <div class="left lfooter">
        <a class="lbtn source" href="portal.php?mod=list&catid={$thread[catid]}" target="_blank">{$thread[catname]}</a>&nbsp;&nbsp;-
        <a class="lbtn comment" href="portal.php?mod=view&aid={$thread[aid]}" target="_blank"><!--{if $thread[viewnum] > 0}-->{$thread[viewnum]}<!--{else}-->0<!--{/if}-->{echo m_lang('views')}</a>&nbsp;&nbsp;-
        <a class="lbtn comment" href="portal.php?mod=view&aid={$thread[aid]}" target="_blank"><!--{if $thread[commentnum] > 0}-->{$thread[commentnum]}<!--{else}-->0<!--{/if}-->{echo m_lang('reply')}</a>&nbsp;&nbsp;-
        <span class="lbtn time">{$thread[dateline]}</span>
    </div>
</div>