<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>

<!--frame_menu-->
<div class="frame_menu" <?php if($_GET['isadmin']==1) { ?>style="display:none"<?php } ?>>
<ul class="one font_yahei">
    	<li><a href="portal.php" <?php if($catid==0) { ?>class="on"<?php } ?>>推荐</a></li>
        <?php if(is_array($menus)) foreach($menus as $k => $v) { ?>        <?php if($k<=9) { ?>
        <li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $v['fid'];?>" <?php if($v['fid']==$catid) { ?>class="on"<?php } ?>><?php echo $v['name'];?></a></li>
        <?php } ?>
        <?php } ?>
      
        <li class="more"><a href="javascript:;">更多</a>
        	<ul class="two more_main">
                <?php if(is_array($menus)) foreach($menus as $k => $v) { ?>        <?php if($k>9) { ?>
        <li><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $v['fid'];?>" <?php if($v['fid']==$catid) { ?>class="on"<?php } ?>><?php echo $v['name'];?></a></li>
        <?php } ?>
        <?php } ?>
            </ul>
        </li>
    </ul>
</div>
<!--frame_menu END-->