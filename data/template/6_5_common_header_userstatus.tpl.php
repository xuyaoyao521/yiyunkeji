<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); if($_G['uid']) { ?>

<div id="um" class="y">
<div onmouseover="showMenu({'ctrlid':'umLogin'});" class="showmenu umLogin" id="umLogin" initialized="true">
<a class="av" href="home.php?mod=collection"><?php echo avatar($_G[uid],small);?></a>
<a class="av_name" href="home.php?mod=collection"><?php echo $_G['member']['username'];?></a>
<i class="arrow-w"></i>
</div>
<div id="umLogin_menu" class="p_pop" style="display:none;">
<img class="login_nrrow" src="<?php echo $_G['style']['styleimgdir'];?>header_login_ico.png" alt="" />

<div class="um_op">
        <a href="home.php?mod=space&amp;do=pm" id="pm_ntc">消息(<i><?php echo $newpmcount;?></i>)</a>
         <a href="home.php?mod=collection">收藏(<i><?php echo $allcount;?></i>)</a>	
         <a href="home.php?mod=dingyue">订阅(<i><?php echo $dycount;?></i>)</a>	
         <a href="forum.php?mod=guide&amp;view=my">帖子(<i><?php echo $tiezicount;?></i>)</a>
         
<a href="home.php?mod=spacecp&amp;ac=avatar">设置</a>



        
       
        <?php if(!empty($_G['setting']['pluginhooks']['global_myitem_extra'])) echo $_G['setting']['pluginhooks']['global_myitem_extra'];?>



<?php if(($_G['group']['allowmanagearticle'] || $_G['group']['allowpostarticle'] || $_G['group']['allowdiy'] || getstatus($_G['member']['allowadmincp'], 4) || getstatus($_G['member']['allowadmincp'], 6) || getstatus($_G['member']['allowadmincp'], 2) || getstatus($_G['member']['allowadmincp'], 3))) { ?>
<a href="portal.php?mod=portalcp"><?php if($_G['setting']['portalstatus'] ) { ?>门户管理<?php } else { ?>模块管理<?php } ?></a>
<?php } if($_G['uid'] && $_G['group']['radminid'] > 1) { ?>
<a href="forum.php?mod=modcp&amp;fid=<?php echo $_G['fid'];?>" target="_blank"><?php echo $_G['setting']['navs']['2']['navname'];?>管理</a>
<?php } if($_G['uid'] && getstatus($_G['member']['allowadmincp'], 1)) { ?>
<a href="admin.php" target="_blank">管理中心</a>
<?php } ?>
      
<a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>">退出</a>
</div>
</div>
</div>
<?php } elseif(!empty($_G['cookie']['loginuser'])) { ?>
<p>
<strong><a id="loginuser" class="noborder"><?php echo dhtmlspecialchars($_G['cookie']['loginuser']); ?></a></strong>
<a href="javascript:;" onclick="showWindow('login', this.href)">激活</a>
<a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>">退出</a>
</p>
<?php } elseif(!$_G['connectguest']) { ?>
<div class="no_login y">
<a href="member.php?mod=logging&amp;action=login" onclick="showWindow('login', this.href)">登录</a>
</div>

<?php } else { ?>
<div id="um" class="y">
<div onmouseover="showMenu({'ctrlid':'umLogin'});" class="showmenu umLogin" id="umLogin" initialized="true">
<span class="av"><?php echo avatar(0,small);?></span>
<strong class="vwmy qq"><?php echo $_G['member']['username'];?></strong>
<i class="arrow-w"></i>
</div>
<div id="umLogin_menu" class="p_pop" style="display:none;">
<img class="login_nrrow" src="<?php echo $_G['style']['styleimgdir'];?>header_login_ico.png" alt="" />
<div class="cl um_info">
<a class="avt"><?php echo avatar(0,big);?></a>
</div>
<div class="um_op">
<?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra1'])) echo $_G['setting']['pluginhooks']['global_usernav_extra1'];?>
<a href="home.php?mod=spacecp&amp;ac=credit&amp;showcredit=1">积分: 0</a>
<a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>">退出</a>
<div class="qq_login" style="color:#666;">用户组: <?php echo $_G['group']['grouptitle'];?></div>
</div>
</div>
</div>
<?php } ?>