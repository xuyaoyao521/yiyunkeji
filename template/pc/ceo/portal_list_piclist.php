<?php exit;?>
<div class="img-list clearfix">
        <!--{loop $thread['pics'] $key}-->                        
    <a class="img-wrap" href="portal.php?mod=view&aid={$thread[aid]}" target="_blank">
        <img src="data/attachment/portal/$key.thumb.jpg">
    </a>
        <!--{/loop}-->
</div>