<?php exit;?>
<div class="footer clearfix">
    <div class="left lfooter">
    <!--{subtemplate ceo/forumdisplay_list_title_label}-->
        <a class="lbtn source" href="forum.php?mod=forumdisplay&fid={$thread[fid]}" target="_blank">{$thread[name]}</a>&nbsp;&nbsp;-
        <a class="lbtn comment" href="forum.php?mod=viewthread&tid=$thread[tid]" target="_blank"><!--{if $thread[views] > 0}-->{$thread[views]}<!--{else}-->0<!--{/if}-->{echo m_lang('views')}</a>&nbsp;&nbsp;-
        <a class="lbtn comment" href="forum.php?mod=viewthread&tid=$thread[tid]" target="_blank"><!--{if $thread[replies] > 0}-->{$thread[replies]}<!--{else}-->0<!--{/if}-->{echo m_lang('reply')}</a>&nbsp;&nbsp;-
        <span class="lbtn time">{$thread[dateline]}</span>
    </div>
</div>