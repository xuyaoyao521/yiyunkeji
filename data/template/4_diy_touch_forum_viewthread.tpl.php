<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('viewthread');
0
|| checktplrefresh('./template/mobile/touch/forum/viewthread.htm', './template/mobile/touch/forum/ceo_relateitems.htm', 1477389543, 'diy', './data/template/4_diy_touch_forum_viewthread.tpl.php', './template/mobile', 'touch/forum/viewthread')
|| checktplrefresh('./template/mobile/touch/forum/viewthread.htm', './template/mobile/touch/forum/forumdisplay_fastpost.htm', 1477389543, 'diy', './data/template/4_diy_touch_forum_viewthread.tpl.php', './template/mobile', 'touch/forum/viewthread')
|| checktplrefresh('./template/mobile/touch/forum/viewthread.htm', './template/mobile/touch/common/seccheck.htm', 1477389543, 'diy', './data/template/4_diy_touch_forum_viewthread.tpl.php', './template/mobile', 'touch/forum/viewthread')
;?><?php include template('common/header'); ?> 
<script>SetWebTitle("<?php echo $_G['forum']['name'];?>");SetTopLeftNav("forum_backpage");</script>
<link rel="stylesheet" href="template/mobile/toutiao_mobile/css/forum/viewthread.css" type="text/css" media="all">

<!-- header start -->
<!-- header end -->

<?php if(!empty($_G['setting']['pluginhooks']['viewthread_top_mobile'])) echo $_G['setting']['pluginhooks']['viewthread_top_mobile'];?>
<!-- main postlist start -->
<div class="postlist">
    <h3<?php if($_GET['page'] >= 2) { ?> class="two"<?php } ?>>
    <a href="forum.php?mod=viewthread&amp;tid=<?php echo $_G['tid'];?>&amp;extra=<?php echo $_GET['extra'];?>"><?php echo $_G['forum_thread']['subject'];?></a>
    <?php if($_G['forum_thread']['displayorder'] == -2) { ?> <span>(审核中)</span>
    <?php } elseif($_G['forum_thread']['displayorder'] == -3) { ?> <span>(已忽略)</span>
    <?php } elseif($_G['forum_thread']['displayorder'] == -4) { ?> <span>(草稿)</span>
    <?php } ?>
    </h3>    
<ul id="alist">
    <?php $postcount = 0;?>    <?php if(is_array($postlist)) foreach($postlist as $post) { $needhiddenreply = ($hiddenreplies && $_G['uid'] != $post['authorid'] && $_G['uid'] != $_G['forum_thread']['authorid'] && !$post['first'] && !$_G['forum']['ismoderator']);?><?php if(!empty($_G['setting']['pluginhooks']['viewthread_posttop_mobile'][$postcount])) echo $_G['setting']['pluginhooks']['viewthread_posttop_mobile'][$postcount];?>

   <div class="plc cl<?php if(!$post['first']) { ?> li_brb<?php } ?>" id="pid<?php echo $post['pid'];?>">
       <div class="display pi" href="#replybtn_<?php echo $post['pid'];?>">
   <ul class="authi">
<li>
                   <span class="avatar"><img src="<?php if(!$post['authorid'] || $post['anonymous']) { ?><?php echo avatar(0, small, true);?><?php } else { ?><?php echo avatar($post[authorid], small, true);?><?php } ?>" /></span>
<em class="isnumber">
<?php if(isset($post['isstick'])) { ?>
<img src ="<?php echo IMGDIR;?>/settop.png" title="置顶回复" class="vm" /> 来自 <?php echo $post['number'];?><?php echo $postnostick;?>
<?php } elseif($post['number'] == -1) { ?>
推荐
<?php } else { if(!empty($postno[$post['number']])) { ?><?php echo $postno[$post['number']];?><?php } else { ?><?php echo $post['number'];?><?php echo $postno['0'];?><?php } } ?>
</em>
                    <p>
<?php if($post['authorid'] && $post['username'] && !$post['anonymous']) { ?>
<a href="home.php?mod=space&amp;uid=<?php echo $post['authorid'];?>&amp;do=profile"<?php if($post['first']) { ?> class="author"<?php } else { ?> class="author2"<?php } ?>><?php echo $post['author'];?></a>
<?php } else { if(!$post['authorid']) { ?>
<a href="javascript:;">游客 <em><?php echo $post['useip'];?><?php if($post['port']) { ?>:<?php echo $post['port'];?><?php } ?></em></a>
<?php } elseif($post['authorid'] && $post['username'] && $post['anonymous']) { if($_G['forum']['ismoderator']) { ?><a href="home.php?mod=space&amp;uid=<?php echo $post['authorid'];?>" target="_blank">匿名</a><?php } else { ?>匿名<?php } } else { ?>
<?php echo $post['author'];?> <em>该用户已被删除</em>
<?php } } if(!IS_ROBOT && !$_GET['authorid'] && !$_G['forum_thread']['archiveid']) { ?>
                            <?php if($post['first']) { ?>
                            <a href="forum.php?mod=viewthread&amp;tid=<?php echo $post['tid'];?>&amp;page=<?php echo $page;?>&amp;authorid=<?php echo $post['authorid'];?>" rel="nofollow">只看楼主</a>
                            <?php } else { ?>
                            <a href="forum.php?mod=viewthread&amp;tid=<?php echo $post['tid'];?>&amp;page=<?php echo $page;?>&amp;authorid=<?php echo $post['authorid'];?>" rel="nofollow">只看他</a>
                            <?php } } elseif(!$_G['forum_thread']['archiveid']) { ?>
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $post['tid'];?>&amp;page=<?php echo $page;?>" rel="nofollow">看全部</a>
<?php } ?>
    <?php if($_G['forum']['ismoderator']) { ?>
        <!-- manage start -->
        <?php if($post['first']) { ?>
            <?php if($_G['uid']) { ?><em><a href="home.php?mod=spacecp&amp;ac=favorite&amp;type=thread&amp;id=<?php echo $_G['tid'];?>" class="favbtn1 blue">收藏</a></em><?php } ?>
            <em><a href="#moption_<?php echo $post['pid'];?>" class="popup blue">管理</a></em>
            <div id="moption_<?php echo $post['pid'];?>" popup="true" class="manages" style="display:none;">
                <?php if(!$_G['forum_thread']['special']) { ?>
                <input type="button" value="编辑" class="redirect btn_default" href="forum.php?mod=post&amp;action=edit&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;pid=<?php echo $post['pid'];?><?php if($_G['forum_thread']['sortid']) { if($post['first']) { ?>&amp;sortid=<?php echo $_G['forum_thread']['sortid'];?><?php } } if(!empty($_GET['modthreadkey'])) { ?>&amp;modthreadkey=<?php echo $_GET['modthreadkey'];?><?php } ?>&amp;page=<?php echo $page;?>">
                <?php } ?>
                <input type="button" value="删除" class="dialog btn_default" href="forum.php?mod=topicadmin&amp;action=moderate&amp;fid=<?php echo $_G['fid'];?>&amp;moderate[]=<?php echo $_G['tid'];?>&amp;operation=delete&amp;optgroup=3&amp;from=<?php echo $_G['tid'];?>">
                <input type="button" value="关闭" class="dialog btn_default" href="forum.php?mod=topicadmin&amp;action=moderate&amp;fid=<?php echo $_G['fid'];?>&amp;moderate[]=<?php echo $_G['tid'];?>&amp;from=<?php echo $_G['tid'];?>&amp;optgroup=4">
                <input type="button" value="屏蔽" class="dialog btn_default" href="forum.php?mod=topicadmin&amp;action=banpost&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;topiclist[]=<?php echo $_G['forum_firstpid'];?>">
                <input type="button" value="警告" class="dialog btn_default" href="forum.php?mod=topicadmin&amp;action=warn&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;topiclist[]=<?php echo $_G['forum_firstpid'];?>">
            </div>
        <?php } else { ?>
            <em><a href="#moption_<?php echo $post['pid'];?>" class="popup blue">管理</a></em>
            <div id="moption_<?php echo $post['pid'];?>" popup="true" class="manages" style="display:none;">
                <input type="button" value="编辑" class="redirect btn_default" href="forum.php?mod=post&amp;action=edit&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;pid=<?php echo $post['pid'];?><?php if(!empty($_GET['modthreadkey'])) { ?>&amp;modthreadkey=<?php echo $_GET['modthreadkey'];?><?php } ?>&amp;page=<?php echo $page;?>">
                <?php if($_G['group']['allowdelpost']) { ?><input type="button" value="删除" class="dialog btn_default" href="forum.php?mod=topicadmin&amp;action=delpost&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;operation=&amp;optgroup=&amp;page=&amp;topiclist[]=<?php echo $post['pid'];?>"><?php } ?>
                <?php if($_G['group']['allowbanpost']) { ?><input type="button" value="屏蔽" class="dialog btn_default" href="forum.php?mod=topicadmin&amp;action=banpost&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;operation=&amp;optgroup=&amp;page=&amp;topiclist[]=<?php echo $post['pid'];?>"><?php } ?>
                <?php if($_G['group']['allowwarnpost']) { ?><input type="button" value="警告" class="dialog btn_default" href="forum.php?mod=topicadmin&amp;action=warn&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;operation=&amp;optgroup=&amp;page=&amp;topiclist[]=<?php echo $post['pid'];?>"><?php } ?>
            </div>
        <?php } ?>
        <!-- manage end -->					
    <?php } ?>				
                    </p>
                    <p>
                    <?php echo $post['dateline'];?>
        <?php if($post['first']) { ?>
                    <em class="y"><i class="iconfont">&#xe92a;</i></span> <?php echo $_G['forum_thread']['allreplies'];?></em>
                    <em class="y"><i class="iconfont">&#xe92e;</i></span> <?php echo $_G['forum_thread']['views'];?></em>
        <?php } ?>
                    </p>
</li>

            </ul>
            
<div class="message<?php if(!$post['first']) { ?> message_pl<?php } ?>">
            <?php if($post['first']) { if($_G['forum_thread']['replycredit'] > 0 || $rushreply) { ?>
            <div class="thread_info">
            <dl>
            	<dt>
                <strong><?php echo $_G['forum_thread']['replycredit'];?> <?php echo $_G['setting']['extcredits'][$_G['forum_thread']['replycredit_rule']['extcreditstype']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['forum_thread']['replycredit_rule']['extcreditstype']]['title'];?></strong>
                </dt>
                <dd>
                回复本帖可获得 <?php echo $_G['forum_thread']['replycredit_rule']['extcredits'];?> <?php echo $_G['setting']['extcredits'][$_G['forum_thread']['replycredit_rule']['extcreditstype']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['forum_thread']['replycredit_rule']['extcreditstype']]['title'];?>奖励! 每人限 <?php echo $_G['forum_thread']['replycredit_rule']['membertimes'];?> 次<?php if($_G['forum_thread']['replycredit_rule']['random'] > 0) { ?><span class="xg1">(中奖概率 <?php echo $_G['forum_thread']['replycredit_rule']['random'];?>%)</span><?php } ?>
                </dd>
            </dl>
            </div>
            <?php } } ?>
                	<?php if($post['warned']) { ?>
                        <span class="grey quote">受到警告</span>
                    <?php } ?>
                    <?php if(!$post['first'] && !empty($post['subject'])) { ?>
                        <h2><strong><?php echo $post['subject'];?></strong></h2>
                    <?php } ?>
                    <?php if($_G['adminid'] != 1 && $_G['setting']['bannedmessages'] & 1 && (($post['authorid'] && !$post['username']) || ($post['groupid'] == 4 || $post['groupid'] == 5) || $post['status'] == -1 || $post['memberstatus'])) { ?>
                        <div class="grey quote">提示: <em>作者被禁止或删除 内容自动屏蔽</em></div>
                    <?php } elseif($_G['adminid'] != 1 && $post['status'] & 1) { ?>
                        <div class="grey quote">提示: <em>该帖被管理员或版主屏蔽</em></div>
                    <?php } elseif($needhiddenreply) { ?>
                        <div class="grey quote">此帖仅作者可见</div>
                    <?php } elseif($post['first'] && $_G['forum_threadpay']) { include template('forum/viewthread_pay'); } else { ?>

                    	<?php if($_G['setting']['bannedmessages'] & 1 && (($post['authorid'] && !$post['username']) || ($post['groupid'] == 4 || $post['groupid'] == 5))) { ?>
                            <div class="grey quote">提示: <em>作者被禁止或删除 内容自动屏蔽，只有管理员或有管理权限的成员可见</em></div>
                        <?php } elseif($post['status'] & 1) { ?>
                            <div class="grey quote">提示: <em>该帖被管理员或版主屏蔽，只有管理员或有管理权限的成员可见</em></div>
                        <?php } ?>
                        <?php if($post['first'] &&  $_G['forum_thread']['price'] > 0 && $_G['forum_thread']['special'] == 0) { ?>
                        <div class="locked">
                            付费主题, 价格: <strong><?php echo $_G['forum_thread']['price'];?> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['title'];?> </strong><em class="y"><a href="forum.php?mod=misc&amp;action=viewpayments&amp;tid=<?php echo $_G['tid'];?>" >记录</a></em>
                        </div>
                        <?php } ?>

                        <?php if($post['first'] && $threadsort && $threadsortshow && $ceo_sortopen) { ?>
                            <?php include template('forum/viewthread_sort'); ?>                        <?php } ?>
                        
                        <?php if($post['first']) { ?>
                            <?php if(!$_G['forum_thread']['special']) { ?>
                                <?php echo $post['message'];?>
                            <?php } elseif($_G['forum_thread']['special'] == 1) { ?>
                                <?php include template('forum/viewthread_poll'); ?>                            <?php } elseif($_G['forum_thread']['special'] == 2) { ?>
                                <?php include template('forum/viewthread_trade'); ?>                            <?php } elseif($_G['forum_thread']['special'] == 3) { ?>
                                <?php include template('forum/viewthread_reward'); ?>                            <?php } elseif($_G['forum_thread']['special'] == 4) { ?>
                                <?php include template('forum/viewthread_activity'); ?>                            <?php } elseif($_G['forum_thread']['special'] == 5) { ?>
                                <?php include template('forum/viewthread_debate'); ?>                            <?php } elseif($threadplughtml) { ?>
                                <?php echo $threadplughtml;?>
                                <?php echo $post['message'];?>
                            <?php } else { ?>
                            	<?php echo $post['message'];?>
                            <?php } ?>
                        <?php } else { ?>
                            <?php echo $post['message'];?>
                        <?php } ?>                       

<?php } ?>
                <?php if($_G['setting']['mobile']['mobilesimpletype'] == 0 || !$post['first']) { ?>
                <?php if($post['attachment']) { ?>
                   <div class="grey quote">
                   附件: <em><?php if($_G['uid']) { ?>您所在的用户组无法下载或查看附件<?php } else { ?>您需要<a href="member.php?mod=logging&amp;action=login">登录</a>才可以下载或查看附件。<?php } ?></em>
                   </div>
                <?php } elseif($post['imagelist'] || $post['attachlist']) { ?>
                   <?php if($post['imagelist']) { ?>
                    <?php if(count($post['imagelist']) == 1) { ?>
                    <ul class="img_list cl vm"><?php echo showattach($post, 1); ?></ul>
                    <?php } else { ?>
                    <ul class="img_list cl vm"><?php echo showattach($post, 1); ?></ul>
                    <?php } ?>
                    <?php } ?>
                    <?php if($post['attachlist']) { ?>
                    <ul><?php echo showattach($post); ?></ul>
                    <?php } ?>
                <?php } ?>
                <?php } ?>
</div>
                
                <?php if($_G['uid'] && $allowpostreply && !$post['first']) { ?>
                <div class="replybtn">
                    <?php if($_G['forum_thread']['special'] == 3 && ($_G['forum']['ismoderator'] && (!$_G['setting']['rewardexpiration'] || $_G['setting']['rewardexpiration'] > 0 && ($_G['timestamp'] - $_G['forum_thread']['dateline']) / 86400 > $_G['setting']['rewardexpiration']) || $_G['forum_thread']['authorid'] == $_G['uid']) && $post['authorid'] != $_G['forum_thread']['authorid'] && $post['first'] == 0 && $_G['uid'] != $post['authorid'] && $_G['forum_thread']['price'] > 0) { ?>
                    <button type="button" class="btn_default" onclick="setanswer(<?php echo $post['tid'];?>, <?php echo $post['pid'];?>, '<?php echo $_GET['from'];?>')"><i class="iconfont flipy">&#xf609;</i>最佳答案</button>
                    <?php } if((($_G['forum']['ismoderator'] && $_G['group']['alloweditpost'] && (!in_array($post['adminid'], array(1, 2, 3)) || $_G['adminid'] <= $post['adminid'])) || ($_G['forum']['alloweditpost'] && $_G['uid'] && ($post['authorid'] == $_G['uid'] && $_G['forum_thread']['closed'] == 0) && !(!$alloweditpost_status && $edittimelimit && TIMESTAMP - $post['dbdateline'] > $edittimelimit)))) { } elseif($_G['uid'] && $post['authorid'] == $_G['uid'] && $_G['setting']['postappend']) { ?>
<a href="forum.php?mod=misc&amp;action=postappend&amp;tid=<?php echo $post['tid'];?>&amp;pid=<?php echo $post['pid'];?>&amp;extra=<?php echo $_GET['extra'];?>&amp;page=<?php echo $page;?>" onClick="showWindow('postappend', this.href, 'get', 0)"><i class="iconfont">&#xf60f;</i></a>
<?php } ?>
                    <a href="forum.php?mod=post&amp;action=reply&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;repquote=<?php echo $post['pid'];?>&amp;extra=<?php echo $_GET['extra'];?>&amp;page=<?php echo $page;?>" value=""><i class="iconfont">&#xf637;</i></a>
<a href="forum.php?mod=misc&amp;action=postreview&amp;do=support&amp;tid=<?php echo $_G['tid'];?>&amp;pid=<?php echo $post['pid'];?>&amp;hash=<?php echo FORMHASH;?>"><i class="iconfont">&#xf661;</i><?php if($post['postreview']['support']) { ?><span id="review_support_<?php echo $post['pid'];?>"><?php echo $post['postreview']['support'];?></span><?php } ?></a>
                </div>
                <!--div class="replybtn">
<<?php if((($_G['forum']['ismoderator'] && $_G['group']['alloweditpost'] && (!in_array($post['adminid'], array(1, 2, 3)) || $_G['adminid'] <= $post['adminid'])) || ($_G['forum']['alloweditpost'] && $_G['uid'] && ($post['authorid'] == $_G['uid'] && $_G['forum_thread']['closed'] == 0) && !(!$alloweditpost_status && $edittimelimit && TIMESTAMP - $post['dbdateline'] > $edittimelimit)))) { ?>
<button type="button" class="btn_default" href="forum.php?mod=post&amp;action=edit&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;pid=<?php echo $post['pid'];?><?php if(!empty($_GET['modthreadkey'])) { ?>&amp;modthreadkey=<?php echo $_GET['modthreadkey'];?><?php } ?>&amp;page=<?php echo $page;?>"><i class="iconfont">&#xf60f;</i><?php if($_G['forum_thread']['special'] == 2 && !$post['message']) { ?>添加柜台介绍<?php } else { ?>编辑<?php } ?></button>
<?php } elseif($_G['uid'] && $post['authorid'] == $_G['uid'] && $_G['setting']['postappend']) { ?>
<button type="button" class="btn_default"  href="forum.php?mod=misc&amp;action=postappend&amp;tid=<?php echo $post['tid'];?>&amp;pid=<?php echo $post['pid'];?>&amp;extra=<?php echo $_GET['extra'];?>&amp;page=<?php echo $page;?>" onClick="showWindow('postappend', this.href, 'get', 0)"><i class="iconfont">&#xf60f;</i>补充</button>
<?php } ?>
                    <button type="button" class="btn_default" href="forum.php?mod=post&amp;action=reply&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;repquote=<?php echo $post['pid'];?>&amp;extra=<?php echo $_GET['extra'];?>&amp;page=<?php echo $page;?>" value=""><i class="iconfont">&#xf637;</i>回复</button>
<?php if(!$_G['forum_thread']['special'] && !$rushreply && !$hiddenreplies && $_G['setting']['repliesrank'] && !$post['first'] && !($post['isWater'] && $_G['setting']['filterednovote'])) { ?>
<button type="button" class="btn_default" href="forum.php?mod=misc&amp;action=postreview&amp;do=support&amp;tid=<?php echo $_G['tid'];?>&amp;pid=<?php echo $post['pid'];?>&amp;hash=<?php echo FORMHASH;?>"><i class="iconfont">&#xf661;</i>支持 <span id="review_support_<?php echo $post['pid'];?>"><?php echo $post['postreview']['support'];?></span></button>
<button type="button" class="btn_default" href="forum.php?mod=misc&amp;action=postreview&amp;do=against&amp;tid=<?php echo $_G['tid'];?>&amp;pid=<?php echo $post['pid'];?>&amp;hash=<?php echo FORMHASH;?>"><i class="iconfont flipy">&#xf661;</i>反对 <span id="review_against_<?php echo $post['pid'];?>"><?php echo $post['postreview']['against'];?></span></button>
<?php } ?>
                </div>-->
                <?php } ?>     

              
        <?php if($post['first'] && ($post['tags'] || $relatedkeywords) && $_GET['from'] != 'preview') { ?>
        <div class="tags mbm"> 
          <?php if($post['tags']) { ?> 
              <?php $tagi = 0;?> 
              <?php if(is_array($post['tags'])) foreach($post['tags'] as $var) { ?> 
              <a title="<?php echo $var['1'];?>" href="misc.php?mod=tag&amp;id=<?php echo $var['0'];?>" target="_blank"><?php echo $var['1'];?></a> 
              <?php $tagi++;?> 
              <?php } ?> 
          <?php } ?> 
        </div>
        <?php } ?> 

<?php if($post['first']) { ?>
<script><?php $php_uri = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$php_self = substr($php_uri,0,strrpos($php_uri,'/')+1);
$bd_message = cutstr(reg_china_codeing($post[message]),160);
$bdimg_url = '';
if($post[attachments]) {
$attch = current($post[attachments]);
$bdimg_url = $php_self . $attch[url] . $attch[attachment];
}?>function WeiXinShareBtn() { 
if (typeof WeixinJSBridge == "undefined") { 
popup.open('<?php echo m_lang('share_weixin_alert'); ?>', 'alert');
} else { 
WeixinJSBridge.invoke('shareTimeline', { 
"title": "<?php echo $post['subject'];?>", 
"link": "<?php echo $php_uri;?>", 
"desc": "<?php echo $bd_message;?>", 
"img_url": "<?php echo $bdimg_url;?>" 
}); 
} 
}
</script>
<?php } ?>
        
       

        </div>
       
   </div>
    <?php if($post['relateitem'] && $post['first']) { ?>
<div class="relateitem">
    <h3>相关帖子:</h3>
    <ul>
        <?php $rel = 0;?> 
        <?php if(is_array($post['relateitem'])) foreach($post['relateitem'] as $var) { ?> 
        <?php if($rel < $ceo_relateitems) { ?>
        <li><a href="forum.php?mod=viewthread&amp;tid=<?php echo $var['tid'];?>"><?php echo $var['subject'];?></a></li>
        <?php } ?> 
        <?php $rel++;?> 
        <?php } ?>
    </ul>
</div>
<?php } ?> 
   <?php if($post['first']) { ?>
    <div class="titls" id="replay">
    	<dl>
        	<dt><?php echo m_lang('thread_reply'); ?></dt>
            <dd>
    <?php if($_G['page'] > 1) { ?>
        <a href="forum.php?mod=viewthread&amp;tid=<?php echo $_G['tid'];?>&amp;extra=<?php echo $_GET['extra'];?>">&laquo;<?php echo m_lang('tthread'); ?></a>
    <?php } else { ?>
        <?php if($ordertype != 1) { ?>
            <a href="forum.php?mod=viewthread&amp;tid=<?php echo $_G['tid'];?>&amp;extra=<?php echo $_GET['extra'];?>&amp;ordertype=1">倒序浏览</a>
        <?php } else { ?>
            <a href="forum.php?mod=viewthread&amp;tid=<?php echo $_G['tid'];?>&amp;extra=<?php echo $_GET['extra'];?>&amp;ordertype=2">正序浏览</a>
        <?php } ?> 
    <?php } ?>   
            </dd>
        </dl>
    </div>
    <?php } ?>
 
   <?php if(!empty($_G['setting']['pluginhooks']['viewthread_postbottom_mobile'][$postcount])) echo $_G['setting']['pluginhooks']['viewthread_postbottom_mobile'][$postcount];?>
   <?php $postcount++;?>   <?php } ?>
</ul>   
<div id="ajaxtag"></div>
<div id="post_new"></div>
   
<?php if($ceo_norepages > 1) { ?>    
    <?php if($_G['forum_thread']['replies'] > $_G['ppp']) { ?>
<script type="text/javascript">
    var url = 'forum.php?mod=viewthread&tid=<?php echo $_G['tid'];?>&extra=<?php echo $_GET['extra'];?>&ordertype=<?php if($ordertype != 1) { ?>2<?php } else { ?>1<?php } ?>&threads=thread';
    var pages=<?php echo $_G['page'];?>;
    var allpage=<?php echo $thispage = ceil($_G['forum_thread']['replies'] / $_G['ppp']);; ?>;
    </script>
    <?php include template('common/ceo_ajaxpage'); ?> 
    <?php } } else { ?>
    <?php if($multipage) { ?><div class="pgbox"><?php echo $multipage;?></div><?php } } ?>
</div><?php $ceo_btoolopen = 0;?><form method="post" autocomplete="off" id="fastpostform" action="forum.php?mod=post&amp;action=reply&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;extra=<?php echo $_GET['extra'];?>&amp;replysubmit=yes&amp;mobile=2">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
    <div class="viewpi" id="ceo_reply">
        <div class="fastpostbox">
        <input type="text" id="ceo_reply_click" onclick=" $('#ceo_reply_post,#ceo_reply_hide').show();                               $('#fastpostmessage').focus().val('').attr('placeholder', '<?php echo m_lang('post_default_text1'); ?>');" class="input finp" placeholder="<?php echo m_lang('post_default_text2'); ?>">
        </div>
        <div class="icon_box">
        	<ul>
            	<li class="reply_view"><a href="javascript:;"><i class="iconfont icon-xinxi"></i><?php if($_G['forum_thread']['allreplies']) { ?><span><?php echo $_G['forum_thread']['allreplies'];?></span><?php } ?></a></li>
            	<script>
var rep_height=$(".mobile_evaluate_main").offset().top;
                	$(".reply_view a").click(function(){

$('html,body').animate({'scrollTop':rep_height-45},500);	
})
                </script>
            	<li class="fav_view"><a href="home.php?mod=spacecp&amp;ac=favorite&amp;type=thread&amp;id=<?php echo $_G['tid'];?>" class="favbtn<?php if($thread['shoucang']) { ?> xi1<?php } ?>"><i class="iconfont icon-biaoxing"></i><?php if(!$_G['forum_thread']['favtimes']) { ?><span></span><?php } ?></a></li>
                
               <li class="share_view"><a href="javascript:sharenv('share_qt')"><i class="iconfont icon-fenxiang2"></i></a></li>
            	
            </ul>
        </div>
    </div>
    

<div id="ceo_reply_hide" style="position: fixed; width: 100%; height: 100%; left: 0px; top: 0px; opacity: 0.5; z-index: 80; display: none; background: rgb(0, 0, 0);" onclick="$('#ceo_reply_post,#ceo_reply_hide').hide(); $(this).empty().hide();"></div>
<div class="viewpi_t" id="ceo_reply_post" style="display: none;">
<ul class="fastpost">
<?php if($_G['forum_thread']['special'] == 5 && empty($firststand)) { ?>
<li>
<select id="stand" name="stand" >
<option value="">选择观点</option>
<option value="0">中立</option>
<option value="1">正方</option>
<option value="2">反方</option>
</select>
</li>
<?php } ?>
<li<?php if($secqaacheck || $seccodecheck) { ?> class="mbm" <?php } ?>><textarea type="text" value="我也说一句" class="input grey" color="gray" name="message" id="fastpostmessage"></textarea></li>
<li id="fastpostsubmitline"><?php if($secqaacheck || $seccodecheck) { $sechash = 'S'.random(4);
$sectpl = !empty($sectpl) ? explode("<sec>", $sectpl) : array('<br />',': ','<br />','');	
$ran = random(5, 1);?><?php if($secqaacheck) { $message = '';
$question = make_secqaa();
$secqaa = lang('core', 'secqaa_tips').$question;?><?php } if($sectpl) { if($secqaacheck) { ?>
<p class="mbm">        
        <span class="xg2"><?php echo $secqaa;?></span><br />
<input name="secqaahash" type="hidden" value="<?php echo $sechash;?>" />
        <input name="secanswer" id="secqaaverify_<?php echo $sechash;?>" type="text" class="txt" />
        </p>
<?php } if($seccodecheck) { ?>
<div class="sec_code vm mbm">
<input name="seccodehash" type="hidden" value="<?php echo $sechash;?>" />
<input type="text" class="txt px vm" style="ime-mode:disabled;width:60px;background:white;" autocomplete="off" value="" id="seccodeverify_<?php echo $sechash;?>" name="seccodeverify" placeholder="验证码" fwin="seccode">
        <img src="misc.php?mod=seccode&amp;update=<?php echo $ran;?>&amp;idhash=<?php echo $sechash;?>&amp;mobile=2" class="seccodeimg"/>
</div>
<?php } } ?>
<script type="text/javascript">
(function() {
$('.seccodeimg').on('click', function() {
$('#seccodeverify_<?php echo $sechash;?>').attr('value', '');
var tmprandom = 'S' + Math.floor(Math.random() * 1000);
$('.sechash').attr('value', tmprandom);
$(this).attr('src', 'misc.php?mod=seccode&update=<?php echo $ran;?>&idhash='+ tmprandom +'&mobile=2');
});
})();
</script>
<?php } ?><input type="button" value="发表" class="btn_default btn_threplay" name="replysubmit" id="fastpostsubmit"><?php if(!empty($_G['setting']['pluginhooks']['viewthread_fastpost_button_mobile'])) echo $_G['setting']['pluginhooks']['viewthread_fastpost_button_mobile'];?></li>
</ul>
</div>
    </form>

<script type="text/javascript">
(function() {
var form = $('#fastpostform');
<?php if(!$_G['uid'] || $_G['uid'] && !$allowpostreply) { ?>
$('#fastpostmessage').on('focus', function() {
<?php if(!$_G['uid']) { ?>
$('#ceo_reply_post,#ceo_reply_hide').hide();  
popup.open('您还未登录，立即登录?', 'confirm', 'member.php?mod=logging&action=login');
<?php } else { ?>
popup.open('您暂时没有权限发表', 'alert');

<?php } ?>


});
<?php } else { ?>
/*
$('#fastpostmessage').on('focus', function() {
var obj = $(this);
if(obj.attr('color') == 'gray') {
obj.attr('value', '');
obj.removeClass('grey');
obj.attr('color', 'black');
$('#fastpostsubmitline').css('display', 'block');
}
})
.on('blur', function() {
var obj = $(this);
if(obj.attr('value') == '') {
obj.addClass('grey');
obj.attr('value', '我也说一句');
obj.attr('color', 'gray');
}
});
*/
<?php } ?>
$('#fastpostsubmit').on('click', function() {

var msgobj = $('#fastpostmessage');
if(msgobj.val() == '我也说一句') {
msgobj.attr('value', '');
}
$.ajax({
type:'POST',
url:form.attr('action') + '&handlekey=fastpost&loc=1&inajax=1',
data:form.serialize(),
dataType:'xml'
})
.success(function(s) {
evalscript(s.lastChild.firstChild.nodeValue);
$('#ceo_reply_post,#ceo_reply_hide').hide(); 
$(this).empty().hide();




})
.error(function() {
window.location.href = obj.attr('href');
popup.close();
});
return false;
});

$('#replyid').on('click', function() {
$(document).scrollTop($(document).height());
$('#fastpostmessage')[0].focus();
});

})();

function succeedhandle_fastpost(locationhref, message, param) {
var pid = param['pid'];
var tid = param['tid'];
if(pid) {
$.ajax({
type:'POST',
url:'forum.php?mod=viewthread&tid=' + tid + '&viewpid=' + pid + '&mobile=2',
dataType:'xml'
})
.success(function(s) {
alert("发表成功！");
$('#post_new').append(s.lastChild.firstChild.nodeValue);

})
.error(function() {
window.location.href = 'forum.php?mod=viewthread&tid=' + tid;
popup.close();
});
} else {
if(!message) {
message = '本版回帖需要审核，您的帖子将在通过审核后显示';
}
popup.open(message, 'alert');
}
$('#fastpostmessage').attr('value', '');
if(param['sechash']) {
$('.seccodeimg').click();
}
}

function errorhandle_fastpost(message, param) {
popup.open(message, 'alert');
}
</script>
<!-- main postlist end -->

<?php if(!empty($_G['setting']['pluginhooks']['viewthread_bottom_mobile'])) echo $_G['setting']['pluginhooks']['viewthread_bottom_mobile'];?>

<script type="text/javascript">
$('.favbtn').on('click', function() {
var obj = $(this);
$.ajax({
type:'POST',
url:obj.attr('href') + '&handlekey=favbtn&inajax=1',
data:{'favoritesubmit':'true', 'formhash':'<?php echo FORMHASH;?>'},
dataType:'xml',
})
.success(function(s) {
popup.open(s.lastChild.firstChild.nodeValue);
evalscript(s.lastChild.firstChild.nodeValue);
})
.error(function() {
window.location.href = obj.attr('href');
popup.close();
});
return false;
});
//设置最佳答案	
function setanswer(tid, pid, from){
if(confirm('<?php echo m_lang('thread_setanswer'); ?>')){
document.getElementById('modactions').action='forum.php?mod=misc&action=bestanswer&tid=' + tid + '&pid=' + pid + '&from=' + from + '&bestanswersubmit=yes';
document.getElementById('modactions').submit();
}
}

</script>
<form method="post" autocomplete="off" name="modactions" id="modactions">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="optgroup" />
<input type="hidden" name="operation" />
<input type="hidden" name="listextra" value="<?php echo $_GET['extra'];?>" />
<input type="hidden" name="page" value="<?php echo $page;?>" />
</form><?php include template('common/share'); ?><script>

var content_title="[<?php echo $_G['forum']['name'];?>] - <?php echo $_G['setting']['bbname'];?>";
var content_description='<?php echo $thread_fx['subject'];?>';
var content_image="<?php echo $thread_fx['thumb'];?>";
if(content_image!=""){
 content_image="data/attachment/forum/<?php echo $thread_fx['thumb'];?>";
}
getdata('forum.php?mod=viewthread&tid=<?php echo $thread_fx['tid'];?>&mobile=2',content_title,content_description,content_image)
</script><?php include template('common/footer'); ?>