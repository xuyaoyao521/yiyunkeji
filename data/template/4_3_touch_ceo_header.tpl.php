<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>

<div id="top_nav">
    <div class="top_menu_bar">
        <div class="top_menu_more">
            <a href="forum.php?mod=list" class="more_btn" id="navs_toggle"><i class="iconfont icon-jiahao1"></i></a>
        </div>
        <div class="top_menu top_menu_list" id="navs_scrolls" style="overflow: hidden;">
            <div class="nav_list">
                <ul>
                	<li><a href="forum.php?mod=phone&amp;mods=forum" <?php if($_GET['fids']=="") { ?>class="on"<?php } ?>>推荐</a></li>
                    <?php if(is_array($menus)) foreach($menus as $v) { ?>                    <li><a href="forum.php?mod=phone&amp;mods=forum&amp;fids=<?php echo $v['fid'];?>" <?php if($_GET['fids']==$v['fid']) { ?>class="on"<?php } ?>><?php echo $v['name'];?></a></li>
                    <?php } ?>
                     <li style="width: 38px;"></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<style>.toptb {display:block; height:81px; width:100%;}</style>
<script src="template/mobile/toutiao_mobile/js/iscroll.js" type="text/javascript"></script>
<script type="text/javascript">
var myScroll;
function loaded () {
myScroll = new IScroll('#navs_scrolls', { scrollX: true, scrollY: false, mouseWheel: true, click: true });
}
//document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
navswidth = $('.top_menu ul').width();
$('.nav_list').css('width', navswidth + 'px');
loaded();
</script>
