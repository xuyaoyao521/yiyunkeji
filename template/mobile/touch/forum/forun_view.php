<?php exit;?>
<!--{template common/header}-->
<style>
	.header_bg{ display:none}
</style>
 <!--{template ceo/toutiao2}-->
 <div class="mobile_evaluate_details">
 	<h1><span>{$thread[subject]}</span></h1>
 	<div class="author">
       <div class="pic"><a href="home.php?mod=auther&uid=$thread[authorid]"><img src="uc_server/avatar.php?uid={$thread[authorid]}&size=middle"></a></div><div class="info"><p>$thread[author]</p><p><!--{if $threadsortshow['optionlist']['yuanchuang']['value']=='是'}--><span>原创</span><!--{/if}-->$thread[dateline]</p></div>
       <!--{if $dingyuele}-->
       <a class="follow on">&radic; 已关注</a>
       <!--{else}-->
       <a class="follow" href="javascript:;" onClick="dingyue2($thread[authorid],this)">+ 关注</a>
       <!--{/if}-->
       
       
    </div>
	<div class="main">$thread[message]</div>
   <!--{if $threadsortshow['optionlist']['yuanchuang']['value']=='是'}--> <div class="careful">本文为作者原创。未经授权，禁止转载！</div><!--{/if}-->
    <div class="Keyword">
    
    <!--{if $thread[tags]}-->
					<!--{eval $tagi = 0;}-->
					<!--{loop $thread[tags] $var}-->
						<a title="$var[1]" href="misc.php?mod=tag&id=$var[0]" target="_blank">$var[1]</a>
						<!--{eval $tagi++;}-->
					<!--{/loop}-->
				<!--{/if}-->
    
    
    </div>
   <div class="praise_despise"><a onClick="forumzan($thread[tid],1,this)" class="praise $thread[zanguo]" href="javascript:;">$thread[ding]</a><a onClick="forumzan($thread[tid],2,this)" href="javascript:;" class="despise $thread[bishiguo]">$thread[bishi]</a><span class="complain"><input type="button" value="举报" href="misc.php?mod=report&rtype=post&rid=$thread[pid]&tid=$thread[tid]&fid=$thread[fid]" class="dialog" onClick="jubao(this)"></span></div>
   
</div>

<div class="mobile_common_list" style="margin-top:15px;"> 
     
                        
                        
                          <!--{template ceo/toutiao3}-->


</div>


<div class="mobile_evaluate_main">

<!--{template forum/pinglun3}-->

</div>
<script>
//段子
$(function(){
	
	var Satin_height = $(".mobile_Satin_list.details").height();
	
	$(".mobile_evaluate_main").css({"margin-top":Satin_height+15})
});
</script>
<script>
	$("#forum_backpage a").attr("href",'forum.php?mod=phone&mods=forum&fids=$thread[fid]&mobile=2');
	var content_title="[<!--{$_G['forum']['name']}-->] - $_G['setting']['bbname']";
	var content_description='$thread_fx[subject]';
	var content_image="$thread_fx['thumb']";
	if(content_image!=""){
	 content_image="data/attachment/forum/$thread_fx['thumb']";
	}
	getdata('forum.php?mod=viewthread&tid=$thread_fx[tid]&mobile=2',content_title,content_description,content_image)
</script>
<!--{template common/footer}-->
