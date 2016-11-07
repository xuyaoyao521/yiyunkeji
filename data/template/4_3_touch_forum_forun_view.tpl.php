<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('forun_view');?><?php include template('common/header'); ?><style>
.header_bg{ display:none}
</style>
 <?php include template('ceo/toutiao2'); ?> <div class="mobile_evaluate_details">
 	<h1><span><?php echo $thread['subject'];?></span></h1>
 	<div class="author">
       <div class="pic"><a href="home.php?mod=auther&amp;uid=<?php echo $thread['authorid'];?>"><img src="uc_server/avatar.php?uid=<?php echo $thread['authorid'];?>&amp;size=middle"></a></div><div class="info"><p><?php echo $thread['author'];?></p><p><?php if($threadsortshow['optionlist']['yuanchuang']['value']=='是') { ?><span>原创</span><?php } ?><?php echo $thread['dateline'];?></p></div>
       <?php if($dingyuele) { ?>
       <a class="follow on">&radic; 已关注</a>
       <?php } else { ?>
       <a class="follow" href="javascript:;" onClick="dingyue2(<?php echo $thread['authorid'];?>,this)">+ 关注</a>
       <?php } ?>
       
       
    </div>
<div class="main"><?php echo $thread['message'];?></div>
   <?php if($threadsortshow['optionlist']['yuanchuang']['value']=='是') { ?> <div class="careful">本文为作者原创。未经授权，禁止转载！</div><?php } ?>
    <div class="Keyword">
    
    <?php if($thread['tags']) { $tagi = 0;?><?php if(is_array($thread['tags'])) foreach($thread['tags'] as $var) { ?><a title="<?php echo $var['1'];?>" href="misc.php?mod=tag&amp;id=<?php echo $var['0'];?>" target="_blank"><?php echo $var['1'];?></a><?php $tagi++;?><?php } } ?>
    
    
    </div>
   <div class="praise_despise"><a onClick="forumzan(<?php echo $thread['tid'];?>,1,this)" class="praise <?php echo $thread['zanguo'];?>" href="javascript:;"><?php echo $thread['ding'];?></a><a onClick="forumzan(<?php echo $thread['tid'];?>,2,this)" href="javascript:;" class="despise <?php echo $thread['bishiguo'];?>"><?php echo $thread['bishi'];?></a><span class="complain"><input type="button" value="举报" href="misc.php?mod=report&amp;rtype=post&amp;rid=<?php echo $thread['pid'];?>&amp;tid=<?php echo $thread['tid'];?>&amp;fid=<?php echo $thread['fid'];?>" class="dialog" onClick="jubao(this)"></span></div>
   
</div>

<div class="mobile_common_list" style="margin-top:15px;"> 
     
                        
                        
                          <?php include template('ceo/toutiao3'); ?></div>


<div class="mobile_evaluate_main"><?php include template('forum/pinglun3'); ?></div>
<script>
//段子
$(function(){

var Satin_height = $(".mobile_Satin_list.details").height();

$(".mobile_evaluate_main").css({"margin-top":Satin_height+15})
});
</script>
<script>
$("#forum_backpage a").attr("href",'forum.php?mod=phone&mods=forum&fids=<?php echo $thread['fid'];?>&mobile=2');
var content_title="[<?php echo $_G['forum']['name'];?>] - <?php echo $_G['setting']['bbname'];?>";
var content_description='<?php echo $thread_fx['subject'];?>';
var content_image="<?php echo $thread_fx['thumb'];?>";
if(content_image!=""){
 content_image="data/attachment/forum/<?php echo $thread_fx['thumb'];?>";
}
getdata('forum.php?mod=viewthread&tid=<?php echo $thread_fx['tid'];?>&mobile=2',content_title,content_description,content_image)
</script><?php include template('common/footer'); ?>