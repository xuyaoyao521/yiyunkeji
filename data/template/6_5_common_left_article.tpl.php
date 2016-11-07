<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); 
block_get('101');?>

    <!--Focus_News-->
          <div class="Focus_News">
            <h2 class="caption">24小时要闻</h2>
            
            
           
            
           <?php block_display('101');?>           
        </div>
<!--Focus_News End-->
    
    <!--Selected_pic-->
    	<div class="Selected_pic">
        	<div class="title">精彩图片</div>
            
            <?php if(is_array($piclist)) foreach($piclist as $v) { ?>            <a class="list" href="forum.php?mod=viewthread&amp;tid=<?php echo $v['tid'];?>">
            	<div class="pic">
                    <span class="pic_number"><?php echo $v['picnum'];?>图</span>
                    <?php if($v['picnum']>2) { ?>
                    <?php $i=0;?>                    	 <?php if(is_array($v['piclist'])) foreach($v['piclist'] as $vvv) { ?>                         <?php $i++;?>                    <div class="img <?php if($i==2) { ?>max<?php } ?>" ><img src="data/attachment/forum/<?php echo $vvv['attachment'];?>"></div>
                    	<?php } ?>
                    <?php } else { ?>
                    
                    <?php $i=0;?>                     <?php if(is_array($v['piclist'])) foreach($v['piclist'] as $vvv) { ?>                     <?php $i++;?>                     <?php if($i==1) { ?>
                    <img class="one" src="data/attachment/forum/<?php echo $vvv['attachment'];?>">
                    <?php } ?>
                    <?php } ?>
                    <?php } ?>
                </div>
                <div class="t"><span><?php echo $v['title'];?></span></div>
            </a>
            

            
          
             <?php } ?>
           
        </div>
    <!--Selected_pic END-->
    
    <!--Selected_video-->
    	<div class="Selected_video">
        	<div class="title">热门视频</div>
            <?php if(is_array($videolist)) foreach($videolist as $v) { ?>             <a class="list" href="forum.php?mod=viewthread&amp;tid=<?php echo $v['tid'];?>&amp;from=portal">
            	<div class="pic">
                    <span class="time"><?php echo $v['videotime'];?></span>
                    <img class="left" data-original="<?php echo $v['thumb'];?>" src="/public/images/NO_IMG.jpg">
                </div>
                <div class="t"><span><?php echo $v['title'];?></span></div>
            </a>
            <?php } ?>
            
            
        </div>
    <!--Selected_video END-->
   
    
  	
   