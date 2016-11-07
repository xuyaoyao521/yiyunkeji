<?php exit;?>


<!--{if !$_GET[viewtype]}-->
<div class="mobile_pic_Slide_main" id="mobile_pic_Slide_main" style=" opacity:0">

	<ul class="Slide_main">
    <!--{loop $thread['imagelist'] $vvv}-->
    
    	<li><img src="data/attachment/forum/$vvv[image]"></li>
        <!--{/loop}-->
        <li class="Related">
        	<div class="Related_title"><span>图集已浏览完毕</span><a href="javascript:;" class="replay">重新浏览</a></div>
            
              
                        <!--{loop $piclist $v}-->
                       
        	<dl>
            
            	<dt><a href="forum.php?mod=viewthread&tid={$v[tid]}&ordertype=1">
                
                <!--{eval $i=0;}-->
                     <!--{loop $v[piclist] $vvv}-->
                     <!--{eval $i++;}-->
                     <!--{if $i==1}-->
                    <img class="one" src="data/attachment/forum/{$vvv[attachment]}">
                    <!--{/if}-->
                    <!--{/loop}-->
                
                </a></dt>
                <dd>{$v[title]}</dd>
            </dl>
              <!--{/loop}-->
            
          
        </li>
    </ul>
    <ul class="screen" style="display:none;"></ul>
   
</div>
<div class="mobile_pic_Slide_footer">
<p>
<span></span>$thread[subject]
</p>
</div>
<!--{template common/header}-->

<style>
	.header_bg{ background-color:#222;  z-index:99}
	#webtitle{ opacity:0; width:40%}
	body{background-color:#222;}
	#side_pr a{ float:right}
	#side_pr{ width:40%; opacity:0}
	#side_pr a.jubao{ color:#666; margin-right:0; width:50px; font-size:14px; line-height:46px}
	#side_pr a.jubao input{ color:#666; margin:0;  font-size:14px; line-height:46px; padding:0; background:none; border:0}
</style>

<!--{template common/pinglun2}-->
 <script type="text/javascript" src="public/js/Moile_Slide.1.1.js"></script>
 <script type="text/javascript" src="public/js/Public_mobile.js"></script>
<script>
SetWebTitle("");
SetTopLeftNav("forum_backpage");
SetTopfenxiang();
$("#side_pr").append('<a href="javascript:;" class="jubao"><i class="public_icon icon-jubao"></i><input type="button" value="举报" class="dialog btn_default" href="misc.php?mod=report&rtype=post&rid=$thread[pid]&tid=$thread[tid]&fid=$thread[pid]&mobile=2" onClick="jubao(this)"></a>');
$("#top_nav,.toptb").remove();
$(".mobile_evaluate_details,.mobile_video_details,.mobile_Satin_list").css("margin-top","45px");
$(".header_bg").show();
$("#side_pr").css({"opacity":1});
$(".reply_view a").attr("href",'forum.php?mod=viewthread&tid=$thread[tid]&ordertype=1&viewtype=2&mobile=2#alist');
$("#ceo_reply_click").attr("onclick","");
$("#ceo_reply_click").click(function(){
	location='forum.php?mod=viewthread&tid=$thread[tid]&ordertype=1&viewtype=2&mobile=2&ly=1#alist';	
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
<div id="mask" style="display:none;"></div>
<!--{else}-->
<!--{template common/header}-->
<style>
	.header_bg{ display:none}
	.postlist{ margin-top:30px}
	
</style>
 <!--{template ceo/toutiao2}-->
 
<div class="mobile_evaluate_main">

<!--{template forum/pinglun3}-->
<style>
#webtitle{ color:#fff}
</style>
</div>
<script>
//段子
$(function(){
	
	var Satin_height = $(".mobile_Satin_list.details").height();
	
	$(".mobile_evaluate_main").css({"margin-top":Satin_height+15})
});
<!--{if $_GET['ly']==1}-->
	$("#ceo_reply_click").click();
<!--{/if}-->
</script>
<!--{template common/footer}-->
<!--{/if}-->