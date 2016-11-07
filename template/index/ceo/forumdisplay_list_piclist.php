<?php exit;?>
<div class="img-list clearfix">
        <!--{loop $thread['pics'] $key}-->                        
    <a class="img-wrap" href="forum.php?mod=viewthread&tid=$thread[tid]" target="_blank">
        <img src="$key">
    </a>
        <!--{/loop}-->
</div>