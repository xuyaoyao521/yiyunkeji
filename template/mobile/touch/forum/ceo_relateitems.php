<?php exit;?>
<!--{if $post['relateitem'] && $post['first']}-->
<div class="relateitem">
    <h3>{lang related_thread}:</h3>
    <ul>
        <!--{eval $rel = 0;}--> 
        <!--{loop $post['relateitem'] $var}--> 
        <!--{if $rel < $ceo_relateitems}-->
        <li><a href="forum.php?mod=viewthread&tid=$var[tid]">$var[subject]</a></li>
        <!--{/if}--> 
        <!--{eval $rel++;}--> 
        <!--{/loop}-->
    </ul>
</div>
<!--{/if}--> 
