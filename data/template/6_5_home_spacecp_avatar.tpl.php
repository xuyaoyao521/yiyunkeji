<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('spacecp_avatar');
0
|| checktplrefresh('./template/default/home/spacecp_avatar.htm', './template/default/home/spacecp_header.htm', 1477389149, '5', './data/template/6_5_home_spacecp_avatar.tpl.php', './template/pc', 'home/spacecp_avatar')
|| checktplrefresh('./template/default/home/spacecp_avatar.htm', './template/default/home/spacecp_footer.htm', 1477389149, '5', './data/template/6_5_home_spacecp_avatar.tpl.php', './template/pc', 'home/spacecp_avatar')
|| checktplrefresh('./template/default/home/spacecp_avatar.htm', './template/default/home/spacecp_header_name.htm', 1477389149, '5', './data/template/6_5_home_spacecp_avatar.tpl.php', './template/pc', 'home/spacecp_avatar')
;?><?php include template('common/header_home'); ?><div id="ct" class="ct2_a wp cl">
<div class="mn">
<div class="bm bw0">
<h1 class="mt"><?php if($actives['profile']) { ?>
个人资料
<?php } elseif($actives['verify']) { ?>
认证
<?php } elseif($actives['avatar']) { ?>
修改头像
<?php } elseif($actives['credit']) { ?>
积分
<?php } elseif($actives['usergroup']) { ?>
用户组
<?php } elseif($actives['privacy']) { ?>
隐私筛选
<?php } elseif($actives['sendmail']) { ?>
邮件提醒
<?php } elseif($actives['password']) { ?>
密码安全
<?php } elseif($actives['promotion']) { ?>
访问推广
<?php } elseif($actives['plugin']) { ?>
<?php echo $_G['setting']['plugins'][$pluginkey][$_GET['id']]['name'];?>
<?php } ?></h1>
<!--don't close the div here--><?php if(!empty($_G['setting']['pluginhooks']['spacecp_avatar_top'])) echo $_G['setting']['pluginhooks']['spacecp_avatar_top'];?>
<script type="text/javascript">
function updateavatar() {
window.location.href = document.location.href.replace('&reload=1', '') + '&reload=1';
}
<?php if(!$reload) { ?>
saveUserdata('avatar_redirect', document.referrer);
<?php } ?>
</script>
<form method="post" autocomplete="off" action="home.php?mod=spacecp&amp;ac=avatar&amp;ref">
<table cellspacing="0" cellpadding="0" class="tfm">
<caption>

<h2 class="xs2">当前我的头像</h2>
<p>如果您还没有设置自己的头像，系统会显示为默认头像，您需要自己上传一张新照片来作为自己的个人头像 </p>
</caption>
<tr>
<td><?php echo avatar($space[uid],big);?></td>
</tr>
</table>

<table cellspacing="0" cellpadding="0" class="tfm">
<caption>
<h2 class="xs2">设置我的新头像</h2>
<p>请选择一个新照片进行上传编辑。<br />头像保存后，您可能需要刷新一下本页面(按F5键)，才能查看最新的头像效果 </p>
</caption>
<tr>
<td>
<script type="text/javascript">document.write(AC_FL_RunContent('<?php echo implode("','", $uc_avatarflash);; ?>'));</script>
</td>
</tr>
</table>
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
</form>
<?php if(!empty($_G['setting']['pluginhooks']['spacecp_avatar_bottom'])) echo $_G['setting']['pluginhooks']['spacecp_avatar_bottom'];?>
</div>
</div>
<script type="text/javascript">
var redirecturl = loadUserdata('avatar_redirect');
if(redirecturl) {
$('retpre').innerHTML = '<a href="' + redirecturl + '">返回上一页</a>';
}
</script>
<div class="appl"><div class="tbn">
<h2 class="mt bbda">设置</h2>
<ul>
<li <?php echo $opactives['ac'];?>><a href="home.php?mod=spacecp&amp;ac=avatar" <?php if($_GET['ac']=='avatar') { ?>class="on"<?php } ?>>修改头像</a></li>

<?php if($_G['setting']['verify']['enabled'] && allowverify() || $_G['setting']['my_app_status'] && $_G['setting']['videophoto']) { ?>
<li<?php echo $actives['verify'];?>><a href="<?php if($_G['setting']['verify']['enabled']) { ?>home.php?mod=spacecp&ac=profile&op=verify<?php } else { ?>home.php?mod=spacecp&ac=videophoto<?php } ?>" <?php if($_GET['ac']=='videophoto') { ?>class="on"<?php } ?>>认证123</a></li>
<?php } ?>
<li <?php echo $opactives['ac'];?>><a href="home.php?mod=spacecp&amp;ac=credit" <?php if($_GET['ac']=='credit') { ?>class="on"<?php } ?>>积分</a></li>






</ul>
</div></div>
</div><?php include template('common/footer'); ?>