<?php exit;?>
<!--{template common/header}-->
<style>
	.header_bg{ display:none}
</style>
 <!--{template ceo/toutiao2}-->
 
  <script src="/public/js/html5media.min.js" type="text/javascript"></script>

 <div class="mobile_video_details">
	<div class="video_main"> <video src="data/attachment/forum/$threadsortshow['optionlist']['videourl']['value']" style="width:100%; height:100%"   controls preload autoplay></video> </div>
    <div class="video_title">
    	<p>$thread[subject]</p>
        <p><a class="evaluate"><!--{if $thread[replies] > 0}-->{$thread[replies]}<!--{else}-->0<!--{/if}-->评价</a><a>{$thread[chakan]}次播放</a><a><input type="button" value="举报" class="dialog btn_default" onClick="jubao(this)" href="misc.php?mod=report&rtype=post&rid=$thread[pid]&tid=$thread[tid]&fid=$thread[fid]"></a></p>
       <p><a onClick="forumzan($thread[tid],1,this)" class="praise $thread[zanguo]" href="javascript:;">$thread[ding]</a><a onClick="forumzan($thread[tid],2,this)" href="javascript:;" class="despise $thread[bishiguo]">$thread[bishi]</a></p>
    </div>
    <div class="author">
       <div class="pic"><a href="home.php?mod=auther&uid=$thread[authorid]" target="_blank"><img class="img" src="uc_server/avatar.php?uid={$thread[authorid]}&size=middle"></a><</div><div class="info"><p>$thread[author]</p><p><!--{if $threadsortshow['optionlist']['yuanchuang']['value']=='是'}--><span>原创</span><!--{/if}-->$thread[dateline]</p></div>
       <!--{if $dingyuele}-->
       <a class="follow on">&radic; 已关注</a>
       <!--{else}-->
       <a class="follow" href="javascript:;" onClick="dingyue2($thread[authorid],this)">+ 关注</a>
       <!--{/if}-->
    </div>
    <div class="mobile_common_list" style="margin-top:15px;">
    	
        
         
           <!--{loop $videolist $v}-->                  
                         <dl class="video">
                            <dt>
                                <div class="pic"><a href="forum.php?mod=viewthread&tid={$v[tid]}"><img data-original="{$v[thumb]}" class="fade" src="/public/images/NO_IMG.jpg" zsrc="{$v[thumb]}" style="display: inline; visibility: visible;"></a><span class="time">{$v[videotime]}</span></div>
                                <a href="forum.php?mod=viewthread&tid={$v[tid]}"><div class="text">{$v[title]}</div></a> 
                            </dt>
                            <dd><a href="home.php?mod=auther&uid=$v[authorid]&ordertype=1"><img src="uc_server/avatar.php?uid={$v[authorid]}&size=middle" zsrc="uc_server/avatar.php?uid={$v[authorid]}&size=middle" style="display: inline; visibility: visible;">{$v[author]}</a><a class="evaluate" href="forum.php?mod=viewthread&tid=$v[tid]&ordertype=1"><!--{if $v[replies] > 0}-->{$v[replies]}<!--{else}-->0<!--{/if}-->评价</a><a class="time">$v[dateline]</a><span class="del"></span><i class="del_confirm"><a href="javascript:;" onclick="buganxingqu({$v[tid]},this)">不感兴趣</a></i></dd>
                        </dl>
                         
 					<!--{/loop}-->
        
        
    </div>
</div>
<div class="mobile_evaluate_main" style="margin-top:15px;">

<!--{template forum/pinglun3}-->

</div>
<script>
	$("#forum_backpage a").attr("href",'forum.php?mod=phone&mods=forum&fids=$thread[fid]&mobile=2');
	var content_title='$thread_fx[subject]';
	var content_title="[<!--{$_G['forum']['name']}-->] - $_G['setting']['bbname']";
	var content_description='$thread_fx[subject]';
	var content_image="$_G['forum_option'][imageurl]['value2']";
	if(content_image!=""){
	 content_image="$threadsortshow['optionlist']['imageurl']['value2']";
	}
	getdata('forum.php?mod=viewthread&tid=$thread_fx[tid]&mobile=2',content_title,content_description,content_image)
	
</script>
<!--{template common/footer}-->
