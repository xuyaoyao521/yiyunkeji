<?php exit;?>
<!--{template common/header}-->
<style>
	.header_bg{ display:none}
</style>
 <!--{template ceo/toutiao2}-->
 <div class="mobile_Satin_list details">
	<div class="main">
       <p>$thread[message]</p>
       <p><a onClick="forumzan($thread[tid],1,this)" class="praise $thread[zanguo]" href="javascript:;">$thread[ding]</a><a onClick="forumzan($thread[tid],2,this)" href="javascript:;" class="despise $thread[bishiguo]">$thread[bishi]</a></p>
       <p><a href="home.php?mod=space&uid=$thread['authorid']"><img src="uc_server/avatar.php?uid={$thread[authorid]}&size=middle">$thread[author]</a><a class="evaluate">{$commnetnum}评价</a><a class="Collection $thread[shoucang]" onclick="collection_arc($thread[tid],this)" href="javascript:;" >收藏</a><span class="complain"><input type="button" value="举报" class="dialog btn_default" onClick="jubao(this)" href="misc.php?mod=report&rtype=post&rid=$thread[pid]&tid=$thread[tid]&fid=$thread[fid]"></span></p>
   </div>
</div>
<div class="mobile_evaluate_main">

<!--{template forum/pinglun3}-->

</div>
<script>
	$("#forum_backpage a").attr("href",'forum.php?mod=phone&mods=forum&fids=$thread[fid]&mobile=2');
	var content_title="[<!--{$_G['forum']['name']}-->] - $_G['setting']['bbname']";
	var content_zhaiyao='$thread_fx[subject]';
	var content_image="$thread_fx['thumb']";
	if(content_image!=""){
	 content_image="data/attachment/forum/$thread_fx['thumb']";
	}
	getdata('forum.php?mod=viewthread&tid=$thread_fx[tid]&mobile=2',content_title,content_zhaiyao,content_image)
</script>
<!--{template common/footer}-->
