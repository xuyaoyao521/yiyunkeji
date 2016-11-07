<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('forun_video');?><?php include template('common/header'); ?><style>
.header_bg{ display:none}
</style>
 <?php include template('ceo/toutiao2'); ?> 
  <script src="/public/js/html5media.min.js" type="text/javascript" type="text/javascript"></script>

 <div class="mobile_video_details">
<div class="video_main"> <video src="data/attachment/forum/<?php echo $threadsortshow['optionlist']['videourl']['value'];?>" style="width:100%; height:100%"   controls preload autoplay></video> </div>
    <div class="video_title">
    	<p><?php echo $thread['subject'];?></p>
        <p><a class="evaluate"><?php if($thread['replies'] > 0) { ?><?php echo $thread['replies'];?><?php } else { ?>0<?php } ?>评价</a><a><?php echo $thread['chakan'];?>次播放</a><a><input type="button" value="举报" class="dialog btn_default" onClick="jubao(this)" href="misc.php?mod=report&amp;rtype=post&amp;rid=<?php echo $thread['pid'];?>&amp;tid=<?php echo $thread['tid'];?>&amp;fid=<?php echo $thread['fid'];?>"></a></p>
       <p><a onClick="forumzan(<?php echo $thread['tid'];?>,1,this)" class="praise <?php echo $thread['zanguo'];?>" href="javascript:;"><?php echo $thread['ding'];?></a><a onClick="forumzan(<?php echo $thread['tid'];?>,2,this)" href="javascript:;" class="despise <?php echo $thread['bishiguo'];?>"><?php echo $thread['bishi'];?></a></p>
    </div>
    <div class="author">
       <div class="pic"><a href="home.php?mod=auther&amp;uid=<?php echo $thread['authorid'];?>" target="_blank"><img class="img" src="uc_server/avatar.php?uid=<?php echo $thread['authorid'];?>&amp;size=middle"></a><</div><div class="info"><p><?php echo $thread['author'];?></p><p><?php if($threadsortshow['optionlist']['yuanchuang']['value']=='是') { ?><span>原创</span><?php } ?><?php echo $thread['dateline'];?></p></div>
       <?php if($dingyuele) { ?>
       <a class="follow on">&radic; 已关注</a>
       <?php } else { ?>
       <a class="follow" href="javascript:;" onClick="dingyue2(<?php echo $thread['authorid'];?>,this)">+ 关注</a>
       <?php } ?>
    </div>
    <div class="mobile_common_list" style="margin-top:15px;">
    	
        
         
           <?php if(is_array($videolist)) foreach($videolist as $v) { ?>                  
                         <dl class="video">
                            <dt>
                                <div class="pic"><a href="forum.php?mod=viewthread&amp;tid=<?php echo $v['tid'];?>"><img data-original="<?php echo $v['thumb'];?>" class="fade" src="/public/images/NO_IMG.jpg" zsrc="<?php echo $v['thumb'];?>" style="display: inline; visibility: visible;"></a><span class="time"><?php echo $v['videotime'];?></span></div>
                                <a href="forum.php?mod=viewthread&amp;tid=<?php echo $v['tid'];?>"><div class="text"><?php echo $v['title'];?></div></a> 
                            </dt>
                            <dd><a href="home.php?mod=auther&amp;uid=<?php echo $v['authorid'];?>&amp;ordertype=1"><img src="uc_server/avatar.php?uid=<?php echo $v['authorid'];?>&amp;size=middle" zsrc="uc_server/avatar.php?uid=<?php echo $v['authorid'];?>&amp;size=middle" style="display: inline; visibility: visible;"><?php echo $v['author'];?></a><a class="evaluate" href="forum.php?mod=viewthread&amp;tid=<?php echo $v['tid'];?>&amp;ordertype=1"><?php if($v['replies'] > 0) { ?><?php echo $v['replies'];?><?php } else { ?>0<?php } ?>评价</a><a class="time"><?php echo $v['dateline'];?></a><span class="del"></span><i class="del_confirm"><a href="javascript:;" onclick="buganxingqu(<?php echo $v['tid'];?>,this)">不感兴趣</a></i></dd>
                        </dl>
                         
 					<?php } ?>
        
        
    </div>
</div>
<div class="mobile_evaluate_main" style="margin-top:15px;"><?php include template('forum/pinglun3'); ?></div>
<script>
$("#forum_backpage a").attr("href",'forum.php?mod=phone&mods=forum&fids=<?php echo $thread['fid'];?>&mobile=2');
var content_title='<?php echo $thread_fx['subject'];?>';
var content_title="[<?php echo $_G['forum']['name'];?>] - <?php echo $_G['setting']['bbname'];?>";
var content_description='<?php echo $thread_fx['subject'];?>';
var content_image="<?php echo $_G['forum_option']['imageurl']['value2'];?>";
if(content_image!=""){
 content_image="<?php echo $threadsortshow['optionlist']['imageurl']['value2'];?>";
}
getdata('forum.php?mod=viewthread&tid=<?php echo $thread_fx['tid'];?>&mobile=2',content_title,content_description,content_image)

</script><?php include template('common/footer'); ?>