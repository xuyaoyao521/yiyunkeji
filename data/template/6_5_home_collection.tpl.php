<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('common/header_home'); ?><style>
.info_page{ text-align:center}
</style>
<div class="usercenter_content">

<div class="usercenter_content_l usercenter_content_l2 font_yahei">
<h5>我的收藏</h5>
<ul>
                    <li><a href="home.php?mod=collection&amp;type=1" <?php if($type=="1") { ?>class="on" <?php } ?>>文章收藏</a></li>
                    <li><a href="home.php?mod=collection&amp;type=2" <?php if($type=="2") { ?>class="on" <?php } ?>>图片收藏</a></li>
                    <li><a href="home.php?mod=collection&amp;type=3" <?php if($type=="3") { ?>class="on" <?php } ?>>视频收藏</a></li>
                    <li><a href="home.php?mod=collection&amp;type=4" <?php if($type=="4") { ?>class="on" <?php } ?>>段子收藏</a></li>
                    <li><a href="home.php?mod=collection&amp;type=5" <?php if($type=="5") { ?>class="on" <?php } ?>>帖子收藏</a></li>
                    

        </li>
    </ul>

</div>
           
<div class="usercenter_content_r font_yahei">
             <?php if($allcount<=0) { ?>
<div class="NO_data">
                暂无收藏
                </div>
<?php } else { ?>
<div class="usercenter_content_r_bottom">


<ul class="tabBox">
<li class="on"><a href="javascript:;"><?php if($type=="1") { ?>文章<?php } if($type=="2") { ?>图片<?php } if($type=="3") { ?>视频<?php } if($type=="4") { ?>段子<?php } if($type=="5") { ?>帖子<?php } ?></a></li>
                               
</ul>

                    <div class="main">
                    	<div>
                        <?php if($type<=3) { ?>
                    <?php include template('ceo/collection_arc'); ?>                        <?php } elseif($type==4) { ?>
                        <?php include template('ceo/collection_duanzi'); ?>                        <?php } else { ?>
                          <?php include template('ceo/collection_tiezi'); ?>                          <?php } ?>
                        </div>
                       
                    </div>
                   <?php } ?>

</div>

</div>
            
<div class="clear"></div>
</div>
<script src="/public/js/Public_index.js" type="text/javascript"></script><?php include template('common/footer'); ?>