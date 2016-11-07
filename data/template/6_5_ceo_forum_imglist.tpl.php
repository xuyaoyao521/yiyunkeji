<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>

        <?php $i = 0;?>        <?php if(is_array($toutiaolist)) foreach($toutiaolist as $thread) { ?>            <?php $i++;?>            
                
            <?php if($thread['attachment'] == 2) { ?>
                <?php if($thread['piccount'] >= 1 && $thread['piccount'] < 3) { ?>
                	
                <li>
                	
                             <a class="list" href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>">
                                    <div class="pic">
                                        <span class="pic_number"><?php echo $thread['piccount'];?>图</span>
                                        <img class="one fade" data-original="<?php echo $thread['pic'];?>" src="/public/images/placeholder.png">
                                    </div>
                                    <div class="t"><span><?php echo $thread['subject'];?></span></div>
                          </a>
                       
                </li>
                
                	
                	
               
                <?php } elseif($thread['piccount'] >= 3) { ?>
                	
                	<li>
                         <a class="list" href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>">
                                <div class="pic">
                                    <span class="pic_number"><?php echo $thread['piccount'];?>图</span>
                                    <?php $iii=0;?>                        <?php if(is_array($thread['pics'])) foreach($thread['pics'] as $key) { ?> 
                         <?php $iii++;?>    
                                    <div class="img  <?php if($iii==2) { ?>max<?php } ?>"><img class="fade" data-original="<?php echo $key;?>" src="/public/images/placeholder.png"></div>
                                   <?php } ?>
                                </div>
                                <div class="t"><span><?php echo $thread['subject'];?></span></div>
                            </a>
                   
                    </li>
                
                <?php } ?>
         
            <?php } ?>
                
        
        <?php } ?>

