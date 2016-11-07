<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('discuz');?><?php include template('common/header'); if($_GET['mod'] == 'phone') { ?>
        <?php include template('ceo/toutiao'); } elseif($_GET['mod'] == 'photo') { ?>
        <?php include template('ceo/photo'); } elseif($_GET['mod'] == 'list') { ?>
        <?php include template('ceo/list'); } elseif($_GET['mod'] == 'catelist') { ?>
        <?php include template('ceo/catelist'); } else { ?>
    <?php if($ceo_indexdiyopen != 0 && $_GET['forumlist'] != 1) { ?>
        <?php dheader("location: $indexurl");exit;?>    <?php } if($_G['setting']['mobile']['mobilehotthread'] && $_GET['forumlist'] != 1) { dheader('Location:forum.php?mod=guide&view=hot');exit;?><?php } ?>

<script type="text/javascript">
function getvisitclienthref() {
var visitclienthref = '';
if(ios) {
visitclienthref = 'https://itunes.apple.com/cn/app/zhang-shang-lun-tan/id489399408?mt=8';
} else if(andriod) {
visitclienthref = 'http://www.discuz.net/mobile.php?platform=android';
}
return visitclienthref;
}
</script>

<?php if(!empty($_G['setting']['pluginhooks']['index_toutiao_list_mobile'])) echo $_G['setting']['pluginhooks']['index_toutiao_list_mobile'];?>
<?php if(!empty($_G['setting']['pluginhooks']['index_top_mobile'])) echo $_G['setting']['pluginhooks']['index_top_mobile'];?>

    <?php if(empty($gid) && !empty($forum_favlist)) { ?>
<div class="catlist box_bg box_br">
<div class="subforumshow cl" href="#sub_forum_fav">        			
<h1><a href="home.php?mod=space&amp;do=favorite&amp;type=forum">我收藏的版块</a><span class="y"><img src="template/mobile/toutiao_mobile/img/collapsed_<?php if(!$_G['setting']['mobile']['mobileforumview']) { ?>yes<?php } else { ?>no<?php } ?>.png"></span></h1>
        </div>
    </div>
<div class="catlist s_forum box_bg box_brb mbm" id="sub_forum_fav">
        <ul>
        <?php $i=1;?>        <?php if(is_array($forum_favlist)) foreach($forum_favlist as $key => $favorite) { ?>            <?php $forum=$favforumlist[$favorite[id]];?>            <li>              
                <?php if($forum['icon']) { ?>
                <?php echo $forum['icon'];?>
                <?php } else { ?>
                <a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $forum['fid'];?>"><img src="template/mobile/toutiao_mobile/img/forum<?php if($forum['folder']) { ?>_new<?php } ?>.png"/></a>
                <?php } ?>                    
                <a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $forum['fid'];?>" class="b">
                <h3><?php echo $forum['name'];?><span>(<?php echo $forum['todayposts'];?>)</span></h3>
                <div class="catlist_desc"><?php echo strip_tags($forum['description']); ?></div>
                <div class="ceo_info">
                <?php if(empty($forum['redirect'])) { ?><span><?php echo dnumber($forum['threads']); ?></span>/<span><?php echo dnumber($forum['posts']); ?></span><?php } ?>
                </div>
                </a>
            </li>
        <?php } ?>
        </ul>

</div>

    <?php } ?>

<!-- main forumlist start --><?php if(is_array($catlist)) foreach($catlist as $key => $cat) { ?><div class="catlist box_bg box_br">
<div class="subforumshow cl" href="#sub_forum_<?php echo $cat['fid'];?>">        			
<h1><?php echo $cat['name'];?><span class="y"><img src="template/mobile/toutiao_mobile/img/collapsed_<?php if(!$_G['setting']['mobile']['mobileforumview']) { ?>yes<?php } else { ?>no<?php } ?>.png"></span></h1>
        </div>
    </div>
<div class="catlist s_forum box_bg box_brb mbm" id="sub_forum_<?php echo $cat['fid'];?>">
        <ul>
        <?php $i=1;?>        <?php if(is_array($cat['forums'])) foreach($cat['forums'] as $forumid) { ?>            <?php $sum=count($cat[forums]);?>            <li>              
            <?php $i++;?>                <?php $forum=$forumlist[$forumid];?>                <?php if($forum['icon']) { ?>
                <?php echo $forum['icon'];?>
                <?php } else { ?>
                <a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $forum['fid'];?>"><img src="template/mobile/toutiao_mobile/img/forum<?php if($forum['folder']) { ?>_new<?php } ?>.png"/></a>
                <?php } ?>                    
                <a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $forum['fid'];?>" class="b">
                <h3><?php echo $forum['name'];?><span>(<?php echo $forum['todayposts'];?>)</span></h3>
                <div class="catlist_desc"><?php echo strip_tags($forum['description']); ?></div>
                <div class="ceo_info">
                <?php if(empty($forum['redirect'])) { ?><span><?php echo dnumber($forum['threads']); ?></span>/<span><?php echo dnumber($forum['posts']); ?></span><?php } ?>
                </div>
                </a>
            </li>
        <?php } ?>
        </ul>

</div>
<?php } ?>

<!-- main forumlist end -->
<?php if(!empty($_G['setting']['pluginhooks']['index_middle_mobile'])) echo $_G['setting']['pluginhooks']['index_middle_mobile'];?>
<script type="text/javascript">
(function() {
<?php if(!$_G['setting']['mobile']['mobileforumview']) { ?>
$('.s_forum').css('display', 'block');
<?php } else { ?>
$('.s_forum').css('display', 'none');
<?php } ?>
$('.subforumshow').on('click', function() {
var obj = $(this);
var subobj = $(obj.attr('href'));
if(subobj.css('display') == 'none') {
subobj.css('display', 'block');
obj.find('img').attr('src', 'template/mobile/toutiao_mobile/img/collapsed_yes.png');
} else {
subobj.css('display', 'none');
obj.find('img').attr('src', 'template/mobile/toutiao_mobile/img/collapsed_no.png');
}
});
 })();
</script>
<?php } include template('common/footer'); ?>