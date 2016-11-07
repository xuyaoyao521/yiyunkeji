<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('forun_yuqinglist');?><?php include template('common/header'); ?><!--frame_adv-->
<div class="frame_adv public_width" style="display:none;"><?php echo adshow("custom_1");?></div>
<!--frame_adv END-->

<!--frame_main-->
<div class="frame_main public_width font_yahei"><?php include template('common/left_yuqing'); include template('common/yuqing'); ?>    
    <div class="right">
    
        <?php include template('ceo/toutiao'); ?>       
        
    </div>
</div>
<!--frame_main END-->

</body>

<script src="/public/js/Public_index.js" type="text/javascript"></script>

</html>
