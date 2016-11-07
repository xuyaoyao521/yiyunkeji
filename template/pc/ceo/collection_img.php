<?php exit;?>
<!--{eval define('TEMP_APP', DISCUZ_ROOT.'./template/pc/ceo/');}-->
<!--{eval require_once(TEMP_APP.'ceo_lang.php');}-->
<!--{eval require_once(TEMP_APP.'ceo_function.php');}-->
<!--{eval require_once(TEMP_APP.'ceo_collection_img.php');}-->

<ul class="piclist" id="alistimg">
    <!--{if $toutiaolist3}-->
   					<!--{loop $toutiaolist3 $thread}-->
 				 <!--{if $thread['piccount'] >= 1 && $thread['piccount'] < 3}-->
                	
                <li>
                	
                             <a class="list" href="forum.php?mod=viewthread&tid=$thread[tid]">
                                    <div class="pic">
                                        <span class="pic_number">{$thread['piccount']}图</span>
                                        <img class="one fade" data-original="$thread['pic']" src="/public/images/placeholder.png">
                                    </div>
                                    <div class="t"><span>{$thread[subject]}</span></div>
                          </a>
                       
                </li>
                
                	
                	
               
                <!--{elseif  $thread['piccount'] >= 3}-->
                	
                	<li>
                         <a class="list" href="forum.php?mod=viewthread&tid=$thread[tid]">
                                <div class="pic">
                                    <span class="pic_number">{$thread['piccount']}图</span>
                                    <!--{eval $iii=0;}-->
                        <!--{loop $thread['pics'] $key}--> 
                         <!--{eval $iii++;}-->    
                                    <div class="img  <!--{if $iii==2}-->max<!--{/if}-->"><img class="fade" data-original="$key" src="/public/images/placeholder.png"></div>
                                   <!--{/loop}-->
                                </div>
                                <div class="t"><span>{$thread[subject]}</span></div>
                            </a>
                   
                    </li>
                
                <!--{/if}-->
			<!--{/loop}-->

    <!--{else}-->
    
  
    <li class="wmt">当前收藏暂时没有图片</li>
    
    <!--{/if}-->

    </ul>
   
    <div id="ajaxtag3"></div>
    <script type="text/javascript">
        var url3 = 'home.php?mod=collection$ceo_url';
        var pages3=1;
        var allpage3={echo $thispage3 = ceil($allnum3 / $ceo_num3);};
		jq(function(){
			if(pages3==allpage3){
				
				jq("#loadmore3 .info_page a").html("最后一页").hide();
			}	
			if(allpage3==0){
					jq("#loadmore3 .info_page a").html("最后一页").hide();
			}
		})
    </script> 
    <div class="evaluate_content" id="loadmore3" style="clear:both">   
                    <div class="info_page"><a href="javascript:;">点击加载更多</a></div>
                </div>
<script src="template/pc/ceo/ceo_ajaxpage_collection_img.js"></script>




