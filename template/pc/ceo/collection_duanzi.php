<?php exit;?>
<!--{eval define('TEMP_APP', DISCUZ_ROOT.'./template/pc/ceo/');}-->
<!--{eval require_once(TEMP_APP.'ceo_lang.php');}-->
<!--{eval require_once(TEMP_APP.'ceo_function.php');}-->
<!--{eval require_once(TEMP_APP.'ceo_collection_duanzi.php');}-->

<ul class="duanzilist" id="alistduanzi">
    <!--{if $toutiaolist4}-->
   					<!--{loop $toutiaolist4 $thread}-->
 						 <li>
                
          
                	
                                <p><a  href="home.php?mod=auther&uid=$thread[authorid]"><img src="uc_server/avatar.php?uid={$thread[authorid]}&size=middle">{$thread[author]}</a></p>
                                <p><a href="forum.php?mod=viewthread&tid=$thread[tid]">{$thread[message]}</a></p>
                                <div class="Satin_function" ><a href="javascript:;" class="praise $thread[zanguo]" onClick="forumzan($thread[tid],1,this)">{$thread[ding]}</a><a href="javascript:;" class="despise $thread[bishiguo]"  onClick="forumzan($thread[tid],2,this)">{$thread[bishi]}</a>
                                    <div class="Satin_r"><a href="forum.php?mod=viewthread&tid=$thread[tid]" class="evaluate"><!--{if $thread[replies] > 0}-->{$thread[replies]}<!--{else}-->0<!--{/if}-->评价</a>
                                    </div>
                                </div>
                                    
                                           
                                
                                
                                    
                                    
                              
                         
                          
                                
                            </li>
					<!--{/loop}-->

    <!--{else}-->
    
  
    <li class="wmt">当前收藏暂时没有段子</li>
    
    <!--{/if}-->

    </ul>
   
    <div id="ajaxtag4"></div>
    <script type="text/javascript">
        var url4 = 'home.php?mod=collection$ceo_url';
        var pages4=1;
        var allpage4={echo $thispage4 = ceil($allnum / $ceo_num);};
		jq(function(){
			if(pages4==allpage4){
				
				jq("#loadmore4 .info_page a").html("最后一页").hide();
			}	
			if(allpage4==0){
					jq("#loadmore4 .info_page a").html("最后一页").hide();	
			}
		})
    </script> 
    <div class="evaluate_content" id="loadmore4" style="clear:both">   
                    <div class="info_page"><a href="javascript:;">点击加载更多</a></div>
                </div>
<script src="template/pc/ceo/ceo_ajaxpage_collection_duanzi.js"></script>




