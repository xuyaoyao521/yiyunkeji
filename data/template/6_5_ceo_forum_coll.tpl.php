<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); 
0
|| checktplrefresh('./template/pc/ceo/forum_coll.htm', './template/pc/ceo/forumdisplay_list_pic.htm', 1477392133, '5', './data/template/6_5_ceo_forum_coll.tpl.php', './template/pc', 'ceo/forum_coll')
;?>

        <?php $i = 0;?>        <?php if(is_array($toutiaolist)) foreach($toutiaolist as $thread) { ?>            <?php $i++;?>            <li>
                
            <?php if($thread['attachment'] == 2) { ?>
                <?php if($thread['piccount'] >= 1 && $thread['piccount'] < 4) { ?>
                	<div class="pic <?php if($thread['fid'] == 40) { ?>video<?php } ?>"><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>" target="_blank">
    <img class="feedimg fade" data-original="<?php echo $thread['pic'];?>" src="/public/images/NO_IMG.jpg">
</a>
<?php if($thread['fid'] == 40) { ?><span class="time"><?php echo $thread['videotime'];?></span><?php } ?></div>
                <div class="data">
                	<div class="box">
                    	<div class="title"><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>"><span><?php echo $thread['subject'];?></span></a></div>
                        <?php if($thread['message']) { ?><div class="abstract"><?php echo $thread['message'];?></div><?php } ?>
                        <div class="info"><a href="home.php?mod=auther&amp;uid=<?php echo $thread['authorid'];?>"><img src="uc_server/avatar.php?uid=<?php echo $thread['authorid'];?>&amp;size=middle"><?php echo $thread['author'];?></a><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>"><?php if($thread['replies'] > 0) { ?><?php echo $thread['replies'];?><?php } else { ?>0<?php } ?>评价</a><a><?php echo $thread['dateline'];?></a><a href="javascript:;" onClick="coll_del(<?php echo $thread['tid'];?>,this)" class="del"><span>删除</span></a></div>
                    </div>
                </div>
                	
               
                <?php } elseif($thread['piccount'] >= 4) { ?>
                	<div class="data img">
                	<div class="title"><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>"><span><?php echo $thread['subject'];?></span></a></div>
                	<div class="box">
                    	<div class="img">
                         <?php $iii=0;?>                        <?php if(is_array($thread['pics'])) foreach($thread['pics'] as $key) { ?> 
                         <?php $iii++;?>                       
    <a  href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>" target="_blank">
        <img class="fade" data-original="<?php echo $key;?>" src="/public/images/NO_IMG.jpg">
        <?php if($iii==4) { ?>
        <span class="pic_number"><?php echo $thread['piccount'];?>图</span>
         <?php } ?>
    </a>
        <?php } ?>
                      </div>
                       <div class="info"><a href="home.php?mod=auther&amp;uid=<?php echo $thread['authorid'];?>"><img src="uc_server/avatar.php?uid=<?php echo $thread['authorid'];?>&amp;size=middle"><?php echo $thread['author'];?></a><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>"><?php if($thread['replies'] > 0) { ?><?php echo $thread['replies'];?><?php } else { ?>0<?php } ?>评价</a><a><?php echo $thread['dateline'];?></a><a href="javascript:;" onClick="coll_del(<?php echo $thread['tid'];?>,this)" class="del"><span>删除</span></a></div>
                    </div>
                </div>
                	
                	
                  
                <?php } else { ?>
                  
               <div class="data words">
                	<div class="box">
                    	<div class="title"><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>"><span><?php echo $thread['subject'];?></span></a></div>
                       <?php if($thread['message']) { ?><div class="abstract"><?php echo $thread['message'];?></div><?php } ?>
                         <div class="info"><a href="home.php?mod=auther&amp;uid=<?php echo $thread['authorid'];?>"><img src="uc_server/avatar.php?uid=<?php echo $thread['authorid'];?>&amp;size=middle"><?php echo $thread['author'];?></a><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>"><?php if($thread['replies'] > 0) { ?><?php echo $thread['replies'];?><?php } else { ?>0<?php } ?>评价</a><a><?php echo $thread['dateline'];?></a><a href="javascript:;" onClick="coll_del(<?php echo $thread['tid'];?>,this)" class="del"><span>删除</span></a></div>
                    </div>
                </div>
                <?php } ?>
            <?php } else { ?>
            
            		<div class="data words">
                	<div class="box">
                    	<div class="title"><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>"><span><?php echo $thread['subject'];?></span></a></div>
                       <?php if($thread['message']) { ?><div class="abstract"><?php echo $thread['message'];?></div><?php } ?>
                         <div class="info"><a href="home.php?mod=auther&amp;uid=<?php echo $thread['authorid'];?>"><img src="uc_server/avatar.php?uid=<?php echo $thread['authorid'];?>&amp;size=middle"><?php echo $thread['author'];?></a><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>"><?php if($thread['replies'] > 0) { ?><?php echo $thread['replies'];?><?php } else { ?>0<?php } ?>评价</a><a><?php echo $thread['dateline'];?></a><a href="javascript:;" onClick="coll_del(<?php echo $thread['tid'];?>,this)"  class="del"><span>删除</span></a></div>
                    </div>
                </div>
                
                
                
            <?php } ?>
                
            </li>
        <?php } ?>

