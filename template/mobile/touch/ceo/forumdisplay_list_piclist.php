<?php exit;?>
<div class="list_image">
    <ul class="clearfix">
        <!--{loop $thread['pics'] $key}-->                        
        <li class="list_img_holder" style="background: none;"><span><img src="$key" onload="resize(this, $ceo_picwidth, $ceo_picheight, 1)"></span></li>
        <!--{/loop}-->
    </ul>
</div>
