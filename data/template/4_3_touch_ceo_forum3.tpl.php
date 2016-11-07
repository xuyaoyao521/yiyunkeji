<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>

<link rel="stylesheet" href="template/mobile/toutiao_mobile/css/forum/viewthread.css" type="text/css" media="all">
<?php if($catid==42) { ?>
  <ul id="alist">
 <?php if(is_array($toutiaolist)) foreach($toutiaolist as $thread) { ?><div class="mobile_Satin_list">
   <p><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;ordertype=1"><?php echo $thread['message'];?></a></p>
   <p><a href="javascript:;" onclick="forumzan(<?php echo $thread['tid'];?>,1,this)" class="praise <?php echo $thread['zanguo'];?>"><?php echo $thread['ding'];?></a><a href="javascript:;" onclick="forumzan(<?php echo $thread['tid'];?>,2,this)" class="despise <?php echo $thread['bishiguo'];?>"><?php echo $thread['bishi'];?></a></p>
   <p><a href="home.php?mod=auther&amp;uid=<?php echo $thread['authorid'];?>&amp;ordertype=1"><img src="uc_server/avatar.php?uid=<?php echo $thread['authorid'];?>&amp;size=middle"><?php echo $thread['author'];?></a><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;ordertype=1"><?php if($thread['replies'] > 0) { ?><?php echo $thread['replies'];?><?php } else { ?>0<?php } ?>评价</a><span class="share"><a href="javascript:sharenv('share_qt')"></a></span><a class="Collection <?php echo $thread['shoucang'];?>"  href="javascript:;" onclick="collection_arc(<?php echo $thread['tid'];?>,this)" >收藏</a></p>
</div>

 <?php } ?>
 </ul>

<?php } elseif($catid==40) { ?>
 <?php if(is_array($toutiaolist)) foreach($toutiaolist as $thread) { ?><div class="mobile_public_list video">
        <div class="pic">
            <a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>"><img data-original="<?php echo $thread['pic'];?>" class="fade" src="/public/images/placeholder.png"></a>
            <span class="time"><?php echo $thread['videotime'];?></span>
         	<a class="play" href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>"></a>
        </div>
        <div class="title">
        	<p><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>"><?php echo $thread['subject'];?></a></p>
            <p><a href="home.php?mod=auther&amp;uid=<?php echo $thread['authorid'];?>"><img src="uc_server/avatar.php?uid=<?php echo $thread['authorid'];?>&amp;size=middle"><?php echo $thread['author'];?></a><a class="evaluate"><?php if($thread['replies'] > 0) { ?><?php echo $thread['replies'];?><?php } else { ?>0<?php } ?>评价</a><a class="like <?php echo $thread['zanguo'];?>" href="javascript:;" onclick="forumzan(<?php echo $thread['tid'];?>,1,this)"><?php echo $thread['ding'];?></a><span class="share"><a href="javascript:sharenv('share_qt')"></a></span></p>
        </div>
</div>
 <?php } ?>
 
 
 <?php } elseif($catid==41) { ?>
 <?php if(is_array($toutiaolist)) foreach($toutiaolist as $thread) { ?><div class="mobile_public_list pic">
<?php if($thread['pic']) { ?>
        <div class="pic">
       	 <a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;ordertype=1">
            <img data-original="<?php echo $thread['pic'];?>" class="fade" src="/public/images/placeholder.png">
            <span class="pic_number"><?php echo $thread['piccount'];?>图</span>
          </a>
          
        </div>
         <?php } ?>
        <div class="title">
        	<p> <a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;ordertype=1"><?php echo $thread['subject'];?></a></p>
            <p><a href="home.php?mod=auther&amp;uid=<?php echo $thread['authorid'];?>"><img src="uc_server/avatar.php?uid=<?php echo $thread['authorid'];?>&amp;size=middle"><?php echo $thread['author'];?></a><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;ordertype=1&amp;viewtype=2"><?php if($thread['replies'] > 0) { ?><?php echo $thread['replies'];?><?php } else { ?>0<?php } ?>评价</a><a class="like  <?php echo $thread['zanguo'];?>" href="javascript:;" onclick="forumzan(<?php echo $thread['tid'];?>,1,this)"><?php echo $thread['ding'];?>赞</a><span class="del"></span><i class="del_confirm"><a href="javascript:;" onClick="buganxingqu(<?php echo $thread['tid'];?>,this)">不感兴趣</a></i></p>
        </div>
</div>
 <?php } ?>
 
<?php } else { ?>
<div class="mobile_common_list"> 
    <?php if($toutiaolist) { ?>
    <ul id="alist">
        <?php $i = 0;?>        <?php if(is_array($toutiaolist)) foreach($toutiaolist as $thread) { ?>            <?php $i++;?>          
            <?php if($thread['attachment'] == 2) { ?>
                <?php if($thread['piccount'] >= 1 && $thread['piccount'] < 4) { ?>
                	
                  		 <?php if($thread['fid'] != 40) { ?>
                         
                         <dl>
                            <dt>
                                <div class="pic"><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;ordertype=1"><img data-original="<?php echo $thread['pic'];?>" class="fade" src="/public/images/NO_IMG.jpg"></a></div>
                                <a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;ordertype=1"><div class="text"><?php echo $thread['subject'];?></div></a>
                            </dt>
                            <dd><a href="home.php?mod=auther&amp;uid=<?php echo $thread['authorid'];?>"><img src="uc_server/avatar.php?uid=<?php echo $thread['authorid'];?>&amp;size=middle"><?php echo $thread['author'];?></a><a class="evaluate" href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;ordertype=1"><?php if($thread['replies'] > 0) { ?><?php echo $thread['replies'];?><?php } else { ?>0<?php } ?>评价</a><a class="time"><?php echo $thread['dateline'];?></a><span class="del"></span><i class="del_confirm"><a href="javascript:;" onClick="buganxingqu(<?php echo $thread['tid'];?>,this)">不感兴趣</a></i></i></dd>
                        </dl>
                         
                        
                   		<?php } else { ?>
                        
                        	<dl class="video">
                                <dt>
                                    <div class="pic"><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;ordertype=1"><img data-original="<?php echo $thread['pic'];?>" class="fade" src="/public/images/NO_IMG.jpg"></a><span class="time"><?php echo $thread['videotime'];?></span></div>
                                    <a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;ordertype=1"><div class="text"><?php echo $thread['subject'];?></div></a>
                                </dt>
                                  <dd><a href="home.php?mod=auther&amp;uid=<?php echo $thread['authorid'];?>&amp;ordertype=1"><img src="uc_server/avatar.php?uid=<?php echo $thread['authorid'];?>&amp;size=middle"><?php echo $thread['author'];?></a><a class="evaluate" href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;ordertype=1"><?php if($thread['replies'] > 0) { ?><?php echo $thread['replies'];?><?php } else { ?>0<?php } ?>评价</a><a class="time"><?php echo $thread['dateline'];?></a><span class="del"></span><i class="del_confirm"><a href="javascript:;" onClick="buganxingqu(<?php echo $thread['tid'];?>,this)">不感兴趣</a></i></i></dd>
                            </dl>
                            
                    	<?php } ?>	
                <?php } elseif($thread['piccount'] >= 4) { ?>
                
                <dl class="img">
                    <dt>
                        <a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;ordertype=1"><div class="text"><?php echo $thread['subject'];?></div></a> 
                        <ul class="pic_list">
                           <?php if(is_array($thread['pics'])) foreach($thread['pics'] as $key) { ?>          
                            <li><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;ordertype=1"><img data-original="<?php echo $key;?>" class="fade" src="/public/images/NO_IMG.jpg"></a></li>
                             <?php } ?>
                            <span class="pic_number"><?php echo $thread['piccount'];?>图</span>
                        </ul>
                    </dt>
                    <dd><a href="home.php?mod=auther&amp;uid=<?php echo $thread['authorid'];?>"><img src="uc_server/avatar.php?uid=<?php echo $thread['authorid'];?>&amp;size=middle"><?php echo $thread['author'];?></a><a class="evaluate" href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;ordertype=1&amp;viewtype=2"><?php if($thread['replies'] > 0) { ?><?php echo $thread['replies'];?><?php } else { ?>0<?php } ?>评价</a><a class="time"><?php echo $thread['dateline'];?></a><span class="del"></span><i class="del_confirm"><a href="javascript:;" onClick="buganxingqu(<?php echo $thread['tid'];?>,this)">不感兴趣</a></i></i></dd>
                </dl>
                
                 
                <?php } else { ?>
                 <dl class="words">
                    <dt>
                        <a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;ordertype=1"><div class="text"><?php echo $thread['subject'];?></div></a>
                    </dt>
                      <dd><a href="home.php?mod=auther&amp;uid=<?php echo $thread['authorid'];?>"><img src="uc_server/avatar.php?uid=<?php echo $thread['authorid'];?>&amp;size=middle"><?php echo $thread['author'];?></a><a class="evaluate" href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;ordertype=1"><?php if($thread['replies'] > 0) { ?><?php echo $thread['replies'];?><?php } else { ?>0<?php } ?>评价</a><a class="time"><?php echo $thread['dateline'];?></a><span class="del"></span><i class="del_confirm"><a href="javascript:;" onClick="buganxingqu(<?php echo $thread['tid'];?>,this)">不感兴趣</a></i></i></dd>
                </dl>
                <?php } ?>
            <?php } else { ?>
              <dl class="words">
                    <dt>
                        <a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;ordertype=1"><div class="text"><?php echo $thread['subject'];?></div></a>
                    </dt>
                      <dd><a href="home.php?mod=auther&amp;uid=<?php echo $thread['authorid'];?>"><img src="uc_server/avatar.php?uid=<?php echo $thread['authorid'];?>&amp;size=middle"><?php echo $thread['author'];?></a><a class="evaluate" href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;ordertype=1"><?php if($thread['replies'] > 0) { ?><?php echo $thread['replies'];?><?php } else { ?>0<?php } ?>评价</a><a class="time"><?php echo $thread['dateline'];?></a><span class="del"></span><i class="del_confirm"><a href="javascript:;" onClick="buganxingqu(<?php echo $thread['tid'];?>,this)">不感兴趣</a></i></dd>
                </dl>
            <?php } ?>
     
            <?php if($ceo_listad[$i]) { ?>
            <li><a class="act_link" href="<?php echo $ceo_listad[$i]['1'];?>"><h3><span class="tag_bg"><?php echo m_lang('tads'); ?></span></h3><img data-original="<?php echo $ceo_listad[$i]['0'];?>" width="100%" class="fade" src="/public/images/NO_IMG.jpg"/></a></li>
            <?php } ?>
        <?php } ?>
    </ul>       
    <?php } else { ?>
  
    <?php } ?>

   

</div>
 <?php } ?> 
