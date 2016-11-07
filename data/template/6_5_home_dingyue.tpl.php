<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('common/header_home'); ?><div class="usercenter_content">

<div class="usercenter_content_l usercenter_content_l2 font_yahei">
<h5>我的订阅</h5>
<ul>
                    <li><a href="javascript:;" class="on">全部<span><?php echo $dycount;?></span></a></li>
                   

        </li>
    </ul>

</div>
<div class="usercenter_content_r font_yahei">
             <?php if($dycount<=0) { ?>
<div class="NO_data">
                暂无订阅
                </div>
<?php } else { ?>
<div class="usercenter_Subscribe_list">
                	<ul>
                    
                    
                    <?php if(is_array($dylist)) foreach($dylist as $list) { ?>                        <li>
                            <div class="pic"><a href="home.php?mod=auther&amp;uid=<?php echo $list['uid'];?>"><img src="uc_server/avatar.php?uid=<?php echo $list['uid'];?>&amp;size=middle"></a></div>
                            <div class="info"><p class="font_yahei"><a href="home.php?mod=auther&amp;uid=<?php echo $list['uid'];?>"><?php echo $list['username'];?></a></p><p><?php echo $list['jianjie'];?></p></div>
                            <a href="javascript:;" class="cancel" onClick="dingyue_del(<?php echo $list['uid'];?>,this)" title="取消订阅"></a>
                        </li>
                        <?php } ?>
                        
                    </ul>
                </div>
 <?php } ?>
</div>
<div class="clear"></div>
</div>
<script src="/public/js/Public_index.js" type="text/javascript"></script>
        
        <?php include template('common/footer'); ?>