<?php exit;?>
<!--{eval define('TEMP_APP', DISCUZ_ROOT.'./template/pc/ceo/');}-->
<!--{eval require_once(TEMP_APP.'ceo_lang.php');}-->
<!--{eval require_once(TEMP_APP.'ceo_function.php');}-->
<!--{eval require_once(TEMP_APP.'ceo_collection_video.php');}-->

<ul class="video" id="alistvideo">
    <!--{if $toutiaolist2}-->
   
 					<!--{loop $toutiaolist2 $thread}-->
      						<a class="list" href="forum.php?mod=viewthread&tid=$thread[tid]">
                                <div class="pic">
                                    <span class="time">{$thread[videotime]}</span>
                                   <img class="feedimg fade" data-original="$thread['pic']" src="/public/images/NO_IMG.jpg">
                                </div>
                                <div class="t"><span>{$thread[subject]}</span></div>
                            </a>
 					<!--{/loop}-->


    <!--{else}-->
    
  
    <li class="wmt">当前收藏暂时没有视频</li>
    
    <!--{/if}-->

    </ul>
   
    <div id="ajaxtag2"></div>
    <script type="text/javascript">
        var url2 = 'home.php?mod=collection$ceo_url';
        var pages2=1;
        var allpage2={echo $thispage2 = ceil($allnum2 / $ceo_num2);};
		jq(function(){
			if(pages2==allpage2){
				
				jq("#loadmore2 .info_page a").html("最后一页").hide();
			}	
			if(allpage2==0){
					jq("#loadmore2 .info_page a").html("最后一页").hide();	
			}
		})
    </script> 
    <div class="evaluate_content" id="loadmore2">   
                    <div class="info_page"><a href="javascript:;">点击加载更多</a></div>
                </div>
<script src="template/pc/ceo/ceo_ajaxpage_collection_video.js"></script>




