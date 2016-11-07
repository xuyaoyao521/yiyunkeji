<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('forun_video');
0
|| checktplrefresh('./template/pc/forum/forun_video.htm', './template/pc/forum/viewthread_arcfastpost.htm', 1478245423, '5', './data/template/6_5_forum_forun_video.tpl.php', './template/pc', 'forum/forun_video')
|| checktplrefresh('./template/pc/forum/forun_video.htm', './template/pc/forum/viewthread_node_arc.htm', 1478245423, '5', './data/template/6_5_forum_forun_video.tpl.php', './template/pc', 'forum/forun_video')
|| checktplrefresh('./template/pc/forum/forun_video.htm', './template/pc/ceo/forumdisplay_list_pic.htm', 1478245423, '5', './data/template/6_5_forum_forun_video.tpl.php', './template/pc', 'forum/forun_video')
;?><?php include template('common/header'); ?><script type="text/javascript">var fid = parseInt('<?php echo $_G['fid'];?>'), tid = parseInt('<?php echo $_G['tid'];?>');</script>
<?php if($modmenu['thread'] || $modmenu['post']) { ?>
<script src="<?php echo $_G['setting']['jspath'];?>forum_moderate.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } ?>

<script src="<?php echo $_G['setting']['jspath'];?>forum_viewthread.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<script type="text/javascript">zoomstatus = parseInt(<?php echo $_G['setting']['zoomstatus'];?>);var imagemaxwidth = '<?php echo $_G['setting']['imagemaxwidth'];?>';var aimgcount = new Array();</script>

<!--frame_main-->
<div class="frame_main public_width font_yahei text"><?php include template('common/left_menu'); ?><div class="left">
    
    <!--Author_info-->
    	<div class="Author_info">
        	<a href="home.php?mod=auther&amp;uid=<?php echo $thread['authorid'];?>" target="_blank"><img class="img" src="uc_server/avatar.php?uid=<?php echo $thread['authorid'];?>&amp;size=middle"></a>
        	<div class="info_tag">
            	<p class="name"><a href="home.php?mod=auther&amp;uid=<?php echo $thread['authorid'];?>"><?php echo $thread['author'];?></a></p>
                <p class="autograph"><?php echo $auither_jianjie;?></p>
                <p class="Subscribe">
                <?php if($dingyuele) { ?>
         <a class="follow on" href="javascript:;" >已订阅</a>
    
       <?php } else { ?>
        <a href="home.php?mod=auther&amp;uid=<?php echo $thread['authorid'];?>" <?php if($_G['uid']) { ?>onClick="dingyue(<?php echo $thread['authorid'];?>,this)"<?php } else { ?> onclick="showWindow('login', this.href)"<?php } ?>>订阅</a>
       <?php } ?>
                </p>
            </div>
            <ul>
            
            <?php if(is_array($auither_arc_list)) foreach($auither_arc_list as $v) { ?>            	<li <?php if($v['tid']==$thread['tid']) { ?>class="on"<?php } ?>><a href="forum.php?mod=viewthread&amp;tid=<?php echo $v['tid'];?>"><span><?php echo $v['subject'];?></a></span></li>
                <?php } ?>
                
                
            </ul>
        </div>
    <!--Author_info END-->
    
    
    
   
    <?php include template('common/left_article'); ?>    

    </div>
    
    <div class="right">
        <div class="public_position"><a href="/">首页</a>&nbsp;&nbsp;&gt;&nbsp;&nbsp;<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['forum']['fid'];?>"><?php echo $_G['forum']['name'];?></a>&nbsp;&nbsp;&gt;&nbsp;&nbsp;正文</div>
        <div class="details_main">
        	<h1><?php echo $thread['subject'];?></h1>
            <p class="details_author"><a href="home.php?mod=auther&amp;uid=<?php echo $thread['authorid'];?>"><img src="uc_server/avatar.php?uid=<?php echo $thread['authorid'];?>&amp;size=middle"><?php echo $thread['author'];?></a><span class="time"><?php echo $thread['dateline'];?></span>
             <?php if($threadsortshow['optionlist']['laiyuan']['value']) { ?><span>来源：<?php echo $threadsortshow['optionlist']['laiyuan']['value'];?></span><?php } ?>
            </p>
            <?php if((($_G['forum']['ismoderator'] && $_G['group']['alloweditpost'] && (!in_array($post['adminid'], array(1, 2, 3)) || $_G['adminid'] <= $post['adminid'])) || ($_G['forum']['alloweditpost'] && $_G['uid'] && ($post['authorid'] == $_G['uid'] && $_G['forum_thread']['closed'] == 0) && !(!$alloweditpost_status && $edittimelimit && TIMESTAMP - $post['dbdateline'] > $edittimelimit)))) { ?>

                     
                        <?php if($modmenu['thread']) { ?>
<div id="modmenu" class="xi2 pbm">
    <?php if((($_G['forum']['ismoderator'] && $_G['group']['alloweditpost'] && (!in_array($post['adminid']) || $_G['adminid'] <= $post['adminid'])) || ($_G['forum']['alloweditpost'] && $_G['uid'] && ($post['authorid'] == $_G['uid'] && $_G['forum_thread']['closed'] == 0) && !(!$alloweditpost_status && $edittimelimit && TIMESTAMP - $post['dbdateline'] > $edittimelimit)))) { ?>
<a  href="forum.php?mod=post&amp;action=edit&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;pid=<?php echo $thread['pid'];?><?php if(!empty($_GET['modthreadkey'])) { ?>&amp;modthreadkey=<?php echo $_GET['modthreadkey'];?><?php } ?>&amp;page=<?php echo $page;?>"><?php if($_G['forum_thread']['special'] == 2 && !$post['message']) { ?>添加柜台介绍<span class="pipe">|</span><?php } else { ?>编辑</a><span class="pipe">|</span><?php } } $modopt=0;?><?php if($_G['forum']['ismoderator']) { if($_G['group']['allowdelpost']) { $modopt++?><a href="javascript:;" onclick="modthreads(3, 'delete')">删除</a><span class="pipe">|</span><?php } if($_G['group']['allowstickthread'] && ($_G['forum_thread']['displayorder'] <= 3 || $_G['adminid'] == 1) && !$_G['forum_thread']['is_archived']) { $modopt++?><a href="javascript:;" onclick="modthreads(1, 'stick')">置顶</a><span class="pipe">|</span><?php } if($_G['group']['allowdigestthread'] && !$_G['forum_thread']['is_archived']) { $modopt++?><a href="javascript:;" onclick="modthreads(1, 'digest')">精华</a><span class="pipe">|</span><?php } if($_G['group']['allowrecommendthread'] && !empty($_G['forum']['modrecommend']['open']) && $_G['forum']['modrecommend']['sort'] != 1 && !$_G['forum_thread']['is_archived']) { $modopt++?><a href="javascript:;" onclick="modthreads(1, 'recommend')">推荐</a><span class="pipe">|</span><?php } if($_G['forum_thread']['is_archived'] && $_G['adminid'] == 1) { $modopt++?><a href="javascript:;" onclick="modaction('restore', '', 'archiveid=<?php echo $_G['forum_thread']['archiveid'];?>')">取消存档</a><span class="pipe">|</span><?php } if($_G['forum_firstpid']) { if($_G['group']['allowwarnpost']) { $modopt++?><a href="javascript:;" onclick="modaction('warn', '<?php echo $_G['forum_firstpid'];?>')">警告</a><span class="pipe">|</span><?php } if($_G['group']['allowbanpost']) { $modopt++?><a href="javascript:;" onclick="modaction('banpost', '<?php echo $_G['forum_firstpid'];?>')">屏蔽</a><span class="pipe">|</span><?php } } if($_G['group']['allowremovereward'] && $_G['forum_thread']['special'] == 3 && !$_G['forum_thread']['is_archived']) { $modopt++?><a href="javascript:;" onclick="modaction('removereward')">移除悬赏</a><span class="pipe">|</span><?php } if($_G['forum']['status'] == 3 && in_array($_G['adminid'], array('1','2')) && $_G['forum_thread']['closed'] < 1) { ?><a href="javascript:;" onclick="modthreads(5, 'recommend_group');return false;">推到版块</a><span class="pipe">|</span><?php } if($_G['group']['allowmanagetag']) { ?><a href="javascript:;" onclick="showWindow('mods', 'forum.php?mod=tag&op=manage&tid=<?php echo $_G['tid'];?>', 'get', 0)">标签</a><span class="pipe">|</span><?php } if($_G['group']['alloweditusertag']) { ?><a href="javascript:;" onclick="showWindow('usertag', 'forum.php?mod=misc&action=usertag&tid=<?php echo $_G['tid'];?>', 'get', 0)">用户标签</a><span class="pipe">|</span><?php } } if($allowpusharticle && $allowpostarticle) { $modopt++?><a href="portal.php?mod=portalcp&amp;ac=article&amp;from_idtype=tid&amp;from_id=<?php echo $_G['tid'];?>">生成文章</a><span class="pipe">|</span><?php } ?>
        
<?php if(!empty($_G['setting']['pluginhooks']['viewthread_modoption'])) echo $_G['setting']['pluginhooks']['viewthread_modoption'];?>
</div>
<?php } } ?>
                
           
            <div class="details_content hidden">
            <script src="/public/js/html5media.min.js" type="text/javascript"></script>
            	 <div style="background:#000"><video src="data/attachment/forum/<?php echo $threadsortshow['optionlist']['videourl']['value'];?>" width="100%" height="440" controls preload autoplay></video></div> 
            </div>
            
             <div class="details_function">
             	<p><span  class="Keyword">
                
                <?php if($thread['tags']) { $tagi = 0;?><?php if(is_array($thread['tags'])) foreach($thread['tags'] as $var) { ?><a title="<?php echo $var['1'];?>" href="portal.php?keyword=<?php echo $var['1'];?>" target="_blank"><?php echo $var['1'];?></a><?php $tagi++;?><?php } } ?>
              <a style="background:none"></a>
                
                </span>
                
                 <?php if($post['authorid'] != $_G['uid']) { ?>
<a href="javascript:;" class="complain" onclick="showWindow('miscreport<?php echo $thread['pid'];?>', 'misc.php?mod=report&rtype=post&rid=<?php echo $thread['pid'];?>&tid=<?php echo $_G['tid'];?>&fid=<?php echo $_G['fid'];?>', 'get', -1);return false;">举报</a>
<?php } ?>
                </p>
                <p></p>
                <p><span class="share">分享（<?php echo $thread['sharetimes'];?>）：</span><span class="bdsharebuttonbox"><a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a></span>
                 <a href="home.php?mod=spacecp&amp;ac=favorite&amp;type=thread&amp;id=<?php echo $_G['tid'];?>&amp;formhash=<?php echo FORMHASH;?>"  <?php if($_G['uid']) { ?>onclick="collection_arc(<?php echo $thread['tid'];?>,this)"<?php } else { ?> onclick="showWindow('login', this.href)"<?php } ?>  class="collection <?php echo $thread['shoucang'];?>">收藏（<font><?php echo $thread['favtimes'];?></font>）</a>
                <a href="javascript:;" class="despise <?php echo $thread['bishiguo'];?>" onClick="forumzan(<?php echo $thread['tid'];?>,2,this)"><?php echo $thread['bishi'];?></a><a href="javascript:;" class="praise <?php echo $thread['zanguo'];?>" onClick="forumzan(<?php echo $thread['tid'];?>,1,this)"><?php echo $thread['ding'];?></a></p>
             </div>
             <div class="details_evaluate">
           		<div class="evaluate_title">网友评价<span><?php echo $commnetnum;?>条</span></div>
                <div class="evaluate_content">
                	<?php if($fastpost) { if($_G['uid']) { ?>

<dl>
                    	<dt><?php echo avatar($_G['uid']); ?><p><?php echo $_G['username'];?></p></dt>
                        <dd>
                        	<div class="message">
                            <form method="post" autocomplete="off" id="fastpostform" action="forum.php?mod=post&amp;action=reply&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;extra=<?php echo $_GET['extra'];?>&amp;replysubmit=yes<?php if($_GET['ordertype'] != 1) { ?>&amp;infloat=yes&amp;handlekey=fastpost<?php } if($_GET['from']) { ?>&amp;from=<?php echo $_GET['from'];?><?php } ?>"<?php if($_GET['ordertype'] != 1) { ?> onSubmit="return fastpostvalidate(this)"<?php } ?>>
                            	<div class="text"><textarea name="message" id="fastpostmessage" onKeyDown="seditor_ctlent(event, <?php if($_GET['ordertype'] != 1) { ?>'fastpostvalidate($(\'fastpostform\'))'<?php } else { ?>'$(\'fastpostform\').submit()'<?php } ?>);" tabindex="4" placeholder="写下您的评论..." class="font_yahei"></textarea></div>							<input type="hidden" name="posttime" id="posttime" value="<?php echo TIMESTAMP;?>" />
                                <input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
                                <input type="hidden" name="usesig" value="<?php echo $usesigcheck;?>" />
                                <input type="hidden" name="subject" value="  " />
                                <div class="button">
                                <button <?php if($allowpostreply) { ?>type="submit" <?php } elseif(!$_G['uid']) { ?>type="button" onclick="showWindow('login', 'member.php?mod=logging&action=login&guestmessage=yes')" <?php } if(!$seccodecheck) { ?>onmouseover="checkpostrule('seccheck_fastpost', 'ac=reply');this.onmouseover=null" <?php } ?>name="replysubmit"  class="font_yahei" value="replysubmit" tabindex="5">发  表</button>
                                </div>
                                </form>
                            </div>
                        </dd>
                    </dl>
<?php } } ?>
</div>
                <div class="evaluate_content" id="alist"><?php $postcount = 0;?> <?php if(is_array($postlist)) foreach($postlist as $post) { if($rushreply && $_GET['checkrush'] && $post['rewardfloor'] != 1) { continue;?><?php } ?>
        <?php $needhiddenreply = ($hiddenreplies && $_G['uid'] != $post['authorid'] && $_G['uid'] != $_G['forum_thread']['authorid'] && !$post['first'] && !$_G['forum']['ismoderator']);
$postshowavatars = !($_G['setting']['bannedmessages'] & 2 && ($post['memberstatus'] == '-1' || ($post['authorid'] && !$post['username']) || ($post['groupid'] == 4 || $post['groupid'] == 5) || ($post['status'] & 1)));?><?php if($post['first']!=1) { ?>

<dl class="info">
                    	<dt><p><img src="uc_server/avatar.php?uid=<?php echo $post['authorid'];?>&amp;size=middle"></p><p><?php echo $post['author'];?></p></dt>
                        <dd>
                        	<div class="info_title"><?php echo $post['dateline'];?><i>|</i><?php if($post['status'] & 8) { ?>来自手机端<?php } else { ?>来自PC电脑端<?php } ?></div>
                            <div class="info_content">
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
                   附件: <em><?php if($_G['uid']) { ?>您所在的用户组无法下载或查看附件<?php } else { ?>您需要 <a href="member.php?mod=logging&amp;action=login" onclick="showWindow('login', this.href);return false;">登录</a> 才可以查看或下载！<?php } ?></em>
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

                            <div class="info_function">
                          
                          
                           
                           
                           <a href="javascript:;" onclick="plunzan(<?php echo $post['pid'];?>,this);return false;" title="点赞" class="<?php echo $post['zanguo'];?>"> <font id="review_support_<?php echo $post['pid'];?>"><?php if($post['postreview']['support']) { ?><?php echo $post['postreview']['support'];?><?php } else { ?>0<?php } ?></font></span>
                           
                            <?php if((!$_G['uid'] || $allowpostreply) && !$needhiddenreply) { ?>

<a  href="forum.php?mod=post&amp;action=reply&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;repquote=<?php echo $post['pid'];?>&amp;type=arc"  title="回复">回复</a>

<?php } ?>
                            <?php if(!$post['first'] && $modmenu['post']) { ?>
<span class="y">
<label for="manage<?php echo $post['pid'];?>">
<input type="checkbox" id="manage<?php echo $post['pid'];?>" class="pc" <?php if(!empty($modclick)) { ?>checked="checked" <?php } ?>onclick="pidchecked(this);modclick(this, <?php echo $post['pid'];?>)" value="<?php echo $post['pid'];?>" autocomplete="off" />
管理
</label>
</span>
<?php } ?>
                          
                            <?php if($post['authorid'] != $_G['uid']) { ?>
<a href="javascript:;" class="complain" onclick="showWindow('miscreport<?php echo $post['pid'];?>', 'misc.php?mod=report&rtype=post&rid=<?php echo $post['pid'];?>&tid=<?php echo $_G['tid'];?>&fid=<?php echo $_G['fid'];?>', 'get', -1);return false;">举报</a>
<?php } ?>
                        </div>
                        </dd>
</dl>
<?php } ?>





<?php if(!empty($_G['setting']['pluginhooks']['viewthread_endline'][$postcount])) echo $_G['setting']['pluginhooks']['viewthread_endline'][$postcount];?>
  <?php $postcount++;?><?php } ?>
                 </div>   
                   
                    
                  
                 <div class="evaluate_content" id="loadmore">   
                    <div class="info_page"><a href="javascript:;">点击加载更多</a></div>
                </div>
           </div>
           <div class="details_relevant">
           		<div class="relevant_title">相关阅读</div>
                <ul class="listBox">
                    <?php $i = 0;?>        <?php if(is_array($toutiaolist)) foreach($toutiaolist as $thread) { ?>            <?php $i++;?>            <li>
                
            <?php if($thread['attachment'] == 2) { ?>
                <?php if($thread['piccount'] >= 1 && $thread['piccount'] < 4) { ?>
                	<div class="pic  <?php if($thread['fid'] == 40) { ?>video<?php } ?>"><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>" target="_blank">
    <img class="feedimg fade" data-original="<?php echo $thread['pic'];?>" src="/public/images/NO_IMG.jpg">
</a>
<?php if($thread['fid'] == 40) { ?><span class="time"><?php echo $thread['videotime'];?></span><?php } ?></div>
                <div class="data">
                	<div class="box">
                    	<div class="title"><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>"><span><?php echo $thread['subject'];?></span></a></div>
                        <?php if($thread['message']) { ?><div class="abstract"><?php echo $thread['message'];?></div><?php } ?>
                        <div class="info"><a href="home.php?mod=auther&amp;uid=<?php echo $thread['authorid'];?>"><img src="uc_server/avatar.php?uid=<?php echo $thread['authorid'];?>&amp;size=middle"><?php echo $thread['author'];?></a><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>"><?php if($thread['replies'] > 0) { ?><?php echo $thread['replies'];?><?php } else { ?>0<?php } ?>评价</a><a><?php echo $thread['dateline'];?></a><a href="javascript:;" onClick="buganxingqu(<?php echo $thread['tid'];?>,this)" class="del"><span>不感兴趣</span></a></div>
                    </div>
                </div>
                	
               
                <?php } elseif($thread['piccount'] >= 4) { ?>
                	<div class="data img">
                	<div class="title"><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>"><span><?php echo $thread['subject'];?></span></a></div>
                	<div class="box">
                    	<div class="img">
                         <?php $iii=0;?>                        <?php if(is_array($thread['pics'])) foreach($thread['pics'] as $key) { ?> 
                         <?php $iii++;?>                       
    <a  href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>" target="_blank">
        <img src="<?php echo $key;?>">
        <?php if($iii==4) { ?>
        <span class="pic_number"><?php echo $thread['piccount'];?>图</span>
         <?php } ?>
    </a>
        <?php } ?>
                      </div>
                       <div class="info"><a href="home.php?mod=auther&amp;uid=<?php echo $thread['authorid'];?>"><img src="uc_server/avatar.php?uid=<?php echo $thread['authorid'];?>&amp;size=middle"><?php echo $thread['author'];?></a><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>"><?php if($thread['replies'] > 0) { ?><?php echo $thread['replies'];?><?php } else { ?>0<?php } ?>评价</a><a><?php echo $thread['dateline'];?></a><a href="javascript:;" onClick="buganxingqu(<?php echo $thread['tid'];?>,this)" class="del"><span>不感兴趣</span></a></div>
                    </div>
                </div>
                	
                	
                  
                <?php } else { ?>
                  
               <div class="data words">
                	<div class="box">
                    	<div class="title"><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>"><span><?php echo $thread['subject'];?></span></a></div>
                       <?php if($thread['message']) { ?><div class="abstract"><?php echo $thread['message'];?></div><?php } ?>
                         <div class="info"><a href="home.php?mod=auther&amp;uid=<?php echo $thread['authorid'];?>"><img src="uc_server/avatar.php?uid=<?php echo $thread['authorid'];?>&amp;size=middle"><?php echo $thread['author'];?></a><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>"><?php if($thread['replies'] > 0) { ?><?php echo $thread['replies'];?><?php } else { ?>0<?php } ?>评价</a><a><?php echo $thread['dateline'];?></a><a href="javascript:;" onClick="buganxingqu(<?php echo $thread['tid'];?>,this)" class="del"><span>不感兴趣</span></a></div>
                    </div>
                </div>
                <?php } ?>
            <?php } else { ?>
            
            		<div class="data words">
                	<div class="box">
                    	<div class="title"><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>"><span><?php echo $thread['subject'];?></span></a></div>
                       <?php if($thread['message']) { ?><div class="abstract"><?php echo $thread['message'];?></div><?php } ?>
                         <div class="info"><a href="home.php?mod=auther&amp;uid=<?php echo $thread['authorid'];?>"><img src="uc_server/avatar.php?uid=<?php echo $thread['authorid'];?>&amp;size=middle"><?php echo $thread['author'];?></a><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>"><?php if($thread['replies'] > 0) { ?><?php echo $thread['replies'];?><?php } else { ?>0<?php } ?>评价</a><a><?php echo $thread['dateline'];?></a><a href="javascript:;" onClick="buganxingqu(<?php echo $thread['tid'];?>,this)" class="del"><span>不感兴趣</span></a></div>
                    </div>
                </div>
                
                
                
            <?php } ?>
                
            </li>
        <?php } ?>
              </ul>
           </div>
           
           
           

        </div>
    </div>
</div>
<!--frame_main END-->

<?php if($modmenu['post']) { ?>
<div id="mdly" class="fwinmask" style="display:none;z-index:350;">
<table cellspacing="0" cellpadding="0" class="fwin">
<tr>
<td class="t_l"></td>
<td class="t_c"></td>
<td class="t_r"></td>
</tr>
<tr>
<td class="m_l">&nbsp;&nbsp;</td>
<td class="m_c">
<div class="f_c">
<div class="c">
<h3>选中&nbsp;<strong id="mdct" class="xi1"></strong>&nbsp;篇: </h3>
<?php if($_G['forum']['ismoderator']) { if($_G['group']['allowwarnpost']) { ?><a href="javascript:;" onclick="modaction('warn')">警告</a><span class="pipe">|</span><?php } if($_G['group']['allowbanpost']) { ?><a href="javascript:;" onclick="modaction('banpost')">屏蔽</a><span class="pipe">|</span><?php } if($_G['group']['allowdelpost'] && !$rushreply) { ?><a href="javascript:;" onclick="modaction('delpost')">删除</a><span class="pipe">|</span><?php } } if($_G['forum']['ismoderator'] && $_G['group']['allowstickreply'] || $_G['forum_thread']['authorid'] == $_G['uid']) { ?><a href="javascript:;" onclick="modaction('stickreply')">置顶</a><span class="pipe">|</span><?php } if($_G['forum_thread']['pushedaid'] && $allowpostarticle) { ?><a href="javascript:;" onclick="modaction('pushplus', '', 'aid=<?php echo $_G['forum_thread']['pushedaid'];?>', 'portal.php?mod=portalcp&ac=article&op=pushplus')">文章连载</a><span class="pipe">|</span><?php } ?>
</div>
</div>
</td>
<td class="m_r"></td>
</tr>
<tr>
<td class="b_l"></td>
<td class="b_c"></td>
<td class="b_r"></td> 
</tr>
</table>
</div>
<?php } ?>

<!--complain_alert-->
<div class="alert-background"></div>
<div class="complain_alert font_yahei">
<div class="complain_title">举报此人<a href="javascript:;" class="close">×</a></div>
    <div class="complain_content">
    	<p><label><input type="radio" name="complain" value="淫秽色情"><span>淫秽色情</span></label></p>
        <p><label><input type="radio" name="complain" value="营销广告"><span>营销广告</span></label></p>
        <p><label><input type="radio" name="complain" value="恶意攻击谩骂"><span>恶意攻击谩骂</span></label></p>
        <p><label><input type="radio" name="complain" class="textarea" value=""><span>我有话要说</span></label></p>
        <textarea class="font_yahei" id="jubaonr"></textarea>
    </div>
    <div class="alert-button">
       <a href="javascript:void(0)" class="close">取消</a>
       <a href="javascript:void(0)" id="alert-post" class="a2" data-id="">确认提交</a>
    </div>
</div>
<!--complain_alert END-->

</body>
 <script type="text/javascript">
        var urlpage = 'forum.php?mod=viewthread&tid=<?php echo $_G['tid'];?>&ordertype=<?php if($ordertype != 2) { ?>1<?php } else { ?>2<?php } ?>';
        var pages=<?php echo $_G['page'];?>;
        var allpage=<?php echo $totalpage;?>;
jq(function(){
if(pages>=allpage){
jq("#loadmore").hide();	
}	
if(allpage==0){
jq("#loadmore").hide();	
}
})
    </script> 
<script src="template/pc/ceo/arc_ajaxpage.js" type="text/javascript"></script>
<script src="/public/js/Public_index.js" type="text/javascript"></script>
<form method="post" autocomplete="off" name="modactions" id="modactions">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="optgroup" />
<input type="hidden" name="operation" />
<input type="hidden" name="listextra" value="<?php echo $_GET['extra'];?>" />
<input type="hidden" name="page" value="<?php echo $page;?>" />
</form><?php include template('common/footer'); ?>