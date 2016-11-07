<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>

        <?php $i = 0;?>        <?php if(is_array($toutiaolist)) foreach($toutiaolist as $thread) { ?>            <?php $i++;?>            <li>
                
          
                	
                <p><a  href="home.php?mod=auther&amp;uid=<?php echo $thread['authorid'];?>"><img src="uc_server/avatar.php?uid=<?php echo $thread['authorid'];?>&amp;size=middle"><?php echo $thread['author'];?></a></p>
            	<p><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>"><?php echo $thread['message'];?></a></p>
                <div class="Satin_function" ><a href="javascript:;" class="praise <?php echo $thread['zanguo'];?>" onClick="forumzan(<?php echo $thread['tid'];?>,1,this)"><?php echo $thread['ding'];?></a><a href="javascript:;" class="despise <?php echo $thread['bishiguo'];?>"  onClick="forumzan(<?php echo $thread['tid'];?>,2,this)"><?php echo $thread['bishi'];?></a>
                	<div class="Satin_r"><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>" class="evaluate"><?php if($thread['replies'] > 0) { ?><?php echo $thread['replies'];?><?php } else { ?>0<?php } ?>评价</a><a href="home.php?mod=spacecp&amp;ac=favorite&amp;type=thread&amp;id=<?php echo $thread['tid'];?>&amp;formhash=<?php echo FORMHASH;?>" <?php if($_G['uid']) { ?>onclick="collection_arc(<?php echo $thread['tid'];?>,this)"<?php } else { ?> onclick="showWindow('login', this.href)"<?php } ?>  id="k_favorite" class="collection <?php echo $thread['shoucang'];?>">收藏（<font><?php echo $thread['favtimes'];?></font>）</a>
                        <div href="#" class="share" data-id="<?php echo $thread['tid'];?>">分享（<font><?php echo $thread['sharetimes'];?></font>）
                        	<div class="share_main">
                            	<div class="bdsharebuttonbox bdshare-button-style0-16" data-bd-bind="1472236211114" ><a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a></div>
                                </div>
                        </div>
                    </div>
                </div>
                	
                           
                
                
                	
                	
              
         
          
                
            </li>
        <?php } ?>

