<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); 
0
|| checktplrefresh('./template/mobile/touch/common/footer_default.htm', './template/mobile/touch/common/footer_top.htm', 1477389531, '3', './data/template/4_3_touch_common_footer_default.tpl.php', './template/mobile', 'touch/common/footer_default')
|| checktplrefresh('./template/mobile/touch/common/footer_default.htm', './template/mobile/touch/common/ceo_btoolbar.htm', 1477389531, '3', './data/template/4_3_touch_common_footer_default.tpl.php', './template/mobile', 'touch/common/footer_default')
|| checktplrefresh('./template/mobile/touch/common/footer_default.htm', './template/mobile/touch/common/footer_bottom.htm', 1477389531, '3', './data/template/4_3_touch_common_footer_default.tpl.php', './template/mobile', 'touch/common/footer_default')
|| checktplrefresh('./template/mobile/touch/common/footer_default.htm', './template/mobile/touch/ceo/showadv.htm', 1477389531, '3', './data/template/4_3_touch_common_footer_default.tpl.php', './template/mobile', 'touch/common/footer_default')
;?>
<?php if(!empty($_G['setting']['pluginhooks']['global_footer_mobile'])) echo $_G['setting']['pluginhooks']['global_footer_mobile'];?><?php $useragent = strtolower($_SERVER['HTTP_USER_AGENT']);$clienturl = ''?><?php if(strpos($useragent, 'iphone') !== false || strpos($useragent, 'ios') !== false) { $clienturl = $_G['cache']['mobileoem_data']['iframeUrl'] ? $_G['cache']['mobileoem_data']['iframeUrl'].'&platform=ios' : 'http://www.discuz.net/mobile.php?platform=ios';?><?php } elseif(strpos($useragent, 'android') !== false) { $clienturl = $_G['cache']['mobileoem_data']['iframeUrl'] ? $_G['cache']['mobileoem_data']['iframeUrl'].'&platform=android' : 'http://www.discuz.net/mobile.php?platform=android';?><?php } elseif(strpos($useragent, 'windows phone') !== false) { $clienturl = $_G['cache']['mobileoem_data']['iframeUrl'] ? $_G['cache']['mobileoem_data']['iframeUrl'].'&platform=windowsphone' : 'http://www.discuz.net/mobile.php?platform=windowsphone';?><?php } if($ceo_showadvopen == 1) { $curtime = time();
$cooktime = intval(getcookie('showadvopen'));
$exptime = $curtime - $ceo_showadvtime;?><?php if($exptime > $cooktime) { $cookietime = $curtime + $ceo_showadvtime;
dsetcookie('showadvopen', $cookietime, $cookietime);
        $advlist = explode("\n",$ceo_showadv);?><link rel="stylesheet" href="template/mobile/toutiao_mobile/css/showadv.css" type="text/css" media="all">
<script src="./template/mobile/toutiao_mobile/js/swipe.js" type="text/javascript"></script>
<div class="showadv">
<div class="exit" onclick="showadvext()"><?php echo m_lang('adv_exit'); ?></div>
    <div class="autoscroll">
        <div id="slider">
        <ul>
        <?php if(is_array($advlist)) foreach($advlist as $list) { ?>            <?php $adv = explode("|",$list);?>            <li><a href="<?php echo $adv['1'];?>"><img src="<?php echo $adv['0'];?>" /></a></li>
        <?php } ?>
        </ul>
        </div>
    </div>

<script type="text/javascript">
$('#mask').show();
$(document).ready(function() { 
var slider = new Swipe(document.getElementById('slider'), {
callback: function(e, pos) {
var i = bullets.length;
while (i--) {
bullets[i].className = ' ';
}
bullets[pos].className = 'on';
}
})//,
//bullets = document.getElementById('position').getElementsByTagName('img');
});

function showadvext(id){
$('#mask').hide();
$('.showadv').hide();
}
</script>
    
</div>

    <?php } } ?>

<div id="mask" style="display:none;"></div>
<?php if(!$nofooter) { ?>

<div class="footer" style="min-height:40px;">
 
  
</div>
<?php } ?>

<!--底部导航-->
<?php if($ceo_btoolopen ) { ?>
<link rel="stylesheet" href="template/mobile/toutiao_mobile/css/btool/t1.css" type="text/css" media="all">
<?php if($ceo_btooldiycolor == 1) { ?><link rel="stylesheet" href="template/mobile/toutiao_mobile/css/btool/t-diy.css" type="text/css" media="all"><?php } ?>

<div id="btoolbar">
    <div class="btool btoolft cl">
        <ul>
            <li class="c1<?php if($_GET['mod'] == 'phone') { ?> current<?php } ?>"><a href="forum.php?mod=phone&amp;mobile=2"><i class="mobile_icon ib_index">&#xe602;</i><span>新闻</span></a></li>
            <li class="c2<?php if($_GET['mod'] == 'forumdisplay' || $_GET['forumlist'] == '1') { ?> current<?php } ?>"><a href="forum.php?forumlist=1"><i class="mobile_icon ib_forum" style="font-size:22px;">&#xe600;</i><span>论坛</span></a></li>
            <li class="c3<?php if($_GET['mod'] == 'post'||($_GET['mod'] == 'misc'&&$_GET['action'] == 'nav')) { ?> current<?php } ?>">
    <a href="<?php if($_GET['mod'] == 'forumdisplay' || $_GET['mod'] == 'viewthread' || $_GET['mod'] == 'group') { ?>forum.php?mod=post&action=newthread&fid=<?php echo $_G['fid'];?><?php } else { ?>forum.php?mod=misc&action=nav&mobile=2<?php } ?>"><i class="iconfont ib_post" style="font-size:23px;">&#xf604;</i><span>发帖</span></a>
            </li>
            <li class="c1<?php if($_GET['mod'] == 'dingyue' ) { ?> current<?php } ?>"><a href="home.php?mod=dingyue"><i class="mobile_icon ib_serach">&#xe601;</i><span>订阅</span></a></li>
<li class="c1<?php if($_GET['mod'] == 'space') { ?> current<?php } ?>"><a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=profile&amp;mycenter=1"><i class="iconfont ib_profile">&#xf632;</i><span>我的</span></a></li>
        </ul>
    </div>
</div>
<?php } ?>

<script src="/public/js/Public_mobile.js" type="text/javascript"></script><script type="text/javascript">
<?php if($_G['basescript'] == 'forum' && CURMODULE == forumdisplay || $_G['basescript'] == 'portal' && $_GET['mod'] == 'list' ) { ?>
function mys(id){
    return !id ? null : document.getElementById(id);
}

function dbox(id,classname){
if(mys(id+'_menu').style.display == 'block'){
mys(id+'_menu').style.display = 'none';
mys(id).className = '';
} else {
mys(id+'_menu').style.display = 'block';
mys(id).className = classname;
}
}
<?php } ?>
if(window.onload != null){   
    //window.onload=function(){auto_height();} 
}
</script>

</body>
</html><?php updatesession();?><?php if(defined('IN_MOBILE')) { output();?><?php } else { output_preview();?><?php } ?>