<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('space_profile');?>
<?php if($_GET['mycenter'] && !$_G['uid']) { dheader('Location:member.php?mod=logging&action=login');exit;?><?php } include template('common/header'); ?><!-- header start -->

<style>header { display:none; }.toptb { display:none; }</style>

<!-- header end -->
<!-- userinfo start -->
<div class="user_header userinfo_bg">
    <div class="top">
        <div class="z backpage"><a href="javascript:history.back(-1)" class="z"><i class="iconfont i_backpage">&#xe844;</i></a></div>
        <?php if($_G['uid'] == $space['uid']) { ?>
        <div class="y not"><a href="home.php?mod=space&amp;do=notice"><i class="iconfont i_notice">&#xf62f;</i><?php if($_G['member']['newprompt']) { ?><span></span><?php } ?></a></div>
        <?php } else { ?>
        <div class="y mods">
           
        </div>
        
        <?php } ?>
    </div> 
    <div class="userinfo">
        <div class="z user_avt"><img src="<?php echo avatar($space[uid], middle, true);?>" /></div>
        <div class="z user_item">
            <h2 class="user_name"><?php echo $space['username'];?>（UID:<?php echo $space['uid'];?>）
         
            </h2>
            <div class="user_group">
                <span><?php echo $space['group']['grouptitle'];?><?php echo $space['group']['icon'];?></span>
   				<span>积分:<?php echo $space['credits'];?></span>
        <?php if(is_array($_G['setting']['extcredits'])) foreach($_G['setting']['extcredits'] as $key => $value) { ?>        <?php if($value['title']) { ?>
        <span><?php echo $value['title'];?>:<?php echo $space["extcredits$key"];?> <?php echo $value['unit'];?></span>
        <?php } ?>
        <?php } ?></span>
            </div>
        </div>
    </div>
  
</div>

<?php if($_G['uid'] == $space['uid']) { ?>
<div class="user_box box_bg">
    <ul class="row">
    <li><a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=favorite&amp;view=me&amp;type=forum"><i class="iconfont i_favorite">&#xf60a;</i><?php echo m_lang('favorite'); ?></a></li>
        
    <li><a href="home.php?mod=dingyue"><i class="mobile_icon i_friend" style="font-size:14px;">&#xe601;</i>订阅</a></li>
    <li><a href="home.php?mod=space&amp;do=pm"<?php if($_G['member']['newpm']) { ?> class="xi1"<?php } ?>><i class="iconfont i_pm">&#xf637;</i><?php if($_G['member']['newpm']) { ?>新短消息<?php } else { ?>消息<?php } ?></a></li>   
    </ul>
</div>
<?php } ?>

<section>
<div class="user_box box_bg box_brb">
    <ul class="cell">

        <li><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=thread&amp;view=me&amp;type=thread&amp;from=space">我的发帖<span><?php echo $space['threads'];?></span><i></i></a></li>

    </ul>
</div>
</section>



<section>
<div class="user_box box_bg box_br mtm">
    <ul class="cell cell2">
    <?php if($space['adminid']) { ?>
        <li><span><?php echo $space['admingroup']['grouptitle'];?> <?php echo $space['admingroup']['icon'];?></span>管理组</li>
    <?php } ?>
    <?php if($space['extgroupids']) { ?>
        <li><span><?php echo $space['extgroupids'];?></span>扩展用户组</li>
    <?php } ?>
        <li><span><?php echo $space['oltime'];?> 小时</span>在线时间</li>
        <li><span><?php echo $space['lastpost'];?></span>上次发表</li>
        <li><span><?php echo $space['lastactivity'];?></span>上次活动</li>

    <?php if($space['uid'] == $_G['uid']) { ?>
        <?php if($_G['uid'] == $space['uid'] || $_G['group']['allowviewip']) { ?>
        <li><span><?php echo $space['lastip'];?> <?php echo $space['lastip_loc'];?></span>上次访问</li>
<li><span><?php echo $space['regip'];?> <?php echo $space['regip_loc'];?></span>注册地区</li>
        <?php } ?>
        
        
    <?php } ?>
    </ul>
</div>
</section>
    
<?php if($space['uid'] == $_G['uid']) { ?>
<div class="btn_exit mtn mbm"><a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>" class="btn_default btn_w100" style="display:block; width:auto;">退出登录</a></div>
<?php } ?>
<!-- userinfo end --><?php include template('common/footer'); ?>