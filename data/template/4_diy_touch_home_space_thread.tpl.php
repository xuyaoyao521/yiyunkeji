<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('space_thread');?><?php include template('common/header'); ?><script>SetWebTitle("我的发帖");SetTopLeftNav("home_backpage");</script>

<!-- header start -->
<!-- header end -->
<!-- main threadlist start -->
<div class="threadlist box_bg">

<ul id="alist">
<?php if($list) { if(is_array($list)) foreach($list as $thread) { ?>        <li><a class="act_link" href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>" <?php echo $thread['highlight'];?>>
    <h3> 
      <?php if($thread['folder'] == 'lock') { ?> 
      <span class="tag_bg t4"><?php echo m_lang('tlock'); ?></span> 
      <?php } elseif($thread['special'] == 1) { ?> 
      <span class="tag_bg t2"><?php echo m_lang('ts1'); ?></span> 
      <?php } elseif($thread['special'] == 2) { ?> 
      <span class="tag_bg t2"><?php echo m_lang('ts2'); ?></span> 
      <?php } elseif($thread['special'] == 3) { ?> 
      <span class="tag_bg t2"><?php echo m_lang('ts3'); ?></span> 
      <?php } elseif($thread['special'] == 4) { ?> 
      <span class="tag_bg t2"><?php echo m_lang('ts4'); ?></span>
      <?php } elseif($thread['special'] == 5) { ?> 
      <span class="tag_bg t2"><?php echo m_lang('ts5'); ?></span> 
      <?php } elseif(in_array($thread['displayorder'], array(1, 2, 3, 4))) { ?> 
      <span class="tag_bg t1"><?php echo m_lang('tdis'); ?><?php echo $thread['displayorder'];?></span> 
      <?php } elseif($thread['digest'] > 0) { ?> 
      <span class="tag_bg t1"><?php echo m_lang('tdig'); ?></span> 
      <?php } elseif($thread['cover'] != 0) { ?> 
      <span class="tag_bg"><?php echo m_lang('tatt'); ?></span> 
      <?php } else { ?> 
      <?php } ?> 
      <?php echo $thread['subject'];?>
      </h3>
<div class="item_info">
    <span class="src space"><?php if($thread['authorid'] && $thread['author']) { ?><?php echo $thread['author'];?><?php } else { if($_G['forum']['ismoderator']) { ?>匿名<?php } else { ?><?php echo $_G['setting']['anonymoustext'];?><?php } } ?></span>
    <span class="cmt space"><?php echo m_lang('views'); ?>&nbsp;<?php if($thread['views'] > 0) { ?><?php echo $thread['views'];?><?php } else { ?>0<?php } ?></span>
    <span class="cmt space"><?php echo m_lang('reply'); ?>&nbsp;<?php if($thread['replies'] > 0) { ?><?php echo $thread['replies'];?><?php } else { ?>0<?php } ?></span>
    <span class="time"><?php echo $thread['dateline'];?></span>
</div>
        </a></li>
<?php } } else { ?>
<li class="wmt">还没有相关的帖子</li>
<?php } ?>
</ul>
</div>
<?php if($multi) { ?><div class="pgbox"><?php echo $multi;?></div><?php } ?>

<!-- main threadlist end --><?php include template('common/footer'); ?>